<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Page d'accueil - redirection vers connexion
Route::get('/', function () {
    return redirect()->route('login');
});

// Routes d'authentification
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes protégées par authentification
Route::middleware(['auth'])->group(function () {
    // Redirection selon le rôle après connexion
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    
    // Tableaux de bord spécifiques par rôle
    Route::get('/admin/dashboard', [AuthController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/teacher/dashboard', [AuthController::class, 'teacherDashboard'])->name('teacher.dashboard');
    Route::get('/student/dashboard', [AuthController::class, 'studentDashboard'])->name('student.dashboard');
    Route::get('/parent/dashboard', [AuthController::class, 'parentDashboard'])->name('parent.dashboard');
});
