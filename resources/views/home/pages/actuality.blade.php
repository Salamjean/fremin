@extends('home.layouts.template')
@section('content')

    <!-- Cinematic Hero -->
    <div class="contact-header-v2">
        <div class="container text-center py-5">
            <h1 class="text-white display-2 mb-3 fw-black animate__animated animate__zoomIn"
                style="font-weight: 900; font-size: 45px; letter-spacing: -1px;">
                {{ $hero->main_title ?? 'ACTUALITÉS & ÉVÉNEMENTS' }}</h1>
            <div class="mx-auto bg-white mb-4" style="height: 4px; width: 80px;"></div>
            <p class="text-white lead animate__animated animate__fadeInUp fw-medium">
                {{ $hero->subtitle ?? 'Suivez les moments forts de l\'industrie Ivoirienne et les actions du FREMIN.' }}</p>
        </div>
    </div>

    <!-- Featured News -->
    @if($featuredArticle)
        <section class="py-5 bg-white">
            <div class="container py-5">
                <div class="row g-0 shadow-lg overflow-hidden border" data-aos="fade-up">
                    <div class="col-lg-7">
                        <img src="{{ (str_contains($featuredArticle->image, 'assets/')) ? asset($featuredArticle->image) : asset('storage/' . $featuredArticle->image) }}"
                            alt="{{ $featuredArticle->image_alt ?? $featuredArticle->title }}"
                            class="img-fluid h-100 object-fit-cover">
                    </div>
                    <div class="col-lg-5 bg-light p-5 d-flex flex-column justify-content-center">
                        <div class="contact-badge mb-3">{{ $featuredArticle->badge_text ?? 'À LA UNE' }}</div>
                        <h2 class="fw-bold mb-4">{{ $featuredArticle->title }}</h2>
                        <p class="text-muted mb-4">{{ $featuredArticle->excerpt }}</p>
                        <div class="mb-4 d-flex align-items-center gap-3">
                            <span class="text-success fw-bold"><i class="far fa-calendar-alt me-2"></i>
                                {{ $featuredArticle->formatted_date }}</span>
                            <span class="text-secondary">|</span>
                            <span class="text-secondary"><i class="far fa-user me-2"></i> Par Admin</span>
                        </div>
                        <a href="{{ $featuredArticle->read_more_link ?? '#' }}"
                            class="news-link-premium">{{ $featuredArticle->read_more_text ?? "LIRE L'ARTICLE COMPLET" }} <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- News Grid -->
    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="d-flex justify-content-between align-items-end mb-5" data-aos="fade-up">
                <div>
                    <h2 class="fw-bold mb-0">Articles Récents</h2>
                    <div class="mt-2" style="height: 3px; width: 50px; background: #FF8200;"></div>
                </div>
            </div>

            <div class="row g-4">
                @forelse($newsArticles as $article)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                    <div class="news-card-premium">
                        <div class="news-img-box">
                            <span class="news-date-tag">{{ $article->formatted_date }}</span>
                            <img src="{{ (str_contains($article->image, 'assets/')) ? asset($article->image) : asset('storage/' . $article->image) }}" alt="{{ $article->title }}">
                        </div>
                        <div class="news-body-premium">
                            <span class="news-category-v2" style="background-color: {{ $article->category_color ?? '#009B3A' }}">{{ $article->category }}</span>
                            <h4 class="news-title-v2">{{ $article->title }}</h4>
                            <p class="news-text-v2">{{ Str::limit($article->excerpt, 120) }}</p>
                            <a href="{{ $article->link ?? '#' }}" class="news-link-premium">{{ $article->link_text ?? 'EN SAVOIR PLUS' }} <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Aucun article récent disponible pour le moment.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Upcoming Events Section -->
    @if($upcomingEvents->count() > 0)
    <section class="py-5 bg-white">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold" style="color: #009B3A;">Événements à Venir</h2>
                <div class="mx-auto" style="height: 3px; width: 60px; background: #FF8200; margin-top: 10px;"></div>
            </div>
            <div class="row g-4">
                @foreach($upcomingEvents as $event)
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                    <div class="d-flex bg-light rounded shadow-sm overflow-hidden p-0 h-100">
                        <div class="col-4 p-0">
                            <img src="{{ (str_contains($event->image, 'assets/')) ? asset($event->image) : asset('storage/' . $event->image) }}" class="img-fluid h-100 object-fit-cover" alt="{{ $event->title }}">
                        </div>
                        <div class="col-8 p-4 d-flex flex-column justify-content-center">
                            <div class="d-flex align-items-center mb-2">
                                <span class="badge bg-success me-2">{{ $event->day }} {{ $event->month_short }} {{ $event->year }}</span>
                                <small class="text-muted"><i class="far fa-clock me-1"></i> {{ $event->formatted_time }}</small>
                            </div>
                            <h5 class="fw-bold mb-2">{{ $event->title }}</h5>
                            <p class="small text-muted mb-3">{{ Str::limit($event->description, 100) }}</p>
                            <div class="mt-auto">
                                <small class="text-secondary d-block mb-3"><i class="{{ $event->location_icon }} me-1"></i> {{ $event->location }}</small>
                                <a href="{{ $event->button_link ?? '#' }}" class="btn btn-sm {{ $event->button_css }}">{{ $event->button_text }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Newsletter V2 -->
    <section class="newsletter-v2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <h2 class="fw-bold mb-3">Restez au cœur de l'industrie</h2>
                    <p class="lead mb-0 opacity-75">Inscrivez-vous à notre newsletter pour ne rien manquer des opportunités
                        et actualités du secteur.</p>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="newsletter-input-group mt-4 mt-lg-0">
                        <input type="email" class="form-control" placeholder="Votre adresse email">
                        <button class="btn btn-news-subscribe">S'ABONNER</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .custom-pills .nav-link {
            border-radius: 0;
            color: #666;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 13px;
            padding: 10px 25px;
        }

        .custom-pills .nav-link.active {
            background-color: #009B3A !important;
        }
    </style>

@endsection