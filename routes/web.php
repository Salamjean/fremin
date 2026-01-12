<?php

use App\Http\Controllers\Admin\Actualite\EventController;
use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Admin\AuthenticateAdmin;
use App\Http\Controllers\Admin\Home\AccueilController;
use App\Http\Controllers\Admin\Home\TeamController;
use App\Http\Controllers\Admin\Presentation\AboutSectionController;
use App\Http\Controllers\Admin\Presentation\GalleryController;
use App\Http\Controllers\Admin\Presentation\HeroSectionController;
use App\Http\Controllers\Admin\Actualite\FeaturedArticleController;
use App\Http\Controllers\Admin\Actualite\NewsArticleController;
use App\Http\Controllers\Admin\Publication\PublicationController;
use App\Http\Controllers\Home\HomeController;
use Illuminate\Support\Facades\Route;


//Les routes de la page
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::prefix('home')->group(function () {
    Route::get('/about', [HomeController::class, 'about'])->name('home.about');
    Route::get('/actuality', [HomeController::class, 'actuality'])->name('home.actuality');
    Route::get('/publication', [HomeController::class, 'publication'])->name('home.publication');
    Route::get('/program', [HomeController::class, 'program'])->name('home.program');
    Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
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
});

Route::get('/publications', [PublicationController::class, 'frontIndex'])->name('publications.index');
Route::get('/publications/{publication}', [PublicationController::class, 'frontShow'])->name('publications.show');
Route::get('/publications/{publication}/download', [PublicationController::class, 'download'])->name('publications.download');
Route::post('/publications/{publication}/track-view', [PublicationController::class, 'trackView'])->name('publications.track-view');
Route::post('/publications/{publication}/track-download', [PublicationController::class, 'trackDownload'])->name('publications.track-download');
