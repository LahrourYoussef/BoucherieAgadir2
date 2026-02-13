<?php
session_start();
require_once __DIR__ . '/../../../config.php';

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: auth.php');
    exit;
}

// Supprimer un utilisateur
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$id]);
    header('Location: ../../Controleurs/admin/users.php');
    exit;
}

// Récupérer tous les utilisateurs
$stmt = $pdo->query("SELECT id, nom, email, created_at FROM users ORDER BY id ASC");
$users = $stmt->fetchAll();

// On inclut la Vue
include __DIR__ . '/../../Vues/admin/users.php';