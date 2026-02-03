@extends('home.layouts.template')
@section('content')

    @include('home.layouts.carousel')

    <!-- Institutional Overview Section - Modern Design -->
    <section id="institutional-overview" class="institutional-overview">
        <div class="inst-container" data-aos="fade-up" data-aos-duration="800">
            <!-- Missions Section (Left) -->
            <div class="inst-col ancrage-theme">
                <div class="inst-header">
                    <h2 class="inst-title">MISSIONS DU FREMIN</h2>
                </div>

                @foreach ($missionCards as $card)
                    <div class="inst-card full-width" data-aos="fade-up" data-aos-delay="{{ 100 * $loop->iteration }}">
                        <div class="inst-icon-box"><i class="{{ $card->icon }}"></i></div>
                        @if ($card->title != 'MISSIONS DU FREMIN')
                            <h4>{{ $card->title }}</h4>
                        @endif
                        <p>{!! $card->description !!}</p>
                        @if ($card->list_items)
                            <ul class="inst-list-modern">
                                @foreach ($card->list_items as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        @endif
                        @if ($card->link)
                            <a href="{{ Route::has($card->link) ? route($card->link) : '#' }}" class="inst-btn-more">
                                <span>Voir plus</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>

            <!-- Governance Section (Right) -->
            <div class="inst-col mission-theme">
                <div class="inst-header">
                    <h2 class="inst-title"> PRINCIPAUX ORGANES DE GESTION</h2>
                </div>

                @foreach ($governanceCards as $card)
                    <div class="inst-card full-width" data-aos="fade-up" data-aos-delay="{{ 150 + 100 * $loop->index }}">
                        <div class="inst-icon-box"><i class="{{ $card->icon }}"></i></div>
                        <h4>{{ $card->title }}</h4>
                        <p>{!! $card->description !!}</p>
                        @if ($card->list_items)
                            <ul class="inst-list-modern">
                                @foreach ($card->list_items as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        @endif
                        @if ($card->link)
                            <a href="{{ Route::has($card->link) ? route($card->link) : '#' }}" class="inst-btn-more">
                                <span>Voir plus</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Compact News Section -->
    @if (isset($newsArticles) && $newsArticles->isNotEmpty())
        <section id="compact-news" class="compact-news section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Dernières Actualités</h2>
                <p>L'actualité industrielle et les activités du FREMIN en un coup d'œil</p>
            </div>

            <div class="container-fluid px-5" data-aos="fade-up" data-aos-delay="100">
                <div class="row g-5 align-items-stretch">

                    <!-- Trending News List (Left) -->
                    <div class="col-lg-4">
                        <div class="news-side-panel">
                            <div class="panel-header d-flex justify-content-between align-items-center mb-4">
                                <h4 class="m-0 fw-bold border-start border-4 border-success ps-3">DERNIÈRES MISSIONS</h4>
                                <a href="#" class="view-all text-muted small">Voir tout <i
                                        class="fas fa-plus"></i></a>
                            </div>

                            <div class="side-news-list">
                                <div class="side-news-item active">
                                    <div class="side-news-img">
                                        <img src="{{ asset('assets/img/fremin1.jpeg') }}" alt="">
                                    </div>
                                    <div class="side-news-info">
                                        <span class="news-category">RAPPORT</span>
                                        <h5>Mission d'évaluation du Programme de Mise à Niveau (Phase 3)</h5>
                                        <span class="news-date"><i class="far fa-calendar-alt"></i> 27 Jan. 2026</span>
                                    </div>
                                </div>

                                <div class="side-news-item">
                                    <div class="side-news-img">
                                        <img src="{{ asset('assets/img/fremin3.jpeg') }}" alt="">
                                    </div>
                                    <div class="side-news-info">
                                        <span class="news-category">AWARDS</span>
                                        <h5>4e édition des Awards de la Performance Industrielle</h5>
                                        <span class="news-date"><i class="far fa-calendar-alt"></i> 20 Jan. 2026</span>
                                    </div>
                                </div>

                                <div class="side-news-item">
                                    <div class="side-news-img">
                                        <img src="{{ asset('assets/img/fremin1.jpeg') }}" alt="">
                                    </div>
                                    <div class="side-news-info">
                                        <span class="news-category">FINANCE</span>
                                        <h5>Signature de convention pour le financement industriel</h5>
                                        <span class="news-date"><i class="far fa-calendar-alt"></i> 15 Jan. 2026</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Featured News Spotlight (Center) -->
                    <div class="col-lg-5">
                        <div class="news-spotlight">
                            <div class="spotlight-badge">À LA UNE</div>
                            <div class="spotlight-img-wrap">
                                <img src="{{ asset('assets/img/fremin3.jpeg') }}" alt="Featured">
                                <div class="spotlight-content">
                                    <div class="spotlight-title-wrap">
                                        <span class="spotlight-cat mb-2 d-inline-block">FONCTION PUBLIQUE</span>
                                        <h3 style="color:white">Dernière rencontre trimestrielle des DRH au titre de l'année
                                            2025</h3>
                                        <a href="{{ route('home.actuality') }}" class="spotlight-link">Découvrir l'article
                                            <i class="fas fa-chevron-right ms-2"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Official/Contact Spotlight (Right) -->
                    <div class="col-lg-3">
                        <div class="institutional-card-v2">
                            <div class="decorative-top"></div>
                            <div class="official-profile text-center py-4">
                                <div class="official-portrait-wrap mb-3 shadow-sm">
                                    <img src="{{ asset('assets/img/ministre.jpg') }}" alt="Commissaire General">
                                </div>
                                <h5 class="fw-bold mb-1">M. Souleymane Diarrassouba</h5>
                                <p class="text-success small fw-bold mb-3">MINISTRE DU COMMERCE, DE L'INDUSTRIE ET DE
                                    L'ARTISANAT</p>
                                <button onclick="showMinisterMessage()" class="btn-action-outline w-100 border-0">
                                    <i class="fas fa-quote-left me-2"></i> MOT DU MINISTRE
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <script>
                function showMinisterMessage() {
                    Swal.fire({
                        title: '<span style="color: #FF8200;">LE MOT DU MINISTRE</span>',
                        html: `
                                                                                                                    <div class="text-start" style="font-family: 'Inter', sans-serif;">
                                                                                                                      <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                                                                                                                        <img src="{{ asset('assets/img/mot_ministre.jpg') }}" 
                                                                                                                             style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 3px solid #009B3A; margin-right: 15px;">
                                                                                                                        <div>
                                                                                                                          <h5 class="mb-0 fw-bold">M. Souleymane Diarrassouba</h5>
                                                                                                                          <p class="text-muted small mb-0">Ministre du Commerce et de l'Industrie</p>
                                                                                                                        </div>
                                                                                                                      </div>
                                                                                                                      <p style="font-style: italic; color: #555; line-height: 1.6;">
                                                                                                                        "Le Fonds de Restructuration et de Mise à Niveau des entreprises industrielles, en abrégé FREMIN, au fil des ans, s’est positionné comme l’un des principaux instruments pour le développement industriel en Côte d’Ivoire. 
                                                                                                                          En effet, il poursuit efficacement sa mission de soutien à l’activité industrielle, notamment la mise en œuvre du Programme National de Restructuration et de Mise à Niveau des entreprises industrielles (PNRMN), la promotion de la petite transformation industrielle, l’appui aux entreprises en difficultés, en parfaite cohérence avec la vision du Gouvernement en matière de transformation structurelle de notre économie.
                                                                                                                          L’année qui s’achève a été marquée par de nombreuses actions et des résultats concrets, qui traduisent l’engagement, le professionnalisme et le sens élevé des responsabilités des organes de gestion du FREMIN.
                                                                                                                          Il me tient à cœur d’exprimer toute ma fierté au regard du travail accompli tout au long de l’année écoulée et vous exhorte à maintenir cette dynamique afin que ce Fonds demeure un outil stratégique et crédible au service du développement industriel de notre pays."
                                                                                                                      </p>
                                                                                                                      <div class="text-end mt-4">
                                                                                                                        <img src="{{ asset('assets/img/signature_minister.png') }}" style="max-height: 50px; opacity: 0.7;">
                                                                                                                      </div>
                                                                                                                    </div>
                                                                                                                  `,
                        showCloseButton: true,
                        showConfirmButton: true,
                        confirmButtonText: 'Fermer',
                        confirmButtonColor: '#009B3A',
                        width: '600px',
                        background: '#fff',
                        padding: '2em',
                        customClass: {
                            popup: 'institutional-swal-popup'
                        }
                    });
                }
            </script>

            <script>
                function showPresidentMessage() {
                    Swal.fire({
                        title: '<span style="color: #FF8200;">LE MOT DU PRÉSIDENT</span>',
                        html: `
                                                                  <div class="text-start" style="font-family: 'Inter', sans-serif;">
                                                                    <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                                                                      <img src="{{ asset('assets/img/Esso.jpeg') }}" 
                                                                           style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 3px solid #009B3A; margin-right: 15px;">
                                                                      <div>
                                                                        <h5 class="mb-0 fw-bold">M. ESSO Jacques</h5>
                                                                        <p class="text-muted small mb-0">Président du Comité de Gestion</p>
                                                                      </div>
                                                                    </div>
                                                                    <p style="font-style: italic; color: #555; line-height: 1.6;">
                                                                      "En ma qualité de Président du Comité de Gestion du FREMIN, je tiens à souligner l'importance stratégique de notre mission dans l'accompagnement des entreprises industrielles ivoiriennes vers l'excellence et la compétitivité internationale.
                                                                      Le FREMIN constitue un levier essentiel de la politique industrielle nationale. À travers le Programme National de Restructuration et de Mise à Niveau (PNRMN), nous œuvrons quotidiennement pour moderniser notre tissu industriel et renforcer les capacités de nos entreprises.
                                                                      Notre engagement se traduit par un accompagnement technique et financier de qualité, une gouvernance transparente et des décisions guidées par l'intérêt supérieur du développement industriel de notre pays.
                                                                      Je félicite l'ensemble des acteurs du FREMIN pour leur professionnalisme et leur dévouement, et j'encourage toutes les entreprises éligibles à solliciter nos appuis pour leurs projets de modernisation et d'expansion."
                                                                    </p>
                                                                    <div class="text-end mt-4">
                                                                      <p class="mb-0" style="font-weight: 600; color: #009B3A;">M. ESSO Jacques</p>
                                                                      <p class="small text-muted">Président du Comité de Gestion du FREMIN</p>
                                                                    </div>
                                                                  </div>
                                                                `,
                        showCloseButton: true,
                        showConfirmButton: true,
                        confirmButtonText: 'Fermer',
                        confirmButtonColor: '#009B3A',
                        width: '600px',
                        background: '#fff',
                        padding: '2em',
                        customClass: {
                            popup: 'institutional-swal-popup'
                        }
                    });
                }
            </script>
        </section>
    @endif
    <!-- /Compact News Section -->



    <!-- Featured Departments Section -->
    <section id="funded-companies" class="funded-companies section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Dernières Entreprises Financées</h2>
            <p>Découvrez l'impact concret de nos financements sur le tissu industriel national</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper init-swiper funded-carousel">
                <script type="application/json" class="swiper-config">
                                                                {
                                                                  "loop": true,
                                                                  "speed": 600,
                                                                  "autoplay": { "delay": 5000 },
                                                                  "slidesPerView": "auto",
                                                                  "pagination": { 
                                                                    "el": ".swiper-pagination", 
                                                                    "type": "bullets", 
                                                                    "clickable": true 
                                                                  },
                                                                  "breakpoints": {
                                                                    "320": { 
                                                                      "slidesPerView": 1, 
                                                                      "spaceBetween": 20 
                                                                    },
                                                                    "1200": { 
                                                                      "slidesPerView": 1, 
                                                                      "spaceBetween": 0 
                                                                    }
                                                                  }
                                                                }
                                                                </script>
                <div class="swiper-wrapper">

                    @foreach ($financedCompanies as $company)
                        <div class="swiper-slide">
                            <div class="funded-item">
                                <div class="row align-items-center">
                                    <div class="col-lg-7">
                                        <div class="comparison-container" onmousemove="moveSlider(event)">
                                            <img src="{{ asset('storage/' . $company->image_after) }}" alt="After"
                                                class="comparison-image image-after">
                                            <img src="{{ asset('storage/' . $company->image_before) }}" alt="Before"
                                                class="comparison-image image-before">
                                            <div class="comparison-slider"></div>
                                            <span class="comparison-label label-before">AVANT</span>
                                            <span class="comparison-label label-after">APRÈS</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="funded-content">
                                            <span class="industry">{{ $company->industry }}</span>
                                            <h3>{{ $company->company_name }}</h3>
                                            <p>{{ $company->description }}</p>
                                            <a href="{{ route('home.contact') }}" class="btn-candidature">Plus de
                                                détails</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <script>
        function moveSlider(e) {
            const container = e.currentTarget;
            const slider = container.querySelector('.comparison-slider');
            const afterImage = container.querySelector('.image-after');

            const rect = container.getBoundingClientRect();
            let x = e.clientX - rect.left;

            if (x < 0) x = 0;
            if (x > rect.width) x = rect.width;

            const percentage = (x / rect.width) * 100;

            slider.style.left = percentage + '%';
            afterImage.style.clipPath = `inset(0 0 0 ${percentage}%)`;
        }
    </script>
    <!-- /Featured Departments Section -->

    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Nos Accompagnements</h2>
            <p>Un accompagnement sur mesure pour la mise à niveau et la performance de votre entreprise</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                @foreach ($programs as $program)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ 100 * ($loop->index + 2) }}">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="{{ $program->icon ?? 'fas fa-bullhorn' }}"></i>
                            </div>
                            <div class="service-image">
                                <img src="{{ asset('storage/' . $program->image) }}" alt="{{ $program->title }}"
                                    class="img-fluid" loading="lazy">
                            </div>
                            <div class="service-content">
                                <h3>{{ $program->title }}</h3>
                                <p>{{ $program->description }}</p>
                                <a href="{{ $program->link ? (Route::has($program->link) ? route($program->link) : $program->link) : '#' }}"
                                    class="service-link">
                                    {{ $program->link_text ?? 'En savoir plus' }} <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- End Service Card -->

            </div>

        </div>

    </section><!-- /Featured Services Section -->

    <!-- Team Section Modern -->
    <section class="team-section-modern">
        <div class="container">

            <!-- Section Header -->
            <div class="section-header-modern" data-aos="fade-up">
                <span class="section-badge">Notre Équipe</span>
                <h2>Une équipe au service du<br>développement industriel</h2>
                <p>Le FREMIN s'appuie sur une équipe pluridisciplinaire composée de professionnels expérimentés, engagés
                    dans
                    l'accompagnement des entreprises industrielles ivoiriennes.</p>
            </div>

            <!-- Team Grid -->
            <div class="team-grid-modern">
                @php
                    $nonPresidents = $teamMembers->where('is_president', false)->values();
                    $president = $teamMembers->where('is_president', true)->first();
                @endphp

                <!-- Premier membre non-président -->
                @if ($nonPresidents->count() > 0)
                    @php $member = $nonPresidents->first(); @endphp
                    <div class="team-card-modern" data-aos="fade-up" data-aos-delay="100">
                        <div class="card-glow"></div>
                        <div class="member-photo">
                            <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}">
                            <div class="role-badge">Membre</div>
                        </div>
                        <div class="member-info">
                            <h3>{{ $member->name }}</h3>
                            <p class="role">{{ $member->position }}</p>
                        </div>
                    </div>
                @endif

                <!-- President (au centre entre les deux premiers) -->
                @if ($president)
                    <div class="team-card-modern featured" data-aos="fade-up" data-aos-delay="200">
                        <div class="card-glow"></div>
                        <div class="member-photo">
                            <img src="{{ asset('storage/' . $president->image) }}" alt="{{ $president->name }}">
                            <div class="role-badge president">Président</div>
                        </div>
                        <div class="member-info">
                            <h3>{{ $president->name }}</h3>
                            <p class="role">{{ $president->position }}</p>
                            @if ($president->bio)
                                <button
                                    onclick="showPresidentMessage('{{ addslashes($president->name) }}', '{{ addslashes($president->position) }}', '{{ asset('storage/' . $president->image) }}', '{{ addslashes($president->bio) }}')"
                                    class="btn-message">
                                    <i class="fas fa-quote-left"></i>
                                    <span>Mot du Président</span>
                                </button>
                            @endif
                        </div>
                    </div>
                @endif

                <!-- Membres restants -->
                @foreach ($nonPresidents->skip(1) as $member)
                    <div class="team-card-modern" data-aos="fade-up" data-aos-delay="{{ 300 + $loop->index * 100 }}">
                        <div class="card-glow"></div>
                        <div class="member-photo">
                            <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}">
                            <div class="role-badge">Membre</div>
                        </div>
                        <div class="member-info">
                            <h3>{{ $member->name }}</h3>
                            <p class="role">{{ $member->position }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section><!-- /Team Section Modern -->

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="container">

            <!-- Section Header -->
            <div class="section-header-testimonials" data-aos="fade-up">
                <span class="section-badge">Témoignages</span>
                <h2>Ce que disent nos bénéficiaires</h2>
                <p>Découvrez les success stories des entreprises accompagnées par le FREMIN</p>
            </div>

            <!-- Testimonials Grid -->
            <div class="testimonials-carousel">

                @foreach ($testimonials as $testimonial)
                    <div class="testimonial-card" data-aos="fade-up" data-aos-delay="{{ 100 * $loop->iteration }}">
                        <div class="testimonial-header">
                            <div class="company-info-group">
                                <div class="company-logo">
                                    @if ($testimonial->company_logo)
                                        <img src="{{ asset('storage/' . $testimonial->company_logo) }}"
                                            alt="{{ $testimonial->company_name }}"
                                            style="width: 100%; height: 100%; object-fit: contain;">
                                    @else
                                        <i class="fas fa-building"></i>
                                    @endif
                                </div>
                                <div class="company-info">
                                    <h4>{{ $testimonial->company_name }}</h4>
                                    <span class="sector-badge">{{ $testimonial->sector }}</span>
                                </div>
                            </div>
                            <div class="rating">
                                @for ($i = 0; $i < 5; $i++)
                                    <i class="fas fa-star {{ $i < $testimonial->rating ? '' : 'text-muted' }}"></i>
                                @endfor
                            </div>
                        </div>
                        <div class="testimonial-content">
                            <div class="quote-icon">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <p class="testimonial-text">
                                "{{ $testimonial->quote }}"
                            </p>
                        </div>
                        <div class="testimonial-footer">
                            <div class="author-photo">
                                <img src="{{ asset('assets/img/avatarDecla.png') }}"
                                    alt="{{ $testimonial->author_name }}">
                            </div>
                            <div class="author-info">
                                <h5>{{ $testimonial->author_name }}</h5>
                                <span>{{ $testimonial->author_position }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- Navigation -->
            <div class="testimonials-nav" data-aos="fade-up" data-aos-delay="400">
                <button class="nav-btn prev" onclick="scrollTestimonials('prev')">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <div class="nav-dots">
                    @foreach ($testimonials as $testimonial)
                        <span class="dot {{ $loop->first ? 'active' : '' }}"></span>
                    @endforeach
                </div>
                <button class="nav-btn next" onclick="scrollTestimonials('next')">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>

        </div>
    </section><!-- /Testimonials Section -->

    <!-- Partners Section -->
    <section class="partners-section">
        <div class="container">

            <!-- Section Header -->
            <div class="partners-header" data-aos="fade-up">
                <span class="partners-count">Nos Partenaires</span>
                <h2>Ils nous font <span>confiance</span></h2>
                <p>Des partenaires stratégiques qui accompagnent notre mission de développement industriel</p>
            </div>

            <!-- Partners Carousel -->
            <div class="partners-carousel" data-aos="fade-up" data-aos-delay="200">

                @foreach ($partners as $partner)
                    <div class="partner-logo placeholder">
                        <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}">
                    </div>
                @endforeach

            </div>

        </div>
    </section><!-- /Partners Section -->

@endsection

<script>
    // Testimonials Carousel Scroll
    function scrollTestimonials(direction) {
        const carousel = document.querySelector('.testimonials-carousel');
        const cards = document.querySelectorAll('.testimonial-card');
        const dots = document.querySelectorAll('.testimonials-nav .dot');

        if (!carousel || cards.length === 0) return;

        const cardWidth = cards[0].offsetWidth;
        const gap = 35; // gap entre les cartes
        const scrollAmount = cardWidth + gap;

        let currentScroll = carousel.scrollLeft;
        let newScroll;

        if (direction === 'next') {
            newScroll = currentScroll + scrollAmount;
        } else {
            newScroll = currentScroll - scrollAmount;
        }

        // Smooth scroll
        carousel.scrollTo({
            left: newScroll,
            behavior: 'smooth'
        });

        // Update dots
        setTimeout(() => {
            const activeIndex = Math.round(carousel.scrollLeft / scrollAmount);
            dots.forEach((dot, index) => {
                if (index === activeIndex) {
                    dot.classList.add('active');
                } else {
                    dot.classList.remove('active');
                }
            });
        }, 300);
    }

    // Dots click navigation
    document.addEventListener('DOMContentLoaded', function() {
        const dots = document.querySelectorAll('.testimonials-nav .dot');
        const carousel = document.querySelector('.testimonials-carousel');
        const cards = document.querySelectorAll('.testimonial-card');

        if (carousel && cards.length > 0) {
            const cardWidth = cards[0].offsetWidth;
            const gap = 35;
            const scrollAmount = cardWidth + gap;

            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    carousel.scrollTo({
                        left: scrollAmount * index,
                        behavior: 'smooth'
                    });

                    dots.forEach(d => d.classList.remove('active'));
                    dot.classList.add('active');
                });
            });

            // Update dots on scroll
            carousel.addEventListener('scroll', () => {
                const activeIndex = Math.round(carousel.scrollLeft / scrollAmount);
                dots.forEach((dot, index) => {
                    if (index === activeIndex) {
                        dot.classList.add('active');
                    } else {
                        dot.classList.remove('active');
                    }
                });
            });
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.toggle-feature').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const featureId = this.dataset.feature;
                const feature = document.getElementById(featureId);
                const preview = feature.querySelector('.text-preview');
                const full = feature.querySelector('.text-full');

                if (full.style.display === 'none') {
                    preview.style.display = 'none';
                    full.style.display = 'inline';
                    this.textContent = 'Voir moins';
                } else {
                    preview.style.display = 'inline';
                    full.style.display = 'none';
                    this.textContent = 'Voir plus';
                }
            });
        });

        // Introduction toggle
        document.querySelectorAll('.toggle-introduction').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const introId = this.dataset.intro;
                const intro = document.getElementById(introId);
                const preview = intro.querySelector('.text-preview');
                const full = intro.querySelector('.text-full');

                if (full.style.display === 'none') {
                    preview.style.display = 'none';
                    full.style.display = 'inline';
                    this.textContent = 'Voir moins';
                } else {
                    preview.style.display = 'inline';
                    full.style.display = 'none';
                    this.textContent = 'Voir plus';
                }
            });
        });
    });
</script>

<style>
    /* OVERRIDE COMPLET pour la pagination */
    #funded-companies .swiper-pagination {
        position: static !important;
        bottom: 0 !important;
        margin-top: 20px !important;
        padding: 0 !important;
        height: auto !important;
        line-height: 1 !important;
    }

    #funded-companies .swiper-pagination-bullet {
        margin: 0 5px !important;
        width: 12px !important;
        height: 12px !important;
        background: #FF8200 !important;
        opacity: 0.6 !important;
        vertical-align: middle !important;
    }

    #funded-companies .swiper-pagination-bullet-active {
        opacity: 1 !important;
        background: #009B3A !important;
        transform: scale(1.1) !important;
    }

    /* Reset complet de tous les espaces */
    #funded-companies .swiper-container,
    #funded-companies .swiper,
    #funded-companies .swiper-wrapper {
        padding: 0 !important;
        margin: 0 !important;
    }

    #funded-companies .swiper-slide {
        margin: 0 !important;
        padding: 0 !important;
    }

    /* Comparison Slider Styling */
    .comparison-container {
        position: relative;
        width: 100%;
        height: 450px;
        overflow: hidden;
        border-radius: 12px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        cursor: ew-resize;
    }

    .comparison-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        pointer-events: none;
    }

    .image-after {
        z-index: 1;
        clip-path: inset(0 0 0 50%);
        /* Start hidden from left */
    }

    .image-before {
        z-index: 0;
    }

    .comparison-slider {
        position: absolute;
        top: 0;
        left: 50%;
        width: 4px;
        height: 100%;
        background: #fff;
        z-index: 2;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        pointer-events: none;
    }

    .comparison-slider::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 40px;
        height: 40px;
        background: #fff;
        border-radius: 50%;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%23333' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='15 18 9 12 15 6'%3E%3C/polyline%3E%3Cpolyline points='9 18 3 12 9 6'%3E%3C/polyline%3E%3Cpolyline points='21 18 15 12 21 6'%3E%3C/polyline%3E%3C/svg%3E");
        background-size: 20px;
        background-position: center;
        background-repeat: no-repeat;
    }

    .comparison-label {
        position: absolute;
        bottom: 20px;
        padding: 5px 15px;
        background: rgba(0, 0, 0, 0.6);
        color: #fff;
        font-size: 12px;
        font-weight: 700;
        border-radius: 4px;
        z-index: 3;
        pointer-events: none;
    }

    .label-before {
        left: 20px;
    }

    .label-after {
        right: 20px;
    }
</style>
