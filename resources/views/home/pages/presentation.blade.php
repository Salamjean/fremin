@extends('home.layouts.template')
@section('content')

    <!-- Modern Hero -->
    <div class="contact-header-v2">
        <div class="container text-center py-5">
            <h1 class="text-white display-2 mb-3 fw-black animate__animated animate__zoomIn"
                style="font-weight: 900; font-size: 45px; letter-spacing: -1px;">{{ $hero->main_title ?? 'PRÉSENTATION DU FREMIN' }}</h1>
            <div class="mx-auto bg-white mb-4" style="height: 4px; width: 80px;"></div>
            <p class="text-white lead animate__animated animate__fadeInUp fw-medium">{{ $hero->subtitle ?? 'Le moteur de la restructuration et de la modernisation industrielle en Côte d\'Ivoire.' }}</p>
        </div>
    </div>

    <!-- About Section -->
    <section class="py-5 bg-white">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="pres-about-img">
                        <img src="{{ (str_contains($about->main_image ?? '', 'assets/')) ? asset($about->main_image) : asset('storage/' . ($about->main_image ?? 'assets/img/fremin9.jpeg')) }}" alt="Siège FREMIN" class="img-fluid w-100">
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <h2 class="fw-bold mb-4" style="color: #009B3A;">{{ $about->section_title ?? 'Notre Histoire & Vision' }}</h2>
                    <p class="lead text-muted mb-4">{{ $about->content_title ?? 'Le Fonds de Restructuration et de Mise à Niveau (FREMIN) est un instrument stratégique de l\'État Ivoirien dédié à la compétitivité industrielle.' }}</p>
                    <p class="text-secondary mb-4">{{ $about->content_text ?? 'Créé pour répondre aux défis de la mondialisation, le FREMIN accompagne les entreprises industrielles dans leurs processus de transformation technique, financière et managériale. Notre objectif est de bâtir un tissu industriel robuste, capable de porter l\'émergence économique de notre nation.' }}</p>
                    <div class="row g-4">
                        <div class="col-6">
                            <div class="border-start border-4 border-orange ps-3">
                                <h4 class="fw-bold mb-0">{{ $about->feature1_title ?? 'Expertise' }}</h4>
                                <small class="text-muted">{{ $about->feature1_text ?? 'Accompagnement de pointe' }}</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="border-start border-4 border-success ps-3">
                                <h4 class="fw-bold mb-0">{{ $about->feature2_title ?? 'Impact' }}</h4>
                                <small class="text-muted">{{ $about->feature2_text ?? 'Résultats mesurables' }}</small>
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
                @foreach($stats as $stat)
                <div class="col-md-3">
                    <div class="stat-v2">
                        <span class="number">
                            <span class="counter" data-target="{{ preg_replace('/[^0-9]/', '', $stat->value) }}">0</span>{{ preg_replace('/[0-9]/', '', $stat->value) }}
                        </span>
                        <span class="label">{{ $stat->label }}</span>
                    </div>
                </div>
                @endforeach
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
                @foreach($missions as $mission)
                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="{{ $loop->iteration * 100 }}">
                    <div class="mission-card-v2">
                        <div class="mb-3"><i class="{{ $mission->icon }} fa-2x text-success"></i></div>
                        <h4 class="fw-bold mb-3">{{ $mission->title }}</h4>
                        <p class="text-muted">{{ $mission->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-5 pt-5 row g-5 align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <h2 class="fw-bold mb-4 shadow-sm p-3 border-start border-5 border-success bg-white">Nos Valeurs
                        Institutionnelles</h2>
                    @foreach($values as $val)
                    <div class="value-item shadow-sm">
                        <div class="value-icon"><i class="{{ $val->icon }}"></i></div>
                        <div>
                            <h5 class="fw-bold mb-1">{{ $val->title }}</h5>
                            <p class="mb-0 opacity-75 small">{{ $val->description }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <img src="{{ asset('assets/img/groupe.jpeg') }}" alt="Équipe FREMIN" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Organizational Chart Section -->
    <section class="org-chart-section">
        <div class="container">

            <!-- Section Header -->
            <div class="org-chart-header" data-aos="fade-up">
                <h2 class="fw-bold">Organigramme du FREMIN</h2>
                <div class="mx-auto mt-3" style="height: 3px; width: 60px; background: #FF8200;"></div>
                <p class="mt-3">Structure organisationnelle et hiérarchique du Fonds</p>
            </div>

            <!-- Org Chart -->
            <div class="org-chart" data-aos="fade-up" data-aos-delay="200">

                <!-- Level 1: President -->
                <div class="level-1">
                    <div class="org-box green">
                        <h4>Président du Comité de Gestion</h4>
                    </div>
                </div>

                <!-- Level 2: Vice President + Suppleant -->
                <div class="level-2">
                    <div class="org-box green">
                        <h4>Vice-Président<br>du Comité de Gestion</h4>
                    </div>
                    <div class="org-box orange">
                        <h4>Suppléant du Représentant<br>du ministre de l'économie<br>et des finances</h4>
                    </div>
                </div>

                <!-- Level 3: Main Branches -->
                <div class="level-3">
                    <!-- Left: Membres -->
                    <div class="org-box green">
                        <h4>Membres du comité<br>de gestion</h4>
                    </div>

                    <!-- Center: BNI -->
                    <div class="org-box gray">
                        <h4>Gestion Administrative<br>et Financière<br>(BNI)</h4>
                    </div>

                    <!-- Right: Cellule Technique -->
                    <div class="org-box blue">
                        <h4>Président de la Cellule<br>Technique</h4>
                    </div>
                </div>

                <!-- Level 4: Detailed Positions -->
                <div class="level-4">
                    <!-- Column 1: Membres details -->
                    <div class="org-box green">
                        <h4>Représentant<br>du ministre du<br>Budget</h4>
                    </div>

                    <div class="org-box green">
                        <h4>Représentant du<br>ministre des<br>PME</h4>
                    </div>

                    <div class="org-box green">
                        <h4>Directeur<br>Général<br>BNI</h4>
                    </div>

                    <!-- Column 2: Secrétariat -->
                    <div class="org-box orange">
                        <h4>Secrétariat<br>(BNI)</h4>
                    </div>

                    <!-- Column 3-5: Cellule Technique details -->
                    <div class="org-box blue">
                        <h4>Représentant du<br>ministre de l'économie<br>et des finances</h4>
                    </div>

                </div>

                <!-- Level 5: Suppleants -->
                <div class="level-4">
                    <div class="org-box orange">
                        <h4>Suppléant du<br>Représentant<br>du ministre du<br>Budget</h4>
                    </div>

                    <div class="org-box orange">
                        <h4>Suppléant du<br>Représentant<br>du ministre<br>des PME</h4>
                    </div>

                    <div style="grid-column: span 1;"></div>

                    <div style="grid-column: span 1;"></div>

                    <div class="org-box blue">
                        <h4>Représentant du<br>ministre du<br>Budget</h4>
                    </div>
                </div>

                <!-- Level 6: Last row -->
                <div class="level-4">
                    <div style="grid-column: span 2;"></div>

                    <div style="grid-column: span 1;"></div>

                    <div style="grid-column: span 1;"></div>

                    <div class="org-box blue">
                        <h4>Représentant<br>de la BNI</h4>
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