@extends('home.layouts.template')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section institutional-base" style="background: #f8f9fa; padding: 100px 0 60px;">
        <div class="container text-center" data-aos="fade-up">
            <h1 class="refined-title" style="color: #1a1a1a; font-weight: 800;">Mise en place des infrastructures
                industrielles</h1>
            <p class="lead-text" style="max-width: 800px; margin: 20px auto;">Aménagement et mise en place des
                infrastructures pour les zones industrielles.</p>
            <div class="tricolor-line shadow-sm mx-auto"
                style="width: 100px; height: 4px; background: linear-gradient(to right, #FF8200 33.33%, #fff 33.33%, #fff 66.66%, #009B3A 66.66%);">
            </div>
        </div>
    </section>

    <section class="infrastructure-content py-5">
        <div class="container">

            <!-- Tabs Navigation -->
            <div class="d-flex justify-content-center mb-5">
                <ul class="nav nav-pills custom-nav-pills shadow-sm rounded-pill p-1 bg-white" id="infraTab" role="tablist" aria-orientation="horizontal">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill px-4 active" id="presentation-tab" data-bs-toggle="tab"
                            data-bs-target="#presentation" type="button" role="tab" aria-controls="presentation"
                            aria-selected="true">Présentation</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill px-4" id="realisation-tab" data-bs-toggle="tab" data-bs-target="#realisation"
                            type="button" role="tab" aria-controls="realisation" aria-selected="false">Réalisations</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill px-4" id="media-tab" data-bs-toggle="tab" data-bs-target="#media" type="button"
                            role="tab" aria-controls="media" aria-selected="false">{{ __('media') }}</button>
                    </li>
                </ul>
            </div>

            <style>
                .custom-nav-pills .nav-link {
                    transition: all 0.3s ease;
                    font-weight: 600;
                    color: #333;
                }

                .custom-nav-pills .nav-link:hover {
                    background-color: rgba(0, 155, 58, 0.1);
                    color: #009B3A !important;
                }

                .custom-nav-pills .nav-link.active,
                .custom-nav-pills .nav-link.active:focus,
                .custom-nav-pills .nav-link.active:hover {
                    background-color: #009B3A !important;
                    color: white !important;
                }
            </style>

            <!-- Tabs Content -->
            <div class="tab-content pt-2" id="infraTabContent">

                <!-- Tab 1: Présentation -->
                <div class="tab-pane fade show active" id="presentation" role="tabpanel" aria-labelledby="presentation-tab">
                    <div class="content-box-premium p-4 p-md-5" data-aos="fade-up">
                        <div class="row align-items-center mb-5">
                            <div class="col-lg-12">
                                <div class="section-header text-start mb-4">
                                    <h3 style="color: #009B3A; font-weight: 700;">Contexte</h3>
                                    <div class="divider"
                                        style="width: 60px; height: 3px; background: #FF8200; margin-bottom: 20px;"></div>
                                </div>
                                <p class="text-dark mb-4" style="text-align: justify; line-height: 1.8;">
                                    Dans le cadre du développement des infrastructures industrielles, des ressources ont été affectées par le
                                    Ministère du Budget et des Finances pour la prise en charge des engagements de l’Etat au
                                    titre de la Convention de concession signée le 14 juin 2022 entre l’Etat de Côte
                                    d’Ivoire et la société Arise Ivoire portant sur la réalisation des amenées primaires du
                                    site de la <strong>ZI PK24</strong> et la réalisation les travaux de réhabilitation des
                                    zones industrielles de <strong>Koumassi et Vridi</strong>.
                                </p>

                                <div class="row g-4 mb-4">
                                    <div class="col-md-6">
                                        <div class="info-card p-4 rounded-4 shadow-sm h-100"
                                            style="background: rgba(0, 155, 58, 0.05); border-left: 5px solid #009B3A;">
                                            <h5 class="fw-bold" style="color: #009B3A;">ZI Akoupé-Zeudji PK24</h5>
                                            <p class="text-muted mt-2 mb-0">Pour les travaux d’amenées primaires</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-card p-4 rounded-4 shadow-sm h-100"
                                            style="background: rgba(255, 130, 0, 0.05); border-left: 5px solid #FF8200;">
                                            <h5 class="fw-bold" style="color: #FF8200;">Koumassi et Vridi</h5>
                                            <p class="text-muted mt-2 mb-0">Pour la réhabilitation des zones industrielles
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <p class="text-dark mb-0" style="text-align: justify; line-height: 1.8;">
                                    En vue de faciliter la réalisation des travaux, en utilisant le véhicule financier du
                                    <strong>FREMIN</strong>, le Ministre chargé de l’Industrie a autorisé le transfert de
                                    l’ensemble des ressources logées au « programme industrie » du Ministère en charges de
                                    l’Industrie, au FREMIN.
                                </p>
                            </div>
                        </div>

                        <div class="alert alert-info border-0 rounded-4 p-4 shadow-sm"
                            style="background: #e9ecef; border-left: 5px solid #0d6efd !important;">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-info-circle fa-2x text-primary me-3"></i>
                                <p class="mb-0" style="text-align: justify;">
                                    Compte tenu de l’importance et de l’urgence attachées à la réalisation de ces différents
                                    travaux, un processus d’appels d’offres applicable directement est sollicité auprès du
                                    Comité de Gestion.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab 2: Réalisations -->
                <div class="tab-pane fade" id="realisation" role="tabpanel" aria-labelledby="realisation-tab">
                    <div class="content-box-premium p-4 p-md-5" data-aos="fade-up">
                        <div class="section-header text-center mb-5">
                            <h3 style="color: #1a1a1a; font-weight: 700;">Détails des Travaux Prévus</h3>
                        </div>

                        <div class="table-responsive shadow-sm rounded-4 overflow-hidden">
                            <table class="table table-hover align-middle mb-0">
                                <thead style="background: #BFD7EA;">
                                    <tr>
                                        <th class="py-4 px-4 text-center text-uppercase fw-bold"
                                            style="font-size: 1.1rem; color: #1a1a1a;">
                                            TRAVAUX AMENEES PRIMAIRES ZI PK24
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="py-3 px-4 fw-medium border-bottom"><i
                                                class="fas fa-bolt text-warning me-3"></i>Travaux Electricité de 5 MW de la
                                            zone industrielle d'Akoupé-Zeudji PK24</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4 fw-medium border-bottom"><i
                                                class="fas fa-Hard-Hat text-secondary me-3"></i>Maîtrise d'œuvre Electricité
                                            5 MW ( Convention CI-ENERGIES)</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4 fw-medium border-bottom"><i
                                                class="fas fa-bolt text-warning me-3"></i>Electricité de 35 MW de la zone
                                            industrielle d'Akoupé-Zeudji PK24</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4 fw-medium border-bottom"><i
                                                class="fas fa-road text-secondary me-3"></i>Travaux Voirie nervure centrale
                                            de la zone industrielle d'Akoupé-Zeudji PK24</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4 fw-medium border-bottom"><i
                                                class="fas fa-hard-hat text-secondary me-3"></i>Maîtrise d'œuvre Voirie
                                            nervure centrale ( Convention BNETD)</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4 fw-medium border-bottom"><i
                                                class="fas fa-tint text-primary me-3"></i>Travaux Eau potable de la zone
                                            industrielle d'Akoupé-Zeudji PK24</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4 fw-medium border-bottom"><i
                                                class="fas fa-hard-hat text-secondary me-3"></i>Maîtrise d'œuvre eau potable
                                            (convention ONEP)</td>
                                    </tr>
                                </tbody>
                                <thead style="background: #E8E8E8;">
                                    <tr>
                                        <th class="py-4 px-4 text-center text-uppercase fw-bold"
                                            style="font-size: 1.1rem; color: #1a1a1a;">
                                            TRAVAUX REHABILITATION ZI KOUMASSI ET VRIDI
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="py-3 px-4 fw-medium border-bottom"><i
                                                class="fas fa-tools text-primary me-3"></i>Réhabilitation de la zone
                                            industrielle de Vridi</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4 fw-medium border-bottom"><i
                                                class="fas fa-tools text-primary me-3"></i>Réhabilitation de la zone
                                            industrielle de Koumassi</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Tab 3: Média -->
                <div class="tab-pane fade" id="media" role="tabpanel" aria-labelledby="media-tab">
                    <div class="content-box-premium p-4 p-md-5" data-aos="fade-up">

                        <div class="row g-4">
                            <!-- Image 1 -->
                            <div class="col-lg-4 col-md-6">
                                <div class="gallery-item rounded-4 overflow-hidden shadow-sm position-relative">
                                    <img src="{{ asset('assets/img/z1.jpg') }}" alt="Infrastructure 1"
                                        class="img-fluid w-100"
                                        style="height: 250px; object-fit: cover; transition: transform 0.5s ease;">
                                    <div class="gallery-overlay d-flex align-items-end p-3 position-absolute bottom-0 start-0 w-100 h-100"
                                        style="background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 60%);">
                                    </div>
                                </div>
                            </div>

                            <!-- Image 2 -->
                            <div class="col-lg-4 col-md-6">
                                <div class="gallery-item rounded-4 overflow-hidden shadow-sm position-relative">
                                    <img src="{{ asset('assets/img/z2.jpg') }}" alt="Infrastructure 2"
                                        class="img-fluid w-100"
                                        style="height: 250px; object-fit: cover; transition: transform 0.5s ease;">
                                    <div class="gallery-overlay d-flex align-items-end p-3 position-absolute bottom-0 start-0 w-100 h-100"
                                        style="background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 60%);">
                                    </div>
                                </div>
                            </div>

                            <!-- Image 3 -->
                            <div class="col-lg-4 col-md-6">
                                <div class="gallery-item rounded-4 overflow-hidden shadow-sm position-relative">
                                    <img src="{{ asset('assets/img/z3.jpg') }}" alt="Infrastructure 3"
                                        class="img-fluid w-100"
                                        style="height: 250px; object-fit: cover; transition: transform 0.5s ease;">
                                    <div class="gallery-overlay d-flex align-items-end p-3 position-absolute bottom-0 start-0 w-100 h-100"
                                        style="background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 60%);">
                                    </div>
                                </div>
                            </div>

                            <!-- Image 4 -->
                            <div class="col-lg-4 col-md-6">
                                <div class="gallery-item rounded-4 overflow-hidden shadow-sm position-relative">
                                    <img src="{{ asset('assets/img/z4.jpg') }}" alt="Infrastructure 4"
                                        class="img-fluid w-100"
                                        style="height: 250px; object-fit: cover; transition: transform 0.5s ease;">
                                    <div class="gallery-overlay d-flex align-items-end p-3 position-absolute bottom-0 start-0 w-100 h-100"
                                        style="background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 60%);">
                                    </div>
                                </div>
                            </div>

                            <!-- Image 5 -->
                            <div class="col-lg-4 col-md-6">
                                <div class="gallery-item rounded-4 overflow-hidden shadow-sm position-relative">
                                    <img src="{{ asset('assets/img/z5.jpg') }}" alt="Infrastructure 5"
                                        class="img-fluid w-100"
                                        style="height: 250px; object-fit: cover; transition: transform 0.5s ease;">
                                    <div class="gallery-overlay d-flex align-items-end p-3 position-absolute bottom-0 start-0 w-100 h-100"
                                        style="background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 60%);">
                                    </div>
                                </div>
                            </div>

                            <!-- Image 6 -->
                            <div class="col-lg-4 col-md-6">
                                <div class="gallery-item rounded-4 overflow-hidden shadow-sm position-relative">
                                    <img src="{{ asset('assets/img/z6.jpg') }}" alt="Infrastructure 6"
                                        class="img-fluid w-100"
                                        style="height: 250px; object-fit: cover; transition: transform 0.5s ease;">
                                    <div class="gallery-overlay d-flex align-items-end p-3 position-absolute bottom-0 start-0 w-100 h-100"
                                        style="background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 60%);">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <style>
                            .gallery-item:hover img {
                                transform: scale(1.1);
                            }

                            .gallery-overlay {
                                opacity: 0.9;
                                transition: opacity 0.3s ease;
                            }

                            .gallery-item:hover .gallery-overlay {
                                opacity: 1;
                            }
                        </style>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection