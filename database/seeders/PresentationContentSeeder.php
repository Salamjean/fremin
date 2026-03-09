<?php

namespace Database\Seeders;

use App\Models\InstitutionalFramework;
use App\Models\StrategicAxis;
use App\Models\HistorySection;
use App\Models\PresentationGovernance;
use App\Models\PresentationMission;
use App\Models\PresentationValue;
use Illuminate\Database\Seeder;

class PresentationContentSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Cadre institutionnel
        InstitutionalFramework::updateOrCreate(
            ['id' => 1],
            [
                'title' => 'Cadre institutionnel',
                'title_en' => 'Institutional Framework',
                'content' => "Le Fonds de Restructuration et de Mise à Niveau des Entreprises Industrielles (FREMIN) a été créé par le décret n° 2014-781 du 11 décembre 2014. <br> Le FREMIN est un instrument stratégique de l'État Ivoirien dédié à la compétitivité industrielle. Il est Créé dans le cadre du Programme National de Restructuration et de Mise à Niveau (PNRMN). Il vise à renforcer la compétitivité et la transformation des industries ivoiriennes afin de stimuler la croissance, l’emploi et l’accès aux marchés internationaux",
                'content_en' => "The Industrial Enterprises Restructuring and Upgrading Fund (FREMIN) was created by Decree No. 2014-781 of December 11, 2014. <br> FREMIN is a strategic instrument of the Ivorian State dedicated to industrial competitiveness. It was created within the framework of the National Restructuring and Upgrading Program (PNRMN). It aims to strengthen the competitiveness and transformation of Ivorian industries in order to stimulate growth, employment, and access to international markets",
            ]
        );

        // 2. Missions (Seeding only if empty)
        if (PresentationMission::count() === 0) {
            $missions = [
                "Le financement de l’accompagnement des entreprises à travers des appuis directs et des primes",
                "Les garanties à octroyer aux banques pour faciliter l’accès des entreprises au financement de leurs investissements matériels destinés à la rénovation et la modernisation de leur outil de production, à l’extension de leurs infrastructures de production, et de leurs activités, dans des secteurs jugés prioritaires au regard de la politique industrielle nationale",
                "Les appuis financiers aux laboratoires techniques locaux ainsi qu’aux structures d’accréditation et de normalisation pour le renforcement de leurs capacités",
                "Le financement des centres d’appui à la compétitivité et au développement industriel",
                "Toute autre intervention qui contribue à l’atteinte des objectifs du Gouvernement en matière de compétitivité des entreprises industrielles manufacturières"
            ];
            foreach ($missions as $index => $text) {
                PresentationMission::create([
                    'title' => $text,
                    'is_active' => true,
                    'sort_order' => $index
                ]);
            }
        }

        // 3. Axes stratégiques
        $axes = [
            [
                'number' => 1,
                'title' => 'Soutenir la restructuration et la mise à niveau des entreprises industrielles',
                'title_en' => 'Support the restructuring and upgrading of industrial enterprises',
                'desc' => 'Nos piliers pour le développement industriel ivoirien',
                'image' => 'assets/img/service-modernisation.png'
            ],
            [
                'number' => 2,
                'title' => 'Améliorer les infrastructures et la qualité',
                'title_en' => 'Improve infrastructure and quality',
                'desc' => 'Nos piliers pour le développement industriel ivoirien',
                'image' => 'assets/img/service-certification.png'
            ],
            [
                'number' => 3,
                'title' => 'Créer des Centres d’Appui à la compétitivité et au développement industriel',
                'title_en' => 'Create support centers for industrial competitiveness and development',
                'desc' => 'Nos piliers pour le développement industriel ivoirien',
                'image' => 'assets/img/service-capacites.png'
            ]
        ];

        foreach ($axes as $axis) {
            StrategicAxis::updateOrCreate(
                ['axis_number' => $axis['number']],
                [
                    'title' => $axis['title'],
                    'title_en' => $axis['title_en'],
                    'description' => $axis['desc'],
                    'image' => $axis['image'],
                    'is_active' => true
                ]
            );
        }

        // 4. Historique
        HistorySection::updateOrCreate(
            ['id' => 1],
            [
                'title' => 'Historique',
                'title_en' => 'History',
                'content' => "Le Fonds de Restauration et de Mise à Niveau des Entreprises Industrielles (FREMIN) a été institué en décembre 2014 par le décret n°2014-781, dans le cadre de la mise en œuvre de la politique industrielle de la Côte d’Ivoire. Cette politique vise à renforcer, restructurer et moderniser l’appareil productif national afin d’améliorer la compétitivité des entreprises industrielles sur les marchés régional et international. Logé à la Banque Nationale d’Investissement (BNI), le FREMIN fonctionne sous l’autorité d’un Comité de Gestion composé de représentants des ministères sectoriels concernés ainsi que du Directeur Général de la BNI. Cette gouvernance garantit une coordination efficace entre les orientations stratégiques de l’État et les mécanismes opérationnels de financement. Le FREMIN constitue l’instrument financier du Programme National de Restructuration et de Mise à Niveau (PNRMN). À ce titre, il accompagne les entreprises industrielles dans leurs efforts de modernisation, d’amélioration de la qualité, d’optimisation de leurs performances et de renforcement de leur compétitivité.",
                'presidents' => [
                    ['name' => 'Mme CISSE ANOMA Patricia', 'period' => 'De 2015 à 2018'],
                    ['name' => 'Mme TCHIKAYA Mockey Laure', 'period' => 'De 2018 à 2019'],
                    ['name' => 'Mme ATTIA Yao Victorine', 'period' => 'De 2020 à 2021'],
                    ['name' => 'M. ESSO Loesse Jacques', 'period' => 'Depuis 2021']
                ],
                'is_active' => true
            ]
        );

        // 5. Nos Valeurs (Seeding only if empty)
        if (PresentationValue::count() === 0) {
            $values = [
                ['title' => 'Innovation', 'icon' => 'fas fa-lightbulb', 'desc' => 'Nous encourageons les solutions modernes pour l\'industrie.'],
                ['title' => 'Excellence', 'icon' => 'fas fa-star', 'desc' => 'La qualité est au cœur de nos processus.'],
                ['title' => 'Engagement', 'icon' => 'fas fa-hands-helping', 'desc' => 'Dévouement total envers nos partenaires industriels.'],
            ];
            foreach ($values as $val) {
                PresentationValue::create([
                    'title' => $val['title'],
                    'icon' => $val['icon'],
                    'description' => $val['desc'],
                    'is_active' => true
                ]);
            }
        }

        // 6. Gouvernance
        $governanceSections = [
            [
                'key' => 'comite_gestion',
                'title' => 'Comité de Gestion',
                'desc' => 'Le FREMIN est administré par un Comité de Gestion composé comme suit :',
                'items' => [
                    "un représentant du Ministre chargé de l'Industrie (Présidence)",
                    "un représentant du Ministre chargé de l'Economie et des Finances",
                    "un représentant du Ministre chargé du Budget",
                    "un représentant du Ministre chargé des Petites et Moyennes Entreprises",
                    "le Directeur Général de la BNI"
                ],
                'content' => "Le Comité de Gestion suit l'exécution des opérations du FREMIN et établit des rapports trimestriels et un rapport annuel de fin d'exercice, au plus tard le 31 mars de l'année suivante.",
                'sort_order' => 1
            ],
            [
                'key' => 'cellule_technique',
                'title' => 'Cellule Technique',
                'desc' => 'Le Comité de Gestion est assisté par une Cellule Technique composée comme suit :',
                'items' => [
                    "un représentant du Ministre chargé de l'Industrie (Présidence)",
                    "un représentant du Ministre chargé de l'Economie et des Finances",
                    "un représentant du Ministre chargé du Budget",
                    "un représentant de la BNI"
                ],
                'content' => "La Cellule Technique est chargée d'instruire et d'analyser les dossiers de demande d'appuis transmis au Comité de Gestion. Elle assure le suivi de la mise en œuvre des décisions prises par le Comité de Gestion.",
                'sort_order' => 2
            ],
            [
                'key' => 'tutelles',
                'title' => 'Tutelles',
                'desc' => "Le FREMIN est placé sous la tutelle technique du Ministre chargé de l'Industrie et sous la tutelle financière du Ministre chargé de l'Economie et des Finances, en liaison avec le Ministre chargé du Budget.",
                'items' => [],
                'content' => null,
                'sort_order' => 3
            ]
        ];

        foreach ($governanceSections as $sec) {
            PresentationGovernance::updateOrCreate(
                ['section_key' => $sec['key']],
                [
                    'title' => $sec['title'],
                    'description' => $sec['desc'],
                    'items' => $sec['items'],
                    'content' => $sec['content'],
                    'sort_order' => $sec['sort_order'],
                    'is_active' => true
                ]
            );
        }
    }
}
