<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription Admin - Boucherie Agadir</title>
    <link rel="stylesheet" href="../../Styles/style.css">
</head>
<body>

    <header class="header" role="banner">
        <div class="header-container">
            <div class="logo">
                <img src="../../images/Logo.webp" alt="Logo Boucherie Agadir" width="45px"> 
            </div>
            
            <button class="menu-toggle" aria-label="Menu" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>
            
            <nav class="nav" role="navigation">
                <a href="menuGestion.php" class="nav-link">Tableau de bord</a>
                <a href="../liste_produit.php" class="nav-link">Produits</a>
                <a href="../Contact.php" class="nav-link">Contact</a>
            </nav>
            
            <div class="icons">
                <button class="cart-button">
                    <img src="../../images/panier.svg" alt="Panier" class="icon" />
                    <span class="cart-badge">0</span>
                </button>
            </div>
        </div>
    </header>

    <main>
        <div class="publication-container">
            <h2>Créer un compte Admin</h2>

            <?php if ($error): ?>
                <p style="color:red; text-align:center; font-weight:bold;"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>

            <?php if ($success): ?>
                <p style="color:green; text-align:center; font-weight:bold;"><?= htmlspecialchars($success) ?></p>
            <?php endif; ?>

            <form method="POST" action="../../Controleurs/admin/register.php">
                <input type="text" name="nom" placeholder="Nom complet" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <input type="password" name="password_confirm" placeholder="Confirmez le mot de passe" required>
                <button type="submit">Créer le compte</button>
            </form>

            <p style="text-align:center; margin-top:15px;">
                <a href="menuGestion.php">Retour au menu</a>
            </p>
        </div>
    </main>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <div class="logo">BOUCHERIE<span>AGADIR</span></div>
                <p>Votre boucher de confiance depuis 1997</p>
                <div class="footer-socials">
                    <a href="#">📘</a><a href="#">📸</a><a href="#">🎵</a>
                </div>
            </div>
            <div class="footer-section">
                <h2>Plan du site</h2>
                <ul>
                    <li><a href="../../index.php">Accueil</a></li>
                    <li><a href="../liste_produit.php">Produits</a></li>
                    <li><a href="../Contact.php">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h2>Contact</h2>
                <p>📍 14 Pl. du Béarn, 64150 Mourenx</p>
                <p>Tél : 06 27 29 85 56</p>
            </div>
            <div class="footer-section footer-map">
                <h2>Nous trouver</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2900.2743678430566!2d-0.6325365231790336!3d43.37128687111703!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd56f651ffc7de2b%3A0x499ef61367106771!2s14%20Pl.%20du%20B%C3%A9arn%2C%2064150%20Mourenx!5e0!3m2!1sfr!2sfr!4v1768483752878!5m2!1sfr!2sfr" loading="lazy"></iframe>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2026 Boucherie Agadir — Développé par <strong>BTS SIO 2</strong></p>
        </div>
    </footer>

    <script>
        const menuToggle = document.querySelector('.menu-toggle');
        const nav = document.querySelector('.nav');
        menuToggle.addEventListener('click', () => {
            nav.classList.toggle('nav-open');
            menuToggle.classList.toggle('active');
        });

        const header = document.querySelector('.header');
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 100) header.classList.add('header-scrolled');
            else header.classList.remove('header-scrolled');
        });
    </script>

</body>
</html>