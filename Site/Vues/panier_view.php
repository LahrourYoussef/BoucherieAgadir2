<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Mon panier - Boucherie Agadir</title>
<link rel="stylesheet" href="/Site/Styles/style.css">

<style>
/* ... Tes styles CSS internes restent identiques ... */
body{ font-family:Arial, sans-serif; background:#f5f7fb; margin:0; }
h1{ text-align:center; margin:20px 0; }
.checkout-container{ display:grid; grid-template-columns: 2fr 1fr; gap:30px; width:95%; max-width:1300px; margin:20px auto 80px; }
.back-btn{ display:inline-block; margin:10px 0; padding:10px 15px; background:#2563eb; color:white; border-radius:8px; text-decoration:none; font-size:0.9rem; transition:0.3s; }
.cart-left{ background:#fff; padding:25px; border-radius:16px; box-shadow:0 10px 30px rgba(0,0,0,0.05); }
.cart-table{ width:100%; border-collapse:collapse; }
.cart-table th{ background:#f3f4f6; padding:12px; text-align:left; }
.cart-table td{ padding:12px; border-bottom:1px solid #e5e7eb; }
.cart-product{ display:flex; align-items:center; gap:12px; }
.cart-product img{ width:70px; height:70px; object-fit:cover; border-radius:10px; }
.qte-form{ display:flex; gap:6px; }
.qte-form input{ width:60px; padding:6px; }
.qte-form button{ background:#2563eb; color:white; border:none; border-radius:6px; cursor:pointer; }
.delete-btn{ color:#ef4444; font-size:1.2rem; text-decoration:none; }
.cart-total-box{ margin-top:20px; display:flex; justify-content:space-between; font-size:1.2rem; font-weight:600; }
.total-price{ color:#16a34a; }
.cart-right{ background:#fff; padding:25px; border-radius:16px; box-shadow:0 10px 30px rgba(0,0,0,0.05); position:sticky; top:20px; height:fit-content; }
.client-form{ display:flex; flex-direction:column; gap:12px; }
.form-group{ display:flex; flex-direction:column; }
.form-group label{ font-size:0.85rem; margin-bottom:4px; }
.form-group input, .form-group select{ padding:10px; border-radius:8px; border:1px solid #d1d5db; }
.click-collect{ margin-top:15px; background:#f8fafc; padding:15px; border-radius:14px; border:1px dashed #cbd5e1; }
.shop-info{ margin-top:12px; font-size:0.85rem; background:#ecfeff; padding:12px; border-radius:10px; border-left:5px solid #06b6d4; }
.pay-btn{ margin-top:15px; padding:14px; border:none; border-radius:12px; background:#16a34a; color:white; font-size:1rem; font-weight:600; cursor:pointer; }
@media(max-width:900px){ .checkout-container{ grid-template-columns:1fr; } }
</style>

</head>
<body>
    <header class="header" role="banner">
        <div class="header-container">
            <div class="logo" aria-label="Boucherie Agadir">
              <a href="/index.php"><img src="/Site/images/Logo.webp" alt="Logo Boucherie Agadir" width="45px" ></a>
            </div>
            
            <button class="menu-toggle" aria-label="Menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
            
            <nav class="nav" role="navigation" aria-label="Navigation principale">
                <a href="/index.php#histoire" class="nav-link">La Boucherie</a>
                <a href="/Site/Controleurs/liste_produits.php" class="nav-link">Nos produits</a>
                <a href="/Site/Vues/Promotions.php" class="nav-link">Promotions</a>
                <a href="/Site/Vues/ClickAndCollect.php" class="nav-link">Click & Collect</a>
                <a href="/Site/Vues/Contact.php" class="nav-link">Contact</a>
            </nav>
            
            <div class="icons">
                <button class="cart-button" aria-label="Panier d'achat">
                    <img src="/Site/images/panier.svg" alt="Panier" class="icon" />
                    <span class="cart-badge" aria-hidden="true">0</span>
                </button>
                <a href="/Site/Controleurs/admin/auth.php" class="cart-button" aria-label="Mon Compte">
                    <img src="/Site/images/compte2.png" alt="Compte" class="icon-account" />
                </a>
            </div>
        </div>
    </header>

<h1>🛒 Mon panier</h1>

<a href="/Site/Controleurs/liste_produits.php" class="back-btn">← Retour boutique</a>

<?php if (empty($cart)): ?>
    <p style="text-align:center; margin-top:20px;">Votre panier est vide</p>
<?php else: ?>

<div class="checkout-container">

    <div class="cart-left">
        <table class="cart-table">
            <tr>
                <th>Produit</th>
                <th>Prix</th>
                <th>Qté</th>
                <th>Total</th>
                <th></th>
            </tr>

            <?php foreach ($cart as $item): 
                $ligne_total = $item['prix'] * $item['quantite'];
                $total += $ligne_total;
            ?>
            <tr>
                <td class="cart-product">
                    <img src="/Site/uploads/<?= htmlspecialchars($item['photo']) ?>">
                    <div><b><?= htmlspecialchars($item['nom']) ?></b></div>
                </td>

                <td><?= number_format($item['prix'], 2) ?> €</td>

                <td>
                    <form action="/Site/Controleurs/update_cart.php" method="POST" class="qte-form">
                        <input type="hidden" name="id" value="<?= $item['id'] ?>">
                        <input type="number" name="quantite" value="<?= $item['quantite'] ?>" min="1">
                        <button type="submit">↻</button>
                    </form>
                </td>

                <td><?= number_format($ligne_total, 2) ?> €</td>

                <td>
                    <a href="/Site/Controleurs/remove_from_cart.php?id=<?= $item['id'] ?>" class="delete-btn">❌</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

        <div class="cart-total-box">
            <span>Total :</span>
            <span class="total-price"><?= number_format($total, 2) ?> €</span>
        </div>
    </div>

    <div class="cart-right">
        <form action="/Site/Controleurs/checkout.php" method="POST" class="client-form">
            <h2>🧾 Informations client</h2>
            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="nom" required>
            </div>
            <div class="form-group">
                <label>Prénom</label>
                <input type="text" name="prenom" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Téléphone</label>
                <input type="text" name="tel" required>
            </div>

            <div class="click-collect">
                <h3>🛍 Retrait en magasin</h3>
                <div class="form-group">
                    <label>Date de retrait</label>
                    <input type="date" name="date_retrait" required>
                </div>
                <div class="form-group">
                    <label>Créneau horaire</label>
                    <select name="heure_retrait" required>
                        <option value="">-- Choisir un horaire --</option>
                        <option value="09:30 - 10:00">09:30 - 10:00</option>
                        <option value="18:00 - 18:30">18:00 - 18:30</option>
                    </select>
                </div>
                <div class="shop-info">
                    📍 <b>Boucherie Agadir</b><br>
                    14 Pl. du Béarn, 64150 Mourenx
                </div>
            </div>

            <input type="hidden" name="total" value="<?= $total ?>">
            <button type="submit" class="pay-btn">🧾 Valider la commande</button>
            <a href="/index.php" class="back-btn" style="text-align:center; display:block; margin-top:15px;">← Retour boutique</a>
        </form>
    </div>
</div>

<?php endif; ?>

<footer class="footer" role="contentinfo">
        <div class="footer-container">
    
            <!-- LOGO + DESCRIPTION -->
            <div class="footer-section">
                    <img src="/Site/images/Logo.webp" alt="Logo Boucherie Agadir" width="45px" >
    
                <div class="footer-socials">
                    <a href="https://www.instagram.com/boucherie_agadir_/" aria-label="Instagram"><img src="/Site/images/instagram.png" alt="Instagram" style="width: 33px; height: 33px;"></a>
                    <a href="https://www.tiktok.com/@boucherie.agadir.64" aria-label="TikTok"><img src="/Site/images/tiktok.png" alt="TikTok" style="width: 36px; height: 36px;"></a>
                </div>
            </div>
    
            <!-- PLAN DU SITE -->
            <div class="footer-section">
                <h2>Plan du site</h2>
                <ul>
                    <li><a href="/index.php#accueil">Accueil</a></li>
                    <li><a href="/index.php#histoire">Notre histoire</a></li>
                    <li><a href="/Site/Controleurs/liste_produits.php">Nos produits</a></li>
                    <li><a href="/Site/Vues/Promotions.php">Promotions</a></li>
                    <li><a href="/Site/Vues/ClickAndCollect.php">Click & Collect</a></li>
                    <li><a href="/Site/Vues/Contact.php">Contact</a></li>
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

</body>
</html>