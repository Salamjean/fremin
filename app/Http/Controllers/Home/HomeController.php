<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use App\Models\Carousel;
use App\Models\Event;
use App\Models\FeaturedArticle;
use App\Models\HeroSection;
use App\Models\NewsArticle;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $carousels = Carousel::active()->ordered()->get();
        $teamMembers = TeamMember::active()->ordered()->get();

        return view('home.accueil', compact('carousels', 'teamMembers'));
    }
    public function about()
    {
        $hero = HeroSection::getActive();
        $about = AboutSection::getActive();
        return view('home.pages.presentation', compact('hero', 'about'));
    }

    public function actuality()
    {
        $featuredArticle = FeaturedArticle::getFeatured();
        $newsArticles = NewsArticle::getActive();
        $upcomingEvents = Event::getActive();
        return view('home.pages.actuality', compact('featuredArticle', 'newsArticles', 'upcomingEvents'));
    }

    public function publication()
    {
        return view('home.pages.publication');
    }

    public function program()
    {
        $programs = \App\Models\Program::active()->ordered()->get();
        $opportunities = \App\Models\Opportunity::active()->ordered()->get();
        return view('home.pages.program', compact('programs', 'opportunities'));
    }

    public function contact()
    {
        return view('home.pages.contact');
    }
}
