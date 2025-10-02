@extends('layouts.app')

@section('title', 'Tableau de Bord Professeur - Schoolease')

@section('content')
<div class="container-fluid">
    <!-- En-tête -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h2 class="mb-1">
                                <i class="fas fa-chalkboard-teacher me-2"></i>
                                Tableau de Bord Professeur
                            </h2>
                            <p class="mb-0">Bienvenue, {{ $user->name }}</p>
                            <small>Dernière connexion : {{ $user->last_login_at ? $user->last_login_at->format('d/m/Y H:i') : 'Première connexion' }}</small>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <i class="fas fa-book-open fa-3x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistiques -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Mes Classes
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">4</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-building fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Élèves
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">28</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Devoirs à corriger
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tasks fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Heures cette semaine
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18h</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contenu principal -->
    <div class="row">
        <!-- Emploi du temps -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-calendar-alt me-2"></i>Emploi du Temps du Jour
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Heure</th>
                                    <th>Classe</th>
                                    <th>Matière</th>
                                    <th>Salle</th>
                                    <th>Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>09:00 - 10:30</td>
                                    <td>Terminale S</td>
                                    <td>Mathématiques</td>
                                    <td>Salle 204</td>
                                    <td><span class="badge bg-success">Terminé</span></td>
                                </tr>
                                <tr>
                                    <td>11:00 - 12:30</td>
                                    <td>Première ES</td>
                                    <td>Mathématiques</td>
                                    <td>Salle 112</td>
                                    <td><span class="badge bg-warning">En cours</span></td>
                                </tr>
                                <tr>
                                    <td>14:00 - 15:00</td>
                                    <td>Réunion</td>
                                    <td>Pédagogique</td>
                                    <td>Salle des profs</td>
                                    <td><span class="badge bg-info">À venir</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions rapides -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-bolt me-2"></i>Actions Rapides
                    </h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="#" class="btn btn-outline-primary">
                            <i class="fas fa-plus me-2"></i>
                            Créer un devoir
                        </a>
                        <a href="#" class="btn btn-outline-success">
                            <i class="fas fa-edit me-2"></i>
                            Noter des copies
                        </a>
                        <a href="#" class="btn btn-outline-info">
                            <i class="fas fa-calendar me-2"></i>
                            Planifier un cours
                        </a>
                        <a href="#" class="btn btn-outline-warning">
                            <i class="fas fa-chart-bar me-2"></i>
                            Voir les statistiques
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Devoirs récents -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-tasks me-2"></i>Devoirs Récents
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Classe</th>
                                    <th>Date d'attribution</th>
                                    <th>Date limite</th>
                                    <th>Soumissions</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Exercices de dérivation</td>
                                    <td>Terminale S</td>
                                    <td>01/10/2025</td>
                                    <td>05/10/2025</td>
                                    <td><span class="badge bg-success">15/20</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">Voir</button>
                                        <button class="btn btn-sm btn-outline-success">Noter</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Résolution d'équations</td>
                                    <td>Première ES</td>
                                    <td>30/09/2025</td>
                                    <td>03/10/2025</td>
                                    <td><span class="badge bg-warning">8/18</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">Voir</button>
                                        <button class="btn btn-sm btn-outline-success">Noter</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .border-left-primary {
        border-left: 0.25rem solid #4e73df !important;
    }
    .border-left-success {
        border-left: 0.25rem solid #1cc88a !important;
    }
    .border-left-info {
        border-left: 0.25rem solid #36b9cc !important;
    }
    .border-left-warning {
        border-left: 0.25rem solid #f6c23e !important;
    }
    .text-xs {
        font-size: 0.7rem;
    }
    .text-gray-300 {
        color: #dddfeb !important;
    }
    .text-gray-800 {
        color: #5a5c69 !important;
    }
</style>
@endpush
