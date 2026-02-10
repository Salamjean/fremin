@extends('home.layouts.template')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section institutional-base" style="background: #f8f9fa; padding: 100px 0 60px;">
        <div class="container text-center" data-aos="fade-up">
            <h1 class="refined-title" style="color: #1a1a1a; font-weight: 800;">{{ __('media') }}</h1>
            <p class="lead-text" style="max-width: 800px; margin: 20px auto;">Retrouvez en images et vidéos l'impact de nos
                programmes sur le tissu industriel.</p>
            <div class="tricolor-line shadow-sm mx-auto"
                style="width: 100px; height: 4px; background: linear-gradient(to right, #009B3A 33.33%, #fff 33.33%, #fff 66.66%, #FF8200 66.66%);">
            </div>
        </div>
    </section>

    <section class="media-gallery py-5">
        <div class="container">
            <h3 class="mb-4" style="font-weight: 800; color: #1a1a1a;">Vidéos & Documentaires</h3>
            <div class="row g-4 mb-5">
                <div class="col-lg-8" data-aos="fade-up">
                    <div class="card-premium p-0 overflow-hidden shadow">
                        <div class="ratio ratio-16x19">
                            <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Présentation FREMIN"
                                allowfullscreen></iframe>
                        </div>
                        <div class="p-4 bg-white">
                            <h5 style="font-weight: 700;">Film Institutionnel : La Modernisation en marche</h5>
                            <p class="text-muted small mb-0">Découvrez les témoignages des chefs d'entreprise et les
                                résultats concrets de la phase 1.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row g-4">
                        <div class="col-12" data-aos="fade-left">
                            <div class="card-premium h-100 p-3">
                                <h6 style="font-weight: 700;"><i class="fas fa-play-circle text-primary me-2"></i> Reportage
                                    RTI</h6>
                                <p class="small text-muted mb-0">Visite des usines bénéficiaires du PNRMN.</p>
                            </div>
                        </div>
                        <div class="col-12" data-aos="fade-left" data-aos-delay="100">
                            <div class="card-premium h-100 p-3">
                                <h6 style="font-weight: 700;"><i class="fas fa-play-circle text-primary me-2"></i> Interview
                                    Président</h6>
                                <p class="small text-muted mb-0">Les enjeux de l'industrialisation 2030.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="mb-4 pt-4" style="font-weight: 800; color: #1a1a1a;">Galerie Photos</h3>
            <div class="row g-3">
                @for($i = 1; $i <= 6; $i++)
                    <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="{{ $i * 100 }}">
                        <div class="card-premium p-0 overflow-hidden">
                            <img src="{{ asset('assets/img/hero-carousel/agro-' . (($i % 3) + 1) . '.jpg') }}" alt="Photo {{ $i }}"
                                class="img-fluid w-100" style="height: 250px; object-fit: cover;">
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>

@endsection