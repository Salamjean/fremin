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
            <div class="row gy-5">
                <!-- Ceremony 1 -->
                <div class="col-12" data-aos="fade-up">
                    <div class="card-premium overflow-hidden">
                        <div class="row g-0">
                            <div class="col-md-5">
                                <img src="{{ asset('assets/img/hero-carousel/agro-1.jpg') }}" alt="Cérémonie"
                                    class="img-fluid h-100" style="object-fit: cover; min-height: 300px;">
                            </div>
                            <div class="col-md-7 p-5 d-flex flex-column justify-content-center">
                                <div class="badge bg-success mb-3" style="width: fit-content;">Cérémonie principale</div>
                                <h3 style="font-weight: 800; color: #1a1a1a;">La cérémonie de distribution d’équipements de
                                    production</h3>
                                <p class="lead-text">Distribution solennelle au profit des acteurs de la petite
                                    agro-transformation pour booster la productivité locale.</p>
                                <div class="d-flex align-items-center mt-3 text-muted">
                                    <i class="bi bi-calendar-event me-2 text-primary"></i> <span>Février 2024</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ceremony 2 -->
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-premium h-100">
                        <img src="{{ asset('assets/img/hero-carousel/industry-2.jpg') }}" alt="Atelier"
                            class="img-fluid w-100"
                            style="height: 250px; object-fit: cover; border-top-left-radius: 20px; border-top-right-radius: 20px;">
                        <div class="p-4">
                            <h4 style="font-weight: 700;">Atelier de validation de l’étude stratégique</h4>
                            <p class="text-muted">Rencontre d'experts et de parties prenantes pour valider le plan de
                                développement de la petite transformation.</p>
                            <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                                <span class="text-muted"><i class="bi bi-calendar-event me-1"></i> Mars 2024</span>
                                <a href="#" class="text-primary fw-bold text-decoration-none">Voir les photos</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ceremony 3 -->
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-premium h-100" style="border-right: 5px solid #FF8200;">
                        <img src="{{ asset('assets/img/hero-carousel/tech-3.jpg') }}" alt="Inauguration"
                            class="img-fluid w-100"
                            style="height: 250px; object-fit: cover; border-top-left-radius: 20px; border-top-right-radius: 20px;">
                        <div class="p-4">
                            <h4 style="font-weight: 700;">Inauguration et pose de la première pierre</h4>
                            <p class="text-muted">Lancement officiel de la seconde phase de construction du CEPPTA, un
                                projet phare pour l'industrie ivoirienne.</p>
                            <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                                <span class="text-muted"><i class="bi bi-calendar-event me-1"></i> Avril 2024</span>
                                <a href="#" class="text-primary fw-bold text-decoration-none">Détails <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection