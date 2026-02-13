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
            <?php foreach ($posts as $produit): ?>
            <div class="admin-card">
                <img src="../../uploads/<?= htmlspecialchars($produit['URL_PHOTO']) ?>"
                     alt="photo produit">

                <div class="product-info"> 
                    <h3 class="product-title"><?= htmlspecialchars($produit['Nom_Produit']) ?></h3>
                    <p class="product-desc"><?= htmlspecialchars($produit['Description_Produit']) ?></p>
                    <p class="product-meta"><b>Prix :</b> <?= $produit['Prix_Unitaire'] ?> € / <?= $produit['Unite_Vente'] ?></p>

                    <?php if ($produit['Prix_KG']): ?>
                        <p class="product-meta"><b>Prix au KG :</b> <?= $produit['Prix_KG'] ?> €</p>
                    <?php endif; ?>

                    <p class="product-meta"><b>Origine :</b> <?= htmlspecialchars($produit['Pays']) ?></p>
                    <p class="product-meta"><b>Type :</b> <?= htmlspecialchars($produit['Nom_Type_Produit']) ?></p>
                    <p class="product-meta"><b>Viande :</b> <?= htmlspecialchars($produit['Nom_Type_Viande']) ?></p>
                    <p class="product-meta"><b>Sous-catégorie :</b> <?= htmlspecialchars($produit['Nom_Sous_Categorie']) ?></p>

                    <div class="actions">
                        <a href="edit.php?id=<?= $produit['Id_Produit'] ?>" class="edit">✏️ Modifier</a>
                        <a href="../Controleurs/delete.php?id=<?= $produit['Id_Produit'] ?>"
                           class="delete"
                           onclick="return confirm('Supprimer ce produit définitivement ?')">
                           🗑️ Supprimer
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer class="footer" role="contentinfo">
        <div class="footer-container">
            <div class="footer-section">
                <img src="../../images/Logo.webp" alt="Logo" width="45px">
                <div class="footer-socials">
                    <a href="#"><img src="../../images/instagram.png" alt="Insta" style="width: 30px;"></a>
                    <a href="#"><img src="../../images/tiktok.png" alt="TikTok" style="width: 30px;"></a>
                </div>
            </div>
            <div class="footer-section">
                <h2>Plan du site</h2>
                <ul>
                    <li><a href="../../index.php">Accueil Site</a></li>
                    <li><a href="../../Vues/admin/menuGestion.php">Gestion Admin</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h2>Contact</h2>
                <p>06 27 29 85 56</p>
                <p>14 Pl. du Béarn, 64150 Mourenx</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p class="copyright">© 2026 Boucherie Agadir — Tous droits réservés</p>
        </div>
    </footer>

    <script>
        // Menu mobile
        const menuToggle = document.querySelector('.menu-toggle');
        const nav = document.querySelector('.nav');
        if (menuToggle && nav) {
            menuToggle.addEventListener('click', () => {
                nav.classList.toggle('nav-open');
                menuToggle.classList.toggle('active');
            });
        }

        // Sticky header
        const header = document.querySelector('.header');
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 100) header.classList.add('header-scrolled');
            else header.classList.remove('header-scrolled');
        });
    </script>
</body>
</html>