<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Inscription - Schoolease</title>
    
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
        
        .form-control, .form-select {
            border: 2px solid #f0f0f0;
            border-radius: 10px;
            padding: 15px 20px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
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
        
        .alert-info {
            background: linear-gradient(135deg, rgba(52, 152, 219, 0.1) 0%, rgba(41, 128, 185, 0.1) 100%);
            color: #3498db;
            border: 1px solid rgba(52, 152, 219, 0.2);
        }
        
        .role-info {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
            border: 1px solid rgba(102, 126, 234, 0.2);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .role-info h6 {
            color: #667eea;
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        .role-info ul {
            margin: 0;
            padding-left: 20px;
        }
        
        .role-info li {
            margin-bottom: 8px;
            font-size: 0.9rem;
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
        }
    </style>
</head>
<body>
    <!-- Interface d'inscription -->
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
                <div class="auth-tab" onclick="window.location.href='{{ route('login') }}'">Se connecter</div>
                <div class="auth-tab active">Créer un compte</div>
            </div>
            
            <!-- Formulaire d'inscription -->
            <div class="auth-form">
                <h2 class="form-title">Créez votre compte Schoolease</h2>
                
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
                
                <form method="POST" action="{{ route('register.post') }}">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   name="name" 
                                   value="{{ old('name') }}" 
                                   placeholder="Nom complet" 
                                   required>
                            @error('name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   placeholder="Adresse email" 
                                   required>
                            @error('email')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="password-toggle">
                                <input type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       name="password" 
                                       placeholder="Mot de passe" 
                                       required>
                                <span class="toggle-icon" id="togglePassword">
                                    <i class="fas fa-eye" id="togglePasswordIcon"></i>
                                </span>
                            </div>
                            @error('password')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="password-toggle">
                                <input type="password" 
                                       class="form-control" 
                                       name="password_confirmation" 
                                       placeholder="Confirmer le mot de passe" 
                                       required>
                                <span class="toggle-icon" id="togglePasswordConfirmation">
                                    <i class="fas fa-eye" id="togglePasswordConfirmationIcon"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="tel" 
                                   class="form-control @error('phone') is-invalid @enderror" 
                                   name="phone" 
                                   value="{{ old('phone') }}" 
                                   placeholder="Téléphone (optionnel)">
                            @error('phone')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <select class="form-select @error('role') is-invalid @enderror" 
                                    name="role" 
                                    required>
                                <option value="">Sélectionner un rôle</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}" 
                                            {{ old('role') == $role->name ? 'selected' : '' }}>
                                        {{ $role->display_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Information sur les rôles -->
                    <div class="role-info">
                        <h6>
                            <i class="fas fa-info-circle me-2"></i>
                            Information sur les rôles
                        </h6>
                        <ul>
                            <li><strong>Administrateur :</strong> Gestion complète de l'établissement</li>
                            <li><strong>Professeur :</strong> Gestion des cours et des élèves</li>
                            <li><strong>Élève :</strong> Accès aux cours et aux notes</li>
                            <li><strong>Parent :</strong> Suivi des enfants (utilise les identifiants de l'élève)</li>
                        </ul>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-user-plus me-2"></i>Créer mon compte
                    </button>
                </form>
                
                <div class="form-footer">
                    <p>Vous avez déjà un compte? <a href="{{ route('login') }}">Se connecter</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Fonction pour basculer la visibilité du mot de passe
        function togglePasswordVisibility(fieldId, iconId) {
            const passwordField = document.getElementById(fieldId);
            const toggleIcon = document.getElementById(iconId);
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Événements pour les boutons de basculement
        document.getElementById('togglePassword').addEventListener('click', function() {
            togglePasswordVisibility('password', 'togglePasswordIcon');
        });

        document.getElementById('togglePasswordConfirmation').addEventListener('click', function() {
            togglePasswordVisibility('password_confirmation', 'togglePasswordConfirmationIcon');
        });

        // Validation du mot de passe en temps réel
        document.querySelector('input[name="password"]').addEventListener('input', function() {
            const password = this.value;
            const requirements = {
                length: password.length >= 8,
                uppercase: /[A-Z]/.test(password),
                lowercase: /[a-z]/.test(password),
                number: /[0-9]/.test(password)
            };
            
            // Vous pouvez ajouter ici une validation visuelle
            console.log('Password requirements:', requirements);
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
