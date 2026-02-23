<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Boucherie Agadir</title>
    <link rel="stylesheet" href="../../Styles/style.css">
</head>
<body>
<?php include __DIR__ . '/../header.php'; ?>

    <main>
        <center> 
            <h1 class="headMenu">Bienvenue sur le menu de gestion <?= htmlspecialchars($nomAdmin) ?></h1>
        </center> 
        <br>

        <section class="products-grid" style="padding: 50px 20px; max-width: 1200px; margin: auto;">
            <div class="product-card">
                <div class="product-image">
                    <img src="../../images/produit.png" alt="Illustration produits">
                </div>
                <div class="product-info">
                    <h3>Gestion des produits</h3>
                    <div class="product-footer">
                        <a href="produits_admin.php" class="product-btn" style="text-decoration: none; text-align: center; width: 100%;">Gérer</a>
                    </div>
                </div>
            </div>
            
            <div class="product-card">
                <div class="product-image">
                    <img src="../../images/post.png" alt="Illustration posts">
                </div>
                <div class="product-info">
                    <h3>Gestion des posts</h3>
                    <div class="product-footer">
                        <a href="#" class="product-btn" style="text-decoration: none; text-align: center; width: 100%;">Gérer</a>
                    </div>
                </div>
            </div>
            
            <div class="product-card">
                <div class="product-image">
                    <img src="../../images/user.png" alt="Illustration users">
                </div>
                <div class="product-info">
                    <h3>Gestion des users (admin)</h3>
                    <div class="product-footer" style="display: flex; gap: 10px;">
                        <a href="register.php" class="product-btn" style="text-decoration: none; text-align: center; flex: 1;">Ajouter</a>
                        <a href="users.php" class="product-btn" style="text-decoration: none; text-align: center; flex: 1;">Gérer</a>
                    </div>
                </div>
            </div>
        </section>

        <center>
            <p class="headMenu">Cliquer pour vous déconnecter 👇</p> <br>
            <button id="buttonDeco"><a href="../../Controleurs/admin/logout.php" >Déconnexion</a></button>
        </center> 
        <br><br>
    </main>


    <?php include __DIR__ . '/../footer.php'; ?>

     <script src="../../js/script.js"></script>
     <script>
        document.getElementById('buttonDeco').addEventListener('click', function() {
            if (confirm('Êtes-vous sûr de vouloir vous déconnecter ?')) {
                window.location.href = '../../Controleurs/admin/logout.php';
            }
        });

   
</body>
</html>