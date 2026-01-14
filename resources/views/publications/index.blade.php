@extends('home.layouts.template')

@section('content')
    <!-- Hero Section -->
    <section class="publications-hero-mini py-5">
        <div class="container mt-5">
            <div class="row align-items-center">
                <div class="col-lg-12 text-center mt-5">
                    <h1 class="hero-title">
                        Toutes nos <span class="text-primary">Publications</span>
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('home.publication') }}">Publications</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Liste</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="publications-list-section py-5">
        <div class="container">
            <!-- Filter Info -->
            @if(request('type'))
                <div class="filter-status mb-4">
                    <h3 class="h5">Filtrage par : <strong>{{ ucfirst(request('type')) }}s</strong></h3>
                    <a href="{{ route('publications.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-times me-1"></i> Effacer le filtre
                    </a>
                </div>
            @endif

            <div class="row g-4">
                @forelse($publications as $publication)
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
                                <a href="{{ route('publications.show', $publication) }}"
                                    class="btn btn-outline-primary btn-sm preview-btn">
                                    <i class="far fa-eye me-1"></i> Détails
                                </a>
                                <a href="{{ route('publications.download', $publication) }}" class="download-btn"
                                    target="_blank">
                                    <i class="fas fa-download me-1"></i> Télécharger
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div class="empty-state">
                            <i class="fas fa-file-pdf fa-4x text-muted mb-3"></i>
                            <h4 class="text-muted">Aucune publication trouvée</h4>
                            <p>Nous n'avons trouvé aucune publication correspondant à vos critères.</p>
                            <a href="{{ route('publications.index') }}" class="btn btn-primary mt-3">Voir toutes les
                                publications</a>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-5">
                {{ $publications->links() }}
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

        .publications-hero-mini {
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--white) 100%);
            border-bottom: 3px solid var(--primary-color);
        }

        .hero-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

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
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
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
            border: 1px solid var(--primary-color);
        }

        .preview-btn:hover {
            background: var(--primary-color);
            color: var(--white);
        }

        .download-btn {
            background: var(--primary-color);
            color: var(--white);
        }

        .download-btn:hover {
            background: #004d24;
            color: var(--white);
        }
    </style>
@endsection