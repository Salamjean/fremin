@extends('home.layouts.template')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section institutional-base" style="background: #f8f9fa; padding: 100px 0 60px;">
        <div class="container text-center" data-aos="fade-up">
            <h1 class="refined-title" style="color: #1a1a1a; font-weight: 800;">{{ __('aed_program') }}</h1>
            <p class="lead-text" style="max-width: 800px; margin: 20px auto;">Accompagnement et appuis directs aux
                entreprises industrielles en difficulté.</p>
            <div class="tricolor-line shadow-sm mx-auto"
                style="width: 100px; height: 4px; background: linear-gradient(to right, #009B3A 33.33%, #fff 33.33%, #fff 66.66%, #FF8200 66.66%);">
            </div>
        </div>
    </section>

    <section class="aed-content py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="content-box-premium">
                        <h2 class="section-title mb-4" style="color: #FF8200; font-weight: 800;">Un soutien stratégique</h2>
                        <p class="lead-text">Le dispositif AED vise à stabiliser et relancer les entreprises industrielles
                            confrontées à des chocs conjoncturels ou structurels.</p>

                        <div class="row g-4 mt-2">
                            <div class="col-sm-6">
                                <div class="mission-item-card p-4">
                                    <div class="m-icon mb-3" style="color: #FF8200; background: rgba(255,130,0,0.1);"><i
                                            class="fas fa-hand-holding-usd"></i></div>
                                    <h6 style="font-weight: 700;">Appuis financiers</h6>
                                    <p class="small text-muted mb-0">Subventions et primes pour soulager la trésorerie.</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mission-item-card p-4">
                                    <div class="m-icon mb-3" style="color: #FF8200; background: rgba(255,130,0,0.1);"><i
                                            class="fas fa-stethoscope"></i></div>
                                    <h6 style="font-weight: 700;">Diagnostic flash</h6>
                                    <p class="small text-muted mb-0">Identification rapide des leviers de retournement.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <img src="{{ asset('assets/img/hero-carousel/tech-2.jpg') }}" alt="AED Program"
                        class="img-fluid rounded-4 shadow-lg">
                </div>
            </div>
        </div>
    </section>

@endsection