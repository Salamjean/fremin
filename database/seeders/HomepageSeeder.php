<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Carousel;
use App\Models\Statistic;
use App\Models\Partner;
use App\Models\Testimonial;
use App\Models\MissionCard;
use App\Models\GovernanceCard;
use App\Models\TeamMember;
use App\Models\Program;
use App\Models\FinancedCompany;

class HomepageSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Hero Slides
        Carousel::create([
            'title' => 'PROPULSER L\'AVENIR INDUSTRIEL',
            'subtitle' => 'NOTRE VISION',
            'description' => 'Accompagnement stratégique pour la restructuration et la modernisation des entreprises de Côte d\'Ivoire.',
            'image' => 'assets/img/fremin1.jpeg',
            'layout' => 'left',
            'sort_order' => 1
        ]);

        Carousel::create([
            'title' => 'ANCRAGE INSTITUTIONNEL',
            'subtitle' => 'GOUVERNANCE',
            'description' => 'Le FREMIN est placé sous la tutelle technique du Ministre chargé de l\'Industrie et sous la tutelle financière du Ministre chargé de l\'Economie et des Finances.',
            'image' => 'assets/img/video.mp4', // Note: could be video if model supports it
            'layout' => 'right',
            'sort_order' => 2
        ]);

        Carousel::create([
            'title' => 'MODERNISATION & SOUTIEN',
            'subtitle' => 'NOS MISSIONS',
            'description' => 'Fournir un accompagnement expert pour garantir la souveraineté et la compétitivité industrielle nationale.',
            'image' => 'assets/img/fremin7.jpeg',
            'layout' => 'left',
            'sort_order' => 3
        ]);

        // 2. Statistics
        Statistic::create(['label' => 'Années d\'Expérience', 'value' => '25+', 'icon' => 'fas fa-history', 'sort_order' => 1]);
        Statistic::create(['label' => 'Entreprises Assistées', 'value' => '350+', 'icon' => 'fas fa-building', 'sort_order' => 2]);
        Statistic::create(['label' => 'Missions Réalisées', 'value' => '150+', 'icon' => 'fas fa-check-circle', 'sort_order' => 3]);
        Statistic::create(['label' => 'Taux de Satisfaction', 'value' => '98%', 'icon' => 'fas fa-smile', 'sort_order' => 4]);

        // 3. Mission Cards
        MissionCard::create([
            'title' => 'MISSIONS DU FREMIN',
            'icon' => 'fas fa-bullseye',
            'description' => 'Le FREMIN assure le financement du Programme National de Restructuration et de Mise à Niveau (PNRMN). Il est notamment destiné à :',
            'list_items' => [
                'Financer l’accompagnement des entreprises via des appuis directs et des primes.',
                'Octroyer des garanties aux établissements de crédit pour faciliter l’accès au financement des investissements.',
                'Appuyer les laboratoires techniques locaux et les structures de normalisation.',
                'Financer les Centres d’Appui à la Compétitivité et au Développement Industriel (CACDI).'
            ],
            'link' => 'home.pnrmn',
            'theme' => 'ancrage-theme',
            'sort_order' => 1
        ]);

        MissionCard::create([
            'title' => 'Projets Spécifiques',
            'icon' => 'fas fa-virus',
            'description' => 'Appui aux entreprises impactées par la Covid-19 et la guerre Russo-ukrainienne via le projet "AED" (Appui aux Entreprises en Difficulté).',
            'link' => 'home.projets-specifiques',
            'theme' => 'ancrage-theme',
            'sort_order' => 2
        ]);

        MissionCard::create([
            'title' => 'Zones Industrielles',
            'icon' => 'fas fa-industry',
            'description' => 'Mise en place d\'infrastructures à Zone Industrielle Koumassi, Zone Industrielle Vridi et Zone Industrielle Akoupé Zeudji PK24.',
            'link' => 'home.zones-industrielles',
            'theme' => 'ancrage-theme',
            'sort_order' => 3
        ]);

        // 4. Governance Cards
        GovernanceCard::create([
            'title' => 'Comité de Gestion',
            'icon' => 'fas fa-users-cog',
            'description' => 'Administre le fonds et est composé de représentants des ministères suivants :',
            'list_items' => [
                'Ministère chargé de l’Industrie (Présidence)',
                'Ministère chargé des Finances (Vice-Présidence)',
                'Ministère chargé du Budget',
                'Ministère chargé des PME',
                'Banque Nationale d\'Investissement (Secrétariat)'
            ],
            'link' => 'home.comite-gestion',
            'sort_order' => 1
        ]);

        GovernanceCard::create([
            'title' => 'Cellule Technique',
            'icon' => 'fas fa-flask',
            'description' => 'Chargée d’instruire les dossiers de demande d’appuis et d\'assurer le suivi des décisions.',
            'list_items' => [
                'Représentant du Ministère en charge de l’Industrie (Présidence)',
                'Représentant du Ministère en charge des Finances',
                'Représentant du Ministère en charge du Budget',
                'Représentant du Ministère en charge des PME'
            ],
            'link' => 'home.cellule-technique',
            'sort_order' => 2
        ]);

        GovernanceCard::create([
            'title' => 'Tutelles techniques',
            'icon' => 'fas fa-landmark',
            'description' => 'Placé sous la tutelle technique de l\'Industrie et financière de l\'Économie en liaison avec le Budget.',
            'link' => 'home.tutelles',
            'sort_order' => 3
        ]);

        // 5. Team Members
        TeamMember::create([
            'name' => 'M. ESSO Jacques',
            'position' => 'Président du Comité de Gestion',
            'image' => 'assets/img/Esso.jpeg',
            'bio' => '"En ma qualité de Président du Comité de Gestion du FREMIN, je tiens à souligner l\'importance stratégique de notre mission dans l\'accompagnement des entreprises industrielles ivoiriennes vers l\'excellence et la compétitivité internationale..."',
            'is_president' => true,
            'sort_order' => 1
        ]);

        TeamMember::create(['name' => 'M. SOUMAHORO Dély', 'position' => 'Membre du Comité de Gestion', 'image' => 'assets/img/Soumahoro.jpeg', 'sort_order' => 2]);
        TeamMember::create(['name' => 'M. AHUELIE Manouan', 'position' => 'Membre du Comité de Gestion', 'image' => 'assets/img/AHUELIe.jpeg', 'sort_order' => 3]);
        TeamMember::create(['name' => 'M. ANGOA Berthin', 'position' => 'Membre du Comité de Gestion', 'image' => 'assets/img/ANGOA.jpeg', 'sort_order' => 4]);
        TeamMember::create(['name' => 'M. KANTE Ismaël', 'position' => 'Suppléant membre du Comité', 'image' => 'assets/img/Kante.jpeg', 'sort_order' => 5]);

        // 6. Testimonials
        Testimonial::create([
            'company_name' => 'IVOIRE TEXTILE',
            'sector' => 'Textile',
            'quote' => 'Grâce au financement et à l\'accompagnement du FREMIN, nous avons pu moderniser notre unité de production avec des machines haute performance...',
            'author_name' => 'M. Kouassi Yao',
            'author_position' => 'Directeur Général',
            'rating' => 5,
            'sort_order' => 1
        ]);

        Testimonial::create([
            'company_name' => 'AGRO TRANSFORM',
            'sector' => 'Agro-industrie',
            'quote' => 'Le PNRMN nous a permis d\'obtenir les certifications ISO 9001 et HACCP. Nous avons amélioré nos processus de transformation...',
            'author_name' => 'Mme Aya Koné',
            'author_position' => 'Présidente Directrice Générale',
            'rating' => 5,
            'sort_order' => 2
        ]);

        Testimonial::create([
            'company_name' => 'BOIS NOBLE CI',
            'sector' => 'Transformation',
            'quote' => 'L\'appui technique et financier du FREMIN a été déterminant pour notre croissance. Nous avons automatisé notre ligne de production...',
            'author_name' => 'M. Traoré Ibrahim',
            'author_position' => 'Fondateur & CEO',
            'rating' => 5,
            'sort_order' => 3
        ]);

        // 7. Financed Companies (Comparison)
        FinancedCompany::create([
            'company_name' => 'Société Ivoirienne de Transformation',
            'industry' => 'Agro-Industrie',
            'image_before' => 'assets/img/agro_before.png',
            'image_after' => 'assets/img/agro_after.png',
            'description' => 'Grâce au prêt de FREMIN, cette unité de transformation a pu automatiser son processus de production, triplant sa capacité journalière.',
            'sort_order' => 1
        ]);

        FinancedCompany::create([
            'company_name' => 'Atelier des Tissages Modernes',
            'industry' => 'Textile',
            'image_before' => 'assets/img/gallery/gallery-1.webp',
            'image_after' => 'assets/img/gallery/gallery-2.webp',
            'description' => 'Un investissement stratégique dans des métiers à tisser haute performance a permis à cet atelier de conquérir de nouveaux marchés.',
            'sort_order' => 2
        ]);

        // 8. Partners
        for ($i = 1; $i <= 8; $i++) {
            Partner::create([
                'name' => "Partenaire $i",
                'logo' => "assets/img/fremin$i.jpeg",
                'sort_order' => $i
            ]);
        }
        // 8. Programs (Services)
        Program::create([
            'title' => 'Diagnostic Technique',
            'description' => 'Audit approfondi de votre outil de production pour identifier les gisements de productivité et de modernisation nécessaires.',
            'image' => 'assets/img/fremin1.jpeg',
            'icon' => 'fas fa-microscope',
            'sort_order' => 1
        ]);

        Program::create([
            'title' => 'Restructuration Financière',
            'description' => 'Optimisation de votre structure de capital et accompagnement dans la recherche de financements adaptés à votre croissance.',
            'image' => 'assets/img/fremin3.jpeg',
            'icon' => 'fas fa-chart-line',
            'sort_order' => 2
        ]);

        Program::create([
            'title' => 'Modernisation des Procédés',
            'description' => 'Intégration de technologies de pointe et de solutions numériques pour digitaliser et automatiser vos chaînes de valeur.',
            'image' => 'assets/img/fremin7.jpeg',
            'icon' => 'fas fa-cogs',
            'sort_order' => 3
        ]);

        Program::create([
            'title' => 'Assistance Certification',
            'description' => 'Accompagnement rigoureux vers l\'obtention des normes internationales (ISO) pour accroître votre compétitivité.',
            'image' => 'assets/img/fremin9.jpeg',
            'icon' => 'fas fa-certificate',
            'sort_order' => 4
        ]);

        Program::create([
            'title' => 'Renforcement de Capacités',
            'description' => 'Programmes de formation technique et managériale pour vos équipes, afin de soutenir l\'excellence opérationnelle.',
            'image' => 'assets/img/fremin10.jpeg',
            'icon' => 'fas fa-users-cog',
            'sort_order' => 5
        ]);

        Program::create([
            'title' => 'Pilotage Stratégique',
            'description' => 'Élaboration de schémas directeurs et de plans stratégiques pour une vision claire et une gouvernance maîtrisée.',
            'image' => 'assets/img/fremin6.jpeg',
            'icon' => 'fas fa-chess-knight',
            'sort_order' => 6
        ]);
    }
}
