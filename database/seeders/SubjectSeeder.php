<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            [
                'name' => 'Mathématiques',
                'code' => 'MATH',
                'color' => '#e74c3c',
                'description' => 'Mathématiques générales',
                'hours_per_week' => 6,
                'is_active' => true,
            ],
            [
                'name' => 'Français',
                'code' => 'FR',
                'color' => '#3498db',
                'description' => 'Langue française et littérature',
                'hours_per_week' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Anglais',
                'code' => 'EN',
                'color' => '#2ecc71',
                'description' => 'Langue anglaise',
                'hours_per_week' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Histoire-Géographie',
                'code' => 'HG',
                'color' => '#f39c12',
                'description' => 'Histoire et géographie',
                'hours_per_week' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Sciences de la Vie et de la Terre',
                'code' => 'SVT',
                'color' => '#9b59b6',
                'description' => 'Biologie et sciences naturelles',
                'hours_per_week' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Physique-Chimie',
                'code' => 'PC',
                'color' => '#1abc9c',
                'description' => 'Physique et chimie',
                'hours_per_week' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Éducation Physique et Sportive',
                'code' => 'EPS',
                'color' => '#e67e22',
                'description' => 'Sport et éducation physique',
                'hours_per_week' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Arts Plastiques',
                'code' => 'ART',
                'color' => '#34495e',
                'description' => 'Arts et créativité',
                'hours_per_week' => 1,
                'is_active' => true,
            ],
        ];

        foreach ($subjects as $subject) {
            \App\Models\Subject::create($subject);
        }
    }
}
