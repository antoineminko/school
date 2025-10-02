@extends('layouts.app')

@section('title', 'Tableau de Bord Élève - Schoolease')

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
                                <i class="fas fa-user-graduate me-2"></i>
                                Tableau de Bord Élève
                            </h2>
                            <p class="mb-0">Bienvenue, {{ $user->name }}</p>
                            <small>Dernière connexion : {{ $user->last_login_at ? $user->last_login_at->format('d/m/Y H:i') : 'Première connexion' }}</small>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <i class="fas fa-graduation-cap fa-3x opacity-75"></i>
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
                                Cours suivis
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">8</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
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
                                Devoirs en attente
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">3</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tasks fa-2x text-gray-300"></i>
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
                                Moyenne générale
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">85%</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-line fa-2x text-gray-300"></i>
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
                                Présence
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">92%</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-check fa-2x text-gray-300"></i>
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
                                    <th>Matière</th>
                                    <th>Professeur</th>
                                    <th>Salle</th>
                                    <th>Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>08:00 - 09:30</td>
                                    <td>Mathématiques</td>
                                    <td>M. Dupont</td>
                                    <td>Salle 204</td>
                                    <td><span class="badge bg-success">Terminé</span></td>
                                </tr>
                                <tr>
                                    <td>10:00 - 11:30</td>
                                    <td>Physique-Chimie</td>
                                    <td>Mme Martin</td>
                                    <td>Labo Sciences</td>
                                    <td><span class="badge bg-warning">En cours</span></td>
                                </tr>
                                <tr>
                                    <td>14:00 - 15:30</td>
                                    <td>Histoire-Géographie</td>
                                    <td>M. Bernard</td>
                                    <td>Salle 112</td>
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
                            <i class="fas fa-tasks me-2"></i>
                            Voir mes devoirs
                        </a>
                        <a href="#" class="btn btn-outline-success">
                            <i class="fas fa-chart-line me-2"></i>
                            Mes notes
                        </a>
                        <a href="#" class="btn btn-outline-info">
                            <i class="fas fa-calendar me-2"></i>
                            Mon emploi du temps
                        </a>
                        <a href="#" class="btn btn-outline-warning">
                            <i class="fas fa-file-alt me-2"></i>
                            Ressources
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Devoirs en attente -->
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-tasks me-2"></i>Devoirs en Attente
                    </h6>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">Exercices de dérivation</h6>
                                <small class="text-muted">Mathématiques - M. Dupont</small>
                            </div>
                            <div class="text-end">
                                <small class="text-warning">Échéance: 05/10</small>
                                <br>
                                <button class="btn btn-sm btn-primary mt-1">Rendre</button>
                            </div>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">Résumé de chapitre</h6>
                                <small class="text-muted">Français - Mme Durand</small>
                            </div>
                            <div class="text-end">
                                <small class="text-warning">Échéance: 07/10</small>
                                <br>
                                <button class="btn btn-sm btn-primary mt-1">Rendre</button>
                            </div>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">TP de chimie</h6>
                                <small class="text-muted">Physique-Chimie - Mme Martin</small>
                            </div>
                            <div class="text-end">
                                <small class="text-warning">Échéance: 10/10</small>
                                <br>
                                <button class="btn btn-sm btn-primary mt-1">Rendre</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notes récentes -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-chart-line me-2"></i>Notes Récentes
                    </h6>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">Contrôle de mathématiques</h6>
                                <small class="text-muted">M. Dupont</small>
                            </div>
                            <div class="text-end">
                                <span class="badge bg-success">16/20</span>
                                <br>
                                <small class="text-muted">28/09</small>
                            </div>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">Devoir de français</h6>
                                <small class="text-muted">Mme Durand</small>
                            </div>
                            <div class="text-end">
                                <span class="badge bg-warning">12/20</span>
                                <br>
                                <small class="text-muted">25/09</small>
                            </div>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">TP de physique</h6>
                                <small class="text-muted">Mme Martin</small>
                            </div>
                            <div class="text-end">
                                <span class="badge bg-success">18/20</span>
                                <br>
                                <small class="text-muted">22/09</small>
                            </div>
                        </div>
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
