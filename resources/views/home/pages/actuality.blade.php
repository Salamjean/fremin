@extends('home.layouts.template')
@section('content')

    <!-- Hero Section Actualités -->
    <section class="news-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="hero-title">
                        <span class="text-primary">Actualités</span> & Événements
                    </h1>
                    <p class="hero-subtitle">
                        Restez informé des dernières nouvelles, événements et activités du FREMIN
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <div class="hero-stats">
                        <div class="stat-badge">
                            <i class="fas fa-newspaper me-2"></i>
                            <span>24 Articles</span>
                        </div>
                        <div class="stat-badge">
                            <i class="fas fa-calendar-alt me-2"></i>
                            <span>5 Événements à venir</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Filtres -->
    <section class="filters-section py-4 bg-light">
        <div class="container">
            <div class="filter-tags text-center">
                <button class="filter-tag active" data-filter="all">
                    Tous
                </button>
                <button class="filter-tag" data-filter="actualites">
                    <i class="fas fa-newspaper me-2"></i>Actualités
                </button>
                <button class="filter-tag" data-filter="evenements">
                    <i class="fas fa-calendar-alt me-2"></i>Événements
                </button>
                <button class="filter-tag" data-filter="communiques">
                    <i class="fas fa-bullhorn me-2"></i>Communiqués
                </button>
            </div>
        </div>
    </section>

    <!-- Contenu Principal -->
    <section class="news-main py-5">
        <div class="container">
            @php
                $featuredArticle = App\Models\FeaturedArticle::getFeatured();
            @endphp

            @if ($featuredArticle)
                <!-- Article à la Une -->
                <div class="featured-article mb-5">
                    <div class="featured-badge">
                        @if ($featuredArticle->badge_icon)
                            <i class="{{ $featuredArticle->badge_icon }}"></i>
                        @endif
                        {{ $featuredArticle->badge_text }}
                    </div>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="featured-image">
                                @if ($featuredArticle->image)
                                    <img src="{{ asset('storage/' . $featuredArticle->image) }}"
                                        alt="{{ $featuredArticle->image_alt ?? $featuredArticle->title }}"
                                        class="img-fluid rounded">
                                @else
                                    <img src="{{ asset('assets/img/fremin8.jpeg') }}" alt="{{ $featuredArticle->title }}"
                                        class="img-fluid rounded">
                                @endif
                                @if ($featuredArticle->category)
                                    <div class="image-category">
                                        {{ $featuredArticle->category }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="featured-content">
                                <div class="article-meta mb-3">
                                    <span class="meta-date">
                                        <i class="far fa-calendar me-1"></i>
                                        {{ $featuredArticle->publication_date->format('d F Y') }}
                                    </span>
                                    <span class="meta-views">
                                        <i class="far fa-eye me-1"></i>
                                        {{ number_format($featuredArticle->views, 0, ',', ' ') }} vues
                                    </span>
                                </div>

                                <h2 class="article-title mb-3">
                                    {{ $featuredArticle->title }}
                                </h2>

                                <p class="article-excerpt">
                                    {{ $featuredArticle->excerpt }}
                                </p>

                                @if ($featuredArticle->read_more_link)
                                    <a href="{{ $featuredArticle->read_more_link }}" class="read-more-btn" target="_blank">
                                        {{ $featuredArticle->read_more_text ?? 'Lire l\'article complet' }}
                                        <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Liste des Actualités -->
            <h3 class="section-subtitle mb-4">Dernières Actualités</h3>

            <div class="row g-4">
                <!-- Article 1 -->
                @php
                    $newsArticles = App\Models\NewsArticle::getActive();
                @endphp

                @if ($newsArticles->isNotEmpty())
                    <!-- Section des actualités -->
                    <section class="news-section py-5">
                        <div class="container">
                            <div class="section-header text-center mb-5">
                                <h2 class="section-title">Actualités & Événements</h2>
                                <div class="title-underline"></div>
                                <p class="section-subtitle mt-3">Restez informé des dernières nouvelles et événements du
                                    FREMIN</p>
                            </div>

                            <div class="row g-4">
                                @foreach ($newsArticles as $article)
                                    <div class="col-md-6 col-lg-4">
                                        <div class="news-card {{ $article->is_event ? 'event-card' : '' }}">
                                            <div class="news-image">
                                                @if ($article->image)
                                                    <img src="{{ asset('storage/' . $article->image) }}"
                                                        alt="{{ $article->image_alt ?? $article->title }}"
                                                        class="img-fluid">
                                                @else
                                                    <img src="{{ asset('assets/img/fremin3.jpeg') }}"
                                                        alt="{{ $article->title }}" class="img-fluid">
                                                @endif
                                                <div class="news-category {{ $article->category_color }}">
                                                    {{ $article->category }}
                                                </div>

                                                @if ($article->is_event && $article->event_date)
                                                    <div class="event-date">
                                                        <span class="event-day">{{ $article->eventDay }}</span>
                                                        <span class="event-month">{{ $article->eventMonth }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="news-content">
                                                <div class="news-meta">
                                                    <span class="news-date">{{ $article->formattedDate }}</span>
                                                    <span class="news-type">{{ $article->type }}</span>
                                                </div>
                                                <h4 class="news-title">
                                                    {{ $article->title }}
                                                </h4>
                                                <p class="news-excerpt">
                                                    {{ $article->excerpt }}
                                                </p>
                                                <div class="news-footer">
                                                    @if ($article->is_event)
                                                        <button class="btn btn-sm btn-primary">
                                                            @if ($article->event_button_icon)
                                                                <i class="{{ $article->event_button_icon }} me-1"></i>
                                                            @endif
                                                            {{ $article->event_button_text }}
                                                        </button>
                                                        <span class="news-stats">
                                                            <i class="fas fa-users me-1"></i>
                                                            {{ number_format($article->event_registrations, 0, ',', ' ') }}
                                                            inscrits
                                                        </span>
                                                    @else
                                                        @if ($article->link)
                                                            <a href="{{ $article->link }}" class="news-link"
                                                                target="_blank">
                                                                <i class="fas fa-arrow-right"></i>
                                                            </a>
                                                        @endif
                                                        <span class="news-stats">
                                                            <i class="far fa-eye me-1"></i>
                                                            {{ number_format($article->views, 0, ',', ' ') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                @endif

                <!-- Bouton Voir Plus -->
                <div class="text-center mt-5">
                    <button class="btn btn-outline-primary btn-load-more">
                        <i class="fas fa-redo me-2"></i> Charger plus d'articles
                    </button>
                </div>
            </div>
    </section>

    @php
        $upcomingEvents = App\Models\Event::upcoming()->take(4)->get();
    @endphp

    <section class="upcoming-events py-5 bg-light">
        <div class="container">
            <div class="section-header mb-5">
                <h2 class="section-title">
                    <i class="fas fa-calendar-check me-3"></i>
                    Événements à Venir
                </h2>
                <p class="section-subtitle">Participez à nos prochains événements</p>
            </div>

            <div class="row g-4">
                @if ($upcomingEvents->count() > 0)
                    @foreach ($upcomingEvents as $event)
                        <div class="col-md-6 col-lg-3">
                            <div class="event-card-small">
                                <div class="event-date-card">
                                    <div class="event-month">{{ $event->month_short }}</div>
                                    <div class="event-day">{{ $event->day }}</div>
                                    <div class="event-year">{{ $event->year }}</div>
                                </div>
                                <div class="event-info">
                                    <h5 class="event-title">{{ $event->title }}</h5>
                                    <p class="event-location">
                                        <i class="{{ $event->location_icon }} me-2"></i>
                                        {{ $event->location }}
                                    </p>
                                    <p class="event-time">
                                        <i class="far fa-clock me-2"></i>
                                        {{ $event->formatted_time }}
                                    </p>
                                    @if ($event->button_link)
                                        <a href="{{ $event->button_link }}"
                                            class="btn btn-sm {{ $event->button_css }} mt-2 w-100" target="_blank">
                                            {{ $event->button_text ?: 'En savoir plus' }}
                                        </a>
                                    @else
                                        <button class="btn btn-sm {{ $event->button_css }} mt-2 w-100" disabled>
                                            {{ $event->button_text ?: 'En savoir plus' }}
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

                <!-- Événements par défaut si moins de 4 -->
                @if ($upcomingEvents->count() < 4)
                    @for ($i = $upcomingEvents->count(); $i < 4; $i++)
                        <div class="col-md-6 col-lg-3">
                            <div class="event-card-small">
                                <div class="event-date-card">
                                    <div class="event-month">---</div>
                                    <div class="event-day">--</div>
                                    <div class="event-year">----</div>
                                </div>
                                <div class="event-info">
                                    <h5 class="event-title">Événement à venir</h5>
                                    <p class="event-location">
                                        <i class="fas fa-map-marker-alt me-2"></i>
                                        À déterminer
                                    </p>
                                    <p class="event-time">
                                        <i class="far fa-clock me-2"></i>
                                        À venir
                                    </p>
                                    <button class="btn btn-sm btn-outline-primary mt-2 w-100" disabled>
                                        Bientôt disponible
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endfor
                @endif

                <!-- Message si aucun événement -->
                @if ($upcomingEvents->count() == 0)
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="fas fa-calendar-times fa-4x text-muted mb-3"></i>
                            <h4 class="text-muted">Aucun événement à venir</h4>
                            <p class="text-muted">Revenez plus tard pour découvrir nos prochains événements.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="newsletter-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="newsletter-card">
                        <i class="fas fa-envelope newsletter-icon"></i>
                        <h3 class="newsletter-title">Restez Informé</h3>
                        <p class="newsletter-text">
                            Recevez nos actualités et invitations aux événements directement dans votre boîte email
                        </p>
                        <div class="newsletter-form mt-4">
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="Votre adresse email">
                                <button class="btn btn-primary" type="button">
                                    S'abonner <i class="fas fa-paper-plane ms-2"></i>
                                </button>
                            </div>
                            <p class=" mt-2 text-black">
                                <i class="fas fa-lock me-1"></i>
                                Nous respectons votre vie privée. Désabonnez-vous à tout moment.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        :root {
            --primary-color: #00632d;
            --primary-light: #e8f5e9;
            --white: #ffffff;
            --dark: #333333;
            --light-gray: #f8f9fa;
            --border-color: #eaeaea;
        }

        /* Hero Section */
        .news-hero {
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--white) 100%);
            padding: 80px 0 40px;
            border-bottom: 3px solid var(--primary-color);
        }

        .hero-title {
            font-size: 2.8rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 1rem;
        }

        .hero-title .text-primary {
            color: var(--primary-color) !important;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            color: #666;
            max-width: 600px;
        }

        .hero-stats {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .stat-badge {
            background: var(--white);
            padding: 12px 20px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            font-weight: 600;
            color: var(--primary-color);
        }

        .stat-badge i {
            font-size: 1.2rem;
        }

        /* Filtres */
        .filters-section {
            border-bottom: 1px solid var(--border-color);
        }

        .filter-tags {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .filter-tag {
            background: var(--white);
            border: 2px solid var(--border-color);
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 600;
            color: #666;
            transition: all 0.3s ease;
        }

        .filter-tag:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
            transform: translateY(-2px);
        }

        .filter-tag.active {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: var(--white);
        }

        /* Article à la Une */
        .featured-article {
            position: relative;
            background: var(--white);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--border-color);
        }

        .featured-badge {
            position: absolute;
            top: -15px;
            left: 30px;
            background: #ff6b00;
            color: white;
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .featured-image {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            height: 100%;
            min-height: 300px;
        }

        .featured-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .image-category {
            position: absolute;
            top: 15px;
            left: 15px;
            background: var(--primary-color);
            color: var(--white);
            padding: 5px 15px;
            border-radius: 5px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .article-meta {
            display: flex;
            gap: 20px;
            font-size: 0.9rem;
            color: #666;
        }

        .meta-date,
        .meta-views {
            display: flex;
            align-items: center;
        }

        .article-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark);
            line-height: 1.3;
            margin: 15px 0;
        }

        .article-title a {
            color: inherit;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .article-title a:hover {
            color: var(--primary-color);
        }

        .article-excerpt {
            color: #555;
            line-height: 1.7;
            margin-bottom: 25px;
        }

        .read-more-btn {
            display: inline-flex;
            align-items: center;
            color: var(--primary-color);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .read-more-btn:hover {
            gap: 10px;
            color: #004d24;
        }

        /* Cartes Actualités */
        .news-card {
            background: var(--white);
            border-radius: 10px;
            overflow: hidden;
            height: 100%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border: 1px solid var(--border-color);
        }

        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .news-image {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .news-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .news-card:hover .news-image img {
            transform: scale(1.05);
        }

        .news-category {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--primary-color);
            color: var(--white);
            padding: 4px 12px;
            border-radius: 5px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .news-content {
            padding: 20px;
        }

        .news-meta {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 0.85rem;
            color: #666;
        }

        .news-date {
            color: var(--primary-color);
            font-weight: 600;
        }

        .news-type {
            background: var(--primary-light);
            color: var(--primary-color);
            padding: 2px 8px;
            border-radius: 3px;
            font-size: 0.75rem;
        }

        .news-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 10px;
            line-height: 1.4;
        }

        .news-excerpt {
            color: #666;
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .news-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 15px;
            border-top: 1px solid var(--border-color);
        }

        .news-link {
            color: var(--primary-color);
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .news-link:hover {
            transform: translateX(5px);
        }

        .news-stats {
            font-size: 0.85rem;
            color: #666;
        }

        /* Cartes Événements */
        .event-card .news-image {
            position: relative;
        }

        .event-date {
            position: absolute;
            bottom: 15px;
            left: 15px;
            background: var(--white);
            width: 60px;
            height: 60px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .event-day {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            line-height: 1;
        }

        .event-month {
            font-size: 0.8rem;
            font-weight: 600;
            color: #666;
            text-transform: uppercase;
        }

        /* Événements à Venir */
        .section-header {
            text-align: center;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .section-subtitle {
            color: #666;
            font-size: 1.1rem;
        }

        .event-card-small {
            background: var(--white);
            border-radius: 10px;
            padding: 20px;
            display: flex;
            gap: 15px;
            align-items: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border: 1px solid var(--border-color);
        }

        .event-card-small:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .event-date-card {
            background: var(--primary-light);
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            min-width: 70px;
        }

        .event-month {
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--primary-color);
            text-transform: uppercase;
        }

        .event-day {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark);
            line-height: 1;
            margin: 5px 0;
        }

        .event-year {
            font-size: 0.8rem;
            color: #666;
        }

        .event-info {
            flex: 1;
        }

        .event-title {
            font-size: 1rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .event-location,
        .event-time {
            font-size: 0.85rem;
            color: #666;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
        }

        /* Newsletter */
        .newsletter-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, #004d24 100%);
            color: var(--white);
        }

        .newsletter-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 40px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .newsletter-icon {
            font-size: 3rem;
            margin-bottom: 20px;
            color: var(--white);
        }

        .newsletter-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .newsletter-text {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .newsletter-form .form-control {
            border: none;
            padding: 15px 20px;
            border-radius: 10px 0 0 10px;
        }

        .newsletter-form .btn {
            border-radius: 0 10px 10px 0;
            padding: 15px 30px;
        }

        .form-text {
            font-size: 0.85rem;
            opacity: 0.8;
        }

        /* Boutons */
        .btn-load-more {
            padding: 12px 40px;
            font-weight: 600;
            border-width: 2px;
        }

        .btn-load-more:hover {
            background: var(--primary-color);
            color: var(--white);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }

            .hero-stats {
                margin-top: 20px;
                flex-direction: row;
                justify-content: center;
            }

            .featured-article {
                padding: 20px;
            }

            .article-title {
                font-size: 1.5rem;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .filter-tags {
                justify-content: flex-start;
                overflow-x: auto;
                padding-bottom: 10px;
            }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Filtrage des articles
            const filterTags = document.querySelectorAll('.filter-tag');
            const newsCards = document.querySelectorAll('.news-card, .featured-article');

            filterTags.forEach(tag => {
                tag.addEventListener('click', function() {
                    // Retirer la classe active de tous les tags
                    filterTags.forEach(t => t.classList.remove('active'));
                    // Ajouter la classe active au tag cliqué
                    this.classList.add('active');

                    const filterValue = this.getAttribute('data-filter');

                    // Filtrer les articles
                    newsCards.forEach(card => {
                        if (filterValue === 'all') {
                            card.style.display = 'block';
                        } else {
                            // Logique de filtrage basée sur la catégorie
                            // À adapter selon votre structure
                            card.style.display = 'block';
                        }
                    });
                });
            });

            // Animation au scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animated');
                    }
                });
            }, observerOptions);

            // Observer les cartes
            document.querySelectorAll('.news-card, .event-card-small').forEach(card => {
                observer.observe(card);
            });

            // Bouton Charger plus
            const loadMoreBtn = document.querySelector('.btn-load-more');
            if (loadMoreBtn) {
                loadMoreBtn.addEventListener('click', function() {
                    this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Chargement...';
                    this.disabled = true;

                    // Simuler un chargement
                    setTimeout(() => {
                        this.innerHTML =
                            '<i class="fas fa-check me-2"></i> Tous les articles chargés';
                        this.classList.remove('btn-outline-primary');
                        this.classList.add('btn-secondary');
                    }, 1500);
                });
            }

            // Inscription newsletter
            const newsletterBtn = document.querySelector('.newsletter-form .btn');
            const newsletterInput = document.querySelector('.newsletter-form input');

            if (newsletterBtn) {
                newsletterBtn.addEventListener('click', function() {
                    if (newsletterInput.value) {
                        this.innerHTML = '<i class="fas fa-check me-2"></i> Inscrit !';
                        this.classList.remove('btn-primary');
                        this.classList.add('btn-success');
                        newsletterInput.disabled = true;
                    }
                });
            }
        });
    </script>
@endsection
