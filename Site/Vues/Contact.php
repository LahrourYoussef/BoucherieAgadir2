<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Boucherie Agadir - Viande fraîche et de qualité depuis 2022. Découvrez notre sélection de viandes préparées avec soin." />
    <title>Contact</title>
    <link rel="stylesheet" href="/Site/Styles/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <?php include __DIR__ . '/header.php'; ?>

    <main>

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
                                <img src="/Site/images/location.png" alt="Localisation" ></a>
                                <div class="step-text">
                                    14 Pl. du Béarn 64150 Mourenx
                                </div>
                            </div>
    
                            <div class="step">
                                <img src="/Site/images/telephone.png" alt="Téléphone" ></a>
                                <div class="step-text">
                                    06 27 29 85 56
                                </div>
                            </div>
    
                            <div class="step">
                                <img src="/Site/images/mail.png" alt="Email" ></a>
                                <div class="step-text">
                                    Ben20mohamed97@gmail.com
                                </div>
                            </div>
    
                            <div class="step">
                                <img src="/Site/images/horaires.png" alt="Horaires" ></a>
                                <div class="step-text">
                                    Mardi au Samedi<br>
                                    09h30 - 13h00 / 15h30 - 19h00
                                </div>
                            </div>
                        </div>

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

<?php include __DIR__ . '/footer.php'; ?>
    
    <script src="/Site/js/script.js"></script>
</body>
</html>