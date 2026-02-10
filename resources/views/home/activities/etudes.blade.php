@extends('home.layouts.template')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section institutional-base" style="background: #f8f9fa; padding: 100px 0 60px;">
        <div class="container text-center" data-aos="fade-up">
            <h1 class="refined-title" style="color: #1a1a1a; font-weight: 800;">{{ __('studies_conducted') }}</h1>
            <p class="lead-text" style="max-width: 800px; margin: 20px auto;">{{ __('activities_desc') }}</p>
            <div class="tricolor-line shadow-sm mx-auto"
                style="width: 100px; height: 4px; background: linear-gradient(to right, #009B3A 33.33%, #fff 33.33%, #fff 66.66%, #FF8200 66.66%);">
            </div>
        </div>
    </section>

    <section class="studies-list py-5">
        <div class="container">
            <div class="row g-4">
                <!-- Study 1 -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="mission-item-card h-100">
                        <div class="m-icon"><i class="fas fa-chart-line"></i></div>
                        <h4 class="mb-3" style="font-weight: 700; color: #1a1a1a;">Strategie pour le développement de la
                            petite transformation</h4>
                        <p class="text-muted">Analyse approfondie et plan d'action pour dynamiser le secteur de la petite
                            agro-transformation en Côte d'Ivoire.</p>
                        <a href="{{ route('home.publication') }}" class="btn-read-more">En savoir plus <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Study 2 -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="mission-item-card h-100 highlighted">
                        <div class="m-icon" style="background: rgba(255,255,255,0.2); color: #fff;"><i
                                class="fas fa-industry"></i></div>
                        <h4 class="mb-3" style="font-weight: 700; color: #fff;">Développement du secteur textile-habillement
                        </h4>
                        <p style="color: rgba(255,255,255,0.9);">Étude stratégique sur la modernisation du secteur textile
                            et de l'agro-transformation pour une meilleure compétitivité.</p>
                        <a href="{{ route('home.publication') }}" class="btn-read-more"
                            style="background: #fff; color: #009B3A;">En savoir plus <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Study 3 -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="mission-item-card h-100 last" style="border-bottom: 5px solid #FF8200;">
                        <div class="m-icon"><i class="fas fa-file-alt"></i></div>
                        <h4 class="mb-3" style="font-weight: 700; color: #1a1a1a;">Fiches filières industrielles</h4>
                        <p class="text-muted">Répertoire détaillé des opportunités et des contraintes techniques par filière
                            industrielle prioritaire.</p>
                        <a href="{{ route('home.publication') }}" class="btn-read-more">En savoir plus <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection