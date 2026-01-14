@extends('home.layouts.template')

@section('content')
    <!-- Hero Section -->
    <section class="publications-hero-mini py-5">
        <div class="container mt-5">
            <div class="row align-items-center">
                <div class="col-lg-12 text-center mt-5">
                    <h1 class="hero-title">
                        Détails de la <span class="text-primary">Publication</span>
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('home.publication') }}">Publications</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('publications.index') }}">Liste</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($publication->title, 30) }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Detail Section -->
    <section class="publication-detail-section py-5">
        <div class="container">
            <div class="row g-5">
                <!-- Sidebar / Info Card -->
                <div class="col-lg-4">
                    <div class="publication-info-card p-4 rounded-3 shadow-sm border bg-white sticky-top" style="top: 100px;">
                        <div class="thumbnail mb-4">
                            <img src="{{ $publication->thumbnail_url }}" alt="{{ $publication->title }}" class="img-fluid rounded shadow-sm border">
                        </div>
                        
                        <div class="info-list">
                            <div class="info-item mb-3 d-flex justify-content-between">
                                <span class="text-muted"><i class="fas fa-tag me-2"></i>Type</span>
                                <span class="badge" style="background: {{ $publication->type_color }};">{{ $publication->type_text }}</span>
                            </div>
                            <div class="info-item mb-3 d-flex justify-content-between">
                                <span class="text-muted"><i class="far fa-calendar me-2"></i>Date</span>
                                <span class="fw-bold">{{ $publication->formatted_date }}</span>
                            </div>
                            <div class="info-item mb-3 d-flex justify-content-between">
                                <span class="text-muted"><i class="fas fa-weight-hanging me-2"></i>Taille</span>
                                <span class="fw-bold">{{ $publication->file_size }}</span>
                            </div>
                            <div class="info-item mb-3 d-flex justify-content-between">
                                <span class="text-muted"><i class="far fa-file me-2"></i>Pages</span>
                                <span class="fw-bold">{{ $publication->page_count ?? 'N/A' }}</span>
                            </div>
                            <div class="info-item mb-4 d-flex justify-content-between">
                                <span class="text-muted"><i class="fas fa-download me-2"></i>Téléchargements</span>
                                <span class="fw-bold">{{ $publication->downloads }}</span>
                            </div>
                        </div>

                        <a href="{{ route('publications.download', $publication) }}" class="btn btn-primary w-100 py-3 mb-3" target="_blank">
                            <i class="fas fa-download me-2"></i> Télécharger le PDF
                        </a>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-lg-8">
                    <div class="publication-content-wrapper">
                        <span class="badge mb-3" style="background: {{ $publication->type_color }};">{{ $publication->type_text }}</span>
                        <h2 class="display-6 fw-bold mb-4">{{ $publication->title }}</h2>
                        
                        <div class="description-section mb-5">
                            <h4 class="h5 fw-bold mb-3 border-bottom pb-2">Description</h4>
                            <p class="lead text-muted" style="line-height: 1.8;">
                                {{ $publication->description }}
                            </p>
                        </div>

                        @if($publication->author || $publication->period || $publication->isbn)
                            <div class="tech-info-section mb-5">
                                <h4 class="h5 fw-bold mb-3 border-bottom pb-2">Informations Complémentaires</h4>
                                <div class="row g-4">
                                    @if($publication->author)
                                        <div class="col-md-6">
                                            <div class="p-3 bg-light rounded">
                                                <small class="text-muted d-block">Auteur / Éditeur</small>
                                                <strong>{{ $publication->author }}</strong>
                                            </div>
                                        </div>
                                    @endif
                                    @if($publication->period)
                                        <div class="col-md-6">
                                            <div class="p-3 bg-light rounded">
                                                <small class="text-muted d-block">Période couverte</small>
                                                <strong>{{ $publication->period }}</strong>
                                            </div>
                                        </div>
                                    @endif
                                    @if($publication->isbn)
                                        <div class="col-md-6">
                                            <div class="p-3 bg-light rounded">
                                                <small class="text-muted d-block">ISBN</small>
                                                <strong>{{ $publication->isbn }}</strong>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-md-6">
                                        <div class="p-3 bg-light rounded">
                                            <small class="text-muted d-block">Langue</small>
                                            <strong>{{ strtoupper($publication->language ?? 'FR') }}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Related Publications -->
                        @if($relatedPublications->count() > 0)
                            <div class="related-publications mt-5 pt-5 border-top">
                                <h4 class="h5 fw-bold mb-4">Publications Similaires</h4>
                                <div class="row g-4">
                                    @foreach($relatedPublications as $related)
                                        <div class="col-md-6">
                                            <div class="related-card p-3 border rounded d-flex align-items-center gap-3">
                                                <div class="related-icon text-primary h3 mb-0">
                                                    <i class="{{ $related->type_icon }}"></i>
                                                </div>
                                                <div class="related-info">
                                                    <h6 class="mb-1"><a href="{{ route('publications.show', $related) }}" class="text-dark text-decoration-none fw-bold">{{ Str::limit($related->title, 40) }}</a></h6>
                                                    <small class="text-muted">{{ $related->formatted_date }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        :root {
            --primary-color: #00632d;
            --primary-light: #e8f5e9;
        }

        .publications-hero-mini {
            background: linear-gradient(135deg, var(--primary-light) 0%, #ffffff 100%);
            border-bottom: 3px solid var(--primary-color);
        }

        .hero-title {
            font-size: 2.5rem;
            font-weight: 700;
        }

        .publication-info-card {
            background: #fff;
        }

        .publication-info-card .thumbnail img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .related-card {
            transition: all 0.3s ease;
        }

        .related-card:hover {
            border-color: var(--primary-color) !important;
            background-color: var(--primary-light);
        }
    </style>
@endsection
