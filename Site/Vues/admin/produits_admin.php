<?php
// Site/Vues/admin/produits_admin.php
require_once '../../../config.php';

// Récupération des produits avec leurs libellés
try {
    $stmt = $pdo->query("SELECT p.*, o.Pays, tp.Nom_Type_Produit, tv.Nom_Type_Viande, sc.Nom_Sous_Categorie 
                         FROM Produit p
                         JOIN Origine o ON p.Id_Origine = o.Id_Origine
                         JOIN Type_Produit tp ON p.Id_Type_Produit = tp.Id_Type_Produit
                         JOIN Type_Viande tv ON p.Id_Type_Viande = tv.Id_Type_Viande
                         JOIN Sous_Categorie sc ON p.Id_Sous_Categorie = sc.Id_Sous_Categorie
                         ORDER BY p.Id_Produit DESC");
    $posts = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Erreur lors de la récupération des produits : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gestion des Produits - Admin</title>
    <link rel="stylesheet" href="../../Styles/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header" role="banner">
        <div class="header-container">
            <div class="logo">
                <a href="menuGestion.php"><img src="../../images/Logo.webp" alt="Logo" width="45px"></a>
            </div>
            
            <button class="menu-toggle" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>
            
            <nav class="nav" role="navigation">
                <a href="menuGestion.php" class="nav-link">Tableau de bord</a>
                <a href="../../../index.php" class="nav-link">Voir le site</a>
                <a href="../Contact.php" class="nav-link">Contact</a>
            </nav>
            
            <div class="icons">
                <button class="cart-button">
                    <img src="../../images/panier.png" alt="Panier" class="icon-cart" />
                    <span class="cart-badge">0</span>
                </button>
            </div>
        </div>
    </header>

    <main>
        <section id="produit">
            <h1>Gestion de la Galerie</h1>
            <center><a href="add.php" class="add-btn">➕ Nouvelle publication (Produit)</a></center>
        </section>

        <center><h1 id="liste-des-produits">Liste des produits en ligne</h1></center><br>

        <div class="gallery">
            <?php if (empty($posts)): ?>
                <p style="text-align:center; width:100%;">Aucun produit disponible.</p>
            <?php else: ?>
                <?php foreach ($posts as $produit): ?>
                <div class="admin-card">
                    <img src="../../uploads/<?= htmlspecialchars($produit['URL_PHOTO']) ?>" alt="photo produit">
                    <div class="product-info"> 
                        <h3 class="product-title"><?= htmlspecialchars($produit['Nom_Produit']) ?></h3>
                        <p class="product-desc"><?= htmlspecialchars($produit['Description_Produit']) ?></p>
                        <p class="product-meta"><b>Prix :</b> <?= $produit['Prix_Unitaire'] ?> € / <?= htmlspecialchars($produit['Unite_Vente']) ?></p>
                        <?php if ($produit['Prix_KG']): ?>
                            <p class="product-meta"><b>Prix au KG :</b> <?= $produit['Prix_KG'] ?> €</p>
                        <?php endif; ?>
                        <p class="product-meta"><b>Origine :</b> <?= htmlspecialchars($produit['Pays']) ?></p>
                        <p class="product-meta"><b>Type :</b> <?= htmlspecialchars($produit['Nom_Type_Produit']) ?></p>
                        <p class="product-meta"><b>Viande :</b> <?= htmlspecialchars($produit['Nom_Type_Viande']) ?></p>
                        <p class="product-meta"><b>Sous-catégorie :</b> <?= htmlspecialchars($produit['Nom_Sous_Categorie']) ?></p>

                        <div class="actions">
                            <a href="edit.php?id=<?= $produit['Id_Produit'] ?>" class="edit">✏️ Modifier</a>
                            <a href="../../Controleurs/delete.php?id=<?= $produit['Id_Produit'] ?>"
                               class="delete"
                               onclick="return confirm('Supprimer ce produit définitivement ?')">
                               🗑️ Supprimer
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>

    <style>
    /* Styles spécifiques au Footer */
    .footer {
        background: #ffffff;
        color: #1a1a1a;
        padding: 60px 0 20px;
        font-family: "Inter", sans-serif;
        border-top: 1px solid #f0f0f0;
    }

    .footer-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 40px;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 40px;
        flex-wrap: wrap;
    }

    .footer-brand {
        flex: 0 0 150px;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .footer-socials {
        display: flex;
        gap: 15px;
    }

    .footer-socials a img {
        transition: transform 0.3s ease;
    }

    .footer-socials a:hover img {
        transform: translateY(-3px);
    }

    .footer-links-group {
        flex: 1;
        display: flex;
        justify-content: space-around;
        gap: 30px;
        min-width: 500px;
    }

    .footer-section {
        text-align: left;
    }

    .footer-section h2 {
        font-size: 14px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 20px;
        color: #1a1a1a;
        position: relative;
    }

    .footer-section h2::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 30px;
        height: 2px;
        background: #d10f1c;
    }

    .footer-section p,
    .footer-section ul li a {
        font-size: 14px;
        color: #555555;
        line-height: 1.8;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .footer-section ul {
        list-style: none;
        padding: 0;
    }

    .footer-section ul li a:hover {
        color: #d10f1c;
    }

    .footer-map {
        flex: 0 0 350px;
    }

    .footer-map h2 {
        font-size: 14px;
        font-weight: 800;
        text-transform: uppercase;
        margin-bottom: 20px;
        color: #1a1a1a;
    }

    .footer-map iframe {
        width: 100%;
        height: 180px;
        border-radius: 12px;
        border: none;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
    }

    .footer-bottom {
        max-width: 1400px;
        margin: 50px auto 0;
        padding: 20px 40px 0;
        border-top: 1px solid #eeeeee;
        text-align: center;
    }

    .copyright {
        font-size: 13px;
        color: #999;
    }

    .copyright a {
        color: #999;
        text-decoration: none;
        margin: 0 8px;
        transition: color 0.3s ease;
    }

    .copyright a:hover {
        color: #d10f1c;
    }

    @media (max-width: 1024px) {
        .footer-links-group { min-width: 100%; order: 2; }
        .footer-map { order: 3; flex: 1 1 100%; }
    }

    @media (max-width: 768px) {
        .footer-container { flex-direction: column; align-items: center; text-align: center; }
        .footer-brand { align-items: center; flex: 1 1 100%; }
        .footer-section { text-align: center; }
        .footer-section h2::after { left: 50%; transform: translateX(-50%); }
        .footer-links-group { flex-direction: column; gap: 40px; }
    }
</style>

<footer class="footer" role="contentinfo">
    <div class="footer-container">
        <div class="footer-brand">
            <div class="footer-logo">
                <img src="../../images/Logo.webp" alt="Logo Boucherie Agadir" width="60">
            </div>
            <div class="footer-socials">
                <a href="https://www.instagram.com/boucherie_agadir_/" aria-label="Instagram">
                    <img src="../../images/instagram.png" alt="Instagram" width="24" height="24">
                </a>
                <a href="https://www.tiktok.com/@boucherie.agadir.64" aria-label="TikTok">
                    <img src="../../images/tiktok.png" alt="TikTok" width="26" height="26">
                </a>
            </div>
        </div>

        <div class="footer-links-group">
            <div class="footer-section">
                <h2>Plan du site</h2>
                <ul>
                    <li><a href="../../../index.php#accueil">Accueil</a></li>
                    <li><a href="../../../index.php#histoire">Notre histoire</a></li>
                    <li><a href="../../Controleurs/liste_produits.php">Nos produits</a></li>
                    <li><a href="../Promotions.php">Promotions</a></li>
                    <li><a href="../ClickAndCollect.php">Click & Collect</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h2>Horaires</h2>
                <p>Lun & Dim : Fermé</p>
                <p>Mar - Sam : 09h30 - 13h00</p>
                <p>15h30 - 19h00</p>
                <p>Vendredi : 09h30 - 12h30, 15h30 - 19h00</p>
            </div>

            <div class="footer-section">
                <h2>Contact</h2>
                <p>Ben20mohamed97@gmail.com</p>
                <p>06 27 29 85 56</p>
                <p>14 Pl. du Béarn, 64150 Mourenx</p>
            </div>
        </div>

        <div class="footer-map">
            <h2>Nous trouver</h2>
            <iframe src="https://www.google.com/maps/embed?pb=..." allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>

    <div class="footer-bottom">
        <p class="copyright">
            <a href="../cgu.php">CGU</a> • 
            <a href="../rgpd.php">RGPD</a> • 
            <a href="../mentions-legales.php">Mentions légales</a>
        </p>
    </div>
</footer>

<script>
    const menuToggle = document.querySelector('.menu-toggle');
    const nav = document.querySelector('.nav');
    if (menuToggle && nav) {
        menuToggle.addEventListener('click', () => {
            nav.classList.toggle('nav-open');
            menuToggle.classList.toggle('active');
        });
    }

    const header = document.querySelector('.header');
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 100) header.classList.add('header-scrolled');
        else header.classList.remove('header-scrolled');
    });
</script>
</body>
</html>