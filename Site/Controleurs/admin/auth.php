<?php
// Site/Controleurs/admin/auth.php
session_start();

// Inclusion de la config pour accéder à $pdo et ROOT_URL
require_once __DIR__ . '/../../../config.php'; 

// Sécurité : Si l'utilisateur est déjà connecté, on le redirige directement vers le menu
if (isset($_SESSION['user_id'])) {
    header('Location: ' . ROOT_URL . 'Site/Vues/admin/menuGestion.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!empty($email) && !empty($password)) {
        try {
            // Utilisation de $pdo qui vient de config.php
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                // Régénération de l'ID de session pour la sécurité
                session_regenerate_id(true);
                
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];

                // Redirection vers le menu de gestion via ROOT_URL
                header('Location: ' . ROOT_URL . 'Site/Vues/admin/menuGestion.php');
                exit;
            } else {
                $error = "Email ou mot de passe incorrect";
            }
        } catch (PDOException $e) {
            $error = "Erreur de connexion à la base de données.";
        }
    } else {
        $error = "Tous les champs sont obligatoires";
    }
}

// Inclusion de la vue du formulaire de connexion
// Le chemin remonte de Controleurs/admin vers Vues/admin
include __DIR__ . '/../../Vues/admin/login.php';