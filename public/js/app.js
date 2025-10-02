document.addEventListener('DOMContentLoaded', function() {
    const authTabs = document.querySelectorAll('.auth-tab');
    const authForms = document.querySelectorAll('.auth-form');
    const switchToRegister = document.getElementById('switch-to-register');
    const switchToLogin = document.getElementById('switch-to-login');

    // Basculer entre les onglets
    authTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const tabId = this.getAttribute('data-tab');

            authTabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');

            authForms.forEach(form => {
                form.classList.remove('active');
                if (form.id === `${tabId}-form`) form.classList.add('active');
            });
        });
    });

    // Liens de basculement
    switchToRegister?.addEventListener('click', e => {
        e.preventDefault();
        document.querySelector('.auth-tab[data-tab="register"]').click();
    });
    switchToLogin?.addEventListener('click', e => {
        e.preventDefault();
        document.querySelector('.auth-tab[data-tab="login"]').click();
    });

    // Affichage / masquage des mots de passe
    function setupPasswordToggle(toggleId, passwordId) {
        const toggle = document.getElementById(toggleId);
        const passwordInput = document.getElementById(passwordId);
        toggle?.addEventListener('click', () => {
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;
            const icon = toggle.querySelector('i');
            if (type === 'password') {
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        });
    }
    setupPasswordToggle('toggleLoginPassword', 'login-password');
    setupPasswordToggle('toggleRegisterPassword', 'register-password');

    // Validation simple mot de passe inscription
    const registerPassword = document.getElementById('register-password');
    const passwordRequirements = document.getElementById('password-requirements');
    registerPassword?.addEventListener('focus', () => passwordRequirements.style.display = 'block');
    registerPassword?.addEventListener('input', function() {
        const pwd = this.value;
        ['length-req','uppercase-req','number-req'].forEach(id => {
            const el = document.getElementById(id);
            if(!el) return;
            if(id==='length-req') el.className = pwd.length>=8 ? 'met' : 'unmet';
            if(id==='uppercase-req') el.className = /[A-Z]/.test(pwd) ? 'met' : 'unmet';
            if(id==='number-req') el.className = /[0-9]/.test(pwd) ? 'met' : 'unmet';
        });
    });

    // Soumission formulaire login
    const loginForm = document.getElementById('loginForm');
    loginForm?.addEventListener('submit', function(e) {
        e.preventDefault();
        // Ici tu peux ajouter la logique AJAX / Laravel
        alert('Connexion simulée');
    });

    // Soumission formulaire register
    const registerForm = document.getElementById('registerForm');
    registerForm?.addEventListener('submit', function(e) {
        e.preventDefault();
        // Ici tu peux ajouter la logique AJAX / Laravel
        alert('Inscription simulée');
    });

    // Déconnexion
    const logoutBtn = document.getElementById('logout-btn');
    logoutBtn?.addEventListener('click', () => {
        document.getElementById('loginForm')?.reset();
        document.getElementById('registerForm')?.reset();
        alert('Déconnecté');
    });

    // Se souvenir de moi
    const rememberMe = localStorage.getItem('schoolease_rememberMe');
    if(rememberMe==='true'){
        document.getElementById('rememberMe').checked = true;
        const email = localStorage.getItem('schoolease_userEmail');
        if(email) document.getElementById('login-email').value = email;
    }
});
