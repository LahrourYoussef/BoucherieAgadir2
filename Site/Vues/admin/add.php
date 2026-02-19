<?php
require '../../../config.php';

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
    <meta name="description" content="Boucherie Agadir - Viande fraîche et de qualité depuis 2022. Découvrez notre sélection de viandes préparées avec soin." />
    <title>Boucherie Agadir - Ajouter un produit</title>
    <link rel="stylesheet" href="../../../Site/Styles/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header" role="banner">
        <div class="header-container">
            <div class="logo" aria-label="Boucherie Agadir">
                <a href="../../../index.php"><img src="../../../Site/images/Logo.webp" alt="Logo Boucherie Agadir" width="45px" ></a>
            </div>
            
            <button class="menu-toggle" aria-label="Menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
            
            <nav class="nav" role="navigation" aria-label="Navigation principale">
                <a href="../../../index.php#histoire" class="nav-link">Notre histoire</a>
                <a href="../../../Site/Controleurs/liste_produits.php" class="nav-link">Nos produits</a>
                <a href="../../Vues/Promotions.php" class="nav-link">Promotions</a>
                <a href="../../Vues/ClickAndCollect.php" class="nav-link">Click & Collect</a>
                <a href="../../Vues/Contact.php" class="nav-link">Contact</a>
            </nav>
            
            <div class="icons">
                <button class="cart-button" aria-label="Panier d'achat">
                    <img src="../../../Site/images/panier.png" alt="Panier" class="icon-cart" />
                    <span class="cart-badge" aria-hidden="true">0</span>
                </button>
                <a href="users.php" class="cart-button" aria-label="Mon Compte">
                    <img src="../../../Site/images/compte2.png" alt="Compte" class="icon-account" />
                </a>
            </div>
        </div>
    </header>

    <main>
        <div class="publication-container">
            <h2>Nouvelle publication</h2>
            <form action="../../Controleurs/admin/upload.php" method="POST" enctype="multipart/form-data">

                <label>Photo du produit</label>
                <input type="file" name="photo" id="photoInput" required>

                <div class="image-preview" id="imagePreview">
                    <span>Aperçu de l’image</span>
                </div>

                <label>Nom du produit</label>
                <input type="text" name="nom_produit" placeholder="Nom du produit" required>

                <label>Description</label>
                <textarea name="description_produit" placeholder="Description du produit"></textarea>

                <label>Prix unitaire (€)</label>
                <input type="number" step="0.01" name="prix_unitaire" required>

                <label>Prix au KG (€)</label>
                <input type="number" step="0.01" name="prix_kg">

                <label>Unité de vente</label>
                <select name="unite_vente" required>
                    <option value="">Choisir une unité</option>
                    <option value="KG">Kilogramme</option>
                    <option value="PIECE">Pièce</option>
                    <option value="LOT">Lot</option>
                </select>

                <label>Origine</label>
                <select name="id_origine" required>
                    <option value="">Choisir une origine</option>
                    <?php foreach ($origines as $origine): ?>
                        <option value="<?= htmlspecialchars($origine['Id_Origine']) ?>">
                            <?= htmlspecialchars($origine['Pays']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <label>Type de produit</label>
                <select name="id_type_produit" required>
                    <option value="">Choisir un type</option>
                    <?php foreach ($typesProduits as $typeProduit): ?>
                        <option value="<?= htmlspecialchars($typeProduit['Id_Type_Produit']) ?>">
                            <?= htmlspecialchars($typeProduit['Nom_Type_Produit']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <label>Type de viande</label>
                <select name="id_type_viande" required>
                    <option value="">Choisir une viande</option>
                    <?php foreach ($typesViande as $typeViande): ?>
                        <option value="<?= htmlspecialchars($typeViande['Id_Type_Viande']) ?>">
                            <?= htmlspecialchars($typeViande['Nom_Type_Viande']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>

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
            <div class="footer-brand">
                <div class="footer-logo">
                    <img src="../../../Site/images/Logo.webp" alt="Logo Boucherie Agadir" width="60">
                </div>
                <div class="footer-socials">
                    <a href="https://www.instagram.com/boucherie_agadir_/" aria-label="Instagram">
                        <img src="../../../Site/images/instagram.png" alt="Instagram" width="24" height="24">
                    </a>
                    <a href="https://www.tiktok.com/@boucherie.agadir.64" aria-label="TikTok">
                        <img src="../../../Site/images/tiktok.png" alt="TikTok" width="26" height="26">
                    </a>
                </div>
            </div>

            <div class="footer-links-group">
                <div class="footer-section">
                    <h2>Plan du site</h2>
                    <ul>
                        <li><a href="../../../index.php#accueil">Accueil</a></li>
                        <li><a href="../../../index.php#histoire">Notre histoire</a></li>
                        <li><a href="../../../Site/Controleurs/liste_produits.php">Nos produits</a></li>
                        <li><a href="../../Vues/Promotions.php">Promotions</a></li>
                        <li><a href="../../Vues/ClickAndCollect.php">Click & Collect</a></li>
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
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2900.274367843064!2d-0.6325365238468116!3d43.37128687111687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd56f651fe5aaaab%3A0x91bd7d0d97301f1a!2sBoucherie%20halal%20Mourenx!5e0!3m2!1sfr!2sfr!4v1771267825731!5m2!1sfr!2sfr" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>

        <div class="footer-bottom">
            <p class="copyright">
                <a href="../../Vues/cgu.php">CGU</a> • 
                <a href="../../Vues/rgpd.php">RGPD</a> • 
                <a href="../../Vues/mentions-legales.php">Mentions légales</a>
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
        // Menu mobile
        const menuToggle = document.querySelector('.menu-toggle');
        const nav = document.querySelector('.nav');
        menuToggle.addEventListener('click', () => {
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
            menuToggle.setAttribute('aria-expanded', !isExpanded);
            nav.classList.toggle('nav-open');
            menuToggle.classList.toggle('active');
        });

        // Aperçu image
        const input = document.getElementById("photoInput");
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

        // Popup succès
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