@extends('home.layouts.template')
@section('content')

    <!-- Cinematic Hero -->
    <div class="contact-header-v2">
        <div class="container text-center py-5">
            <h1 class="text-white display-2 mb-3 fw-black animate__animated animate__zoomIn"
                style="font-weight: 900; font-size: 45px; letter-spacing: -1px;">ACTUALITÉS & ÉVÉNEMENTS</h1>
            <div class="mx-auto bg-white mb-4" style="height: 4px; width: 80px;"></div>
            <p class="text-white lead animate__animated animate__fadeInUp fw-medium">Suivez les moments forts de l'industrie
                Ivoirienne et les actions du FREMIN.</p>
        </div>
    </div>

    <!-- Featured News -->
    <section class="py-5 bg-white">
        <div class="container py-5">
            <div class="row g-0 shadow-lg overflow-hidden border" data-aos="fade-up">
                <div class="col-lg-7">
                    <img src="{{ asset('assets/img/fremin8.jpeg') }}" alt="Featured News"
                        class="img-fluid h-100 object-fit-cover">
                </div>
                <div class="col-lg-5 bg-light p-5 d-flex flex-column justify-content-center">
                    <div class="contact-badge mb-3">À LA UNE</div>
                    <h2 class="fw-bold mb-4">Lancement du Programme National de Mise à Niveau 2026</h2>
                    <p class="text-muted mb-4">Un jalon historique pour l'industrie nationale. Le FREMIN déploie une
                        enveloppe stratégique pour accompagner 50 PME industrielles vers l'excellence régionale.</p>
                    <div class="mb-4 d-flex align-items-center gap-3">
                        <span class="text-success fw-bold"><i class="far fa-calendar-alt me-2"></i> 25 Jan 2026</span>
                        <span class="text-secondary">|</span>
                        <span class="text-secondary"><i class="far fa-user me-2"></i> Par Admin</span>
                    </div>
                    <a href="#" class="news-link-premium">LIRE L'ARTICLE COMPLET <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- News Grid -->
    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="d-flex justify-content-between align-items-end mb-5" data-aos="fade-up">
                <div>
                    <h2 class="fw-bold mb-0">Articles Récents</h2>
                    <div class="mt-2" style="height: 3px; width: 50px; background: #FF8200;"></div>
                </div>
                <div class="d-none d-md-block">
                    <ul class="nav nav-pills custom-pills">
                        <li class="nav-item"><a class="nav-link active" href="#">Tous</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Actualités</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Événements</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Rapports</a></li>
                    </ul>
                </div>
            </div>

            <div class="row g-4">
                <!-- Card 1 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="news-card-premium">
                        <div class="news-img-box">
                            <span class="news-date-tag">15 Jan</span>
                            <img src="{{ asset('assets/img/fremin3.jpeg') }}" alt="News">
                        </div>
                        <div class="news-body-premium">
                            <span class="news-category-v2">Industrialisation</span>
                            <h4 class="news-title-v2">Atelier sur la transformation numérique des usines</h4>
                            <p class="news-text-v2">Favoriser l'adoption de l'industrie 4.0 pour une meilleure efficacité
                                énergétique et opérationnelle...</p>
                            <a href="#" class="news-link-premium">EN SAVOIR PLUS <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="news-card-premium">
                        <div class="news-img-box">
                            <span class="news-date-tag">10 Jan</span>
                            <img src="{{ asset('assets/img/fremin4.jpeg') }}" alt="News">
                        </div>
                        <div class="news-body-premium">
                            <span class="news-category-v2">Événement</span>
                            <h4 class="news-title-v2">Forum des Partenaires Industriels 2026</h4>
                            <p class="news-text-v2">Le rendez-vous incontournable pour les acteurs du secteur privé et les
                                bailleurs de fond internationaux...</p>
                            <a href="#" class="news-link-premium">EN SAVOIR PLUS <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="news-card-premium">
                        <div class="news-img-box">
                            <span class="news-date-tag">05 Jan</span>
                            <img src="{{ asset('assets/img/fremin5.jpeg') }}" alt="News">
                        </div>
                        <div class="news-body-premium">
                            <span class="news-category-v2">Finance</span>
                            <h4 class="news-title-v2">Nouveaux mécanismes de garantie pour les PME</h4>
                            <p class="news-text-v2">Une solution innovante pour lever les barrières à l'accès au crédit pour
                                les entreprises industrielles...</p>
                            <a href="#" class="news-link-premium">EN SAVOIR PLUS <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="news-card-premium">
                        <div class="news-img-box">
                            <span class="news-date-tag">02 Jan</span>
                            <img src="{{ asset('assets/img/fremin2.jpeg') }}" alt="News">
                        </div>
                        <div class="news-body-premium">
                            <span class="news-category-v2">Qualité</span>
                            <h4 class="news-title-v2">Remise de certificats ISO à 12 lauréats</h4>
                            <p class="news-text-v2">Célébration du mérite et de la rigueur opérationnelle pour les
                                entreprises ayant achevé leur mise à niveau...</p>
                            <a href="#" class="news-link-premium">EN SAVOIR PLUS <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination dummy -->
            <div class="mt-5 pt-3 d-flex justify-content-center">
                <nav>
                    <ul class="pagination">
                        <li class="page-item disabled"><a class="page-link" href="#">Précédent</a></li>
                        <li class="page-item active"><a class="page-link" href="#"
                                style="background: #009B3A; border-color: #009B3A;">1</a></li>
                        <li class="page-item"><a class="page-link" href="#" style="color: #009B3A;">2</a></li>
                        <li class="page-item"><a class="page-link" href="#" style="color: #009B3A;">3</a></li>
                        <li class="page-item"><a class="page-link" href="#" style="color: #009B3A;">Suivant</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>

    <!-- Newsletter V2 -->
    <section class="newsletter-v2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <h2 class="fw-bold mb-3">Restez au cœur de l'industrie</h2>
                    <p class="lead mb-0 opacity-75">Inscrivez-vous à notre newsletter pour ne rien manquer des opportunités
                        et actualités du secteur.</p>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="newsletter-input-group mt-4 mt-lg-0">
                        <input type="email" class="form-control" placeholder="Votre adresse email">
                        <button class="btn btn-news-subscribe">S'ABONNER</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .custom-pills .nav-link {
            border-radius: 0;
            color: #666;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 13px;
            padding: 10px 25px;
        }

        .custom-pills .nav-link.active {
            background-color: #009B3A !important;
        }
    </style>

@endsection