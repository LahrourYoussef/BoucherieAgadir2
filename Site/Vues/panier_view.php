<?php require_once __DIR__ . '/../../config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Mon panier - Boucherie Agadir</title>
<link rel="stylesheet" href="<?= ROOT_URL ?>Site/Styles/style.css">

<style>
/* --- Styles de base --- */
body { font-family: Arial, sans-serif; background: #f5f7fb; margin: 0; }
h1 { text-align: center; margin: 20px 0; }

/* --- Couleurs Noires (Correction Priorité pour tout l'écran) --- */
h1, 
.checkout-container, 
.checkout-container b, 
.checkout-container span, 
.checkout-container td, 
.checkout-container th, 
.checkout-container label, 
.checkout-container h2, 
.checkout-container h3,
.shop-info,
.shop-info b,
.checkout-container p {
    color: #1a1a1a !important; /* Force le noir sur le blanc du style.css */
}

/* Texte des champs de saisie */
input, select, textarea {
    color: #1a1a1a !important;
}

/* --- Mise en page --- */
.checkout-container { display: grid; grid-template-columns: 2fr 1fr; gap: 30px; width: 95%; max-width: 1300px; margin: 20px auto 80px; }

/* Boutons (On force le texte blanc car le fond est coloré) */
.back-btn { display: inline-block; margin: 10px 0; padding: 10px 15px; background: #2563eb; color: white !important; border-radius: 8px; text-decoration: none; font-size: 0.9rem; transition: 0.3s; }
.pay-btn { margin-top: 15px; padding: 14px; border: none; border-radius: 12px; background: #16a34a; color: white !important; font-size: 1rem; font-weight: 600; cursor: pointer; width: 100%; }
.qte-form button { background: #2563eb; color: white !important; border: none; border-radius: 6px; cursor: pointer; padding: 5px 10px; }

/* Panier gauche */
.cart-left { background: #fff; padding: 25px; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
.cart-table { width: 100%; border-collapse: collapse; }
.cart-table th { background: #f3f4f6; padding: 12px; text-align: left; }
.cart-table td { padding: 12px; border-bottom: 1px solid #e5e7eb; }
.cart-product { display: flex; align-items: center; gap: 12px; }
.cart-product img { width: 70px; height: 70px; object-fit: cover; border-radius: 10px; }
.qte-form { display: flex; gap: 6px; }
.qte-form input { width: 60px; padding: 6px; border: 1px solid #ccc; border-radius: 4px; }
.delete-btn { color: #ef4444 !important; font-size: 1.2rem; text-decoration: none; }

/* Totaux */
.cart-total-box { margin-top: 20px; display: flex; justify-content: space-between; font-size: 1.2rem; font-weight: 600; }
.total-price { color: #16a34a !important; }

/* Panier droit (Formulaire) */
.cart-right { background: #fff; padding: 25px; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); position: sticky; top: 20px; height: fit-content; }
.client-form { display: flex; flex-direction: column; gap: 12px; }
.form-group { display: flex; flex-direction: column; }
.form-group label { font-size: 0.85rem; margin-bottom: 4px; }
.form-group input, .form-group select { padding: 10px; border-radius: 8px; border: 1px solid #d1d5db; background: #fff; }

.click-collect { margin-top: 15px; background: #f8fafc; padding: 15px; border-radius: 14px; border: 1px dashed #cbd5e1; }
.shop-info { margin-top: 12px; font-size: 0.85rem; background: #ecfeff; padding: 12px; border-radius: 10px; border-left: 5px solid #06b6d4; }

/* Responsive */
@media(max-width:900px){ 
    .checkout-container { grid-template-columns: 1fr; } 
}
</style>
</head>
<body>
<?php include __DIR__ . '/header.php'; ?>

<h1>🛒 Mon panier</h1>

<div style="max-width:1300px; margin:0 auto; padding:0 20px;">
    <a href="<?= ROOT_URL ?>Site/Controleurs/liste_produits.php" class="back-btn">← Retour boutique</a>
</div>

<?php if (empty($cart)): ?>
    <p style="text-align:center; margin-top:40px; font-size:1.2rem;">Votre panier est vide</p>
<?php else: ?>

<div class="checkout-container">
    <div class="cart-left">
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Qté</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $total = 0; 
                foreach ($cart as $item): 
                    $ligne_total = $item['prix'] * $item['quantite'];
                    $total += $ligne_total;
                ?>
                <tr>
                    <td class="cart-product">
                        <img src="<?= ROOT_URL ?>Site/uploads/<?= htmlspecialchars($item['photo']) ?>">
                        <div><b><?= htmlspecialchars($item['nom']) ?></b></div>
                    </td>
                    
                    <td class="item-price" data-price="<?= $item['prix'] ?>">
                        <?= number_format($item['prix'], 2) ?> €
                    </td>

                    <td>
                        <form action="<?= ROOT_URL ?>Site/Controleurs/update_cart.php" method="POST" class="qte-form">
                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                            <input type="number" name="quantite" class="qte-input" data-id="<?= $item['id'] ?>" value="<?= $item['quantite'] ?>" min="1">
                            <button type="submit">↻</button>
                        </form>
                    </td>

                    <td class="item-subtotal">
                        <?= number_format($ligne_total, 2) ?> €
                    </td>

                    <td>
                        <a href="<?= ROOT_URL ?>Site/Controleurs/remove_from_cart.php?id=<?= $item['id'] ?>" class="delete-btn">❌</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <div class="cart-total-box">
            <span>Total :</span>
            <span class="total-price"><?= number_format($total, 2) ?> €</span>
        </div>
    </div>

    <div class="cart-right">
        <form action="<?= ROOT_URL ?>Site/Controleurs/checkout.php" method="POST" class="client-form">
            <h2>🧾 Informations client</h2>
            <div class="form-group"><label>Nom</label><input type="text" name="nom" required></div>
            <div class="form-group"><label>Prénom</label><input type="text" name="prenom" required></div>
            <div class="form-group"><label>Email</label><input type="email" name="email" required></div>
            <div class="form-group"><label>Téléphone</label><input type="text" name="tel" required></div>

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
                        <option value="10:00 - 10:30">10:00 - 10:30</option>
                        <option value="10:30 - 11:00">10:30 - 11:00</option>
                        <option value="11:00 - 11:30">11:00 - 11:30</option>
                        <option value="11:30 - 12:00">11:30 - 12:00</option>
                        <option value="12:00 - 12:30">12:00 - 12:30</option>
                        <option value="15:30 - 16:00">15:30 - 16:00</option>
                        <option value="16:00 - 16:30">16:00 - 16:30</option>
                        <option value="16:30 - 17:00">16:30 - 17:00</option>
                        <option value="17:00 - 17:30">17:00 - 17:30</option>
                        <option value="17:30 - 18:00">17:30 - 18:00</option>
                        <option value="18:00 - 18:30">18:00 - 18:30</option>
                        <option value="18:30 - 19:00">18:30 - 19:00</option>
                    </select>
                </div>
                <div class="shop-info">
                    📍 <b>Boucherie Agadir</b><br>
                    14 Pl. du Béarn, 64150 Mourenx
                </div>
            </div>
            <input type="hidden" name="total" value="<?= $total ?>">
            <button type="submit" class="pay-btn">🧾 Valider la commande</button>
        </form>
    </div>
</div>
<?php endif; ?>

<?php include __DIR__ . '/footer.php'; ?>

<script src="<?= ROOT_URL ?>Site/js/script.js"></script>

</body>
</html>