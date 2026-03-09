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
                <div class="col-12" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-premium h-100 overflow-hidden shadow-sm p-4"
                        style="background: white; border-radius: 12px; border: 1px solid rgba(0,0,0,0.05);">
                        <div class="d-flex align-items-center mb-3">
                            <div class="m-icon me-3" style="color: #009B3A; font-size: 1.5rem;"><i
                                    class="fas fa-clipboard-check"></i></div>
                            <h3 class="m-0" style="color: black; font-weight: 700; line-height: 1.3;">L’appui aux acteurs
                                exerçant dans l’agro-transformation</h3>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-md-6">
                                <div class="bg-secondary rounded"
                                    style="height: 300px; display: flex; align-items: center; justify-content: center; color: white;">
                                    <img src="{{ asset('assets/img/geeee.png') }}"
                                        style="width: 100%; height: 100%; object-fit: cover;" alt="Agro-transformation 1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="bg-secondary rounded"
                                    style="height: 300px; display: flex; align-items: center; justify-content: center; color: white;">
                                    <img src="{{ asset('assets/img/equuuuu.png') }}"
                                        style="width: 100%; height: 100%; object-fit: cover;" alt="Agro-transformation 2">
                                </div>
                            </div>
                        </div>

                        <p class="text-muted"
                            style="font-size: 1.15rem; line-height: 1.6; text-align: justify; hyphens: auto; -webkit-hyphens: auto; -moz-hyphens: auto;">
                            Le dynamisme des acteurs de la petite agro-transformation dans la croissance économique
                            nationale est largement reconnu. Leur capacité à générer des emplois décents et à participer à
                            la réduction de la pauvreté demeure incontestable.<br><br>
                            Afin de renforcer leur compétitivité et d’accélérer la transformation des matières premières
                            agricoles, le Gouvernement, à travers le Ministère du Commerce et de l’Industrie et le FREMIN, a
                            décidé d’acquérir des équipements de production au profit des acteurs de ce secteur. Ces
                            équipements ont été réceptionnés le 30 avril 2025 sur le site du Centre de Démonstration et de
                            Promotion des Technologies (CDT).<br><br>
                            Des missions de visite ont été organisées par la Cellule Technique du FREMIN dans les Districts
                            d’Abidjan et de Yamoussoukro, en amont des actions opérationnelles, afin d’identifier les
                            bénéficiaires potentiels des équipements de production et d’évaluer de manière précise leurs
                            besoins spécifiques. Ces visites ont constitué une étape déterminante dans la planification et
                            le ciblage des interventions au titre de l’exercice 2025.<br><br>
                            Sur la base des besoins identifiés, dix-sept (17) équipements de production ont été acquis pour
                            onze (11) bénéficiaires. Une cérémonie officielle de remise des équipements aux bénéficiaires a
                            été organisée le 19 Juin 2025 sur le site du Centre de Démonstration et de Promotion des
                            Technologies (CDT).
                        </p>
                    </div>
                </div>

                <!-- Card 2: Secteurs d'Intervention -->
                <div class="col-12" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-premium h-100 overflow-hidden shadow-sm p-4"
                        style="background: white; border-radius: 12px; border: 1px solid rgba(0,0,0,0.05);">
                        <div class="d-flex align-items-center mb-3">
                            <div class="m-icon me-3" style="color: #009B3A; font-size: 1.5rem;"><i
                                    class="fas fa-industry"></i></div>
                            <h3 class="m-0" style="color: black; font-weight: 700; line-height: 1.3;">Appui aux acteurs
                                exerçant dans le secteur textile-habillement</h3>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-md-12">
                                <div class="bg-secondary rounded"
                                    style="height: 350px; display: flex; align-items: center; justify-content: center; color: white;">
                                    <img src="{{ asset('assets/img/frrrr.png') }}"
                                        style="width: 100%; height: 100%; object-fit: cover;" alt="Textile Habillement">
                                </div>
                            </div>
                        </div>

                        <p class="text-muted"
                            style="font-size: 1.15rem; line-height: 1.6; text-align: justify; hyphens: auto; -webkit-hyphens: auto; -moz-hyphens: auto;">
                            En Côte d’Ivoire, le secteur textile-habillement reste peu valorisé, avec seulement 1 % du coton
                            transformé localement malgré un fort potentiel productif et créatif. Parallèlement, les crises
                            récentes (COVID-19 et guerre russo-ukrainienne) ont fragilisé les entreprises industrielles,
                            notamment dans l’agro-transformation, entraînant un ralentissement des activités et une
                            vulnérabilité accrue des PME.<br><br>
                            Face à cette situation, le Ministère du Commerce et de l’Industrie, à travers le FREMIN, a
                            recruté deux consultants pour identifier les PME éligibles à un appui en équipements et évaluer
                            leurs besoins. À l’issue des missions, des conventions ont été signées avec plusieurs structures
                            techniques pour l’acquisition d’équipements de production au profit des secteurs
                            textile-habillement (machines de confection, teinture, logiciels de conception) et
                            agro-transformation (équipements pour légumes, fruits, karité, manioc et cacao).<br><br>
                            Cette initiative vise à renforcer la compétitivité, la qualité des produits et la relance des
                            entreprises en difficulté.
                        </p>
                    </div>
                </div>

                <!-- Card 3: Assistance technique -->
                <div class="col-12" data-aos="fade-up" data-aos-delay="600">
                    <div class="card-premium h-100 overflow-hidden shadow-sm p-4"
                        style="background: white; border-radius: 12px; border: 1px solid rgba(0,0,0,0.05);">
                        <div class="d-flex align-items-center mb-3">
                            <div class="m-icon me-3" style="color: #009B3A; font-size: 1.5rem;"><i
                                    class="fas fa-industry"></i></div>
                            <h3 class="m-0" style="color: black; font-weight: 700; line-height: 1.3;">Assistance technique
                                aux entreprises industrielles</h3>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-md-12">
                                <div class="bg-secondary rounded"
                                    style="height: 300px; display: flex; align-items: center; justify-content: center; color: white;">
                                    <img src="{{ asset('assets/img/fremin8.jpeg') }}"
                                        style="width: 100%; height: 100%; object-fit: cover;" alt="Assistance Technique">
                                </div>
                            </div>
                        </div>

                        <p class="text-muted"
                            style="font-size: 1.15rem; line-height: 1.6; text-align: justify; hyphens: auto; -webkit-hyphens: auto; -moz-hyphens: auto;">
                            Le Programme National de Restructuration et de Mise à Niveau (PNRMN) des entreprises
                            industrielles vise à préparer les entreprises manufacturières ivoiriennes à faire face à une
                            concurrence accrue, dans le contexte de la libéralisation des échanges induite par les accords
                            multilatéraux de libre-échange.<br><br>
                            Le PNRMN s’articule autour de trois (03) composantes principales :<br>
                            (i) l’appui direct aux entreprises ;<br>
                            (ii) le renforcement de l’environnement de la qualité et des infrastructures existantes ;<br>
                            (iii) la création de trois (03) Centres d’Appui à la Compétitivité et au Développement
                            Industriel (CACDI).<br><br>
                            Le Programme est exécuté sous la tutelle technique du Ministère en charge de l’Industrie. En ce
                            qui concerne la composante relative à l’appui direct aux entreprises, l’Agence pour le
                            Développement et la Compétitivité des Industries de Côte d’Ivoire (ADCI) mandatée par le FREMIN
                            se charge de la sélection et de l’accompagnement des entreprises devant bénéficier d’un
                            appui.<br><br>
                            Le FREMIN a accompagné jusqu’à ce jour 15 entreprises dans le cadre du PNRMN.
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