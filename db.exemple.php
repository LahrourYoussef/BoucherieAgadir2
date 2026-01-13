<?php
// Modèle de connexion pour la Boucherie Agadir
// Renommez ce fichier en db.php et complétez les infos
$host = 'localhost';
$dbname = 'BoucherieAgadir';
$user = 'votre_utilisateur';
$pass = 'votre_mot_de_passe';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>