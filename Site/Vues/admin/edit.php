<?php
require '../../../config.php'; // connexion PDO

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID invalide");
}

$id = (int) $_GET['id'];


// 🔹 Récupération du produit
$stmt = $pdo->prepare("SELECT * FROM Produit WHERE Id_Produit = ?");
$stmt->execute([$id]);
$produit = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$produit) {
    die("Produit introuvable");
}

// 🔹 Chargement des options depuis la base de données
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


// 🔹 Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom = trim($_POST['nom_produit'] ?? '');
    $description = trim($_POST['description_produit'] ?? '');
    $prix_unitaire = $_POST['prix_unitaire'] ?? '';
    $prix_kg = !empty($_POST['prix_kg']) ? $_POST['prix_kg'] : null;
    $unite = trim($_POST['unite_vente'] ?? '');

    $id_origine = (int)($_POST['id_origine'] ?? 0);
    $id_type_produit = (int)($_POST['id_type_produit'] ?? 0);
    $id_type_viande = (int)($_POST['id_type_viande'] ?? 0);
    $id_sous_categorie = (int)($_POST['id_sous_categorie'] ?? 0);

    // Vérification des champs obligatoires
    if (!$nom || !$description || !$prix_unitaire || !$id_origine || !$id_type_produit || !$id_type_viande || !$id_sous_categorie || !$unite) {
        die("Tous les champs obligatoires doivent être remplis.");
    }

    // Vérifier que les IDs existent dans la base de données
    try {
        // Vérifier Id_Sous_Categorie
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM Sous_Categorie WHERE Id_Sous_Categorie = ?");
        $stmt->execute([$id_sous_categorie]);
        if ($stmt->fetchColumn() == 0) {
            die("Erreur : La sous-catégorie sélectionnée (ID: $id_sous_categorie) n'existe pas dans la base de données.");
        }

        // Vérifier Id_Origine
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM Origine WHERE Id_Origine = ?");
        $stmt->execute([$id_origine]);
        if ($stmt->fetchColumn() == 0) {
            die("Erreur : L'origine sélectionnée (ID: $id_origine) n'existe pas dans la base de données.");
        }

        // Vérifier Id_Type_Produit
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM Type_Produit WHERE Id_Type_Produit = ?");
        $stmt->execute([$id_type_produit]);
        if ($stmt->fetchColumn() == 0) {
            die("Erreur : Le type de produit sélectionné (ID: $id_type_produit) n'existe pas dans la base de données.");
        }

        // Vérifier Id_Type_Viande
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM Type_Viande WHERE Id_Type_Viande = ?");
        $stmt->execute([$id_type_viande]);
        if ($stmt->fetchColumn() == 0) {
            die("Erreur : Le type de viande sélectionné (ID: $id_type_viande) n'existe pas dans la base de données.");
        }
    } catch (PDOException $e) {
        die("Erreur lors de la validation des données : " . $e->getMessage());
    }

    // image actuelle par défaut
    $imageName = $produit['URL_PHOTO'];

    // 🔹 Nouvelle image ?
    if (!empty($_FILES['photo']['name']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $imageName = uniqid() . "_" . preg_replace("/[^a-zA-Z0-9\._-]/", "", basename($_FILES['photo']['name']));
        $target = __DIR__ . "/../../uploads/" . $imageName;
        
        if (!move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
            die("Erreur lors du déplacement du fichier.");
        }
        
        // Supprimer l'ancienne image si elle existe et est différente
        if ($produit['URL_PHOTO'] && $produit['URL_PHOTO'] !== $imageName) {
            $oldImage = __DIR__ . "/uploads/" . $produit['URL_PHOTO'];
            if (file_exists($oldImage)) {
                @unlink($oldImage);
            }
        }
    }

    // 🔹 Update produit
    try {
        $stmt = $pdo->prepare("
            UPDATE Produit SET
                Nom_Produit = ?,
                Description_Produit = ?,
                Prix_Unitaire = ?,
                Prix_KG = ?,
                Unite_Vente = ?,
                URL_PHOTO = ?,
                Id_Origine = ?,
                Id_Type_Produit = ?,
                Id_Type_Viande = ?,
                Id_Sous_Categorie = ?
            WHERE Id_Produit = ?
        ");

        $stmt->execute([
            $nom,
            $description,
            $prix_unitaire,
            $prix_kg,
            $unite,
            $imageName,
            $id_origine,
            $id_type_produit,
            $id_type_viande,
            $id_sous_categorie,
            $id
        ]);

        header("Location: ../../Controleurs/admin/produits_admin.php?success=edit");
        exit;
    } catch (PDOException $e) {
        // Supprimer la nouvelle image en cas d'erreur
        if ($imageName !== $produit['URL_PHOTO']) {
            $newImage = __DIR__ . "/uploads/" . $imageName;
            if (file_exists($newImage)) {
                @unlink($newImage);
            }
        }
        die("Erreur lors de la mise à jour du produit : " . $e->getMessage());
    }
}
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Boucherie Agadir - Viande fraîche et de qualité depuis 1997. Découvrez notre sélection de viandes préparées avec soin." />
    <title>Boucherie Agadir - Viande Fraîche depuis 1997</title>
    <link rel="stylesheet" href="../../Styles/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header" role="banner">
        <div class="header-container">
            <div class="logo" aria-label="Boucherie Agadir">
                <a href="../../../index.php"><img src="../../images/Logo.webp" alt="Logo Boucherie Agadir" width="45px" ></a>
            </div>
            
            <button class="menu-toggle" aria-label="Menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
            
            <nav class="nav" role="navigation" aria-label="Navigation principale">
                <a href="../../../index.php#histoire" class="nav-link">Notre histoire</a>
                <a href="../../Controleurs/liste_produits.php" class="nav-link">Nos produits</a>
                <a href="../Promotions.php" class="nav-link">Promotions</a>
                <a href="../ClickAndCollect.php" class="nav-link">Click & Collect</a>
                <a href="../Contact.php" class="nav-link">Contact</a>
            </nav>
            
            <div class="icons">
                <button class="cart-button" aria-label="Panier d'achat">
                    <img src="../../images/panier.svg" alt="Panier" class="icon" />
                    <span class="cart-badge" aria-hidden="true">0</span>
                </button>
                <a href="users.php" class="cart-button" aria-label="Mon Compte">
                    <img src="../../images/compte2.png" alt="Compte" class="icon-account" />
                </a>
            </div>
        </div>
    </header>

    <main>

        <!-- HERO CONTACT -->
       

        <div class="publication-container edit">

<h2>Modifier la publication</h2>

<form method="POST" enctype="multipart/form-data">

   <!-- Image actuelle + aperçu de nouvelle image -->
<div class="image-preview active" id="imagePreview">
    <img src="uploads/<?= htmlspecialchars($produit['URL_PHOTO']) ?>"
         alt="Image actuelle"
         width="200">
</div>

<!-- Input pour sélectionner une nouvelle image -->
<label>Changer l'image</label>
<input type="file" name="photo" id="imageInput">


    <!-- Nom produit -->
    <label>Nom du produit</label>
    <input
        type="text"
        name="nom_produit"
        value="<?= htmlspecialchars($produit['Nom_Produit']) ?>"
        required
    >

    <!-- Description -->
    <label>Description</label>
    <textarea name="description_produit" required><?= htmlspecialchars($produit['Description_Produit']) ?></textarea>

    <!-- Prix -->
    <label>Prix unitaire (€)</label>
    <input
        type="number"
        step="0.01"
        name="prix_unitaire"
        value="<?= htmlspecialchars($produit['Prix_Unitaire']) ?>"
        required
    >

    <label>Prix au KG (€)</label>
    <input
        type="number"
        step="0.01"
        name="prix_kg"
        value="<?= htmlspecialchars($produit['Prix_KG']) ?>"
    >

    <!-- Unité -->
    <label>Unité de vente</label>
    <select name="unite_vente" required>
        <option value="KG" <?= $produit['Unite_Vente'] == 'KG' ? 'selected' : '' ?>>Kilogramme</option>
        <option value="PIECE" <?= $produit['Unite_Vente'] == 'PIECE' ? 'selected' : '' ?>>Pièce</option>
        <option value="LOT" <?= $produit['Unite_Vente'] == 'LOT' ? 'selected' : '' ?>>Lot</option>
    </select>

 <!-- Origine -->
<label>Origine</label>
<select name="id_origine" required>
    <option value="">-- Choisir une origine --</option>
    <?php foreach ($origines as $origine): ?>
        <option value="<?= htmlspecialchars($origine['Id_Origine']) ?>" 
                <?= ($produit['Id_Origine'] ?? 0) == $origine['Id_Origine'] ? 'selected' : '' ?>>
            <?= htmlspecialchars($origine['Pays']) ?>
        </option>
    <?php endforeach; ?>
</select>

<!-- Type produit -->
<label>Type de produit</label>
<select name="id_type_produit" required>
    <option value="">-- Choisir un type de produit --</option>
    <?php foreach ($typesProduits as $typeProduit): ?>
        <option value="<?= htmlspecialchars($typeProduit['Id_Type_Produit']) ?>" 
                <?= ($produit['Id_Type_Produit'] ?? 0) == $typeProduit['Id_Type_Produit'] ? 'selected' : '' ?>>
            <?= htmlspecialchars($typeProduit['Nom_Type_Produit']) ?>
        </option>
    <?php endforeach; ?>
</select>


<!-- Type viande -->
<label>Type de viande</label>
<select name="id_type_viande" required>
    <option value="">-- Choisir un type de viande --</option>
    <?php foreach ($typesViande as $typeViande): ?>
        <option value="<?= htmlspecialchars($typeViande['Id_Type_Viande']) ?>" 
                <?= ($produit['Id_Type_Viande'] ?? 0) == $typeViande['Id_Type_Viande'] ? 'selected' : '' ?>>
            <?= htmlspecialchars($typeViande['Nom_Type_Viande']) ?>
        </option>
    <?php endforeach; ?>
</select>


<!-- Sous-catégorie -->
<label>Sous-catégorie</label>
<select name="id_sous_categorie" required>
    <option value="">-- Choisir une sous-catégorie --</option>
    <?php foreach ($sousCategories as $sousCategorie): ?>
        <option value="<?= htmlspecialchars($sousCategorie['Id_Sous_Categorie']) ?>" 
                <?= ($produit['Id_Sous_Categorie'] ?? 0) == $sousCategorie['Id_Sous_Categorie'] ? 'selected' : '' ?>>
            <?= htmlspecialchars($sousCategorie['Nom_Sous_Categorie']) ?>
        </option>
    <?php endforeach; ?>
</select>



    <button type="submit">💾 Enregistrer</button>
</form>


<a href="index.php" class="back-link">⬅ Retour</a>

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

    /* GAUCHE : Logo et Réseaux */
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

    /* CENTRE : Groupement des colonnes de liens */
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

    /* Petit trait décoratif sous les titres */
    .footer-section h2::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 30px;
        height: 2px;
        background: #d10f1c; /* Couleur primaire */
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

    /* DROITE : Carte Google Maps */
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

    /* BAS : Copyright et Liens légaux */
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

    /* RESPONSIVE : Tablettes et Mobiles */
    @media (max-width: 1024px) {
        .footer-links-group {
            min-width: 100%;
            order: 2;
        }
        .footer-map {
            order: 3;
            flex: 1 1 100%;
        }
    }

    @media (max-width: 768px) {
        .footer-container {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .footer-brand {
            align-items: center;
            flex: 1 1 100%;
        }
        .footer-section {
            text-align: center;
        }
        .footer-section h2::after {
            left: 50%;
            transform: translateX(-50%);
        }
        .footer-links-group {
            flex-direction: column;
            gap: 40px;
        }
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
                <p>Vendredi : : 09h30 - 12h30,<br> 15h30 - 19h00</p>
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
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2906.123456789!2d-0.6123456789!3d43.37123456789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd56f123456789%3A0x123456789!2zMTQgUGwuIGR1IELDqWFybiwgNjQxNTAgTW91cmVueA!5e0!3m2!1sfr!2sfr!4v1234567890" allowfullscreen="" loading="lazy"></iframe>
        </div>

    </div>

    <div class="footer-bottom">
        <p class="copyright">
            
            <a href="#">CGU</a> • 
            <a href="#">RGPD</a> • 
            <a href="#">Mentions légales</a>
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
// Aperçu de la nouvelle image
const input = document.getElementById("imageInput");
const preview = document.getElementById("imagePreview");

input.addEventListener("change", () => {
    const file = input.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = () => {
        preview.innerHTML = `<img src="${reader.result}" alt="Nouvelle image" width="200">`;
        preview.classList.add("active");
    };
    reader.readAsDataURL(file);
});
</script>




</body>
</html>