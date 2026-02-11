@extends('home.layouts.template')
@section('content')

    <!-- Modern Hero -->
    <div class="contact-header-v2">
        <div class="container text-center py-5">
            <h1 class="text-white display-2 mb-3 fw-black animate__animated animate__zoomIn"
                style="font-weight: 900; font-size: 45px; letter-spacing: -1px;">
                {{ $hero->main_title ?? 'PRÉSENTATION DU FREMIN' }}</h1>
            <div class="mx-auto bg-white mb-4" style="height: 4px; width: 80px;"></div>
            <p class="text-white lead animate__animated animate__fadeInUp fw-medium">
                {{ $hero->subtitle ?? 'Le moteur de la restructuration et de la modernisation industrielle en Côte d\'Ivoire.' }}
            </p>
        </div>
    </div>

    <!-- Section: Cadre Juridique et Vision -->
    <section id="institutional-base" class="institutional-base section">
        <div class="container" data-aos="fade-up">
            <div class="row gy-5 align-items-center">
                <div class="col-lg-7">
                    <div class="content-box-premium">
                        <span class="section-badge">{{ __('legal_framework_title') }}</span>
                        <h2 class="mb-4">{{ __('legal_framework_title') }}</h2>
                        <div class="lead-text">
                             {!! 'Le Fonds de Restructuration et de Mise à Niveau des Entreprises Industrielles (FREMIN) a été créé par le décret n° 2014-781 du 11 décembre 2014. Le FREMIN est un instrument stratégique de l\'État Ivoirien dédié à la compétitivité industrielle. Il est Créé dans le cadre du Programme National de Restructuration et de Mise à Niveau (PNRMN). Il vise à renforcer la compétitivité et la transformation des industries ivoiriennes afin de stimuler la croissance, l’emploi et l’accès aux marchés internationaux' !!}
                        </div>
                        <ul class="legal-list">
                            <li><i class="fas fa-file-contract"></i> {{ __('legal_framework_item_1') }}</li>
                            <li><i class="fas fa-file-contract"></i> {{ __('legal_framework_item_2') }}</li>
                            <li><i class="fas fa-file-contract"></i> {{ __('legal_framework_item_3') }}</li>
                        </ul>
                        <div class="legal-description mt-4">
                            <p>{{ __('legal_framework_text_2') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="vision-card-premium" data-aos="zoom-in">
                        <div class="vision-icon"><i class="fas fa-eye"></i></div>
                        <h3>{{ __('vision_title') }}</h3>
                        <p>{{ __('vision_text') }}</p>
                        <div class="tricolor-accent mt-4">
                            <span class="bar green"></span>
                            <span class="bar white"></span>
                            <span class="bar orange"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Bar -->
    <section class="pres-stats-bar">
        <div class="container">
            <!-- <div class="row g-4 justify-content-center">
                @foreach($stats as $stat)
                    <div class="col-md-3">
                        <div class="stat-v2">
                            <span class="number">
                                <span class="counter"
                                    data-target="{{ preg_replace('/[^0-9]/', '', $stat->value) }}">0</span>{{ preg_replace('/[0-9]/', '', $stat->value) }}
                            </span>
                            <span class="label">{{ $stat->label }}</span>
                        </div>
                    </div>
                @endforeach -->
            </div>
        </div>
    </section>

    <!-- Section: Missions -->
        <section id="missions-detailed" class="missions-detailed section bg-light">
            <div class="container section-title" data-aos="fade-up">
                <span class="section-badge">{{ __('missions_title') }}</span>
                <h2>{{ __('missions_title') }}</h2>
                <p>{{ __('missions_intro') }}</p>
            </div>

            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="mission-item-card">
                            <div class="m-icon"><i class="fas fa-hand-holding-usd"></i></div>
                            <p>{{ __('mission_item_1') }}</p>
                        </div>
                    </div>
                    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                        <div class="mission-item-card highlighted">
                            <div class="m-icon"><i class="fas fa-university"></i></div>
                            <p>{{ __('mission_item_2') }}</p>
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="mission-item-card">
                            <div class="m-icon"><i class="fas fa-microscope"></i></div>
                            <p>{{ __('mission_item_3') }}</p>
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="mission-item-card">
                            <div class="m-icon"><i class="fas fa-chart-line"></i></div>
                            <p>{{ __('mission_item_4') }}</p>
                        </div>
                    </div>
                    @if($missions->isNotEmpty())
                        @foreach($missions as $mission)
                            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="{{ 500 + ($loop->index * 100) }}">
                                <div class="mission-item-card">
                                    <div class="m-icon"><i class="{{ $mission->icon }}"></i></div>
                                    <p>{{ $mission->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="col-lg-12" data-aos="fade-up" data-aos-delay="1000">
                        <div class="mission-item-card last">
                            <div class="m-icon"><i class="fas fa-bullseye"></i></div>
                            <p>{{ __('mission_item_5') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Axes Stratégiques -->
        <section id="strategic-axes" class="strategic-axes section bg-white">
            <div class="container section-title" data-aos="fade-up">
                <span class="section-badge">{{ __('strategic_axes_title') }}</span>
                <h2>{{ __('strategic_axes_title') }}</h2>
                <p>Nos piliers pour le développement industriel ivoirien</p>
            </div>

            <div class="container">
                <div class="row g-0 axis-wrapper shadow-lg overflow-hidden rounded-4">
                    <div class="col-lg-4">
                        <div class="axis-card" style="background-image: linear-gradient(rgba(0,155,58,0.85), rgba(0,155,58,0.85)), url('{{ asset('assets/img/service-modernisation.png') }}');">
                            <div class="axis-content">
                                <span class="axis-num">01</span>
                                <h4 class="text-white">{{ __('strategic_axis_1') }}</h4>
                                <i class="fas fa-industry"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="axis-card" style="background-image: linear-gradient(rgba(255,130,0,0.85), rgba(255,130,0,0.85)), url('{{ asset('assets/img/service-certification.png') }}');">
                            <div class="axis-content">
                                <span class="axis-num">02</span>
                                <h4 class="text-white">{{ __('strategic_axis_2') }}</h4>
                                <i class="fas fa-check-circle"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="axis-card" style="background-image: linear-gradient(rgba(17,17,17,0.85), rgba(17,17,17,0.85)), url('{{ asset('assets/img/service-capacites.png') }}');">
                            <div class="axis-content">
                                <span class="axis-num">03</span>
                                <h4 class="text-white">{{ __('strategic_axis_3') }}</h4>
                                <i class="fas fa-building"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Organigramme et Historique -->
        <section id="org-history" class="org-history section bg-light">
            <div class="container">
                <div class="row gy-5">
                    <div class="col-lg-6" data-aos="fade-right">
                        <div class="history-box">
                            <span class="section-badge">HISTORIQUE</span>
                            <h2 class="mb-4">{{ __('history_title') }}</h2>
                            <div class="history-content card-premium p-4">
                                <p>Le FREMIN, moteur du développement industriel ivoirien, finance et accompagne le PNRMN pour renforcer la compétitivité, moderniser les entreprises et stimuler la création d’emplois. Avec l’appui de l’ADCI et du Projet PARCSI de la BAD, il catalyse la transformation structurelle de l’économie, favorise l’innovation industrielle et élève la qualité des productions nationales.</p>
                                <a href="{{ route('home.contact') }}" class="btn-read-more">Plus d'informations <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>

                        <div class="values-box mt-5">
                            <h3 class="fw-bold mb-4">Nos Valeurs</h3>
                            @foreach($values as $val)
                                <div class="value-item shadow-sm bg-white p-3 rounded-3 mb-3">
                                    <div class="value-icon"><i class="{{ $val->icon }} text-success"></i></div>
                                    <div>
                                        <h5 class="fw-bold mb-1">{{ $val->title }}</h5>
                                        <p class="mb-0 opacity-75 small">{{ $val->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-6" data-aos="fade-left">
                        <div class="org-box">
                            <span class="section-badge">ORGANIGRAMME</span>
                            <h2 class="mb-4">{{ __('org_chart_title') }}</h2>
                            <div class="org-img-placeholder card-premium p-4 text-center">
                                <img src="{{ asset('assets/img/organigrame.png') }}" alt="Organigramme" class="img-fluid rounded">
                                <p class="mt-3 text-muted small">Structure organisationnelle du FREMIN</p>
                            </div>

                            <div class="stats-mini mt-5">
                                <div class="row g-3">
                                    @foreach($stats->take(2) as $stat)
                                        <div class="col-6">
                                            <div class="stat-mini-card p-4 rounded-4 shadow-sm text-center bg-white border-bottom border-4 border-success">
                                                <h4 class="fw-black mb-1">{{ $stat->value }}</h4>
                                                <small class="text-muted">{{ $stat->label }}</small>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer Counter Script -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const counters = document.querySelectorAll('.counter');
                const speed = 200;

                const startCounters = (elements) => {
                    elements.forEach(counter => {
                        const updateCount = () => {
                            const target = +counter.getAttribute('data-target');
                            const count = +counter.innerText;
                            const inc = target / speed;
                            if (count < target) {
                                counter.innerText = Math.ceil(count + inc);
                                setTimeout(updateCount, 15);
                            } else {
                                counter.innerText = target;
                            }
                        };
                        updateCount();
                    });
                };

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const sectionCounters = entry.target.querySelectorAll('.counter');
                            startCounters(sectionCounters);
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.3 });

                const statsSection = document.querySelector('.pres-stats-bar');
                if (statsSection) {
                    observer.observe(statsSection);
                }
            });
        </script>

@endsection