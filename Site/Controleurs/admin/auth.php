<?php
session_start();
// On remonte 3 fois pour atteindre la racine (admin -> Controleurs -> Site -> racine)
require_once __DIR__ . '/../../../config.php'; 

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($email) && !empty($password)) {
        // Utilisation de $pdo qui vient de config.php
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];

            // Redirection vers le menu de gestion (Vue)
            header('Location: ../../Vues/admin/menuGestion.php');
            exit;
        } else {
            $error = "Email ou mot de passe incorrect";
        }
    } else {
        $error = "Tous les champs sont obligatoires";
    }
}

// LIEN VERS LA VUE : Si on arrive ici, c'est qu'on doit afficher le formulaire
// (soit premier passage, soit après une erreur)
include __DIR__ . '/../../Vues/admin/login.php';