@extends('home.layouts.template')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section institutional-base" style="background: #f8f9fa; padding: 100px 0 60px;">
        <div class="container text-center" data-aos="fade-up">
            <h1 class="refined-title" style="color: #1a1a1a; font-weight: 800;">{{ __('ceremonies') }}</h1>
            <p class="lead-text" style="max-width: 800px; margin: 20px auto;">{{ __('activities_desc') }}</p>
            <div class="tricolor-line shadow-sm mx-auto"
                style="width: 100px; height: 4px; background: linear-gradient(to right, #009B3A 33.33%, #fff 33.33%, #fff 66.66%, #FF8200 66.66%);">
            </div>
        </div>
    </section>

    <section class="ceremonies-timeline py-5">
        <div class="container">
            <!-- Section 1: Distribution d’équipements -->
            <div class="mb-5 pb-4" data-aos="fade-up">
                <h2 class="section-main-title mb-4"
                    style="font-weight: 800; color: #009B3A; border-left: 5px solid #FF8200; padding-left: 20px;">
                    La cérémonie de distribution d’équipements de production au profit des acteurs de la petite
                    agro-transformation
                </h2>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card-premium h-100 overflow-hidden shadow-sm">
                            <img src="{{ asset('assets/img/discours.png') }}" alt="Discours du Président"
                                class="img-fluid w-100" style="height: 300px; object-fit: cover;">
                            <div class="p-4">
                                <h4 style="font-weight: 700; color: #1a1a1a;">Discours du Président de la Cellule Technique
                                    du FREMIN</h4>
                                <p class="text-muted small mb-0">Moment solennel marquant l'engagement de l'institution.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-premium h-100 overflow-hidden shadow-sm">
                            <img src="{{ asset('assets/img/fremin4.jpeg') }}" alt="Photo de famille" class="img-fluid w-100"
                                style="height: 300px; object-fit: cover;">
                            <div class="p-4">
                                <h4 style="font-weight: 700; color: #1a1a1a;">Photo de famille avec les bénéficiaires des
                                    équipements de production</h4>
                                <p class="text-muted small mb-0">Célébration collective avec les acteurs du secteur
                                    agro-industriel.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 2: CEPPTA Inauguration -->
            <div class="mb-5 pb-4" data-aos="fade-up">
                <h2 class="section-main-title mb-4"
                    style="font-weight: 800; color: #009B3A; border-left: 5px solid #FF8200; padding-left: 20px;">
                    Cérémonie d’inauguration et la pose de la première de la construction de la seconde phase du CEPPTA
                </h2>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card-premium h-100 overflow-hidden shadow-sm">
                            <img src="{{ asset('assets/img/ruban.png') }}" alt="Coupure de ruban" class="img-fluid w-100"
                                style="height: 300px; object-fit: cover;">
                            <div class="p-4">
                                <h4 style="font-weight: 700; color: #1a1a1a;">Coupure de ruban pour l’inauguration de la
                                    première phase du CEPPTA</h4>
                                <p class="text-muted small mb-0">Ouverture officielle des infrastructures de la phase 1.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-premium h-100 overflow-hidden shadow-sm">
                            <img src="{{ asset('assets/img/inauguration.png') }}" alt="Pose première pierre phase 2"
                                class="img-fluid w-100" style="height: 300px; object-fit: cover;">
                            <div class="p-4">
                                <h4 style="font-weight: 700; color: #1a1a1a;">Après l’inauguration de la phase 1, le
                                    Ministre a procédé à la pose de la première de la phase 2</h4>
                                <p class="text-muted small mb-0">Lancement immédiat de l'expansion du projet.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-5 pb-4" data-aos="fade-up">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card-premium h-100 overflow-hidden shadow-sm">
                            <img src="{{ asset('assets/img/ceppta.png') }}" alt="Coupure de ruban" class="img-fluid w-100"
                                style="height: 300px; object-fit: cover;">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-premium h-100 overflow-hidden shadow-sm">
                            <img src="{{ asset('assets/img/ceppta1.png') }}" alt="Pose première pierre phase 2"
                                class="img-fluid w-100" style="height: 300px; object-fit: cover;">

                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 3: Études Stratégiques -->
            <div class="mb-5" data-aos="fade-up">
                <h2 class="section-main-title mb-4"
                    style="font-weight: 800; color: #009B3A; border-left: 5px solid #FF8200; padding-left: 20px;">
                    Cérémonie de lancement des études stratégique pour le développement de 5 clusters
                </h2>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="card-premium overflow-hidden shadow-sm">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <img src="{{ asset('assets/img/intervention.png') }}" alt="Intervention Ministre"
                                        class="img-fluid h-100" style="object-fit: cover; min-height: 250px;">
                                </div>
                                <div class="col-md-7 p-4 d-flex flex-column justify-content-center">
                                    <h4 style="font-weight: 700; color: #1a1a1a; margin-bottom: 15px;">Intervention de
                                        Docteur Souleymane DIARRASSOUBA</h4>
                                    <p class="mb-0" style="color: #444; font-weight: 500;">Ministre du Commerce, de
                                        l’Industrie et de la Promotion des PME</p>
                                    <p class="text-muted small mt-2">Lancement officiel des études stratégiques pour la
                                        compétitivité industrielle.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-5" data-aos="fade-up">
                <h2 class="section-main-title mb-4"
                    style="font-weight: 800; color: #009B3A; border-left: 5px solid #FF8200; padding-left: 20px;">
                    Construction de la première phase du Centre des Expositions des Produits de la Petite Transformation et
                    de l’Artisanat (CEPPTA)
                </h2>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="card-premium overflow-hidden shadow-sm">
                            <div class="row g-0">
                                <div class="col-md-7 p-4 d-flex flex-column justify-content-center">

                                    <h4 style="font-weight: 700; color: #1a1a1a; margin-bottom: 15px;">Pose de la première
                                        pierre du CEPPTA de Yamoussoukro</h4>
                                    <p> <strong>par Docteur Souleymane DIARRASSOUBA, Ministre du Commerce et de
                                            l’Industrie</strong></p>
                                    <p class="mb-0" style="color: #444; font-weight: 500;">Ministre du Commerce, de
                                        l’Industrie et de la Promotion des PME</p>
                                    <p class="text-muted small mt-2">Lancement officiel des études stratégiques pour la
                                        compétitivité industrielle.</p>
                                </div>
                                <div class="col-md-5">
                                    <img src="{{ asset('assets/img/pierre.png') }}" alt="Intervention Ministre"
                                        class="img-fluid h-100" style="object-fit: cover; min-height: 250px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection