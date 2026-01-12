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
        --shadow-sm: 0 1px 3px rgba(0,0,0,0.12);
        --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.1);
        --shadow-lg: 0 10px 25px -5px rgba(6, 99, 78, 0.1);
        --shadow-xl: 0 20px 40px -10px rgba(6, 99, 78, 0.15);
        --radius-sm: 8px;
        --radius-md: 12px;
        --radius-lg: 16px;
        --radius-xl: 24px;
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .publications-admin {
        min-height: calc(100vh - 80px);
        padding: 2rem 1rem;
        background: linear-gradient(135deg, #f9fafb 0%, #f0fdf4 100%);
        position: relative;
    }

    .publications-admin::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-dark), var(--secondary));
    }

    .publications-container {
        max-width: 1400px;
        margin: 0 auto;
        position: relative;
    }

    /* En-tête */
    .publications-header {
        text-align: center;
        margin-bottom: 3rem;
        position: relative;
    }

    .publications-header-icon {
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

    .publications-header-icon i {
        font-size: 2rem;
        color: var(--white);
    }

    .publications-title {
        font-size: 2.25rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 0.5rem;
        background: linear-gradient(135deg, var(--primary-dark), var(--secondary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .publications-subtitle {
        color: var(--gray-600);
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* Carte principale */
    .publications-card {
        background: var(--white);
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-xl);
        padding: 2.5rem;
        position: relative;
        overflow: hidden;
        margin-bottom: 2rem;
        width: 100%;
    }

    .publications-card::before {
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
    .publications-actions {
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

    .btn-add-publication {
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

    .btn-add-publication:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(6, 99, 78, 0.3);
        background: linear-gradient(135deg, var(--primary-light), var(--primary-dark));
        color: var(--white);
    }

    .btn-add-publication i {
        font-size: 1.1rem;
    }

    /* Grille des publications */
    .publications-list {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    @media (max-width: 768px) {
        .publications-list {
            grid-template-columns: 1fr;
        }
    }

    /* Carte de publication */
    .publication-card {
        background: var(--white);
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-md);
        border: 2px solid var(--gray-200);
        transition: var(--transition);
        position: relative;
    }

    .publication-card:hover {
        transform: translateY(-6px);
        box-shadow: var(--shadow-xl);
        border-color: var(--primary-dark);
    }

    .publication-card.featured {
        border-color: var(--secondary);
        box-shadow: 0 0 0 3px rgba(120, 172, 17, 0.1);
    }

    .publication-badge {
        position: absolute;
        top: 1rem;
        left: 1rem;
        background: #dc3545;
        color: var(--white);
        padding: 0.5rem 1rem;
        border-radius: var(--radius-sm);
        font-size: 0.8rem;
        font-weight: 600;
        z-index: 2;
        box-shadow: var(--shadow-sm);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .featured-badge {
        position: absolute;
        top: 1rem;
        right: 1rem;
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
    }

    .draft-badge {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: var(--gray-500);
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
    }

    /* Image de couverture */
    .publication-image {
        position: relative;
        height: 200px;
        overflow: hidden;
    }

    .publication-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .publication-card:hover .publication-image img {
        transform: scale(1.08);
    }

    .image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, transparent 50%, rgba(6, 99, 78, 0.3));
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .publication-card:hover .image-overlay {
        opacity: 1;
    }

    /* Contenu de la carte */
    .publication-content {
        padding: 1.75rem;
    }

    .publication-type {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        margin-bottom: 1rem;
        background: var(--gray-100);
        color: var(--gray-700);
    }

    .publication-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 1rem;
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .publication-description {
        color: var(--gray-600);
        font-size: 0.95rem;
        line-height: 1.5;
        margin-bottom: 1.5rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Métadonnées */
    .publication-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 1.5rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid var(--gray-200);
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--gray-500);
        font-size: 0.85rem;
    }

    .meta-item i {
        color: var(--secondary);
    }

    /* Statistiques */
    .publication-stats {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        margin-bottom: 1.5rem;
        padding: 1rem;
        background: var(--gray-50);
        border-radius: var(--radius-md);
        border: 1px solid var(--gray-200);
    }

    .stat-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--gray-600);
        font-size: 0.9rem;
    }

    .stat-number {
        font-weight: 700;
        color: var(--primary-dark);
    }

    /* Métadonnées et actions */
    .publication-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 1.5rem;
        padding-top: 1.25rem;
        border-top: 1px solid var(--gray-200);
    }

    .publication-date {
        color: var(--gray-500);
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* Actions */
    .publication-actions {
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

    .btn-featured {
        background: rgba(255, 193, 7, 0.1);
        color: #ffc107;
        border: 1px solid rgba(255, 193, 7, 0.2);
    }

    .btn-featured:hover {
        background: #ffc107;
        color: var(--white);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 193, 7, 0.2);
    }

    .btn-download {
        background: rgba(13, 110, 253, 0.1);
        color: #0d6efd;
        border: 1px solid rgba(13, 110, 253, 0.2);
    }

    .btn-download:hover {
        background: #0d6efd;
        color: var(--white);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.2);
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

    /* État vide */
    .empty-state {
        padding: 4rem 2rem;
        text-align: center;
        background: var(--gray-50);
        border-radius: var(--radius-lg);
        border: 2px dashed var(--gray-300);
        margin: 2rem 0;
        grid-column: 1 / -1;
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

    /* Filtres */
    .publications-filters {
        display: flex;
        gap: 1rem;
        margin-bottom: 2rem;
        flex-wrap: wrap;
    }

    .filter-btn {
        padding: 0.75rem 1.5rem;
        border-radius: var(--radius-md);
        font-weight: 500;
        border: 2px solid var(--gray-200);
        background: var(--white);
        color: var(--gray-600);
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .filter-btn.active {
        background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
        color: var(--white);
        border-color: transparent;
    }

    .filter-btn:hover:not(.active) {
        border-color: var(--primary-dark);
        color: var(--primary-dark);
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
    .publications-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 1px solid var(--gray-200);
        color: var(--gray-500);
        font-size: 0.9rem;
    }

    .publications-stats-info {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        flex-wrap: wrap;
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
    @media (max-width: 1024px) {
        .publications-list {
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        }
    }

    @media (max-width: 768px) {
        .publications-card {
            padding: 1.5rem;
        }
        
        .publications-actions {
            flex-direction: column;
            gap: 1rem;
            align-items: stretch;
        }
        
        .btn-add-publication {
            justify-content: center;
        }
        
        .publications-list {
            grid-template-columns: 1fr;
        }
        
        .publications-filters {
            justify-content: center;
        }
        
        .publication-actions {
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .publications-footer {
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }
    }

    @media (max-width: 480px) {
        .publications-header-icon {
            width: 60px;
            height: 60px;
        }
        
        .publications-header-icon i {
            font-size: 1.5rem;
        }
        
        .publications-title {
            font-size: 1.75rem;
        }
        
        .publications-card {
            padding: 1.25rem;
        }
        
        .publication-content {
            padding: 1.25rem;
        }
        
        .filter-btn {
            flex: 1;
            min-width: 140px;
            justify-content: center;
        }
    }
</style>

<div class="publications-admin">
    <div class="publications-container">
        <!-- En-tête -->
        <div class="publications-header">
            <div class="publications-header-icon">
                <i class="fas fa-file-pdf"></i>
            </div>
            <h1 class="publications-title">Gestion des Publications</h1>
            <p class="publications-subtitle">
                Gérez vos rapports, études et autres publications.
            </p>
        </div>

        <!-- Carte principale -->
        <div class="publications-card">
            <!-- Barre d'actions -->
            <div class="publications-actions">
                <div class="stats-badge">
                    <i class="fas fa-file-alt"></i>
                    <span>{{ $publications->count() }} publication{{ $publications->count() > 1 ? 's' : '' }}</span>
                </div>
                <a href="{{ route('admin.publications.create') }}" class="btn-add-publication">
                    <i class="fas fa-plus"></i>
                    Nouvelle Publication
                </a>
            </div>

            <!-- Filtres -->
            <div class="publications-filters">
                <button class="filter-btn active" data-filter="all">
                    <i class="fas fa-list"></i>
                    Tous ({{ $publications->count() }})
                </button>
                <button class="filter-btn" data-filter="published">
                    <i class="fas fa-eye"></i>
                    Publiés ({{ $publications->where('is_published', true)->count() }})
                </button>
                <button class="filter-btn" data-filter="featured">
                    <i class="fas fa-star"></i>
                    Vedettes ({{ $publications->where('is_featured', true)->count() }})
                </button>
                <button class="filter-btn" data-filter="rapport">
                    <i class="fas fa-file-contract"></i>
                    Rapports ({{ $publications->where('type', 'rapport')->count() }})
                </button>
                <button class="filter-btn" data-filter="etude">
                    <i class="fas fa-chart-line"></i>
                    Études ({{ $publications->where('type', 'etude')->count() }})
                </button>
            </div>

            <!-- Information toast -->
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(() => {
                    Swal.fire({
                        icon: 'info',
                        title: '💡 Information',
                        html: `
                            <div style="text-align: left; padding: 0.5rem;">
                                <p style="margin-bottom: 0.75rem; font-size: 0.95rem;">
                                    <strong>Conseil :</strong> Seules les publications publiées sont visibles sur le site.
                                </p>
                                <ul style="margin: 0; padding-left: 1.25rem; color: #475569; font-size: 0.9rem;">
                                    <li>Cliquez sur l'icône œil pour publier/dépublier</li>
                                    <li>Cliquez sur l'icône étoile pour mettre en vedette</li>
                                    <li>Les publications en vedette sont mises en avant</li>
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

            <!-- Grille des publications -->
            @if($publications->isEmpty())
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-file-pdf"></i>
                    </div>
                    <h3 class="empty-title">Aucune publication</h3>
                    <p class="empty-description">
                        Commencez par ajouter votre première publication.
                    </p>
                    <a href="{{ route('admin.publications.create') }}" class="btn-add-publication">
                        <i class="fas fa-plus"></i>
                        Ajouter une publication
                    </a>
                </div>
            @else
                <div class="publications-list" id="publicationsList">
                    @foreach($publications as $publication)
                    <div class="publication-card {{ $publication->is_featured ? 'featured' : '' }}"
                         data-published="{{ $publication->is_published ? 'true' : 'false' }}"
                         data-featured="{{ $publication->is_featured ? 'true' : 'false' }}"
                         data-type="{{ $publication->type }}">
                        
                        <!-- Badge type -->
                        <div class="publication-badge" style="background: {{ $publication->type_color }};">
                            <i class="{{ $publication->type_icon }}"></i>
                            {{ $publication->type_text }}
                        </div>

                        <!-- Badge vedette -->
                        @if($publication->is_featured)
                            <div class="featured-badge">
                                <i class="fas fa-star"></i>
                                En vedette
                            </div>
                        @endif

                        <!-- Badge brouillon -->
                        @if(!$publication->is_published)
                            <div class="draft-badge">
                                <i class="fas fa-pen"></i>
                                Brouillon
                            </div>
                        @endif

                        <!-- Image de couverture -->
                        <div class="publication-image">
                            <img src="{{ $publication->thumbnail_url }}" 
                                 alt="{{ $publication->thumbnail_alt ?? $publication->title }}">
                            <div class="image-overlay"></div>
                        </div>
                        
                        <!-- Contenu -->
                        <div class="publication-content">
                            <h3 class="publication-title">{{ $publication->title }}</h3>
                            
                            <!-- Description -->
                            <p class="publication-description">{{ $publication->short_description }}</p>
                            
                            <!-- Métadonnées -->
                            <div class="publication-meta">
                                <div class="meta-item">
                                    <i class="far fa-calendar"></i>
                                    {{ $publication->formatted_date }}
                                </div>
                                @if($publication->page_count)
                                <div class="meta-item">
                                    <i class="far fa-file"></i>
                                    {{ $publication->page_count }} pages
                                </div>
                                @endif
                                @if($publication->file_size)
                                <div class="meta-item">
                                    <i class="fas fa-weight-hanging"></i>
                                    {{ $publication->file_size }}
                                </div>
                                @endif
                            </div>
                            
                            <!-- Statistiques -->
                            <div class="publication-stats">
                                <div class="stat-item">
                                    <i class="fas fa-download"></i>
                                    <span><span class="stat-number">{{ $publication->downloads }}</span> téléchargements</span>
                                </div>
                                <div class="stat-item">
                                    <i class="fas fa-eye"></i>
                                    <span><span class="stat-number">{{ $publication->views }}</span> vues</span>
                                </div>
                            </div>
                            
                            <!-- Métadonnées et actions -->
                            <div class="publication-footer">
                                <div class="publication-date">
                                    <i class="far fa-clock"></i>
                                    {{ $publication->created_at->format('d/m/Y') }}
                                </div>
                                
                                <div class="publication-actions">
                                    <a href="{{ $publication->download_url }}" 
                                       class="btn-action btn-download"
                                       target="_blank"
                                       title="Télécharger">
                                        <i class="fas fa-download"></i>
                                    </a>
                                    
                                    <a href="{{ route('admin.publications.edit', $publication) }}" 
                                       class="btn-action btn-edit"
                                       title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    
                                    <form action="{{ route('admin.publications.toggle-status', $publication) }}" 
                                          method="POST" 
                                          class="d-inline">
                                        @csrf
                                        <button type="button" 
                                                class="btn-action btn-status toggle-status-btn"
                                                data-title="{{ $publication->title }}"
                                                data-published="{{ $publication->is_published }}"
                                                title="{{ $publication->is_published ? 'Dépublier' : 'Publier' }}">
                                            <i class="fas {{ $publication->is_published ? 'fa-eye' : 'fa-eye-slash' }}"></i>
                                        </button>
                                    </form>
                                    
                                    <form action="{{ route('admin.publications.toggle-featured', $publication) }}" 
                                          method="POST" 
                                          class="d-inline">
                                        @csrf
                                        <button type="button" 
                                                class="btn-action btn-featured toggle-featured-btn"
                                                data-title="{{ $publication->title }}"
                                                data-featured="{{ $publication->is_featured }}"
                                                title="{{ $publication->is_featured ? 'Retirer de la vedette' : 'Mettre en vedette' }}">
                                            <i class="fas {{ $publication->is_featured ? 'fa-star' : 'fa-star' }}"></i>
                                        </button>
                                    </form>
                                    
                                    <form action="{{ route('admin.publications.destroy', $publication) }}" 
                                          method="POST" 
                                          class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" 
                                                class="btn-action btn-delete delete-btn"
                                                data-title="{{ $publication->title }}"
                                                title="Supprimer">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif

            <!-- Pied de page -->
            @if(!$publications->isEmpty())
            <div class="publications-footer">
                <div class="publications-stats-info">
                    <div class="stats-item">
                        <i class="fas fa-file-alt"></i>
                        <span><span class="stats-value">{{ $publications->count() }}</span> publication{{ $publications->count() > 1 ? 's' : '' }}</span>
                    </div>
                    <div class="stats-item">
                        <i class="fas fa-eye"></i>
                        <span><span class="stats-value">{{ $publications->where('is_published', true)->count() }}</span> publiée{{ $publications->where('is_published', true)->count() > 1 ? 's' : '' }}</span>
                    </div>
                    <div class="stats-item">
                        <i class="fas fa-star"></i>
                        <span><span class="stats-value">{{ $publications->where('is_featured', true)->count() }}</span> en vedette</span>
                    </div>
                </div>
                <a href="{{ route('admin.publications.create') }}" class="btn-action btn-edit">
                    <i class="fas fa-plus"></i>
                    Ajouter une publication
                </a>
            </div>
            @endif
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation des cartes au survol
    const cards = document.querySelectorAll('.publication-card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.zIndex = '10';
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.zIndex = '1';
        });
    });

    // Confirmation pour la suppression
    const deleteButtons = document.querySelectorAll('.delete-btn');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const publicationTitle = this.dataset.title;
            confirmDeletePublication(publicationTitle, this);
        });
    });

    // Confirmation pour publier/dépublier
    const toggleButtons = document.querySelectorAll('.toggle-status-btn');
    toggleButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const publicationTitle = this.dataset.title;
            const isPublished = this.dataset.published === 'true';
            confirmToggleStatus(publicationTitle, isPublished, this);
        });
    });

    // Confirmation pour mettre en vedette
    const featuredButtons = document.querySelectorAll('.toggle-featured-btn');
    featuredButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const publicationTitle = this.dataset.title;
            const isFeatured = this.dataset.featured === 'true';
            confirmToggleFeatured(publicationTitle, isFeatured, this);
        });
    });

    // Filtres
    const filterButtons = document.querySelectorAll('.filter-btn');
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Retirer la classe active de tous les boutons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            // Ajouter la classe active au bouton cliqué
            this.classList.add('active');
            
            const filter = this.dataset.filter;
            filterPublications(filter);
        });
    });

    // Animation d'entrée des cartes
    if (cards.length > 0) {
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            
            setTimeout(() => {
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 100);
        });
    }

    // Fonction de filtrage
    function filterPublications(filter) {
        const publications = document.querySelectorAll('.publication-card');
        
        publications.forEach(pub => {
            const isPublished = pub.dataset.published === 'true';
            const isFeatured = pub.dataset.featured === 'true';
            const type = pub.dataset.type;
            
            let show = false;
            
            switch(filter) {
                case 'all':
                    show = true;
                    break;
                case 'published':
                    show = isPublished;
                    break;
                case 'featured':
                    show = isFeatured && isPublished;
                    break;
                case 'rapport':
                    show = type === 'rapport';
                    break;
                case 'etude':
                    show = type === 'etude';
                    break;
            }
            
            if (show) {
                pub.style.display = 'block';
                setTimeout(() => {
                    pub.style.opacity = '1';
                    pub.style.transform = 'translateY(0)';
                }, 50);
            } else {
                pub.style.opacity = '0';
                pub.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    pub.style.display = 'none';
                }, 300);
            }
        });
    }
});

// Fonction de confirmation pour la suppression
function confirmDeletePublication(publicationTitle, button) {
    const form = button.closest('.delete-form');
    
    Swal.fire({
        title: 'Confirmer la suppression',
        html: `
            <div style="text-align: center; padding: 1rem;">
                <div style="width: 80px; height: 80px; margin: 0 auto 1.5rem; background: linear-gradient(135deg, #fef2f2, #fee2e2); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-trash-alt" style="font-size: 2rem; color: #ef4444;"></i>
                </div>
                <h3 style="color: #334155; margin-bottom: 0.75rem;">Supprimer cette publication ?</h3>
                <p style="color: #06634e; font-weight: 600; font-size: 1.1rem; margin-bottom: 1rem; padding: 0.5rem; background: #f0fdf4; border-radius: 8px;">
                    "${publicationTitle}"
                </p>
                <p style="color: #64748b; font-size: 0.95rem; line-height: 1.5; margin-bottom: 1rem;">
                    Cette publication et ses fichiers associés seront définitivement supprimés.
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

// Fonction de confirmation pour publier/dépublier
function confirmToggleStatus(publicationTitle, isPublished, button) {
    const form = button.closest('form');
    const action = isPublished ? 'dépublier' : 'publier';
    const actionColor = isPublished ? '#64748b' : '#78ac11';
    const actionBg = isPublished ? '#f1f5f9' : '#f0fdf4';
    const actionIcon = isPublished ? 'fa-eye-slash' : 'fa-eye';
    const confirmText = isPublished ? 'Dépublier' : 'Publier';
    
    Swal.fire({
        title: `${isPublished ? 'Dépublier' : 'Publier'} la publication`,
        html: `
            <div style="text-align: center; padding: 1rem;">
                <div style="width: 80px; height: 80px; margin: 0 auto 1.5rem; background: linear-gradient(135deg, ${actionBg}, ${isPublished ? '#e2e8f0' : '#dcfce7'}); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    <i class="fas ${actionIcon}" style="font-size: 2rem; color: ${actionColor};"></i>
                </div>
                <h3 style="color: #334155; margin-bottom: 0.75rem;">
                    ${isPublished ? 'Dépublier' : 'Publier'} cette publication ?
                </h3>
                <p style="color: #06634e; font-weight: 600; font-size: 1.1rem; margin-bottom: 1rem; padding: 0.5rem; background: ${actionBg}; border-radius: 8px;">
                    "${publicationTitle}"
                </p>
                <p style="color: #64748b; font-size: 0.95rem; line-height: 1.5;">
                    ${isPublished 
                        ? 'Cette publication ne sera plus visible sur votre site.' 
                        : 'Cette publication sera visible sur votre site.'}
                </p>
            </div>
        `,
        icon: isPublished ? 'question' : 'success',
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
            confirmButton: isPublished ? 'sweet-alert-cancel' : 'sweet-alert-confirm',
            cancelButton: 'sweet-alert-cancel'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
}

// Fonction de confirmation pour mettre en vedette
function confirmToggleFeatured(publicationTitle, isFeatured, button) {
    const form = button.closest('form');
    const action = isFeatured ? 'retirer de la vedette' : 'mettre en vedette';
    const actionColor = isFeatured ? '#64748b' : '#ffc107';
    const actionBg = isFeatured ? '#f1f5f9' : '#fff9db';
    const actionIcon = 'fa-star';
    const confirmText = isFeatured ? 'Retirer' : 'Mettre en vedette';
    
    Swal.fire({
        title: `${isFeatured ? 'Retirer de la vedette' : 'Mettre en vedette'}`,
        html: `
            <div style="text-align: center; padding: 1rem;">
                <div style="width: 80px; height: 80px; margin: 0 auto 1.5rem; background: linear-gradient(135deg, ${actionBg}, ${isFeatured ? '#e2e8f0' : '#fff3cd'}); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    <i class="fas ${actionIcon}" style="font-size: 2rem; color: ${actionColor};"></i>
                </div>
                <h3 style="color: #334155; margin-bottom: 0.75rem;">
                    ${isFeatured ? 'Retirer cette publication de la vedette ?' : 'Mettre cette publication en vedette ?'}
                </h3>
                <p style="color: #06634e; font-weight: 600; font-size: 1.1rem; margin-bottom: 1rem; padding: 0.5rem; background: ${actionBg}; border-radius: 8px;">
                    "${publicationTitle}"
                </p>
                <p style="color: #64748b; font-size: 0.95rem; line-height: 1.5;">
                    ${isFeatured 
                        ? 'Cette publication ne sera plus mise en avant sur votre site.' 
                        : 'Cette publication sera mise en avant sur votre site.'}
                </p>
            </div>
        `,
        icon: isFeatured ? 'question' : 'success',
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
            confirmButton: isFeatured ? 'sweet-alert-cancel' : 'sweet-alert-confirm',
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
document.addEventListener('DOMContentLoaded', function() {
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
document.addEventListener('DOMContentLoaded', function() {
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