@extends('home.layouts.template')
@section('content')

<!-- Hero Section Actualités -->
<section class="news-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="hero-title">
                    <span class="text-primary">Actualités</span> & Événements
                </h1>
                <p class="hero-subtitle">
                    Restez informé des dernières nouvelles, événements et activités du FREMIN
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <div class="hero-stats">
                    <div class="stat-badge">
                        <i class="fas fa-newspaper me-2"></i>
                        <span>24 Articles</span>
                    </div>
                    <div class="stat-badge">
                        <i class="fas fa-calendar-alt me-2"></i>
                        <span>5 Événements à venir</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Filtres -->
<section class="filters-section py-4 bg-light">
    <div class="container">
        <div class="filter-tags text-center">
            <button class="filter-tag active" data-filter="all">
                Tous
            </button>
            <button class="filter-tag" data-filter="actualites">
                <i class="fas fa-newspaper me-2"></i>Actualités
            </button>
            <button class="filter-tag" data-filter="evenements">
                <i class="fas fa-calendar-alt me-2"></i>Événements
            </button>
            <button class="filter-tag" data-filter="communiques">
                <i class="fas fa-bullhorn me-2"></i>Communiqués
            </button>
        </div>
    </div>
</section>

<!-- Contenu Principal -->
<section class="news-main py-5">
    <div class="container">
        <!-- Article à la Une -->
        <div class="featured-article mb-5">
            <div class="featured-badge">
                <i class="fas fa-star"></i> À la Une
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="featured-image">
                        <img src="{{ asset('assets/img/fremin8.jpeg') }}" 
                             alt="Lancement du nouveau programme d'accompagnement"
                             class="img-fluid rounded">
                        <div class="image-category">
                            Actualité
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="featured-content">
                        <div class="article-meta mb-3">
                            <span class="meta-date">
                                <i class="far fa-calendar me-1"></i>
                                15 Janvier 2024
                            </span>
                            <span class="meta-views">
                                <i class="far fa-eye me-1"></i>
                                1,245 vues
                            </span>
                        </div>
                        
                        <h2 class="article-title mb-3">
                            Lancement du Programme "Industrie 4.0" pour la Modernisation des PME Ivoiriennes
                        </h2>
                        
                        <p class="article-excerpt">
                            Le FREMIN lance un nouveau programme d'accompagnement pour aider les PME industrielles 
                            à adopter les technologies de l'industrie 4.0. Ce programme comprend des formations, 
                            des audits technologiques et un soutien financier pour l'acquisition d'équipements modernes.
                        </p>
                        
                        <a href="#" class="read-more-btn">
                            Lire l'article complet <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Liste des Actualités -->
        <h3 class="section-subtitle mb-4">Dernières Actualités</h3>
        
        <div class="row g-4">
            <!-- Article 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="news-card">
                    <div class="news-image">
                        <img src="{{ asset('assets/img/fremin3.jpeg') }}" 
                             alt="Atelier de formation"
                             class="img-fluid">
                        <div class="news-category">
                            Atelier
                        </div>
                    </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span class="news-date">10 Jan 2024</span>
                            <span class="news-type">Formation</span>
                        </div>
                        <h4 class="news-title">
                            Atelier sur la Gestion de la Chaîne d'Approvisionnement
                        </h4>
                        <p class="news-excerpt">
                            Formation intensive de 3 jours pour les responsables logistique des entreprises industrielles.
                        </p>
                        <div class="news-footer">
                            <a href="#" class="news-link">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                            <span class="news-stats">
                                <i class="far fa-eye me-1"></i> 845
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Article 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="news-card">
                    <div class="news-image">
                        <img src="{{ asset('assets/img/fremin3.jpeg') }}" 
                             alt="Signature de partenariat"
                             class="img-fluid">
                        <div class="news-category bg-warning">
                            Partenariat
                        </div>
                    </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span class="news-date">05 Jan 2024</span>
                            <span class="news-type">Communiqué</span>
                        </div>
                        <h4 class="news-title">
                            Nouveau Partenariat avec la Banque d'Investissement
                        </h4>
                        <p class="news-excerpt">
                            Signature d'un accord de coopération pour faciliter l'accès au financement des PME.
                        </p>
                        <div class="news-footer">
                            <a href="#" class="news-link">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                            <span class="news-stats">
                                <i class="far fa-eye me-1"></i> 921
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Article 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="news-card">
                    <div class="news-image">
                        <img src="{{ asset('assets/img/fremin3.jpeg') }}" 
                             alt="Visite ministérielle"
                             class="img-fluid">
                        <div class="news-category bg-info">
                            Événement
                        </div>
                    </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span class="news-date">28 Déc 2023</span>
                            <span class="news-type">Visite</span>
                        </div>
                        <h4 class="news-title">
                            Visite du Ministre du Commerce dans les Locaux du FREMIN
                        </h4>
                        <p class="news-excerpt">
                            Le Ministre a salué les efforts du FREMIN dans la modernisation du tissu industriel.
                        </p>
                        <div class="news-footer">
                            <a href="#" class="news-link">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                            <span class="news-stats">
                                <i class="far fa-eye me-1"></i> 1,104
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Article 4 -->
            <div class="col-md-6 col-lg-4">
                <div class="news-card">
                    <div class="news-image">
                        <img src="{{ asset('assets/img/fremin3.jpeg') }}" 
                             alt="Publication de rapport"
                             class="img-fluid">
                        <div class="news-category bg-secondary">
                            Publication
                        </div>
                    </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span class="news-date">20 Déc 2023</span>
                            <span class="news-type">Rapport</span>
                        </div>
                        <h4 class="news-title">
                            Rapport Annuel 2023 : Bilan des Actions du FREMIN
                        </h4>
                        <p class="news-excerpt">
                            Téléchargez notre rapport complet présentant les réalisations de l'année écoulée.
                        </p>
                        <div class="news-footer">
                            <a href="#" class="news-link">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                            <span class="news-stats">
                                <i class="far fa-eye me-1"></i> 756
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Article 5 -->
            <div class="col-md-6 col-lg-4">
                <div class="news-card event-card">
                    <div class="news-image">
                        <img src="{{ asset('assets/img/fremin3.jpeg') }}" 
                             alt="Forum industriel"
                             class="img-fluid">
                        <div class="news-category bg-danger">
                            Événement à venir
                        </div>
                        <div class="event-date">
                            <span class="event-day">25</span>
                            <span class="event-month">Janv</span>
                        </div>
                    </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span class="news-date">25 Jan 2024</span>
                            <span class="news-type">Forum</span>
                        </div>
                        <h4 class="news-title">
                            Forum National sur l'Innovation Industrielle
                        </h4>
                        <p class="news-excerpt">
                            Rencontre annuelle des acteurs du secteur industriel pour échanger sur les innovations.
                        </p>
                        <div class="news-footer">
                            <button class="btn btn-sm btn-primary">
                                <i class="fas fa-calendar-plus me-1"></i> S'inscrire
                            </button>
                            <span class="news-stats">
                                <i class="fas fa-users me-1"></i> 45 inscrits
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Article 6 -->
            <div class="col-md-6 col-lg-4">
                <div class="news-card">
                    <div class="news-image">
                        <img src="{{ asset('assets/img/fremin3.jpeg') }}" 
                             alt="Cérémonie de remise"
                             class="img-fluid">
                        <div class="news-category bg-success">
                            Réussite
                        </div>
                    </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span class="news-date">15 Déc 2023</span>
                            <span class="news-type">Témoignage</span>
                        </div>
                        <h4 class="news-title">
                            Entreprise "TechPro" Double sa Production Grâce au FREMIN
                        </h4>
                        <p class="news-excerpt">
                            Témoignage d'une entreprise qui a bénéficié de notre programme de modernisation.
                        </p>
                        <div class="news-footer">
                            <a href="#" class="news-link">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                            <span class="news-stats">
                                <i class="far fa-eye me-1"></i> 892
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bouton Voir Plus -->
        <div class="text-center mt-5">
            <button class="btn btn-outline-primary btn-load-more">
                <i class="fas fa-redo me-2"></i> Charger plus d'articles
            </button>
        </div>
    </div>
</section>

<!-- Section Événements à Venir -->
<section class="upcoming-events py-5 bg-light">
    <div class="container">
        <div class="section-header mb-5">
            <h2 class="section-title">
                <i class="fas fa-calendar-check me-3"></i>
                Événements à Venir
            </h2>
            <p class="section-subtitle">Participez à nos prochains événements</p>
        </div>

        <div class="row g-4">
            <!-- Événement 1 -->
            <div class="col-md-6 col-lg-3">
                <div class="event-card-small">
                    <div class="event-date-card">
                        <div class="event-month">JANV</div>
                        <div class="event-day">25</div>
                        <div class="event-year">2024</div>
                    </div>
                    <div class="event-info">
                        <h5 class="event-title">Forum Innovation Industrielle</h5>
                        <p class="event-location">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            Hôtel Ivoire, Abidjan
                        </p>
                        <p class="event-time">
                            <i class="far fa-clock me-2"></i>
                            9h00 - 17h00
                        </p>
                        <button class="btn btn-sm btn-primary mt-2 w-100">
                            En savoir plus
                        </button>
                    </div>
                </div>
            </div>

            <!-- Événement 2 -->
            <div class="col-md-6 col-lg-3">
                <div class="event-card-small">
                    <div class="event-date-card">
                        <div class="event-month">FÉVR</div>
                        <div class="event-day">15</div>
                        <div class="event-year">2024</div>
                    </div>
                    <div class="event-info">
                        <h5 class="event-title">Atelier Gestion Énergétique</h5>
                        <p class="event-location">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            Siège FREMIN, Plateau
                        </p>
                        <p class="event-time">
                            <i class="far fa-clock me-2"></i>
                            10h00 - 16h00
                        </p>
                        <button class="btn btn-sm btn-outline-primary mt-2 w-100">
                            En savoir plus
                        </button>
                    </div>
                </div>
            </div>

            <!-- Événement 3 -->
            <div class="col-md-6 col-lg-3">
                <div class="event-card-small">
                    <div class="event-date-card">
                        <div class="event-month">MARS</div>
                        <div class="event-day">08</div>
                        <div class="event-year">2024</div>
                    </div>
                    <div class="event-info">
                        <h5 class="event-title">Webinar Export International</h5>
                        <p class="event-location">
                            <i class="fas fa-video me-2"></i>
                            En ligne
                        </p>
                        <p class="event-time">
                            <i class="far fa-clock me-2"></i>
                            14h00 - 16h00
                        </p>
                        <button class="btn btn-sm btn-outline-primary mt-2 w-100">
                            En savoir plus
                        </button>
                    </div>
                </div>
            </div>

            <!-- Événement 4 -->
            <div class="col-md-6 col-lg-3">
                <div class="event-card-small">
                    <div class="event-date-card">
                        <div class="event-month">AVR</div>
                        <div class="event-day">12</div>
                        <div class="event-year">2024</div>
                    </div>
                    <div class="event-info">
                        <h5 class="event-title">Salon des Fournisseurs</h5>
                        <p class="event-location">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            Palais de la Culture
                        </p>
                        <p class="event-time">
                            <i class="far fa-clock me-2"></i>
                            8h00 - 18h00
                        </p>
                        <button class="btn btn-sm btn-outline-primary mt-2 w-100">
                            En savoir plus
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter -->
<section class="newsletter-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="newsletter-card">
                    <i class="fas fa-envelope newsletter-icon"></i>
                    <h3 class="newsletter-title">Restez Informé</h3>
                    <p class="newsletter-text">
                        Recevez nos actualités et invitations aux événements directement dans votre boîte email
                    </p>
                    <div class="newsletter-form mt-4">
                        <div class="input-group">
                            <input type="email" 
                                   class="form-control" 
                                   placeholder="Votre adresse email">
                            <button class="btn btn-primary" type="button">
                                S'abonner <i class="fas fa-paper-plane ms-2"></i>
                            </button>
                        </div>
                        <p class=" mt-2 text-black">
                            <i class="fas fa-lock me-1"></i>
                            Nous respectons votre vie privée. Désabonnez-vous à tout moment.
                        </p>
                    </div>
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
    --border-color: #eaeaea;
}

/* Hero Section */
.news-hero {
    background: linear-gradient(135deg, var(--primary-light) 0%, var(--white) 100%);
    padding: 80px 0 40px;
    border-bottom: 3px solid var(--primary-color);
}

.hero-title {
    font-size: 2.8rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 1rem;
}

.hero-title .text-primary {
    color: var(--primary-color) !important;
}

.hero-subtitle {
    font-size: 1.2rem;
    color: #666;
    max-width: 600px;
}

.hero-stats {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.stat-badge {
    background: var(--white);
    padding: 12px 20px;
    border-radius: 10px;
    display: inline-flex;
    align-items: center;
    box-shadow: 0 3px 10px rgba(0,0,0,0.08);
    font-weight: 600;
    color: var(--primary-color);
}

.stat-badge i {
    font-size: 1.2rem;
}

/* Filtres */
.filters-section {
    border-bottom: 1px solid var(--border-color);
}

.filter-tags {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    justify-content: center;
}

.filter-tag {
    background: var(--white);
    border: 2px solid var(--border-color);
    padding: 8px 20px;
    border-radius: 50px;
    font-weight: 600;
    color: #666;
    transition: all 0.3s ease;
}

.filter-tag:hover {
    border-color: var(--primary-color);
    color: var(--primary-color);
    transform: translateY(-2px);
}

.filter-tag.active {
    background: var(--primary-color);
    border-color: var(--primary-color);
    color: var(--white);
}

/* Article à la Une */
.featured-article {
    position: relative;
    background: var(--white);
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    border: 1px solid var(--border-color);
}

.featured-badge {
    position: absolute;
    top: -15px;
    left: 30px;
    background: #ff6b00;
    color: white;
    padding: 8px 20px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.9rem;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.featured-image {
    position: relative;
    border-radius: 10px;
    overflow: hidden;
    height: 100%;
    min-height: 300px;
}

.featured-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.image-category {
    position: absolute;
    top: 15px;
    left: 15px;
    background: var(--primary-color);
    color: var(--white);
    padding: 5px 15px;
    border-radius: 5px;
    font-size: 0.8rem;
    font-weight: 600;
}

.article-meta {
    display: flex;
    gap: 20px;
    font-size: 0.9rem;
    color: #666;
}

.meta-date, .meta-views {
    display: flex;
    align-items: center;
}

.article-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--dark);
    line-height: 1.3;
    margin: 15px 0;
}

.article-title a {
    color: inherit;
    text-decoration: none;
    transition: color 0.3s ease;
}

.article-title a:hover {
    color: var(--primary-color);
}

.article-excerpt {
    color: #555;
    line-height: 1.7;
    margin-bottom: 25px;
}

.read-more-btn {
    display: inline-flex;
    align-items: center;
    color: var(--primary-color);
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
}

.read-more-btn:hover {
    gap: 10px;
    color: #004d24;
}

/* Cartes Actualités */
.news-card {
    background: var(--white);
    border-radius: 10px;
    overflow: hidden;
    height: 100%;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
    border: 1px solid var(--border-color);
}

.news-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
}

.news-image {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.news-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.news-card:hover .news-image img {
    transform: scale(1.05);
}

.news-category {
    position: absolute;
    top: 15px;
    right: 15px;
    background: var(--primary-color);
    color: var(--white);
    padding: 4px 12px;
    border-radius: 5px;
    font-size: 0.75rem;
    font-weight: 600;
}

.news-content {
    padding: 20px;
}

.news-meta {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    font-size: 0.85rem;
    color: #666;
}

.news-date {
    color: var(--primary-color);
    font-weight: 600;
}

.news-type {
    background: var(--primary-light);
    color: var(--primary-color);
    padding: 2px 8px;
    border-radius: 3px;
    font-size: 0.75rem;
}

.news-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 10px;
    line-height: 1.4;
}

.news-excerpt {
    color: #666;
    font-size: 0.9rem;
    line-height: 1.6;
    margin-bottom: 15px;
}

.news-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 15px;
    border-top: 1px solid var(--border-color);
}

.news-link {
    color: var(--primary-color);
    font-size: 1.2rem;
    transition: all 0.3s ease;
}

.news-link:hover {
    transform: translateX(5px);
}

.news-stats {
    font-size: 0.85rem;
    color: #666;
}

/* Cartes Événements */
.event-card .news-image {
    position: relative;
}

.event-date {
    position: absolute;
    bottom: 15px;
    left: 15px;
    background: var(--white);
    width: 60px;
    height: 60px;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}

.event-day {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary-color);
    line-height: 1;
}

.event-month {
    font-size: 0.8rem;
    font-weight: 600;
    color: #666;
    text-transform: uppercase;
}

/* Événements à Venir */
.section-header {
    text-align: center;
}

.section-title {
    font-size: 2rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.section-subtitle {
    color: #666;
    font-size: 1.1rem;
}

.event-card-small {
    background: var(--white);
    border-radius: 10px;
    padding: 20px;
    display: flex;
    gap: 15px;
    align-items: center;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
    border: 1px solid var(--border-color);
}

.event-card-small:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

.event-date-card {
    background: var(--primary-light);
    border-radius: 8px;
    padding: 15px;
    text-align: center;
    min-width: 70px;
}

.event-month {
    font-size: 0.8rem;
    font-weight: 700;
    color: var(--primary-color);
    text-transform: uppercase;
}

.event-day {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--dark);
    line-height: 1;
    margin: 5px 0;
}

.event-year {
    font-size: 0.8rem;
    color: #666;
}

.event-info {
    flex: 1;
}

.event-title {
    font-size: 1rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 8px;
    line-height: 1.3;
}

.event-location, .event-time {
    font-size: 0.85rem;
    color: #666;
    margin-bottom: 5px;
    display: flex;
    align-items: center;
}

/* Newsletter */
.newsletter-section {
    background: linear-gradient(135deg, var(--primary-color) 0%, #004d24 100%);
    color: var(--white);
}

.newsletter-card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-radius: 15px;
    padding: 40px;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.newsletter-icon {
    font-size: 3rem;
    margin-bottom: 20px;
    color: var(--white);
}

.newsletter-title {
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 10px;
}

.newsletter-text {
    font-size: 1.1rem;
    opacity: 0.9;
}

.newsletter-form .form-control {
    border: none;
    padding: 15px 20px;
    border-radius: 10px 0 0 10px;
}

.newsletter-form .btn {
    border-radius: 0 10px 10px 0;
    padding: 15px 30px;
}

.form-text {
    font-size: 0.85rem;
    opacity: 0.8;
}

/* Boutons */
.btn-load-more {
    padding: 12px 40px;
    font-weight: 600;
    border-width: 2px;
}

.btn-load-more:hover {
    background: var(--primary-color);
    color: var(--white);
}

/* Responsive */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2rem;
    }
    
    .hero-stats {
        margin-top: 20px;
        flex-direction: row;
        justify-content: center;
    }
    
    .featured-article {
        padding: 20px;
    }
    
    .article-title {
        font-size: 1.5rem;
    }
    
    .section-title {
        font-size: 1.5rem;
    }
    
    .filter-tags {
        justify-content: flex-start;
        overflow-x: auto;
        padding-bottom: 10px;
    }
}
</style>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Filtrage des articles
    const filterTags = document.querySelectorAll('.filter-tag');
    const newsCards = document.querySelectorAll('.news-card, .featured-article');
    
    filterTags.forEach(tag => {
        tag.addEventListener('click', function() {
            // Retirer la classe active de tous les tags
            filterTags.forEach(t => t.classList.remove('active'));
            // Ajouter la classe active au tag cliqué
            this.classList.add('active');
            
            const filterValue = this.getAttribute('data-filter');
            
            // Filtrer les articles
            newsCards.forEach(card => {
                if (filterValue === 'all') {
                    card.style.display = 'block';
                } else {
                    // Logique de filtrage basée sur la catégorie
                    // À adapter selon votre structure
                    card.style.display = 'block';
                }
            });
        });
    });
    
    // Animation au scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animated');
            }
        });
    }, observerOptions);
    
    // Observer les cartes
    document.querySelectorAll('.news-card, .event-card-small').forEach(card => {
        observer.observe(card);
    });
    
    // Bouton Charger plus
    const loadMoreBtn = document.querySelector('.btn-load-more');
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function() {
            this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Chargement...';
            this.disabled = true;
            
            // Simuler un chargement
            setTimeout(() => {
                this.innerHTML = '<i class="fas fa-check me-2"></i> Tous les articles chargés';
                this.classList.remove('btn-outline-primary');
                this.classList.add('btn-secondary');
            }, 1500);
        });
    }
    
    // Inscription newsletter
    const newsletterBtn = document.querySelector('.newsletter-form .btn');
    const newsletterInput = document.querySelector('.newsletter-form input');
    
    if (newsletterBtn) {
        newsletterBtn.addEventListener('click', function() {
            if (newsletterInput.value) {
                this.innerHTML = '<i class="fas fa-check me-2"></i> Inscrit !';
                this.classList.remove('btn-primary');
                this.classList.add('btn-success');
                newsletterInput.disabled = true;
            }
        });
    }
});
</script>
@endsection