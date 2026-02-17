<?php
// Site/Controleurs/checkout.php
session_start();
require_once __DIR__ . '/../../config.php';

// Si le panier est vide ou si on n'est pas en POST, on dégage
if (empty($_SESSION['cart']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: " . ROOT_URL . "index.php");
    exit;
}

// 1. Récupération et nettoyage des données du formulaire
$nom           = trim($_POST['nom'] ?? '');
$prenom        = trim($_POST['prenom'] ?? '');
$email         = trim($_POST['email'] ?? '');
$tel           = trim($_POST['tel'] ?? '');
$date_retrait  = $_POST['date_retrait'] ?? '';
$heure_retrait = $_POST['heure_retrait'] ?? '';
$total_ttc     = $_POST['total'] ?? 0;

if (!$nom || !$email || !$tel || !$date_retrait) {
    die("Erreur : Veuillez remplir tous les champs obligatoires.");
}

try {
    $pdo->beginTransaction();

    // 2. Vérifier si le client existe déjà ou le créer
    $stmtClient = $pdo->prepare("SELECT Id_Client FROM Client WHERE Email = ?");
    $stmtClient->execute([$email]);
    $clientId = $stmtClient->fetchColumn();

    if (!$clientId) {
        $insClient = $pdo->prepare("INSERT INTO Client (Nom, Prenom, Email, Tel) VALUES (?, ?, ?, ?)");
        $insClient->execute([$nom, $prenom, $email, $tel]);
        $clientId = $pdo->lastInsertId();
    }

    // 3. Créer la commande
    // On concatène la date et l'heure pour le retrait
    $date_complete = $date_retrait . ' ' . explode(' ', $heure_retrait)[0] . ':00';
    
    $stmtCmd = $pdo->prepare("INSERT INTO Commande (Date_Retrait, Status_Commande, Total_TTC, Id_Client) VALUES (?, 'En attente', ?, ?)");
    $stmtCmd->execute([$date_complete, $total_ttc, $clientId]);
    $commandeId = $pdo->lastInsertId();

    // 4. Ajouter les produits du panier dans la table 'Contient'
    $stmtContient = $pdo->prepare("INSERT INTO Contient (Id_Produit, Id_Commande, Quantite) VALUES (?, ?, ?)");
    
    foreach ($_SESSION['cart'] as $id_produit => $details) {
        $stmtContient->execute([$id_produit, $commandeId, $details['quantite']]);
    }

    // Tout est bon, on valide en BDD
    $pdo->commit();

    // 5. Vider le panier
    unset($_SESSION['cart']);

    // Redirection vers une page de succès
    echo "<script>alert('Merci ! Votre commande n°$commandeId a été enregistrée.'); window.location.href='" . ROOT_URL . "index.php';</script>";

} catch (Exception $e) {
    $pdo->rollBack();
    die("Erreur lors de la validation : " . $e->getMessage());
}