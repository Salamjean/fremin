@extends('home.layouts.template')
@section('content')
    <!-- Hero Section -->
    <section class="fremin-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="hero-title">
                        <span class="text-primary">FREMIN</span><br>
                        Fonds de Restructuration et de Mise à Niveau des Entreprises Industrielles
                    </h1>
                    <p class="hero-subtitle">
                        Accompagnons la compétitivité du secteur industriel ivoirien
                    </p>
                    <div class="hero-buttons mt-4">
                        <a href="#missions" class="btn btn-primary me-3">
                            <i class="fas fa-bullseye me-2"></i>Nos Missions
                        </a>
                        <a href="#programmes" class="btn btn-outline-primary">
                            <i class="fas fa-handshake me-2"></i>Nos Programmes
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image-container">
                        <img src="{{ asset('assets/img/groupe.jpeg') }}" alt="Industrie Ivoirienne"
                            class="hero-image">
                        <div class="floating-stats">
                            <div class="stat-item">
                                <span class="stat-number">150+</span>
                                <span class="stat-label">Entreprises accompagnées</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Présentation Section -->
    <section class="presentation-section py-5" id="presentation">
        <div class="container">
            <div class="section-header text-center mb-5">
                <h2 class="section-title">Qui sommes-nous ?</h2>
                <div class="title-underline"></div>
                <p class="section-subtitle mt-3">Structure placée sous la tutelle du Ministère du Commerce et de l'Industrie
                </p>
            </div>

            <div class="row mb-5">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="image-card">
                        <img src="{{ asset('assets/img/fremin9.jpeg') }}" alt="FREMIN Institution"
                            class="img-fluid rounded">
                        <div class="image-overlay">
                            <div class="overlay-content">
                                <i class="fas fa-landmark"></i>
                                <p>Institution d'excellence</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="content-card">
                        <h3 class="content-title">Notre Histoire</h3>
                        <p class="content-text">
                            Créé pour moderniser le tissu productif ivoirien, le FREMIN s'inscrit dans la vision
                            gouvernementale de développement industriel durable. Notre institution œuvre depuis
                            sa création à la consolidation des capacités techniques, financières et organisationnelles
                            des entreprises industrielles locales.
                        </p>
                        <div class="features-grid mt-4">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div class="feature-content">
                                    <h5>Modernisation</h5>
                                    <p>Modernisation du tissu productif</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-hands-helping"></i>
                                </div>
                                <div class="feature-content">
                                    <h5>Accompagnement</h5>
                                    <p>Accompagnement personnalisé</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mission & Vision -->
            <div class="row" id="missions">
                <div class="col-md-4 mb-4">
                    <div class="mission-card h-100">
                        <div class="mission-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h4>Notre Mission</h4>
                        <p>Accompagner la compétitivité du secteur industriel ivoirien à travers des interventions ciblées
                            et stratégiques.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="vision-card h-100">
                        <div class="vision-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h4>Notre Vision</h4>
                        <p>Devenir le partenaire privilégié de l'industrie ivoirienne dans sa transformation numérique et
                            organisationnelle.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="values-card h-100">
                        <div class="values-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h4>Nos Valeurs</h4>
                        <p>Excellence, Innovation, Transparence, Partenariat et Engagement pour le développement industriel.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Galerie Section -->
    <section class="gallery-section py-5 bg-light">
        <div class="container">
            <div class="section-header text-center mb-5">
                <h2 class="section-title">Nos Actions en Images</h2>
                <div class="title-underline"></div>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="{{ asset('assets/img/fremin5.jpeg') }}" alt="Atelier de formation" class="img-fluid">
                        <div class="gallery-caption">
                            <h5>Ateliers de Formation</h5>
                            <p>Renforcement des capacités techniques</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="{{ asset('assets/img/structure.jpeg') }}" alt="Visite d'entreprise" class="img-fluid">
                        <div class="gallery-caption">
                            <h5>Accompagnement sur site</h5>
                            <p>Visites techniques personnalisées</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="{{ asset('assets/img/fremin4.jpeg') }}" alt="Cérémonie de remise" class="img-fluid">
                        <div class="gallery-caption">
                            <h5>Événements Institutionnels</h5>
                            <p>Cérémonies de partenariat</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Chiffres clés -->
    {{-- <section class="stats-section py-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 col-6 mb-4">
                <div class="stat-circle">
                    <span class="stat-number" data-count="500">0</span>
                    <span class="stat-label">Projets accompagnés</span>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="stat-circle">
                    <span class="stat-number" data-count="150">0</span>
                    <span class="stat-label">Entreprises partenaires</span>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="stat-circle">
                    <span class="stat-number" data-count="50">0</span>
                    <span class="stat-label">Ateliers organisés</span>
                </div>
</div>
            <div class="col-md-3 col-6 mb-4">
                <div class="stat-circle">
                    <span class="stat-number" data-count="12">0</span>
                    <span class="stat-label">Partenaires institutionnels</span>
                </div>
            </div>
        </div>
    </div>
</section> --}}

    <!-- CTA Section -->
    <section class="cta-section py-5">
        <div class="container">
            <div class="cta-card">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h3 class="cta-title">Vous êtes une entreprise industrielle ?</h3>
                        <p class="cta-text">Découvrez nos programmes d'accompagnement et bénéficiez de notre expertise pour
                            votre développement.</p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a href="#" class="btn btn-light btn-lg">
                            Découvrir nos programmes <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        :root {
            --primary-color: #00632d;
            --primary-light: #e8f5e9;
            --white: #ffffff;
            --dark: #333333;
            --light-gray: #f8f9fa;
        }

        /* Hero Section */
        .fremin-hero {
            background: linear-gradient(135deg, var(--white) 0%, var(--primary-light) 100%);
            padding: 100px 0 80px;
            position: relative;
            overflow: hidden;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            line-height: 1.2;
            color: var(--dark);
            margin-bottom: 1.5rem;
        }

        .hero-title .text-primary {
            color: var(--primary-color) !important;
            font-size: 3.5rem;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: #666;
            margin-bottom: 2rem;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #004d24;
            border-color: #004d24;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 99, 45, 0.2);
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 12px 30px;
            font-weight: 600;
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            transform: translateY(-2px);
        }

        .hero-image-container {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .hero-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .hero-image-container:hover .hero-image {
            transform: scale(1.05);
        }

        .floating-stats {
            position: absolute;
            bottom: 20px;
            right: 20px;
            background: var(--white);
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .stat-number {
            display: block;
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .stat-label {
            font-size: 0.9rem;
            color: #666;
        }

        /* Section Styles */
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark);
            position: relative;
            display: inline-block;
        }

        .title-underline {
            width: 80px;
            height: 4px;
            background-color: var(--primary-color);
            margin: 10px auto;
            border-radius: 2px;
        }

        .section-subtitle {
            color: #666;
            font-size: 1.1rem;
        }

        /* Cards */
        .image-card {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            height: 100%;
        }

        .image-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0, 99, 45, 0.8));
            padding: 30px;
            color: var(--white);
        }

        .overlay-content {
            text-align: center;
        }

        .overlay-content i {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .content-card {
            padding: 30px;
            background: var(--white);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            height: 100%;
        }

        .content-title {
            font-size: 1.8rem;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .content-text {
            color: #555;
            line-height: 1.8;
            margin-bottom: 20px;
        }

        /* Feature Grid */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            background: var(--primary-light);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-size: 1.2rem;
        }

        /* Mission/Vision/Values Cards */
        .mission-card,
        .vision-card,
        .values-card {
            background: var(--white);
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-top: 4px solid var(--primary-color);
        }

        .mission-card:hover,
        .vision-card:hover,
        .values-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }

        .mission-icon,
        .vision-icon,
        .values-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 20px;
            background: var(--primary-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-size: 1.5rem;
        }

        /* Gallery */
        .gallery-item {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            height: 300px;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-caption {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 99, 45, 0.9);
            color: var(--white);
            padding: 20px;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }

        .gallery-item:hover .gallery-caption {
            transform: translateY(0);
        }

        /* Stats Section */
        .stats-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, #008040 100%);
            color: var(--white);
        }

        .stat-circle {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .stat-number {
            font-size: 3.5rem;
            font-weight: 700;
            line-height: 1;
            margin-bottom: 10px;
        }

        .stat-label {
            font-size: 1rem;
            opacity: 0.9;
            text-align: center;
        }

        /* CTA Section */
        .cta-section {
            background: var(--light-gray);
        }

        .cta-card {
            background: linear-gradient(135deg, var(--primary-color) 0%, #004d24 100%);
            border-radius: 20px;
            padding: 60px;
            color: var(--white);
        }

        .cta-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .cta-text {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 0;
        }

        .btn-light {
            background-color: var(--white);
            color: var(--primary-color);
            border: none;
            padding: 15px 40px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-light:hover {
            background-color: #f8f9fa;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 255, 255, 0.2);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }

            .hero-title .text-primary {
                font-size: 2.2rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .cta-card {
                padding: 40px 20px;
                text-align: center;
            }

            .stat-number {
                font-size: 2.5rem;
            }
        }
    </style>
    <script>
        // Animation des chiffres
        document.addEventListener('DOMContentLoaded', function() {
            const counters = document.querySelectorAll('.stat-number[data-count]');

            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-count'));
                const increment = target / 100;
                let current = 0;

                const updateCounter = () => {
                    if (current < target) {
                        current += increment;
                        counter.textContent = Math.ceil(current);
                        setTimeout(updateCounter, 20);
                    } else {
                        counter.textContent = target;
                    }
                };

                // Déclencher l'animation au scroll
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            updateCounter();
                            observer.unobserve(entry.target);
                        }
                    });
                });

                observer.observe(counter);
            });
        });
    </script>
@endsection
