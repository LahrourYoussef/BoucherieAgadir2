document.addEventListener('DOMContentLoaded', function() {
    
    // --- 1. GESTION DU MENU & HEADER (Ton code amélioré) ---
    const menuToggle = document.querySelector('.menu-toggle');
    const nav = document.querySelector('.nav');
    const body = document.body;
    const header = document.querySelector('.header');
    
    if (menuToggle && nav) {
        menuToggle.addEventListener('click', () => {
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
            const isOpen = !isExpanded;
            
            menuToggle.setAttribute('aria-expanded', isOpen);
            nav.classList.toggle('nav-open');
            menuToggle.classList.toggle('active');
            
            if (isOpen) {
                body.classList.add('menu-open');
                body.style.overflow = 'hidden';
            } else {
                body.classList.remove('menu-open');
                body.style.overflow = '';
            }
        });
        
        // Fermer le menu quand on clique sur un lien (mobile)
        const navLinks = nav.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 768) {
                    menuToggle.setAttribute('aria-expanded', 'false');
                    nav.classList.remove('nav-open');
                    menuToggle.classList.remove('active');
                    body.classList.remove('menu-open');
                    body.style.overflow = '';
                }
            });
        });
    }

    // Effet Sticky Header au scroll
    if (header) {
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 100) {
                header.classList.add('header-scrolled');
            } else {
                header.classList.remove('header-scrolled');
            }
        }, { passive: true });
    }

    // --- 2. AJOUT AU PANIER AJAX (Animation badge) ---
    const btnCarts = document.querySelectorAll('.btn-cart');
    btnCarts.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const url = this.href;

            fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    const badge = document.querySelector('.cart-badge');
                    if(badge) {
                        badge.innerText = data.cartCount;
                        badge.classList.add('show', 'cart-bounce');
                        setTimeout(() => badge.classList.remove('cart-bounce'), 500);
                    }
                }
            })
            .catch(err => console.error("Erreur panier:", err));
        });
    });

    // --- 3. MISE À JOUR PRIX INSTANTANÉE (Dans le panier) ---
    const qteInputs = document.querySelectorAll('.qte-input');
    qteInputs.forEach(input => {
        input.addEventListener('change', function() {
            const qty = parseInt(this.value);
            const row = this.closest('tr');
            
            // On récupère le prix unitaire via l'attribut data-price (à ajouter dans ton HTML)
            const priceElement = row.querySelector('.item-price');
            const price = parseFloat(priceElement.dataset.price);
            
            const subtotalElement = row.querySelector('.item-subtotal');
            
            // Calcul du nouveau sous-total pour la ligne
            const newSubtotal = qty * price;
            subtotalElement.innerText = newSubtotal.toFixed(2) + " €";

            // Recalcul du Total Global
            let globalTotal = 0;
            document.querySelectorAll('.item-subtotal').forEach(el => {
                globalTotal += parseFloat(el.innerText);
            });
            
            const totalPriceEl = document.querySelector('.total-price');
            if(totalPriceEl) {
                totalPriceEl.innerText = globalTotal.toFixed(2) + " €";
            }

            // Envoi de la mise à jour au serveur en arrière-plan
            const formData = new FormData();
            formData.append('id', this.dataset.id); // Utilise data-id sur l'input
            formData.append('quantite', qty);

            fetch('../../Site/Controleurs/update_cart.php', {
                method: 'POST',
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            });
        });
    });
});