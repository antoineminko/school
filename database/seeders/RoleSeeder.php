<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'student',
                'display_name' => 'Élève',
                'description' => 'Élève de l\'établissement',
                'permissions' => json_encode([
                    'view_courses', 'view_assignments', 'submit_assignments', 
                    'view_grades', 'view_schedule', 'view_events'
                ]),
                'is_active' => true,
            ],
            [
                'name' => 'teacher',
                'display_name' => 'Professeur',
                'description' => 'Enseignant de l\'établissement',
                'permissions' => json_encode([
                    'create_courses', 'create_assignments', 'grade_assignments',
                    'view_students', 'manage_classes', 'view_reports'
                ]),
                'is_active' => true,
            ],
            [
                'name' => 'parent',
                'display_name' => 'Parent',
                'description' => 'Parent d\'élève',
                'permissions' => json_encode([
                    'view_child_grades', 'view_child_assignments', 'view_child_schedule',
                    'communicate_with_teachers', 'view_events'
                ]),
                'is_active' => true,
            ],
            [
                'name' => 'admin',
                'display_name' => 'Administrateur',
                'description' => 'Administrateur de l\'établissement',
                'permissions' => json_encode([
                    'manage_users', 'manage_schools', 'manage_classes', 'manage_subjects',
                    'view_all_reports', 'manage_events', 'system_settings'
                ]),
                'is_active' => true,
            ],
        ];

        foreach ($roles as $role) {
            \App\Models\Role::create($role);
        }
    }
}
