<?php

use App\Http\Controllers\Admin\Actualite\EventController;
use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Admin\AuthenticateAdmin;
use App\Http\Controllers\Admin\Home\AccueilController;
use App\Http\Controllers\Admin\Home\TeamController;
use App\Http\Controllers\Admin\Presentation\AboutSectionController;
use App\Http\Controllers\Admin\Presentation\GalleryController;
use App\Http\Controllers\Admin\Presentation\HeroSectionController;
use App\Http\Controllers\Admin\Presentation\PresentationStatController;
use App\Http\Controllers\Admin\Presentation\PresentationMissionController;
use App\Http\Controllers\Admin\Presentation\PresentationValueController;
use App\Http\Controllers\Admin\Actualite\FeaturedArticleController;
use App\Http\Controllers\Admin\Actualite\NewsArticleController;
use App\Http\Controllers\Admin\Program\ProgramController;
use App\Http\Controllers\Admin\Program\OpportunityController;
use App\Http\Controllers\Admin\Publication\PublicationController;
use App\Http\Controllers\Home\HomeController;
use Illuminate\Support\Facades\Route;


//Les routes de la page
Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'fr'])) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('lang.switch');

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::prefix('home')->group(function () {
    Route::get('/about', [HomeController::class, 'about'])->name('home.about');
    Route::get('/actuality', [HomeController::class, 'actuality'])->name('home.actuality');
    Route::get('/publication', [HomeController::class, 'publication'])->name('home.publication');
    Route::get('/program', [HomeController::class, 'program'])->name('home.program');
    Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
    Route::get('/project/{slug}', [HomeController::class, 'project'])->name('home.project');
    Route::get('/search', [HomeController::class, 'search'])->name('home.search');

    // Pages Institutionnelles Dédiées
    Route::get('/missions/pnrmn', [HomeController::class, 'pnrmn'])->name('home.pnrmn');
    Route::get('/missions/projets-specifiques', [HomeController::class, 'projetsSpecifiques'])->name('home.projets-specifiques');
    Route::get('/missions/zones-industrielles', [HomeController::class, 'zonesIndustrielles'])->name('home.zones-industrielles');
    Route::get('/gouvernance/comite-gestion', [HomeController::class, 'comiteGestion'])->name('home.comite-gestion');
    Route::get('/gouvernance/cellule-technique', [HomeController::class, 'celluleTechnique'])->name('home.cellule-technique');
    Route::get('/gouvernance/tutelles', [HomeController::class, 'tutelles'])->name('home.tutelles');

    // Projets
    Route::get('/projects/modernisation/presentation', [HomeController::class, 'modernisationPresentation'])->name('home.projets.modernisation.presentation');
    Route::get('/projects/modernisation/realisation', [HomeController::class, 'modernisationRealisation'])->name('home.projets.modernisation.realisation');
    Route::get('/projects/modernisation/media', [HomeController::class, 'modernisationMedia'])->name('home.projets.modernisation.media');
    Route::get('/projects/aed', [HomeController::class, 'aedProjet'])->name('home.projets.aed');
    Route::get('/projects/infrastructures', [HomeController::class, 'infrastructures'])->name('home.projets.infrastructures');

    // Pages d'Activités
    Route::get('/activities/etudes', [HomeController::class, 'etudes'])->name('home.activities.etudes');
    Route::get('/activities/ceremonies', [HomeController::class, 'ceremonies'])->name('home.activities.ceremonies');
    Route::get('/activities/accompagnement', [HomeController::class, 'accompagnement'])->name('home.activities.accompagnement');

    // Pages de détail dynamiques
    Route::get('/missions/v/{slug}', [HomeController::class, 'showMission'])->name('home.missions.show');
    Route::get('/governance/v/{slug}', [HomeController::class, 'showGovernance'])->name('home.governance.show');
});


//Les routes de l'administration
Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthenticateAdmin::class, 'login'])->name('admin.login');
    Route::post('/login', [AuthenticateAdmin::class, 'handleLogin'])->name('admin.handleLogin');
});

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/logout', [AdminDashboard::class, 'logout'])->name('admin.logout');

    //Les routes de la page d'accueil
    Route::prefix('carousels')->name('admin.carousels.')->group(function () {
        Route::get('/', [AccueilController::class, 'index'])->name('index');
        Route::get('/add', [AccueilController::class, 'create'])->name('create');
        Route::post('/', [AccueilController::class, 'store'])->name('store');
        Route::get('/{carousel}/edit', [AccueilController::class, 'edit'])->name('edit');
        Route::put('/{carousel}', [AccueilController::class, 'update'])->name('update');
        Route::delete('/{carousel}', [AccueilController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('team')->name('admin.team.')->group(function () {
        Route::get('/', [TeamController::class, 'index'])->name('index');
        Route::get('/create', [TeamController::class, 'create'])->name('create');
        Route::post('/', [TeamController::class, 'store'])->name('store');
        Route::get('/{teamMember}/edit', [TeamController::class, 'edit'])->name('edit');
        Route::put('/{teamMember}', [TeamController::class, 'update'])->name('update');
        Route::delete('/{teamMember}', [TeamController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('statistics')->name('admin.statistics.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\Home\StatisticController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Admin\Home\StatisticController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\Admin\Home\StatisticController::class, 'store'])->name('store');
        Route::get('/{statistic}/edit', [\App\Http\Controllers\Admin\Home\StatisticController::class, 'edit'])->name('edit');
        Route::put('/{statistic}', [\App\Http\Controllers\Admin\Home\StatisticController::class, 'update'])->name('update');
        Route::delete('/{statistic}', [\App\Http\Controllers\Admin\Home\StatisticController::class, 'destroy'])->name('destroy');
        Route::post('/{statistic}/toggle-status', [\App\Http\Controllers\Admin\Home\StatisticController::class, 'toggleStatus'])->name('toggle-status');
    });

    Route::prefix('partners')->name('admin.partners.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\Home\PartnerController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Admin\Home\PartnerController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\Admin\Home\PartnerController::class, 'store'])->name('store');
        Route::get('/{partner}/edit', [\App\Http\Controllers\Admin\Home\PartnerController::class, 'edit'])->name('edit');
        Route::put('/{partner}', [\App\Http\Controllers\Admin\Home\PartnerController::class, 'update'])->name('update');
        Route::delete('/{partner}', [\App\Http\Controllers\Admin\Home\PartnerController::class, 'destroy'])->name('destroy');
        Route::post('/{partner}/toggle-status', [\App\Http\Controllers\Admin\Home\PartnerController::class, 'toggleStatus'])->name('toggle-status');
    });

    Route::prefix('testimonials')->name('admin.testimonials.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\Home\TestimonialController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Admin\Home\TestimonialController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\Admin\Home\TestimonialController::class, 'store'])->name('store');
        Route::get('/{testimonial}/edit', [\App\Http\Controllers\Admin\Home\TestimonialController::class, 'edit'])->name('edit');
        Route::put('/{testimonial}', [\App\Http\Controllers\Admin\Home\TestimonialController::class, 'update'])->name('update');
        Route::delete('/{testimonial}', [\App\Http\Controllers\Admin\Home\TestimonialController::class, 'destroy'])->name('destroy');
        Route::post('/{testimonial}/toggle-status', [\App\Http\Controllers\Admin\Home\TestimonialController::class, 'toggleStatus'])->name('toggle-status');
    });

    Route::prefix('mission-cards')->name('admin.mission-cards.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\Home\MissionCardController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Admin\Home\MissionCardController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\Admin\Home\MissionCardController::class, 'store'])->name('store');
        Route::get('/{missionCard}/edit', [\App\Http\Controllers\Admin\Home\MissionCardController::class, 'edit'])->name('edit');
        Route::put('/{missionCard}', [\App\Http\Controllers\Admin\Home\MissionCardController::class, 'update'])->name('update');
        Route::delete('/{missionCard}', [\App\Http\Controllers\Admin\Home\MissionCardController::class, 'destroy'])->name('destroy');
        Route::post('/{missionCard}/toggle-status', [\App\Http\Controllers\Admin\Home\MissionCardController::class, 'toggleStatus'])->name('toggle-status');
    });

    Route::prefix('governance-cards')->name('admin.governance-cards.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\Home\GovernanceCardController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Admin\Home\GovernanceCardController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\Admin\Home\GovernanceCardController::class, 'store'])->name('store');
        Route::get('/{governanceCard}/edit', [\App\Http\Controllers\Admin\Home\GovernanceCardController::class, 'edit'])->name('edit');
        Route::put('/{governanceCard}', [\App\Http\Controllers\Admin\Home\GovernanceCardController::class, 'update'])->name('update');
        Route::delete('/{governanceCard}', [\App\Http\Controllers\Admin\Home\GovernanceCardController::class, 'destroy'])->name('destroy');
        Route::post('/{governanceCard}/toggle-status', [\App\Http\Controllers\Admin\Home\GovernanceCardController::class, 'toggleStatus'])->name('toggle-status');
    });

    Route::prefix('financed-companies')->name('admin.financed-companies.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\Home\FinancedCompanyController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Admin\Home\FinancedCompanyController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\Admin\Home\FinancedCompanyController::class, 'store'])->name('store');
        Route::get('/{financedCompany}/edit', [\App\Http\Controllers\Admin\Home\FinancedCompanyController::class, 'edit'])->name('edit');
        Route::put('/{financedCompany}', [\App\Http\Controllers\Admin\Home\FinancedCompanyController::class, 'update'])->name('update');
        Route::delete('/{financedCompany}', [\App\Http\Controllers\Admin\Home\FinancedCompanyController::class, 'destroy'])->name('destroy');
        Route::post('/{financedCompany}/toggle-status', [\App\Http\Controllers\Admin\Home\FinancedCompanyController::class, 'toggleStatus'])->name('toggle-status');
    });

    //les routes de la page presentation
    Route::prefix('hero')->name('admin.hero.')->group(function () {
        Route::get('/', [HeroSectionController::class, 'index'])->name('index');
        Route::get('/create', [HeroSectionController::class, 'create'])->name('create');
        Route::post('/', [HeroSectionController::class, 'store'])->name('store');
        Route::get('/{hero}/edit', [HeroSectionController::class, 'edit'])->name('edit');
        Route::put('/{hero}', [HeroSectionController::class, 'update'])->name('update');
        Route::delete('/{hero}', [HeroSectionController::class, 'destroy'])->name('destroy');
        Route::post('/{hero}/toggle-status', [HeroSectionController::class, 'toggleStatus'])->name('toggle-status');
    });

    Route::prefix('about')->name('admin.about.')->group(function () {
        Route::get('/', [AboutSectionController::class, 'index'])->name('index');
        Route::get('/create', [AboutSectionController::class, 'create'])->name('create');
        Route::post('/', [AboutSectionController::class, 'store'])->name('store');
        Route::get('/{about}/edit', [AboutSectionController::class, 'edit'])->name('edit');
        Route::put('/{about}', [AboutSectionController::class, 'update'])->name('update');
        Route::delete('/{about}', [AboutSectionController::class, 'destroy'])->name('destroy');
        Route::post('/{about}/toggle-status', [AboutSectionController::class, 'toggleStatus'])->name('toggle-status');
    });

    Route::prefix('gallery')->name('admin.gallery.')->group(function () {
        Route::get('/', [GalleryController::class, 'index'])->name('index');
        Route::get('/create', [GalleryController::class, 'create'])->name('create');
        Route::post('/', [GalleryController::class, 'store'])->name('store');
        Route::get('/{gallery}/edit', [GalleryController::class, 'edit'])->name('edit');
        Route::put('/{gallery}', [GalleryController::class, 'update'])->name('update');
        Route::delete('/{gallery}', [GalleryController::class, 'destroy'])->name('destroy');
        Route::post('/{gallery}/toggle-status', [GalleryController::class, 'toggleStatus'])->name('toggle-status');
    });

    Route::prefix('presentation-stats')->name('admin.presentation-stats.')->group(function () {
        Route::get('/', [PresentationStatController::class, 'index'])->name('index');
        Route::get('/create', [PresentationStatController::class, 'create'])->name('create');
        Route::post('/', [PresentationStatController::class, 'store'])->name('store');
        Route::get('/{presentationStat}/edit', [PresentationStatController::class, 'edit'])->name('edit');
        Route::put('/{presentationStat}', [PresentationStatController::class, 'update'])->name('update');
        Route::delete('/{presentationStat}', [PresentationStatController::class, 'destroy'])->name('destroy');
        Route::post('/{presentationStat}/toggle-status', [PresentationStatController::class, 'toggleStatus'])->name('toggle-status');
    });

    Route::prefix('presentation-missions')->name('admin.presentation-missions.')->group(function () {
        Route::get('/', [PresentationMissionController::class, 'index'])->name('index');
        Route::get('/create', [PresentationMissionController::class, 'create'])->name('create');
        Route::post('/', [PresentationMissionController::class, 'store'])->name('store');
        Route::get('/{presentationMission}/edit', [PresentationMissionController::class, 'edit'])->name('edit');
        Route::put('/{presentationMission}', [PresentationMissionController::class, 'update'])->name('update');
        Route::delete('/{presentationMission}', [PresentationMissionController::class, 'destroy'])->name('destroy');
        Route::post('/{presentationMission}/toggle-status', [PresentationMissionController::class, 'toggleStatus'])->name('toggle-status');
    });

    Route::prefix('presentation-values')->name('admin.presentation-values.')->group(function () {
        Route::get('/', [PresentationValueController::class, 'index'])->name('index');
        Route::get('/create', [PresentationValueController::class, 'create'])->name('create');
        Route::post('/', [PresentationValueController::class, 'store'])->name('store');
        Route::get('/{presentationValue}/edit', [PresentationValueController::class, 'edit'])->name('edit');
        Route::put('/{presentationValue}', [PresentationValueController::class, 'update'])->name('update');
        Route::delete('/{presentationValue}', [PresentationValueController::class, 'destroy'])->name('destroy');
        Route::post('/{presentationValue}/toggle-status', [PresentationValueController::class, 'toggleStatus'])->name('toggle-status');
    });

    //Les routes de la page actualité et evenements
    Route::prefix('featured-articles')->name('admin.featured-articles.')->group(function () {
        Route::get('/', [FeaturedArticleController::class, 'index'])->name('index');
        Route::get('/create', [FeaturedArticleController::class, 'create'])->name('create');
        Route::post('/', [FeaturedArticleController::class, 'store'])->name('store');
        Route::get('/{featuredArticle}/edit', [FeaturedArticleController::class, 'edit'])->name('edit');
        Route::put('/{featuredArticle}', [FeaturedArticleController::class, 'update'])->name('update');
        Route::delete('/{featuredArticle}', [FeaturedArticleController::class, 'destroy'])->name('destroy');
        Route::post('/{featuredArticle}/toggle-status', [FeaturedArticleController::class, 'toggleStatus'])->name('toggle-status');
    });

    Route::prefix('news')->name('admin.news.')->group(function () {
        Route::get('/', [NewsArticleController::class, 'index'])->name('index');
        Route::get('/create', [NewsArticleController::class, 'create'])->name('create');
        Route::post('/', [NewsArticleController::class, 'store'])->name('store');
        Route::get('/{news}/edit', [NewsArticleController::class, 'edit'])->name('edit');
        Route::put('/{news}', [NewsArticleController::class, 'update'])->name('update');
        Route::delete('/{news}', [NewsArticleController::class, 'destroy'])->name('destroy');
        Route::post('/{news}/toggle-status', [NewsArticleController::class, 'toggleStatus'])->name('toggle-status');
        Route::post('/{news}/toggle-event-status', [NewsArticleController::class, 'toggleEventStatus'])->name('toggle-event-status');
    });

    Route::prefix('events')->name('admin.events.')->group(function () {
        Route::get('/', [EventController::class, 'index'])->name('index');
        Route::get('/create', [EventController::class, 'create'])->name('create');
        Route::post('/', [EventController::class, 'store'])->name('store');
        Route::get('/{event}/edit', [EventController::class, 'edit'])->name('edit');
        Route::put('/{event}', [EventController::class, 'update'])->name('update');
        Route::delete('/{event}', [EventController::class, 'destroy'])->name('destroy');
        Route::post('/{event}/toggle-status', [EventController::class, 'toggleStatus'])->name('toggle-status');
        Route::post('/{event}/toggle-featured', [EventController::class, 'toggleFeatured'])->name('toggle-featured');
    });

    Route::prefix('minister-infos')->name('admin.minister-infos.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\Home\MinisterInfoController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\Admin\Home\MinisterInfoController::class, 'store'])->name('store');
    });

    //Les routes de la page publications et ressources 
    Route::prefix('publications')->name('admin.publications.')->group(function () {
        Route::get('/', [PublicationController::class, 'index'])->name('index');
        Route::get('/create', [PublicationController::class, 'create'])->name('create');
        Route::post('/', [PublicationController::class, 'store'])->name('store');
        Route::get('/{publication}/edit', [PublicationController::class, 'edit'])->name('edit');
        Route::put('/{publication}', [PublicationController::class, 'update'])->name('update');
        Route::delete('/{publication}', [PublicationController::class, 'destroy'])->name('destroy');
        Route::post('/{publication}/toggle-status', [PublicationController::class, 'toggleStatus'])->name('toggle-status');
        Route::post('/{publication}/toggle-featured', [PublicationController::class, 'toggleFeatured'])->name('toggle-featured');
        Route::post('/{publication}/toggle-active', [PublicationController::class, 'toggleActive'])->name('toggle-active');
        Route::get('/{publication}/download', [PublicationController::class, 'download'])->name('download');
    });

    // Les routes de la page Programmes et Opportunités
    Route::prefix('programs')->name('admin.programs.')->group(function () {
        Route::get('/', [ProgramController::class, 'index'])->name('index');
        Route::get('/create', [ProgramController::class, 'create'])->name('create');
        Route::post('/', [ProgramController::class, 'store'])->name('store');
        Route::get('/{program}/edit', [ProgramController::class, 'edit'])->name('edit');
        Route::put('/{program}', [ProgramController::class, 'update'])->name('update');
        Route::delete('/{program}', [ProgramController::class, 'destroy'])->name('destroy');
        Route::post('/{program}/toggle-status', [ProgramController::class, 'toggleStatus'])->name('toggle-status');
    });

    Route::prefix('opportunities')->name('admin.opportunities.')->group(function () {
        Route::get('/create', [OpportunityController::class, 'create'])->name('create');
        Route::post('/', [OpportunityController::class, 'store'])->name('store');
        Route::get('/{opportunity}/edit', [OpportunityController::class, 'edit'])->name('edit');
        Route::put('/{opportunity}', [OpportunityController::class, 'update'])->name('update');
        Route::delete('/{opportunity}', [OpportunityController::class, 'destroy'])->name('destroy');
        Route::post('/{opportunity}/toggle-status', [OpportunityController::class, 'toggleStatus'])->name('toggle-status');
    });

    Route::prefix('projects')->name('admin.projects.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\Project\ProjectController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Admin\Project\ProjectController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\Admin\Project\ProjectController::class, 'store'])->name('store');
        Route::get('/{project}/edit', [\App\Http\Controllers\Admin\Project\ProjectController::class, 'edit'])->name('edit');
        Route::put('/{project}', [\App\Http\Controllers\Admin\Project\ProjectController::class, 'update'])->name('update');
        Route::delete('/{project}', [\App\Http\Controllers\Admin\Project\ProjectController::class, 'destroy'])->name('destroy');
        Route::post('/{project}/toggle-status', [\App\Http\Controllers\Admin\Project\ProjectController::class, 'toggleStatus'])->name('toggle-status');
    });
});

Route::get('/publications', [PublicationController::class, 'frontIndex'])->name('publications.index');
Route::get('/publications/{publication}', [PublicationController::class, 'frontShow'])->name('publications.show');
Route::get('/publications/{publication}/download', [PublicationController::class, 'download'])->name('publications.download');
Route::post('/publications/{publication}/track-view', [PublicationController::class, 'trackView'])->name('publications.track-view');
Route::post('/publications/{publication}/track-download', [PublicationController::class, 'trackDownload'])->name('publications.track-download');
