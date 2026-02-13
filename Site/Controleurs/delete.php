<?php
require 'config.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID invalide");
}

$id = (int) $_GET['id'];


// 🔹 Récupérer l’image du produit
$stmt = $pdo->prepare("SELECT URL_PHOTO FROM Produit WHERE Id_Produit = ?");
$stmt->execute([$id]);
$produit = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$produit) {
    die("Produit introuvable");
}


// 🔹 Supprimer le fichier image
$imagePath = __DIR__ . "/../uploads/" . $produit['URL_PHOTO'];
if (!empty($produit['URL_PHOTO']) && file_exists($imagePath)) {
    unlink($imagePath);
}


// 🔹 Suppression des dépendances (FK)
$pdo->prepare("DELETE FROM Contient WHERE Id_Produit = ?")->execute([$id]);
$pdo->prepare("DELETE FROM Appliquer WHERE Id_Produit = ?")->execute([$id]);
$pdo->prepare("DELETE FROM Possede WHERE Id_Produit = ?")->execute([$id]);
$pdo->prepare("DELETE FROM Stock WHERE Id_Produit = ?")->execute([$id]);


// 🔹 Supprimer le produit
$pdo->prepare("DELETE FROM Produit WHERE Id_Produit = ?")->execute([$id]);

header("Location: admin/produits_admin.php?success=delete");
exit;
