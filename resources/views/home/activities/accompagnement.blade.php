@extends('home.layouts.template')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section institutional-base" style="background: #f8f9fa; padding: 100px 0 60px;">
        <div class="container text-center" data-aos="fade-up">
            <h1 class="refined-title" style="color: #1a1a1a; font-weight: 800;">{{ __('direct_support') }}</h1>
            <p class="lead-text" style="max-width: 800px; margin: 20px auto;">Accompagnements directs aux entreprises
                industrielles</p>
            <div class="tricolor-line shadow-sm mx-auto"
                style="width: 100px; height: 4px; background: linear-gradient(to right, #009B3A 33.33%, #fff 33.33%, #fff 66.66%, #FF8200 66.66%);">
            </div>
        </div>
    </section>

    <section class="support-details py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="content-box-premium">
                        <h2 class="section-title mb-4" style="color: #009B3A; font-weight: 800;">Diagnostic et secteurs
                            d'intervention</h2>
                        <p class="lead-text mb-4">Le FREMIN déploie des diagnostics approfondis pour identifier les besoins
                            spécifiques des entreprises industrielles manufacturières et agro-industrielles.</p>

                        <ul class="legal-list">
                            <li><i class="fas fa-check-circle"></i> Agro-industrie et transformation locale</li>
                            <li><i class="fas fa-check-circle"></i> Textile et cuirs</li>
                            <li><i class="fas fa-check-circle"></i> Matériaux de construction</li>
                            <li><i class="fas fa-check-circle"></i> Chimie et plasturgie</li>
                        </ul>

                        <div class="p-4 mt-4 bg-light rounded-3 border-start border-4 border-warning">
                            <p class="mb-0 text-dark"><strong>Le Diagnostic :</strong> Évaluation technique, financière et
                                managériale préalable à tout accompagnement direct.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="image-grid">
                        <div class="primary-image">
                            <img src="{{ asset('assets/img/agro-main.jpg') }}" alt="Accompagnement industriel"
                                class="img-fluid rounded-4 shadow-lg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection