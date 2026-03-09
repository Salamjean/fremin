<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Models\Realisation;
use Illuminate\Support\Str;

class HomepageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Projects
        $projects = [
            [
                'title' => 'Mise à niveau des entreprises industrielles',
                'type' => 'autre',
                'slug' => Str::slug('Mise à niveau des entreprises industrielles'),
                'subtitle' => null,
                'description' => 'Ce projet est réalisé dans le cadre du Programme National de Restructuration et de Mise à Niveau (PNRMN) des entreprises industrielles. Le PNRMN vise à préparer les entreprises manufacturières ivoiriennes à faire face à une concurrence accrue, dans le cadre des accords multilatéraux de libre-échange. Le FREMIN est l’instrument financier de mise en œuvre des activités du PNRMN.',
                'is_active' => true,
            ],
            [
                'title' => 'Appui aux entreprises en difficultés (AED)',
                'type' => 'aed',
                'slug' => 'aed',
                'subtitle' => null,
                'description' => 'Le projet d’Appui aux Entreprises en Difficulté (AED) a été mis en place pour soutenir les entreprises impactées par les effets post COVID-19 et à l’inflation suscitée par la guerre russo-ukrainienne.',
                'is_active' => true,
            ],
            [
                'title' => 'Mise en place des infrastructures industrielles',
                'type' => 'zone',
                'slug' => 'zone-industrielle',
                'subtitle' => null,
                'description' => 'Développement et réhabilitation des zones industrielles pour offrir un écosystème performant aux investisseurs.',
                'is_active' => true,
            ]
        ];

        foreach ($projects as $projectData) {
            Project::updateOrCreate(
                ['title' => $projectData['title']],
                $projectData
            );
        }

        // 2. Realisations
        $realisations = [
            [
                'title' => 'Elaboration de cinq (05) stratégies de développement de cinq (05) cluster',
                'description' => 'Les clusters sont des ensembles d’unités industriels regroupés autour d’un secteur ou d’une filière donnée. Ils se caractérisent par un réseau d’entreprises industrielles et d’institutions proches géographiquement et interdépendantes liées par des métiers, des technologies et des savoir-faire. Il s’agit notamment des clusters de la chimie et plasturgie, des matériaux de construction, d’ameublement et d’équipement, de l’emballage, de l’agro-industrie et de l’industrie pharmaceutique.',
                'image_main' => 'assets/img/cluster.jpeg',
                'image_sub' => 'assets/img/csm_Fruits_seches_ad043c787a.jpeg',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Stratégie pour le développement de la petite transformation',
                'description' => 'La création d’emplois décents constitue un enjeu majeur pour le Gouvernement ivoirien. Afin d’y répondre, les autorités ont placé l’industrialisation au cœur de la transformation structurelle de l’économie, conformément aux orientations du PND 2021-2025. À ce titre, la stratégie du Ministère du Commerce, de l’Industrie et de l’Artisanat repose notamment sur le développement de clusters prioritaires. Dans cette dynamique, le Ministère, à travers le Fonds de Restructuration et de Mise à Niveau des entreprises industrielles (FREMIN), a initié une étude stratégique pour le développement de la petite transformation.',
                'image_main' => 'assets/img/actu_image_37702_maxi2.jpg.jpeg',
                'image_sub' => 'assets/img/jad20230605-eco-civ-transformation-noix-cajou-1256x628-1685981432.avif',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Construction du centre des Expositions des Produits de la Petite Transformation et de l’Artisanat (CEPPTA)',
                'description' => 'Le Ministère du Commerce, de l’Industrie et de l’Artisanat, à travers le FREMIN a réalisé la première phase du CEPPTA dans la zone industrielle de Yamoussoukro. Les travaux de construction de la première ont démarré en juillet 2024 et ont pris fin en octobre 2025, sous le suivi des services compétents du Ministère de la Construction ainsi que des organes de gestion du FREMIN.',
                'image_main' => 'assets/img/galerie176588060124.jpg.jpeg',
                'image_sub' => 'assets/img/176609253766.jpg.jpeg',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Acquisition et distribution d’équipements de production au profit des acteurs de la petite agro-transformation',
                'description' => 'Dans le cadre d’un vaste programme d’appui aux acteurs transformateurs agroalimentaires qui vise à soutenir plus d’un millier de bénéficiaires à l’échelle nationale. Le Ministre Docteur Souleymane Diarassouba a présidé le jeudi 19 juin 2025, au Centre de Démonstration et de Promotion de Technologie (CDT) la première phase de la cérémonie de remise des équipements de production au profit de douze (12) acteurs dont onze (11) femmes de l’agro-transformation.',
                'image_main' => 'assets/img/112.jpg.jpeg',
                'image_sub' => 'assets/img/ffffffff.jpeg',
                'is_active' => true,
                'sort_order' => 4,
            ]
        ];

        foreach ($realisations as $realisationData) {
            Realisation::updateOrCreate(
                ['title' => $realisationData['title']],
                $realisationData
            );
        }
    }
}
