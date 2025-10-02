<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer un administrateur
        $admin = User::create([
            'name' => 'Admin Schoolease',
            'email' => 'admin@schoolease.com',
            'password' => Hash::make('password123'),
            'phone' => '+33 1 23 45 67 89',
            'status' => 'active',
        ]);

        $adminRole = Role::where('name', 'admin')->first();
        $admin->roles()->attach($adminRole->id, [
            'is_active' => true,
            'assigned_at' => now(),
        ]);

        // Créer un professeur
        $teacher = User::create([
            'name' => 'Marie Dupont',
            'email' => 'marie.dupont@schoolease.com',
            'password' => Hash::make('password123'),
            'phone' => '+33 1 23 45 67 90',
            'status' => 'active',
        ]);

        $teacherRole = Role::where('name', 'teacher')->first();
        $teacher->roles()->attach($teacherRole->id, [
            'is_active' => true,
            'assigned_at' => now(),
        ]);

        // Créer un élève
        $student = User::create([
            'name' => 'Jean Martin',
            'email' => 'jean.martin@schoolease.com',
            'password' => Hash::make('password123'),
            'phone' => '+33 1 23 45 67 91',
            'status' => 'active',
        ]);

        $studentRole = Role::where('name', 'student')->first();
        $student->roles()->attach($studentRole->id, [
            'is_active' => true,
            'assigned_at' => now(),
        ]);

        // Créer un parent
        $parent = User::create([
            'name' => 'Sophie Martin',
            'email' => 'sophie.martin@schoolease.com',
            'password' => Hash::make('password123'),
            'phone' => '+33 1 23 45 67 92',
            'status' => 'active',
        ]);

        $parentRole = Role::where('name', 'parent')->first();
        $parent->roles()->attach($parentRole->id, [
            'is_active' => true,
            'assigned_at' => now(),
        ]);

        $this->command->info('Utilisateurs de test créés avec succès !');
        $this->command->info('Admin: admin@schoolease.com / password123');
        $this->command->info('Professeur: marie.dupont@schoolease.com / password123');
        $this->command->info('Élève: jean.martin@schoolease.com / password123');
        $this->command->info('Parent: sophie.martin@schoolease.com / password123');
    }
}