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
            <div class="row g-4" id="studiesAccordion">
                <!-- Study 1: Stratégies de développement de Clustders (C1.1) -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="mission-item-card h-100 position-relative pb-5">
                        <div class="m-icon"><i class="fas fa-project-diagram"></i></div>
                        <h4 class="mb-3" style="font-weight: 700; color: #1a1a1a;">Elaboration de cinq (05) stratégies de
                            développement de cinq (05) cluster</h4>

                        <div class="collapse" id="studyCollapse1" data-bs-parent="#studiesAccordion">
                            <p class="text-muted">Les clusters sont des ensembles d’unités industriels regroupés autour d’un
                                secteur ou d’une filière donnée. Ils se caractérisent par un réseau d’entreprises
                                industrielles et d’institutions proches géographiquement et interdépendantes liées par des
                                métiers, des technologies et des savoir-faire.
                                Dans le cadre de la mise en œuvre du pilier 1 du Plan National de Développement (PND)
                                2021-2025 qui porte sur l’accélération de la transformation structurelle de l’économie par
                                l’industrialisation et le développement de grappes, le Ministère en charge de l’Industrie à
                                travers le FREMIN a fait élaborer des stratégies de développement de cinq (05) clusters. Il
                                s’agit notamment des clusters de la chimie et plasturgie, des matériaux de construction,
                                d’ameublement et d’équipement, de l’emballage, de l’agro-industrie et de l’industrie
                                pharmaceutique.</p>
                        </div>
                        <div class="position-absolute bottom-0 start-0 w-100 p-4">
                            <a href="javascript:void(0)" class="btn btn-outline-success btn-sm w-100 toggle-btn"
                                data-bs-toggle="collapse" data-bs-target="#studyCollapse1">
                                Voir plus <i class="fas fa-chevron-down ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Study 1: Stratégies de développement de Clustders (C1.1) -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="mission-item-card h-100 position-relative pb-5">
                        <div class="m-icon"><i class="fas fa-project-diagram"></i></div>
                        <h4 class="mb-3" style="font-weight: 700; color: #1a1a1a;">Actualisation du Programme National de
                            Restructuration et de Mise à Niveau des entreprises industrielles « PNRMN Durable »</h4>

                        <div class="collapse" id="studyCollapse1" data-bs-parent="#studiesAccordion">
                            <p class="text-muted">Dans le cadre du renforcement de la compétitivité des
                                entreprises ivoiriennes, le Gouvernement a mis en œuvre, depuis 2014, le Programme National
                                de Restructuration et de Mise à Niveau (PNRMN). Il a pour objectif d’accompagner les
                                entreprises dans le cadre de la définition et de la mise en œuvre d’un plan d’actions visant
                                l’amélioration de leur compétitivité.
                                Pour renforcer les actions d’accompagnement dans le cadre du PNRMN, le Ministère du Commerce
                                et de l’Industrie a entrepris depuis 2024, l’actualisation du PNRMN « PNRMN Durable ». Il
                                s’agira d’une part, d’aligner les composantes et les activités du nouveau Programme aux
                                objectifs du Plan National de Développement (PND) 2021-2025 et d’autre part, de l’adapter
                                aux besoins sans cesse croissants des entreprises industrielles.</p>
                        </div>
                        <div class="position-absolute bottom-0 start-0 w-100 p-4">
                            <a href="javascript:void(0)" class="btn btn-outline-success btn-sm w-100 toggle-btn"
                                data-bs-toggle="collapse" data-bs-target="#studyCollapse1">
                                Voir plus <i class="fas fa-chevron-down ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Study 3: Fiches filières (C1.3) -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="mission-item-card h-100 position-relative pb-5" style="border-bottom: 5px solid #009B3A;">
                        <div class="m-icon"><i class="fas fa-file-alt"></i></div>
                        <h4 class="mb-3" style="font-weight: 700; color: #1a1a1a;">Elaboration des fiches filières
                            industrielles prioritaires</h4>

                        <div class="collapse" id="studyCollapse3" data-bs-parent="#studiesAccordion">
                            <p class="text-muted">Dans le cadre de la promotion des clusters, en particulier les clusters
                                agro-industrie et industrie pharmaceutique, le Ministère du Commerce et de l’Industrie à
                                travers le Fonds de Restructuration et de Mise à Niveau des entreprises industrielles
                                (FREMIN) a fait élaborer les seize (16) fiches d’opportunités dans les filières suivantes :
                                Anacarde, Ananas, Aubergine, Bois, Cacao, Cola, Coton, Cuir, Eau minérale, Hévéa, Karité,
                                Mangue, Coco, Palmier à Huile, Pharmacie, Tomate. Ces fiches sont élaborées dans le cadre de
                                la mise en œuvre du pilier 1 du Plan National de Développement (PND) 2021-2025.</p>
                        </div>
                        <div class="position-absolute bottom-0 start-0 w-100 p-4">
                            <a href="javascript:void(0)" class="btn btn-outline-success btn-sm w-100 toggle-btn"
                                data-bs-toggle="collapse" data-bs-target="#studyCollapse3">
                                Voir plus <i class="fas fa-chevron-down ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Study 3: Fiches filières (C1.3) -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="mission-item-card h-100 position-relative pb-5" style="border-bottom: 5px solid #009B3A;">
                        <div class="m-icon"><i class="fas fa-file-alt"></i></div>
                        <h4 class="mb-3" style="font-weight: 700; color: #1a1a1a;">Stratégie pour le développement de la petite
                            transformation</h4>

                        <div class="collapse" id="studyCollapse3" data-bs-parent="#studiesAccordion">
                            <p class="text-muted">La création d’emplois décents constitue un enjeu majeur
                                pour le Gouvernement ivoirien. Afin d’y répondre, les autorités ont placé
                                l’industrialisation au cœur de la transformation structurelle de l’économie, conformément
                                aux orientations du PND 2021-2025. À ce titre, la stratégie du Ministère du Commerce, de
                                l’Industrie et de l’Artisanat repose notamment sur le développement de clusters
                                prioritaires.
                                Dans cette dynamique, le Ministère, à travers le Fonds de Restructuration et de Mise à
                                Niveau des entreprises industrielles (FREMIN), a initié une étude stratégique pour le
                                développement de la petite transformation (Très Petite Entreprise et des Petites et Moyennes
                                Industries en Côte d’Ivoire).</p>
                        </div>
                        <div class="position-absolute bottom-0 start-0 w-100 p-4">
                            <a href="javascript:void(0)" class="btn btn-outline-success btn-sm w-100 toggle-btn"
                                data-bs-toggle="collapse" data-bs-target="#studyCollapse3">
                                Voir plus <i class="fas fa-chevron-down ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                

                <!-- Study 5: Textile et Agro (C1.5) -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="mission-item-card h-100 position-relative pb-5">
                        <div class="m-icon"><i class="fas fa-industry"></i></div>
                        <h4 class="mb-3" style="font-weight: 700; color: #1a1a1a;">Etude pour l’identification des acteurs
                            des secteurs textile-habillement et de l’agro-transformation ainsi leurs besoins en équipements
                            de production</h4>

                        <div class="collapse" id="studyCollapse5" data-bs-parent="#studiesAccordion">
                            <p class="text-muted">Les crises liées à la COVID-19 et à la guerre russo-ukrainienne ont
                                fortement affecté l’économie ivoirienne, en particulier le secteur industriel. De nombreuses
                                PME ont subi un ralentissement, voire un arrêt de leurs activités, les plaçant dans une
                                situation de vulnérabilité nécessitant une intervention publique.
                                Pour y faire face, le Ministère du Commerce et de l’Industrie a mis en place le Projet
                                d’Appui aux Entreprises en Difficulté (PAED), financé par le FREMIN, afin de soutenir les
                                PME industrielles à travers l’amélioration de leurs processus de production et de la qualité
                                de leurs produits. Dans ce cadre, une étude diagnostique est réalisée pour identifier les
                                besoins réels des acteurs de la petite agro-transformation.</p>
                        </div>
                        <div class="position-absolute bottom-0 start-0 w-100 p-4">
                            <a href="javascript:void(0)" class="btn btn-outline-success btn-sm w-100 toggle-btn"
                                data-bs-toggle="collapse" data-bs-target="#studyCollapse5">
                                Voir plus <i class="fas fa-chevron-down ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Study 5: Textile et Agro (C1.5) -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="mission-item-card h-100 position-relative pb-5">
                        <div class="m-icon"><i class="fas fa-industry"></i></div>
                        <h4 class="mb-3" style="font-weight: 700; color: #1a1a1a;">Appui direct aux entreprises</h4>

                        <div class="collapse" id="studyCollapse5" data-bs-parent="#studiesAccordion">
                            <p class="text-muted">Le Programme National de Restructuration et de Mise à Niveau (PNRMN) des
                                entreprises industrielles vise à préparer les entreprises manufacturières ivoiriennes à
                                faire face à une concurrence accrue, dans le contexte de la libéralisation des échanges
                                induite par les accords multilatéraux de libre-échange.
                                Le PNRMN s’articule autour de trois (03) composantes principales : (i) l’appui direct aux
                                entreprises ;
                                (ii) le renforcement de l’environnement de la qualité et des infrastructures existantes ;
                                (iii) la création de trois (03) Centres d’Appui à la Compétitivité et au Développement
                                Industriel (CACDI).
                                Le Programme est exécuté sous la tutelle technique du Ministère en charge de l’Industrie. En
                                ce qui concerne la composante relative à l’appui direct aux entreprises, l’Agence pour le
                                Développement et la Compétitivité des Industries de Côte d’Ivoire (ADCI) mandatée par le
                                FREMIN se charge de la sélection et de l’accompagnement des entreprises devant bénéficier
                                d’un appui.
                            </p>
                        </div>
                        <div class="position-absolute bottom-0 start-0 w-100 p-4">
                            <a href="javascript:void(0)" class="btn btn-outline-success btn-sm w-100 toggle-btn"
                                data-bs-toggle="collapse" data-bs-target="#studyCollapse5">
                                Voir plus <i class="fas fa-chevron-down ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const collapses = document.querySelectorAll('.collapse');
            collapses.forEach(function (collapseElement) {
                const id = collapseElement.id;
                const btn = document.querySelector(`[data-bs-target="#${id}"]`);

                if (btn) {
                    collapseElement.addEventListener('shown.bs.collapse', function () {
                        btn.innerHTML = 'Voir moins <i class="fas fa-chevron-up ms-1"></i>';
                    });

                    collapseElement.addEventListener('hidden.bs.collapse', function () {
                        btn.innerHTML = 'Voir plus <i class="fas fa-chevron-down ms-1"></i>';
                    });
                }
            });
        });
    </script>
@endpush