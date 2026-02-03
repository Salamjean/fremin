<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FeaturedArticle;
use App\Models\NewsArticle;
use App\Models\Event;
use App\Models\HeroSection;
use Carbon\Carbon;

class ActualiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 0. Hero Section
        HeroSection::updateOrCreate(
            ['main_title' => 'ACTUALITÉS & ÉVÉNEMENTS'],
            [
                'subtitle' => 'Suivez les moments forts de l\'industrie Ivoirienne et les actions du FREMIN.',
                'description' => 'Découvrez les dernières nouvelles et les événements à venir.',
                'image' => 'assets/img/fremin8.jpeg',
                'is_active' => true
            ]
        );

        // 1. Featured Article
        FeaturedArticle::updateOrCreate(
            ['title' => 'Lancement du Programme National de Mise à Niveau 2026'],
            [
                'badge_text' => 'À LA UNE',
                'image' => 'assets/img/fremin8.jpeg',
                'category' => 'Stratégie',
                'publication_date' => Carbon::parse('2026-01-25'),
                'excerpt' => "Un jalon historique pour l'industrie nationale. Le FREMIN déploie une enveloppe stratégique pour accompagner 50 PME industrielles vers l'excellence régionale.",
                'is_active' => true,
                'sort_order' => 1
            ]
        );

        // 2. News Articles
        $news = [
            [
                'title' => 'Atelier sur la transformation numérique des usines',
                'category' => 'Industrialisation',
                'date' => '2026-01-15',
                'image' => 'assets/img/fremin3.jpeg',
                'excerpt' => "Favoriser l'adoption de l'industrie 4.0 pour une meilleure efficacité énergétique et opérationnelle...",
                'type' => 'Actualité',
                'sort_order' => 1
            ],
            [
                'title' => 'Forum des Partenaires Industriels 2026',
                'category' => 'Événement',
                'date' => '2026-01-10',
                'image' => 'assets/img/fremin4.jpeg',
                'excerpt' => "Le rendez-vous incontournable pour les acteurs du secteur privé et les bailleurs de fond internationaux...",
                'type' => 'Événement',
                'sort_order' => 2
            ],
            [
                'title' => 'Nouveaux mécanismes de garantie pour les PME',
                'category' => 'Finance',
                'date' => '2026-01-05',
                'image' => 'assets/img/fremin5.jpeg',
                'excerpt' => "Une solution innovante pour lever les barrières à l'accès au crédit pour les entreprises industrielles...",
                'type' => 'Actualité',
                'sort_order' => 3
            ],
            [
                'title' => 'Remise de certificats ISO à 12 lauréats',
                'category' => 'Qualité',
                'date' => '2026-01-02',
                'image' => 'assets/img/fremin2.jpeg',
                'excerpt' => "Célébration du mérite et de la rigueur opérationnelle pour les entreprises ayant achevé leur mise à niveau...",
                'type' => 'Actualité',
                'sort_order' => 4
            ],
        ];

        foreach ($news as $item) {
            NewsArticle::updateOrCreate(['title' => $item['title']], $item);
        }

        // 3. Events
        $events = [
            [
                'title' => 'Séminaire sur la Certification ISO 9001',
                'event_date' => '2026-02-15',
                'start_time' => '09:00',
                'end_time' => '12:00',
                'location' => 'Siège du FREMIN, Abidjan',
                'location_type' => 'in_person',
                'description' => "Une session intensive pour comprendre les exigences de la norme ISO 9001:2015.",
                'image' => 'assets/img/fremin6.jpeg',
                'is_active' => true,
                'sort_order' => 1
            ],
            [
                'title' => 'Webinaire : Financement de l\'Innovation',
                'event_date' => '2026-02-20',
                'start_time' => '14:30',
                'end_time' => '16:00',
                'location' => 'En ligne (Zoom)',
                'location_type' => 'online',
                'description' => "Découvrez les nouveaux instruments de financement pour vos projets d'innovation.",
                'image' => 'assets/img/fremin7.jpeg',
                'is_active' => true,
                'sort_order' => 2
            ],
        ];

        foreach ($events as $event) {
            Event::updateOrCreate(['title' => $event['title']], $event);
        }
    }
}
