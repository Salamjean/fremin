<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HeroSection;
use App\Models\AboutSection;
use App\Models\PresentationStat;
use App\Models\PresentationMission;
use App\Models\PresentationValue;

class PresentationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Hero Section
        HeroSection::updateOrCreate(
            ['main_title' => 'PRÉSENTATION DU FREMIN'],
            [
                'subtitle' => 'Le moteur de la restructuration et de la modernisation industrielle en Côte d\'Ivoire.',
                'description' => 'Découvrez notre vision et notre engagement pour l\'industrie ivoirienne.',
                'is_active' => true
            ]
        );

        // 2. About Section (Histoire)
        AboutSection::updateOrCreate(
            ['section_title' => 'Notre Histoire & Vision'],
            [
                'section_subtitle' => 'Le moteur de la restructuration industrielle',
                'main_image' => 'assets/img/fremin9.jpeg',
                'content_title' => 'Un Engagement Stratégique',
                'content_text' => 'Le Fonds de Restructuration et de Mise à Niveau (FREMIN) est un instrument stratégique de l\'État Ivoirien dédié à la compétitivité industrielle. Créé pour répondre aux défis de la mondialisation, le FREMIN accompagne les entreprises industrielles dans leurs processus de transformation technique, financière et managériale.',
                'feature1_title' => 'Expertise',
                'feature1_text' => 'Accompagnement de pointe',
                'feature2_title' => 'Impact',
                'feature2_text' => 'Résultats mesurables',
                'is_active' => true,
                'sort_order' => 1
            ]
        );

        // 3. Presentation Stats
        $stats = [
            ['value' => '25+', 'label' => 'Années d\'Expérience', 'sort_order' => 1],
            ['value' => '350+', 'label' => 'Entreprises Assistées', 'sort_order' => 2],
            ['value' => '150+', 'label' => 'Missions Réalisées', 'sort_order' => 3],
            ['value' => '98%', 'label' => 'Taux de Satisfaction', 'sort_order' => 4],
        ];

        foreach ($stats as $stat) {
            PresentationStat::updateOrCreate(['label' => $stat['label']], $stat);
        }

        // 4. Presentation Missions
        $missions = [
            [
                'title' => 'Mise à Niveau Technique',
                'icon' => 'fas fa-cogs',
                'description' => 'Modernisation de l\'outil de production et adoption de technologies innovantes pour accroître la productivité.',
                'sort_order' => 1
            ],
            [
                'title' => 'Restructuration Financière',
                'icon' => 'fas fa-chart-line',
                'description' => 'Accompagnement dans l\'optimisation des structures de capital et facilitation de l\'accès aux financements.',
                'sort_order' => 2
            ],
            [
                'title' => 'Certification & Qualité',
                'icon' => 'fas fa-certificate',
                'description' => 'Aide à l\'obtention des normes internationales (ISO) pour garantir la compétitivité sur les marchés mondiaux.',
                'sort_order' => 3
            ],
        ];

        foreach ($missions as $mission) {
            PresentationMission::updateOrCreate(['title' => $mission['title']], $mission);
        }

        // 5. Presentation Values
        $values = [
            [
                'title' => 'Intégrité',
                'icon' => 'fas fa-shield-alt',
                'description' => 'Une gestion transparente pour la confiance de nos partenaires.',
                'sort_order' => 1
            ],
            [
                'title' => 'Innovation',
                'icon' => 'fas fa-lightbulb',
                'description' => 'Toujours à la pointe des solutions pour l\'industrie.',
                'sort_order' => 2
            ],
            [
                'title' => 'Proximité',
                'icon' => 'fas fa-handshake',
                'description' => 'Un accompagnement sur mesure, au plus près des besoins.',
                'sort_order' => 3
            ],
        ];

        foreach ($values as $value) {
            PresentationValue::updateOrCreate(['title' => $value['title']], $value);
        }
    }
}
