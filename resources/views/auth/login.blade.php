<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Connexion - Schoolease</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .auth-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%;
            max-width: 1000px;
            min-height: 600px;
            display: flex;
        }
        
        .welcome-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 60px 40px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .welcome-section h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        .welcome-section p {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 40px;
            opacity: 0.9;
        }
        
        .features-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .features-list li {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            font-size: 1rem;
        }
        
        .features-list li i {
            margin-right: 15px;
            font-size: 1.2rem;
            width: 20px;
        }
        
        .auth-section {
            padding: 60px 40px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .auth-tabs {
            display: flex;
            margin-bottom: 30px;
            border-bottom: 2px solid #f0f0f0;
        }
        
        .auth-tab {
            padding: 15px 25px;
            cursor: pointer;
            font-weight: 600;
            color: #666;
            border-bottom: 3px solid transparent;
            transition: all 0.3s ease;
        }
        
        .auth-tab.active {
            color: #667eea;
            border-bottom-color: #667eea;
        }
        
        .form-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 30px;
        }
        
        .form-control {
            border: 2px solid #f0f0f0;
            border-radius: 10px;
            padding: 15px 20px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        
        .password-toggle {
            position: relative;
        }
        
        .toggle-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #666;
            font-size: 1.1rem;
            transition: color 0.3s ease;
        }
        
        .toggle-icon:hover {
            color: #667eea;
        }
        
        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px 0;
        }
        
        .form-check-input:checked {
            background-color: #667eea;
            border-color: #667eea;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 10px;
            padding: 15px 30px;
            font-weight: 600;
            font-size: 1rem;
            width: 100%;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }
        
        .form-footer {
            text-align: center;
            margin-top: 30px;
            color: #666;
        }
        
        .form-footer a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }
        
        .form-footer a:hover {
            text-decoration: underline;
        }
        
        .role-selector {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 30px;
        }
        
        .role-option {
            padding: 20px;
            border: 2px solid #f0f0f0;
            border-radius: 15px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }
        
        .role-option:hover {
            border-color: #667eea;
            transform: translateY(-2px);
        }
        
        .role-option.active {
            border-color: #667eea;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
        }
        
        .role-option i {
            font-size: 2rem;
            margin-bottom: 10px;
            display: block;
        }
        
        .role-option.student i { color: #667eea; }
        .role-option.teacher i { color: #f39c12; }
        .role-option.parent i { color: #27ae60; }
        .role-option.admin i { color: #e74c3c; }
        
        .role-name {
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }
        
        .role-desc {
            font-size: 0.9rem;
            color: #666;
        }
        
        .alert {
            border-radius: 10px;
            border: none;
        }
        
        .alert-danger {
            background: linear-gradient(135deg, rgba(231, 76, 60, 0.1) 0%, rgba(192, 57, 43, 0.1) 100%);
            color: #e74c3c;
        }
        
        .alert-success {
            background: linear-gradient(135deg, rgba(46, 204, 113, 0.1) 0%, rgba(39, 174, 96, 0.1) 100%);
            color: #27ae60;
            border: 1px solid rgba(46, 204, 113, 0.2);
        }
        
        .alert {
            border-radius: 10px;
            border: none;
            padding: 15px 20px;
            margin-bottom: 20px;
            font-weight: 500;
        }
        
        .btn-close {
            background: none;
            border: none;
            font-size: 1.2rem;
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }
        
        .btn-close:hover {
            opacity: 1;
        }
        
        @media (max-width: 768px) {
            .auth-container {
                flex-direction: column;
                margin: 20px;
                max-width: none;
            }
            
            .welcome-section {
                padding: 40px 30px;
            }
            
            .auth-section {
                padding: 40px 30px;
            }
            
            .role-selector {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Interface de connexion -->
    <div class="auth-container">
        <!-- Section de bienvenue -->
        <div class="welcome-section">
            <h1><i class="fas fa-graduation-cap me-2"></i>Schoolease</h1>
            <p>La plateforme éducative complète pour gérer votre établissement, suivre les progrès des élèves et faciliter la communication entre tous les acteurs.</p>
            
            <ul class="features-list">
                <li><i class="fas fa-chalkboard-teacher"></i> Gestion simplifiée des classes et emplois du temps</li>
                <li><i class="fas fa-chart-line"></i> Suivi détaillé des résultats et progrès des élèves</li>
                <li><i class="fas fa-comments"></i> Communication directe entre enseignants, élèves et parents</li>
                <li><i class="fas fa-calendar-alt"></i> Organisation des événements scolaires et activités</li>
                <li><i class="fas fa-file-alt"></i> Partage de ressources et documents pédagogiques</li>
            </ul>
        </div>
        
        <!-- Section d'authentification -->
        <div class="auth-section">
            <!-- Onglets Connexion/Inscription -->
            <div class="auth-tabs">
                <div class="auth-tab active">Se connecter</div>
                <div class="auth-tab" onclick="window.location.href='{{ route('register') }}'">Créer un compte</div>
            </div>
            
            <!-- Formulaire de connexion -->
            <div class="auth-form">
                <h2 class="form-title">Connectez-vous à votre compte</h2>
                
                <!-- Messages d'alerte -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                <!-- Sélecteur de rôle pour la connexion -->
                <div class="role-selector">
                    <div class="role-option student active">
                        <i class="fas fa-user-graduate"></i>
                        <div class="role-name">Élève</div>
                        <div class="role-desc">Accédez à vos cours</div>
                    </div>
                    <div class="role-option teacher">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <div class="role-name">Professeur</div>
                        <div class="role-desc">Gérez vos classes</div>
                    </div>
                    <div class="role-option parent">
                        <i class="fas fa-user-friends"></i>
                        <div class="role-name">Parent</div>
                        <div class="role-desc">Suivez vos enfants</div>
                    </div>
                    <div class="role-option admin">
                        <i class="fas fa-user-shield"></i>
                        <div class="role-name">Administrateur</div>
                        <div class="role-desc">Gérez l'établissement</div>
                    </div>
                </div>
                
                <form method="POST" action="{{ route('login.post') }}">
                    @csrf
                    
                    <div class="mb-3">
                        <input type="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               name="email" 
                               value="{{ old('email') }}" 
                               placeholder="Adresse email" 
                               required 
                               autofocus>
                        @error('email')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3 password-toggle">
                        <input type="password" 
                               class="form-control @error('password') is-invalid @enderror" 
                               name="password" 
                               placeholder="Mot de passe" 
                               required>
                        <span class="toggle-icon" id="togglePassword">
                            <i class="fas fa-eye" id="togglePasswordIcon"></i>
                        </span>
                        @error('password')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="remember-forgot">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">
                                Se souvenir de moi
                            </label>
                        </div>
                        <a href="#" class="text-decoration-none">Mot de passe oublié?</a>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-sign-in-alt me-2"></i>Se connecter
                    </button>
                </form>
                
                <div class="form-footer">
                    <p>Vous n'avez pas de compte? <a href="{{ route('register') }}">Inscrivez-vous ici</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Fonction pour basculer la visibilité du mot de passe
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordField = document.querySelector('input[name="password"]');
            const toggleIcon = document.getElementById('togglePasswordIcon');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        });

        // Gestion des rôles (pour l'affichage uniquement)
        document.querySelectorAll('.role-option').forEach(option => {
            option.addEventListener('click', function() {
                document.querySelectorAll('.role-option').forEach(opt => opt.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Fermer automatiquement les alertes après 5 secondes
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert-dismissible');
            alerts.forEach(alert => {
                const closeBtn = alert.querySelector('.btn-close');
                if (closeBtn) {
                    closeBtn.click();
                }
            });
        }, 5000);
    </script>
</body>
</html>
