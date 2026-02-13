<?php
require '../../../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Récupération et sécurisation des champs
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

    // Vérifier que les IDs existent dans la base de données
    try {
        // Vérifier Id_Sous_Categorie
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM Sous_Categorie WHERE Id_Sous_Categorie = ?");
        $stmt->execute([$idSousCategorie]);
        if ($stmt->fetchColumn() == 0) {
            die("Erreur : La sous-catégorie sélectionnée (ID: $idSousCategorie) n'existe pas dans la base de données.");
        }

        // Vérifier Id_Origine
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM Origine WHERE Id_Origine = ?");
        $stmt->execute([$idOrigine]);
        if ($stmt->fetchColumn() == 0) {
            die("Erreur : L'origine sélectionnée (ID: $idOrigine) n'existe pas dans la base de données.");
        }

        // Vérifier Id_Type_Produit
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM Type_Produit WHERE Id_Type_Produit = ?");
        $stmt->execute([$idTypeProduit]);
        if ($stmt->fetchColumn() == 0) {
            die("Erreur : Le type de produit sélectionné (ID: $idTypeProduit) n'existe pas dans la base de données.");
        }

        // Vérifier Id_Type_Viande
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM Type_Viande WHERE Id_Type_Viande = ?");
        $stmt->execute([$idTypeViande]);
        if ($stmt->fetchColumn() == 0) {
            die("Erreur : Le type de viande sélectionné (ID: $idTypeViande) n'existe pas dans la base de données.");
        }
    } catch (PDOException $e) {
        die("Erreur lors de la validation des données : " . $e->getMessage());
    }

    // Vérifier l'image
    if (!isset($_FILES['photo']) || $_FILES['photo']['error'] !== UPLOAD_ERR_OK) {
        die("Erreur lors de l'upload de l'image.");
    }

    $image = $_FILES['photo'];
    $filename = uniqid() . "_" . preg_replace("/[^a-zA-Z0-9\._-]/", "", basename($image['name']));
    $target = __DIR__ . "/../../uploads/" . $filename;

    if (!move_uploaded_file($image['tmp_name'], $target)) {
        die("Erreur lors du déplacement du fichier.");
    }

    // Insertion dans la table Produit
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
        // Supprimer l'image uploadée en cas d'erreur
        if (file_exists($target)) {
            unlink($target);
        }
        die("Erreur lors de l'insertion du produit : " . $e->getMessage());
    }
}
