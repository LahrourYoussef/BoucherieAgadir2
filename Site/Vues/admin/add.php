<?php
require 'config.php';

// ================== CHARGEMENT DES OPTIONS DEPUIS LA BASE DE DONNÉES ==================

// Charger les origines
$stmt = $pdo->query("SELECT Id_Origine, Pays FROM Origine ORDER BY Pays");
$origines = $stmt->fetchAll();

// Charger les types de produits
$stmt = $pdo->query("SELECT Id_Type_Produit, Nom_Type_Produit FROM Type_Produit ORDER BY Nom_Type_Produit");
$typesProduits = $stmt->fetchAll();

// Charger les types de viande
$stmt = $pdo->query("SELECT Id_Type_Viande, Nom_Type_Viande FROM Type_Viande ORDER BY Nom_Type_Viande");
$typesViande = $stmt->fetchAll();

// Charger les sous-catégories
$stmt = $pdo->query("SELECT Id_Sous_Categorie, Nom_Sous_Categorie FROM Sous_Categorie ORDER BY Nom_Sous_Categorie");
$sousCategories = $stmt->fetchAll();

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Boucherie Agadir - Viande fraîche et de qualité depuis 1997. Découvrez notre sélection de viandes préparées avec soin." />
    <title>Boucherie Agadir - Viande Fraîche depuis 1997</title>
    <link rel="stylesheet" href="styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header" role="banner">
        <div class="header-container">
        <div class="logo" aria-label="Boucherie Agadir">
                <img src="images/Logo.png" alt="Logo Boucherie Agadir" width="45px" > 
            </div>
            
            <button class="menu-toggle" aria-label="Menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
            
            <nav class="nav" role="navigation" aria-label="Navigation principale">
                <a href="#boucherie" class="nav-link">La Boucherie</a>
                <a href="#produits" class="nav-link">Nos produits</a>
                <a href="#promotions" class="nav-link">Promotions</a>
                <a href="#click-collect" class="nav-link">Click & Collect</a>
                <a href="#contact" class="nav-link">Contact</a>
            </nav>
            
            <div class="icons">
                <button class="cart-button" aria-label="Panier d'achat">
                    <img src="images/www.apple.com-27.svg" alt="Panier" class="icon" />
                    <span class="cart-badge" aria-hidden="true">0</span>
                </button>
            </div>
        </div>
    </header>

    <main>

        <!-- HERO CONTACT -->
       
        <div class="publication-container">
    <h2>Nouvelle publication</h2>

    <form action="upload.php" method="POST" enctype="multipart/form-data">

<!-- Image produit -->
<label>Photo du produit</label>
<input type="file" name="photo" id="photoInput" required>

<div class="image-preview" id="imagePreview">
    <span>Aperçu de l’image</span>
</div>

<!-- Nom produit -->
<label>Nom du produit</label>
<input type="text" name="nom_produit" placeholder="Nom du produit" required>

<!-- Description -->
<label>Description</label>
<textarea name="description_produit" placeholder="Description du produit"></textarea>

<!-- Prix -->
<label>Prix unitaire (€)</label>
<input type="number" step="0.01" name="prix_unitaire" required>

<label>Prix au KG (€)</label>
<input type="number" step="0.01" name="prix_kg">

<!-- Unité de vente -->
<label>Unité de vente</label>
<select name="unite_vente" required>
    <option value="">Choisir une unité</option>
    <option value="KG">Kilogramme</option>
    <option value="PIECE">Pièce</option>
    <option value="LOT">Lot</option>
</select>

<!-- Origine -->
<label>Origine</label>
<select name="id_origine" required>
    <option value="">Choisir une origine</option>
    <?php foreach ($origines as $origine): ?>
        <option value="<?= htmlspecialchars($origine['Id_Origine']) ?>">
            <?= htmlspecialchars($origine['Pays']) ?>
        </option>
    <?php endforeach; ?>
</select>

<!-- Type de produit -->
<label>Type de produit</label>
<select name="id_type_produit" required>
    <option value="">Choisir un type</option>
    <?php foreach ($typesProduits as $typeProduit): ?>
        <option value="<?= htmlspecialchars($typeProduit['Id_Type_Produit']) ?>">
            <?= htmlspecialchars($typeProduit['Nom_Type_Produit']) ?>
        </option>
    <?php endforeach; ?>
</select>

<!-- Type de viande -->
<label>Type de viande</label>
<select name="id_type_viande" required>
    <option value="">Choisir une viande</option>
    <?php foreach ($typesViande as $typeViande): ?>
        <option value="<?= htmlspecialchars($typeViande['Id_Type_Viande']) ?>">
            <?= htmlspecialchars($typeViande['Nom_Type_Viande']) ?>
        </option>
    <?php endforeach; ?>
</select>

<!-- Sous-catégorie -->
<label>Sous-catégorie</label>
<select name="id_sous_categorie" required>
    <option value="">Choisir une sous-catégorie</option>
    <?php foreach ($sousCategories as $sousCategorie): ?>
        <option value="<?= htmlspecialchars($sousCategorie['Id_Sous_Categorie']) ?>">
            <?= htmlspecialchars($sousCategorie['Nom_Sous_Categorie']) ?>
        </option>
    <?php endforeach; ?>

</select>

<button type="submit">Publier le produit</button>

</form>


</div>

    
    </main>
    

    <footer class="footer" role="contentinfo">
        <div class="footer-container">
    
            <!-- LOGO + DESCRIPTION -->
            <div class="footer-section">
                <div class="logo" aria-label="Boucherie Agadir">
                    BOUCHERIE<span>AGADIR</span>
                </div>
                <p>Votre boucher de confiance depuis 1997</p>
    
                <div class="footer-socials">
                    <a href="#" aria-label="Facebook">📘</a>
                    <a href="#" aria-label="Instagram">📸</a>
                    <a href="#" aria-label="TikTok">🎵</a>
                </div>
            </div>
    
            <!-- PLAN DU SITE -->
            <div class="footer-section">
                <h2>Plan du site</h2>
                <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Produits</a></li>
                    <li><a href="#">Click & Collect</a></li>
                    <li><a href="#">À propos</a></li>
                    <li><a href="#">Contact</a></li>
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
                <p>Email : Ben20mohamed97@gmail.com</p>
                <p>Tél : 06 27 29 85 56</p>
                <p>📍 14 Pl. du Béarn, 64150 Mourenx</p>
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
            <p>
                © 2024 Boucherie Agadir — Tous droits réservés • 
                <a href="#">CGU</a> • 
                <a href="#">RGPD</a> • 
                <a href="#">Mentions légales</a>
            </p>
            <p class="dev">
                Développé par <strong>BTS SIO 2</strong>
            </p>
        </div>
    </footer>

    <div class="success-popup" id="successPopup">
    <div class="success-card">
        <div class="success-icon">✔</div>
        <h3>Publication réussie</h3>
        <p>Ton produit a bien été publié 🎉</p>
    </div>
</div>

    

    <script>
        // Menu mobile toggle
        const menuToggle = document.querySelector('.menu-toggle');
        const nav = document.querySelector('.nav');
        
        menuToggle.addEventListener('click', () => {
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
            menuToggle.setAttribute('aria-expanded', !isExpanded);
            nav.classList.toggle('nav-open');
            menuToggle.classList.toggle('active');
        });

        // Sticky header
        const header = document.querySelector('.header');
        let lastScroll = 0;

        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;
            if (currentScroll > 100) {
                header.classList.add('header-scrolled');
            } else {
                header.classList.remove('header-scrolled');
            }
            lastScroll = currentScroll;
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
    
    <script>
// Gestion de l'aperçu de l'image avant upload
const input = document.getElementById("photoInput"); // correspond au name="photo"
const preview = document.getElementById("imagePreview");

input.addEventListener("change", () => {
    const file = input.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = () => {
        preview.innerHTML = `<img src="${reader.result}" alt="Aperçu image">`;
        preview.classList.add("active");
    };
    reader.readAsDataURL(file);
});
</script>

<script>
// Popup succès après insertion
const params = new URLSearchParams(window.location.search);
const popup = document.getElementById("successPopup");

if (params.get("success") === "1") {
    popup.classList.add("active");

    setTimeout(() => {
        popup.classList.remove("active");
        history.replaceState(null, "", window.location.pathname);
    }, 3000);
}
</script>


</body>
</html>