<?php
require '../../../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 1. Récupération et sécurisation des champs
    $nomProduit       = trim($_POST['nom_produit'] ?? '');
    $description      = trim($_POST['description_produit'] ?? '');
    $prixUnitaire     = $_POST['prix_unitaire'] ?? '';
    $prixKG           = !empty($_POST['prix_kg']) ? $_POST['prix_kg'] : null;
    $uniteVente       = trim($_POST['unite_vente'] ?? '');
    $idOrigine        = (int)($_POST['id_origine'] ?? 0);
    $idTypeProduit    = (int)($_POST['id_type_produit'] ?? 0);
    $idTypeViande     = (int)($_POST['id_type_viande'] ?? 0);
    $idSousCategorie  = (int)($_POST['id_sous_categorie'] ?? 0);

    // Vérification des champs obligatoires
    if (!$nomProduit || !$description || !$prixUnitaire || !$idOrigine || !$idTypeProduit || !$idTypeViande || !$idSousCategorie || !$uniteVente) {
        die("Tous les champs obligatoires doivent être remplis.");
    }

    // 2. Validation de l'image (SÉCURITÉ RENFORCÉE)
    if (!isset($_FILES['photo']) || $_FILES['photo']['error'] !== UPLOAD_ERR_OK) {
        die("Erreur lors de l'upload de l'image.");
    }

    $image = $_FILES['photo'];
    $extension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];

    // Vérification de l'extension
    if (!in_array($extension, $allowedExtensions)) {
        die("Erreur : Seules les images (jpg, png, webp) sont autorisées.");
    }

    // Vérification du type MIME réel (empêche les fichiers .sql renommés en .jpg)
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $image['tmp_name']);
    finfo_close($finfo);

    if (strpos($mimeType, 'image/') !== 0) {
        die("Erreur : Le contenu du fichier n'est pas une image valide.");
    }

    // 3. Préparation du fichier
    $filename = uniqid() . "_" . preg_replace("/[^a-zA-Z0-9\._-]/", "", basename($image['name']));
    $targetDir = __DIR__ . "/../../uploads/";
    $targetFile = $targetDir . $filename;

    // Créer le dossier s'il n'existe pas
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    // 4. Validation des IDs en base de données
    try {
        $tables = [
            'Sous_Categorie' => $idSousCategorie,
            'Origine' => $idOrigine,
            'Type_Produit' => $idTypeProduit,
            'Type_Viande' => $idTypeViande
        ];

        foreach ($tables as $table => $id) {
            $column = "Id_" . $table;
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM $table WHERE $column = ?");
            $stmt->execute([$id]);
            if ($stmt->fetchColumn() == 0) {
                die("Erreur : La valeur sélectionnée pour $table n'existe pas.");
            }
        }
    } catch (PDOException $e) {
        die("Erreur de validation : " . $e->getMessage());
    }

    // 5. Déplacement du fichier et Insertion SQL
    if (move_uploaded_file($image['tmp_name'], $targetFile)) {
        try {
            $sql = "INSERT INTO Produit 
                (Nom_Produit, Description_Produit, Prix_Unitaire, Prix_KG, URL_PHOTO, Unite_Vente, Id_Sous_Categorie, Id_Origine, Id_Type_Produit, Id_Type_Viande)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                $nomProduit,
                $description,
                $prixUnitaire,
                $prixKG,
                $filename,
                $uniteVente,
                $idSousCategorie,
                $idOrigine,
                $idTypeProduit,
                $idTypeViande
            ]);

            header("Location: produits_admin.php?success=1");
            exit;
        } catch (PDOException $e) {
            if (file_exists($targetFile)) unlink($targetFile); // Supprime l'image si la BDD échoue
            die("Erreur lors de l'insertion : " . $e->getMessage());
        }
    } else {
        die("Erreur lors du déplacement du fichier vers le dossier uploads.");
    }
}