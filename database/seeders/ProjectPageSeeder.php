<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProjectPage;

class ProjectPageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'id' => 1,
                'slug' => 'appuis-directs',
                'title' => 'Appuis directs aux entreprises',
                'subtitle' => 'Programme National de Restructuration et de Mise à Niveau (PNRMN)',
                'content' => '<div class="content-box-premium mb-5"><h2 class="section-title" style="color: #009B3A; font-weight: 800;">Contexte et Objectifs</h2><p class="lead-text mb-4">La Côte d’Ivoire a adopté en 2013 un Programme National de Restructuration et de Mise à Niveau (PNRMN) destiné à préparer les entreprises manufacturières ivoiriennes à faire face à une concurrence accrue dans le cadre des accords multilatéraux de libre-échange. L’objectif général de ce programme était de soutenir la dynamique d’accroissement de la valeur ajoutée industrielle et de l’emploi, notamment des jeunes et des femmes, tout en améliorant la qualité des produits manufacturiers ivoiriens pour faciliter leur accès au marché international dans un contexte de libéralisation et d’ouverture de l’économie. A travers ce programme, le Gouvernement envisageait d’accompagner 120 à 150 entreprises industrielles à fort potentiel de croissance, en déployant à large échelle des actions de renforcement de leur capacité et de leur compétitivité.</p><p class="mb-4">La mise en œuvre du programme a nécessité la signature d’un mémorandum d’entente entre l’Etat et le Secteur Privé en septembre 2013 et la création de l’Agence pour le Développement et la Compétitivité des Industries de Côte d’Ivoire (en abrégé ADCI) et du Fonds de Restructuration et de Mise à Niveau des entreprises industrielles (en abrégé FREMIN), en 2014. Le FREMIN est le Fonds National chargé d’assurer le financement des activités du PNRMN. Quant à l’ADCI, elle a été créée sous forme d’une société anonyme, détenue à 60% par les organisations du secteur privé (CCI-CI, CGECI, FNISCI, FIPME) et à 40% par l’Etat, en vue de prendre en charge la mise en œuvre des appuis directs aux entreprises.</p></div><div class="content-box-premium mb-5"><h2 class="section-title" style="color: #009B3A; font-weight: 800;">Composantes du Programme</h2><p>Le PNRMN est structuré autour de trois (3) composantes, à savoir :</p><ul class="list-unstyled"><li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> <strong>Composante 1 :</strong> appuis directs aux entreprises</li><li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> <strong>Composante 2 :</strong> amélioration des infrastructures et de la qualité</li><li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> <strong>Composante 3 :</strong> mise en place des Centres d’Appui à la Compétitivité et au Développement Industriel (en abrégé CACDI)</li></ul></div><div class="content-box-premium"><h2 class="section-title" style="color: #009B3A; font-weight: 800;">Avantages</h2><p class="mb-3">La Mise à Niveau des entreprises industrielles s’opère par le biais d’avantages accordés aux entreprises, à savoir :</p><ul class="list-unstyled mb-4"><li class="mb-2"><i class="fas fa-arrow-right text-warning me-2"></i> Une prime de 80% du montant du diagnostic global et stratégique</li><li class="mb-2"><i class="fas fa-arrow-right text-warning me-2"></i> Une prime de 80% du montant de l’’investissement immatériel (missions de conseil, d’assistance technique, acquisition de logiciels et/ou formations) à réaliser par l’entreprise</li><li class="mb-2"><i class="fas fa-arrow-right text-warning me-2"></i> Un accompagnement pour faciliter l’accès au crédit à moyen et/ou long terme structuré auprès du système bancaire pour financer les investissements matériels des entreprises industrielles (équipements industriels ou de laboratoires, locaux techniques)</li></ul><p class="mb-3">Le Programme National de Restructuration et de Mise à Niveau (PNRMN) a pour objectif de stimuler la production industrielle, de promouvoir l’investissement et l’emploi, tout en renforçant la compétitivité des entreprises industrielles aux niveaux régional et international.</p><p class="mb-3">Le FREMIN constitue l’instrument financier dédié à la mise en œuvre de ce programme.</p><p>Dans ce cadre, l’Agence de Developpement de la Compétitivité des entreprises de Côte d\'Ivoire (ADCI) intervient en tant qu’organe d’exécution de la composante relative à l’appui direct aux entreprises.</p></div>',
                'realisations' => [
                    ['name' => 'STAR COSMETIC', 'sector' => 'Hygiène corporelle', 'equipment' => 'Diagnostic stratégique, Plan de mise à niveau, et Plan d\'affaires'],
                    ['name' => 'SOTIC', 'sector' => 'Equipementier', 'equipment' => 'Diagnostic stratégique, Plan de mise à niveau, et Plan d\'affaires. Assistance technique pour la démarche de certification qualité, environnement et sécurité selon la norme ISO 4 5001'],
                    ['name' => 'DIAKITE COCOA PRODUCTS', 'sector' => 'Transformation de fèves de cacao', 'equipment' => 'Diagnostic stratégique, Plan de mise à niveau, et Plan d\'affaires. Formaliser les programmes prérequis (PRP) pour amorcer le processus de certification FSSC 22000'],
                    ['name' => 'SOCIETE D’IMPORTATION ET DE FABRICATION D’ALIMENTATION ANIMALE (SIFAAP SA)', 'sector' => 'Fabrication d’aliments pour volailles', 'equipment' => 'Diagnostic stratégique, Plan de mise à niveau, et Plan d\'affaires'],
                    ['name' => 'SEM ENTREPRISES', 'sector' => 'Industrie Mécanique', 'equipment' => 'Assistance Technique In Situ pour l\'optimisation de la chaîne logistique'],
                    ['name' => 'AFRIQUE PHYTO PLUS (A2P)', 'sector' => 'Conditionnement et commercialisation de produits phytosanitaires', 'equipment' => 'Assistance Technique In Situ Marketing & Ventes'],
                    ['name' => 'NOUVELLE SOCIETE DE PUBLICITE ET DE PROMOTION PAR L\'OBJET (N-S2PO)', 'sector' => 'Conception de panneaux publicitaires métalliques', 'equipment' => 'Assistance Technique In Situ Lean Management'],
                    ['name' => 'SOCIETE NOUVELLE PUBLISTAR (SN PUBLISTAR)', 'sector' => 'Sérigraphie-Publicité-Décoration', 'equipment' => 'Accompagnement à la démarche qualité Mise en place d\'un Système de Management de la Qualité (SMQ) ISO 9001 V 2015. Assistance technique pour la mise en place d\'une politique de gestion des ressources humaines'],
                    ['name' => 'ALUMINIUM DISTRIBUTION SYSTEME WEST AFRICA (ADS)', 'sector' => 'Fabrication de matériaux de construction en aluminium', 'equipment' => 'Accompagnement à la démarche qualité : Mise en place d\'un Système de Management de la Qualité (SMQ) ISO 9001 V 2015'],
                    ['name' => 'SOCIETE INTERNATIONALE DE CHARCUTERIE ET DE SALAISONS (SICS)', 'sector' => 'Elevage, boucherie charcuterie et salaisons', 'equipment' => 'Assistance technique in situ Lean management'],
                    ['name' => 'FOODS CO SA', 'sector' => 'Transformation de noix de Cajou', 'equipment' => 'Diagnostic stratégique, Plan de mise à niveau, et Plan d\'affaires. Assistance technique pour la mise en place d’un système intégré de gestion'],
                    ['name' => 'DERMOPHARM', 'sector' => 'Pharmaceutique / Cosmétique', 'equipment' => 'Diagnostic stratégique, Plan de mise à niveau, et Plan d\'affaires'],
                    ['name' => 'ABN’ GROUP', 'sector' => 'Textile-habillement', 'equipment' => 'Diagnostic stratégique, Plan de mise à niveau, et Plan d\'affaires'],
                    ['name' => 'APINOME', 'sector' => 'Agro-industrie / Agro-alimentaire', 'equipment' => 'Assistance technique pour la certification au système HACCP'],
                    ['name' => 'SOCIETE DE CONSERVATION ET DE TRANSFORMATION DES PRODUITS VIVRIERS (COTRAVI)', 'sector' => 'Agroalimentaire', 'equipment' => 'Assistance technique pour l’élaboration d’une politique commerciale et marketing'],
                ],
                'media' => [
                    'gallery' => [
                        'oo1.jpg',
                        'oo2.jpg',
                        'oo3.jpg',
                        'oo4.jpg',
                        'IMG_0430.jpeg',
                        'IMG_0431.jpeg',
                        'IMG_0432.jpeg',
                        'IMG_0433.jpeg',
                        'IMG_0434.png',
                        'IMG_0435.png',
                        'IMG_0436.jpeg',
                        'IMG_0437.png'
                    ]
                ],
            ],
            [
                'id' => 2,
                'slug' => 'aed',
                'title' => 'Appuis aux Entreprises en Difficultés (AED)',
                'subtitle' => 'Accompagnement et appuis directs aux entreprises industrielles en difficulté.',
                'content' => '<div class="content-box-premium mb-4"><h3 class="section-title" style="color: #009B3A; font-weight: 800;">Contexte & Présentation</h3><p>Les effets conjoncturels engendrés par la crise de la COVID-19 et son corollaire de mesures restrictives, renforcés par la guerre russo-ukrainienne, ont ouvert le champ à plusieurs difficultés au niveau des secteurs économiques de la Côte d’Ivoire. Ainsi, dans le secteur industriel, plusieurs entreprises, notamment les PME industrielles, ont dû se résoudre au ralentissement économique, imposé par les effets post COVID-19 et à l’inflation suscitée par la guerre russo-ukrainienne. Ces difficultés ont conduit plusieurs opérateurs économiques à réduire le champ de leurs activités et laissent certaines firmes dans un état de vulnérabilité qui nécessite l’action de la politique publique.</p><p>Pour apporter des solutions aux difficultés rencontrées par ces entreprises, le Ministère du Commerce et de l’Industrie propose dans le cadre du Fonds de Restructuration et de Mise à Niveau des entreprises industrielles (FREMIN) des mesures de soutien aux entreprises en difficulté par la mise en place du Projet d’Appui aux Entreprises en Difficulté (PAED), en vue de la relance de leurs activités.</p><p class="mb-3">De façon spécifique, il s’agira de :</p><ul class="list-unstyled ms-3"><li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Identifier les entreprises en difficulté </li><li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Réaliser un diagnostic global et stratégique au profit des entreprises en difficulté identifiées </li><li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Proposer des mesures et actions visant à renforcer la compétitivité des entreprises en difficulté </li></ul><p>Ce projet vise à soutenir les PME industrielles en difficulté dans leur développement et le renforcement de leur compétitivité sur le marché national et régional, à travers des actions d’appui à l’amélioration des processus de production et de la qualité des produits.</p></div>',
                'realisations' => [
                    ['name' => 'Coopérative des Femmes Battantes de SAKIARE', 'sector' => 'Agroalimentaire', 'equipment' => 'Ligne complète de production d’attiéké (broyeur, essoreur, émotteur, semouleur, cuiseur et séchoir-serre)'],
                    ['name' => 'JENNY’S', 'sector' => 'Agroalimentaire', 'equipment' => 'broyeur d’épices'],
                    ['name' => 'KAO MARKET', 'sector' => 'Agroalimentaire', 'equipment' => 'broyeur d’épices'],
                    ['name' => 'NAMASO', 'sector' => 'Agroalimentaire', 'equipment' => 'broyeur et deux torréfacteurs'],
                    ['name' => 'LERANA FOODS', 'sector' => 'Agroalimentaire', 'equipment' => 'séchoir déshydrateur'],
                    ['name' => 'PALM OLDING', 'sector' => 'Agroalimentaire', 'equipment' => 'broyeuse et séchoir déshydrateur'],
                    ['name' => 'UNIQUE MERVEILLE', 'sector' => 'Agroalimentaire', 'equipment' => 'broyeur'],
                    ['name' => 'MELO DELICE', 'sector' => 'Agroalimentaire', 'equipment' => 'broyeur et torréfacteur'],
                    ['name' => 'SAVEUR BARAKIS', 'sector' => 'Agroalimentaire', 'equipment' => 'torréfacteur'],
                    ['name' => 'ALIKI SERVICES', 'sector' => 'Agroalimentaire', 'equipment' => 'Extracteur de jus'],
                    ['name' => 'AGF ENTREPRISE', 'sector' => 'Agroalimentaire', 'equipment' => 'Pasteurisateur et broyeur de céréales'],
                    ['name' => 'KONAN Odile Epse KOUADIO', 'sector' => 'Agroalimentaire', 'equipment' => 'Extracteur de jus et pasteurisateur'],
                ],
                'media' => [
                    'video' => 'https://www.youtube.com/embed/UI7eoNswhrU?si=A97Xv7m5brdBkomp',
                    'gallery' => ['1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg', '9.jpg', '10.jpg']
                ],
            ],
            [
                'id' => 3,
                'slug' => 'infrastructures',
                'title' => 'Mise en place des infrastructures industrielles',
                'subtitle' => 'Aménagement et mise en place des infrastructures pour les zones industrielles.',
                'content' => '<div class="content-box-premium p-4 p-md-5"><div class="row align-items-center mb-5"><div class="col-lg-12"><div class="section-header text-start mb-4"><h3 style="color: #009B3A; font-weight: 700;">Contexte</h3></div><p class="text-dark mb-4" style="text-align: justify; line-height: 1.8;">Dans le cadre du développement des infrastructures industrielles, des ressources ont été affectées par le Ministère du Budget et des Finances pour la prise en charge des engagements de l’Etat au titre de la Convention de concession signée le 14 juin 2022 entre l’Etat de Côte d’Ivoire et la société Arise Ivoire portant sur la réalisation des amenées primaires du site de la <strong>ZI PK24</strong> et la réalisation les travaux de réhabilitation des zones industrielles de <strong>Koumassi et Vridi</strong>.</p><p class="text-dark mb-0" style="text-align: justify; line-height: 1.8;">En vue de faciliter la réalisation des travaux, en utilisant le véhicule financier du <strong>FREMIN</strong>, le Ministre chargé de l’Industrie a autorisé le transfert de l’ensemble des ressources logées au « programme industrie » du Ministère en charges de l’Industrie, au FREMIN.</p></div></div><div class="alert alert-info border-0 rounded-4 p-4 shadow-sm" style="background: #e9ecef; border-left: 5px solid #0d6efd !important;"><p class="mb-0" style="text-align: justify;">Compte tenu de l’importance et de l’urgence attachées à la réalisation de ces différents travaux, un processus d’appels d’offres applicable directement est sollicité auprès du Comité de Gestion.</p></div></div>',
                'realisations' => [
                    'Travaux Electricité de 5 MW de la zone industrielle d\'Akoupé-Zeudji PK24',
                    'Maîtrise d\'œuvre Electricité 5 MW ( Convention CI-ENERGIES)',
                    'Electricité de 35 MW de la zone industrielle d\'Akoupé-Zeudji PK24',
                    'Travaux Voirie nervure centrale de la zone industrielle d\'Akoupé-Zeudji PK24',
                    'Maîtrise d\'œuvre Voirie nervure centrale ( Convention BNETD)',
                    'Travaux Eau potable de la zone industrielle d\'Akoupé-Zeudji PK24',
                    'Maîtrise d\'œuvre eau potable (convention ONEP)',
                    'Réhabilitation de la zone industrielle de Vridi',
                    'Réhabilitation de la zone industrielle de Koumassi',
                ],
                'media' => [
                    'gallery' => ['z1.jpg', 'z2.jpg', 'z3.jpg', 'z4.jpg', 'z5.jpg', 'z6.jpg']
                ],
            ],
        ];

        foreach ($pages as $page) {
            ProjectPage::updateOrCreate(['id' => $page['id']], $page);
        }
    }
}
