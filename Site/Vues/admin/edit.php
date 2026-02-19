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
$stmt = $pdo->query("SELECT Id_Origine, Pays FROM Origine ORDER BY Pays");
$origines = $stmt->fetchAll();

$stmt = $pdo->query("SELECT Id_Type_Produit, Nom_Type_Produit FROM Type_Produit ORDER BY Nom_Type_Produit");
$typesProduits = $stmt->fetchAll();

$stmt = $pdo->query("SELECT Id_Type_Viande, Nom_Type_Viande FROM Type_Viande ORDER BY Nom_Type_Viande");
$typesViande = $stmt->fetchAll();

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

    if (!$nom || !$description || !$prix_unitaire || !$id_origine || !$id_type_produit || !$id_type_viande || !$id_sous_categorie || !$unite) {
        die("Tous les champs obligatoires doivent être remplis.");
    }

    // image actuelle par défaut
    $imageName = $produit['URL_PHOTO'];

    // 🔹 Nouvelle image ?
    if (!empty($_FILES['photo']['name']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $imageName = uniqid() . "_" . preg_replace("/[^a-zA-Z0-9\._-]/", "", basename($_FILES['photo']['name']));
        $target = __DIR__ . "/../../uploads/" . $imageName; // Dossier Site/uploads/
        
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
            // Supprimer l'ancienne image si elle existe
            if ($produit['URL_PHOTO']) {
                $oldImage = __DIR__ . "/../../uploads/" . $produit['URL_PHOTO'];
                if (file_exists($oldImage)) {
                    @unlink($oldImage);
                }
            }
        } else {
            die("Erreur lors du déplacement du fichier.");
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
            $nom, $description, $prix_unitaire, $prix_kg, $unite,
            $imageName, $id_origine, $id_type_produit, $id_type_viande, $id_sous_categorie, $id
        ]);

        header("Location: produits_admin.php?success=edit");
        exit;
    } catch (PDOException $e) {
        die("Erreur lors de la mise à jour : " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Boucherie Agadir - Modifier Produit</title>
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
                <span></span><span></span><span></span>
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
                    <img src="../../images/panier.png" alt="Panier" class="icon-cart" />
                    <span class="cart-badge" aria-hidden="true">0</span>
                </button>
                <a href="users.php" class="cart-button" aria-label="Mon Compte">
                    <img src="../../images/compte2.png" alt="Compte" class="icon-account" />
                </a>
            </div>
        </div>
    </header>

    <main>
        <div class="publication-container edit">
            <h2>Modifier la publication</h2>
            <form method="POST" enctype="multipart/form-data">
                <div class="image-preview active" id="imagePreview">
                    <img src="../../uploads/<?= htmlspecialchars($produit['URL_PHOTO']) ?>" alt="Image actuelle" width="200">
                </div>

                <label>Changer l'image</label>
                <input type="file" name="photo" id="imageInput">

                <label>Nom du produit</label>
                <input type="text" name="nom_produit" value="<?= htmlspecialchars($produit['Nom_Produit']) ?>" required>

                <label>Description</label>
                <textarea name="description_produit" required><?= htmlspecialchars($produit['Description_Produit']) ?></textarea>

                <label>Prix unitaire (€)</label>
                <input type="number" step="0.01" name="prix_unitaire" value="<?= htmlspecialchars($produit['Prix_Unitaire']) ?>" required>

                <label>Prix au KG (€)</label>
                <input type="number" step="0.01" name="prix_kg" value="<?= htmlspecialchars($produit['Prix_KG']) ?>">

                <label>Unité de vente</label>
                <select name="unite_vente" required>
                    <option value="KG" <?= $produit['Unite_Vente'] == 'KG' ? 'selected' : '' ?>>Kilogramme</option>
                    <option value="PIECE" <?= $produit['Unite_Vente'] == 'PIECE' ? 'selected' : '' ?>>Pièce</option>
                    <option value="LOT" <?= $produit['Unite_Vente'] == 'LOT' ? 'selected' : '' ?>>Lot</option>
                </select>

                <label>Origine</label>
                <select name="id_origine" required>
                    <option value="">-- Choisir --</option>
                    <?php foreach ($origines as $origine): ?>
                        <option value="<?= $origine['Id_Origine'] ?>" <?= ($produit['Id_Origine'] == $origine['Id_Origine']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($origine['Pays']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <label>Type de produit</label>
                <select name="id_type_produit" required>
                    <option value="">-- Choisir --</option>
                    <?php foreach ($typesProduits as $tp): ?>
                        <option value="<?= $tp['Id_Type_Produit'] ?>" <?= ($produit['Id_Type_Produit'] == $tp['Id_Type_Produit']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($tp['Nom_Type_Produit']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <label>Type de viande</label>
                <select name="id_type_viande" required>
                    <option value="">-- Choisir --</option>
                    <?php foreach ($typesViande as $tv): ?>
                        <option value="<?= $tv['Id_Type_Viande'] ?>" <?= ($produit['Id_Type_Viande'] == $tv['Id_Type_Viande']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($tv['Nom_Type_Viande']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <label>Sous-catégorie</label>
                <select name="id_sous_categorie" required>
                    <option value="">-- Choisir --</option>
                    <?php foreach ($sousCategories as $sc): ?>
                        <option value="<?= $sc['Id_Sous_Categorie'] ?>" <?= ($produit['Id_Sous_Categorie'] == $sc['Id_Sous_Categorie']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($sc['Nom_Sous_Categorie']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <button type="submit">💾 Enregistrer</button>
            </form>
            <a href="produits_admin.php" class="back-link">⬅ Retour</a>
        </div>
    </main>

    <style>
        .footer { background: #ffffff; color: #1a1a1a; padding: 60px 0 20px; font-family: "Inter", sans-serif; border-top: 1px solid #f0f0f0; }
        .footer-container { max-width: 1400px; margin: 0 auto; padding: 0 40px; display: flex; justify-content: space-between; align-items: flex-start; gap: 40px; flex-wrap: wrap; }
        .footer-brand { flex: 0 0 150px; display: flex; flex-direction: column; gap: 20px; }
        .footer-socials { display: flex; gap: 15px; }
        .footer-socials a img { transition: transform 0.3s ease; }
        .footer-socials a:hover img { transform: translateY(-3px); }
        .footer-links-group { flex: 1; display: flex; justify-content: space-around; gap: 30px; min-width: 500px; }
        .footer-section { text-align: left; }
        .footer-section h2 { font-size: 14px; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 20px; color: #1a1a1a; position: relative; }
        .footer-section h2::after { content: ''; position: absolute; bottom: -8px; left: 0; width: 30px; height: 2px; background: #d10f1c; }
        .footer-section p, .footer-section ul li a { font-size: 14px; color: #555555; line-height: 1.8; text-decoration: none; transition: color 0.3s ease; }
        .footer-section ul { list-style: none; padding: 0; }
        .footer-section ul li a:hover { color: #d10f1c; }
        .footer-map { flex: 0 0 350px; }
        .footer-map h2 { font-size: 14px; font-weight: 800; text-transform: uppercase; margin-bottom: 20px; color: #1a1a1a; }
        .footer-map iframe { width: 100%; height: 180px; border-radius: 12px; border: none; box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08); }
        .footer-bottom { max-width: 1400px; margin: 50px auto 0; padding: 20px 40px 0; border-top: 1px solid #eeeeee; text-align: center; }
        .copyright { font-size: 13px; color: #999; }
        .copyright a { color: #999; text-decoration: none; margin: 0 8px; transition: color 0.3s ease; }
        .copyright a:hover { color: #d10f1c; }
        @media (max-width: 1024px) { .footer-links-group { min-width: 100%; order: 2; } .footer-map { order: 3; flex: 1 1 100%; } }
        @media (max-width: 768px) { .footer-container { flex-direction: column; align-items: center; text-align: center; } .footer-brand { align-items: center; flex: 1 1 100%; } .footer-section { text-align: center; } .footer-section h2::after { left: 50%; transform: translateX(-50%); } .footer-links-group { flex-direction: column; gap: 40px; } }
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
                    <p>Mar - Sam : 09h30 - 13h00 / 15h30 - 19h00</p>
                    <p>Vendredi : 09h30 - 12h30 / 15h30 - 19h00</p>
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
                <a href="../cgu.php">CGU</a> • <a href="../rgpd.php">RGPD</a> • <a href="../mentions-legales.php">Mentions légales</a>
            </p>
        </div>
    </footer>

    <script>
        const menuToggle = document.querySelector('.menu-toggle');
        const nav = document.querySelector('.nav');
        menuToggle.addEventListener('click', () => {
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
            menuToggle.setAttribute('aria-expanded', !isExpanded);
            nav.classList.toggle('nav-open');
            menuToggle.classList.toggle('active');
        });

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