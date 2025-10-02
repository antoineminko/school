 // Gestion des onglets Connexion/Inscription
        document.addEventListener('DOMContentLoaded', function() {
            const authContainer = document.getElementById('auth-container');
            const dashboard = document.getElementById('dashboard');
            
            // Vérifier si l'utilisateur est déjà connecté
            checkAuthenticationStatus();
            
            const authTabs = document.querySelectorAll('.auth-tab');
            const authForms = document.querySelectorAll('.auth-form');
            const switchToRegister = document.getElementById('switch-to-register');
            const switchToLogin = document.getElementById('switch-to-login');
            
            // Basculer entre les onglets
            authTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const tabId = this.getAttribute('data-tab');
                    
                    // Mettre à jour les onglets
                    authTabs.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Afficher le formulaire correspondant
                    authForms.forEach(form => {
                        form.classList.remove('active');
                        if (form.id === `${tabId}-form`) {
                            form.classList.add('active');
                        }
                    });
                });
            });
            
            // Liens de basculement
            switchToRegister.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector('.auth-tab[data-tab="register"]').click();
            });
            
            switchToLogin.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector('.auth-tab[data-tab="login"]').click();
            });
            
            // Gestion du sélecteur de rôle
            const roleOptions = document.querySelectorAll('.role-option');
            
            roleOptions.forEach(option => {
                option.addEventListener('click', function() {
                    const role = this.getAttribute('data-role');
                    
                    // Retirer la classe active de toutes les options
                    roleOptions.forEach(opt => {
                        opt.classList.remove('active');
                        opt.style.transform = 'translateY(0)';
                    });
                    
                    // Ajouter la classe active à l'option cliquée
                    this.classList.add('active');
                    this.style.transform = 'translateY(-2px)';
                    
                    // Gérer les éléments spécifiques au rôle administrateur
                    const adminWarning = document.getElementById('admin-warning');
                    const adminCode = document.getElementById('admin-code');
                    const registerButton = document.getElementById('register-button');
                    
                    if (role === 'admin') {
                        adminWarning.style.display = 'block';
                        adminCode.style.display = 'block';
                        registerButton.classList.add('btn-admin');
                    } else {
                        adminWarning.style.display = 'none';
                        adminCode.style.display = 'none';
                        registerButton.classList.remove('btn-admin');
                    }
                });
            });
            
            // Fonctionnalité d'affichage/masquage du mot de passe
            setupPasswordToggle('toggleLoginPassword', 'login-password');
            setupPasswordToggle('toggleRegisterPassword', 'register-password');
            
            function setupPasswordToggle(toggleId, passwordId) {
                const togglePassword = document.getElementById(toggleId);
                const passwordInput = document.getElementById(passwordId);
                
                if (togglePassword && passwordInput) {
                    togglePassword.addEventListener('click', function() {
                        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                        passwordInput.setAttribute('type', type);
                        
                        const icon = this.querySelector('i');
                        if (type === 'password') {
                            icon.classList.remove('fa-eye-slash');
                            icon.classList.add('fa-eye');
                        } else {
                            icon.classList.remove('fa-eye');
                            icon.classList.add('fa-eye-slash');
                        }
                    });
                }
            }
            
            // Validation du mot de passe en temps réel pour l'inscription
            const registerPassword = document.getElementById('register-password');
            const passwordRequirements = document.getElementById('password-requirements');
            
            if (registerPassword) {
                registerPassword.addEventListener('focus', function() {
                    passwordRequirements.style.display = 'block';
                });
                
                registerPassword.addEventListener('input', function() {
                    validatePassword(this.value);
                });
            }
            
            function validatePassword(password) {
                // Longueur minimale
                const lengthReq = document.getElementById('length-req');
                if (password.length >= 8) {
                    lengthReq.classList.remove('unmet');
                    lengthReq.classList.add('met');
                    lengthReq.innerHTML = '<i class="fas fa-check-circle"></i> Au moins 8 caractères';
                } else {
                    lengthReq.classList.remove('met');
                    lengthReq.classList.add('unmet');
                    lengthReq.innerHTML = '<i class="fas fa-circle"></i> Au moins 8 caractères';
                }
                
                // Lettre majuscule
                const uppercaseReq = document.getElementById('uppercase-req');
                if (/[A-Z]/.test(password)) {
                    uppercaseReq.classList.remove('unmet');
                    uppercaseReq.classList.add('met');
                    uppercaseReq.innerHTML = '<i class="fas fa-check-circle"></i> Au moins une majuscule';
                } else {
                    uppercaseReq.classList.remove('met');
                    uppercaseReq.classList.add('unmet');
                    uppercaseReq.innerHTML = '<i class="fas fa-circle"></i> Au moins une majuscule';
                }
                
                // Chiffre
                const numberReq = document.getElementById('number-req');
                if (/[0-9]/.test(password)) {
                    numberReq.classList.remove('unmet');
                    numberReq.classList.add('met');
                    numberReq.innerHTML = '<i class="fas fa-check-circle"></i> Au moins un chiffre';
                } else {
                    numberReq.classList.remove('met');
                    numberReq.classList.add('unmet');
                    numberReq.innerHTML = '<i class="fas fa-circle"></i> Au moins un chiffre';
                }
            }
            
            // Gestion de la soumission du formulaire de connexion
            const loginForm = document.getElementById('loginForm');
            
            if (loginForm) {
                loginForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    // Récupération des valeurs
                    const email = document.getElementById('login-email').value;
                    const password = document.getElementById('login-password').value;
                    const rememberMe = document.getElementById('rememberMe').checked;
                    const activeRole = document.querySelector('#login-form .role-option.active').getAttribute('data-role');
                    
                    // Validation basique
                    if (!email || !password) {
                        alert('Veuillez remplir tous les champs obligatoires.');
                        return;
                    }
                    
                    // Animation de chargement
                    const submitBtn = this.querySelector('.btn-primary');
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Connexion...';
                    submitBtn.disabled = true;
                    
                    // Simulation de connexion
                    setTimeout(() => {
                        // Vérification des identifiants (simulation)
                        if ((email === "admin@schoolease.com" && password === "admin123") || 
                            (email === "test@example.com" && password === "password123")) {
                            
                            // Enregistrer l'état de connexion
                            const userData = {
                                loggedIn: true,
                                role: activeRole,
                                email: email,
                                name: email.split('@')[0],
                                lastLogin: new Date().toLocaleString('fr-FR')
                            };
                            
                            localStorage.setItem('schoolease_userData', JSON.stringify(userData));
                            
                            if (rememberMe) {
                                localStorage.setItem('schoolease_rememberMe', 'true');
                            }
                            
                            // Afficher le tableau de bord
                            showDashboard(userData);
                        } else {
                            // Réinitialiser le bouton en cas d'échec
                            submitBtn.innerHTML = originalText;
                            submitBtn.disabled = false;
                            
                            alert('Email ou mot de passe incorrect. Veuillez réessayer.');
                        }
                    }, 1500);
                });
            }
            
            // Gestion de la soumission du formulaire d'inscription
            const registerForm = document.getElementById('registerForm');
            
            if (registerForm) {
                registerForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    // Récupération des valeurs
                    const name = document.getElementById('register-name').value;
                    const email = document.getElementById('register-email').value;
                    const password = document.getElementById('register-password').value;
                    const phone = document.getElementById('register-phone').value;
                    const terms = document.getElementById('register-terms').checked;
                    const activeRole = document.querySelector('#register-form .role-option.active').getAttribute('data-role');
                    const adminCode = document.getElementById('register-admin-code').value;
                    
                    // Vérification des exigences du mot de passe
                    const isPasswordValid = password.length >= 8 && /[A-Z]/.test(password) && /[0-9]/.test(password);
                    
                    if (!isPasswordValid) {
                        alert('Veuillez respecter toutes les exigences du mot de passe.');
                        return;
                    }
                    
                    if (activeRole === 'admin' && !adminCode) {
                        alert('Un code d\'activation est requis pour créer un compte administrateur.');
                        return;
                    }
                    
                    if (!terms) {
                        alert('Veuillez accepter les conditions d\'utilisation.');
                        return;
                    }
                    
                    // Animation de chargement
                    const submitBtn = this.querySelector('.btn-primary');
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Inscription en cours...';
                    submitBtn.disabled = true;
                    
                    // Simulation d'inscription réussie
                    setTimeout(() => {
                        alert(`Inscription réussie en tant que ${getRoleName(activeRole)}! Vous pouvez maintenant vous connecter.`);
                        
                        // Réinitialiser le formulaire
                        registerForm.reset();
                        
                        // Réinitialiser le bouton
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                        
                        // Basculer vers l'onglet de connexion
                        document.querySelector('.auth-tab[data-tab="login"]').click();
                    }, 1500);
                });
            }
            
            // Fonction pour afficher le tableau de bord
            function showDashboard(userData) {
                authContainer.style.display = 'none';
                dashboard.style.display = 'block';
                
                // Mettre à jour les informations utilisateur
                document.getElementById('user-name').textContent = userData.name;
                document.getElementById('user-role').textContent = getRoleName(userData.role);
                document.getElementById('user-role-text').textContent = getRoleName(userData.role).toLowerCase();
                document.getElementById('user-avatar').textContent = userData.name.charAt(0).toUpperCase();
                document.getElementById('last-login-time').textContent = userData.lastLogin;
                
                // Mettre à jour le titre de bienvenue
                document.getElementById('welcome-title').textContent = `Bienvenue, ${userData.name}`;
                document.getElementById('welcome-text').textContent = `Vous êtes connecté en tant que ${getRoleName(userData.role).toLowerCase()}.`;
                
                // Charger les données du tableau de bord selon le rôle
                loadDashboardData(userData.role);
            }
            
            // Fonction pour charger les données du tableau de bord
            function loadDashboardData(role) {
                // Données simulées selon le rôle
                const dashboardData = {
                    student: {
                        users: 150,
                        courses: 8,
                        events: 5,
                        performance: '85%',
                        activities: [
                            'Nouveau devoir de mathématiques ajouté',
                            'Résultats du dernier examen disponibles',
                            'Réunion parents-professeurs prévue vendredi',
                            'Nouvelle ressource partagée en histoire'
                        ]
                    },
                    teacher: {
                        users: 28,
                        courses: 4,
                        events: 12,
                        performance: '92%',
                        activities: [
                            'Devoir de français à corriger',
                            'Réunion pédagogique à 15h',
                            'Nouvel élève ajouté à votre classe',
                            'Rapport trimestriel à compléter'
                        ]
                    },
                    parent: {
                        users: 2,
                        courses: 6,
                        events: 3,
                        performance: '78%',
                        activities: [
                            'Nouvelle note publiée pour votre enfant',
                            'Message du professeur principal',
                            'Sortie scolaire à confirmer',
                            'Bulletin du 2ème trimestre disponible'
                        ]
                    },
                    admin: {
                        users: 245,
                        courses: 32,
                        events: 15,
                        performance: '94%',
                        activities: [
                            '3 nouveaux comptes à valider',
                            'Rapport d\'activité à générer',
                            'Mise à jour des emplois du temps',
                            'Réunion du conseil d\'administration'
                        ]
                    }
                };
                
                const data = dashboardData[role] || dashboardData.student;
                
                // Mettre à jour les statistiques
                document.getElementById('stat-users').textContent = data.users;
                document.getElementById('stat-courses').textContent = data.courses;
                document.getElementById('stat-events').textContent = data.events;
                document.getElementById('stat-performance').textContent = data.performance;
                
                // Mettre à jour les activités
                const activitiesList = document.getElementById('activities-list');
                activitiesList.innerHTML = '';
                
                data.activities.forEach(activity => {
                    const activityItem = document.createElement('div');
                    activityItem.className = 'activity-item';
                    activityItem.innerHTML = `
                        <div class="activity-icon">
                            <i class="fas fa-bell"></i>
                        </div>
                        <div>${activity}</div>
                    `;
                    activitiesList.appendChild(activityItem);
                });
            }
            
            // Fonction pour obtenir le nom du rôle
            function getRoleName(role) {
                const roleNames = {
                    'student': 'Élève',
                    'teacher': 'Professeur',
                    'parent': 'Parent',
                    'admin': 'Administrateur'
                };
                return roleNames[role] || 'Utilisateur';
            }
            
            // Fonction de vérification de l'état d'authentification
            function checkAuthenticationStatus() {
                const userDataStr = localStorage.getItem('schoolease_userData');
                
                if (userDataStr) {
                    const userData = JSON.parse(userDataStr);
                    
                    if (userData.loggedIn) {
                        showDashboard(userData);
                    }
                }
            }
            
            // Gestion de la déconnexion // Gestion des onglets Connexion/Inscription
        document.addEventListener('DOMContentLoaded', function() {
            const authContainer = document.getElementById('auth-container');
            const dashboard = document.getElementById('dashboard');
            
            // Vérifier si l'utilisateur est déjà connecté
            checkAuthenticationStatus();
            
            const authTabs = document.querySelectorAll('.auth-tab');
            const authForms = document.querySelectorAll('.auth-form');
            const switchToRegister = document.getElementById('switch-to-register');
            const switchToLogin = document.getElementById('switch-to-login');
            
            // Basculer entre les onglets
            authTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const tabId = this.getAttribute('data-tab');
                    
                    // Mettre à jour les onglets
                    authTabs.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Afficher le formulaire correspondant
                    authForms.forEach(form => {
                        form.classList.remove('active');
                        if (form.id === `${tabId}-form`) {
                            form.classList.add('active');
                        }
                    });
                });
            });
            
            // Liens de basculement
            switchToRegister.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector('.auth-tab[data-tab="register"]').click();
            });
            
            switchToLogin.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector('.auth-tab[data-tab="login"]').click();
            });
            
            // Gestion du sélecteur de rôle
            const roleOptions = document.querySelectorAll('.role-option');
            
            roleOptions.forEach(option => {
                option.addEventListener('click', function() {
                    const role = this.getAttribute('data-role');
                    
                    // Retirer la classe active de toutes les options
                    roleOptions.forEach(opt => {
                        opt.classList.remove('active');
                        opt.style.transform = 'translateY(0)';
                    });
                    
                    // Ajouter la classe active à l'option cliquée
                    this.classList.add('active');
                    this.style.transform = 'translateY(-2px)';
                    
                    // Gérer les éléments spécifiques au rôle administrateur
                    const adminWarning = document.getElementById('admin-warning');
                    const adminCode = document.getElementById('admin-code');
                    const registerButton = document.getElementById('register-button');
                    
                    if (role === 'admin') {
                        adminWarning.style.display = 'block';
                        adminCode.style.display = 'block';
                        registerButton.classList.add('btn-admin');
                    } else {
                        adminWarning.style.display = 'none';
                        adminCode.style.display = 'none';
                        registerButton.classList.remove('btn-admin');
                    }
                });
            });
            
            // Fonctionnalité d'affichage/masquage du mot de passe
            setupPasswordToggle('toggleLoginPassword', 'login-password');
            setupPasswordToggle('toggleRegisterPassword', 'register-password');
            
            function setupPasswordToggle(toggleId, passwordId) {
                const togglePassword = document.getElementById(toggleId);
                const passwordInput = document.getElementById(passwordId);
                
                if (togglePassword && passwordInput) {
                    togglePassword.addEventListener('click', function() {
                        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                        passwordInput.setAttribute('type', type);
                        
                        const icon = this.querySelector('i');
                        if (type === 'password') {
                            icon.classList.remove('fa-eye-slash');
                            icon.classList.add('fa-eye');
                        } else {
                            icon.classList.remove('fa-eye');
                            icon.classList.add('fa-eye-slash');
                        }
                    });
                }
            }
            
            // Validation du mot de passe en temps réel pour l'inscription
            const registerPassword = document.getElementById('register-password');
            const passwordRequirements = document.getElementById('password-requirements');
            
            if (registerPassword) {
                registerPassword.addEventListener('focus', function() {
                    passwordRequirements.style.display = 'block';
                });
                
                registerPassword.addEventListener('input', function() {
                    validatePassword(this.value);
                });
            }
            
            function validatePassword(password) {
                // Longueur minimale
                const lengthReq = document.getElementById('length-req');
                if (password.length >= 8) {
                    lengthReq.classList.remove('unmet');
                    lengthReq.classList.add('met');
                    lengthReq.innerHTML = '<i class="fas fa-check-circle"></i> Au moins 8 caractères';
                } else {
                    lengthReq.classList.remove('met');
                    lengthReq.classList.add('unmet');
                    lengthReq.innerHTML = '<i class="fas fa-circle"></i> Au moins 8 caractères';
                }
                
                // Lettre majuscule
                const uppercaseReq = document.getElementById('uppercase-req');
                if (/[A-Z]/.test(password)) {
                    uppercaseReq.classList.remove('unmet');
                    uppercaseReq.classList.add('met');
                    uppercaseReq.innerHTML = '<i class="fas fa-check-circle"></i> Au moins une majuscule';
                } else {
                    uppercaseReq.classList.remove('met');
                    uppercaseReq.classList.add('unmet');
                    uppercaseReq.innerHTML = '<i class="fas fa-circle"></i> Au moins une majuscule';
                }
                
                // Chiffre
                const numberReq = document.getElementById('number-req');
                if (/[0-9]/.test(password)) {
                    numberReq.classList.remove('unmet');
                    numberReq.classList.add('met');
                    numberReq.innerHTML = '<i class="fas fa-check-circle"></i> Au moins un chiffre';
                } else {
                    numberReq.classList.remove('met');
                    numberReq.classList.add('unmet');
                    numberReq.innerHTML = '<i class="fas fa-circle"></i> Au moins un chiffre';
                }
            }
            
            // Gestion de la soumission du formulaire de connexion
            const loginForm = document.getElementById('loginForm');
            
            if (loginForm) {
                loginForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    // Récupération des valeurs
                    const email = document.getElementById('login-email').value;
                    const password = document.getElementById('login-password').value;
                    const rememberMe = document.getElementById('rememberMe').checked;
                    const activeRole = document.querySelector('#login-form .role-option.active').getAttribute('data-role');
                    
                    // Validation basique
                    if (!email || !password) {
                        alert('Veuillez remplir tous les champs obligatoires.');
                        return;
                    }
                    
                    // Animation de chargement
                    const submitBtn = this.querySelector('.btn-primary');
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Connexion...';
                    submitBtn.disabled = true;
                    
                    // Simulation de connexion
                    setTimeout(() => {
                        // Vérification des identifiants (simulation)
                        if ((email === "admin@schoolease.com" && password === "admin123") || 
                            (email === "test@example.com" && password === "password123")) {
                            
                            // Enregistrer l'état de connexion
                            const userData = {
                                loggedIn: true,
                                role: activeRole,
                                email: email,
                                name: email.split('@')[0],
                                lastLogin: new Date().toLocaleString('fr-FR')
                            };
                            
                            localStorage.setItem('schoolease_userData', JSON.stringify(userData));
                            
                            if (rememberMe) {
                                localStorage.setItem('schoolease_rememberMe', 'true');
                            }
                            
                            // Afficher le tableau de bord
                            showDashboard(userData);
                        } else {
                            // Réinitialiser le bouton en cas d'échec
                            submitBtn.innerHTML = originalText;
                            submitBtn.disabled = false;
                            
                            alert('Email ou mot de passe incorrect. Veuillez réessayer.');
                        }
                    }, 1500);
                });
            }
            
            // Gestion de la soumission du formulaire d'inscription
            const registerForm = document.getElementById('registerForm');
            
            if (registerForm) {
                registerForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    // Récupération des valeurs
                    const name = document.getElementById('register-name').value;
                    const email = document.getElementById('register-email').value;
                    const password = document.getElementById('register-password').value;
                    const phone = document.getElementById('register-phone').value;
                    const terms = document.getElementById('register-terms').checked;
                    const activeRole = document.querySelector('#register-form .role-option.active').getAttribute('data-role');
                    const adminCode = document.getElementById('register-admin-code').value;
                    
                    // Vérification des exigences du mot de passe
                    const isPasswordValid = password.length >= 8 && /[A-Z]/.test(password) && /[0-9]/.test(password);
                    
                    if (!isPasswordValid) {
                        alert('Veuillez respecter toutes les exigences du mot de passe.');
                        return;
                    }
                    
                    if (activeRole === 'admin' && !adminCode) {
                        alert('Un code d\'activation est requis pour créer un compte administrateur.');
                        return;
                    }
                    
                    if (!terms) {
                        alert('Veuillez accepter les conditions d\'utilisation.');
                        return;
                    }
                    
                    // Animation de chargement
                    const submitBtn = this.querySelector('.btn-primary');
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Inscription en cours...';
                    submitBtn.disabled = true;
                    
                    // Simulation d'inscription réussie
                    setTimeout(() => {
                        alert(`Inscription réussie en tant que ${getRoleName(activeRole)}! Vous pouvez maintenant vous connecter.`);
                        
                        // Réinitialiser le formulaire
                        registerForm.reset();
                        
                        // Réinitialiser le bouton
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                        
                        // Basculer vers l'onglet de connexion
                        document.querySelector('.auth-tab[data-tab="login"]').click();
                    }, 1500);
                });
            }
            
            // Fonction pour afficher le tableau de bord
            function showDashboard(userData) {
                authContainer.style.display = 'none';
                dashboard.style.display = 'block';
                
                // Mettre à jour les informations utilisateur
                document.getElementById('user-name').textContent = userData.name;
                document.getElementById('user-role').textContent = getRoleName(userData.role);
                document.getElementById('user-role-text').textContent = getRoleName(userData.role).toLowerCase();
                document.getElementById('user-avatar').textContent = userData.name.charAt(0).toUpperCase();
                document.getElementById('last-login-time').textContent = userData.lastLogin;
                
                // Mettre à jour le titre de bienvenue
                document.getElementById('welcome-title').textContent = `Bienvenue, ${userData.name}`;
                document.getElementById('welcome-text').textContent = `Vous êtes connecté en tant que ${getRoleName(userData.role).toLowerCase()}.`;
                
                // Charger les données du tableau de bord selon le rôle
                loadDashboardData(userData.role);
            }
            
            // Fonction pour charger les données du tableau de bord
            function loadDashboardData(role) {
                // Données simulées selon le rôle
                const dashboardData = {
                    student: {
                        users: 150,
                        courses: 8,
                        events: 5,
                        performance: '85%',
                        activities: [
                            'Nouveau devoir de mathématiques ajouté',
                            'Résultats du dernier examen disponibles',
                            'Réunion parents-professeurs prévue vendredi',
                            'Nouvelle ressource partagée en histoire'
                        ]
                    },
                    teacher: {
                        users: 28,
                        courses: 4,
                        events: 12,
                        performance: '92%',
                        activities: [
                            'Devoir de français à corriger',
                            'Réunion pédagogique à 15h',
                            'Nouvel élève ajouté à votre classe',
                            'Rapport trimestriel à compléter'
                        ]
                    },
                    parent: {
                        users: 2,
                        courses: 6,
                        events: 3,
                        performance: '78%',
                        activities: [
                            'Nouvelle note publiée pour votre enfant',
                            'Message du professeur principal',
                            'Sortie scolaire à confirmer',
                            'Bulletin du 2ème trimestre disponible'
                        ]
                    },
                    admin: {
                        users: 245,
                        courses: 32,
                        events: 15,
                        performance: '94%',
                        activities: [
                            '3 nouveaux comptes à valider',
                            'Rapport d\'activité à générer',
                            'Mise à jour des emplois du temps',
                            'Réunion du conseil d\'administration'
                        ]
                    }
                };
                
                const data = dashboardData[role] || dashboardData.student;
                
                // Mettre à jour les statistiques
                document.getElementById('stat-users').textContent = data.users;
                document.getElementById('stat-courses').textContent = data.courses;
                document.getElementById('stat-events').textContent = data.events;
                document.getElementById('stat-performance').textContent = data.performance;
                
                // Mettre à jour les activités
                const activitiesList = document.getElementById('activities-list');
                activitiesList.innerHTML = '';
                
                data.activities.forEach(activity => {
                    const activityItem = document.createElement('div');
                    activityItem.className = 'activity-item';
                    activityItem.innerHTML = `
                        <div class="activity-icon">
                            <i class="fas fa-bell"></i>
                        </div>
                        <div>${activity}</div>
                    `;
                    activitiesList.appendChild(activityItem);
                });
            }
            
            // Fonction pour obtenir le nom du rôle
            function getRoleName(role) {
                const roleNames = {
                    'student': 'Élève',
                    'teacher': 'Professeur',
                    'parent': 'Parent',
                    'admin': 'Administrateur'
                };
                return roleNames[role] || 'Utilisateur';
            }
            
            // Fonction de vérification de l'état d'authentification
            function checkAuthenticationStatus() {
                const userDataStr = localStorage.getItem('schoolease_userData');
                
                if (userDataStr) {
                    const userData = JSON.parse(userDataStr);
                    
                    if (userData.loggedIn) {
                        showDashboard(userData);
                    }
                }
            }
            
            // Gestion de la déconnexion
            const logoutBtn = document.getElementById('logout-btn');
            if (logoutBtn) {
                logoutBtn.addEventListener('click', function() {
                    // Supprimer les données de connexion
                    localStorage.removeItem('schoolease_userData');
                    
                    // Revenir à la page de connexion
                    dashboard.style.display = 'none';
                    authContainer.style.display = 'flex';
                    
                    // Réinitialiser le formulaire de connexion
                    document.getElementById('loginForm').reset();
                });
            }
            
            // Remplir automatiquement les champs si "Se souvenir de moi" était coché
            const rememberMe = localStorage.getItem('schoolease_rememberMe');
            if (rememberMe === 'true') {
                document.getElementById('rememberMe').checked = true;
                const userDataStr = localStorage.getItem('schoolease_userData');
                if (userDataStr) {
                    const userData = JSON.parse(userDataStr);
                    document.getElementById('login-email').value = userData.email;
                }
            }
        });
            const logoutBtn = document.getElementById('logout-btn');
            if (logoutBtn) {
                logoutBtn.addEventListener('click', function() {
                    // Supprimer les données de connexion
                    localStorage.removeItem('schoolease_userData');
                    
                    // Revenir à la page de connexion
                    dashboard.style.display = 'none';
                    authContainer.style.display = 'flex';
                    
                    // Réinitialiser le formulaire de connexion
                    document.getElementById('loginForm').reset();
                });
            }
            
            // Remplir automatiquement les champs si "Se souvenir de moi" était coché
            const rememberMe = localStorage.getItem('schoolease_rememberMe');
            if (rememberMe === 'true') {
                document.getElementById('rememberMe').checked = true;
                const userDataStr = localStorage.getItem('schoolease_userData');
                if (userDataStr) {
                    const userData = JSON.parse(userDataStr);
                    document.getElementById('login-email').value = userData.email;
                }
            }
        });