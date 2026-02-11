<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use App\Models\Carousel;
use App\Models\Event;
use App\Models\FeaturedArticle;
use App\Models\HeroSection;
use App\Models\NewsArticle;
use App\Models\Publication;
use App\Models\TeamMember;
use App\Models\Statistic;
use App\Models\Partner;
use App\Models\Testimonial;
use App\Models\MissionCard;
use App\Models\GovernanceCard;
use App\Models\Program;
use App\Models\Opportunity;
use App\Models\FinancedCompany;
use App\Models\PresentationStat;
use App\Models\PresentationMission;
use App\Models\PresentationValue;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $carousels = Carousel::active()->ordered()->get();
        $teamMembers = TeamMember::active()->ordered()->get();
        $statistics = Statistic::active()->ordered()->get();
        $partners = Partner::active()->ordered()->get();
        $testimonials = Testimonial::active()->ordered()->get();
        $missionCards = MissionCard::active()->ordered()->get();
        $governanceCards = GovernanceCard::active()->ordered()->get();
        $programs = Program::active()->ordered()->take(3)->get();


        $financedCompanies = FinancedCompany::active()->ordered()->get();

        // Fetch news articles or provide dummy data if empty
        $newsArticles = NewsArticle::active()->ordered()->take(5)->get();

        $ministerInfo = \App\Models\MinisterInfo::first();

        return view('home.accueil', compact(
            'carousels',
            'teamMembers',
            'newsArticles',
            'statistics',
            'partners',
            'testimonials',
            'missionCards',
            'governanceCards',
            'programs',
            'financedCompanies',
            'ministerInfo'
        ));
    }
    public function about()
    {
        $hero = HeroSection::getActive();
        $about = AboutSection::getActive();
        $stats = PresentationStat::active()->ordered()->get();
        $missions = PresentationMission::active()->ordered()->get();
        $values = PresentationValue::active()->ordered()->get();

        return view('home.pages.presentation', compact('hero', 'about', 'stats', 'missions', 'values'));
    }

    public function actuality()
    {
        $hero = HeroSection::where('main_title', 'ACTUALITÉS & ÉVÉNEMENTS')->first() ?? HeroSection::getActive();
        $featuredArticle = FeaturedArticle::getFeatured();
        $newsArticles = NewsArticle::getActive();
        $upcomingEvents = Event::getActive();
        return view('home.pages.actuality', compact('hero', 'featuredArticle', 'newsArticles', 'upcomingEvents'));
    }

    public function publication()
    {
        $hero = HeroSection::where('main_title', 'PUBLICATIONS & RESSOURCES')->first() ?? HeroSection::getActive();
        $publications = Publication::published()->orderBy('sort_order')->get();

        $rapports = $publications->where('type', 'rapport');
        $etudes = $publications->where('type', 'etude');
        $guides = $publications->where('type', 'guide');
        $autres = $publications->where('type', 'autre');

        return view('home.pages.publication', compact('hero', 'rapports', 'etudes', 'guides', 'autres'));
    }

    public function program()
    {
        $hero = HeroSection::where('main_title', 'NOS PROGRAMMES')->first() ?? HeroSection::getActive();
        $programs = Program::active()->ordered()->get();
        $opportunities = Opportunity::active()->ordered()->get();
        return view('home.pages.program', compact('hero', 'programs', 'opportunities'));
    }

    public function contact()
    {
        return view('home.pages.contact');
    }

    public function project($slug)
    {
        $project = \App\Models\Project::where('slug', $slug)->firstOrFail();
        return view('home.pages.project', compact('project'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $results = [];

        if ($query) {
            // Search in Actualités
            $actualites = \App\Models\NewsArticle::where('title', 'LIKE', "%{$query}%")
                ->orWhere('excerpt', 'LIKE', "%{$query}%")
                ->where('is_active', true)
                ->get()
                ->map(function ($item) {
                    return [
                        'type' => 'Actualité',
                        'title' => $item->title,
                        'excerpt' => $item->excerpt,
                        'url' => $item->link ?: route('home.actuality'),
                        'date' => $item->date,
                    ];
                });

            // Search in Publications
            $publications = \App\Models\Publication::where('title', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")
                ->get()
                ->map(function ($item) {
                    return [
                        'type' => 'Publication',
                        'title' => $item->title,
                        'excerpt' => $item->description,
                        'url' => route('home.publication') . '#publication-' . $item->id,
                        'date' => $item->created_at,
                    ];
                });

            // Search in Programs
            $programs = \App\Models\Program::where('title', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")
                ->get()
                ->map(function ($item) {
                    return [
                        'type' => 'Programme',
                        'title' => $item->title,
                        'excerpt' => $item->description,
                        'url' => route('home.program') . '#program-' . $item->id,
                        'date' => $item->created_at,
                    ];
                });

            $results = $actualites->concat($publications)->concat($programs)->sortByDesc('date');
        }

        return view('home.pages.search-results', compact('query', 'results'));
    }

    // Pages Institutionnelles Dédiées
    public function pnrmn()
    {
        return view('home.institutional.pnrmn');
    }

    public function projetsSpecifiques()
    {
        return view('home.institutional.projets-specifiques');
    }

    public function zonesIndustrielles()
    {
        return view('home.institutional.zones-industrielles');
    }

    public function comiteGestion()
    {
        $teamMembers = TeamMember::active()->ordered()->get();
        return view('home.institutional.comite-gestion', compact('teamMembers'));
    }

    public function celluleTechnique()
    {
        return view('home.institutional.cellule-technique');
    }

    public function tutelles()
    {
        return view('home.institutional.tutelles');
    }

    public function showMission($slug)
    {
        $card = MissionCard::where('slug', $slug)->active()->firstOrFail();
        return view('home.institutional.detail', [
            'card' => $card,
            'type' => 'mission'
        ]);
    }

    public function showGovernance($slug)
    {
        $card = GovernanceCard::where('slug', $slug)->active()->firstOrFail();
        return view('home.institutional.detail', [
            'card' => $card,
            'type' => 'governance'
        ]);
    }

    public function etudes()
    {
        $hero = HeroSection::getActive();
        return view('home.activities.etudes', compact('hero'));
    }

    public function ceremonies()
    {
        $hero = HeroSection::getActive();
        return view('home.activities.ceremonies', compact('hero'));
    }

    public function ateliers()
    {
        $hero = HeroSection::getActive();
        return view('home.activities.ateliers', compact('hero'));
    }

    public function accompagnement()
    {
        $hero = HeroSection::getActive();
        return view('home.activities.accompagnement', compact('hero'));
    }

    public function modernisationPresentation()
    {
        $hero = HeroSection::getActive();
        return view('home.projets.modernisation-presentation', compact('hero'));
    }

    public function modernisationRealisation()
    {
        $hero = HeroSection::getActive();
        // Fetch financed companies for realization display
        $financedCompanies = FinancedCompany::active()->ordered()->get();
        return view('home.projets.modernisation-realisation', compact('hero', 'financedCompanies'));
    }

    public function modernisationMedia()
    {
        $hero = HeroSection::getActive();
        return view('home.projets.modernisation-media', compact('hero'));
    }

    public function aedProjet()
    {
        $hero = HeroSection::getActive();
        return view('home.projets.aed', compact('hero'));
    }

    public function infrastructures()
    {
        $hero = HeroSection::getActive();
        return view('home.projets.infrastructures', compact('hero'));
    }
}
