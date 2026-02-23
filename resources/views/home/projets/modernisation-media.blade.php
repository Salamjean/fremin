@extends('home.layouts.template')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section institutional-base" style="background: #f8f9fa; padding: 100px 0 60px;">
        <div class="container text-center" data-aos="fade-up">
            <h1 class="refined-title" style="color: #1a1a1a; font-weight: 800;">{{ __('media') }}</h1>
            <p class="lead-text" style="max-width: 800px; margin: 20px auto;">Retrouvez en images et vidéos l'impact de nos
                programmes sur le tissu industriel.</p>
            <div class="tricolor-line shadow-sm mx-auto"
                style="width: 100px; height: 4px; background: linear-gradient(to right, #FF8200 33.33%, #fff 33.33%, #fff 66.66%, #009B3A 66.66%);">
            </div>
        </div>
    </section>

    @include('home.projets.modernisation-nav')

    <section class="media-gallery py-5">
        <div class="container">

            <!-- Articles Récents -->
            <div class="mb-5" data-aos="fade-up">
                <h3 class="mb-4" style="font-weight: 800; color: #1a1a1a;">Articles récents</h3>
                <div class="row g-4">
                    <!-- Article 1 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card-premium h-100 p-0 overflow-hidden shadow-sm">
                            <div class="bg-secondary p-4 d-flex align-items-center justify-content-center text-white"
                                style="height: 200px;">
                                [Image Passation de charge]
                            </div>
                            <div class="p-4">
                                <span class="badge bg-success mb-2">Événement</span>
                                <h5 class="fw-bold mb-2">Passation de charge</h5>
                                <p class="text-muted small mb-3">Cérémonie de passation de charges avec la date.</p>
                                <a href="#" class="btn btn-sm btn-outline-success">Lire plus</a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 2 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card-premium h-100 p-0 overflow-hidden shadow-sm">
                            <div class="bg-secondary p-4 d-flex align-items-center justify-content-center text-white"
                                style="height: 200px;">
                                [Image Atelier]
                            </div>
                            <div class="p-4">
                                <span class="badge bg-warning text-dark mb-2">Atelier</span>
                                <h5 class="fw-bold mb-2">Atelier de validation</h5>
                                <p class="text-muted small mb-3">Atelier de validation de l’étude stratégique pour le
                                    développement de la petite transformation.</p>
                                <a href="#" class="btn btn-sm btn-outline-success">Lire plus</a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 3 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card-premium h-100 p-0 overflow-hidden shadow-sm">
                            <div class="bg-secondary p-4 d-flex align-items-center justify-content-center text-white"
                                style="height: 200px;">
                                [Photo de Famille]
                            </div>
                            <div class="p-4">
                                <span class="badge bg-success mb-2">Cérémonie</span>
                                <h5 class="fw-bold mb-2">Cérémonie de distribution</h5>
                                <p class="text-muted small mb-3">Cérémonie de distribution des équipements de production aux
                                    acteurs de la petite transformation.</p>
                                <a href="#" class="btn btn-sm btn-outline-success">Lire plus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Galerie Multimédia -->
            <div data-aos="fade-up">
                <h3 class="mb-4" style="font-weight: 800; color: #1a1a1a;">Galerie Multimédia</h3>
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div
                            class="ratio ratio-16x9 bg-secondary rounded d-flex align-items-center justify-content-center text-white shadow-sm">
                            <span>[Insérer Vidéo Ici]</span>
                        </div>
                        <p class="mt-2 text-muted text-center italic">Vidéo récapitulative du programme</p>
                    </div>
                    <div class="col-lg-6">
                        <div class="row g-2">
                            <div class="col-6">
                                <div class="bg-secondary rounded d-flex align-items-center justify-content-center text-white shadow-sm"
                                    style="height: 150px;">
                                    <span>[Image 1]</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bg-secondary rounded d-flex align-items-center justify-content-center text-white shadow-sm"
                                    style="height: 150px;">
                                    <span>[Image 2]</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="bg-secondary rounded d-flex align-items-center justify-content-center text-white shadow-sm"
                                    style="height: 150px;">
                                    <span>[Image 3]</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection