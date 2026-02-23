<?php
// Site/Controleurs/checkout.php
session_start();
require_once __DIR__ . '/../../config.php';

// Sécurité : Si le panier est vide ou accès direct sans POST
if (empty($_SESSION['cart']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: " . ROOT_URL . "Site/Controleurs/panier.php");
    exit;
}

// 1. Récupération et nettoyage des données du formulaire
$nom           = trim($_POST['nom'] ?? '');
$prenom        = trim($_POST['prenom'] ?? '');
$email         = trim($_POST['email'] ?? '');
$tel           = trim($_POST['tel'] ?? '');
$date_retrait  = $_POST['date_retrait'] ?? '';
$heure_retrait = $_POST['heure_retrait'] ?? '';

// Validation de base
if (!$nom || !$prenom || !filter_var($email, FILTER_VALIDATE_EMAIL) || !$tel || !$date_retrait || !$heure_retrait) {
    $_SESSION['error'] = "Veuillez remplir correctement tous les champs obligatoires.";
    header("Location: " . ROOT_URL . "Site/Controleurs/panier.php");
    exit;
}

// 2. Recalcul du Total TTC (Sécurité anti-fraude)
$total_ttc = 0;
foreach ($_SESSION['cart'] as $item) {
    $total_ttc += $item['prix'] * $item['quantite'];
}

try {
    $pdo->beginTransaction();

    // 3. Gestion du Client (Recherche par email unique)
    $stmtClient = $pdo->prepare("SELECT Id_Client FROM Client WHERE Email = ?");
    $stmtClient->execute([$email]);
    $clientId = $stmtClient->fetchColumn();

    if (!$clientId) {
        $insClient = $pdo->prepare("INSERT INTO Client (Nom, Prenom, Email, Tel) VALUES (?, ?, ?, ?)");
        $insClient->execute([$nom, $prenom, $email, $tel]);
        $clientId = $pdo->lastInsertId();
    }

    // 4. Création de la commande
    // Heure retrait format : "09:30 - 10:00" -> on prend "09:30"
    $heure_brute = explode(' ', $heure_retrait)[0];
    $date_complete = $date_retrait . ' ' . $heure_brute . ':00';
    
    $stmtCmd = $pdo->prepare("INSERT INTO Commande (Date_Retrait, Status_Commande, Total_TTC, Id_Client) VALUES (?, 'En attente', ?, ?)");
    $stmtCmd->execute([$date_complete, $total_ttc, $clientId]);
    $commandeId = $pdo->lastInsertId();

    // 5. Ajout du détail des produits (Table 'Contient')
    $stmtContient = $pdo->prepare("INSERT INTO Contient (Id_Produit, Id_Commande, Quantite) VALUES (?, ?, ?)");
    
    foreach ($_SESSION['cart'] as $id_produit => $details) {
        $stmtContient->execute([$id_produit, $commandeId, $details['quantite']]);
    }

    // Validation finale
    $pdo->commit();

    // 6. Nettoyage du panier
    unset($_SESSION['cart']);

    // Message de succès et redirection
    echo "<script>
            alert('Merci " . htmlspecialchars($prenom) . " ! Votre commande n°$commandeId a été enregistrée. Elle sera prête le $date_retrait à $heure_brute.'); 
            window.location.href='" . ROOT_URL . "index.php';
          </script>";

} catch (Exception $e) {
    $pdo->rollBack();
    // En production, ne pas afficher l'erreur brute mais la logger
    error_log($e->getMessage());
    die("Désolé, une erreur technique est survenue lors de votre commande.");
}