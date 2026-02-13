<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des utilisateurs - Boucherie Agadir</title>
    <link rel="stylesheet" href="../../Styles/style.css">

</head>
<body>

    <header class="header" role="banner">
        <div class="header-container">
            <div class="logo" aria-label="Boucherie Agadir">
                <img src="../../images/Logo.webp" alt="Logo Boucherie Agadir" width="45px"> 
            </div>
            
            <button class="menu-toggle" aria-label="Menu" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>
            
            <nav class="nav" role="navigation" aria-label="Navigation principale">
                <a href="menuGestion.php" class="nav-link">Tableau de bord</a>
                <a href="../liste_produit.php" class="nav-link">Nos produits</a>
                <a href="../Promotions.php" class="nav-link">Promotions</a>
                <a href="../Contact.php" class="nav-link">Contact</a>
            </nav>
            
            <div class="icons">
                <button class="cart-button" aria-label="Panier">
                    <img src="../../images/panier.svg" alt="Panier" class="icon" />
                    <span class="cart-badge">0</span>
                </button>
            </div>
        </div>
    </header>

    <main>
        <div class="publication-container">
            <h2>Gestion des utilisateurs</h2>
            <a href="../../Controleurs/admin/register.php" class="add-btn">Ajouter un utilisateur</a>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Créé le</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td data-label="ID"><?= htmlspecialchars($user['id']) ?></td>
                        <td data-label="Nom"><?= htmlspecialchars($user['nom']) ?></td>
                        <td data-label="Email"><?= htmlspecialchars($user['email']) ?></td>
                        <td data-label="Créé le"><?= htmlspecialchars($user['created_at']) ?></td>
                        <td data-label="Actions">
                            <a href="edit_user.php?id=<?= $user['id'] ?>" class="edit">Modifier</a>
                            <a href="../../Controleurs/admin/users.php?delete=<?= $user['id'] ?>" class="delete" onclick="return confirm('Supprimer cet utilisateur ?')">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <center>
            <p>Cliquer pour retourner au menu 👇</p> <br>
            <button id="buttonRetour"><a href="menuGestion.php">Retour</a></button>
        </center> 
        <br><br>
    </main>

    <footer class="footer" role="contentinfo">
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
                    <li><a href="../ClickAndCollect.php">Click & Collect</a></li>
                    <li><a href="../Contact.php">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h2>Horaires</h2>
                <p>Lundi : Fermé</p>
                <p>Mardi au Samedi : 09h30 - 13h00, 15h30 - 19h00</p>
                <p>Dimanche : Fermé</p>
            </div>
            <div class="footer-section">
                <h2>Contact</h2>
                <p>Email : Ben20mohamed97@gmail.com</p>
                <p>Tél : 06 27 29 85 56</p>
                <p>📍 14 Pl. du Béarn, 64150 Mourenx</p>
            </div>
            <div class="footer-section footer-map">
                <h2>Nous trouver</h2>
                <iframe src="http://googleusercontent.com/maps.google.com/embed..." loading="lazy"></iframe>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2026 Boucherie Agadir — Tous droits réservés • <a href="#">CGU</a> • <a href="#">RGPD</a></p>
            <p class="dev">Développé par <strong>BTS SIO 2</strong></p>
        </div>
    </footer>

    <script>
        // Menu mobile
        const menuToggle = document.querySelector('.menu-toggle');
        const nav = document.querySelector('.nav');
        menuToggle.addEventListener('click', () => {
            nav.classList.toggle('nav-open');
            menuToggle.classList.toggle('active');
        });

        // Sticky header
        const header = document.querySelector('.header');
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 100) header.classList.add('header-scrolled');
            else header.classList.remove('header-scrolled');
        });
    </script>
</body>
</html>