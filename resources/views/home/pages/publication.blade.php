@extends('home.layouts.template')
@section('content')

<!-- Hero Section Publications -->
<section class="publications-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="hero-title">
                    <span class="text-primary">Publications</span> & Ressources
                </h1>
                <p class="hero-subtitle">
                    Documentation officielle, guides, formulaires et ressources utiles pour les entreprises industrielles
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <div class="hero-stats">
                    <div class="stat-badge">
                        <i class="fas fa-file-pdf me-2"></i>
                        <span>48 Documents</span>
                    </div>
                    <div class="stat-badge">
                        <i class="fas fa-download me-2"></i>
                        <span>2,500+ Téléchargements</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Catégories de Publications -->
<section class="categories-section py-5">
    <div class="container">
        <h3 class="section-subtitle mb-4">Parcourir par Catégorie</h3>
        
        <div class="row g-4">
            <!-- Catégorie 1 -->
            <div class="col-md-6 col-lg-3">
                <a href="#rapports" class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <h4 class="category-title">Rapports</h4>
                    <p class="category-count">12 documents</p>
                    <div class="category-arrow">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </a>
            </div>

            <!-- Catégorie 2 -->
            <div class="col-md-6 col-lg-3">
                <a href="#guides" class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <h4 class="category-title">Guides</h4>
                    <p class="category-count">8 documents</p>
                    <div class="category-arrow">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </a>
            </div>

            <!-- Catégorie 3 -->
            <div class="col-md-6 col-lg-3">
                <a href="#formulaires" class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h4 class="category-title">Formulaires</h4>
                    <p class="category-count">15 documents</p>
                    <div class="category-arrow">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </a>
            </div>

            <!-- Catégorie 4 -->
            <div class="col-md-6 col-lg-3">
                <a href="#lois" class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-gavel"></i>
                    </div>
                    <h4 class="category-title">Textes Réglementaires</h4>
                    <p class="category-count">13 documents</p>
                    <div class="category-arrow">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Publications Récentes -->
<section class="recent-publications py-5 bg-light" id="rapports">
    <div class="container">
        <div class="section-header d-flex justify-content-between align-items-center mb-5">
            <div>
                <h2 class="section-title">Rapports d'Activités</h2>
                <p class="section-subtitle">Documents officiels et rapports annuels</p>
            </div>
            <a href="#" class="btn btn-outline-primary">
                Voir tous <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>

        <div class="row g-4">
            <!-- Rapport 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="publication-card">
                    <div class="publication-badge">
                        <span class="badge-icon">PDF</span>
                        <span class="badge-size">2.4 MB</span>
                    </div>
                    <div class="publication-icon">
                        <i class="fas fa-file-pdf"></i>
                    </div>
                    <h4 class="publication-title">
                        Rapport Annuel d'Activités 2023
                    </h4>
                    <p class="publication-description">
                        Bilan complet des activités, réalisations et performances du FREMIN pour l'année 2023.
                    </p>
                    <div class="publication-meta">
                        <span class="meta-item">
                            <i class="far fa-calendar me-1"></i>
                            Janvier 2024
                        </span>
                        <span class="meta-item">
                            <i class="far fa-file me-1"></i>
                            48 pages
                        </span>
                    </div>
                    <div class="publication-footer">
                        <button class="btn btn-primary btn-sm preview-btn">
                            <i class="far fa-eye me-1"></i> Aperçu
                        </button>
                        <a href="#" class="download-btn">
                            <i class="fas fa-download me-1"></i> Télécharger
                        </a>
                    </div>
                </div>
            </div>

            <!-- Rapport 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="publication-card">
                    <div class="publication-badge">
                        <span class="badge-icon">PDF</span>
                        <span class="badge-size">1.8 MB</span>
                    </div>
                    <div class="publication-icon">
                        <i class="fas fa-file-pdf"></i>
                    </div>
                    <h4 class="publication-title">
                        Rapport Trimestriel Q4 2023
                    </h4>
                    <p class="publication-description">
                        Activités et résultats du quatrième trimestre 2023 avec analyse des indicateurs clés.
                    </p>
                    <div class="publication-meta">
                        <span class="meta-item">
                            <i class="far fa-calendar me-1"></i>
                            Décembre 2023
                        </span>
                        <span class="meta-item">
                            <i class="far fa-file me-1"></i>
                            32 pages
                        </span>
                    </div>
                    <div class="publication-footer">
                        <button class="btn btn-primary btn-sm preview-btn">
                            <i class="far fa-eye me-1"></i> Aperçu
                        </button>
                        <a href="#" class="download-btn">
                            <i class="fas fa-download me-1"></i> Télécharger
                        </a>
                    </div>
                </div>
            </div>

            <!-- Rapport 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="publication-card">
                    <div class="publication-badge">
                        <span class="badge-icon">PDF</span>
                        <span class="badge-size">3.2 MB</span>
                    </div>
                    <div class="publication-icon">
                        <i class="fas fa-file-pdf"></i>
                    </div>
                    <h4 class="publication-title">
                        Étude sur la Compétitivité Industrielle
                    </h4>
                    <p class="publication-description">
                        Analyse approfondie de la compétitivité des entreprises industrielles en Côte d'Ivoire.
                    </p>
                    <div class="publication-meta">
                        <span class="meta-item">
                            <i class="far fa-calendar me-1"></i>
                            Novembre 2023
                        </span>
                        <span class="meta-item">
                            <i class="far fa-file me-1"></i>
                            64 pages
                        </span>
                    </div>
                    <div class="publication-footer">
                        <button class="btn btn-primary btn-sm preview-btn">
                            <i class="far fa-eye me-1"></i> Aperçu
                        </button>
                        <a href="#" class="download-btn">
                            <i class="fas fa-download me-1"></i> Télécharger
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Guides Méthodologiques -->
<section class="guides-section py-5" id="guides">
    <div class="container">
        <div class="section-header d-flex justify-content-between align-items-center mb-5">
            <div>
                <h2 class="section-title">Guides Méthodologiques</h2>
                <p class="section-subtitle">Documentation pratique pour les entreprises</p>
            </div>
            <a href="#" class="btn btn-outline-primary">
                Voir tous <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>

        <div class="row g-4">
            <!-- Guide 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="guide-card">
                    <div class="guide-header">
                        <div class="guide-icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <div class="guide-badge">
                            <span class="badge-new">Nouveau</span>
                        </div>
                    </div>
                    <h4 class="guide-title">
                        Guide de Modernisation Industrielle
                    </h4>
                    <p class="guide-description">
                        Procédures et étapes pour la modernisation des unités de production.
                    </p>
                    <ul class="guide-features">
                        <li><i class="fas fa-check-circle"></i> 10 étapes pratiques</li>
                        <li><i class="fas fa-check-circle"></i> Études de cas</li>
                        <li><i class="fas fa-check-circle"></i> Checklist d'audit</li>
                    </ul>
                    <div class="guide-footer">
                        <span class="guide-pages">
                            <i class="far fa-file me-1"></i> 56 pages
                        </span>
                        <a href="#" class="guide-download">
                            <i class="fas fa-download"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Guide 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="guide-card">
                    <div class="guide-header">
                        <div class="guide-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                    </div>
                    <h4 class="guide-title">
                        Manuel de Gestion Financière
                    </h4>
                    <p class="guide-description">
                        Outils et méthodes pour une gestion financière optimale des PME industrielles.
                    </p>
                    <ul class="guide-features">
                        <li><i class="fas fa-check-circle"></i> Tableaux de bord</li>
                        <li><i class="fas fa-check-circle"></i> Indicateurs clés</li>
                        <li><i class="fas fa-check-circle"></i> Modèles Excel</li>
                    </ul>
                    <div class="guide-footer">
                        <span class="guide-pages">
                            <i class="far fa-file me-1"></i> 42 pages
                        </span>
                        <a href="#" class="guide-download">
                            <i class="fas fa-download"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Guide 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="guide-card">
                    <div class="guide-header">
                        <div class="guide-icon">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <div class="guide-badge">
                            <span class="badge-important">Important</span>
                        </div>
                    </div>
                    <h4 class="guide-title">
                        Guide des Normes Environnementales
                    </h4>
                    <p class="guide-description">
                        Conformité aux normes environnementales pour les industries.
                    </p>
                    <ul class="guide-features">
                        <li><i class="fas fa-check-circle"></i> Réglementations</li>
                        <li><i class="fas fa-check-circle"></i> Certifications</li>
                        <li><i class="fas fa-check-circle"></i> Bonnes pratiques</li>
                    </ul>
                    <div class="guide-footer">
                        <span class="guide-pages">
                            <i class="far fa-file me-1"></i> 38 pages
                        </span>
                        <a href="#" class="guide-download">
                            <i class="fas fa-download"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Formulaires -->
<section class="forms-section py-5 bg-light" id="formulaires">
    <div class="container">
        <div class="section-header mb-5">
            <h2 class="section-title">Formulaires Téléchargeables</h2>
            <p class="section-subtitle">Documents administratifs pour vos démarches</p>
        </div>

        <div class="table-responsive">
            <table class="table forms-table">
                <thead>
                    <tr>
                        <th>Formulaire</th>
                        <th>Description</th>
                        <th>Format</th>
                        <th>Taille</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Formulaire 1 -->
                    <tr>
                        <td>
                            <div class="form-name">
                                <i class="fas fa-file-word text-primary me-2"></i>
                                <strong>Demande d'Appui Technique</strong>
                            </div>
                        </td>
                        <td>
                            Formulaire pour solliciter un appui technique du FREMIN
                        </td>
                        <td>
                            <span class="format-badge word">DOCX</span>
                        </td>
                        <td>245 KB</td>
                        <td>
                            <div class="form-actions">
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="far fa-eye"></i>
                                </button>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-download"></i>
                                </a>
                            </div>
                        </td>
                    </tr>

                    <!-- Formulaire 2 -->
                    <tr>
                        <td>
                            <div class="form-name">
                                <i class="fas fa-file-excel text-success me-2"></i>
                                <strong>Fiche d'Évaluation</strong>
                            </div>
                        </td>
                        <td>
                            Formulaire d'évaluation des besoins en modernisation
                        </td>
                        <td>
                            <span class="format-badge excel">XLSX</span>
                        </td>
                        <td>180 KB</td>
                        <td>
                            <div class="form-actions">
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="far fa-eye"></i>
                                </button>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-download"></i>
                                </a>
                            </div>
                        </td>
                    </tr>

                    <!-- Formulaire 3 -->
                    <tr>
                        <td>
                            <div class="form-name">
                                <i class="fas fa-file-pdf text-danger me-2"></i>
                                <strong>Dossier de Candidature</strong>
                            </div>
                        </td>
                        <td>
                            Dossier complet pour candidater aux programmes du FREMIN
                        </td>
                        <td>
                            <span class="format-badge pdf">PDF</span>
                        </td>
                        <td>1.2 MB</td>
                        <td>
                            <div class="form-actions">
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="far fa-eye"></i>
                                </button>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-download"></i>
                                </a>
                            </div>
                        </td>
                    </tr>

                    <!-- Formulaire 4 -->
                    <tr>
                        <td>
                            <div class="form-name">
                                <i class="fas fa-file-alt text-info me-2"></i>
                                <strong>Rapport de Suivi</strong>
                            </div>
                        </td>
                        <td>
                            Formulaire de rapport mensuel pour entreprises accompagnées
                        </td>
                        <td>
                            <span class="format-badge word">DOCX</span>
                        </td>
                        <td>195 KB</td>
                        <td>
                            <div class="form-actions">
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="far fa-eye"></i>
                                </button>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-download"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Textes Réglementaires -->
<section class="regulations-section py-5" id="lois">
    <div class="container">
        <div class="section-header mb-5">
            <h2 class="section-title">Textes Réglementaires</h2>
            <p class="section-subtitle">Lois et décrets relatifs au secteur industriel</p>
        </div>

        <div class="accordion regulations-accordion" id="regulationsAccordion">
            <!-- Article 1 -->
            <div class="accordion-item">
                <h3 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#regulation1">
                        <i class="fas fa-gavel me-3"></i>
                        Loi Portant Création du FREMIN
                    </button>
                </h3>
                <div id="regulation1" class="accordion-collapse collapse show" data-bs-parent="#regulationsAccordion">
                    <div class="accordion-body">
                        <div class="regulation-info">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5>Loi n°2020-123 du 15 janvier 2020</h5>
                                    <p class="mb-3">
                                        Loi portant création, organisation et fonctionnement du Fonds de Restructuration 
                                        et de Mise à Niveau des Entreprises Industrielles (FREMIN).
                                    </p>
                                    <div class="regulation-meta">
                                        <span class="meta-item">
                                            <i class="far fa-calendar me-1"></i>
                                            Promulguée le 15/01/2020
                                        </span>
                                        <span class="meta-item">
                                            <i class="far fa-file me-1"></i>
                                            12 articles
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4 text-md-end">
                                    <a href="#" class="btn btn-primary">
                                        <i class="fas fa-download me-2"></i>
                                        Télécharger
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Article 2 -->
            <div class="accordion-item">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#regulation2">
                        <i class="fas fa-gavel me-3"></i>
                        Décret d'Application
                    </button>
                </h3>
                <div id="regulation2" class="accordion-collapse collapse" data-bs-parent="#regulationsAccordion">
                    <div class="accordion-body">
                        <div class="regulation-info">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5>Décret n°2020-456 du 20 mars 2020</h5>
                                    <p class="mb-3">
                                        Décret portant application de la loi créant le FREMIN et fixant les modalités 
                                        de son organisation et de son fonctionnement.
                                    </p>
                                    <div class="regulation-meta">
                                        <span class="meta-item">
                                            <i class="far fa-calendar me-1"></i>
                                            Signé le 20/03/2020
                                        </span>
                                        <span class="meta-item">
                                            <i class="far fa-file me-1"></i>
                                            8 articles
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4 text-md-end">
                                    <a href="#" class="btn btn-primary">
                                        <i class="fas fa-download me-2"></i>
                                        Télécharger
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Article 3 -->
            <div class="accordion-item">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#regulation3">
                        <i class="fas fa-gavel me-3"></i>
                        Arrêté Ministériel
                    </button>
                </h3>
                <div id="regulation3" class="accordion-collapse collapse" data-bs-parent="#regulationsAccordion">
                    <div class="accordion-body">
                        <div class="regulation-info">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5>Arrêté n°2021-789 du 15 juin 2021</h5>
                                    <p class="mb-3">
                                        Arrêté fixant les conditions d'éligibilité et les modalités d'octroi des appuis 
                                        techniques et financiers du FREMIN.
                                    </p>
                                    <div class="regulation-meta">
                                        <span class="meta-item">
                                            <i class="far fa-calendar me-1"></i>
                                            Signé le 15/06/2021
                                        </span>
                                        <span class="meta-item">
                                            <i class="far fa-file me-1"></i>
                                            15 articles
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4 text-md-end">
                                    <a href="#" class="btn btn-primary">
                                        <i class="fas fa-download me-2"></i>
                                        Télécharger
                                    </a>
                                </div>
                            </div>
                        </div>
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
.publications-hero {
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

/* Catégories */
.category-card {
    display: block;
    background: var(--white);
    border-radius: 15px;
    padding: 30px 25px;
    text-decoration: none;
    color: var(--dark);
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    border: 1px solid var(--border-color);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    height: 100%;
}

.category-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    border-color: var(--primary-color);
}

.category-card:hover .category-arrow {
    transform: translateX(5px);
    color: var(--primary-color);
}

.category-icon {
    width: 70px;
    height: 70px;
    background: var(--primary-light);
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    color: var(--primary-color);
    font-size: 1.8rem;
}

.category-title {
    font-size: 1.3rem;
    font-weight: 700;
    margin-bottom: 8px;
    color: var(--dark);
}

.category-count {
    color: #666;
    font-size: 0.9rem;
    margin-bottom: 15px;
}

.category-arrow {
    position: absolute;
    bottom: 25px;
    right: 25px;
    color: #999;
    transition: all 0.3s ease;
}

/* Publications Cards */
.publication-card {
    background: var(--white);
    border-radius: 15px;
    padding: 25px;
    height: 100%;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    border: 1px solid var(--border-color);
    transition: all 0.3s ease;
    position: relative;
}

.publication-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
}

.publication-badge {
    position: absolute;
    top: 20px;
    right: 20px;
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 5px;
}

.badge-icon {
    background: #ff6b00;
    color: white;
    padding: 3px 10px;
    border-radius: 5px;
    font-size: 0.8rem;
    font-weight: 600;
}

.badge-size {
    background: var(--light-gray);
    color: #666;
    padding: 2px 8px;
    border-radius: 3px;
    font-size: 0.75rem;
}

.publication-icon {
    width: 60px;
    height: 60px;
    background: var(--primary-light);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    color: var(--primary-color);
    font-size: 1.5rem;
}

.publication-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 15px;
    line-height: 1.4;
}

.publication-description {
    color: #666;
    font-size: 0.95rem;
    line-height: 1.6;
    margin-bottom: 20px;
}

.publication-meta {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
    font-size: 0.9rem;
    color: #666;
}

.meta-item {
    display: flex;
    align-items: center;
}

.publication-footer {
    display: flex;
    gap: 10px;
    padding-top: 20px;
    border-top: 1px solid var(--border-color);
}

.preview-btn, .download-btn {
    flex: 1;
    text-align: center;
    padding: 8px 15px;
    border-radius: 8px;
    font-size: 0.9rem;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
}

.preview-btn {
    background: var(--primary-light);
    color: var(--primary-color);
    border: none;
}

.preview-btn:hover {
    background: #d4ecd5;
}

.download-btn {
    background: var(--primary-color);
    color: var(--white);
}

.download-btn:hover {
    background: #004d24;
    color: var(--white);
}

/* Guide Cards */
.guide-card {
    background: var(--white);
    border-radius: 15px;
    padding: 25px;
    height: 100%;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    border: 1px solid var(--border-color);
    transition: all 0.3s ease;
}

.guide-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
}

.guide-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 20px;
}

.guide-icon {
    width: 60px;
    height: 60px;
    background: var(--primary-light);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-color);
    font-size: 1.5rem;
}

.guide-badge .badge-new {
    background: #ff6b00;
    color: white;
    padding: 4px 10px;
    border-radius: 5px;
    font-size: 0.75rem;
    font-weight: 600;
}

.guide-badge .badge-important {
    background: #dc3545;
    color: white;
    padding: 4px 10px;
    border-radius: 5px;
    font-size: 0.75rem;
    font-weight: 600;
}

.guide-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 15px;
}

.guide-description {
    color: #666;
    font-size: 0.95rem;
    line-height: 1.6;
    margin-bottom: 20px;
}

.guide-features {
    list-style: none;
    padding: 0;
    margin-bottom: 25px;
}

.guide-features li {
    margin-bottom: 8px;
    font-size: 0.9rem;
    color: #555;
    display: flex;
    align-items: center;
}

.guide-features i {
    color: var(--primary-color);
    margin-right: 10px;
    font-size: 0.9rem;
}

.guide-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 20px;
    border-top: 1px solid var(--border-color);
}

.guide-pages {
    font-size: 0.9rem;
    color: #666;
    display: flex;
    align-items: center;
}

.guide-download {
    width: 40px;
    height: 40px;
    background: var(--primary-color);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: all 0.3s ease;
}

.guide-download:hover {
    background: #004d24;
    transform: scale(1.1);
}

/* Table des Formulaires */
.forms-table {
    background: var(--white);
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

.forms-table thead {
    background: var(--primary-light);
}

.forms-table th {
    font-weight: 600;
    color: var(--dark);
    padding: 15px 20px;
    border-bottom: 2px solid var(--border-color);
}

.forms-table td {
    padding: 15px 20px;
    vertical-align: middle;
    border-bottom: 1px solid var(--border-color);
}

.form-name {
    display: flex;
    align-items: center;
}

.format-badge {
    padding: 4px 10px;
    border-radius: 5px;
    font-size: 0.8rem;
    font-weight: 600;
}

.format-badge.word {
    background: #e3f2fd;
    color: #1976d2;
}

.format-badge.excel {
    background: #e8f5e9;
    color: #2e7d32;
}

.format-badge.pdf {
    background: #ffebee;
    color: #c62828;
}

.form-actions {
    display: flex;
    gap: 8px;
}

/* Accordéon Réglementations */
.regulations-accordion .accordion-item {
    border: 1px solid var(--border-color);
    border-radius: 10px;
    margin-bottom: 15px;
    overflow: hidden;
}

.regulations-accordion .accordion-button {
    background: var(--white);
    color: var(--dark);
    font-weight: 600;
    padding: 20px;
    font-size: 1.1rem;
}

.regulations-accordion .accordion-button:not(.collapsed) {
    background: var(--primary-light);
    color: var(--primary-color);
}

.regulations-accordion .accordion-button i {
    color: var(--primary-color);
}

.regulations-accordion .accordion-body {
    padding: 25px;
    background: var(--white);
}

.regulation-info h5 {
    color: var(--primary-color);
    font-weight: 700;
    margin-bottom: 10px;
}

.regulation-meta {
    display: flex;
    gap: 20px;
    margin-top: 15px;
    font-size: 0.9rem;
    color: #666;
}

/* Zone de Téléchargement */
.download-zone {
    border-radius: 15px;
    margin-top: 50px;
}

.download-title {
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 10px;
}

.download-text {
    font-size: 1.1rem;
    opacity: 0.9;
    margin-bottom: 20px;
}

.download-info {
    display: flex;
    gap: 30px;
    flex-wrap: wrap;
}

.info-item {
    display: flex;
    align-items: center;
    font-size: 0.95rem;
    opacity: 0.9;
}

.btn-light {
    background: var(--white);
    color: var(--primary-color);
    font-weight: 600;
    padding: 12px 30px;
    transition: all 0.3s ease;
}

.btn-light:hover {
    background: #f8f9fa;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(255,255,255,0.2);
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
    
    .section-header {
        flex-direction: column;
        text-align: center;
        gap: 15px;
    }
    
    .forms-table {
        font-size: 0.9rem;
    }
    
    .form-actions {
        flex-direction: column;
    }
    
    .download-info {
        flex-direction: column;
        gap: 10px;
    }
}
</style>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation des cartes au scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Observer les cartes
    document.querySelectorAll('.category-card, .publication-card, .guide-card').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        observer.observe(card);
    });
    
    // Boutons d'aperçu
    const previewButtons = document.querySelectorAll('.preview-btn');
    previewButtons.forEach(button => {
        button.addEventListener('click', function() {
            const card = this.closest('.publication-card');
            const title = card.querySelector('.publication-title').textContent;
            
            // Simuler l'ouverture d'un aperçu
            this.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Chargement...';
            this.disabled = true;
            
            setTimeout(() => {
                this.innerHTML = '<i class="fas fa-check me-1"></i> Aperçu ouvert';
                setTimeout(() => {
                    this.innerHTML = '<i class="far fa-eye me-1"></i> Aperçu';
                    this.disabled = false;
                }, 2000);
            }, 1500);
        });
    });
    
    // Bouton de téléchargement complet
    const downloadAllBtn = document.querySelector('.download-zone .btn-light');
    if (downloadAllBtn) {
        downloadAllBtn.addEventListener('click', function() {
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Téléchargement...';
            this.disabled = true;
            
            setTimeout(() => {
                this.innerHTML = '<i class="fas fa-check me-2"></i> Téléchargement terminé';
                this.classList.remove('btn-light');
                this.classList.add('btn-success');
                
                // Revenir à l'état initial après 3 secondes
                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.disabled = false;
                    this.classList.remove('btn-success');
                    this.classList.add('btn-light');
                }, 3000);
            }, 2000);
        });
    }
    
    // Navigation ancrée
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            if (targetId !== '#') {
                e.preventDefault();
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });
});
</script>
@endsection