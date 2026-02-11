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
                    </div>
                </div>

                <!-- Study 3 -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="mission-item-card h-100" style="border-bottom: 5px solid #009B3A;">
                        <div class="m-icon"><i class="fas fa-file-alt"></i></div>
                        <h4 class="mb-3" style="font-weight: 700; color: #1a1a1a;">Fiches filières industrielles</h4>
                        <p class="text-muted">Répertoire détaillé des opportunités et des contraintes techniques par filière
                            industrielle prioritaire.</p>
                    </div>
                </div>

                <!-- Study 4 (C1.4) -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="mission-item-card h-100">
                        <div class="m-icon"><i class="fas fa-vault"></i></div>
                        <h4 class="mb-3" style="font-weight: 700; color: #1a1a1a;">création d’un fonds dédié au financement du développement industriel en Côte d’Ivoire</h4>
                        <p class="text-muted">Étude et mise en place d'un fonds de financement spécialisé pour le développement industriel en Côte d’Ivoire.</p>
                    </div>
                </div>

                <!-- Study 5 (C1.5) -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="mission-item-card h-100 highlighted">
                        <div class="m-icon" style="background: rgba(255,255,255,0.2); color: #fff;"><i class="fas fa-project-diagram"></i></div>
                        <h4 class="mb-3" style="font-weight: 700; color: #fff;">Stratégies de développement de Clusters</h4>
                        <p style="color: rgba(255,255,255,0.9);">Élaboration de cinq (05) stratégies de développement pour cinq (05) grappes industrielles (clusters).</p>
                    </div>
                </div>

                <!-- Study 6 (C1.6) -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="600">
                    <div class="mission-item-card h-100 last" style="border-bottom: 5px solid #FF8200;">
                        <div class="m-icon"><i class="fas fa-sync-alt"></i></div>
                        <h4 class="mb-3" style="font-weight: 700; color: #1a1a1a;">Actualisation du PNRMN</h4>
                        <p class="text-muted">Mise à jour du Programme National de Restructuration et de Mise à Niveau pour l'aligner sur les nouveaux objectifs nationaux.</p>
                    </div>
                </div>

                <!-- Validation Workshop -->
                <div class="col-lg-12 mt-4" data-aos="fade-up" data-aos-delay="700">
                    <div class="card shadow-sm border-0 rounded-4 overflow-hidden" style="background: linear-gradient(135deg, #009B3A 0%, #007d2f 100%);">
                        <div class="card-body p-4 p-lg-5 text-white">
                            <div class="row align-items-center">
                                <div class="col-lg-2 text-center mb-4 mb-lg-0">
                                    <div class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center shadow" style="width: 80px; height: 80px;">
                                        <i class="fas fa-calendar-check text-success fs-2"></i>
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <h3 class="fw-bold mb-3 text-white">Atelier de validation de l’actualisation du PNRMN</h3>
                                    <p class="lead mb-0" style="font-size: 1.1rem; opacity: 0.95;">
                                        Le jeudi 7 mars 2024, s’est tenu à Seen Hôtel d’Abidjan Plateau, l’atelier de validation du rapport final relatif à l’actualisation du PNRMN en vue de l’adapter aux objectifs du développement assigné par le Gouvernement dans le cadre du Plan National du Développement (PND 2021-2025).
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection