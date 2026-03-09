<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\ActivityPage;

class ActivityPageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'id' => 1,
                'slug' => 'etudes',
                'title' => 'Études réalisées',
                'subtitle' => 'Retrouvez ici les différentes études et stratégies élaborées pour le secteur industriel.',
                'items' => [
                    [
                        'title' => 'Elaboration de cinq (05) stratégies de développement de cinq (05) cluster',
                        'description' => "Les clusters sont des ensembles d’unités industriels regroupés autour d’un secteur ou d’une filière donnée. Ils se caractérisent par un réseau d’entreprises industrielles et d’institutions proches géographiquement et interdépendantes liées par des métiers, des technologies et des savoir-faire.\n\nDans le cadre de la mise en œuvre du pilier 1 du Plan National de Développement (PND) 2021-2025 qui porte sur l’accélération de la transformation structurelle de l’économie par l’industrialisation et le développement de grappes, le Ministère en charge de l’Industrie à travers le FREMIN a fait élaborer des stratégies de développement de cinq (05) clusters. Il s’agit notamment des clusters de la chimie et plasturgie, des matériaux de construction, d’ameublement et d’équipement, de l’emballage, de l’agro-industrie et de l’industrie pharmaceutique.",
                        'images' => ['fremin5.jpeg', 'fremin8.jpeg']
                    ],
                    [
                        'title' => 'Actualisation du Programme National de Restructuration et de Mise à Niveau des entreprises industrielles « PNRMN Durable »',
                        'description' => "Dans le cadre du renforcement de la compétitivité des entreprises ivoiriennes, le Gouvernement a mis en œuvre, depuis 2014, le Programme National de Restructuration et de Mise à Niveau (PNRMN). Il a pour objectif d’accompagner les entreprises dans le cadre de la définition et de la mise en œuvre d’un plan d’actions visant l’amélioration de leur compétitivité.\n\nPour renforcer les actions d’accompagnement dans le cadre du PNRMN, le Ministère du Commerce et de l’Industrie a entrepris depuis 2024, l’actualisation du PNRMN « PNRMN Durable ». Il s’agira d’une part, d’aligner les composantes et les activités du nouveau Programme aux objectifs du Plan National de Développement (PND) 2021-2025 et d’autre part, de l’adapter aux besoins sans cesse croissants des entreprises industrielles.",
                        'images' => ['ooooo.png']
                    ],
                    [
                        'title' => 'Elaboration des fiches filières industrielles prioritaires',
                        'description' => "Dans le cadre de la promotion des clusters, en particulier les clusters agro-industrie et industrie pharmaceutique, le Ministère du Commerce et de l’Industrie à travers le Fonds de Restructuration et de Mise à Niveau des entreprises industrielles (FREMIN) a fait élaborer les seize (16) fiches d’opportunités dans les filières suivantes : Anacarde, Ananas, Aubergine, Bois, Cacao, Cola, Coton, Cuir, Eau minérale, Hévéa, Karité, Mangue, Coco, Palmier à Huile, Pharmacie, Tomate. Ces fiches sont élaborées dans le cadre de la mise en œuvre du pilier 1 du Plan National de Développement (PND) 2021-2025.",
                        'images' => ['galerie176588060124.jpg', 'perssss.png', 'parllll.png']
                    ],
                    [
                        'title' => 'Stratégie pour le développement de la petite transformation',
                        'description' => "La création d’emplois décents constitue un enjeu majeur pour le Gouvernement ivoirien. Afin d’y répondre, les autorités ont placé l’industrialisation au cœur de la transformation structurelle de l’économie, conformément aux orientations du PND 2021-2025. À ce titre, la stratégie du Ministère du Commerce, de l’Industrie et de l’Artisanat repose notamment sur le développement de clusters prioritaires.\n\nDans cette dynamique, le Ministère, à travers le Fonds de Restructuration et de Mise à Niveau des entreprises industrielles (FREMIN), a initié une étude stratégique pour le développement de la petite transformation (Très Petite Entreprise et des Petites et Moyennes Industries en Côte d’Ivoire).",
                        'images' => ['promotion-industrielle-le-ministre-souleymane-diarrassouba-procede-a-louver_uu3nr3q4jqk.jpg']
                    ],
                    [
                        'title' => 'Etude pour l’identification des acteurs des secteurs textile-habillement et de l’agro-transformation ainsi que leurs besoins en équipements de production',
                        'description' => "Les crises liées à la COVID-19 et à la guerre russo-ukrainienne ont fortement affecté l’économie ivoirienne, en particulier le secteur industriel. De nombreuses PME ont subi un ralentissement, voire un arrêt de leurs activités, les plaçant dans une situation de vulnérabilité nécessitant une intervention publique.\n\nPour y faire face, le Ministère du Commerce et de l’Industrie a mis en place le Projet d’Appui aux Entreprises en Difficulté (PAED), financé par le FREMIN, afin de soutenir les PME industrielles à travers l’amélioration de leurs processus de production et de la qualité de leurs produits. Dans ce cadre, une étude diagnostique est réalisée pour identifier les besoins réels des acteurs de la petite agro-transformation.",
                        'images' => ['frrrr.png', 'geeee.png']
                    ]
                ]
            ],
            [
                'id' => 2,
                'slug' => 'accompagnement',
                'title' => 'Appui aux acteurs industriels',
                'subtitle' => 'Accompagnements directs aux entreprises industrielles.',
                'items' => [
                    [
                        'title' => 'L’appui aux acteurs exerçant dans l’agro-transformation',
                        'description' => "Le dynamisme des acteurs de la petite agro-transformation dans la croissance économique nationale est largement reconnu. Leur capacité à générer des emplois décents et à participer à la réduction de la pauvreté demeure incontestable.\n\nAfin de renforcer leur compétitivité et d’accélérer la transformation des matières premières agricoles, le Gouvernement, à travers le Ministère du Commerce et de l’Industrie et le FREMIN, a décidé d’acquérir des équipements de production au profit des acteurs de ce secteur. Ces équipements ont été réceptionnés le 30 avril 2025 sur le site du Centre de Démonstration et de Promotion des Technologies (CDT).\n\nDes missions de visite ont été organisées par la Cellule Technique du FREMIN dans les Districts d’Abidjan et de Yamoussoukro, en amont des actions opérationnelles, afin d’identifier les bénéficiaires potentiels des équipements de production et d’évaluer de manière précise leurs besoins spécifiques. Ces visites ont constitué une étape déterminante dans la planification et le ciblage des interventions au titre de l’exercice 2025.\n\nSur la base des besoins identifiés, dix-sept (17) équipements de production ont été acquis pour onze (11) bénéficiaires. Une cérémonie officielle de remise des équipements aux bénéficiaires a été organisée le 19 Juin 2025 sur le site du Centre de Démonstration et de Promotion des Technologies (CDT).",
                        'images' => ['geeee.png', 'equuuuu.png']
                    ],
                    [
                        'title' => 'Appui aux acteurs exerçant dans le secteur textile-habillement',
                        'description' => "En Côte d’Ivoire, le secteur textile-habillement reste peu valorisé, avec seulement 1 % du coton transformé localement malgré un fort potentiel productif et créatif. Parallèlement, les crises récentes (COVID-19 et guerre russo-ukrainienne) ont fragilisé les entreprises industrielles, notamment dans l’agro-transformation, entraînant un ralentissement des activités et une vulnérabilité accrue des PME.\n\nFace à cette situation, le Ministère du Commerce et de l’Industrie, à travers le FREMIN, a recruté deux consultants pour identifier les PME éligibles à un appui en équipements et évaluer leurs besoins. À l’issue des missions, des conventions ont été signées avec plusieurs structures techniques pour l’acquisition d’équipements de production au profit des secteurs textile-habillement (machines de confection, teinture, logiciels de conception) et agro-transformation (équipements pour légumes, fruits, karité, manioc et cacao).\n\nCette initiative vise à renforcer la compétitivité, la qualité des produits et la relance des entreprises en difficulté.",
                        'images' => ['frrrr.png']
                    ],
                    [
                        'title' => 'Assistance technique aux entreprises industrielles',
                        'description' => "Le Programme National de Restructuration et de Mise à Niveau (PNRMN) des entreprises industrielles vise à préparer les entreprises manufacturières ivoiriennes à faire face à une concurrence accrue, dans le contexte de la libéralisation des échanges induite par les accords multilatéraux de libre-échange.\n\nLe PNRMN s’articule autour de trois (03) composantes principales :\n(i) l’appui direct aux entreprises ;\n(ii) le renforcement de l’environnement de la qualité et des infrastructures existantes ;\n(iii) la création de trois (03) Centres d’Appui à la Compétitivité et au Développement Industriel (CACDI).\n\nLe Programme est exécuté sous la tutelle technique du Ministère en charge de l’Industrie. En ce qui concerne la composante relative à l’appui direct aux entreprises, l’Agence pour le Développement et la Compétitivité des Industries de Côte d’Ivoire (ADCI) mandatée par le FREMIN se charge de la sélection et de l’accompagnement des entreprises devant bénéficier d’un appui.\n\nLe FREMIN a accompagné jusqu’à ce jour 15 entreprises dans le cadre du PNRMN.",
                        'images' => ['fremin8.jpeg']
                    ]
                ]
            ],
            [
                'id' => 3,
                'slug' => 'ceremonies',
                'title' => 'Cérémonies & Ateliers',
                'subtitle' => 'Retrouvez ici les cérémonies officielles et les ateliers techniques organisés par le FREMIN.',
                'items' => [
                    [
                        'title' => 'Cérémonie d’inauguration et la pose de la première pierre de la construction de la seconde phase du Centre des Expositions des Produits de la Petite Transformation et de l’Artisanat (CEPPTA)',
                        'description' => "Le Ministère du Commerce, de l’Industrie et de l’Artisanat, à travers le FREMIN a réalisé la première phase du CEPPTA dans la zone industrielle de Yamoussoukro. Les travaux de construction de la première ont démarré en juillet 2024 et ont pris fin en octobre 2025, sous le suivi des services compétents du Ministère de la Construction ainsi que des organes de gestion du FREMIN. Ce centre constitue un outil stratégique destiné à valoriser les produits de la petite transformation et de l’artisanat ivoirien, en offrant un espace structuré de production, d’exposition, de commercialisation et d’accompagnement technique. Dans le cadre de l’opérationnalisation de la première phase du CEPPTA, le Ministère du Commerce, de l’Industrie et de l’Artisanat, à travers FREMIN a organisé la cérémonie officielle d’inauguration de la première phase du CEPPTA de Yamoussoukro, couplée à la pose de la première pierre de la construction de la seconde phase. Cette cérémonie d’inauguration, placée sous la présidence du Ministre Souleymane Diarrassouba, s’est tenue le jeudi 18 décembre 2025 à 11h00 au sein de la zone industrielle de Yamoussoukro.",
                        'images' => ['galerie176588060124.jpg', 'perssss.png', 'parllll.png'],
                        'video' => 'https://www.youtube.com/embed/UI7eoNswhrU?rel=0&loop=1&playlist=UI7eoNswhrU',
                        'type' => 'ceremonie'
                    ],
                    [
                        'title' => 'La cérémonie de distribution d’équipements de production au profit des acteurs de la petite agro-transformation',
                        'description' => "Dans le cadre d’un vaste programme d’appui aux acteurs transformateurs agroalimentaires qui vise à soutenir plus d’un millier de bénéficiaires à l’échelle nationale. Le Ministre Docteur Souleymane Diarassouba a présid le jeudi 19 juin 2025, au Centre de Démonstration et de Promotion de Technologie (CDT) la première phase de la cérémonie de remise des équipements de production au profit de douze (12) acteurs dont onze (11) femmes de l’agro-transformation. Il a lancé un appel aux acteurs du secteur privé pour une forte implication pour des investissements massifs dans la chaîne de valeur des produits agricoles, afin de d’accroître substantiellement l’offre pour le bon approvisionnement de nos marchés et pour le bien-être des populations. Ces équipements de production sont composés entre de broyeurs, déshydrateurs, extracteurs de jus, torréfacteurs et de séchoirs.",
                        'images' => ['frrrr.png', 'geeee.png', 'equuuuu.png'],
                        'video' => 'https://drive.google.com/file/d/1FCDVCYuf8q4qttVrC455YorSo9eHqo1Y/preview',
                        'type' => 'ceremonie'
                    ],
                    [
                        'title' => 'Atelier de validation de l’étude stratégique pour le développement de la petite transformation',
                        'description' => "Dans le cadre du renforcement de la contribution du secteur de la petite transformation dans l'économie et à accroître le niveau de transformation de nos matières locales, le Ministère du Commerce, de l’Industrie et de l’Artisanat a fait réaliser l’étude stratégique pour le développement de la petite transformation. Le Ministère du Commerce et de l’Industrie, à travers FREMIN a organisé via le FREMIN l’ouverture de l’atelier de validation du rapport provisoire de l'étude stratégique pour le développement de la petite transformation. L’atelier s’est tenu le jeudi 10 juillet 2025 à AZALAÏ HOTEL, sis à Marcory. Cette rencontre a réuni les différents Ministères et les acteurs de l’Organisation des Nations Unies pour le développement industriel. L’ouverture de l’atelier a été présidé par le Ministre Docteur Souleymane Diarassouba. Il a présenté le secteur industriel et il a ensuite appelé tous les partenaires financiers et techniques à soutenir le développement de la petite industrie afin de surmonter les défis et de libérer son potentiel pour la création d’emplois.",
                        'images' => ['fremin5.jpeg', 'fremin8.jpeg'],
                        'type' => 'atelier'
                    ],
                    [
                        'title' => 'Atelier de validation du rapport d’actualisation du PNRMN',
                        'description' => "Le Ministère en charge de l’Industrie via le FREMIN a organisé le jeudi 7 mars 2024, à Seen Hôtel d’Abidjan Plateau, l’atelier de validation du rapport final relatif à l’actualisation du PNRMN en vue de l’adapter aux objectifs du développement assigné par le Gouvernement dans le cadre du Plan National du Développement (PND 2021-2025). Cette cérémonie a été présidé par Monsieur Olivier Daipo, Directeur adjoint du cabinet représentant le Ministre chargé de l’Industrie en présence des différents partenaires techniques et financiers dont M. Tidiane Boye, représentant ONUDI Côte d'Ivoire. Monsieur Olivier Daipo a félicité les différents partenaires engagés dans les différentes réformes structurelles qui ont permis à la Côte d'Ivoire d'atteindre une valeur ajoutée dans le secteur industriel avec plus de 6 000 entreprises industrielles encadrées. Malgré les résultats incitatifs de 2014 à 2023, il nous fallait réfléchir en vue de mettre en place d'autres mécanismes pour mieux accompagner nos entreprises et renforcer la confiance des différents partenaires.",
                        'images' => ['ooooo.png'],
                        'type' => 'atelier'
                    ],
                    [
                        'title' => 'Atelier de finalisation des projets de communication en conseil des ministres relatifs aux stratégies de développement de cinq (5) clusters industriels prioritaires',
                        'description' => "L’élaboration de cinq (05) projets de Communication en Conseil des Ministres (CCM) relatifs aux stratégies de développement de cinq (05) clusters. La stratégie proposée vise à faire de la Côte d’Ivoire un hub attractif en ce qui concerne ces cinq (05) clusters industriels, avec des entreprises compétitives, capables de satisfaire le marché local et sous-régional. Le Ministère en charge de l’Industrie à travers le FREMIN a organisé l’atelier de finalisation des cinq (05) projets de CCM relatifs aux stratégies de développement de cinq (5) clusters industriels prioritaires le lundi 22 au mercredi 24 juillet 2024, à la Salle de Conférences du Cabinet du Ministre du Commerce et de l’Industrie, au Plateau, 18ème étage de l’Immeuble Postel 2001.",
                        'images' => ['elllaa.png'],
                        'type' => 'atelier'
                    ],
                    [
                        'title' => 'Ateliers de lancement des études stratégique pour le développement de cinq (05) clusters',
                        'description' => "La tendance des économies modernes axées davantage sur la connaissance, l’innovation et l’industrie interpelle sur les modèles organisationnels qui s’adaptent à la concurrence ». Cette vision, le gouvernement ivoirien entend la traduire en acte en optant pour une approche de développement des clusters industriels. Pour y arriver, le Ministère en charge de l’Industrie, Docteur Souleymane Diarrassouba, a procédé, le jeudi 30 mars 2023, à Abidjan-Plateau, au lancement des études stratégiques de développement de cinq (5) clusters industriels en Côte d’Ivoire. Leur réalisation, selon le Ministre chargé de l’Industrie favorisera non seulement l’amélioration de la productivité et l’innovation, mais également l’autonomisation des jeunes et des femmes par un meilleur accès à l’emploi.",
                        'video' => 'https://www.youtube.com/embed/GbSaUTFXIfQ?rel=0&loop=1&playlist=GbSaUTFXIfQ',
                        'type' => 'atelier'
                    ],
                    [
                        'title' => 'Atelier de validation des rapports et des plans d’actions des stratégies de développement de cinq (05) clusters industriels.',
                        'description' => "Dans le cadre du développement des cinq (05) clusters, le Ministère en charge de l’Industrie a organisé à travers le FREMIN la cérémonie de lancement de ces études le jeudi 30 mars 2023 au Pullman Hôtel sous la présidence de Monsieur le Ministre en charge de l’Industrie. Le Ministère en charge de l’Industrie a par ailleurs entrepris des actions visant à élaborer des stratégies qui seront soumises au Gouvernement en vue de leur mise en œuvre. Ces stratégies qui seront assorties de plan d’actions, permettront au Ministère en charge de l’Industrie de disposer d’une feuille de route cohérente en vue d’organiser et de déployer son action pour accompagner plus efficacement le développement de ces clusters. Le Ministère en charge de l’Industrie a organisé du 14 au 16 décembre 2023 à Grand-Bassam l’atelier de validation des rapports et des plans d’actions des stratégies de développement de cinq (05) clusters industriels. Le Ministre Docteure Souleymane Diarassouba a par ailleurs invité toutes les parties prenantes de cet atelier à passer en revue avec la facilitation des experts des différents Cabinets d’études les stratégies et l’ensembles des mesures proposées dans les plans d’actions en vue de leur validation.",
                        'images' => ['promotion-industrielle-le-ministre-souleymane-diarrassouba-procede-a-louver_uu3nr3q4jqk.jpg'],
                        'type' => 'atelier'
                    ]
                ]
            ],
        ];

        foreach ($pages as $page) {
            ActivityPage::updateOrCreate(['id' => $page['id']], $page);
        }
    }
}
