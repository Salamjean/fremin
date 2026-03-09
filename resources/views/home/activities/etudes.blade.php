@extends('home.layouts.template')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section institutional-base" style="background: #f8f9fa; padding: 100px 0 60px;">
        <div class="container text-center" data-aos="fade-up">
            <h1 class="refined-title" style="color: #1a1a1a; font-weight: 800;">{{ __('studies_conducted') }}</h1>
            <p class="lead-text" style="max-width: 800px; margin: 20px auto;">{{ __('activities_desc') }}</p>
            <div class="tricolor-line shadow-sm mx-auto"
                style="width: 100px; height: 4px; background: linear-gradient(to right, #FF8200 33.33%, #fff 33.33%, #fff 66.66%, #009B3A 66.66%);">
            </div>
        </div>
    </section>

    <section class="studies-list py-5">
        <div class="container">
            <div class="row g-4 align-items-start" id="studiesAccordion">
                <!-- Study 1: Stratégies de développement de Clustders (C1.1) -->
                <div class="col-12" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-premium h-100 overflow-hidden shadow-sm p-4" style="background: white; border-radius: 12px; border: 1px solid rgba(0,0,0,0.05);">
                        <div class="d-flex align-items-center mb-3">
                            <div class="m-icon me-3" style="color: #009B3A; font-size: 1.5rem;"><i class="fas fa-project-diagram"></i></div>
                            <h3 class="m-0" style="color: black; font-weight: 700; line-height: 1.3;">Elaboration de cinq (05) stratégies de développement de cinq (05) cluster</h3>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-md-6">
                                <div class="bg-secondary rounded" style="height: 300px; display: flex; align-items: center; justify-content: center; color: white;">
                                    <img src="{{ asset('assets/img/fremin5.jpeg') }}" style="width: 100%; height: 100%; object-fit: cover;" alt="Image d'illustration">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="bg-secondary rounded" style="height: 300px; display: flex; align-items: center; justify-content: center; color: white;">
                                    <img src="{{ asset('assets/img/fremin8.jpeg') }}" style="width: 100%; height: 100%; object-fit: cover;" alt="Image d'illustration">
                                </div>
                            </div>
                        </div>

                        <p class="text-muted" style="font-size: 1.15rem; line-height: 1.6; text-align: justify; hyphens: auto; -webkit-hyphens: auto; -moz-hyphens: auto;">
                            Les clusters sont des ensembles d’unités industriels regroupés autour d’un
                            secteur ou d’une filière donnée. Ils se caractérisent par un réseau d’entreprises
                            industrielles et d’institutions proches géographiquement et interdépendantes liées par des
                            métiers, des technologies et des savoir-faire.<br><br>
                            Dans le cadre de la mise en œuvre du pilier 1 du Plan National de Développement (PND)
                            2021-2025 qui porte sur l’accélération de la transformation structurelle de l’économie par
                            l’industrialisation et le développement de grappes, le Ministère en charge de l’Industrie à
                            travers le FREMIN a fait élaborer des stratégies de développement de cinq (05) clusters. Il
                            s’agit notamment des clusters de la chimie et plasturgie, des matériaux de construction,
                            d’ameublement et d’équipement, de l’emballage, de l’agro-industrie et de l’industrie
                            pharmaceutique.
                        </p>
                    </div>
                </div>

                <!-- Study 2: PNRMN Durable -->
                <div class="col-12" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-premium h-100 overflow-hidden shadow-sm p-4" style="background: white; border-radius: 12px; border: 1px solid rgba(0,0,0,0.05);">
                        <div class="d-flex align-items-center mb-3">
                            <div class="m-icon me-3" style="color: #009B3A; font-size: 1.5rem;"><i class="fas fa-project-diagram"></i></div>
                            <h3 class="m-0" style="color: black; font-weight: 700; line-height: 1.3;">Actualisation du Programme National de Restructuration et de Mise à Niveau des entreprises industrielles « PNRMN Durable »</h3>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-12">
                                <div class="bg-secondary rounded" style="height: 400px; display: flex; align-items: center; justify-content: center; color: white;">
                                    <img src="{{ asset('assets/img/ooooo.png') }}" style="width: 100%; height: 100%; object-fit: cover;" alt="Programme National">
                                </div>
                            </div>
                        </div>

                        <p class="text-muted" style="font-size: 1.15rem; line-height: 1.6; text-align: justify; hyphens: auto; -webkit-hyphens: auto; -moz-hyphens: auto;">
                            Dans le cadre du renforcement de la compétitivité des entreprises ivoiriennes, le Gouvernement a mis en œuvre, depuis 2014, le Programme National de Restructuration et de Mise à Niveau (PNRMN). Il a pour objectif d’accompagner les entreprises dans le cadre de la définition et de la mise en œuvre d’un plan d’actions visant l’amélioration de leur compétitivité.<br><br>
                            Pour renforcer les actions d’accompagnement dans le cadre du PNRMN, le Ministère du Commerce et de l’Industrie a entrepris depuis 2024, l’actualisation du PNRMN « PNRMN Durable ». Il s’agira d’une part, d’aligner les composantes et les activités du nouveau Programme aux objectifs du Plan National de Développement (PND) 2021-2025 et d’autre part, de l’adapter aux besoins sans cesse croissants des entreprises industrielles.
                        </p>
                    </div>
                </div>

                <!-- Study 3: Fiches filières (C1.3) -->
                <div class="col-12" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-premium h-100 overflow-hidden shadow-sm p-4" style="background: white; border-radius: 12px; border: 1px solid rgba(0,0,0,0.05);">
                        <div class="d-flex align-items-center mb-3">
                            <div class="m-icon me-3" style="color: #009B3A; font-size: 1.5rem;"><i class="fas fa-file-alt"></i></div>
                            <h3 class="m-0" style="color: black; font-weight: 700; line-height: 1.3;">Elaboration des fiches filières industrielles prioritaires</h3>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-md-4">
                                <div class="bg-secondary rounded" style="height: 250px; display: flex; align-items: center; justify-content: center; color: white;">
                                    <img src="{{ asset('assets/img/galerie176588060124.jpg') }}" style="width: 100%; height: 100%; object-fit: cover;" alt="Filière 1">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="bg-secondary rounded" style="height: 250px; display: flex; align-items: center; justify-content: center; color: white;">
                                    <img src="{{ asset('assets/img/perssss.png') }}" style="width: 100%; height: 100%; object-fit: cover;" alt="Filière 2">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="bg-secondary rounded" style="height: 250px; display: flex; align-items: center; justify-content: center; color: white;">
                                    <img src="{{ asset('assets/img/parllll.png') }}" style="width: 100%; height: 100%; object-fit: cover;" alt="Filière 3">
                                </div>
                            </div>
                        </div>

                        <p class="text-muted" style="font-size: 1.15rem; line-height: 1.6; text-align: justify; hyphens: auto; -webkit-hyphens: auto; -moz-hyphens: auto;">
                            Dans le cadre de la promotion des clusters, en particulier les clusters agro-industrie et industrie pharmaceutique, le Ministère du Commerce et de l’Industrie à travers le Fonds de Restructuration et de Mise à Niveau des entreprises industrielles (FREMIN) a fait élaborer les seize (16) fiches d’opportunités dans les filières suivantes : Anacarde, Ananas, Aubergine, Bois, Cacao, Cola, Coton, Cuir, Eau minérale, Hévéa, Karité, Mangue, Coco, Palmier à Huile, Pharmacie, Tomate. Ces fiches sont élaborées dans le cadre de la mise en œuvre du pilier 1 du Plan National de Développement (PND) 2021-2025.
                        </p>
                    </div>
                </div>

                <!-- Study 4: Petite transformation (C1.4) -->
                <div class="col-12" data-aos="fade-up" data-aos-delay="400">
                    <div class="card-premium h-100 overflow-hidden shadow-sm p-4" style="background: white; border-radius: 12px; border: 1px solid rgba(0,0,0,0.05);">
                        <div class="d-flex align-items-center mb-3">
                            <div class="m-icon me-3" style="color: #009B3A; font-size: 1.5rem;"><i class="fas fa-file-alt"></i></div>
                            <h3 class="m-0" style="color: black; font-weight: 700; line-height: 1.3;">Stratégie pour le développement de la petite transformation</h3>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-md-12">
                                <div class="bg-secondary rounded" style="height: 350px; display: flex; align-items: center; justify-content: center; color: white;">
                                    <img src="{{ asset('assets/img/promotion-industrielle-le-ministre-souleymane-diarrassouba-procede-a-louver_uu3nr3q4jqk.jpg') }}" style="width: 100%; height: 100%; object-fit: cover;" alt="Petite Transformation">
                                </div>
                            </div>
                        </div>

                        <p class="text-muted" style="font-size: 1.15rem; line-height: 1.6; text-align: justify; hyphens: auto; -webkit-hyphens: auto; -moz-hyphens: auto;">
                            La création d’emplois décents constitue un enjeu majeur pour le Gouvernement ivoirien. Afin d’y répondre, les autorités ont placé l’industrialisation au cœur de la transformation structurelle de l’économie, conformément aux orientations du PND 2021-2025. À ce titre, la stratégie du Ministère du Commerce, de l’Industrie et de l’Artisanat repose notamment sur le développement de clusters prioritaires.<br><br>
                            Dans cette dynamique, le Ministère, à travers le Fonds de Restructuration et de Mise à Niveau des entreprises industrielles (FREMIN), a initié une étude stratégique pour le développement de la petite transformation (Très Petite Entreprise et des Petites et Moyennes Industries en Côte d’Ivoire).
                        </p>
                    </div>
                </div>

                <!-- Study 5: Textile et Agro (C1.5) -->
                <div class="col-12" data-aos="fade-up" data-aos-delay="500">
                    <div class="card-premium h-100 overflow-hidden shadow-sm p-4" style="background: white; border-radius: 12px; border: 1px solid rgba(0,0,0,0.05);">
                        <div class="d-flex align-items-center mb-3">
                            <div class="m-icon me-3" style="color: #009B3A; font-size: 1.5rem;"><i class="fas fa-industry"></i></div>
                            <h3 class="m-0" style="color: black; font-weight: 700; line-height: 1.3;">Etude pour l’identification des acteurs des secteurs textile-habillement et de l’agro-transformation ainsi que leurs besoins en équipements de production</h3>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-md-6">
                                <div class="bg-secondary rounded" style="height: 250px; display: flex; align-items: center; justify-content: center; color: white;">
                                    <img src="{{ asset('assets/img/frrrr.png') }}" style="width: 100%; height: 100%; object-fit: cover;" alt="Textile">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="bg-secondary rounded" style="height: 250px; display: flex; align-items: center; justify-content: center; color: white;">
                                    <img src="{{ asset('assets/img/geeee.png') }}" style="width: 100%; height: 100%; object-fit: cover;" alt="Agro-transformation">
                                </div>
                            </div>
                        </div>

                        <p class="text-muted" style="font-size: 1.15rem; line-height: 1.6; text-align: justify; hyphens: auto; -webkit-hyphens: auto; -moz-hyphens: auto;">
                            Les crises liées à la COVID-19 et à la guerre russo-ukrainienne ont fortement affecté l’économie ivoirienne, en particulier le secteur industriel. De nombreuses PME ont subi un ralentissement, voire un arrêt de leurs activités, les plaçant dans une situation de vulnérabilité nécessitant une intervention publique.<br><br>
                            Pour y faire face, le Ministère du Commerce et de l’Industrie a mis en place le Projet d’Appui aux Entreprises en Difficulté (PAED), financé par le FREMIN, afin de soutenir les PME industrielles à travers l’amélioration de leurs processus de production et de la qualité de leurs produits. Dans ce cadre, une étude diagnostique est réalisée pour identifier les besoins réels des acteurs de la petite agro-transformation.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <style>
        .card-premium {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-premium:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
            border-bottom: 5px solid #009B3A !important;
        }
    </style>

@endsection