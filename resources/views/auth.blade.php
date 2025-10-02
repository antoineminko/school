Teste<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion / Inscription</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <style>
        .auth-tab.active { font-weight: bold; }
        .auth-form { display: none; }
        .auth-form.active { display: block; }
        .met { color: green; }
        .unmet { color: red; }
    </style>
</head>
<body>
    <div id="auth-container">
        <div>
            <button class="auth-tab active" data-tab="login">Connexion</button>
            <button class="auth-tab" data-tab="register">Inscription</button>
        </div>

        <!-- FORMULAIRE LOGIN -->
        <form id="login-form" class="auth-form active" method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" id="login-email" placeholder="Email" required>
            <div>
                <input type="password" name="password" id="login-password" placeholder="Mot de passe" required>
                <span id="toggleLoginPassword"><i class="fas fa-eye"></i></span>
            </div>
            <label><input type="checkbox" id="rememberMe"> Se souvenir de moi</label>
            <button type="submit" class="btn-primary">Connexion</button>
            <a href="#" id="switch-to-register">Pas de compte ? Inscrivez-vous</a>
        </form>

        <!-- FORMULAIRE REGISTER -->
        <form id="register-form" class="auth-form" method="POST" action="{{ route('register') }}">
            @csrf
            <input type="text" name="name" id="register-name" placeholder="Nom complet" required>
            <input type="email" name="email" id="register-email" placeholder="Email" required>
            <div>
                <input type="password" name="password" id="register-password" placeholder="Mot de passe" required>
                <span id="toggleRegisterPassword"><i class="fas fa-eye"></i></span>
            </div>
            <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe" required>
            <div id="password-requirements">
                <p id="length-req" class="unmet">Au moins 8 caractères</p>
                <p id="uppercase-req" class="unmet">Au moins une majuscule</p>
                <p id="number-req" class="unmet">Au moins un chiffre</p>
            </div>
            <button type="submit" class="btn-primary">Inscription</button>
            <a href="#" id="switch-to-login">Déjà un compte ? Connectez-vous</a>
        </form>
    </div>

    <script src="{{ asset('js/auth.js') }}"></script> <!-- ton JS épuré -->
</body>
</html>
