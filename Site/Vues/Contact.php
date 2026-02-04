<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Boucherie Agadir - Viande fraîche et de qualité depuis 2022. Découvrez notre sélection de viandes préparées avec soin." />
    <title>Contact</title>
    <link rel="stylesheet" href="../Styles/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header" role="banner">
        <div class="header-container">
            <div class="logo" aria-label="Boucherie Agadir">
               <a href="../../index.php"><img src="../images/Logo.webp" alt="Logo Boucherie Agadir" width="45px" ></a>
            </div>
            
            <button class="menu-toggle" aria-label="Menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
            
            <nav class="nav" role="navigation" aria-label="Navigation principale">
                <a href="../../index.php#histoire" class="nav-link">Notre histoire</a>
                <a href="#produits" class="nav-link">Nos produits</a>
                <a href="Promotions.php" class="nav-link">Promotions</a>
                <a href="ClickAndCollect.php" class="nav-link">Click & Collect</a>
                <a href="Contact.php" class="nav-link">Contact</a>
            </nav>
            
            <div class="icons">
                <button class="cart-button" aria-label="Panier d'achat">
                    <img src="../images/www.apple.com-27.svg" alt="Panier" class="icon" />
                    <span class="cart-badge" aria-hidden="true">0</span>
                </button>
            </div>
        </div>
    </header>

    <main>

        <!-- HERO CONTACT -->
       
        </section>
    
        <!-- SECTION CONTACT -->
        <section class="contact">
            <div class="container">
    
                <div class="section-header">
                    <h2>Nous contacter</h2>
                    <p class="section-description">
                        Passez nous voir en magasin ou envoyez-nous un message via le formulaire ci-dessous.
                    </p>
                    
                </div>
    
                <div class="contact-grid">
    
                    <!-- INFOS CONTACT -->
                    <div class="contact-info">
    
                        <div class="visual-card">
                            <div class="step">
                                <img src="../images/location.png" alt="Localisation" ></a>
                                <div class="step-text">
                                    14 Pl. du Béarn 64150 Mourenx
                                </div>
                            </div>
    
                            <div class="step">
                                <img src="../images/telephone.png" alt="Téléphone" ></a>
                                <div class="step-text">
                                    06 27 29 85 56
                                </div>
                            </div>
    
                            <div class="step">
                                <img src="../images/mail.png" alt="Email" ></a>
                                <div class="step-text">
                                    Ben20mohamed97@gmail.com
                                </div>
                            </div>
    
                            <div class="step">
                                <img src="../images/horaires.png" alt="Horaires" ></a>
                                <div class="step-text">
                                    Mardi au Samedi<br>
                                    09h30 - 13h00 / 15h30 - 19h00
                                </div>
                            </div>
                        </div>

                      <!-- FORMULAIRE -->
<!-- FORMULAIRE -->
<!-- FORMULAIRE CONTACT FINAL -->
<div class="contact-form-container visual-card">
    <form id="contact-form" action="https://formsubmit.co/undeuxundeuxtestetest@gmail.com" method="POST" class="contact-form">

        <div class="form-row">
            <input type="text" name="name" placeholder="Votre nom" required>
            <input type="email" name="email" placeholder="Votre email" required>
        </div>

        <div class="form-row">
            <input type="tel" name="phone" placeholder="Téléphone">
            <input type="text" name="subject" placeholder="Sujet">
        </div>

        <textarea rows="6" name="message" placeholder="Votre message..." required></textarea>

        <button type="submit" class="cta">Envoyer le message</button>

        <!-- protection anti-spam désactivée pour test -->
        <input type="hidden" name="_captcha" value="false">
    </form>

    <!-- Message de confirmation -->
    <div id="form-message" style="display:none; color:green; margin-top:10px;">
        Merci ! Votre message a été envoyé avec succès.
    </div>
</div>

<script>
document.getElementById('contact-form').addEventListener('submit', function(e){
    e.preventDefault(); // empêche le rechargement
    const form = this;
    
    fetch(form.action, {
        method: 'POST',
        body: new FormData(form)
    }).then(response => {
        if(response.ok){
            document.getElementById('form-message').style.display = 'block';
            form.reset();
        } else {
            alert('Une erreur est survenue, veuillez réessayer.');
        }
    }).catch(error => {
        alert('Une erreur est survenue, veuillez réessayer.');
    });
});
</script>



                        
    
                    
                    </div>
    
                </div>
    
            </div>
        </section>
    
    </main>
    

    <footer class="footer" role="contentinfo">
        <div class="footer-container">
    
            <!-- LOGO + DESCRIPTION -->
            <div class="footer-section">
                    <img src="../images/Logo.webp" alt="Logo Boucherie Agadir" width="60px" >
    
                <div class="footer-socials">
                    <a href="https://www.instagram.com/boucherie_agadir_/" aria-label="Instagram"><img src="../images/instagram.png" alt="Instagram" style="width: 33px; height: 33px;"></a>
                    <a href="https://www.tiktok.com/@boucherie.agadir.64" aria-label="TikTok"><img src="../images/tiktok.png" alt="TikTok" style="width: 36px; height: 36px;"></a>
                </div>
            </div>
    
            <!-- PLAN DU SITE -->
            <div class="footer-section">
                <h2>Plan du site</h2>
                <ul>
                    <li><a href="../../index.php">Accueil</a></li>
                    <li><a href="../../index.php#histoire">Notre histoire</a></li>
                    <li><a href="../../index.php#produits">Nos produits</a></li>
                    <li><a href="Promotions.php">Promotions</a></li>
                    <li><a href="ClickAndCollect.php">Click & Collect</a></li>
                    <li><a href="Contact.php">Contact</a></li>
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
            <p>
                Tous droits réservés • 
                <a href="#">CGU</a> • 
                <a href="#">RGPD</a> • 
                <a href="#">Mentions légales</a>
            </p>
            <p class="dev">
                Développé par <strong>BTS SIO 2</strong>
            </p>
        </div>
    </footer>
    

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
</body>
</html>