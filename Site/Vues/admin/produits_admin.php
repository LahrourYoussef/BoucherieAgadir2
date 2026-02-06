<?php
// ================== CONNEXION BDD ==================
$pdo = new PDO(
    "mysql:host=localhost;dbname=gallery;charset=utf8",
    "root",
    "root", // selon ta config MAMP
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
);

// ================== RÉCUPÉRATION DES PRODUITS ==================
$stmt = $pdo->query("
    SELECT 
        p.Id_Produit,
        p.Nom_Produit,
        p.Description_Produit,
        p.Prix_Unitaire,
        p.Prix_KG,
        p.URL_PHOTO,
        p.Unite_Vente,

        o.Pays,
        tp.Nom_Type_Produit,
        tv.Nom_Type_Viande,
        sc.Nom_Sous_Categorie

    FROM Produit p
    JOIN Origine o ON p.Id_Origine = o.Id_Origine
    JOIN Type_Produit tp ON p.Id_Type_Produit = tp.Id_Type_Produit
    JOIN Type_Viande tv ON p.Id_Type_Viande = tv.Id_Type_Viande
    JOIN Sous_Categorie sc ON p.Id_Sous_Categorie = sc.Id_Sous_Categorie
    ORDER BY p.Id_Produit DESC
");

$posts = $stmt->fetchAll();

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Boucherie Agadir - Viande fraîche et de qualité depuis 2022. Découvrez notre sélection de viandes préparées avec soin." />
    <title>Accueil</title>
    <link rel="stylesheet" href="./Site/Styles/tyle.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header" role="banner">
        <div class="header-container">
            <div class="logo" aria-label="Boucherie Agadir">
                <a href="#accueil"><img src="Site/images/Logo.webp" alt="Logo Boucherie Agadir" width="45px" ></a>
            </div>
            
            <button class="menu-toggle" aria-label="Menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
            
            <nav class="nav" role="navigation" aria-label="Navigation principale">
                <a href="#histoire" class="nav-link">Notre histoire</a>
                <a href="#produits" class="nav-link">Nos produits</a>
                <a href="Site/Vues/Promotions.php" class="nav-link">Promotions</a>
                <a href="Site/Vues/ClickAndCollect.php" class="nav-link">Click & Collect</a>
                <a href="Site/Vues/Contact.php" class="nav-link">Contact</a>
            </nav>
            
            <div class="icons">
                <button class="cart-button" aria-label="Panier d'achat">
                    <img src="Site/images/panier.png" alt="Panier" class="icon-cart" />
                    <span class="cart-badge" aria-hidden="true">0</span>
                </button>
                <button class="cart-button" aria-label="Mon Compte">
                    <img src="Site/images/compte2.png" alt="Compte" class="icon-account" />
                </button>
            </div>
        </div>
    </header>

    <main>

        <!-- HERO CONTACT -->
       

    
        <!-- SECTION PRODUIT -->
<section id="produit">
        <h1>Galerie photos</h1>

<a href="add.php" class="add-btn">➕ Nouvelle publications</a>
</section>

        <center><h1 id="liste-des-produits">Liste des produits</h1></center><br>

<div class="gallery">
    <?php foreach ($posts as $produit): ?>
    <div class="card">

        <img src="uploads/<?= htmlspecialchars($produit['URL_PHOTO']) ?>"
             alt="photo produit"
             width="200">

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
            <a href="edit.php?id=<?= $produit['Id_Produit'] ?>" class="edit">
                ✏️ Modifier
            </a>

            <a href="delete.php?id=<?= $produit['Id_Produit'] ?>"
               class="delete"
               onclick="return confirm('Supprimer ce produit ?')">
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
    
            <!-- LOGO + DESCRIPTION -->
            <div class="footer-section">
                    <img src="Site/images/Logo.webp" alt="Logo Boucherie Agadir" width="45px" >
    
                <div class="footer-socials">
                    <a href="https://www.instagram.com/boucherie_agadir_/" aria-label="Instagram"><img src="Site/images/instagram.png" alt="Instagram" style="width: 33px; height: 33px;"></a>
                    <a href="https://www.tiktok.com/@boucherie.agadir.64" aria-label="TikTok"><img src="Site/images/tiktok.png" alt="TikTok" style="width: 36px; height: 36px;"></a>
                </div>
            </div>
    
            <!-- PLAN DU SITE -->
            <div class="footer-section">
                <h2>Plan du site</h2>
                <ul>
                    <li><a href="#accueil">Accueil</a></li>
                    <li><a href="#histoire">Notre histoire</a></li>
                    <li><a href="#produits">Nos produits</a></li>
                    <li><a href="Site/Vues/Promotions.php">Promotions</a></li>
                    <li><a href="Site/Vues/ClickAndCollect.php">Click & Collect</a></li>
                    <li><a href="Site/Vues/Contact.php">Contact</a></li>
                </ul>
            </div>
    
            <!-- HORAIRES -->
            <div class="footer-section">
                <h2>Horaires</h2>
                <p>Lundi : Fermé</p>
                <p>Mardi : 09h30 - 13h00,<br> 15h30 - 19h00</p>
                <p>Mercredi : 09h30 - 13h00,<br> 15h30 - 19h00</p>
                <p>Jeudi : 09h30 - 13h00,<br> 15h30 - 19h00</p>
                <p>Vendredi : : 09h30 - 12h30,<br> 15h30 - 19h00</p>
                <p>Samedi : 09h30 - 13h00,<br> 15h30 - 19h00</p>
                <p>Dimanche : Fermé</p>
            </div>
    
            <!-- CONTACT -->
            <div class="footer-section">
                <h2>Contact</h2>
                <p>Ben20mohamed97@gmail.com</p>
                <p>06 27 29 85 56</p>
                <p>14 Pl. du Béarn, 64150 Mourenx</p>
            </div>
    
            <!-- GOOGLE MAPS -->
            <div class="footer-section footer-map">
                <h2>Nous trouver</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2900.2743678430566!2d-0.6325365231790336!3d43.37128687111703!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd56f651ffc7de2b%3A0x499ef61367106771!2s14%20Pl.%20du%20B%C3%A9arn%2C%2064150%20Mourenx!5e0!3m2!1sfr!2sfr!4v1768483752878!5m2!1sfr!2sfr" 
                loading="lazy" >
                </iframe>
            </div>
    
        </div>
    
        <!-- BOTTOM -->
        <div class="footer-bottom">
            <p class="copyright">
                Tous droits réservés • 
                <a href="#">CGU</a> • 
                <a href="#">RGPD</a> • 
                <a href="#">Mentions légales</a>
            </p>
            
        </div>
    </footer>
    
    <script>
        // Menu mobile toggle amélioré
        const menuToggle = document.querySelector('.menu-toggle');
        const nav = document.querySelector('.nav');
        const body = document.body;
        
        if (menuToggle && nav) {
            menuToggle.addEventListener('click', () => {
                const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
                const isOpen = !isExpanded;
                
                menuToggle.setAttribute('aria-expanded', isOpen);
                nav.classList.toggle('nav-open');
                menuToggle.classList.toggle('active');
                
                // Empêcher le scroll du body quand le menu est ouvert
                if (isOpen) {
                    body.classList.add('menu-open');
                    body.style.overflow = 'hidden';
                } else {
                    body.classList.remove('menu-open');
                    body.style.overflow = '';
                }
            });
            
            // Fermer le menu quand on clique sur un lien
            const navLinks = nav.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth <= 768) {
                        menuToggle.setAttribute('aria-expanded', 'false');
                        nav.classList.remove('nav-open');
                        menuToggle.classList.remove('active');
                        body.classList.remove('menu-open');
                        body.style.overflow = '';
                    }
                });
            });
            
            // Fermer le menu quand on redimensionne la fenêtre
            window.addEventListener('resize', () => {
                if (window.innerWidth > 768) {
                    menuToggle.setAttribute('aria-expanded', 'false');
                    nav.classList.remove('nav-open');
                    menuToggle.classList.remove('active');
                    body.classList.remove('menu-open');
                    body.style.overflow = '';
                }
            });
        }

        // Sticky header amélioré
        const header = document.querySelector('.header');
        if (header) {
            let lastScroll = 0;

            window.addEventListener('scroll', () => {
                const currentScroll = window.pageYOffset;
                if (currentScroll > 100) {
                    header.classList.add('header-scrolled');
                } else {
                    header.classList.remove('header-scrolled');
                }
                lastScroll = currentScroll;
            }, { passive: true });
        }

        // Smooth scroll for anchor links amélioré
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href === '#' || href === '#accueil') {
                    e.preventDefault();
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                    return;
                }
                
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    const headerHeight = header ? header.offsetHeight : 0;
                    const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }

                const note = 4.4;
                const starTotal = 5;

                // Calcul du pourcentage
                const starPercentage = (note / starTotal) * 100;

                // Application de la largeur à la couche de remplissage
                document.querySelector('.stars-inner').style.width = starPercentage + '%';
            });
        });
    </script>
</body>
</html>