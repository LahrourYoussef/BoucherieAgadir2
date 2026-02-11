<?php
session_start();

if (isset($_POST['id'], $_POST['quantite'])) {
    $id = (int) $_POST['id'];
    $qte = (int) $_POST['quantite'];

    if ($qte <= 0) {
        unset($_SESSION['cart'][$id]);
    } else {
        $_SESSION['cart'][$id]['quantite'] = $qte;
    }
}

header("Location: cart.php");
exit;
?>