# Architecture de la Base de Données - Schoolease

## 📊 Diagramme des Relations

```
┌─────────────────────────────────────────────────────────────────────────────────┐
│                              SCHOOLEASE DATABASE                               │
├─────────────────────────────────────────────────────────────────────────────────┤
│                                                                                 │
│  ┌─────────────┐    ┌─────────────┐    ┌─────────────┐    ┌─────────────┐     │
│  │   schools   │    │    roles    │    │   users     │    │user_roles   │     │
│  │             │    │             │    │             │    │             │     │
│  │ • id        │    │ • id        │    │ • id        │    │ • id        │     │
│  │ • name      │    │ • name      │    │ • name      │    │ • user_id   │     │
│  │ • code      │    │ • display_  │    │ • email     │    │ • role_id   │     │
│  │ • address   │    │   name      │    │ • password  │    │ • school_id │     │
│  │ • phone     │    │ • desc      │    │ • first_    │    │ • is_active │     │
│  │ • email     │    │ • perms     │    │   name      │    │             │     │
│  │ • director  │    │ • is_active │    │ • last_name │    │             │     │
│  │ • logo      │    │             │    │ • phone     │    │             │     │
│  │ • is_active │    │             │    │ • school_id │    │             │     │
│  └─────────────┘    └─────────────┘    │ • class_id  │    │             │     │
│           │                            │ • student_  │    │             │     │
│           │                            │   number    │    │             │     │
│           │                            │ • status    │    │             │     │
│           │                            └─────────────┘    └─────────────┘     │
│           │                                     │                │            │
│           │                                     │                │            │
│           ▼                                     ▼                ▼            │
│  ┌─────────────┐    ┌─────────────┐    ┌─────────────┐    ┌─────────────┐     │
│  │   classes   │    │  subjects   │    │   courses   │    │assignments  │     │
│  │             │    │             │    │             │    │             │     │
│  │ • id        │    │ • id        │    │ • id        │    │ • id        │     │
│  │ • school_id │    │ • name      │    │ • class_id  │    │ • course_id │     │
│  │ • name      │    │ • code      │    │ • subject_  │    │ • teacher_  │     │
│  │ • level     │    │ • color     │    │   id        │    │   id        │     │
│  │ • section   │    │ • desc      │    │ • teacher_  │    │ • title     │     │
│  │ • capacity  │    │ • hours_    │    │   id        │    │ • desc      │     │
│  │ • room      │    │   per_week  │    │ • title     │    │ • assigned_ │     │
│  │ • teacher_  │    │ • is_active │    │ • content   │    │   date      │     │
│  │   id        │    │             │    │ • start_    │    │ • due_date  │     │
│  │ • is_active │    │             │    │   date      │    │ • max_      │     │
│  └─────────────┘    │             │    │ • end_date  │    │   points    │     │
│           │         │             │    │ • start_    │    │ • type      │     │
│           │         │             │    │   time      │    │ • is_       │     │
│           │         │             │    │ • end_time  │    │   published │     │
│           │         │             │    │ • day_of_   │    │             │     │
│           │         │             │    │   week      │    │             │     │
│           │         │             │    │ • room      │    │             │     │
│           │         │             │    │ • status    │    │             │     │
│           │         │             │    └─────────────┘    └─────────────┘     │
│           │         │                     │                       │            │
│           │         │                     │                       │            │
│           ▼         ▼                     ▼                       ▼            │
│  ┌─────────────┐    ┌─────────────┐    ┌─────────────┐    ┌─────────────┐     │
│  │class_       │    │   grades    │    │assignment_  │    │   events    │     │
│  │students     │    │             │    │submissions  │    │             │     │
│  │             │    │ • id        │    │             │    │ • id        │     │
│  │ • id        │    │ • student_  │    │ • id        │    │ • school_id │     │
│  │ • class_id  │    │   id        │    │ • assign_   │    │ • created_  │     │
│  │ • student_  │    │ • assign_   │    │   ment_id   │    │   by        │     │
│  │   id        │    │   id        │    │ • student_  │    │ • title     │     │
│  │ • enrolled_ │    │ • course_id │    │   id        │    │ • desc      │     │
│  │   date      │    │ • teacher_  │    │ • content   │    │ • start_    │     │
│  │ • graduated │    │   id        │    │ • attach    │    │   date      │     │
│  │   _date     │    │ • points    │    │ • submitted │    │ • end_date  │     │
│  │ • status    │    │ • max_      │    │   _at       │    │ • start_    │     │
│  └─────────────┘    │   points    │    │ • status    │    │   time      │     │
│                     │ • percent   │    │ • feedback  │    │ • end_time  │     │
│                     │ • letter_   │    │             │    │ • location  │     │
│                     │   grade     │    │             │    │ • type      │     │
│                     │ • comments  │    │             │    │ • visibility│     │
│                     │ • graded_   │    │             │    │ • is_all_   │     │
│                     │   date      │    │             │    │   day       │     │
│                     │ • status    │    │             │    │             │     │
│                     └─────────────┘    └─────────────┘    └─────────────┘     │
│                                                                                 │
└─────────────────────────────────────────────────────────────────────────────────┘
```

## 🔗 Relations Principales

### 1. **Écoles (schools)**
- **Relation 1:N** avec `classes` (une école a plusieurs classes)
- **Relation 1:N** avec `users` (une école a plusieurs utilisateurs)
- **Relation 1:N** avec `events` (une école a plusieurs événements)

### 2. **Utilisateurs (users)**
- **Relation N:M** avec `roles` via `user_roles` (un utilisateur peut avoir plusieurs rôles)
- **Relation 1:N** avec `classes` (un professeur peut être responsable d'une classe)
- **Relation 1:N** avec `courses` (un professeur peut enseigner plusieurs cours)
- **Relation 1:N** avec `assignments` (un professeur peut créer plusieurs devoirs)
- **Relation 1:N** avec `grades` (un professeur peut noter plusieurs fois)

### 3. **Classes (classes)**
- **Relation N:1** avec `schools` (une classe appartient à une école)
- **Relation 1:N** avec `courses` (une classe a plusieurs cours)
- **Relation N:M** avec `users` via `class_students` (une classe a plusieurs élèves)

### 4. **Matières (subjects)**
- **Relation 1:N** avec `courses` (une matière peut être enseignée dans plusieurs cours)

### 5. **Cours (courses)**
- **Relation N:1** avec `classes` (un cours appartient à une classe)
- **Relation N:1** avec `subjects` (un cours enseigne une matière)
- **Relation N:1** avec `users` (un cours est enseigné par un professeur)
- **Relation 1:N** avec `assignments` (un cours peut avoir plusieurs devoirs)

### 6. **Devoirs (assignments)**
- **Relation N:1** avec `courses` (un devoir appartient à un cours)
- **Relation N:1** avec `users` (un devoir est créé par un professeur)
- **Relation 1:N** avec `assignment_submissions` (un devoir peut avoir plusieurs soumissions)
- **Relation 1:N** avec `grades` (un devoir peut être noté plusieurs fois)

### 7. **Notes (grades)**
- **Relation N:1** avec `users` (une note est attribuée à un élève)
- **Relation N:1** avec `assignments` (une note peut être liée à un devoir)
- **Relation N:1** avec `courses` (une note est liée à un cours)
- **Relation N:1** avec `users` (une note est donnée par un professeur)

## 📋 Contraintes et Index

### Contraintes d'Unicité
- `users.email` - Email unique
- `users.student_number` - Numéro d'étudiant unique
- `schools.code` - Code d'école unique
- `subjects.code` - Code de matière unique
- `user_roles(user_id, role_id, school_id)` - Combinaison unique
- `class_students(class_id, student_id)` - Combinaison unique
- `assignment_submissions(assignment_id, student_id)` - Combinaison unique

### Clés Étrangères
- Toutes les relations sont protégées par des contraintes de clés étrangères
- Suppression en cascade pour les relations parent-enfant
- Suppression en `set null` pour les relations optionnelles

## 🎯 Fonctionnalités Supportées

### Gestion des Rôles
- **Élève** : Accès aux cours, devoirs, notes, emploi du temps
- **Professeur** : Création de cours, devoirs, notation, gestion de classe
- **Parent** : Suivi des enfants, communication avec l'école
- **Administrateur** : Gestion complète de l'établissement

### Gestion Académique
- **Classes** : Organisation par niveau et section
- **Cours** : Planning avec horaires et salles
- **Devoirs** : Attribution, soumission, notation
- **Notes** : Système de notation flexible
- **Événements** : Calendrier scolaire

### Communication
- **Soumissions** : Suivi des devoirs rendus
- **Commentaires** : Feedback professeur-élève
- **Événements** : Information sur les activités

Cette architecture permet une gestion complète et flexible d'un établissement scolaire avec tous les acteurs impliqués.
