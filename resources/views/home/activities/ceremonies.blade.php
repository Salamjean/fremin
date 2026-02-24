@extends('home.layouts.template')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section institutional-base" style="background: #f8f9fa; padding: 100px 0 60px;">
        <div class="container text-center" data-aos="fade-up">
            <h1 class="refined-title" style="color: #1a1a1a; font-weight: 800;">Cérémonies & Ateliers</h1>
            <p class="lead-text" style="max-width: 800px; margin: 20px auto;">Retrouvez ici les cérémonies officielles et
                les ateliers techniques organisés par le FREMIN.</p>
            <div class="tricolor-line shadow-sm mx-auto"
                style="width: 100px; height: 4px; background: linear-gradient(to right, #FF8200 33.33%, #fff 33.33%, #fff 66.66%, #009B3A 66.66%);">
            </div>
        </div>
    </section>

    <section class="activities-tabs py-5">
        <div class="container">

            <!-- Tabs Navigation -->
            <ul class="nav nav-pills justify-content-center mb-5" id="activityTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $activeTab == 'ceremonies' ? 'active' : '' }}" id="ceremonies-tab"
                        data-bs-toggle="pill" data-bs-target="#ceremonies-content" type="button" role="tab"
                        aria-controls="ceremonies-content"
                        aria-selected="{{ $activeTab == 'ceremonies' ? 'true' : 'false' }}"
                        style="border-radius: 30px; padding: 10px 30px; font-weight: 700;">
                        Cérémonies
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $activeTab == 'ateliers' ? 'active' : '' }}" id="ateliers-tab"
                        data-bs-toggle="pill" data-bs-target="#ateliers-content" type="button" role="tab"
                        aria-controls="ateliers-content" aria-selected="{{ $activeTab == 'ateliers' ? 'true' : 'false' }}"
                        style="border-radius: 30px; padding: 10px 30px; font-weight: 700;">
                        Ateliers
                    </button>
                </li>
            </ul>

            <!-- Tabs Content -->
            <div class="tab-content" id="activityTabsContent">

                <!-- Cérémonies Tab -->
                <div class="tab-pane fade {{ $activeTab == 'ceremonies' ? 'show active' : '' }}" id="ceremonies-content"
                    role="tabpanel" aria-labelledby="ceremonies-tab">
                    <div class="row g-4">

                        <!-- C2.1 -->
                        <div class="col-12" data-aos="fade-up">
                            <div class="card-premium h-100 overflow-hidden shadow-sm p-4">
                                <h3 class="mb-3" style="color: #009B3A; font-weight: 700;">Cérémonie d’inauguration et la
                                    pose de la première pierre de la construction de la seconde phase du Centre des
                                    Expositions des
                                    Produits de la Petite Transformation et de l’Artisanat (CEPPTA)</h3>
                                <div class="row g-2 mb-3">
                                    <!-- Placeholders for other images -->
                                    <div class="col-md-4">
                                        <div class="bg-secondary rounded"
                                            style="height: 300px; display: flex; align-items: center; justify-content: center; color: white;">
                                            <img src="{{ asset('assets/img/pierre.png') }}"
                                                style="width: 100%; height: 100%; object-fit: cover;" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="bg-secondary rounded"
                                            style="height: 300px; display: flex; align-items: center; justify-content: center; color: white;">
                                            <img src="{{ asset('assets/img/perssss.png') }}"
                                                style="width: 100%; height: 100%; object-fit: cover;" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="bg-secondary rounded"
                                            style="height: 300px; display: flex; align-items: center; justify-content: center; color: white;">
                                            <img src="{{ asset('assets/img/parllll.png') }}"
                                                style="width: 100%; height: 100%; object-fit: cover;" alt="">
                                        </div>
                                    </div>
                                </div>
                                <p class="text-muted">Le Ministère du Commerce, de l’Industrie et de l’Artisanat, à travers
                                    le FREMIN a réalisé la première phase du CEPPTA dans la zone industrielle de
                                    Yamoussoukro. Les travaux de construction de la première ont démarré en juillet 2024 et
                                    ont pris fin en octobre 2025, sous le suivi des services compétents du Ministère de la
                                    Construction ainsi que des organes de gestion du FREMIN.
                                    Ce centre constitue un outil stratégique destiné à valoriser les produits de la petite
                                    transformation et de l’artisanat ivoirien, en offrant un espace structuré de production,
                                    d’exposition, de commercialisation et d’accompagnement technique.
                                    Dans le cadre de l’opérationnalisation de la première phase du CEPPTA, le Ministère du
                                    Commerce, de l’Industrie et de l’Artisanat, à travers FREMIN a organisé la cérémonie
                                    officielle d’inauguration de la première phase du CEPPTA de Yamoussoukro, couplée à la
                                    pose de la première pierre de la construction de la seconde phase. Cette cérémonie
                                    d’inauguration, placée sous la présidence du Ministre Souleymane Diarrassouba, s’est
                                    tenue le jeudi 18 décembre 2025 à 11h00 au sein de la zone industrielle de Yamoussoukro.
                                </p>
                            </div>
                        </div>

                        <!-- C2.3 -->
                        <div class="col-12" data-aos="fade-up">
                            <div class="card-premium h-100 overflow-hidden shadow-sm p-4">
                                <h3 class="mb-3" style="color: #009B3A; font-weight: 700;">La cérémonie de distribution
                                    d’équipements de production au profit des acteurs de la petite agro-transformation</h3>
                                <div class="row g-2 mb-3">
                                    <!-- Placeholders for images -->
                                    <div class="col-md-6">
                                        <div class="bg-secondary rounded mb-2"
                                            style="height: 300px; display: flex; align-items: center; justify-content: center; color: white; text-align: center;">
                                            <img src="{{ asset('assets/img/frrrr.png') }}"
                                                style="width: 100%; height: 100%; object-fit: cover;" alt="">
                                        </div>
                                        <p class="text-center small text-muted">Remise symbolique des équipements de
                                            production aux bénéficiaires par Monsieur le Ministre</p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="bg-secondary rounded mb-2"
                                            style="height: 300px; display: flex; align-items: center; justify-content: center; color: white; text-align: center;">
                                            <img src="{{ asset('assets/img/geeee.png') }}"
                                                style="width: 100%; height: 100%; object-fit: cover;" alt="">
                                        </div>
                                        <p class="text-center small text-muted">Remise symbolique des équipements de
                                            production aux bénéficiaires par Monsieur le Ministre</p>
                                    </div>
                                    <div class="col-12">
                                        <div class="bg-secondary rounded mb-2"
                                            style="height: 300px; display: flex; align-items: center; justify-content: center; color: white; text-align: center;">
                                            <img src="{{ asset('assets/img/equuuuu.png') }}"
                                                style="width: 100%; height: 100%; object-fit: cover;" alt="">
                                        </div>
                                        <p class="text-center small text-muted">PDes équipements de production</p>
                                    </div>
                                </div>
                                <p class="text-muted">Dans le cadre d’un vaste programme d’appui aux acteurs transformateurs
                                    agroalimentaires qui vise à soutenir plus d’un millier de bénéficiaires à l’échelle
                                    nationale. Le Ministre Docteur Souleymane Diarassouba a présidé le jeudi 19 juin 2025,
                                    au Centre de Démonstration et de Promotion de Technologie (CDT) la première phase de la
                                    cérémonie de remise des équipements de production au profit de douze (12) acteurs dont
                                    onze (11) femmes de l’agro-transformation. Il a lancé un appel aux acteurs du secteur
                                    privé pour une forte implication pour des investissements massifs dans la chaîne de
                                    valeur des produits agricoles, afin de d’accroître substantiellement l’offre pour le bon
                                    approvisionnement de nos marchés et pour le bien-être des populations. Ces équipements
                                    de production sont composés entre de broyeurs, déshydrateurs, extracteurs de jus,
                                    torréfacteurs et de séchoirs.</p>
                            </div>
                        </div>

                        <!-- C2.6 (Second one in list - Ceremony) -->
                        <div class="col-12" data-aos="fade-up">
                            <div class="card-premium h-100 overflow-hidden shadow-sm p-4">
                                <h3 class="mb-3" style="color: #009B3A; font-weight: 700;">Cérémonie de la pose de la
                                    première pierre de la construction de la première phase du CEPPTA</h3>
                                <div class="row g-2 mb-3">
                                    <!-- Placeholders for images -->
                                    <div class="col-md-12">
                                        <div class="bg-secondary rounded"
                                            style="height: 500px; display: flex; align-items: center; justify-content: center; color: white;">
                                            <img src="{{ asset('assets/img/pierre.png') }}"
                                                style="width: 100%; height: 100%; object-fit: cover;" alt="">
                                        </div>
                                    </div>
                                </div>
                                <p class="text-muted">Ce centre permettra, d’une part, d’offrir un meilleur environnement de
                                    travail aux artisans industriels du pays, à travers la valorisation des produits locaux
                                    issus notamment de l’agro-transformation à petite échelle et d’autre part, d’améliorer
                                    le revenu des femmes et des jeunes dans l’optique de réduire la pauvreté
                                    La cérémonie de pose de première pierre pour la construction de ce Centre a été
                                    organisée le samedi 19 août 2023, à Yamoussoukro. Cette cérémonie a été présidée par
                                    Monsieur le Ministre chargé de l’Industrie.</p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Ateliers Tab -->
                <div class="tab-pane fade {{ $activeTab == 'ateliers' ? 'show active' : '' }}" id="ateliers-content"
                    role="tabpanel" aria-labelledby="ateliers-tab">
                    <div class="row g-4">

                        <!-- C2.2 -->
                        <div class="col-12" data-aos="fade-up">
                            <div class="card-premium h-100 overflow-hidden shadow-sm p-4">
                                <h3 class="mb-3" style="color: #009B3A; font-weight: 700;">Atelier de validation de l’étude
                                    stratégique pour le développement de la petite transformation</h3>
                                <div class="row g-2 mb-3">
                                    <!-- Placeholders for photos -->
                                    <div class="col-md-6">
                                        <div class="bg-secondary rounded"
                                            style="height: 300px; display: flex; align-items: center; justify-content: center; color: white;">
                                            <img src="{{ asset('assets/img/fremin5.jpeg') }}"
                                                style="width: 100%; height: 100%; object-fit: cover;" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="bg-secondary rounded"
                                            style="height: 300px; display: flex; align-items: center; justify-content: center; color: white;">
                                            <img src="{{ asset('assets/img/fremin8.jpeg') }}"
                                                style="width: 100%; height: 100%; object-fit: cover;" alt="">
                                        </div>
                                    </div>
                                </div>
                                <p class="text-muted">Dans le cadre du renforcement de la contribution du secteur de la
                                    petite transformation dans l'économie et à accroître le niveau de transformation de nos
                                    matières locales, le Ministère du Commerce, de l’Industrie et de l’Artisanat a fait
                                    réaliser l’étude stratégique pour le développement de la petite transformation. Le
                                    Ministère du Commerce et de l’Industrie, à travers FREMIN a organisé via le FREMIN
                                    l’ouverture de l’atelier de validation du rapport provisoire de l'étude stratégique pour
                                    le développement de la petite transformation. L’atelier s’est tenu le jeudi 10 juillet
                                    2025 à AZALAÏ HOTEL, sis à Marcory. Cette rencontre a réuni les différents Ministères et
                                    les acteurs de l’Organisation des Nations Unies pour le développement industriel.
                                    L’ouverture de l’atelier a été présidé par le Ministre Docteur Souleymane Diarassouba.
                                    Il a présenté le secteur industriel et il a ensuite appelé tous les partenaires
                                    financiers et techniques à soutenir le développement de la petite industrie afin de
                                    surmonter les défis et de libérer son potentiel pour la création d’emplois.</p>
                            </div>
                        </div>

                        <!-- C2.4 -->
                        <div class="col-12" data-aos="fade-up">
                            <div class="card-premium h-100 overflow-hidden shadow-sm p-4">
                                <h3 class="mb-3" style="color: #009B3A; font-weight: 700;">Atelier de validation du rapport
                                    d’actualisation du PNRMN</h3>
                                <div class="row g-2 mb-3">
                                    <!-- Placeholders for images -->
                                    <div class="col-md-12">
                                        <div class="bg-secondary rounded"
                                            style="height: 500px; display: flex; align-items: center; justify-content: center; color: white;">
                                            <img src="{{ asset('assets/img/ooooo.png') }}"
                                                style="width: 100%; height: 100%; object-fit: cover;" alt="">
                                        </div>
                                    </div>
                                </div>
                                <p class="text-muted">Le Ministère en charge de l’Industrie via le FREMIN a organisé le
                                    jeudi 7 mars 2024, à Seen Hôtel d’Abidjan Plateau, l’atelier de validation du rapport
                                    final relatif à l’actualisation du PNRMN en vue de l’adapter aux objectifs du
                                    développement assigné par le Gouvernement dans le cadre du Plan National du
                                    Développement (PND 2021-2025). Cette cérémonie a été présidé par Monsieur Olivier Daipo,
                                    Directeur adjoint du cabinet représentant le Ministre chargé de l’Industrie en présence
                                    des différents partenaires techniques et financiers dont M. Tidiane Boye, représentant
                                    ONUDI Côte d'Ivoire. Monsieur Olivier Daipo a félicité les différents partenaires
                                    engagés dans les différentes réformes structurelles qui ont permis à la Côte d'Ivoire
                                    d'atteindre une valeur ajoutée dans le secteur industriel avec plus de 6 000 entreprises
                                    industrielles encadrées. Malgré les résultats incitatifs de 2014 à 2023, il nous fallait
                                    réfléchir en vue de mettre en place d'autres mécanismes pour mieux accompagner nos
                                    entreprises et renforcer la confiance des différents partenaires.</p>
                            </div>
                        </div>

                        <!-- C2.5 (First one) -->
                        <div class="col-12" data-aos="fade-up">
                            <div class="card-premium h-100 overflow-hidden shadow-sm p-4">
                                <h3 class="mb-3" style="color: #009B3A; font-weight: 700;">Atelier de finalisation des
                                    projets de communication en conseil des ministres relatifs aux stratégies de
                                    développement de cinq (5) clusters industriels prioritaires</h3>
                                <div class="row g-2 mb-3">
                                    <!-- Placeholders for images -->
                                    <div class="col-md-12">
                                        <div class="bg-secondary rounded"
                                            style="height: 300px; display: flex; align-items: center; justify-content: center; color: white;">
                                            <img src="{{ asset('assets/img/elllaa.png') }}"
                                                style="width: 100%; height: 100%; object-fit: cover;" alt="">
                                        </div>
                                    </div>
                                </div>
                                <p class="text-muted">L’élaboration de cinq (05) projets de Communication en Conseil des
                                    Ministres (CCM) relatifs aux stratégies de développement de cinq (05) clusters.
                                    La stratégie proposée vise à faire de la Côte d’Ivoire un hub attractif en ce qui
                                    concerne ces cinq (05) clusters industriels, avec des entreprises compétitives, capables
                                    de satisfaire le marché local et sous-régional.
                                    Le Ministère en charge de l’Industrie à travers le FREMIN a organisé l’atelier de
                                    finalisation des cinq (05) projets de CCM relatifs aux stratégies de développement de
                                    cinq (5) clusters industriels prioritaires le lundi 22 au mercredi 24 juillet 2024, à la
                                    Salle de Conférences du Cabinet du Ministre du Commerce et de l’Industrie, au Plateau,
                                    18ème étage de l’Immeuble Postel 2001.</p>
                            </div>
                        </div>

                        <!-- C2.5 (Second one) -->
                        <div class="col-12" data-aos="fade-up">
                            <div class="card-premium h-100 overflow-hidden shadow-sm p-4">
                                <h3 class="mb-3" style="color: #009B3A; font-weight: 700;">Ateliers de lancement des études
                                    stratégique pour le développement de cinq (05) clusters</h3>
                                <div class="ratio ratio-16x9 mb-3 rounded overflow-hidden">
                                    <iframe src="https://www.youtube.com/embed/GbSaUTFXIfQ" title="YouTube video"
                                        allowfullscreen class="w-100 h-100 border-0">
                                    </iframe>
                                </div>

                                <p class="text-muted">La tendance des économies modernes axées davantage sur la
                                    connaissance, l’innovation et l’industrie interpelle sur les modèles organisationnels
                                    qui s’adaptent à la concurrence ». Cette vision, le gouvernement ivoirien entend la
                                    traduire en acte en optant pour une approche de développement des clusters industriels.
                                    Pour y arriver, le Ministère en charge de l’Industrie, Docteur Souleymane Diarrassouba,
                                    a procédé, le jeudi 30 mars 2023, à Abidjan-Plateau, au lancement des études
                                    stratégiques de développement de cinq (5) clusters industriels en Côte d’Ivoire.
                                    Leur réalisation, selon le Ministre chargé de l’Industrie favorisera non seulement
                                    l’amélioration de la productivité et l’innovation, mais également l’autonomisation des
                                    jeunes et des femmes par un meilleur accès à l’emploi.</p>
                            </div>
                        </div>

                        <!-- C2.6 (First one) -->
                        <div class="col-12" data-aos="fade-up">
                            <div class="card-premium h-100 overflow-hidden shadow-sm p-4">
                                <h3 class="mb-3" style="color: #009B3A; font-weight: 700;">Atelier de validation des
                                    rapports et des plans d’actions des stratégies de développement de cinq (05) clusters
                                    industriels.</h3>
                                <!-- <div class="row g-2 mb-3"> -->
                                    <!-- Placeholders for images -->
                                    <!-- <div class="col-md-12">
                                        <div class="bg-secondary rounded"
                                            style="height: 200px; display: flex; align-items: center; justify-content: center; color: white;">
                                           <img src="{{ asset('assets/img/ooooo.png') }}" style="width: 100%; height: 100%; object-fit: cover;" alt=""></div>
                                    </div> -->
                                <!-- </div> -->
                                <p class="text-muted">Dans le cadre du développement des cinq (05) clusters, le Ministère en
                                    charge de l’Industrie a organisé à travers le FREMIN la cérémonie de lancement de ces
                                    études le jeudi 30 mars 2023 au Pullman Hôtel sous la présidence de Monsieur le Ministre
                                    en charge de l’Industrie. Le Ministère en charge de l’Industrie a par ailleurs entrepris
                                    des actions visant à élaborer des stratégies qui seront soumises au Gouvernement en vue
                                    de leur mise en œuvre. Ces stratégies qui seront assorties de plan d’actions,
                                    permettront au Ministère en charge de l’Industrie de disposer d’une feuille de route
                                    cohérente en vue d’organiser et de déployer son action pour accompagner plus
                                    efficacement le développement de ces clusters.
                                    Le Ministère en charge de l’Industrie a organisé du 14 au 16 décembre 2023 à
                                    Grand-Bassam l’atelier de validation des rapports et des plans d’actions des stratégies
                                    de développement de cinq (05) clusters industriels. Le Ministre Docteure Souleymane
                                    Diarassouba a par ailleurs invité toutes les parties prenantes de cet atelier à passer
                                    en revue avec la facilitation des experts des différents Cabinets d’études les
                                    stratégies et l’ensembles des mesures proposées dans les plans d’actions en vue de leur
                                    validation.</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <style>
        .nav-pills .nav-link {
            color: #1a1a1a;
            background-color: #f8f9fa;
            margin: 0 10px;
            transition: all 0.3s ease;
        }

        .nav-pills .nav-link.active {
            background-color: #009B3A;
            color: white;
            box-shadow: 0 4px 10px rgba(0, 155, 58, 0.3);
        }

        .nav-pills .nav-link:hover:not(.active) {
            background-color: #e9ecef;
        }
    </style>

@endsection