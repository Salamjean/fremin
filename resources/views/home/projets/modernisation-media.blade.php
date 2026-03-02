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
            <!-- Galerie Multimédia -->
            <div data-aos="fade-up">
                <h3 class="mb-4" style="font-weight: 800; color: #1a1a1a;">Galerie Multimédia</h3>
                <!-- Grandes Images (Haut) -->
                <div class="row g-4 mb-4">
                    <div class="col-lg-6 col-md-12">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-center text-white shadow-sm overflow-hidden"
                            style="height: 350px;">
                            <img src="{{ asset('assets/img/oo1.jpg') }}" class="img-fluid w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;" alt="" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-center text-white shadow-sm overflow-hidden"
                            style="height: 350px;">
                            <img src="{{ asset('assets/img/oo2.jpg') }}" class="img-fluid w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;" alt="" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-center text-white shadow-sm overflow-hidden"
                            style="height: 350px;">
                            <img src="{{ asset('assets/img/oo3.jpg') }}" class="img-fluid w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;" alt="" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-center text-white shadow-sm overflow-hidden"
                            style="height: 350px;">
                            <img src="{{ asset('assets/img/oo4.jpg') }}" class="img-fluid w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;" alt="" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                    </div>
                </div>

                <!-- Petites Images (Bas) -->
                <div class="row g-4">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-center text-white shadow-sm overflow-hidden"
                            style="height: 200px;">
                            <img src="{{ asset('assets/img/IMG_0430.jpeg') }}" class="img-fluid w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;" alt="" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-center text-white shadow-sm overflow-hidden"
                            style="height: 200px;">
                            <img src="{{ asset('assets/img/IMG_0431.jpeg') }}" class="img-fluid w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;" alt="" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-center text-white shadow-sm overflow-hidden"
                            style="height: 200px;">
                            <img src="{{ asset('assets/img/IMG_0432.jpeg') }}" class="img-fluid w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;" alt="" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-center text-white shadow-sm overflow-hidden"
                            style="height: 200px;">
                            <img src="{{ asset('assets/img/IMG_0433.jpeg') }}" class="img-fluid w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;" alt="" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-center text-white shadow-sm overflow-hidden"
                            style="height: 200px;">
                            <img src="{{ asset('assets/img/IMG_0434.png') }}" class="img-fluid w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;" alt="" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-center text-white shadow-sm overflow-hidden"
                            style="height: 200px;">
                            <img src="{{ asset('assets/img/IMG_0435.png') }}" class="img-fluid w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;" alt="" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-center text-white shadow-sm overflow-hidden"
                            style="height: 200px;">
                            <img src="{{ asset('assets/img/IMG_0436.jpeg') }}" class="img-fluid w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;" alt="" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-center text-white shadow-sm overflow-hidden"
                            style="height: 200px;">
                            <img src="{{ asset('assets/img/IMG_0437.png') }}" class="img-fluid w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;" alt="" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection