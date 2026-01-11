@extends('home.layouts.template')
@section('content')

<!-- Hero Section Programmes -->
<section class="programs-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="hero-title">
                    <span class="text-primary">Programmes</span> & Opportunités
                </h1>
                <p class="hero-subtitle">
                    Découvrez nos programmes d'accompagnement et saisissez les opportunités de financement pour votre entreprise industrielle
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <div class="hero-stats">
                    <div class="stat-badge">
                        <i class="fas fa-handshake me-2"></i>
                        <span>5 Programmes actifs</span>
                    </div>
                    <div class="stat-badge">
                        <i class="fas fa-clock me-2"></i>
                        <span>3 Appels en cours</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bannière d'Appel à Manifestation -->
<section class="call-banner py-4 bg-warning">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-9">
                <div class="d-flex align-items-center">
                    <div class="call-icon me-3">
                        <i class="fas fa-bullhorn fa-2x"></i>
                    </div>
                    <div>
                        <h4 class="call-title mb-1">Appel à Manifestation d'Intérêt</h4>
                        <p class="call-text mb-0">
                            Programme "Industrie 4.0" - Date limite : <strong>28 Février 2024</strong>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 text-lg-end mt-3 mt-lg-0">
                <a href="#ami" class="btn btn-dark btn-lg">
                    Postuler maintenant <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Programmes en Vedette -->
<section class="featured-programs py-5">
    <div class="container">
        <div class="section-header mb-5">
            <h2 class="section-title">Nos Programmes d'Accompagnement</h2>
            <p class="section-subtitle">Des solutions adaptées pour chaque besoin industriel</p>
        </div>

        <div class="row g-4">
            <!-- Programme 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="program-card program-premium">
                    <div class="program-badge">
                        <span class="badge-premium">
                            <i class="fas fa-crown me-1"></i> Programme Phare
                        </span>
                    </div>
                    <div class="program-icon">
                        <i class="fas fa-industry"></i>
                    </div>
                    <h3 class="program-title">Modernisation Industrielle</h3>
                    <p class="program-description">
                        Programme d'accompagnement pour la modernisation des équipements et processus de production.
                    </p>
                    <div class="program-features">
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Audit technique gratuit</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Subvention jusqu'à 50%</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Accompagnement sur 24 mois</span>
                        </div>
                    </div>
                    <div class="program-stats">
                        <div class="stat">
                            <span class="stat-number">85</span>
                            <span class="stat-label">Entreprises</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">15M</span>
                            <span class="stat-label">FCFA moyen</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">92%</span>
                            <span class="stat-label">Satisfaction</span>
                        </div>
                    </div>
                    <button class="btn btn-primary w-100 program-details-btn">
                        Voir les détails <i class="fas fa-arrow-right ms-2"></i>
                    </button>
                </div>
            </div>

            <!-- Programme 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="program-card program-new">
                    <div class="program-badge">
                        <span class="badge-new">
                            <i class="fas fa-star me-1"></i> Nouveau
                        </span>
                    </div>
                    <div class="program-icon">
                        <i class="fas fa-robot"></i>
                    </div>
                    <h3 class="program-title">Industrie 4.0</h3>
                    <p class="program-description">
                        Transition vers l'industrie du futur : digitalisation, IoT et automatisation intelligente.
                    </p>
                    <div class="program-features">
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Formation certifiante</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Prêt à taux préférentiel</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Expertise internationale</span>
                        </div>
                    </div>
                    <div class="program-stats">
                        <div class="stat">
                            <span class="stat-number">32</span>
                            <span class="stat-label">Entreprises</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">25M</span>
                            <span class="stat-label">FCFA moyen</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">88%</span>
                            <span class="stat-label">Satisfaction</span>
                        </div>
                    </div>
                    <button class="btn btn-primary w-100 program-details-btn">
                        Voir les détails <i class="fas fa-arrow-right ms-2"></i>
                    </button>
                </div>
            </div>

            <!-- Programme 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="program-card">
                    <div class="program-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3 class="program-title">Transition Écologique</h3>
                    <p class="program-description">
                        Programme d'accompagnement pour l'adoption de pratiques industrielles durables et écologiques.
                    </p>
                    <div class="program-features">
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Audit énergétique</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Subvention verte</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Certification ISO 14001</span>
                        </div>
                    </div>
                    <div class="program-stats">
                        <div class="stat">
                            <span class="stat-number">47</span>
                            <span class="stat-label">Entreprises</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">12M</span>
                            <span class="stat-label">FCFA moyen</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">95%</span>
                            <span class="stat-label">Satisfaction</span>
                        </div>
                    </div>
                    <button class="btn btn-primary w-100 program-details-btn">
                        Voir les détails <i class="fas fa-arrow-right ms-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Appels en Cours -->
<section class="current-calls py-5 bg-light" id="ami">
    <div class="container">
        <div class="section-header mb-5">
            <h2 class="section-title">Appels en Cours</h2>
            <p class="section-subtitle">Postulez dès maintenant à nos programmes</p>
        </div>

        <div class="row g-4">
            <!-- Appel 1 -->
            <div class="col-lg-6">
                <div class="call-card call-urgent">
                    <div class="call-header">
                        <div class="call-status">
                            <span class="status-badge urgent">
                                <i class="fas fa-exclamation-circle me-1"></i> Date limite proche
                            </span>
                        </div>
                        <div class="call-date">
                            <span class="date-day">28</span>
                            <span class="date-month">FÉV</span>
                            <span class="date-year">2024</span>
                        </div>
                    </div>
                    <h3 class="call-title">Programme Industrie 4.0 - Phase 2</h3>
                    <p class="call-description">
                        Appel à manifestation d'intérêt pour les PME industrielles souhaitant digitaliser leurs processus de production.
                    </p>
                    <div class="call-details">
                        <div class="detail">
                            <i class="fas fa-money-bill-wave"></i>
                            <div>
                                <span class="detail-label">Budget</span>
                                <span class="detail-value">500 Millions FCFA</span>
                            </div>
                        </div>
                        <div class="detail">
                            <i class="fas fa-building"></i>
                            <div>
                                <span class="detail-label">Bénéficiaires</span>
                                <span class="detail-value">PME industrielles</span>
                            </div>
                        </div>
                        <div class="detail">
                            <i class="fas fa-clock"></i>
                            <div>
                                <span class="detail-label">Durée</span>
                                <span class="detail-value">24 mois</span>
                            </div>
                        </div>
                    </div>
                    <div class="call-footer">
                        <a href="#" class="btn btn-primary">
                            <i class="fas fa-file-alt me-2"></i> Postuler maintenant
                        </a>
                        <a href="#" class="btn btn-outline-primary">
                            <i class="fas fa-download me-2"></i> Dossier de candidature
                        </a>
                    </div>
                </div>
            </div>

            <!-- Appel 2 -->
            <div class="col-lg-6">
                <div class="call-card">
                    <div class="call-header">
                        <div class="call-status">
                            <span class="status-badge open">
                                <i class="fas fa-hourglass-half me-1"></i> Ouvert
                            </span>
                        </div>
                        <div class="call-date">
                            <span class="date-day">15</span>
                            <span class="date-month">MARS</span>
                            <span class="date-year">2024</span>
                        </div>
                    </div>
                    <h3 class="call-title">Fonds Innovation Technologique</h3>
                    <p class="call-description">
                        Financement de projets innovants dans les domaines de la biotechnologie, nanotechnologie et matériaux avancés.
                    </p>
                    <div class="call-details">
                        <div class="detail">
                            <i class="fas fa-money-bill-wave"></i>
                            <div>
                                <span class="detail-label">Budget</span>
                                <span class="detail-value">300 Millions FCFA</span>
                            </div>
                        </div>
                        <div class="detail">
                            <i class="fas fa-building"></i>
                            <div>
                                <span class="detail-label">Bénéficiaires</span>
                                <span class="detail-value">Startups & PME innovantes</span>
                            </div>
                        </div>
                        <div class="detail">
                            <i class="fas fa-clock"></i>
                            <div>
                                <span class="detail-label">Durée</span>
                                <span class="detail-value">18 mois</span>
                            </div>
                        </div>
                    </div>
                    <div class="call-footer">
                        <a href="#" class="btn btn-primary">
                            <i class="fas fa-file-alt me-2"></i> Postuler maintenant
                        </a>
                        <a href="#" class="btn btn-outline-primary">
                            <i class="fas fa-download me-2"></i> Dossier de candidature
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Processus de Candidature -->
<section class="application-process py-5">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2 class="section-title">Comment Postuler ?</h2>
            <p class="section-subtitle">Un processus simple et transparent en 4 étapes</p>
        </div>

        <div class="process-steps">
            <!-- Étape 1 -->
            <div class="process-step">
                <div class="step-number">1</div>
                <div class="step-content">
                    <h4 class="step-title">Vérification d'Éligibilité</h4>
                    <p class="step-description">
                        Vérifiez que votre entreprise répond aux critères d'éligibilité du programme choisi.
                    </p>
                    <ul class="step-list">
                        <li>Entreprise industrielle enregistrée</li>
                        <li>Chiffre d'affaires minimum : 50M FCFA</li>
                        <li>Minimum 2 ans d'activité</li>
                    </ul>
                </div>
            </div>

            <!-- Étape 2 -->
            <div class="process-step">
                <div class="step-number">2</div>
                <div class="step-content">
                    <h4 class="step-title">Préparation du Dossier</h4>
                    <p class="step-description">
                        Téléchargez et complétez le dossier de candidature avec les pièces justificatives requises.
                    </p>
                    <ul class="step-list">
                        <li>Formulaire de candidature</li>
                        <li>Statuts de l'entreprise</li>
                        <li>Comptes annuels des 2 dernières années</li>
                        <li>Plan d'affaires détaillé</li>
                    </ul>
                </div>
            </div>

            <!-- Étape 3 -->
            <div class="process-step">
                <div class="step-number">3</div>
                <div class="step-content">
                    <h4 class="step-title">Soumission en Ligne</h4>
                    <p class="step-description">
                        Soumettez votre dossier via notre plateforme sécurisée ou déposez-le physiquement.
                    </p>
                    <ul class="step-list">
                        <li>Création de compte en ligne</li>
                        <li>Téléchargement des documents</li>
                        <li>Numéro de suivi attribué</li>
                        <li>Accusé de réception automatique</li>
                    </ul>
                </div>
            </div>

            <!-- Étape 4 -->
            <div class="process-step">
                <div class="step-number">4</div>
                <div class="step-content">
                    <h4 class="step-title">Évaluation & Sélection</h4>
                    <p class="step-description">
                        Notre comité technique évalue les dossiers et notifie les résultats sous 30 jours.
                    </p>
                    <ul class="step-list">
                        <li>Analyse technique et financière</li>
                        <li>Visite de site éventuelle</li>
                        <li>Décision du comité de sélection</li>
                        <li>Notification écrite des résultats</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="#" class="btn btn-primary btn-lg">
                <i class="fas fa-play-circle me-2"></i> Démarrer ma candidature
            </a>
        </div>
    </div>
</section>

<!-- Critères d'Éligibilité -->
<section class="eligibility-criteria py-5 bg-light">
    <div class="container">
        <div class="section-header mb-5">
            <h2 class="section-title">Critères d'Éligibilité</h2>
            <p class="section-subtitle">Vérifiez si votre entreprise peut bénéficier de nos programmes</p>
        </div>

        <div class="row g-4">
            <!-- Critère 1 -->
            <div class="col-md-6 col-lg-3">
                <div class="criteria-card">
                    <div class="criteria-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <h4 class="criteria-title">Type d'Entreprise</h4>
                    <ul class="criteria-list">
                        <li class="valid">PME industrielle</li>
                        <li class="valid">ETI industrielle</li>
                        <li class="invalid">Grand groupe</li>
                        <li class="valid">Startup industrielle</li>
                    </ul>
                </div>
            </div>

            <!-- Critère 2 -->
            <div class="col-md-6 col-lg-3">
                <div class="criteria-card">
                    <div class="criteria-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h4 class="criteria-title">Chiffre d'Affaires</h4>
                    <ul class="criteria-list">
                        <li class="valid">50M - 500M FCFA</li>
                        <li class="valid">500M - 2B FCFA</li>
                        <li class="invalid">Plus de 2B FCFA</li>
                        <li class="valid">Moins de 50M FCFA*</li>
                    </ul>
                    <small class="criteria-note">*Pour les startups innovantes</small>
                </div>
            </div>

            <!-- Critère 3 -->
            <div class="col-md-6 col-lg-3">
                <div class="criteria-card">
                    <div class="criteria-icon">
                        <i class="fas fa-history"></i>
                    </div>
                    <h4 class="criteria-title">Ancienneté</h4>
                    <ul class="criteria-list">
                        <li class="valid">Minimum 2 ans</li>
                        <li class="valid">3-5 ans</li>
                        <li class="valid">5-10 ans</li>
                        <li class="invalid">Moins de 2 ans*</li>
                    </ul>
                    <small class="criteria-note">*Sauf dérogation exceptionnelle</small>
                </div>
            </div>

            <!-- Critère 4 -->
            <div class="col-md-6 col-lg-3">
                <div class="criteria-card">
                    <div class="criteria-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h4 class="criteria-title">Localisation</h4>
                    <ul class="criteria-list">
                        <li class="valid">Côte d'Ivoire</li>
                        <li class="valid">Toutes régions</li>
                        <li class="valid">Zones industrielles</li>
                        <li class="invalid">Étranger</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Rapide -->
<section class="quick-faq py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="faq-card">
                    <h3 class="faq-title">
                        <i class="fas fa-question-circle me-3"></i>
                        Questions Fréquentes
                    </h3>
                    
                    <div class="accordion quick-accordion" id="quickFaq">
                        <!-- Question 1 -->
                        <div class="accordion-item">
                            <h4 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    Quels sont les délais de traitement ?
                                </button>
                            </h4>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#quickFaq">
                                <div class="accordion-body">
                                    Le traitement complet d'un dossier prend généralement 30 à 45 jours ouvrables après la date limite de dépôt.
                                </div>
                            </div>
                        </div>

                        <!-- Question 2 -->
                        <div class="accordion-item">
                            <h4 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Y a-t-il des frais de dossier ?
                                </button>
                            </h4>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#quickFaq">
                                <div class="accordion-body">
                                    Non, la soumission de dossier est entièrement gratuite. Le FREMIN ne facture aucun frais de dossier ou de traitement.
                                </div>
                            </div>
                        </div>

                        <!-- Question 3 -->
                        <div class="accordion-item">
                            <h4 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    Peut-on postuler à plusieurs programmes ?
                                </button>
                            </h4>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#quickFaq">
                                <div class="accordion-body">
                                    Oui, une entreprise peut postuler à plusieurs programmes simultanément, mais ne peut bénéficier que d'un seul programme à la fois.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mt-4 mt-lg-0">
                <div class="contact-card">
                    <h3 class="contact-title">
                        <i class="fas fa-headset me-3"></i>
                        Besoin d'Aide ?
                    </h3>
                    <p class="contact-text">
                        Notre équipe est à votre disposition pour vous accompagner dans votre démarche de candidature.
                    </p>
                    
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <div>
                                <span class="item-label">Téléphone</span>
                                <span class="item-value">+225 27 22 44 55 66</span>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <div>
                                <span class="item-label">Email</span>
                                <span class="item-value">programmes@fremin.ci</span>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <i class="fas fa-clock"></i>
                            <div>
                                <span class="item-label">Horaires</span>
                                <span class="item-value">Lun - Ven : 8h - 17h</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="contact-buttons mt-4">
                        <a href="#" class="btn btn-outline-primary">
                            <i class="fas fa-calendar-alt me-2"></i> Prendre rendez-vous
                        </a>
                        <a href="#" class="btn btn-primary">
                            <i class="fas fa-comment-dots me-2"></i> Chat en direct
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Final -->
<section class="programs-cta py-5 bg-primary text-white">
    <div class="container text-center">
        <h2 class="cta-title">Prêt à Transformer Votre Entreprise ?</h2>
        <p class="cta-text">
            Rejoignez les 200+ entreprises industrielles qui ont déjà bénéficié de nos programmes d'accompagnement
        </p>
        <div class="cta-buttons mt-4">
            <a href="#" class="btn btn-light btn-lg me-3">
                <i class="fas fa-file-alt me-2"></i> Postuler maintenant
            </a>
            <a href="#" class="btn btn-outline-light btn-lg">
                <i class="fas fa-download me-2"></i> Télécharger le guide
            </a>
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
    --warning-color: #ffc107;
    --success-color: #28a745;
    --danger-color: #dc3545;
}

/* Hero Section */
.programs-hero {
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

/* Bannière d'Appel */
.call-banner {
    background: linear-gradient(135deg, #fff8e1 0%, #ffecb3 100%);
    border-bottom: 3px solid var(--warning-color);
}

.call-icon {
    color: var(--dark);
}

.call-title {
    font-weight: 700;
    color: var(--dark);
}

.call-text {
    color: #664d03;
}

.btn-dark {
    background: var(--dark);
    border-color: var(--dark);
    font-weight: 600;
}

.btn-dark:hover {
    background: #1a1a1a;
    border-color: #1a1a1a;
    transform: translateY(-2px);
}

/* Cartes Programmes */
.program-card {
    background: var(--white);
    border-radius: 15px;
    padding: 30px;
    height: 100%;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    border: 2px solid var(--border-color);
    transition: all 0.3s ease;
    position: relative;
}

.program-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    border-color: var(--primary-color);
}

.program-premium {
    border-color: #ffd700;
    background: linear-gradient(135deg, #fffdf6 0%, var(--white) 100%);
}

.program-new {
    border-color: #17a2b8;
}

.program-badge {
    position: absolute;
    top: -12px;
    right: 20px;
}

.badge-premium {
    background: linear-gradient(135deg, #ffd700 0%, #ffed4e 100%);
    color: #664d03;
    padding: 6px 15px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    box-shadow: 0 3px 10px rgba(255, 215, 0, 0.3);
}

.badge-new {
    background: linear-gradient(135deg, #17a2b8 0%, #5bc0de 100%);
    color: white;
    padding: 6px 15px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    box-shadow: 0 3px 10px rgba(23, 162, 184, 0.3);
}

.program-icon {
    width: 80px;
    height: 80px;
    background: var(--primary-light);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 25px;
    color: var(--primary-color);
    font-size: 2rem;
}

.program-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 15px;
}

.program-description {
    color: #666;
    line-height: 1.6;
    margin-bottom: 25px;
    min-height: 80px;
}

.program-features {
    margin-bottom: 25px;
}

.feature {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
    color: #555;
}

.feature i {
    color: var(--primary-color);
    margin-right: 10px;
    font-size: 0.9rem;
}

.program-stats {
    display: flex;
    justify-content: space-around;
    margin-bottom: 30px;
    padding: 20px 0;
    border-top: 1px solid var(--border-color);
    border-bottom: 1px solid var(--border-color);
}

.stat {
    text-align: center;
}

.stat-number {
    display: block;
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--primary-color);
    line-height: 1;
}

.stat-label {
    display: block;
    font-size: 0.85rem;
    color: #666;
    margin-top: 5px;
}

.program-details-btn {
    padding: 12px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.program-details-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 99, 45, 0.3);
}

/* Cartes Appels */
.call-card {
    background: var(--white);
    border-radius: 15px;
    padding: 30px;
    height: 100%;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    border: 2px solid var(--border-color);
    transition: all 0.3s ease;
}

.call-urgent {
    border-color: var(--danger-color);
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% { box-shadow: 0 0 0 0 rgba(220, 53, 69, 0.4); }
    70% { box-shadow: 0 0 0 10px rgba(220, 53, 69, 0); }
    100% { box-shadow: 0 0 0 0 rgba(220, 53, 69, 0); }
}

.call-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.15);
}

.call-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 20px;
}

.call-date {
    background: var(--primary-light);
    border-radius: 10px;
    padding: 15px;
    text-align: center;
    min-width: 80px;
}

.date-day {
    display: block;
    font-size: 2rem;
    font-weight: 700;
    color: var(--primary-color);
    line-height: 1;
}

.date-month {
    display: block;
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--dark);
    text-transform: uppercase;
    margin: 5px 0;
}

.date-year {
    display: block;
    font-size: 0.8rem;
    color: #666;
}

.status-badge {
    padding: 6px 15px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
}

.status-badge.urgent {
    background: #f8d7da;
    color: var(--danger-color);
}

.status-badge.open {
    background: #d1ecf1;
    color: #0c5460;
}

.call-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 15px;
}

.call-description {
    color: #666;
    line-height: 1.6;
    margin-bottom: 25px;
}

.call-details {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 15px;
    margin-bottom: 25px;
    padding: 20px;
    background: var(--light-gray);
    border-radius: 10px;
}

.detail {
    display: flex;
    align-items: center;
    gap: 12px;
}

.detail i {
    width: 40px;
    height: 40px;
    background: var(--white);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-color);
    font-size: 1.2rem;
}

.detail-label {
    display: block;
    font-size: 0.85rem;
    color: #666;
}

.detail-value {
    display: block;
    font-weight: 700;
    color: var(--dark);
}

.call-footer {
    display: flex;
    gap: 10px;
    padding-top: 20px;
    border-top: 1px solid var(--border-color);
}

.call-footer .btn {
    flex: 1;
}

/* Processus de Candidature */
.process-steps {
    position: relative;
    max-width: 800px;
    margin: 0 auto;
}

.process-steps::before {
    content: '';
    position: absolute;
    left: 40px;
    top: 0;
    bottom: 0;
    width: 4px;
    background: var(--primary-light);
    z-index: 1;
}

.process-step {
    display: flex;
    gap: 30px;
    margin-bottom: 40px;
    position: relative;
    z-index: 2;
}

.step-number {
    width: 80px;
    height: 80px;
    background: var(--primary-color);
    color: var(--white);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    font-weight: 700;
    flex-shrink: 0;
    box-shadow: 0 5px 15px rgba(0, 99, 45, 0.3);
}

.step-content {
    flex: 1;
    background: var(--white);
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

.step-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 10px;
}

.step-description {
    color: #666;
    margin-bottom: 15px;
}

.step-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.step-list li {
    padding: 5px 0;
    padding-left: 25px;
    position: relative;
    color: #555;
}

.step-list li::before {
    content: '✓';
    position: absolute;
    left: 0;
    color: var(--primary-color);
    font-weight: bold;
}

/* Critères d'Éligibilité */
.criteria-card {
    background: var(--white);
    border-radius: 15px;
    padding: 25px;
    height: 100%;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    border: 1px solid var(--border-color);
    transition: all 0.3s ease;
}

.criteria-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
}

.criteria-icon {
    width: 60px;
    height: 60px;
    background: var(--primary-light);
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    color: var(--primary-color);
    font-size: 1.5rem;
}

.criteria-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 15px;
}

.criteria-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.criteria-list li {
    padding: 8px 0;
    padding-left: 25px;
    position: relative;
    font-size: 0.95rem;
}

.criteria-list li::before {
    position: absolute;
    left: 0;
    top: 10px;
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
}

.criteria-list li.valid::before {
    content: '\f00c';
    color: var(--success-color);
}

.criteria-list li.invalid::before {
    content: '\f00d';
    color: var(--danger-color);
}

.criteria-note {
    display: block;
    margin-top: 10px;
    font-size: 0.8rem;
    color: #666;
    font-style: italic;
}

/* FAQ & Contact */
.faq-card, .contact-card {
    background: var(--white);
    border-radius: 15px;
    padding: 30px;
    height: 100%;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
}

.faq-title, .contact-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 25px;
    display: flex;
    align-items: center;
}

.faq-title i {
    color: var(--primary-color);
}

.contact-title i {
    color: var(--primary-color);
}

.quick-accordion .accordion-item {
    border: 1px solid var(--border-color);
    border-radius: 10px;
    margin-bottom: 10px;
    overflow: hidden;
}

.quick-accordion .accordion-button {
    background: var(--white);
    color: var(--dark);
    font-weight: 600;
    padding: 15px;
    font-size: 1rem;
}

.quick-accordion .accordion-button:not(.collapsed) {
    background: var(--primary-light);
    color: var(--primary-color);
}

.quick-accordion .accordion-body {
    padding: 20px;
    color: #666;
    line-height: 1.6;
}

.contact-text {
    color: #666;
    margin-bottom: 25px;
    line-height: 1.6;
}

.contact-info {
    margin-bottom: 20px;
}

.contact-item {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 15px;
    padding: 15px;
    background: var(--light-gray);
    border-radius: 10px;
}

.contact-item i {
    width: 40px;
    height: 40px;
    background: var(--primary-color);
    color: var(--white);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
}

.item-label {
    display: block;
    font-size: 0.85rem;
    color: #666;
}

.item-value {
    display: block;
    font-weight: 600;
    color: var(--dark);
}

.contact-buttons {
    display: flex;
    gap: 10px;
}

.contact-buttons .btn {
    flex: 1;
}

/* CTA Final */
.programs-cta {
    border-radius: 15px;
    margin-top: 50px;
}

.cta-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 15px;
}

.cta-text {
    font-size: 1.2rem;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto;
}

.cta-buttons .btn {
    padding: 12px 30px;
    font-weight: 600;
}

.btn-outline-light {
    border-width: 2px;
}

.btn-outline-light:hover {
    background: rgba(255, 255, 255, 0.1);
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
    
    .process-steps::before {
        left: 40px;
    }
    
    .process-step {
        gap: 20px;
    }
    
    .step-number {
        width: 60px;
        height: 60px;
        font-size: 1.5rem;
    }
    
    .call-footer {
        flex-direction: column;
    }
    
    .contact-buttons {
        flex-direction: column;
    }
    
    .cta-title {
        font-size: 1.8rem;
    }
    
    .cta-buttons {
        flex-direction: column;
        gap: 15px;
    }
    
    .cta-buttons .btn {
        width: 100%;
        margin: 5px 0;
    }
}
</style>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation des cartes de programmes
    const programCards = document.querySelectorAll('.program-card, .call-card');
    
    programCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        
        setTimeout(() => {
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 200);
    });

    // Boutons de détails des programmes
    const detailButtons = document.querySelectorAll('.program-details-btn');
    detailButtons.forEach(button => {
        button.addEventListener('click', function() {
            const card = this.closest('.program-card');
            const title = card.querySelector('.program-title').textContent;
            
            // Animation de clic
            this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Chargement...';
            this.disabled = true;
            
            // Simulation d'ouverture de modal
            setTimeout(() => {
                // Ici vous pourriez ouvrir une modal avec les détails
                alert(`Détails du programme: ${title}\n\nCette fonctionnalité ouvrirait normalement une modal avec tous les détails du programme.`);
                
                this.innerHTML = 'Voir les détails <i class="fas fa-arrow-right ms-2"></i>';
                this.disabled = false;
            }, 1000);
        });
    });

    // Boutons de candidature
    const applyButtons = document.querySelectorAll('.call-footer .btn-primary');
    applyButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Préparation...';
            this.disabled = true;
            
            // Simulation de processus de candidature
            setTimeout(() => {
                // Ici vous redirigeriez vers le formulaire de candidature
                // window.location.href = '/candidature';
                
                // Pour l'exemple, on montre une simulation
                this.innerHTML = '<i class="fas fa-check me-2"></i> Formulaire ouvert';
                this.classList.remove('btn-primary');
                this.classList.add('btn-success');
                
                // Réinitialiser après 3 secondes
                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.disabled = false;
                    this.classList.remove('btn-success');
                    this.classList.add('btn-primary');
                }, 3000);
            }, 1500);
        });
    });

    // Bouton de chat en direct
    const chatButton = document.querySelector('.contact-buttons .btn-primary');
    if (chatButton) {
        chatButton.addEventListener('click', function(e) {
            e.preventDefault();
            
            const chatStatus = document.createElement('div');
            chatStatus.className = 'alert alert-info mt-3';
            chatStatus.innerHTML = `
                <i class="fas fa-comments me-2"></i>
                <strong>Service de Chat</strong><br>
                Le chat en direct sera disponible du lundi au vendredi, de 8h à 17h.
                <div class="mt-2">
                    <button class="btn btn-sm btn-outline-info" onclick="this.parentElement.parentElement.remove()">
                        Fermer
                    </button>
                </div>
            `;
            
            this.parentElement.appendChild(chatStatus);
        });
    }

    // Animation des étapes du processus
    const processSteps = document.querySelectorAll('.process-step');
    const observerOptions = {
        threshold: 0.2,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const stepNumber = entry.target.querySelector('.step-number');
                const stepContent = entry.target.querySelector('.step-content');
                
                stepNumber.style.transform = 'scale(1.1)';
                stepContent.style.transform = 'translateX(10px)';
                
                setTimeout(() => {
                    stepNumber.style.transform = 'scale(1)';
                    stepContent.style.transform = 'translateX(0)';
                }, 300);
                
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    processSteps.forEach(step => observer.observe(step));

    // Compteur de jours pour les dates limites
    const deadlineDates = document.querySelectorAll('.call-date');
    deadlineDates.forEach(dateElement => {
        const day = parseInt(dateElement.querySelector('.date-day').textContent);
        const month = dateElement.querySelector('.date-month').textContent;
        
        // Vous pourriez ajouter une logique pour calculer les jours restants
        // et ajouter un compteur dynamique
    });
});
</script>
@endsection