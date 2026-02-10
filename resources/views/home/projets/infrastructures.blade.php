@extends('home.layouts.template')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section institutional-base" style="background: #f8f9fa; padding: 100px 0 60px;">
        <div class="container text-center" data-aos="fade-up">
            <h1 class="refined-title" style="color: #1a1a1a; font-weight: 800;">{{ __('industrial_infrastructure') }}</h1>
            <p class="lead-text" style="max-width: 800px; margin: 20px auto;">Aménagement et mise en place des
                infrastructures pour les zones industrielles.</p>
            <div class="tricolor-line shadow-sm mx-auto"
                style="width: 100px; height: 4px; background: linear-gradient(to right, #009B3A 33.33%, #fff 33.33%, #fff 66.66%, #FF8200 66.66%);">
            </div>
        </div>
    </section>

    <section class="infrastructure-content py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-7" data-aos="fade-right">
                    <div class="content-box-premium">
                        <h2 class="section-title mb-4" style="color: #111; font-weight: 800;">Zones et plateformes
                            industrielles</h2>
                        <p class="lead-text">Le FREMIN participe à la mise à disposition d'infrastructures modernes pour
                            faciliter l'implantation des unités de production.</p>

                        <div class="p-4 bg-white rounded-4 shadow-sm border mb-4">
                            <h5 style="font-weight: 700; color: #009B3A;"><i class="fas fa-map-marked-alt me-2"></i>
                                Aménagement de zones</h5>
                            <p class="text-muted mb-0">Viabilisation des terrains et accès aux services de base (eau,
                                électricité, voirie).</p>
                        </div>

                        <div class="p-4 bg-white rounded-4 shadow-sm border">
                            <h5 style="font-weight: 700; color: #009B3A;"><i class="fas fa-warehouse me-2"></i> Incubateurs
                                et Plateformes</h5>
                            <p class="text-muted mb-0">Construction de bâtiments industriels intelligents et partagés.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5" data-aos="fade-left">
                    <div class="card-premium h-100 p-0 overflow-hidden">
                        <img src="{{ asset('assets/img/hero-carousel/agro-3.jpg') }}" alt="Infrastructures"
                            class="img-fluid h-100" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection