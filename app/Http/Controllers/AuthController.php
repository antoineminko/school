<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\School;

class AuthController extends Controller
{
    /**
     * Afficher la page de connexion
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Traiter la connexion
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            
            // Mettre à jour la dernière connexion
            Auth::user()->update(['last_login_at' => now()]);
            
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
        ])->onlyInput('email');
    }

    /**
     * Afficher la page d'inscription
     */
    public function showRegister()
    {
        $roles = Role::where('is_active', true)->get();
        return view('auth.register', compact('roles'));
    }

    /**
     * Traiter l'inscription
     */
    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'role' => 'required|exists:roles,name',
                'phone' => 'nullable|string|max:20',
            ], [
                'name.required' => 'Le nom est obligatoire.',
                'name.max' => 'Le nom ne peut pas dépasser 255 caractères.',
                'email.required' => 'L\'adresse email est obligatoire.',
                'email.email' => 'Veuillez saisir une adresse email valide.',
                'email.unique' => 'Cette adresse email est déjà utilisée.',
                'password.required' => 'Le mot de passe est obligatoire.',
                'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
                'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
                'role.required' => 'Veuillez sélectionner un rôle.',
                'role.exists' => 'Le rôle sélectionné n\'est pas valide.',
                'phone.max' => 'Le numéro de téléphone ne peut pas dépasser 20 caractères.',
            ]);

            // Créer l'utilisateur
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'status' => 'active',
            ]);

            // Assigner le rôle
            $role = Role::where('name', $request->role)->first();
            $user->roles()->attach($role->id, [
                'is_active' => true,
                'assigned_at' => now(),
            ]);

            // Message de succès et redirection vers la page de connexion
            return redirect()->route('login')->with('success', 'Votre compte a été créé avec succès ! Vous pouvez maintenant vous connecter.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Gestion des erreurs de validation avec messages personnalisés
            return back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            // Gestion des autres erreurs
            return back()->with('error', 'Une erreur est survenue lors de la création de votre compte. Veuillez réessayer.')->withInput();
        }
    }

    /**
     * Déconnexion
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login');
    }

    /**
     * Redirection vers le bon tableau de bord selon le rôle
     */
    public function dashboard()
    {
        $user = Auth::user();
        
        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->isTeacher()) {
            return redirect()->route('teacher.dashboard');
        } elseif ($user->isStudent()) {
            return redirect()->route('student.dashboard');
        } elseif ($user->isParent()) {
            return redirect()->route('parent.dashboard');
        }
        
        // Par défaut, redirection vers le tableau de bord élève
        return redirect()->route('student.dashboard');
    }

    /**
     * Tableau de bord administrateur
     */
    public function adminDashboard()
    {
        $user = Auth::user();
        
        if (!$user->isAdmin()) {
            abort(403, 'Accès non autorisé');
        }
        
        return view('dashboard.admin', compact('user'));
    }

    /**
     * Tableau de bord professeur
     */
    public function teacherDashboard()
    {
        $user = Auth::user();
        
        if (!$user->isTeacher()) {
            abort(403, 'Accès non autorisé');
        }
        
        return view('dashboard.teacher', compact('user'));
    }

    /**
     * Tableau de bord élève
     */
    public function studentDashboard()
    {
        $user = Auth::user();
        
        if (!$user->isStudent()) {
            abort(403, 'Accès non autorisé');
        }
        
        return view('dashboard.student', compact('user'));
    }

    /**
     * Tableau de bord parent
     */
    public function parentDashboard()
    {
        $user = Auth::user();
        
        if (!$user->isParent()) {
            abort(403, 'Accès non autorisé');
        }
        
        return view('dashboard.parent', compact('user'));
    }
}
