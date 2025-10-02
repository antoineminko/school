<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Schoolease</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Ton CSS personnalisé -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <!-- Interface de connexion/inscription -->
    <div class="auth-container" id="auth-container">
        <!-- Section de bienvenue -->
        <div class="welcome-section">
            <h1><i class="fas fa-graduation-cap me-2"></i>Schoolease</h1>
            <p>
                La plateforme éducative complète pour gérer votre établissement, 
                suivre les progrès des élèves et faciliter la communication entre tous les acteurs.
            </p>

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
                <div class="auth-tab active" data-tab="login">Se connecter</div>
                <div class="auth-tab" data-tab="register">Créer un compte</div>
            </div>

            <!-- Formulaire de connexion -->
            <div class="auth-form active" id="login-form">
                <h2 class="form-title">Connectez-vous à votre compte</h2>

                <form method="POST" action="{{ url('/login') }}">
                    @csrf
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Adresse email" required>
                    </div>

                    <div class="mb-3 password-toggle">
                        <input type="password" class="form-control" placeholder="Mot de passe" required>
                        <span class="toggle-icon">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>

                    <div class="remember-forgot">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">
                                Se souvenir de moi
                            </label>
                        </div>
                        <a href="#">Mot de passe oublié?</a>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-sign-in-alt me-2"></i>Se connecter
                    </button>
                </form>
            </div>

            <!-- Formulaire d'inscription -->
            <div class="auth-form" id="register-form">
                <h2 class="form-title">Créez votre compte Schoolease</h2>

                <form method="POST" action="{{ url('/register') }}">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Nom complet" required>
                    </div>

                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Adresse email" required>
                    </div>

                    <div class="mb-3 password-toggle">
                        <input type="password" class="form-control" placeholder="Nouveau mot de passe" required>
                        <span class="toggle-icon">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>

                    <div class="mb-3">
                        <input type="tel" class="form-control" placeholder="Numéro de téléphone (optionnel)">
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" required>
                        <label class="form-check-label">
                            J'accepte les <a href="#">conditions d'utilisation</a>
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-user-plus me-2"></i>Créer mon compte
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Ton JS personnalisé -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
