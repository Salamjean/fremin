<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Publication;
use App\Models\HeroSection;
use Carbon\Carbon;

class PublicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 0. Hero Section pour Publications
        HeroSection::updateOrCreate(
            ['main_title' => 'PUBLICATIONS & RESSOURCES'],
            [
                'subtitle' => 'Documentation officielle, études sectorielles et ressources stratégiques pour l\'industrie.',
                'description' => 'Accédez à notre bibliothèque de rapports, études et guides pratiques.',
                'image' => 'assets/img/fremin1.jpeg',
                'is_active' => true
            ]
        );

        $publications = [
            // Rapports
            [
                'title' => 'Rapport Annuel de Performance 2025',
                'description' => 'Bilan complet des activités du FREMIN au cours de l\'année 2025, incluant les indicateurs clés de performance.',
                'type' => 'rapport',
                'file_path' => 'publications/rapport_2025.pdf',
                'file_name' => 'Rapport_Annuel_2025.pdf',
                'file_size' => '4.5 MB',
                'publication_date' => '2025-12-15',
                'is_published' => true,
                'sort_order' => 1
            ],
            [
                'title' => 'Synthèse du Plan Stratégique 2020-2025',
                'description' => 'Vue d\'ensemble des réalisations majeures du plan quinquennal de modernisation industrielle.',
                'type' => 'rapport',
                'file_path' => 'publications/plan_strategique.pdf',
                'file_name' => 'Synthese_Plan_Strategique.pdf',
                'file_size' => '2.1 MB',
                'publication_date' => '2026-01-10',
                'is_published' => true,
                'sort_order' => 2
            ],
            // Études
            [
                'title' => 'Cartographie de l\'Industrie 4.0 en Côte d\'Ivoire',
                'description' => 'Étude approfondie sur l\'adoption des technologies numériques dans le secteur industriel national.',
                'type' => 'etude',
                'file_path' => 'publications/cartographie_industrie_40.pdf',
                'file_name' => 'Cartographie_Industrie_4.0.pdf',
                'file_size' => '8.2 MB',
                'publication_date' => '2025-11-20',
                'is_published' => true,
                'sort_order' => 1
            ],
            [
                'title' => 'Impact de la Modernisation sur la Compétitivité',
                'description' => 'Analyse des gains de compétitivité réalisés par les entreprises ayant bénéficié des programmes de mise à niveau.',
                'type' => 'etude',
                'file_path' => 'publications/impact_modernisation.pdf',
                'file_name' => 'Impact_Modernisation.pdf',
                'file_size' => '3.7 MB',
                'publication_date' => '2025-10-05',
                'is_published' => true,
                'sort_order' => 2
            ],
            [
                'title' => 'Baromètre de Satisfaction Industrielle 2025',
                'description' => 'Résultats de l\'enquête annuelle de satisfaction auprès des opérateurs industriels.',
                'type' => 'etude',
                'file_path' => 'publications/barometre_2025.pdf',
                'file_name' => 'Barometre_Satisfaction_2025.pdf',
                'file_size' => '1.5 MB',
                'publication_date' => '2025-09-12',
                'is_published' => true,
                'sort_order' => 3
            ],
            // Guides
            [
                'title' => 'Le Guide de l\'Entreprise en Mise à Niveau',
                'description' => 'Un manuel complet détaillant chaque phase du processus d\'accompagnement du FREMIN, de l\'audit à la certification.',
                'type' => 'guide',
                'file_path' => 'publications/guide_mise_a_niveau.pdf',
                'file_name' => 'Guide_Mise_A_Niveau.pdf',
                'file_size' => '2.8 MB',
                'publication_date' => '2026-01-20',
                'is_published' => true,
                'sort_order' => 1
            ],
            [
                'title' => 'Kit de Communication pour les Entreprises Lauréates',
                'description' => 'Pack comprenant les logos officiels et les directives graphiques pour la visibilité des projets financés.',
                'type' => 'guide',
                'file_path' => 'publications/kit_com.zip',
                'file_name' => 'Kit_Communication.zip',
                'file_size' => '12.4 MB',
                'publication_date' => '2026-01-25',
                'is_published' => true,
                'sort_order' => 2
            ],
        ];

        foreach ($publications as $pub) {
            Publication::updateOrCreate(
                ['title' => $pub['title']],
                $pub
            );
        }
    }
}
