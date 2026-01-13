@extends('home.layouts.template')
@section('content')

    @php
        // Récupérer les publications par type
        $rapports = App\Models\Publication::where('type', 'rapport')->published()->recent(3)->get();
        $etudes = App\Models\Publication::where('type', 'etude')->published()->recent(3)->get();
        $guides = App\Models\Publication::where('type', 'guide')->published()->recent(3)->get();
        $brochures = App\Models\Publication::where('type', 'brochure')->published()->recent(3)->get();
        $autres = App\Models\Publication::where('type', 'autre')->published()->recent(3)->get();

        // Statistiques
        $totalPublications = App\Models\Publication::published()->count();
        $totalDownloads = App\Models\Publication::published()->sum('downloads');
    @endphp
    <!-- Hero Section Publications -->
    <section class="publications-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="hero-title">
                        <span class="text-primary">Publications</span> & Ressources
                    </h1>
                    <p class="hero-subtitle">
                        Documentation officielle, guides, formulaires et ressources utiles pour les entreprises
                        industrielles
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <div class="hero-stats">
                        <div class="stat-badge">
                            <i class="fas fa-file-pdf me-2"></i>
                            <span>{{ $totalPublications }} Documents</span>
                        </div>
                        <div class="stat-badge">
                            <i class="fas fa-download me-2"></i>
                            <span>{{ number_format($totalDownloads) }}+ Téléchargements totaux</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Catégories de Publications -->
    <section class="categories-section py-5">
        <div class="container">
            <h3 class="section-subtitle mb-4">Parcourir par catégorie</h3>

            <div class="row g-4">
                <!-- Catégorie 1 -->
                <div class="col-md-6 col-lg-3">
                    <a href="#rapports" class="category-card">
                        <div class="category-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <h4 class="category-title">Rapports d'Activité</h4>
                        <p class="category-count">{{ $rapports->count() }} Documents</p>
                        <div class="category-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>
                </div>

                <!-- Catégorie 2 -->
                <div class="col-md-6 col-lg-3">
                    <a href="#etudes" class="category-card">
                        <div class="category-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h4 class="category-title">Études & Analyses</h4>
                        <p class="category-count">{{ $etudes->count() }} Documents</p>
                        <div class="category-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>
                </div>

                <!-- Catégorie 3 -->
                <div class="col-md-6 col-lg-3">
                    <a href="#guides" class="category-card">
                        <div class="category-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <h4 class="category-title">Guides Pratiques</h4>
                        <p class="category-count">{{ $guides->count() }} Documents</p>
                        <div class="category-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>
                </div>

                <!-- Catégorie 4 -->
                <div class="col-md-6 col-lg-3">
                    <a href="#brochures" class="category-card">
                        <div class="category-icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <h4 class="category-title">Brochures & Médias</h4>
                        <p class="category-count">{{ $brochures->count() }} Documents</p>
                        <div class="category-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>


    @if($rapports->count() > 0)
        <section class="recent-publications py-5 bg-light" id="rapports">
            <div class="container">
                <div class="section-header d-flex justify-content-between align-items-center mb-5">
                    <div>
                        <h2 class="section-title">
                            <i class="fas fa-chart-bar me-3"></i>
                            Rapports d'Activité
                        </h2>
                        <p class="section-subtitle">Retrouvez tous nos rapports annuels et bilans d'activités</p>
                    </div>
                    <a href="{{ route('publications.index') }}?type=rapport" class="btn btn-outline-primary">
                        Voir tout <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>

                <div class="row g-4">
                    @foreach($rapports as $publication)
                        <div class="col-md-6 col-lg-4">
                            <div class="publication-card">
                                <div class="publication-badge">
                                    <span class="badge-icon">{{ $publication->file_format }}</span>
                                    <span class="badge-size">{{ $publication->file_size }}</span>
                                </div>
                                <div class="publication-icon">
                                    <i class="{{ $publication->type_icon }}"></i>
                                </div>
                                <h4 class="publication-title">
                                    {{ $publication->title }}
                                </h4>
                                <p class="publication-description">
                                    {{ $publication->short_description }}
                                </p>
                                <div class="publication-meta">
                                    <span class="meta-item">
                                        <i class="far fa-calendar me-1"></i>
                                        {{ $publication->formatted_date }}
                                    </span>
                                    @if($publication->page_count)
                                        <span class="meta-item">
                                            <i class="far fa-file me-1"></i>
                                            {{ $publication->page_count }} pages
                                        </span>
                                    @endif
                                </div>
                                <div class="publication-footer">
                                    <button class="btn btn-primary btn-sm preview-btn" data-bs-toggle="modal"
                                        data-bs-target="#previewModal{{ $publication->id }}">
                                        <i class="far fa-eye me-1"></i> Aperçu
                                    </button>
                                    <a href="{{ route('publications.download', $publication) }}" class="download-btn"
                                        target="_blank">
                                        <i class="fas fa-download me-1"></i> Télécharger
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if($etudes->count() > 0)
        <section class="guides-section py-5" id="etudes">
            <div class="container">
                <div class="section-header d-flex justify-content-between align-items-center mb-5">
                    <div>
                        <h2 class="section-title">
                            <i class="fas fa-chart-line me-3"></i>
                            Études & Analyses Industriel
                        </h2>
                        <p class="section-subtitle">Analyses approfondies du secteur industriel ivoirien</p>
                    </div>
                    <a href="{{ route('publications.index') }}?type=etude" class="btn btn-outline-primary">
                        Voir tout <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>

                <div class="row g-4">
                    @foreach($etudes as $publication)
                        <div class="col-md-6 col-lg-4">
                            <div class="guide-card">
                                <div class="guide-header">
                                    <div class="guide-icon">
                                        <i class="{{ $publication->type_icon }}"></i>
                                    </div>
                                    @if($publication->is_featured)
                                        <div class="guide-badge">
                                            <span class="badge-important">Mise en avant</span>
                                        </div>
                                    @endif
                                </div>
                                <h4 class="guide-title">
                                    {{ $publication->title }}
                                </h4>
                                <p class="guide-description">
                                    {{ $publication->short_description }}
                                </p>
                                <div class="guide-meta">
                                    <span class="meta-item">
                                        <i class="far fa-calendar me-1"></i>
                                        {{ $publication->formatted_date }}
                                    </span>
                                    @if($publication->page_count)
                                        <span class="meta-item">
                                            <i class="far fa-file me-1"></i>
                                            {{ $publication->page_count }} Pages
                                        </span>
                                    @endif
                                </div>
                                <div class="guide-footer">
                                    <span class="guide-pages">
                                        <i class="fas fa-download me-1"></i>
                                        {{ $publication->downloads }} téléchargements
                                    </span>
                                    <div class="guide-actions">
                                        <button class="btn btn-sm btn-outline-primary preview-btn" data-bs-toggle="modal"
                                            data-bs-target="#previewModal{{ $publication->id }}">
                                            <i class="far fa-eye"></i>
                                        </button>
                                        <a href="{{ route('publications.download', $publication) }}" class="btn btn-sm btn-primary"
                                            target="_blank">
                                            <i class="fas fa-download"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if($guides->count() > 0)
        <section class="guides-section py-5 bg-light" id="guides">
            <div class="container">
                <div class="section-header d-flex justify-content-between align-items-center mb-5">
                    <div>
                        <h2 class="section-title">
                            <i class="fas fa-book me-3"></i>
                            Guides Pratiques & Formulaires
                        </h2>
                        <p class="section-subtitle">Accompagnement étape par étape dans vos démarches</p>
                    </div>
                    <a href="{{ route('publications.index') }}?type=guide" class="btn btn-outline-primary">
                        Voir tout <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>

                <div class="row g-4">
                    @foreach($guides as $publication)
                        <div class="col-md-6 col-lg-4">
                            <div class="guide-card">
                                <div class="guide-header">
                                    <div class="guide-icon">
                                        <i class="{{ $publication->type_icon }}"></i>
                                    </div>
                                    @if($publication->created_at->diffInDays(now()) < 30)
                                        <div class="guide-badge">
                                            <span class="badge-new">Nouveau</span>
                                        </div>
                                    @endif
                                </div>
                                <h4 class="guide-title">
                                    {{ $publication->title }}
                                </h4>
                                <p class="guide-description">
                                    {{ $publication->short_description }}
                                </p>
                                <div class="guide-meta">
                                    <span class="meta-item">
                                        <i class="far fa-calendar me-1"></i>
                                        {{ $publication->formatted_date }}
                                    </span>
                                    @if($publication->page_count)
                                        <span class="meta-item">
                                            <i class="far fa-file me-1"></i>
                                            {{ $publication->page_count }} pages
                                        </span>
                                    @endif
                                </div>
                                <div class="guide-footer">
                                    <span class="guide-pages">
                                        <i class="fas fa-download me-1"></i>
                                        {{ $publication->downloads }} téléchargements
                                    </span>
                                    <div class="guide-actions">
                                        <button class="btn btn-sm btn-outline-primary preview-btn" data-bs-toggle="modal"
                                            data-bs-target="#previewModal{{ $publication->id }}">
                                            <i class="far fa-eye"></i>
                                        </button>
                                        <a href="{{ route('publications.download', $publication) }}" class="btn btn-sm btn-primary"
                                            target="_blank">
                                            <i class="fas fa-download"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if($brochures->count() > 0)
        <section class="forms-section py-5" id="brochures">
            <div class="container">
                <div class="section-header mb-5">
                    <h2 class="section-title">
                        <i class="fas fa-newspaper me-3"></i>
                        Brochures & Médias
                    </h2>
                    <p class="section-subtitle">Découvrez nos supports de communication et brochures d'information</p>
                </div>

                <div class="row g-4">
                    @foreach($brochures as $publication)
                        <div class="col-md-6 col-lg-4">
                            <div class="brochure-card">
                                <div class="brochure-thumbnail">
                                    <img src="{{ $publication->thumbnail_url }}"
                                        alt="{{ $publication->thumbnail_alt ?? $publication->title }}" class="img-fluid rounded">
                                </div>
                                <div class="brochure-content">
                                    <h4 class="brochure-title">
                                        {{ $publication->title }}
                                    </h4>
                                    <p class="brochure-description">
                                        {{ $publication->short_description }}
                                    </p>
                                    <div class="brochure-footer">
                                        <div class="brochure-meta">
                                            <span class="meta-item">
                                                <i class="far fa-calendar me-1"></i>
                                                {{ $publication->formatted_date }}
                                            </span>
                                            <span class="meta-item">
                                                <i class="fas fa-weight-hanging me-1"></i>
                                                {{ $publication->file_size }}
                                            </span>
                                        </div>
                                        <div class="brochure-actions">
                                            <button class="btn btn-sm btn-outline-primary preview-btn" data-bs-toggle="modal"
                                                data-bs-target="#previewModal{{ $publication->id }}">
                                                <i class="far fa-eye"></i>
                                            </button>
                                            <a href="{{ route('publications.download', $publication) }}"
                                                class="btn btn-sm btn-primary" target="_blank">
                                                <i class="fas fa-download"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if($autres->count() > 0)
        <section class="regulations-section py-5 bg-light" id="autres">
            <div class="container">
                <div class="section-header mb-5">
                    <h2 class="section-title">
                        <i class="fas fa-file-alt me-3"></i>
                        Autres Ressources
                    </h2>
                    <p class="section-subtitle">Textes réglementaires, décrets et autres documents utiles</p>
                </div>

                <div class="accordion regulations-accordion" id="regulationsAccordion">
                    @foreach($autres as $index => $publication)
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#publication{{ $publication->id }}">
                                    <i class="{{ $publication->type_icon }} me-3"></i>
                                    {{ $publication->title }}
                                </button>
                            </h3>
                            <div id="publication{{ $publication->id }}"
                                class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                data-bs-parent="#regulationsAccordion">
                                <div class="accordion-body">
                                    <div class="regulation-info">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h5>{{ $publication->title }}</h5>
                                                <p class="mb-3">{{ $publication->description }}</p>
                                                <div class="regulation-meta">
                                                    <span class="meta-item">
                                                        <i class="far fa-calendar me-1"></i>
                                                        {{ $publication->formatted_date }}
                                                    </span>
                                                    @if($publication->page_count)
                                                        <span class="meta-item">
                                                            <i class="far fa-file me-1"></i>
                                                            {{ $publication->page_count }} pages
                                                        </span>
                                                    @endif
                                                    <span class="meta-item">
                                                        <i class="fas fa-download me-1"></i>
                                                        {{ $publication->downloads }} téléchargements
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 text-md-end">
                                                <a href="{{ route('publications.download', $publication) }}" class="btn btn-primary"
                                                    target="_blank">
                                                    <i class="fas fa-download me-2"></i>
                                                    Télécharger
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif



    <!-- Modals d'aperçu pour toutes les publications -->
    @php
        // Combiner toutes les publications pour les modals
        $allPublications = $rapports->concat($etudes)->concat($guides)->concat($brochures)->concat($autres);
    @endphp

    @foreach($allPublications as $publication)
        <div class="modal fade" id="previewModal{{ $publication->id }}" tabindex="-1"
            aria-labelledby="previewModalLabel{{ $publication->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="previewModalLabel{{ $publication->id }}">
                            <i class="{{ $publication->type_icon }} me-2"></i>
                            {{ $publication->title }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="publication-thumbnail mb-3">
                                    <img src="{{ $publication->thumbnail_url }}"
                                        alt="{{ $publication->thumbnail_alt ?? $publication->title }}"
                                        class="img-fluid rounded">
                                </div>
                                <div class="publication-info">
                                    <div class="info-item mb-2">
                                        <strong><i class="fas fa-tag me-2"></i>Type:</strong>
                                        <span class="badge" style="background: {{ $publication->type_color }};">
                                            {{ $publication->type_text }}
                                        </span>
                                    </div>
                                    <div class="info-item mb-2">
                                        <strong><i class="far fa-calendar me-2"></i>Date:</strong>
                                        {{ $publication->formatted_date }}
                                    </div>
                                    <div class="info-item mb-2">
                                        <strong><i class="fas fa-weight-hanging me-2"></i>Taille:</strong>
                                        {{ $publication->file_size }}
                                    </div>
                                    <div class="info-item mb-2">
                                        <strong><i class="far fa-file me-2"></i>Pages:</strong>
                                        {{ $publication->page_count ?? 'N/A' }}
                                    </div>
                                    <div class="info-item mb-2">
                                        <strong><i class="fas fa-download me-2"></i>Téléchargements:</strong>
                                        {{ $publication->downloads }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6>Description</h6>
                                <p class="mb-4">{{ $publication->description }}</p>

                                @if($publication->period)
                                    <h6>Période couverte</h6>
                                    <p class="mb-4">{{ $publication->period }}</p>
                                @endif

                                @if($publication->author)
                                    <h6>Auteur/Éditeur</h6>
                                    <p class="mb-4">{{ $publication->author }}</p>
                                @endif

                                <h6>Informations Techniques</h6>
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-file-pdf me-2"></i>Format: {{ $publication->file_format }}</li>
                                    <li><i class="fas fa-language me-2"></i>Langue:
                                        {{ strtoupper($publication->language) }}
                                    </li>
                                    @if($publication->isbn)
                                        <li><i class="fas fa-barcode me-2"></i>ISBN: {{ $publication->isbn }}</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times me-1"></i>Fermer
                        </button>
                        <a href="{{ route('publications.download', $publication) }}" class="btn btn-primary" target="_blank">
                            <i class="fas fa-download me-1"></i>Télécharger (PDF)
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
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
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
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
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            height: 100%;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
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
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
            position: relative;
        }

        .publication-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
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

        .preview-btn,
        .download-btn {
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
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .guide-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
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
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
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
            box-shadow: 0 5px 15px rgba(255, 255, 255, 0.2);
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
        document.addEventListener('DOMContentLoaded', function () {
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
                button.addEventListener('click', function () {
                    const card = this.closest('.publication-card');
                    const title = card.querySelector('.publication-title').textContent;

                    // Simuler l'ouverture d'un aperçu
                    this.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Chargement...';
                    this.disabled = true;

                    setTimeout(() => {
                        this.innerHTML = '<i class="fas fa-check me-1"></i> Aperçu ouvert';
                        setTimeout(() => {
                            this.innerHTML =
                                '<i class="far fa-eye me-1"></i> Aperçu';
                            this.disabled = false;
                        }, 2000);
                    }, 1500);
                });
            });

            // Bouton de téléchargement complet
            const downloadAllBtn = document.querySelector('.download-zone .btn-light');
            if (downloadAllBtn) {
                downloadAllBtn.addEventListener('click', function () {
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
                anchor.addEventListener('click', function (e) {
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialiser les tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Suivi des téléchargements
            const downloadLinks = document.querySelectorAll('.download-btn');
            downloadLinks.forEach(link => {
                link.addEventListener('click', function () {
                    const publicationId = this.getAttribute('data-id');
                    if (publicationId) {
                        // Envoyer une requête pour incrémenter le compteur
                        fetch(`/publications/${publicationId}/track-download`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').content,
                                'Content-Type': 'application/json'
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection