@extends('home.layouts.template')
@section('content')
    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center bg-primary">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="keywords"
                            aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="btn bg-light border nput-group-text p-3"><i
                                class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->


    <!-- Carousel Start -->
    @include('home.layouts.carousel')
    <!-- Carousel End -->


    <!-- Feature Start -->
    <div class="container-fluid feature bg-light py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-success">Nos atouts</h4>
                <h1 class="display-4 mb-4">Un levier stratégique pour l’industrie ivoirienne</h1>
                <p class="mb-0">
                    Le FREMIN met en œuvre des mécanismes d’accompagnement adaptés afin de renforcer
                    la compétitivité, la performance et la durabilité des entreprises industrielles.
                </p>
            </div>

            <div class="row g-4">
                <!-- Feature 1 -->
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="feature-item p-4 pt-0">
                        <div class="feature-icon p-4 mb-4">
                            <i class="far fa-building fa-3x"></i>
                        </div>
                        <h4 class="mb-4">Institution de référence</h4>
                        <p class="mb-4">
                            Structure publique placée sous la tutelle du Ministère du Commerce
                            et de l’Industrie.
                        </p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">
                            En savoir plus
                        </a>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="feature-item p-4 pt-0">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fa fa-chart-line fa-3x"></i>
                        </div>
                        <h4 class="mb-4">Appui à la performance</h4>
                        <p class="mb-4">
                            Des interventions ciblées pour améliorer la productivité,
                            la compétitivité et financière.
                        </p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">
                            En savoir plus
                        </a>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="feature-item p-4 pt-0">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fa fa-cogs fa-3x"></i>
                        </div>
                        <h4 class="mb-4">Mise à niveau industrielle</h4>
                        <p class="mb-4">
                            Accompagnement technique, organisationnel et financier
                            pour la modernisation national.
                        </p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">
                            En savoir plus
                        </a>
                    </div>
                </div>

                <!-- Feature 4 -->
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="feature-item p-4 pt-0">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fa fa-handshake fa-3x"></i>
                        </div>
                        <h4 class="mb-4">Partenariats stratégiques</h4>
                        <p class="mb-4">
                            Collaboration avec les acteurs publics et privés
                            pour un développement industriel durable.
                        </p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">
                            En savoir plus
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->

    <!-- FAQs Start -->
    <div class="container-fluid faq-section bg-light py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="h-100">
                        <div class="mb-5">
                            <h4 class="text-success">FAQs</h4>
                            <h1 class="display-4 mb-0">Tout savoir sur le FREMIN</h1>
                        </div>

                        <div class="accordion" id="accordionExample">
                            <!-- FAQ 1 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button border-0" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Qui peut bénéficier de l’accompagnement du FREMIN ?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show active"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body rounded">
                                        Les entreprises industrielles légalement constituées en Côte d’Ivoire,
                                        répondant aux critères d’éligibilité définis par le FREMIN, peuvent
                                        bénéficier de ses programmes d’appui et de mise à niveau.
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ 2 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Quels types d’appui le FREMIN propose-t-il ?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Le FREMIN offre un accompagnement technique, financier et organisationnel,
                                        visant la restructuration, la modernisation et le renforcement de la
                                        compétitivité des entreprises industrielles.
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ 3 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Comment soumettre une demande d’accompagnement ?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Les entreprises peuvent soumettre leur demande via les appels à projets
                                        ou programmes publiés sur le site officiel du FREMIN, conformément aux
                                        procédures et délais indiqués.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.4s">
                    <img src="{{ asset('assets/img/carousel-2.png') }}" class="img-fluid w-100" alt="FAQ FREMIN">
                </div>
            </div>
        </div>
    </div>
    <!-- FAQs End -->

    <!-- Team Start -->
<div class="container-fluid team pb-5">
    <div class="container pb-5 mt-4">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-success">Gouvernance & Équipe</h4>
            <h1 class="display-4 mb-4">Une équipe au service du développement industriel</h1>
            <p class="mb-0">
                Le FREMIN s’appuie sur une équipe pluridisciplinaire composée de professionnels
                expérimentés, engagés dans l’accompagnement, la restructuration et la mise à
                niveau des entreprises industrielles ivoiriennes.
            </p>
        </div>

        <div class="row g-4">
            @php
                $delays = ['0.2s', '0.4s', '0.6s', '0.8s', '1s'];
                $delayIndex = 0;
            @endphp
            
            @foreach($teamMembers as $member)
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="{{ $delays[$delayIndex % 5] }}">
                    <div class="team-item">
                        <div class="team-img">
                            @if($member->image)
                                <img src="{{ asset('storage/' . $member->image) }}" 
                                     class="img-fluid rounded-top w-100"
                                     alt="{{ $member->image_alt ?? $member->name }}">
                            @else
                                <img src="{{ asset('assets/img/avatar.jpg') }}" 
                                     class="img-fluid rounded-top w-100"
                                     alt="{{ $member->name }}">
                            @endif
                            <div class="team-icon">
                                @if($member->linkedin_url)
                                    <a class="btn btn-primary btn-sm-square rounded-pill mb-2" 
                                       href="{{ $member->linkedin_url }}" 
                                       target="_blank">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="team-title p-4">
                            <h4 class="mb-0">{{ $member->name }}</h4>
                            <p class="mb-0">{{ $member->position }}</p>
                        </div>
                    </div>
                </div>
                @php $delayIndex++; @endphp
            @endforeach
        </div>
    </div>
</div>
<!-- Team End -->

    <!-- Testimonial Start -->
<div class="container-fluid testimonial pb-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-success">Témoignages</h4>
            <h1 class="display-4 mb-4">Ils nous font confiance</h1>
            <p class="mb-0">
                Découvrez les retours d’expérience des entreprises industrielles
                et partenaires ayant bénéficié de l’accompagnement du FREMIN.
            </p>
        </div>

        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.2s">
            <!-- Témoignage 1 -->
            <div class="testimonial-item bg-light rounded">
                <div class="row g-0">
                    <div class="col-4 col-lg-4 col-xl-3">
                        <div class="h-100">
                            <img src="{{asset('assets/img/avatar.jpg')}}" class="img-fluid h-100 rounded"
                                style="object-fit: cover;" alt="Entreprise bénéficiaire FREMIN">
                        </div>
                    </div>
                    <div class="col-8 col-lg-8 col-xl-9">
                        <div class="d-flex flex-column my-auto text-start p-4">
                            <h4 class="text-dark mb-0">Nom du dirigeant</h4>
                            <p class="mb-3">Directeur Général – Entreprise industrielle</p>
                            <div class="d-flex text-success mb-3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="mb-0">
                                L’accompagnement du FREMIN a permis à notre entreprise
                                de renforcer sa compétitivité et de moderniser ses
                                processus de production.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Témoignage 2 -->
            <div class="testimonial-item bg-light rounded">
                <div class="row g-0">
                    <div class="col-4 col-lg-4 col-xl-3">
                        <div class="h-100">
                            <img src="{{asset('assets/img/avatar.jpg')}}" class="img-fluid h-100 rounded"
                                style="object-fit: cover;" alt="Partenaire institutionnel FREMIN">
                        </div>
                    </div>
                    <div class="col-8 col-lg-8 col-xl-9">
                        <div class="d-flex flex-column my-auto text-start p-4">
                            <h4 class="text-dark mb-0">Nom du responsable</h4>
                            <p class="mb-3">Partenaire institutionnel</p>
                            <div class="d-flex text-success mb-3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star text-body"></i>
                            </div>
                            <p class="mb-0">
                                Le FREMIN joue un rôle clé dans la structuration
                                et le développement du secteur industriel ivoirien.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Témoignage 3 -->
            <div class="testimonial-item bg-light rounded">
                <div class="row g-0">
                    <div class="col-4 col-lg-4 col-xl-3">
                        <div class="h-100">
                            <img src="{{asset('assets/img/avatar.jpg')}}" class="img-fluid h-100 rounded"
                                style="object-fit: cover;" alt="Programme de mise à niveau FREMIN">
                        </div>
                    </div>
                    <div class="col-8 col-lg-8 col-xl-9">
                        <div class="d-flex flex-column my-auto text-start p-4">
                            <h4 class="text-dark mb-0">Nom du bénéficiaire</h4>
                            <p class="mb-3">Responsable d’entreprise industrielle</p>
                            <div class="d-flex text-success mb-3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star text-body"></i>
                                <i class="fas fa-star text-body"></i>
                            </div>
                            <p class="mb-0">
                                Grâce aux programmes du FREMIN, nous avons amélioré
                                notre organisation interne et renforcé nos capacités techniques.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->

    <!-- Footer Start -->
    <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-xl-9">
                    <div class="mb-5">
                        <div class="row g-4">
                            <div class="col-md-6 col-lg-6 col-xl-6">
                                <div class="footer-item">
                                    <a href="index.html" class="p-0 mb-4">
                                        {{-- <h3 class="text-white"><i class="fab fa-slack me-3"></i> LifeSure</h3> --}}
                                        <img src="{{asset('assets/img/logo_fremin.jpg')}}" style="width: 50%" alt="Logo">
                                    </a>
                                    <div class="footer-btn d-flex">
                                        <a class="btn btn-md-square rounded-circle me-3" href="#"><i
                                                class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-md-square rounded-circle me-3" href="#"><i
                                                class="fab fa-twitter"></i></a>
                                        <a class="btn btn-md-square rounded-circle me-3" href="#"><i
                                                class="fab fa-instagram"></i></a>
                                        <a class="btn btn-md-square rounded-circle me-0" href="#"><i
                                                class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-4">
                                <div class="footer-item">
                                    <h4 class="text-white mb-4">Useful Links</h4>
                                    <a href="#"><i class="fas fa-angle-right me-2"></i> About Us</a>
                                    <a href="#"><i class="fas fa-angle-right me-2"></i> Features</a>
                                    <a href="#"><i class="fas fa-angle-right me-2"></i> Services</a>
                                    <a href="#"><i class="fas fa-angle-right me-2"></i> FAQ's</a>
                                    <a href="#"><i class="fas fa-angle-right me-2"></i> Blogs</a>
                                    <a href="#"><i class="fas fa-angle-right me-2"></i> Contact</a>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="pt-5" style="border-top: 1px solid rgba(255, 255, 255, 0.08);">
                        <div class="row g-0">
                            <div class="col-12">
                                <div class="row g-4">
                                    <div class="col-lg-6 col-xl-4">
                                        <div class="d-flex">
                                            <div class="btn-xl-square bg-primary text-white rounded p-4 me-4">
                                                <i class="fas fa-map-marker-alt fa-2x"></i>
                                            </div>
                                            <div>
                                                <h4 class="text-white">Address</h4>
                                                <p class="mb-0">123 Street New York.USA</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-4">
                                        <div class="d-flex">
                                            <div class="btn-xl-square bg-primary text-white rounded p-4 me-4">
                                                <i class="fas fa-envelope fa-2x"></i>
                                            </div>
                                            <div>
                                                <h4 class="text-white">Mail Us</h4>
                                                <p class="mb-0">info@example.com</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-4">
                                        <div class="d-flex">
                                            <div class="btn-xl-square bg-primary text-white rounded p-4 me-4">
                                                <i class="fa fa-phone-alt fa-2x"></i>
                                            </div>
                                            <div>
                                                <h4 class="text-white">Telephone</h4>
                                                <p class="mb-0">(+012) 3456 7890</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="footer-item">
                        <h4 class="text-white mb-4">Newsletter</h4>
                        <div class="position-relative rounded-pill mb-4">
                            <input class="form-control rounded-pill w-100 py-3 ps-4 pe-5" type="text"
                                placeholder="Enter your email">
                            <button type="button"
                                class="btn btn-primary rounded-pill position-absolute top-0 end-0 py-2 mt-2 me-2">SignUp</button>
                        </div>
                        <div class="d-flex flex-shrink-0">
                            <div class="footer-btn">
                                <a href="#" class="btn btn-lg-square rounded-circle position-relative wow tada"
                                    data-wow-delay=".9s">
                                    <i class="fa fa-phone-alt fa-2x"></i>
                                    <div class="position-absolute" style="top: 2px; right: 12px;">
                                        <span><i class="fa fa-comment-dots text-secondary"></i></span>
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex flex-column ms-3 flex-shrink-0">
                                <span>Contactez - nous</span>
                                <a href="tel:+ 0123 456 7890"><span class="text-white">+225 27 45 678 901</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    {{-- <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-6 text-center text-md-end mb-md-0">
                    <span class="text-body"><a href="#" class="border-bottom text-white"><i
                                class="fas fa-copyright text-light me-2"></i>Your Site Name</a>, All right
                        reserved.</span>
                </div>
                <div class="col-md-6 text-center text-md-start text-body">
                    Designed By <a class="border-bottom text-white" href="https://htmlcodex.com">HTML Codex</a>
                    Distributed By <a class="border-bottom text-white" href="https://themewagon.com">ThemeWagon</a>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Copyright End -->
@endsection
