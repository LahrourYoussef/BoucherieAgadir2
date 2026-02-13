<?php
session_start();
// Sécurité : Seul un admin connecté peut ajouter un autre admin
if (!isset($_SESSION['user_id'])) {
    header('Location: auth.php');
    exit;
}

require_once __DIR__ . '/../../../config.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';

    if (empty($nom) || empty($email) || empty($password) || empty($password_confirm)) {
        $error = "Tous les champs sont obligatoires";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Email invalide";
    } elseif ($password !== $password_confirm) {
        $error = "Les mots de passe ne correspondent pas";
    } else {
        // Vérifie si l'email existe déjà
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $error = "Cet email est déjà utilisé";
        } else {
            // Hash du mot de passe
            $hash = password_hash($password, PASSWORD_DEFAULT);

            // Insertion
            $stmt = $pdo->prepare("INSERT INTO users (nom, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$nom, $email, $hash]);

            $success = "Compte créé avec succès !";
            // Redirection vers la gestion des utilisateurs après 2 secondes
            header("refresh:2;url=../../Vues/admin/users.php"); 
        }
    }
}

// Appel de la vue
include __DIR__ . '/../../Vues/admin/register.php';