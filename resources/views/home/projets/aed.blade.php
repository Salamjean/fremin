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

            <!-- Tabs Navigation -->
            <ul class="nav nav-tabs nav-tabs-bordered mb-4" id="aedTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="presentation-tab" data-bs-toggle="tab"
                        data-bs-target="#presentation" type="button" role="tab" aria-controls="presentation"
                        aria-selected="true" style="color: #009B3A; font-weight: 700;">Présentation</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="realisation-tab" data-bs-toggle="tab" data-bs-target="#realisation"
                        type="button" role="tab" aria-controls="realisation" aria-selected="false"
                        style="color: #1a1a1a; font-weight: 600;">Réalisations</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="media-tab" data-bs-toggle="tab" data-bs-target="#media" type="button"
                        role="tab" aria-controls="media" aria-selected="false"
                        style="color: #1a1a1a; font-weight: 600;">Images & Vidéo</button>
                </li>
            </ul>

            <!-- Tabs Content -->
            <div class="tab-content pt-2" id="aedTabContent">

                <!-- Tab 1: Présentation -->
                <div class="tab-pane fade show active" id="presentation" role="tabpanel" aria-labelledby="presentation-tab">
                    <div class="content-box-premium mb-4" data-aos="fade-up">
                        <h3 class="section-title" style="color: #009B3A; font-weight: 800; margin-bottom: -50px;">Contexte & Présentation</h3>
                        <p>Les effets conjoncturels engendrés par la crise de la COVID-19 et son
                            corollaire de mesures restrictives, renforcés par la guerre russo-ukrainienne, ont ouvert le
                            champ à plusieurs difficultés au niveau des secteurs économiques de la Côte d’Ivoire. Ainsi,
                            dans le secteur industriel, plusieurs entreprises, notamment les PME industrielles, ont dû se
                            résoudre au ralentissement économique, imposé par les effets post COVID-19 et à l’inflation
                            suscitée par la guerre russo-ukrainienne. Ces difficultés ont conduit plusieurs opérateurs
                            économiques à réduire le champ de leurs activités et laissent certaines firmes dans un état de
                            vulnérabilité qui nécessite l’action de la politique publique.</p>
                        <p>Pour apporter des solutions aux difficultés rencontrées par ces entreprises, le Ministère du
                            Commerce et de l’Industrie propose dans le cadre du Fonds de Restructuration et de Mise à Niveau
                            des entreprises industrielles (FREMIN) des mesures de soutien aux entreprises en difficulté par
                            la mise en place du Projet d’Appui aux Entreprises en Difficulté (PAED), en vue de la relance de
                            leurs activités.</p>
                        <p class="mb-3">De façon spécifique, il s’agira de :</p>
                        <ul class="list-unstyled ms-3">
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Identifier les
                                entreprises en difficulté </li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Réaliser un diagnostic
                                global et stratégique au profit des entreprises en difficulté identifiées </li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Proposer des mesures et
                                actions visant à renforcer la compétitivité des entreprises en difficulté </li>
                        </ul>
                        <p>Ce projet vise à soutenir les PME industrielles en difficulté dans leur développement et le
                            renforcement de leur compétitivité sur le marché national et régional, à travers des actions
                            d’appui à l’amélioration des processus de production et de la qualité des produits. Dans le
                            cadre de la mise en œuvre de ce projet financé par le Fonds de Restructuration et de Mise à
                            Niveau des entreprises industrielles (FREMIN), il est prévu la réalisation de deux études
                            diagnostiques pour la détermination des besoins réels des PME du secteur de l’agro-industrie et
                            du textile habillement.</p>
                    </div>
                </div>

                <!-- Tab 2: Réalisations -->
                <div class="tab-pane fade" id="realisation" role="tabpanel" aria-labelledby="realisation-tab">
                    <div class="content-box-premium" data-aos="fade-up">
                        <h3 class="section-title mb-4" style="color: #009B3A; font-weight: 800;">Liste des entreprises ayant
                            bénéficié d’équipement</h3>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle">
                                <thead class="table-dark" style="background-color: #009B3A;">
                                    <tr>
                                        <th>N°</th>
                                        <th>Entreprises bénéficiaires</th>
                                        <th>Secteur d’activité</th>
                                        <th>Equipements reçus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Coopérative des Femmes Battantes de SAKIARE</td>
                                        <td>Agroalimentaire</td>
                                        <td>Ligne complète de production d’attiéké (broyeur, essoreur, émotteur, semouleur,
                                            cuiseur et séchoir-serre)</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>JENNY’S</td>
                                        <td>-</td>
                                        <td>broyeur d’épices</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>KAO MARKET</td>
                                        <td>-</td>
                                        <td>broyeur d’épices</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>NAMASO</td>
                                        <td>-</td>
                                        <td>broyeur et deux torréfacteurs</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>LERANA FOODS</td>
                                        <td>-</td>
                                        <td>séchoir déshydrateur</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>PALM OLDING</td>
                                        <td>-</td>
                                        <td>broyeuse et séchoir déshydrateur</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>UNIQUE MERVEILLE</td>
                                        <td>-</td>
                                        <td>broyeur</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>MELO DELICE</td>
                                        <td>-</td>
                                        <td>broyeur et torréfacteur</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>SAVEUR BARAKIS</td>
                                        <td>-</td>
                                        <td>torréfacteur</td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>ALIKI SERVICES</td>
                                        <td>-</td>
                                        <td>Extracteur de jus</td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>AGF ENTREPRISE</td>
                                        <td>-</td>
                                        <td>Pasteurisateur et broyeur de céréales</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>KONAN Odile Epse KOUADIO</td>
                                        <td>-</td>
                                        <td>Extracteur de jus et pasteurisateur</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Tab 3: Média -->
                <div class="tab-pane fade" id="media" role="tabpanel" aria-labelledby="media-tab">
                    <div class="content-box-premium p-4 p-md-5" data-aos="fade-up">
                        <div class="section-header text-center mb-5">
                            <h3 style="color: #1a1a1a; font-weight: 700;">Galerie Multimédia AED</h3>
                            <p class="text-muted">Impact visuel et témoignages du programme d'appui (11 réalisations)</p>
                        </div>

                        <div class="media-masonry-grid">
                            <div class="row g-4">
                                <!-- Item 1: Featured Video (Placeholder as before) -->
                                <div class="col-lg-8 col-md-12">
                                    <div class="media-card video-card rounded-4 overflow-hidden position-relative shadow-sm" style="height: 420px;">
                                        <img src="https://placehold.co/1200x800/212529/white?text=Video+Story:+Relance+Industrielle" alt="Vidéo AED" class="w-100 h-100 object-fit-cover transition-transform">
                                        <div class="media-overlay d-flex flex-column justify-content-center align-items-center text-center p-4">
                                            <div class="play-button-wrapper mb-3">
                                                <i class="fas fa-play-circle fa-4x text-white"></i>
                                            </div>
                                            <h4 class="text-white fw-bold mb-2">Témoignage de Relance</h4>
                                            <p class="text-white-50 small mb-0">Découvrez l'impact direct du programme sur les entreprises</p>
                                        </div>
                                        <div class="badge-type position-absolute top-0 end-0 m-3 px-3 py-1 bg-warning text-dark rounded-pill fw-bold">Vidéo</div>
                                    </div>
                                </div>

                                <!-- Item 2: Square Image (fremin1) -->
                                <div class="col-lg-4 col-md-6">
                                    <div class="media-card rounded-4 overflow-hidden position-relative shadow-sm" style="height: 420px;">
                                        <img src="{{ asset('assets/img/1.jpg') }}" alt="AED 1" class="w-100 h-100 object-fit-cover transition-transform">
                                        <div class="media-overlay d-flex align-items-end p-4">
                                            <div class="text-white">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Item 3: small Landscape (fremin2) -->
                                <div class="col-lg-4 col-md-6">
                                    <div class="media-card rounded-4 overflow-hidden position-relative shadow-sm" style="height: 200px;">
                                        <img src="{{ asset('assets/img/2.jpg') }}" alt="AED 2" class="w-100 h-100 object-fit-cover transition-transform">
                                    </div>
                                </div>

                                <!-- Item 4: small Landscape (fremin3) -->
                                <div class="col-lg-4 col-md-6">
                                    <div class="media-card rounded-4 overflow-hidden position-relative shadow-sm" style="height: 200px;">
                                        <img src="{{ asset('assets/img/3.jpg') }}" alt="AED 3" class="w-100 h-100 object-fit-cover transition-transform">
                                    </div>
                                </div>

                                <!-- Item 5: small Landscape (fremin4) -->
                                <div class="col-lg-4 col-md-6">
                                    <div class="media-card rounded-4 overflow-hidden position-relative shadow-sm" style="height: 200px;">
                                        <img src="{{ asset('assets/img/4.jpg') }}" alt="AED 4" class="w-100 h-100 object-fit-cover transition-transform">
                                    </div>
                                </div>

                                <!-- Item 6: Wide (groupe) -->
                                <div class="col-lg-8 col-md-12">
                                    <div class="media-card rounded-4 overflow-hidden position-relative shadow-sm" style="height: 300px;">
                                        <img src="{{ asset('assets/img/5.jpg') }}" alt="AED Groupe" class="w-100 h-100 object-fit-cover transition-transform">
                                    </div>
                                </div>

                                <!-- Item 7: Square (fremin5) -->
                                <div class="col-lg-4 col-md-6">
                                    <div class="media-card rounded-4 overflow-hidden position-relative shadow-sm" style="height: 300px;">
                                        <img src="{{ asset('assets/img/6.jpg') }}" alt="AED 5" class="w-100 h-100 object-fit-cover transition-transform">
                                    </div>
                                </div>

                                <!-- Item 8: Square (fremin6) -->
                                <div class="col-lg-3 col-md-6">
                                    <div class="media-card rounded-4 overflow-hidden position-relative shadow-sm" style="height: 250px;">
                                        <img src="{{ asset('assets/img/7.jpg') }}" alt="AED 6" class="w-100 h-100 object-fit-cover transition-transform">
                                    </div>
                                </div>

                                <!-- Item 9: Square (fremin7) -->
                                <div class="col-lg-3 col-md-6">
                                    <div class="media-card rounded-4 overflow-hidden position-relative shadow-sm" style="height: 250px;">
                                        <img src="{{ asset('assets/img/8.jpg') }}" alt="AED 7" class="w-100 h-100 object-fit-cover transition-transform">
                                    </div>
                                </div>

                                <!-- Item 10: Square (fremin8) -->
                                <div class="col-lg-3 col-md-6">
                                    <div class="media-card rounded-4 overflow-hidden position-relative shadow-sm" style="height: 250px;">
                                        <img src="{{ asset('assets/img/9.jpg') }}" alt="AED 8" class="w-100 h-100 object-fit-cover transition-transform">
                                    </div>
                                </div>

                                <!-- Item 11: Square (fremin9) -->
                                <div class="col-lg-3 col-md-6">
                                    <div class="media-card rounded-4 overflow-hidden position-relative shadow-sm" style="height: 250px;">
                                        <img src="{{ asset('assets/img/10.jpg') }}" alt="AED 9" class="w-100 h-100 object-fit-cover transition-transform">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <style>
                            .media-card {
                                cursor: pointer;
                                transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
                            }
                            .media-card img {
                                transition: transform 0.8s ease;
                            }
                            .media-card:hover img {
                                transform: scale(1.1);
                            }
                            .media-overlay {
                                position: absolute;
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                                background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.2) 50%, transparent 100%);
                                opacity: 0.9;
                                transition: opacity 0.4s ease;
                            }
                            .media-card:hover .media-overlay {
                                opacity: 1;
                                background: linear-gradient(to top, rgba(0, 155, 58, 0.8) 0%, rgba(0,0,0,0.4) 60%, transparent 100%);
                            }
                            .video-card .play-button-wrapper i {
                                transition: transform 0.3s ease;
                            }
                            .video-card:hover .play-button-wrapper i {
                                transform: scale(1.2);
                            }
                            .object-fit-cover {
                                object-fit: cover;
                            }
                            .transition-transform {
                                transition: transform 0.8s ease;
                            }
                        </style>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection