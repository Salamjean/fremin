<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;
use App\Models\HeroSection;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 0. Hero Section pour Programmes
        HeroSection::updateOrCreate(
            ['main_title' => 'NOS PROGRAMMES'],
            [
                'subtitle' => 'Des solutions stratégiques pour la compétitivité et la croissance de l\'industrie Ivoirienne.',
                'description' => 'Découvrez nos programmes d\'accompagnement sur mesure.',
                'image' => 'assets/img/fremin4.jpeg',
                'is_active' => true
            ]
        );

        $programs = [
            [
                'title' => 'Mise à Niveau Globale',
                'subtitle' => 'Excellence Opérationnelle',
                'icon' => 'fas fa-industry',
                'description' => 'Un accompagnement complet (technique, financier et humain) pour aligner votre entreprise sur les standards internationaux.',
                'image' => 'assets/img/fremin1.jpeg',
                'category' => 'Accompagnement',
                'link_text' => 'DÉCOUVRIR LE PROGRAMME',
                'sort_order' => 1,
                'is_active' => true
            ],
            [
                'title' => 'Industrie 4.0',
                'subtitle' => 'Transformation Numérique',
                'icon' => 'fas fa-microchip',
                'description' => 'Soutien à la transformation numérique, à l\'automatisation et à l\'intégration des technologies intelligentes en usine.',
                'image' => 'assets/img/fremin3.jpeg',
                'category' => 'Innovation',
                'link_text' => 'DÉCOUVRIR LE PROGRAMME',
                'sort_order' => 2,
                'is_active' => true
            ],
            [
                'title' => 'Développement Durable',
                'subtitle' => 'Économie Verte',
                'icon' => 'fas fa-leaf',
                'description' => 'Promotion de l\'efficacité énergétique et des processus de production respectueux de l\'environnement.',
                'image' => 'assets/img/fremin5.jpeg',
                'category' => 'Environnement',
                'link_text' => 'DÉCOUVRIR LE PROGRAMME',
                'sort_order' => 3,
                'is_active' => true
            ],
        ];

        foreach ($programs as $prog) {
            Program::updateOrCreate(
                ['title' => $prog['title']],
                $prog
            );
        }
    }
}
