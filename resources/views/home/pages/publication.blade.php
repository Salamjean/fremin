@extends('home.layouts.template')
@section('content')

    <!-- Cinematic Hero -->
    <div class="contact-header-v2">
        <div class="container text-center py-5">
            <h1 class="text-white display-2 mb-3 fw-black animate__animated animate__zoomIn"
                style="font-weight: 900; font-size: 45px; letter-spacing: -1px;">PUBLICATIONS & RESSOURCES</h1>
            <div class="mx-auto bg-white mb-4" style="height: 4px; width: 80px;"></div>
            <p class="text-white lead animate__animated animate__fadeInUp fw-medium">Documentation officielle, études
                sectorielles et ressources stratégiques pour l'industrie.</p>
        </div>
    </div>

    <!-- Categories Section -->
    <section class="py-5 bg-white">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <a href="#rapports" class="pub-cat-card-v2 shadow-sm">
                        <div class="pub-cat-icon-v2"><i class="fas fa-file-invoice"></i></div>
                        <h5 class="fw-bold mb-2">Rapports Annuels</h5>
                        <p class="small text-muted mb-0">Bilans et activités institutionnelles du FREMIN.</p>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <a href="#etudes" class="pub-cat-card-v2 shadow-sm">
                        <div class="pub-cat-icon-v2"><i class="fas fa-microscope"></i></div>
                        <h5 class="fw-bold mb-2">Études Sectorielles</h5>
                        <p class="small text-muted mb-0">Analyses approfondies du tissu industriel national.</p>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <a href="#guides" class="pub-cat-card-v2 shadow-sm">
                        <div class="pub-cat-icon-v2"><i class="fas fa-book-open"></i></div>
                        <h5 class="fw-bold mb-2">Guides Pratiques</h5>
                        <p class="small text-muted mb-0">Accompagnement dans vos processus de mise à niveau.</p>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <a href="#autres" class="pub-cat-card-v2 shadow-sm">
                        <div class="pub-cat-icon-v2"><i class="fas fa-folder-plus"></i></div>
                        <h5 class="fw-bold mb-2">Autres Ressources</h5>
                        <p class="small text-muted mb-0">Textes réglementaires et formulaires divers.</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Documents Section -->
    <section class="py-5 bg-light">
        <div class="container py-5">

            <!-- Rapports Section -->
            <div id="rapports" class="mb-5 pt-4">
                <div class="d-flex align-items-center gap-3 mb-4" data-aos="fade-right">
                    <div style="width: 10px; height: 35px; background: #009B3A;"></div>
                    <h3 class="fw-bold mb-0">Rapports d'Activités</h3>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up">
                        <div class="doc-card-v2">
                            <span class="doc-type-badge-v2">BIBLIOTHÈQUE</span>
                            <h4 class="doc-title-v2">Rapport Annuel de Performance 2025</h4>
                            <div class="doc-meta-v2">
                                <span><i class="far fa-calendar-alt me-1"></i> Déc 2025</span>
                                <span><i class="far fa-file-pdf me-1"></i> 4.5 MB</span>
                            </div>
                            <a href="#" class="btn-doc-download">TÉLÉCHARGER LE PDF <i class="fas fa-download"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="doc-card-v2">
                            <span class="doc-type-badge-v2">BILAN</span>
                            <h4 class="doc-title-v2">Synthèse du Plan Stratégique 2020-2025</h4>
                            <div class="doc-meta-v2">
                                <span><i class="far fa-calendar-alt me-1"></i> Jan 2026</span>
                                <span><i class="far fa-file-pdf me-1"></i> 2.1 MB</span>
                            </div>
                            <a href="#" class="btn-doc-download">TÉLÉCHARGER LE PDF <i class="fas fa-download"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Études Section -->
            <div id="etudes" class="mb-5 pt-4">
                <div class="d-flex align-items-center gap-3 mb-4" data-aos="fade-right">
                    <div style="width: 10px; height: 35px; background: #FF8200;"></div>
                    <h3 class="fw-bold mb-0">Études & Analyses</h3>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up">
                        <div class="doc-card-v2">
                            <span class="doc-type-badge-v2">RECHERCHE</span>
                            <h4 class="doc-title-v2">Cartographie de l'Industrie 4.0 en Côte d'Ivoire</h4>
                            <div class="doc-meta-v2">
                                <span><i class="far fa-calendar-alt me-1"></i> Nov 2025</span>
                                <span><i class="far fa-file-pdf me-1"></i> 8.2 MB</span>
                            </div>
                            <a href="#" class="btn-doc-download">TÉLÉCHARGER LE PDF <i class="fas fa-download"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="doc-card-v2">
                            <span class="doc-type-badge-v2">ANALYSE</span>
                            <h4 class="doc-title-v2">Impact de la Modernisation sur la Compétitivité</h4>
                            <div class="doc-meta-v2">
                                <span><i class="far fa-calendar-alt me-1"></i> Oct 2025</span>
                                <span><i class="far fa-file-pdf me-1"></i> 3.7 MB</span>
                            </div>
                            <a href="#" class="btn-doc-download">TÉLÉCHARGER LE PDF <i class="fas fa-download"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="doc-card-v2">
                            <span class="doc-type-badge-v2">ÉTUDE</span>
                            <h4 class="doc-title-v2">Baromètre de Satisfaction Industrielle 2025</h4>
                            <div class="doc-meta-v2">
                                <span><i class="far fa-calendar-alt me-1"></i> Sept 2025</span>
                                <span><i class="far fa-file-pdf me-1"></i> 1.5 MB</span>
                            </div>
                            <a href="#" class="btn-doc-download">TÉLÉCHARGER LE PDF <i class="fas fa-download"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Guides Section -->
            <div id="guides" class="pt-4">
                <div class="d-flex align-items-center gap-3 mb-4" data-aos="fade-right">
                    <div style="width: 10px; height: 35px; background: #009B3A;"></div>
                    <h3 class="fw-bold mb-0">Guides & Formulaires</h3>
                </div>
                <div class="row g-4">
                    <div class="col-lg-6" data-aos="fade-up">
                        <div class="doc-card-v2 d-flex flex-column h-100">
                            <span class="doc-type-badge-v2"
                                style="background: rgba(0, 155, 58, 0.1); color: #009B3A;">GUIDE</span>
                            <h4 class="doc-title-v2">Le Guide de l'Entreprise en Mise à Niveau</h4>
                            <p class="small text-muted mb-4">Un manuel complet détaillant chaque phase du processus
                                d'accompagnement du FREMIN, de l'audit à la certification.</p>
                            <a href="#" class="btn-doc-download mt-auto">TÉLÉCHARGER LE GUIDE COMPLET <i
                                    class="fas fa-download"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="doc-card-v2 d-flex flex-column h-100">
                            <span class="doc-type-badge-v2"
                                style="background: rgba(0, 155, 58, 0.1); color: #009B3A;">DESSIN</span>
                            <h4 class="doc-title-v2">Kit de Communication pour les Entreprises Lauréates</h4>
                            <p class="small text-muted mb-4">Pack comprenant les logos officiels et les directives
                                graphiques pour la visibilité des projets financés par le fonds.</p>
                            <a href="#" class="btn-doc-download mt-auto">TÉLÉCHARGER LE KIT (ZIP) <i
                                    class="fas fa-download"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Global CTA -->
    <!-- <section class="newsletter-v2 bg-primary">
        <div class="container text-center text-white py-4">
            <h2 class="fw-bold mb-3">Besoin d'un document spécifique ?</h2>
            <p class="lead mb-4">Si vous ne trouvez pas la ressource recherchée, n'hésitez pas à solliciter notre service
                documentation.</p>
            <a href="{{ route('home.contact') }}" class="btn btn-news-subscribe px-5">CONTACTER LE SERVICE</a>
        </div>
    </section> -->

@endsection