@extends('admin.layouts.template')
@section('content')

    <style>
        :root {
            --primary-dark: #06634e;
            --primary-light: #0a7a62;
            --secondary: #78ac11;
            --secondary-light: #8bc31f;
            --white: #ffffff;
            --light-bg: #f9fafb;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-300: #cbd5e1;
            --gray-400: #94a3b8;
            --gray-500: #64748b;
            --gray-600: #475569;
            --gray-700: #334155;
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.12);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 25px -5px rgba(6, 99, 78, 0.1);
            --shadow-xl: 0 20px 40px -10px rgba(6, 99, 78, 0.15);
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 24px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .articles-management {
            min-height: calc(100vh - 80px);
            padding: 2rem 1rem;
            background: linear-gradient(135deg, #f9fafb 0%, #f0fdf4 100%);
            position: relative;
        }

        .articles-management::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-dark), var(--secondary));
        }

        .articles-container {
            max-width: 1600px;
            margin: 0 auto;
            position: relative;
        }

        /* En-tête */
        .articles-header {
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
        }

        .articles-header-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            box-shadow: var(--shadow-lg);
        }

        .articles-header-icon::after {
            content: '';
            position: absolute;
            inset: -4px;
            background: linear-gradient(135deg, var(--primary-dark), var(--secondary));
            border-radius: 50%;
            z-index: -1;
            opacity: 0.3;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 0.3;
            }

            50% {
                transform: scale(1.05);
                opacity: 0.5;
            }
        }

        .articles-header-icon i {
            font-size: 2rem;
            color: var(--white);
        }

        .articles-title {
            font-size: 2.25rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, var(--primary-dark), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .articles-subtitle {
            color: var(--gray-600);
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Carte principale */
        .articles-card {
            background: var(--white);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-xl);
            padding: 2.5rem;
            position: relative;
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .articles-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--primary-dark), var(--secondary));
            border-radius: var(--radius-xl) var(--radius-xl) 0 0;
        }

        /* Barre d'actions */
        .articles-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid var(--gray-100);
        }

        .stats-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--gray-50);
            padding: 0.75rem 1.5rem;
            border-radius: var(--radius-md);
            border: 1px solid var(--gray-200);
            color: var(--gray-700);
            font-weight: 500;
            transition: var(--transition);
        }

        .stats-badge:hover {
            background: var(--white);
            border-color: var(--primary-dark);
            box-shadow: var(--shadow-sm);
        }

        .stats-badge i {
            color: var(--secondary);
        }

        .btn-add-article {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem 2rem;
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            color: var(--white);
            border: none;
            border-radius: var(--radius-md);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
        }

        .btn-add-article:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(6, 99, 78, 0.3);
            background: linear-gradient(135deg, var(--primary-light), var(--primary-dark));
            color: var(--white);
        }

        .btn-add-article i {
            font-size: 1.1rem;
        }

        /* Filtres */
        .filter-controls {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            padding: 1.5rem;
            background: var(--gray-50);
            border-radius: var(--radius-lg);
            border: 1px solid var(--gray-200);
            flex-wrap: wrap;
            justify-content: center;
        }

        .filter-btn {
            padding: 0.75rem 1.5rem;
            background: var(--white);
            border: 2px solid var(--gray-200);
            border-radius: var(--radius-md);
            color: var(--gray-600);
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .filter-btn:hover {
            border-color: var(--primary-dark);
            color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }

        .filter-btn.active {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            color: var(--white);
            border-color: transparent;
            box-shadow: var(--shadow-md);
        }

        /* Grille d'articles */
        .articles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        @media (max-width: 768px) {
            .articles-grid {
                grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            }
        }

        @media (max-width: 640px) {
            .articles-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Carte d'article */
        .article-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-md);
            border: 2px solid var(--gray-200);
            transition: var(--transition);
            position: relative;
        }

        .article-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-xl);
            border-color: var(--primary-dark);
        }

        .article-card.inactive {
            opacity: 0.8;
            filter: grayscale(15%);
        }

        .article-card.inactive:hover {
            opacity: 0.9;
            filter: grayscale(5%);
        }

        /* Badge d'article */
        .article-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: linear-gradient(135deg, var(--secondary), var(--secondary-light));
            color: var(--white);
            padding: 0.5rem 1.25rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 2;
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: var(--transition);
        }

        .article-card:hover .article-badge {
            transform: scale(1.05);
        }

        /* Image de l'article */
        .article-image-container {
            height: 220px;
            overflow: hidden;
            position: relative;
        }

        .article-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .article-card:hover .article-image {
            transform: scale(1.08);
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, transparent 50%, rgba(6, 99, 78, 0.2));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .article-card:hover .image-overlay {
            opacity: 1;
        }

        /* Catégorie */
        .article-category {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: rgba(255, 255, 255, 0.95);
            color: var(--primary-dark);
            padding: 0.5rem 1rem;
            border-radius: var(--radius-sm);
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 2;
            backdrop-filter: blur(10px);
            transition: var(--transition);
        }

        .article-card:hover .article-category {
            background: var(--white);
            transform: scale(1.05);
        }

        /* Contenu de la carte */
        .article-content {
            padding: 1.75rem;
        }

        /* Métadonnées */
        .article-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            color: var(--gray-500);
            font-size: 0.85rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .meta-item i {
            color: var(--secondary);
        }

        /* Titre */
        .article-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 1rem;
            line-height: 1.3;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Extrait */
        .article-excerpt {
            color: var(--gray-600);
            font-size: 0.9rem;
            line-height: 1.5;
            margin-bottom: 1.5rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Lien "Lire la suite" */
        .read-more-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--secondary);
            font-weight: 500;
            text-decoration: none;
            font-size: 0.9rem;
            transition: var(--transition);
            margin-bottom: 1.5rem;
        }

        .read-more-link:hover {
            color: var(--primary-dark);
            gap: 0.75rem;
        }

        /* Pied de carte */
        .article-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--gray-200);
        }

        .article-sort-order {
            width: 36px;
            height: 36px;
            background: var(--primary-dark);
            color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            transition: var(--transition);
        }

        .article-card:hover .article-sort-order {
            background: var(--secondary);
            transform: scale(1.1);
        }

        .article-status {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .status-active {
            background: rgba(120, 172, 17, 0.1);
            color: var(--secondary);
        }

        .status-inactive {
            background: rgba(100, 116, 139, 0.1);
            color: var(--gray-500);
        }

        /* Actions */
        .article-actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn-action {
            padding: 0.5rem 1rem;
            border-radius: var(--radius-sm);
            font-size: 0.875rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: var(--transition);
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .btn-edit {
            background: rgba(6, 99, 78, 0.1);
            color: var(--primary-dark);
            border: 1px solid rgba(6, 99, 78, 0.2);
        }

        .btn-edit:hover {
            background: var(--primary-dark);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(6, 99, 78, 0.2);
        }

        .btn-status {
            background: rgba(120, 172, 17, 0.1);
            color: var(--secondary);
            border: 1px solid rgba(120, 172, 17, 0.2);
        }

        .btn-status:hover {
            background: var(--secondary);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(120, 172, 17, 0.2);
        }

        .btn-delete {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .btn-delete:hover {
            background: #ef4444;
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.2);
        }

        /* Placeholder d'image */
        .image-placeholder {
            width: 100%;
            height: 220px;
            background: linear-gradient(135deg, var(--gray-100), var(--gray-200));
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: var(--gray-400);
        }

        .image-placeholder i {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        /* État vide */
        .empty-state {
            padding: 4rem 2rem;
            text-align: center;
            background: var(--gray-50);
            border-radius: var(--radius-lg);
            border: 2px dashed var(--gray-300);
            margin: 2rem 0;
        }

        .empty-icon {
            font-size: 4rem;
            color: var(--gray-300);
            margin-bottom: 1.5rem;
        }

        .empty-title {
            font-size: 1.5rem;
            color: var(--gray-600);
            margin-bottom: 0.75rem;
            font-weight: 600;
        }

        .empty-description {
            color: var(--gray-500);
            max-width: 500px;
            margin: 0 auto 2rem;
            line-height: 1.6;
        }

        /* Styles SweetAlert2 personnalisés */
        .sweet-alert-popup {
            border-radius: var(--radius-lg) !important;
            border: 1px solid var(--gray-200) !important;
            box-shadow: var(--shadow-xl) !important;
            padding: 2rem !important;
        }

        .sweet-alert-title {
            color: var(--primary-dark) !important;
            font-size: 1.5rem !important;
            font-weight: 600 !important;
            margin-bottom: 1rem !important;
        }

        .sweet-alert-content {
            color: var(--gray-600) !important;
            font-size: 1rem !important;
            line-height: 1.5 !important;
        }

        .sweet-alert-confirm {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light)) !important;
            border: none !important;
            border-radius: var(--radius-md) !important;
            padding: 0.75rem 2rem !important;
            font-weight: 600 !important;
            transition: var(--transition) !important;
        }

        .sweet-alert-confirm:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 4px 15px rgba(6, 99, 78, 0.3) !important;
        }

        .sweet-alert-cancel {
            background: var(--white) !important;
            color: var(--gray-700) !important;
            border: 2px solid var(--gray-300) !important;
            border-radius: var(--radius-md) !important;
            padding: 0.75rem 2rem !important;
            font-weight: 600 !important;
            transition: var(--transition) !important;
        }

        .sweet-alert-cancel:hover {
            border-color: var(--primary-dark) !important;
            color: var(--primary-dark) !important;
            transform: translateY(-2px) !important;
            box-shadow: var(--shadow-md) !important;
        }

        /* Toast notifications */
        .swal2-toast {
            border-radius: var(--radius-md) !important;
            border: 1px solid var(--gray-200) !important;
            box-shadow: var(--shadow-lg) !important;
            font-family: inherit !important;
        }

        .swal2-toast.swal2-success {
            border-color: var(--secondary) !important;
        }

        .swal2-toast.swal2-error {
            border-color: #ef4444 !important;
        }

        /* Pied de page */
        .articles-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid var(--gray-200);
            color: var(--gray-500);
            font-size: 0.9rem;
        }

        .articles-stats-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .stats-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .stats-value {
            font-weight: 700;
            color: var(--primary-dark);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .articles-card {
                padding: 1.5rem;
            }

            .articles-actions {
                flex-direction: column;
                gap: 1rem;
                align-items: stretch;
            }

            .btn-add-article {
                justify-content: center;
            }

            .filter-controls {
                justify-content: center;
            }

            .article-footer {
                flex-direction: column;
                gap: 1rem;
                align-items: stretch;
            }

            .article-actions {
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .articles-header-icon {
                width: 60px;
                height: 60px;
            }

            .articles-header-icon i {
                font-size: 1.5rem;
            }

            .articles-title {
                font-size: 1.75rem;
            }

            .articles-card {
                padding: 1.25rem;
            }

            .article-content {
                padding: 1.25rem;
            }

            .articles-footer {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
        }
    </style>

    <div class="articles-management">
        <div class="articles-container">
            <!-- En-tête -->
            <div class="articles-header">
                <div class="articles-header-icon">
                    <i class="fas fa-newspaper"></i>
                </div>
                <h1 class="articles-title">Articles "À la Une"</h1>
                <p class="articles-subtitle">
                    Gérez les articles mis en avant sur votre site
                </p>
            </div>

            <!-- Carte principale -->
            <div class="articles-card">
                <!-- Barre d'actions -->
                <div class="articles-actions">
                    <div class="stats-badge">
                        <i class="fas fa-newspaper"></i>
                        <span>{{ $articles->count() }} article{{ $articles->count() > 1 ? 's' : '' }}</span>
                    </div>
                    <a href="{{ route('admin.featured-articles.create') }}" class="btn-add-article">
                        <i class="fas fa-plus"></i>
                        Nouvel Article
                    </a>
                </div>

                <!-- Information toast -->
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        // Affiche une info au chargement
                        setTimeout(() => {
                            Swal.fire({
                                icon: 'info',
                                title: '📰 Gestion des articles',
                                html: `
                                <div style="text-align: left; padding: 0.5rem;">
                                    <p style="margin-bottom: 0.75rem; font-size: 0.95rem;">
                                        <strong>Conseils :</strong> Utilisez les filtres pour organiser vos articles.
                                    </p>
                                    <ul style="margin: 0; padding-left: 1.25rem; color: #475569; font-size: 0.9rem;">
                                        <li>Les articles "À la Une" attirent l'attention</li>
                                        <li>Activez/désactivez selon vos actualités</li>
                                        <li>Utilisez les badges pour les mettre en valeur</li>
                                    </ul>
                                </div>
                            `,
                                position: 'top-end',
                                toast: true,
                                showConfirmButton: false,
                                timer: 6000,
                                timerProgressBar: true,
                                background: '#f0f9ff',
                                color: '#0369a1',
                                iconColor: '#0ea5e9'
                            });
                        }, 1000);
                    });
                </script>

                <!-- Filtres -->
                <div class="filter-controls">
                    <button class="filter-btn active" data-filter="all">
                        <i class="fas fa-layer-group"></i>
                        Tous les articles
                    </button>
                    <button class="filter-btn" data-filter="active">
                        <i class="fas fa-eye"></i>
                        Actifs uniquement
                    </button>
                    <button class="filter-btn" data-filter="inactive">
                        <i class="fas fa-eye-slash"></i>
                        Inactifs uniquement
                    </button>
                    <button class="filter-btn" data-filter="recent">
                        <i class="fas fa-clock"></i>
                        Articles récents
                    </button>
                </div>

                <!-- Grille d'articles -->
                @if($articles->isEmpty())
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <h3 class="empty-title">Aucun article "À la Une"</h3>
                        <p class="empty-description">
                            Créez votre premier article pour mettre en avant vos actualités.
                        </p>
                        <a href="{{ route('admin.featured-articles.create') }}" class="btn-add-article">
                            <i class="fas fa-plus"></i>
                            Créer votre premier article
                        </a>
                    </div>
                @else
                    <div class="articles-grid" id="articlesGrid">
                        @foreach($articles as $article)
                            <div class="article-card {{ !$article->is_active ? 'inactive' : '' }}"
                                data-status="{{ $article->is_active ? 'active' : 'inactive' }}"
                                data-sort-order="{{ $article->sort_order }}"
                                data-date="{{ $article->publication_date->format('Y-m-d') }}">

                                <!-- Badge d'article -->
                                @if($article->badge_text)
                                    <div class="article-badge">
                                        @if($article->badge_icon)
                                            <i class="{{ $article->badge_icon }}"></i>
                                        @endif
                                        {{ $article->badge_text }}
                                    </div>
                                @endif

                                <!-- Image -->
                                <div class="article-image-container">
                                    @if($article->image)
                                        <img src="{{ asset('storage/' . $article->image) }}"
                                            alt="{{ $article->image_alt ?? $article->title }}" class="article-image">
                                    @else
                                        <div class="image-placeholder">
                                            <i class="fas fa-image"></i>
                                            <span>Aucune image</span>
                                        </div>
                                    @endif

                                    <div class="image-overlay"></div>

                                    <!-- Catégorie -->
                                    @if($article->category)
                                        <span class="article-category">
                                            {{ $article->category }}
                                        </span>
                                    @endif
                                </div>

                                <!-- Contenu -->
                                <div class="article-content">
                                    <!-- Métadonnées -->
                                    <div class="article-meta">
                                        <span class="meta-item">
                                            <i class="far fa-calendar"></i>
                                            {{ $article->publication_date->format('d/m/Y') }}
                                        </span>
                                        <span class="meta-item">
                                            <i class="far fa-eye"></i>
                                            {{ number_format($article->views, 0, ',', ' ') }} vues
                                        </span>
                                    </div>

                                    <!-- Titre -->
                                    <h3 class="article-title">{{ $article->title }}</h3>

                                    <!-- Extrait -->
                                    @if($article->excerpt)
                                        <p class="article-excerpt">{{ Str::limit($article->excerpt, 180) }}</p>
                                    @endif

                                    <!-- Lien "Lire la suite" -->
                                    @if($article->read_more_link)
                                        <a href="{{ $article->read_more_link }}" class="read-more-link" target="_blank">
                                            {{ $article->read_more_text ?? 'Lire la suite' }}
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    @endif

                                    <!-- Pied de carte -->
                                    <div class="article-footer">
                                        <div class="article-sort-order">
                                            {{ $article->sort_order }}
                                        </div>

                                        <div class="d-flex align-items-center gap-3">
                                            <span
                                                class="article-status {{ $article->is_active ? 'status-active' : 'status-inactive' }}">
                                                <i class="fas {{ $article->is_active ? 'fa-eye' : 'fa-eye-slash' }}"></i>
                                                {{ $article->is_active ? 'Actif' : 'Inactif' }}
                                            </span>

                                            <div class="article-actions">
                                                <a href="{{ route('admin.featured-articles.edit', $article) }}"
                                                    class="btn-action btn-edit" title="Modifier">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <form action="{{ route('admin.featured-articles.toggle-status', $article) }}"
                                                    method="POST" class="d-inline toggle-form">
                                                    @csrf
                                                    <button type="button" class="btn-action btn-status toggle-status-btn"
                                                        data-title="{{ $article->title }}" data-active="{{ $article->is_active }}"
                                                        title="{{ $article->is_active ? 'Désactiver' : 'Activer' }}">
                                                        <i class="fas fa-power-off"></i>
                                                    </button>
                                                </form>

                                                <form action="{{ route('admin.featured-articles.destroy', $article) }}"
                                                    method="POST" class="d-inline delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn-action btn-delete delete-btn"
                                                        data-title="{{ $article->title }}"
                                                        data-image="{{ $article->image ? 'oui' : 'non' }}" title="Supprimer">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <!-- Pied de page -->
                @if(!$articles->isEmpty())
                    <div class="articles-footer">
                        <div class="articles-stats-info">
                            <div class="stats-item">
                                <i class="fas fa-newspaper"></i>
                                <span><span class="stats-value">{{ $articles->count() }}</span>
                                    article{{ $articles->count() > 1 ? 's' : '' }}</span>
                            </div>
                            <div class="stats-item">
                                <i class="fas fa-eye"></i>
                                <span><span class="stats-value">{{ $articles->where('is_active', true)->count() }}</span>
                                    active{{ $articles->where('is_active', true)->count() > 1 ? 's' : '' }}</span>
                            </div>
                            <div class="stats-item">
                                <i class="fas fa-chart-line"></i>
                                <span><span class="stats-value">{{ number_format($articles->sum('views'), 0, ',', ' ') }}</span>
                                    vues totales</span>
                            </div>
                        </div>
                        <a href="{{ route('admin.featured-articles.create') }}" class="btn-action btn-edit">
                            <i class="fas fa-plus"></i>
                            Ajouter un article
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Animation des cartes au survol
            const cards = document.querySelectorAll('.article-card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', () => {
                    card.style.zIndex = '10';
                });

                card.addEventListener('mouseleave', () => {
                    card.style.zIndex = '1';
                });
            });

            // Filtrage des articles
            const filterButtons = document.querySelectorAll('.filter-btn');
            const articlesGrid = document.getElementById('articlesGrid');
            const articleCards = articlesGrid ? Array.from(articlesGrid.querySelectorAll('.article-card')) : [];

            filterButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const filter = this.dataset.filter;

                    // Mettre à jour les boutons actifs
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    // Filtrer les cartes
                    articleCards.forEach(card => {
                        const status = card.dataset.status;
                        const dateStr = card.dataset.date;
                        const date = new Date(dateStr);
                        const now = new Date();
                        const diffTime = Math.abs(now - date);
                        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                        const isRecent = diffDays <= 30; // Moins de 30 jours

                        let shouldShow = false;

                        switch (filter) {
                            case 'all':
                                shouldShow = true;
                                break;
                            case 'active':
                                shouldShow = status === 'active';
                                break;
                            case 'inactive':
                                shouldShow = status === 'inactive';
                                break;
                            case 'recent':
                                shouldShow = isRecent;
                                break;
                        }

                        card.style.display = shouldShow ? 'block' : 'none';

                        // Animation de réapparition
                        if (shouldShow) {
                            card.style.opacity = '0';
                            card.style.transform = 'translateY(20px)';

                            setTimeout(() => {
                                card.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
                                card.style.opacity = '1';
                                card.style.transform = 'translateY(0)';
                            }, 50);
                        }
                    });

                    // Mettre à jour les statistiques
                    updateArticlesStats();
                });
            });

            // Confirmation pour la suppression
            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    const articleTitle = this.dataset.title;
                    const hasImage = this.dataset.image === 'oui';
                    confirmDeleteArticle(articleTitle, hasImage, this);
                });
            });

            // Confirmation pour activer/désactiver
            const toggleButtons = document.querySelectorAll('.toggle-status-btn');
            toggleButtons.forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    const articleTitle = this.dataset.title;
                    const isActive = this.dataset.active === 'true';
                    confirmToggleStatus(articleTitle, isActive, this);
                });
            });

            // Animation d'entrée des cartes
            if (articleCards.length > 0) {
                articleCards.forEach((card, index) => {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(30px)';

                    setTimeout(() => {
                        card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, index * 100);
                });
            }

            // Mettre à jour les statistiques initiales
            updateArticlesStats();
        });

        // Fonction pour mettre à jour les statistiques
        function updateArticlesStats() {
            const visibleCards = document.querySelectorAll('.article-card[style*="block"], .article-card:not([style*="none"])');
            const activeCards = Array.from(visibleCards).filter(card => card.dataset.status === 'active');

            const totalElement = document.querySelector('.stats-value:nth-of-type(1)');
            const activeElement = document.querySelector('.stats-value:nth-of-type(2)');

            if (totalElement) totalElement.textContent = visibleCards.length;
            if (activeElement) activeElement.textContent = activeCards.length;
        }

        // Fonction de confirmation pour la suppression
        function confirmDeleteArticle(articleTitle, hasImage, button) {
            const form = button.closest('.delete-form');

            Swal.fire({
                title: 'Confirmer la suppression',
                html: `
                <div style="text-align: center; padding: 1rem;">
                    <div style="width: 80px; height: 80px; margin: 0 auto 1.5rem; background: linear-gradient(135deg, #fef2f2, #fee2e2); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-trash-alt" style="font-size: 2rem; color: #ef4444;"></i>
                    </div>
                    <h3 style="color: #334155; margin-bottom: 0.75rem;">Supprimer cet article ?</h3>
                    <p style="color: #06634e; font-weight: 600; font-size: 1.1rem; margin-bottom: 1rem; padding: 0.5rem; background: #f0fdf4; border-radius: 8px;">
                        "${articleTitle}"
                    </p>
                    <p style="color: #64748b; font-size: 0.95rem; line-height: 1.5; margin-bottom: 1rem;">
                        Cet article "À la Une" sera définitivement supprimé.
                        ${hasImage ? 'L\'image associée sera également supprimée.' : ''}
                    </p>
                    <div style="background: #fef2f2; padding: 0.75rem; border-radius: 8px; border-left: 4px solid #ef4444; margin-top: 1rem;">
                        <p style="color: #dc3545; font-size: 0.9rem; font-weight: 500; margin: 0; display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-exclamation-triangle"></i>
                            Cette action est irréversible
                        </p>
                    </div>
                </div>
            `,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#06634e',
                cancelButtonColor: '#6c757d',
                confirmButtonText: '<i class="fas fa-trash me-2"></i>Supprimer définitivement',
                cancelButtonText: '<i class="fas fa-times me-2"></i>Annuler',
                reverseButtons: true,
                backdrop: true,
                allowOutsideClick: false,
                allowEscapeKey: true,
                customClass: {
                    popup: 'sweet-alert-popup',
                    title: 'sweet-alert-title',
                    htmlContainer: 'sweet-alert-content',
                    confirmButton: 'sweet-alert-confirm',
                    cancelButton: 'sweet-alert-cancel'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }

        // Fonction de confirmation pour activer/désactiver
        function confirmToggleStatus(articleTitle, isActive, button) {
            const form = button.closest('.toggle-form');
            const action = isActive ? 'désactiver' : 'activer';
            const actionColor = isActive ? '#64748b' : '#78ac11';
            const actionBg = isActive ? '#f1f5f9' : '#f0fdf4';
            const actionIcon = isActive ? 'fa-ban' : 'fa-check-circle';
            const confirmText = isActive ? 'Désactiver' : 'Activer';

            Swal.fire({
                title: `${isActive ? 'Désactiver' : 'Activer'} l'article`,
                html: `
                <div style="text-align: center; padding: 1rem;">
                    <div style="width: 80px; height: 80px; margin: 0 auto 1.5rem; background: linear-gradient(135deg, ${actionBg}, ${isActive ? '#e2e8f0' : '#dcfce7'}); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <i class="fas ${actionIcon}" style="font-size: 2rem; color: ${actionColor};"></i>
                    </div>
                    <h3 style="color: #334155; margin-bottom: 0.75rem;">
                        ${isActive ? 'Désactiver' : 'Activer'} cet article ?
                    </h3>
                    <p style="color: #06634e; font-weight: 600; font-size: 1.1rem; margin-bottom: 1rem; padding: 0.5rem; background: ${actionBg}; border-radius: 8px;">
                        "${articleTitle}"
                    </p>
                    <p style="color: #64748b; font-size: 0.95rem; line-height: 1.5;">
                        ${isActive
                        ? 'Cet article ne sera plus visible dans la section "À la Une". Vous pourrez le réactiver à tout moment.'
                        : 'Cet article sera visible dans la section "À la Une".'}
                    </p>
                </div>
            `,
                icon: isActive ? 'question' : 'success',
                showCancelButton: true,
                confirmButtonColor: actionColor,
                cancelButtonColor: '#6c757d',
                confirmButtonText: `<i class="fas ${actionIcon} me-2"></i>${confirmText}`,
                cancelButtonText: '<i class="fas fa-times me-2"></i>Annuler',
                reverseButtons: true,
                backdrop: true,
                allowOutsideClick: false,
                allowEscapeKey: true,
                customClass: {
                    popup: 'sweet-alert-popup',
                    title: 'sweet-alert-title',
                    htmlContainer: 'sweet-alert-content',
                    confirmButton: isActive ? 'sweet-alert-cancel' : 'sweet-alert-confirm',
                    cancelButton: 'sweet-alert-cancel'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    </script>

    <!-- Scripts pour les notifications SweetAlert2 -->
    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Succès !',
                    text: '{{ session('success') }}',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    background: '#f9fafb',
                    color: '#06634e',
                    iconColor: '#78ac11'
                });
            });
        </script>
    @endif

    @if(session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur !',
                    text: '{{ session('error') }}',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: true,
                    background: '#fef2f2',
                    color: '#dc3545',
                    iconColor: '#dc3545'
                });
            });
        </script>
    @endif

@endsection