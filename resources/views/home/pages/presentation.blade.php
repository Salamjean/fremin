@extends('home.layouts.template')
@section('content')

    <!-- Modern Hero -->
    <div class="contact-header-v2">
        <div class="container text-center py-5">
            <h1 class="text-white display-2 mb-3 fw-black animate__animated animate__zoomIn"
                style="font-weight: 900; font-size: 45px; letter-spacing: -1px;">PRÉSENTATION DU FREMIN</h1>
            <div class="mx-auto bg-white mb-4" style="height: 4px; width: 80px;"></div>
            <p class="text-white lead animate__animated animate__fadeInUp fw-medium">Le moteur de la restructuration et de
                la modernisation industrielle en Côte d'Ivoire.</p>
        </div>
    </div>

    <!-- About Section -->
    <section class="py-5 bg-white">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="pres-about-img">
                        <img src="{{ asset('assets/img/fremin9.jpeg') }}" alt="Siège FREMIN" class="img-fluid w-100">
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <h2 class="fw-bold mb-4" style="color: #009B3A;">Notre Histoire & Vision</h2>
                    <p class="lead text-muted mb-4">Le Fonds de Restructuration et de Mise à Niveau (FREMIN) est un
                        instrument stratégique de l'État Ivoirien dédié à la compétitivité industrielle.</p>
                    <p class="text-secondary mb-4">Créé pour répondre aux défis de la mondialisation, le FREMIN accompagne
                        les entreprises industrielles dans leurs processus de transformation technique, financière et
                        managériale. Notre objectif est de bâtir un tissu industriel robuste, capable de porter l'émergence
                        économique de notre nation.</p>
                    <div class="row g-4">
                        <div class="col-6">
                            <div class="border-start border-4 border-orange ps-3">
                                <h4 class="fw-bold mb-0">Expertise</h4>
                                <small class="text-muted">Accompagnement de pointe</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="border-start border-4 border-success ps-3">
                                <h4 class="fw-bold mb-0">Impact</h4>
                                <small class="text-muted">Résultats mesurables</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Bar -->
    <section class="pres-stats-bar">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-md-3">
                    <div class="stat-v2">
                        <span class="number"><span class="counter" data-target="25">0</span>+</span>
                        <span class="label">Années d'Expérience</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-v2">
                        <span class="number"><span class="counter" data-target="350">0</span>+</span>
                        <span class="label">Entreprises Assistées</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-v2">
                        <span class="number"><span class="counter" data-target="150">0</span>+</span>
                        <span class="label">Missions Réalisées</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-v2">
                        <span class="number"><span class="counter" data-target="98">0</span>%</span>
                        <span class="label">Taux de Satisfaction</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Missions & Values -->
    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold">Nos Missions Fondamentales</h2>
                <div class="mx-auto mt-3" style="height: 3px; width: 60px; background: #FF8200;"></div>
            </div>

            <div class="row g-4">
                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="mission-card-v2">
                        <div class="mb-3"><i class="fas fa-cogs fa-2x text-success"></i></div>
                        <h4 class="fw-bold mb-3">Mise à Niveau Technique</h4>
                        <p class="text-muted">Modernisation de l'outil de production et adoption de technologies innovantes
                            pour accroître la productivité.</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="mission-card-v2">
                        <div class="mb-3"><i class="fas fa-chart-line fa-2x text-success"></i></div>
                        <h4 class="fw-bold mb-3">Restructuration Financière</h4>
                        <p class="text-muted">Accompagnement dans l'optimisation des structures de capital et facilitation
                            de l'accès aux financements.</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="mission-card-v2">
                        <div class="mb-3"><i class="fas fa-certificate fa-2x text-success"></i></div>
                        <h4 class="fw-bold mb-3">Certification & Qualité</h4>
                        <p class="text-muted">Aide à l'obtention des normes internationales (ISO) pour garantir la
                            compétitivité sur les marchés mondiaux.</p>
                    </div>
                </div>
            </div>

            <div class="mt-5 pt-5 row g-5 align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <h2 class="fw-bold mb-4 shadow-sm p-3 border-start border-5 border-success bg-white">Nos Valeurs
                        Institutionnelles</h2>
                    <div class="value-item shadow-sm">
                        <div class="value-icon"><i class="fas fa-shield-alt"></i></div>
                        <div>
                            <h5 class="fw-bold mb-1">Intégrité</h5>
                            <p class="mb-0 opacity-75 small">Une gestion transparente pour la confiance de nos partenaires.
                            </p>
                        </div>
                    </div>
                    <div class="value-item shadow-sm">
                        <div class="value-icon"><i class="fas fa-lightbulb"></i></div>
                        <div>
                            <h5 class="fw-bold mb-1">Innovation</h5>
                            <p class="mb-0 opacity-75 small">Toujours à la pointe des solutions pour l'industrie.</p>
                        </div>
                    </div>
                    <div class="value-item shadow-sm">
                        <div class="value-icon"><i class="fas fa-handshake"></i></div>
                        <div>
                            <h5 class="fw-bold mb-1">Proximité</h5>
                            <p class="mb-0 opacity-75 small">Un accompagnement sur mesure, au plus près des besoins.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <img src="{{ asset('assets/img/groupe.jpeg') }}" alt="Équipe FREMIN" class="img-fluid rounded shadow">
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