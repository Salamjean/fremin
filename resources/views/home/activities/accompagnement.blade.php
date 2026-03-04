@extends('home.layouts.template')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section institutional-base" style="background: #f8f9fa; padding: 100px 0 60px;">
        <div class="container text-center" data-aos="fade-up">
            <h1 class="refined-title" style="color: #1a1a1a; font-weight: 800;">{{ __('direct_support') }}</h1>
            <p class="lead-text" style="max-width: 800px; margin: 20px auto;">Accompagnements directs aux entreprises
                industrielles</p>
            <div class="tricolor-line shadow-sm mx-auto"
                style="width: 100px; height: 4px; background: linear-gradient(to right, #FF8200 33.33%, #fff 33.33%, #fff 66.66%, #009B3A 66.66%);">
            </div>
        </div>
    </section>

    <section class="support-cards py-5">
        <div class="container">
            <div class="row g-4 justify-content-center align-items-start" id="supportAccordion">
                <!-- Card 1: Diagnostic -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="mission-item-card position-relative pb-5">
                        <div class="m-icon"><i class="fas fa-clipboard-check"></i></div>
                        <h4 class="mb-3" style="font-weight: 700; color: #1a1a1a;">L’appui aux acteurs exerçant dans
                            l’agro-transformation
                        </h4>

                        <div class="collapse" id="supportCollapse1" data-bs-parent="#supportAccordion">
                            <p class="text-muted">Le dynamisme des acteurs de la petite agro-transformation dans la
                                croissance économique nationale est largement reconnu. Leur capacité à générer des emplois
                                décents et à participer à la réduction de la pauvreté demeure incontestable.
                                Afin de renforcer leur compétitivité et d’accélérer la transformation des matières premières
                                agricoles, le Gouvernement, à travers le Ministère du Commerce et de l’Industrie et le
                                FREMIN, a décidé d’acquérir des équipements de production au profit des acteurs de ce
                                secteur. Ces équipements ont été réceptionnés le 30 avril 2025 sur le site du Centre de
                                Démonstration et de Promotion des Technologies (CDT).
                                Des missions de visite ont été organisées par la Cellule Technique du FREMIN dans les
                                Districts d’Abidjan et de Yamoussoukro, en amont des actions opérationnelles, afin
                                d’identifier les bénéficiaires potentiels des équipements de production et d’évaluer de
                                manière précise leurs besoins spécifiques. Ces visites ont constitué une étape déterminante
                                dans la planification et le ciblage des interventions au titre de l’exercice 2025.
                                Sur la base des besoins identifiés, dix-sept (17) équipements de production ont été acquis
                                pour onze (11) bénéficiaires. Une cérémonie officielle de remise de ces équipements a été
                                organisée à cet effet. Ci-dessous, la liste des équipements.
                            </p>
                        </div>
                        <div class="position-absolute bottom-0 start-0 w-100 p-4">
                            <a href="javascript:void(0)" class="btn btn-outline-success btn-sm w-100 toggle-btn"
                                data-bs-toggle="collapse" data-bs-target="#supportCollapse1">
                                Voir plus <i class="fas fa-chevron-down ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Secteurs d'Intervention -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="mission-item-card highlighted position-relative pb-5">
                        <div class="m-icon" style="background: rgba(255,255,255,0.2); color: #fff;"><i
                                class="fas fa-industry"></i></div>
                        <h4 class="mb-3" style="font-weight: 700; color: #fff;">Appui aux acteurs exerçant dans le secteur
                            textile-habillement et de l’agro-transformation

                        </h4>

                        <div class="collapse" id="supportCollapse2" data-bs-parent="#supportAccordion">
                            <p style="color: rgba(255,255,255,0.9);">En Côte d’Ivoire, le secteur textile-habillement reste
                                peu valorisé, avec seulement 1 % du coton transformé localement malgré un fort potentiel
                                productif et créatif. Parallèlement, les crises récentes (COVID-19 et guerre
                                russo-ukrainienne) ont fragilisé les entreprises industrielles, notamment dans
                                l’agro-transformation, entraînant un ralentissement des activités et une vulnérabilité
                                accrue des PME.
                                Face à cette situation, le Ministère du Commerce et de l’Industrie, à travers le FREMIN, a
                                recruté deux consultants pour identifier les PME éligibles à un appui en équipements et
                                évaluer leurs besoins. À l’issue des missions, des conventions ont été signées avec
                                plusieurs structures techniques pour l’acquisition d’équipements de production au profit des
                                secteurs textile-habillement (machines de confection, teinture, logiciels de conception) et
                                agro-transformation (équipements pour légumes, fruits, karité, manioc et cacao).
                                Cette initiative vise à renforcer la compétitivité, la qualité des produits et la relance
                                des entreprises en difficulté.

                            </p>
                        </div>
                        <div class="position-absolute bottom-0 start-0 w-100 p-4">
                            <a href="javascript:void(0)" class="btn btn-light btn-sm w-100 toggle-btn"
                                style="color: #009B3A; font-weight: bold;" data-bs-toggle="collapse"
                                data-bs-target="#supportCollapse2">
                                Voir plus <i class="fas fa-chevron-down ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Study 6: Textile et Agro (C1.5) -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="600">
                    <div class="mission-item-card position-relative pb-5">
                        <div class="m-icon"><i class="fas fa-industry"></i></div>
                        <h4 class="mb-3" style="font-weight: 700; color: #1a1a1a;">Assistance technique aux entreprises industrielles</h4>

                        <div class="collapse" id="studyCollapse6" data-bs-parent="#supportAccordion">
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
                                Le FREMIN a accompagné jusqu’à ce jour 15 entreprises dans le cadre du PNRMN.
                            </p>
                        </div>
                        <div class="position-absolute bottom-0 start-0 w-100 p-4">
                            <a href="javascript:void(0)" class="btn btn-outline-success btn-sm w-100 toggle-btn"
                                data-bs-toggle="collapse" data-bs-target="#studyCollapse6">
                                Voir plus <i class="fas fa-chevron-down ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <style>
        .mission-item-card {
            border-bottom: 5px solid #009B3A !important;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .mission-item-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
    </style>

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
                        if (collapseElement.parentElement.classList.contains('highlighted')) {
                            btn.innerHTML = 'Voir moins <i class="fas fa-chevron-up ms-1"></i>';
                        } else {
                            btn.innerHTML = 'Voir moins <i class="fas fa-chevron-up ms-1"></i>';
                        }
                    });

                    collapseElement.addEventListener('hidden.bs.collapse', function () {
                        if (collapseElement.parentElement.classList.contains('highlighted')) {
                            btn.innerHTML = 'Voir plus <i class="fas fa-chevron-down ms-1"></i>';
                        } else {
                            btn.innerHTML = 'Voir plus <i class="fas fa-chevron-down ms-1"></i>';
                        }
                    });
                }
            });
        });
    </script>
@endpush