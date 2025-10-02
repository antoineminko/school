@extends('layouts.app')

@section('title', 'Tableau de Bord Administrateur - Schoolease')

@section('content')
<div class="container-fluid">
    <!-- En-tête -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h2 class="mb-1">
                                <i class="fas fa-user-shield me-2"></i>
                                Tableau de Bord Administrateur
                            </h2>
                            <p class="mb-0">Bienvenue, {{ $user->name }}</p>
                            <small>Dernière connexion : {{ $user->last_login_at ? $user->last_login_at->format('d/m/Y H:i') : 'Première connexion' }}</small>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <i class="fas fa-chart-line fa-3x opacity-75"></i>
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
                                Total Utilisateurs
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">245</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
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
                                Enseignants
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">32</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
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
                                Élèves
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">180</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
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
                                Classes
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">15</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-building fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contenu principal -->
    <div class="row">
        <!-- Actions rapides -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-bolt me-2"></i>Actions Rapides
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <a href="#" class="btn btn-outline-primary w-100">
                                <i class="fas fa-user-plus me-2"></i>
                                Ajouter un utilisateur
                            </a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="#" class="btn btn-outline-success w-100">
                                <i class="fas fa-building me-2"></i>
                                Gérer les classes
                            </a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="#" class="btn btn-outline-info w-100">
                                <i class="fas fa-book me-2"></i>
                                Gérer les matières
                            </a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="#" class="btn btn-outline-warning w-100">
                                <i class="fas fa-chart-bar me-2"></i>
                                Voir les rapports
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Activités récentes -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-bell me-2"></i>Activités Récentes
                    </h6>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fas fa-user-plus text-success me-2"></i>
                                Nouvel utilisateur inscrit
                            </div>
                            <small class="text-muted">Il y a 2 heures</small>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fas fa-edit text-info me-2"></i>
                                Modification d'une classe
                            </div>
                            <small class="text-muted">Il y a 4 heures</small>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fas fa-chart-line text-warning me-2"></i>
                                Rapport mensuel généré
                            </div>
                            <small class="text-muted">Il y a 1 jour</small>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fas fa-cog text-primary me-2"></i>
                                Paramètres mis à jour
                            </div>
                            <small class="text-muted">Il y a 2 jours</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tableau des utilisateurs récents -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-users me-2"></i>Utilisateurs Récents
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Rôle</th>
                                    <th>Statut</th>
                                    <th>Dernière connexion</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Jean Dupont</td>
                                    <td>jean.dupont@example.com</td>
                                    <td><span class="badge bg-primary">Professeur</span></td>
                                    <td><span class="badge bg-success">Actif</span></td>
                                    <td>Aujourd'hui 14:30</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">Modifier</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Marie Martin</td>
                                    <td>marie.martin@example.com</td>
                                    <td><span class="badge bg-info">Élève</span></td>
                                    <td><span class="badge bg-success">Actif</span></td>
                                    <td>Hier 16:45</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">Modifier</button>
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
