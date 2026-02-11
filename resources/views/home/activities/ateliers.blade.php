@extends('home.layouts.template')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section institutional-base" style="background: #f8f9fa; padding: 100px 0 60px;">
        <div class="container text-center" data-aos="fade-up">
            <h1 class="refined-title" style="color: #1a1a1a; font-weight: 800;">{{ __('ateliers') }}</h1>
            <p class="lead-text" style="max-width: 800px; margin: 20px auto;">{{ __('activities_desc') }}</p>
            <div class="tricolor-line shadow-sm mx-auto"
                style="width: 100px; height: 4px; background: linear-gradient(to right, #009B3A 33.33%, #fff 33.33%, #fff 66.66%, #FF8200 66.66%);">
            </div>
        </div>
    </section>

    <section class="ceremonies-timeline py-5">
        <div class="container">
            <!-- Section 1: Validation Clusters -->
            <div class="mb-5 pb-4" data-aos="fade-up">
                <h2 class="section-main-title mb-4"
                    style="font-weight: 800; color: #009B3A; border-left: 5px solid #FF8200; padding-left: 20px;">
                    Atelier de validation des rapports et plans d’actions des stratégies de développement de 5 clusters
                    industriels
                </h2>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card-premium h-100 overflow-hidden shadow-sm">
                            <img src="{{ asset('assets/img/fammi.png') }}" alt="Photo de famille" class="img-fluid w-100"
                                style="height: 300px; object-fit: cover;">
                            <div class="p-4">
                                <h4 style="font-weight: 700; color: #1a1a1a;">Photo de famille avec Docteur Souleymane
                                    DIARRASSOUBA</h4>
                                <p class="text-muted small mb-0">Ministre du Commerce et de l’Industrie.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-premium h-100 overflow-hidden shadow-sm">
                            <img src="{{ asset('assets/img/tra bi.png') }}" alt="Intervention DG"
                                class="img-fluid w-100" style="height: 300px; object-fit: cover;">
                            <div class="p-4">
                                <h4 style="font-weight: 700; color: #1a1a1a;">Intervention de Monsieur TRA Bi Emmanuel</h4>
                                <p class="text-muted small mb-0">Directeur Général de l’Industrie.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 2: Petite Transformation -->
            <div class="mb-5" data-aos="fade-up">
                <h2 class="section-main-title mb-4"
                    style="font-weight: 800; color: #009B3A; border-left: 5px solid #FF8200; padding-left: 20px;">
                    Atelier de validation de l’étude stratégique pour le développement de la petite transformation
                </h2>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="card-premium overflow-hidden shadow-sm">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <img src="{{ asset('assets/img/fremin5.jpeg') }}" alt="Atelier Petite Transformation"
                                        class="img-fluid h-100" style="object-fit: cover; min-height: 250px;">
                                </div>
                                <div class="col-md-7 p-4 d-flex flex-column justify-content-center">
                                    <h4 style="font-weight: 700; color: #1a1a1a; margin-bottom: 15px;">Atelier de validation
                                        de l’étude stratégique</h4>
                                    <p class="mb-0" style="color: #444; font-weight: 500;">Développement de la petite
                                        transformation</p>
                                    <p class="text-muted small mt-2">Validation des axes stratégiques pour booster
                                        l'agro-industrie locale.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection