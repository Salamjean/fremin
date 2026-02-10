@extends('home.layouts.template')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section institutional-base" style="background: #f8f9fa; padding: 100px 0 60px;">
        <div class="container text-center" data-aos="fade-up">
            <h1 class="refined-title" style="color: #1a1a1a; font-weight: 800;">{{ __('modernization_industrial') }}</h1>
            <p class="lead-text" style="max-width: 800px; margin: 20px auto;">{{ __('project_presentation') }} du programme
                de mise à niveau.</p>
            <div class="tricolor-line shadow-sm mx-auto"
                style="width: 100px; height: 4px; background: linear-gradient(to right, #009B3A 33.33%, #fff 33.33%, #fff 66.66%, #FF8200 66.66%);">
            </div>
        </div>
    </section>

    @include('home.projets.modernisation-nav')

    <section class="project-presentation py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="content-box-premium">
                        <h2 class="section-title mb-4" style="color: #009B3A; font-weight: 800;">Objectifs du programme</h2>
                        <p class="lead-text mb-4">Le programme de mise à niveau vise à renforcer la compétitivité des
                            entreprises industrielles ivoiriennes par l'amélioration de leur outil de production et de leur
                            système de gestion.</p>

                        <div class="mission-item-card mb-4">
                            <h5 style="font-weight: 700;"><i class="fas fa-check-circle text-success me-2"></i>
                                Modernisation technique</h5>
                            <p class="text-muted mb-0">Acquisition de nouvelles technologies et renouvellement des lignes de
                                production pour une meilleure efficience énergétique et opérationnelle.</p>
                        </div>

                        <div class="mission-item-card highlighted mb-4">
                            <h5 style="font-weight: 700; color: #fff;"><i class="fas fa-award me-2"></i> Qualité &
                                Certification</h5>
                            <p style="color: rgba(255,255,255,0.9); margin-bottom: 0;">Support à l'accréditation et à
                                l'obtention des normes internationales (ISO, HACCP, etc.) pour accéder aux marchés globaux.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="card-premium p-0 overflow-hidden shadow-lg">
                        <img src="{{ asset('assets/img/hero-carousel/industry-1.jpg') }}" alt="Modernisation Industrielle"
                            class="img-fluid w-100" style="object-fit: cover; height: 400px;">
                        <div class="p-4 bg-white">
                            <p class="mb-0 text-muted"><em>Le FREMIN accompagne les leaders de demain dans leur
                                    transformation industrielle.</em></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection