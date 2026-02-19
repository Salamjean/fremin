@extends('home.layouts.template')
@section('content')

    <!-- Modern Hero -->
    <div class="contact-header-v2">
        <div class="container text-center py-5">
            <h1 class="text-white display-2 mb-3 fw-black animate__animated animate__zoomIn"
                style="font-weight: 900; font-size: 45px; letter-spacing: -1px;">
                {{ $hero->main_title ?? 'PRÉSENTATION DU FREMIN' }}
            </h1>
            <div class="mx-auto bg-white mb-4" style="height: 4px; width: 80px;"></div>
            <p class="text-white lead animate__animated animate__fadeInUp fw-medium">
                {{ $hero->subtitle ?? 'Le moteur de la restructuration et de la modernisation industrielle en Côte d\'Ivoire.' }}
            </p>
        </div>
    </div>

    <!-- Section: Cadre Juridique et Vision -->
    <section id="institutional-base" class="institutional-base section">
        <div class="container" data-aos="fade-up">
            <div class="row gy-5 align-items-center">
                <div class="col-lg-12">
                    <div class="content-box-premium">
                        <h2 class="mb-4">Cadre institutionnel</h2>
                        <div class="lead-text">
                            {!! 'Le Fonds de Restructuration et de Mise à Niveau des Entreprises Industrielles (FREMIN) a été créé par le décret n° 2014-781 du 11 décembre 2014. <br>  Le FREMIN est un instrument stratégique de l\'État Ivoirien dédié à la compétitivité industrielle. Il est Créé dans le cadre du Programme National de Restructuration et de Mise à Niveau (PNRMN). Il vise à renforcer la compétitivité et la transformation des industries ivoiriennes afin de stimuler la croissance, l’emploi et l’accès aux marchés internationaux' !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Bar -->
    <section class="pres-stats-bar">
        <div class="container">
            <!-- <div class="row g-4 justify-content-center">
                                    @foreach($stats as $stat)
                                        <div class="col-md-3">
                                            <div class="stat-v2">
                                                <span class="number">
                                                    <span class="counter"
                                                        data-target="{{ preg_replace('/[^0-9]/', '', $stat->value) }}">0</span>{{ preg_replace('/[0-9]/', '', $stat->value) }}
                                                </span>
                                                <span class="label">{{ $stat->label }}</span>
                                            </div>
                                        </div>
                                    @endforeach -->
        </div>
        </div>
    </section>

    <!-- Section: Missions -->
    <section id="missions-detailed" class="missions-detailed section bg-light">
        <div class="container section-title" data-aos="fade-up">
            <h2>{{ __('missions_title') }}</h2>
            <p>{{ __('missions_intro') }}</p>
        </div>

        <div class="container">
            <div class="row g-4">
                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="1000">
                    <div class="mission-item-card last">
                        <p><span class="text-success">✓</span> Le financement de l’accompagnement des entreprises à travers
                            des appuis directs et des primes</p>
                        <p><span class="text-success">✓</span> Les garanties à octroyer aux banques pour faciliter l’accès
                            des entreprises au financement de leurs investissements matériels destinés à la rénovation et la
                            modernisation de leur outil de production, à l’extension de leurs infrastructures de production,
                            et de leurs activités, dans des secteurs jugés prioritaires au regard de la politique
                            industrielle nationale</p>
                        <p><span class="text-success">✓</span> Les appuis financiers aux laboratoires techniques locaux
                            ainsi qu’aux structures d’accréditation et de normalisation pour le renforcement de leurs
                            capacités</p>
                        <p><span class="text-success">✓</span> Le financement des centres d’appui à la compétitivité et au
                            développement industriel</p>
                        <p><span class="text-success">✓</span> Toute autre intervention qui contribue à l’atteinte des
                            objectifs du Gouvernement en matière de compétitivité des entreprises industrielles
                            manufacturières</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Axes Stratégiques -->
    <section id="strategic-axes" class="strategic-axes section bg-white">
        <div class="container section-title" data-aos="fade-up">
            <h2>{{ __('strategic_axes_title') }}</h2>
            <p>Nos piliers pour le développement industriel ivoirien</p>
        </div>

        <div class="container">
            <div class="row g-0 axis-wrapper shadow-lg overflow-hidden rounded-4">
                <div class="col-lg-4">
                    <div class="axis-card"
                        style="background-image: linear-gradient(rgba(0,155,58,0.85), rgba(0,155,58,0.85)), url('{{ asset('assets/img/service-modernisation.png') }}');">
                        <div class="axis-content">
                            <span class="axis-num">01</span>
                            <h4 class="text-white">Soutenir la restructuration et la mise à niveau des entreprises
                                industrielles</h4>
                            <!-- <i class="fas fa-industry"></i> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="axis-card"
                        style="background-image: linear-gradient(rgba(255,130,0,0.85), rgba(255,130,0,0.85)), url('{{ asset('assets/img/service-certification.png') }}');">
                        <div class="axis-content">
                            <span class="axis-num">02</span>
                            <h4 class="text-white">Améliorer les infrastructures et la qualité</h4>
                            <!-- <i class="fas fa-check-circle"></i> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="axis-card"
                        style="background-image: linear-gradient(rgba(17,17,17,0.85), rgba(17,17,17,0.85)), url('{{ asset('assets/img/service-capacites.png') }}');">
                        <div class="axis-content">
                            <span class="axis-num">03</span>
                            <h4 class="text-white">Créer des Centres d’Appui à la compétitivité et au développement
                                industriel</h4>
                            <!-- <i class="fas fa-building"></i> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Historique et Valeurs -->
    <section id="history-values" class="history-values section bg-light">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="history-box">
                        <h2 class="mb-4">{{ __('history_title') }}</h2>
                        <div class="history-content card-premium p-4">
                            <p>Le FREMIN, moteur du développement industriel ivoirien, finance et accompagne le PNRMN pour
                                renforcer la compétitivité, moderniser les entreprises et stimuler la création d’emplois.</p>

                            <div class="collapse" id="historyCollapse">
                                <p>Avec l’appui de l’ADCI et du Projet PARCSI de la BAD, il catalyse la transformation
                                    structurelle de l’économie, favorise l’innovation industrielle et élève la qualité des
                                    productions nationales.</p>

                                <ul class="list-unstyled mt-3">
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Création et mise en place
                                        des structures</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Lancement des premiers
                                        programmes</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Expansion et partenariats
                                        stratégiques</li>
                                </ul>
                            </div>

                            <a href="javascript:void(0)" class="btn-read-more mt-2" data-bs-toggle="collapse"
                                data-bs-target="#historyCollapse" aria-expanded="false" aria-controls="historyCollapse"
                                id="historyToggleBtn">
                                Voir plus <i class="fas fa-chevron-down ms-1"></i>
                            </a>
                        </div>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const btn = document.getElementById('historyToggleBtn');
                                const collapseElement = document.getElementById('historyCollapse');

                                if (collapseElement && btn) {
                                    collapseElement.addEventListener('shown.bs.collapse', function() {
                                        btn.innerHTML = 'Voir moins <i class="fas fa-chevron-up ms-1"></i>';
                                    });

                                    collapseElement.addEventListener('hidden.bs.collapse', function() {
                                        btn.innerHTML = 'Voir plus <i class="fas fa-chevron-down ms-1"></i>';
                                    });
                                }
                            });
                        </script>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left">
                    <div class="values-box">
                        <h3 class=" mb-4">Nos Valeurs</h3>
                        @foreach($values as $val)
                            <div class="value-item shadow-sm bg-white p-3 rounded-3 mb-3">
                                <div class="value-icon"><i class="{{ $val->icon }} text-success"></i></div>
                                <div>
                                    <h5 class="fw-bold mb-1">{{ $val->title }}</h5>
                                    <p class="mb-0 opacity-75 small">{{ $val->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Gouvernance (Comité de Gestion & Cellule Technique) -->
    <section id="governance" class="governance section bg-light">
        <div class="container">
            <div class="row gy-5">
                <!-- Comité de Gestion -->
                <h2>Gouvernance</h2>
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="governance-box">
                        <h2 class="mb-4">Comité de Gestion</h2>
                        <div class="card-premium p-4">
                            <p class="mb-3">Le FREMIN est administré par un Comité de Gestion composé comme suit :</p>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> un représentant du
                                    Ministre chargé de l'Industrie; (Présidence)</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> un représentant du
                                    Ministre chargé de l'Economie et des Finances;</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> un représentant du
                                    Ministre chargé du Budget;</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> un représentant du
                                    Ministre chargé des Petites et Moyennes Entreprises;</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> le Directeur Général
                                    de la BNI.</li>
                            </ul>

                            <h5 class="fw-bold mt-4 mb-2">Rôle</h5>
                            <p>Le Comité de Gestion suit l'exécution des opérations du FREMIN et établit des rapports
                                trimestriels et un rapport annuel de fin d'exercice, au plus tard le 31 mars de l'année
                                suivante.</p>

                            <div class="mt-4 text-end">
                                <a href="{{ route('home.comite-gestion') }}"
                                    class="btn btn-sm btn-outline-success rounded-pill px-4">
                                    En savoir plus <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cellule Technique -->
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="governance-box">
                        <h2 class="mb-4">Cellule Technique</h2>
                        <div class="card-premium p-4">
                            <p class="mb-3">Le Comité de Gestion est assisté par une Cellule Technique composée comme suit :
                            </p>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check-circle text-orange me-2"></i> un représentant du
                                    Ministre chargé de l'Industrie; (Présidence)</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-orange me-2"></i> un représentant du
                                    Ministre chargé de l'Economie et des Finances;</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-orange me-2"></i> un représentant du
                                    Ministre chargé du Budget;</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-orange me-2"></i> un représentant de la
                                    BNI.</li>
                            </ul>

                            <h5 class="fw-bold mt-4 mb-2">Rôle</h5>
                            <p>La Cellule Technique est chargée d'instruire et d'analyser les dossiers de demande d'appuis
                                transmis au Comité de Gestion. Elle assure le suivi de la mise en œuvre des décisions prises
                                par le Comité de Gestion.</p>

                            <div class="mt-4 text-end">
                                <a href="{{ route('home.comite-gestion') }}"
                                    class="btn btn-sm btn-outline-warning rounded-pill px-4 text-dark">
                                    En savoir plus <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tutelles -->
            <div class="row mt-5" data-aos="fade-up">
                <div class="col-12">
                    <div
                        class="tutelles-box text-center card-premium p-5 bg-white shadow-sm border-top border-4 border-success">
                        <h2 class="mb-3">Tutelles</h2>
                        <p class="lead mb-0">Le FREMIN est placé sous la tutelle technique du Ministre chargé de l'Industrie
                            et sous la tutelle financière du Ministre chargé de l'Economie et des Finances, en liaison avec
                            le Ministre chargé du Budget.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Counter Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const counters = document.querySelectorAll('.counter');
            const speed = 200;

            const startCounters = (elements) => {
                elements.forEach(counter => {
                    const updateCount = () => {
                        const target = +counter.getAttribute('data-target');
                        const count = +counter.innerText;
                        const inc = target / speed;
                        if (count < target) {
                            counter.innerText = Math.ceil(count + inc);
                            setTimeout(updateCount, 15);
                        } else {
                            counter.innerText = target;
                        }
                    };
                    updateCount();
                });
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const sectionCounters = entry.target.querySelectorAll('.counter');
                        startCounters(sectionCounters);
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.3 });

            const statsSection = document.querySelector('.pres-stats-bar');
            if (statsSection) {
                observer.observe(statsSection);
            }
        });
    </script>

@endsection