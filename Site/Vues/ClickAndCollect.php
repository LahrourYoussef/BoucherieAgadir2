<?php require_once __DIR__ . '/../../config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Boucherie Agadir - Viande fraîche et de qualité depuis 2022. Découvrez notre sélection de viandes préparées avec soin." />
    <title>Click & Collect - Boucherie Agadir</title>
    <link rel="stylesheet" href="<?= ROOT_URL ?>Site/Styles/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        /* On cible uniquement le contour (stroke) des SVGs dans la section des étapes */
        .col-Container svg {
            stroke: #000000 !important;
            width: 80px;
            height: 80px;
            margin-top: 15px;
        }

        /* On centre le titre sans modifier sa couleur */
        .h1-ClickCollect {
            text-align: center;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <?php include __DIR__ . '/header.php'; ?>

    <main>
        <section class="hero-ClickCollect" id="accueil" style="padding-top: 80px;">
            
            <section class="click-collect" id="click-collect">
                <div class="container">
                    <div class="click-collect-content">
                        <div class="click-collect-text">
                            <span class="section-tagline">SERVICE RAPIDE</span>
                            <h2>Click & Collect</h2>
                            <p class="lead">
                                Commandez en ligne et récupérez vos produits frais en magasin. Simple, rapide et pratique !
                            </p>
                            <ul class="features-list">
                                <li>
                                    <span class="feature-icon">✓</span>
                                    <span>Commande en ligne 24/7</span>
                                </li>
                                <li>
                                    <span class="feature-icon">✓</span>
                                    <span>Préparation le jour même</span>
                                </li>
                                <li>
                                    <span class="feature-icon">✓</span>
                                    <span>Retrait sans attente</span>
                                </li>
                                <li>
                                    <span class="feature-icon">✓</span>
                                    <span>Paiement en ligne sécurisé</span>
                                </li>
                            </ul>
                        </div>
                        <div class="click-collect-visual">
                            <div class="visual-card">
                                <div class="step">
                                    <div class="step-number">1</div>
                                    <div class="step-text">Choisissez vos produits</div>
                                </div>
                                <div class="step">
                                    <div class="step-number">2</div>
                                    <div class="step-text">Validez votre commande</div>
                                </div>
                                <div class="step">
                                    <div class="step-number">3</div>
                                    <div class="step-text">Récupérez en magasin</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <h1 class="h1-ClickCollect">Le Click & Collect en 3 étapes</h1>

            <div class="hero-col">
                <div class="col-Container">
                    <h2>1 Choisissez vos produits</h2>
                    <p>Commandez en ligne et retirez vos produits en magasin</p>
                    <center>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.288 15.038a5.25 5.25 0 0 1 7.424 0M5.106 11.856c3.807-3.808 9.98-3.808 13.788 0M1.924 8.674c5.565-5.565 14.587-5.565 20.152 0M12.53 18.22l-.53.53-.53-.53a.75.75 0 0 1 1.06 0Z" />
                        </svg>
                    </center>
                </div>

                <div class="col-Container">
                    <h2>2 Validez votre commande</h2>
                    <p>Une fois votre commande terminée, vous pouvez choisir la date et l'heure de retrait pour votre commande.</p>
                    <center>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </center>
                </div>

                <div class="col-Container">
                    <h2>3 Récupérez en magasin</h2>
                    <p>Sélectionnez un mode de paiement pour régler l'acompte demandé et il ne vous reste plus qu'à récupérer votre commande en magasin.</p>
                    <center>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                        </svg>
                    </center>
                </div>
            </div>
        </section>
    </main>

    <?php include __DIR__ . '/footer.php'; ?>
   
    <script src="<?= ROOT_URL ?>Site/js/script.js"></script>
</body>
</html>