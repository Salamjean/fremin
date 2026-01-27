@extends('home.layouts.template')
@section('content')

    <!-- Cinematic Hero -->
    <div class="contact-header-v2">
        <div class="container text-center py-5">
            <h1 class="text-white display-2 mb-3 fw-black animate__animated animate__zoomIn"
                style="font-weight: 900; font-size: 45px; letter-spacing: -1px;">NOS PROGRAMMES</h1>
            <div class="mx-auto bg-white mb-4" style="height: 4px; width: 80px;"></div>
            <p class="text-white lead animate__animated animate__fadeInUp fw-medium">Des solutions stratégiques pour la
                compétitivité et la croissance de l'industrie Ivoirienne.</p>
        </div>
    </div>

    <!-- Featured Programs -->
    <section class="py-5 bg-white">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold">Programmes d'Accompagnement</h2>
                <div class="mx-auto mt-3" style="height: 3px; width: 60px; background: #FF8200;"></div>
            </div>

            <div class="row g-4">
                <!-- Program 1 -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="prog-card-v2">
                        <div class="prog-icon-v2"><i class="fas fa-industry"></i></div>
                        <h4 class="fw-bold mb-3">Mise à Niveau Globale</h4>
                        <p class="text-muted mb-4">Un accompagnement complet (technique, financier et humain) pour aligner
                            votre entreprise sur les standards internationaux.</p>
                        <a href="#" class="news-link-premium mt-auto">DÉCOUVRIR LE PROGRAMME <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <!-- Program 2 -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="prog-card-v2">
                        <div class="prog-icon-v2"><i class="fas fa-microchip"></i></div>
                        <h4 class="fw-bold mb-3">Industrie 4.0</h4>
                        <p class="text-muted mb-4">Soutien à la transformation numérique, à l'automatisation et à
                            l'intégration des technologies intelligentes en usine.</p>
                        <a href="#" class="news-link-premium mt-auto">DÉCOUVRIR LE PROGRAMME <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <!-- Program 3 -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="prog-card-v2">
                        <div class="prog-icon-v2"><i class="fas fa-leaf"></i></div>
                        <h4 class="fw-bold mb-3">Développement Durable</h4>
                        <p class="text-muted mb-4">Promotion de l'efficacité énergétique et des processus de production
                            respectueux de l'environnement.</p>
                        <a href="#" class="news-link-premium mt-auto">DÉCOUVRIR LE PROGRAMME <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Application Process -->
    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <h2 class="fw-bold mb-4">Comment Postuler ?</h2>
                    <p class="text-muted mb-5">Un processus simplifié et transparent pour permettre à chaque entreprise de
                        bénéficier de notre expertise.</p>

                    <div class="process-step-v2">
                        <div class="step-num-v2">01</div>
                        <h5 class="fw-bold mb-2">Inscription en ligne</h5>
                        <p class="text-muted small">Créez votre compte sur notre portail dédié et renseignez les
                            informations de base de votre structure.</p>
                    </div>

                    <div class="process-step-v2">
                        <div class="step-num-v2">02</div>
                        <h5 class="fw-bold mb-2">Dépôt du dossier</h5>
                        <p class="text-muted small">Soumettez l'ensemble des pièces justificatives (fiscales, comptables et
                            techniques) requises par le programme.</p>
                    </div>

                    <div class="process-step-v2">
                        <div class="step-num-v2">03</div>
                        <h5 class="fw-bold mb-2">Audit & Diagnostic</h5>
                        <p class="text-muted small">Nos experts réalisent une analyse approfondie de votre outil de
                            production pour définir un plan de mise à niveau.</p>
                    </div>

                    <div class="process-step-v2">
                        <div class="step-num-v2">04</div>
                        <h5 class="fw-bold mb-2">Validation & Déploiement</h5>
                        <p class="text-muted small">Après validation par le comité, nous lançons l'exécution des actions
                            d'accompagnement prévues.</p>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left">
                    <div class="bg-white p-5 shadow-sm border-top border-5 border-orange h-100">
                        <h3 class="fw-bold mb-4">Critères d'Éligibilité</h3>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="criteria-box-v2">
                                    <div class="criteria-header-v2"><i class="fas fa-building"></i>
                                        <h6 class="fw-bold mb-0">Secteur</h6>
                                    </div>
                                    <ul class="criteria-list-v2">
                                        <li class="check"><i class="fas fa-check"></i> Industrie de transformation</li>
                                        <li class="check"><i class="fas fa-check"></i> Agro-alimentaire</li>
                                        <li class="check"><i class="fas fa-check"></i> Chimie & Plasturgie</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="criteria-box-v2">
                                    <div class="criteria-header-v2"><i class="fas fa-chart-area"></i>
                                        <h6 class="fw-bold mb-0">Taille</h6>
                                    </div>
                                    <ul class="criteria-list-v2">
                                        <li class="check"><i class="fas fa-check"></i> PME / PMI Ivoirienne</li>
                                        <li class="check"><i class="fas fa-check"></i> Min. 2 ans d'existence</li>
                                        <li class="cross"><i class="fas fa-times"></i> Secteur tertiaire pur</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 p-4 bg-light border-start border-4 border-success">
                            <h6 class="fw-bold mb-2">Besoin d'aide pour votre dossier ?</h6>
                            <p class="small text-muted mb-3">Téléchargez notre guide complet pour préparer sereinement votre
                                candidature.</p>
                            <a href="#" class="btn btn-sm btn-getstarted w-100">TÉLÉCHARGER LE GUIDE PDF</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Support & FAQ -->
    <section class="py-5 bg-white">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <img src="{{ asset('assets/img/fremin4.jpeg') }}" alt="Support" class="img-fluid rounded shadow-lg">
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <h2 class="fw-bold mb-4">FAQ & Assistance</h2>
                    <div class="accordion" id="progFaq">
                        <div class="accordion-item border-0 mb-3 shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#q1">
                                    Quels sont les délais de sélection ?
                                </button>
                            </h2>
                            <div id="q1" class="accordion-collapse collapse" data-bs-parent="#progFaq">
                                <div class="accordion-body text-muted">
                                    Le processus complet, de l'audit initial à la validation finale, prend généralement
                                    entre 45 et 60 jours selon la complexité du dossier.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 mb-3 shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#q2">
                                    Le FREMIN finance-t-il directement ?
                                </button>
                            </h2>
                            <div id="q2" class="accordion-collapse collapse" data-bs-parent="#progFaq">
                                <div class="accordion-body text-muted">
                                    Le FREMIN agit comme un levier en facilitant l'accès au crédit et en prenant en charge
                                    une partie des coûts liés aux audits techniques et à la mise à niveau.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#q3">
                                    Quelles régions sont couvertes ?
                                </button>
                            </h2>
                            <div id="q3" class="accordion-collapse collapse" data-bs-parent="#progFaq">
                                <div class="accordion-body text-muted">
                                    Nos programmes couvrent l'ensemble du territoire de la République de Côte d'Ivoire. Nous
                                    avons des équipes capables d'intervenir dans toutes les zones industrielles.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Global CTA -->
    <!-- <section class="newsletter-v2 bg-primary">
        <div class="container text-center text-white p-5">
            <h2 class="fw-bold mb-3">Une question précise sur nos solutions ?</h2>
            <p class="lead mb-4">Nos conseillers sont disponibles pour vous guider vers le programme le plus adapté.</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('home.contact') }}" class="btn btn-news-subscribe px-5">NOUS CONTACTER</a>
                <a href="#" class="btn btn-outline-light px-5 fw-bold" style="border-width: 2px;">TÉLÉPHONER</a>
            </div>
        </div>
    </section> -->

@endsection