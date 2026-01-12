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

    .hero-admin {
        min-height: calc(100vh - 80px);
        padding: 2rem 1rem;
        background: linear-gradient(135deg, #f9fafb 0%, #f0fdf4 100%);
        position: relative;
    }

    .hero-admin::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-dark), var(--secondary));
    }

    .hero-container {
        max-width: 1400px;
        margin: 0 auto;
        position: relative;
    }

    /* En-tête */
    .hero-header {
        text-align: center;
        margin-bottom: 3rem;
        position: relative;
    }

    .hero-header-icon {
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

    .hero-header-icon::after {
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
        0%, 100% { transform: scale(1); opacity: 0.3; }
        50% { transform: scale(1.05); opacity: 0.5; }
    }

    .hero-header-icon i {
        font-size: 2rem;
        color: var(--white);
    }

    .hero-title {
        font-size: 2.25rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 0.5rem;
        background: linear-gradient(135deg, var(--primary-dark), var(--secondary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero-subtitle {
        color: var(--gray-600);
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* Carte principale */
    .hero-card {
        background: var(--white);
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-xl);
        padding: 2.5rem;
        position: relative;
        overflow: hidden;
        margin-bottom: 2rem;
        width: 100%;
    }

    .hero-card::before {
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
    .hero-actions {
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

    .btn-add-hero {
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

    .btn-add-hero:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(6, 99, 78, 0.3);
        background: linear-gradient(135deg, var(--primary-light), var(--primary-dark));
        color: var(--white);
    }

    .btn-add-hero i {
        font-size: 1.1rem;
    }

    /* Grille des sections hero */
    .hero-list {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    @media (max-width: 768px) {
        .hero-list {
            grid-template-columns: 1fr;
        }
    }

    /* Carte de section hero */
    .section-card {
        background: var(--white);
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-md);
        border: 2px solid var(--gray-200);
        transition: var(--transition);
        position: relative;
    }

    .section-card:hover {
        transform: translateY(-6px);
        box-shadow: var(--shadow-xl);
        border-color: var(--primary-dark);
    }

    .section-card.active {
        border-color: var(--secondary);
        box-shadow: 0 0 0 3px rgba(120, 172, 17, 0.1);
    }

    .active-badge {
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

    .section-header {
        position: relative;
        height: 220px;
        overflow: hidden;
    }

    .section-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .section-card:hover .section-image {
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

    .section-card:hover .image-overlay {
        opacity: 1;
    }

    .section-order {
        position: absolute;
        top: 1rem;
        left: 1rem;
        width: 40px;
        height: 40px;
        background: var(--white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        color: var(--primary-dark);
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
    }

    .section-card:hover .section-order {
        background: var(--primary-dark);
        color: var(--white);
        transform: scale(1.1);
    }

    /* Contenu de la carte */
    .section-content {
        padding: 1.75rem;
    }

    .section-main-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 0.75rem;
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .section-subtitle {
        color: var(--secondary);
        font-weight: 500;
        margin-bottom: 1rem;
        font-size: 0.95rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .section-description {
        color: var(--gray-600);
        font-size: 0.9rem;
        line-height: 1.5;
        margin-bottom: 1.5rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Statistiques */
    .hero-stats {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
        padding: 1rem;
        background: var(--gray-50);
        border-radius: var(--radius-md);
        border: 1px solid var(--gray-200);
    }

    .stat-number {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--primary-dark);
        line-height: 1;
    }

    .stat-label {
        font-size: 0.9rem;
        color: var(--gray-600);
        line-height: 1.3;
    }

    /* Métadonnées */
    .section-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 1rem;
        padding-top: 1.25rem;
        border-top: 1px solid var(--gray-200);
    }

    .meta-date {
        color: var(--gray-500);
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* Actions */
    .section-actions {
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
    .hero-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 1px solid var(--gray-200);
        color: var(--gray-500);
        font-size: 0.9rem;
    }

    .hero-stats-info {
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
    @media (max-width: 1024px) {
        .hero-list {
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        }
    }

    @media (max-width: 768px) {
        .hero-card {
            padding: 1.5rem;
        }
        
        .hero-actions {
            flex-direction: column;
            gap: 1rem;
            align-items: stretch;
        }
        
        .btn-add-hero {
            justify-content: center;
        }
        
        .hero-list {
            grid-template-columns: 1fr;
        }
        
        .section-actions {
            flex-wrap: wrap;
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .hero-header-icon {
            width: 60px;
            height: 60px;
        }
        
        .hero-header-icon i {
            font-size: 1.5rem;
        }
        
        .hero-title {
            font-size: 1.75rem;
        }
        
        .hero-card {
            padding: 1.25rem;
        }
        
        .section-content {
            padding: 1.25rem;
        }
        
        .hero-footer {
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }
    }
</style>

<div class="hero-admin">
    <div class="hero-container">
        <!-- En-tête -->
        <div class="hero-header">
            <div class="hero-header-icon">
                <i class="fas fa-star"></i>
            </div>
            <h1 class="hero-title">Gestion des Sections Hero</h1>
            <p class="hero-subtitle">
                Gérez les sections hero qui apparaissent sur votre site. Une seule section peut être active à la fois.
            </p>
        </div>

        <!-- Carte principale -->
        <div class="hero-card">
            <!-- Barre d'actions -->
            <div class="hero-actions">
                <div class="stats-badge">
                    <i class="fas fa-layer-group"></i>
                    <span>{{ $heroSections->count() }} section{{ $heroSections->count() > 1 ? 's' : '' }}</span>
                </div>
                <a href="{{ route('admin.hero.create') }}" class="btn-add-hero">
                    <i class="fas fa-plus"></i>
                    Nouvelle Section
                </a>
            </div>

            <!-- Information toast -->
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Affiche une info au chargement
                setTimeout(() => {
                    Swal.fire({
                        icon: 'info',
                        title: '💡 Information',
                        html: `
                            <div style="text-align: left; padding: 0.5rem;">
                                <p style="margin-bottom: 0.75rem; font-size: 0.95rem;">
                                    <strong>Conseil :</strong> Seule la section active (badge vert) sera affichée sur votre site.
                                </p>
                                <ul style="margin: 0; padding-left: 1.25rem; color: #475569; font-size: 0.9rem;">
                                    <li>Cliquez sur le bouton <i class="fas fa-power-off" style="color: #78ac11;"></i> pour activer/désactiver</li>
                                    <li>L'activation d'une section désactive automatiquement les autres</li>
                                    <li>Les sections inactives restent sauvegardées</li>
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

            <!-- Grille des sections -->
            @if($heroSections->isEmpty())
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3 class="empty-title">Aucune section hero</h3>
                    <p class="empty-description">
                        Créez votre première section hero pour commencer à attirer l'attention de vos visiteurs.
                    </p>
                    <a href="{{ route('admin.hero.create') }}" class="btn-add-hero">
                        <i class="fas fa-plus"></i>
                        Créer votre première section
                    </a>
                </div>
            @else
                <div class="hero-list" id="heroList">
                    @foreach($heroSections as $hero)
                    <div class="section-card {{ $hero->is_active ? 'active' : '' }}" 
                         data-order="{{ $hero->order }}"
                         data-active="{{ $hero->is_active ? 'true' : 'false' }}">
                        
                        <!-- Badge d'état actif -->
                        @if($hero->is_active)
                            <div class="active-badge">
                                <i class="fas fa-check-circle"></i>
                                Actif
                            </div>
                        @endif

                        <!-- En-tête avec image -->
                        <div class="section-header">
                            @if($hero->image)
                                <img src="{{ asset('storage/' . $hero->image) }}" 
                                     alt="{{ $hero->image_alt ?? $hero->main_title }}" 
                                     class="section-image">
                            @else
                                <div class="h-100 w-100 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                                    <i class="fas fa-image text-gray-300" style="font-size: 4rem;"></i>
                                </div>
                            @endif
                            
                            <div class="image-overlay"></div>
                            
                            <!-- Numéro d'ordre -->
                            <div class="section-order">
                                {{ $hero->order }}
                            </div>
                        </div>
                        
                        <!-- Contenu -->
                        <div class="section-content">
                            <h3 class="section-main-title">{{ $hero->main_title }}</h3>
                            
                            @if($hero->subtitle)
                                <p class="section-subtitle">{{ Str::limit($hero->subtitle, 80) }}</p>
                            @endif
                            
                            <p class="section-description">{{ Str::limit($hero->description, 150) }}</p>
                            
                            <!-- Statistiques -->
                            @if($hero->stat_number || $hero->stat_label)
                                <div class="hero-stats">
                                    @if($hero->stat_number)
                                        <div class="stat-number">{{ $hero->stat_number }}</div>
                                    @endif
                                    @if($hero->stat_label)
                                        <div class="stat-label">{{ $hero->stat_label }}</div>
                                    @endif
                                </div>
                            @endif
                            
                            <!-- Métadonnées et actions -->
                            <div class="section-meta">
                                <div class="meta-date">
                                    <i class="far fa-calendar"></i>
                                    {{ $hero->created_at->format('d/m/Y') }}
                                </div>
                                
                                <div class="section-actions">
                                    <a href="{{ route('admin.hero.edit', $hero) }}" 
                                       class="btn-action btn-edit"
                                       title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    
                                    <form action="{{ route('admin.hero.toggle-status', $hero) }}" 
                                          method="POST" 
                                          class="d-inline">
                                        @csrf
                                        <button type="button" 
                                                class="btn-action btn-status toggle-status-btn"
                                                data-title="{{ $hero->main_title }}"
                                                data-active="{{ $hero->is_active }}"
                                                title="{{ $hero->is_active ? 'Désactiver' : 'Activer' }}">
                                            <i class="fas fa-power-off"></i>
                                        </button>
                                    </form>
                                    
                                    <form action="{{ route('admin.hero.destroy', $hero) }}" 
                                          method="POST" 
                                          class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" 
                                                class="btn-action btn-delete delete-btn"
                                                data-title="{{ $hero->main_title }}"
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
            @if(!$heroSections->isEmpty())
            <div class="hero-footer">
                <div class="hero-stats-info">
                    <div class="stats-item">
                        <i class="fas fa-layer-group"></i>
                        <span><span class="stats-value">{{ $heroSections->count() }}</span> section{{ $heroSections->count() > 1 ? 's' : '' }}</span>
                    </div>
                    <div class="stats-item">
                        <i class="fas fa-eye"></i>
                        <span><span class="stats-value">{{ $heroSections->where('is_active', true)->count() }}</span> active{{ $heroSections->where('is_active', true)->count() > 1 ? 's' : '' }}</span>
                    </div>
                </div>
                <a href="{{ route('admin.hero.create') }}" class="btn-action btn-edit">
                    <i class="fas fa-plus"></i>
                    Ajouter une section
                </a>
            </div>
            @endif
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation des cartes au survol
    const cards = document.querySelectorAll('.section-card');
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
            const heroTitle = this.dataset.title;
            confirmDeleteHero(heroTitle, this);
        });
    });

    // Confirmation pour activer/désactiver
    const toggleButtons = document.querySelectorAll('.toggle-status-btn');
    toggleButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const heroTitle = this.dataset.title;
            const isActive = this.dataset.active === 'true';
            confirmToggleStatus(heroTitle, isActive, this);
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
});

// Fonction de confirmation pour la suppression
function confirmDeleteHero(heroTitle, button) {
    const form = button.closest('.delete-form');
    
    Swal.fire({
        title: 'Confirmer la suppression',
        html: `
            <div style="text-align: center; padding: 1rem;">
                <div style="width: 80px; height: 80px; margin: 0 auto 1.5rem; background: linear-gradient(135deg, #fef2f2, #fee2e2); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-trash-alt" style="font-size: 2rem; color: #ef4444;"></i>
                </div>
                <h3 style="color: #334155; margin-bottom: 0.75rem;">Supprimer cette section ?</h3>
                <p style="color: #06634e; font-weight: 600; font-size: 1.1rem; margin-bottom: 1rem; padding: 0.5rem; background: #f0fdf4; border-radius: 8px;">
                    "${heroTitle}"
                </p>
                <p style="color: #64748b; font-size: 0.95rem; line-height: 1.5; margin-bottom: 1rem;">
                    Cette section hero et son image seront définitivement supprimées.
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
function confirmToggleStatus(heroTitle, isActive, button) {
    const form = button.closest('form');
    const action = isActive ? 'désactiver' : 'activer';
    const actionColor = isActive ? '#64748b' : '#78ac11';
    const actionBg = isActive ? '#f1f5f9' : '#f0fdf4';
    const actionIcon = isActive ? 'fa-ban' : 'fa-check-circle';
    const confirmText = isActive ? 'Désactiver' : 'Activer';
    
    Swal.fire({
        title: `${isActive ? 'Désactiver' : 'Activer'} la section`,
        html: `
            <div style="text-align: center; padding: 1rem;">
                <div style="width: 80px; height: 80px; margin: 0 auto 1.5rem; background: linear-gradient(135deg, ${actionBg}, ${isActive ? '#e2e8f0' : '#dcfce7'}); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    <i class="fas ${actionIcon}" style="font-size: 2rem; color: ${actionColor};"></i>
                </div>
                <h3 style="color: #334155; margin-bottom: 0.75rem;">
                    ${isActive ? 'Désactiver' : 'Activer'} cette section ?
                </h3>
                <p style="color: #06634e; font-weight: 600; font-size: 1.1rem; margin-bottom: 1rem; padding: 0.5rem; background: ${actionBg}; border-radius: 8px;">
                    "${heroTitle}"
                </p>
                <p style="color: #64748b; font-size: 0.95rem; line-height: 1.5;">
                    ${isActive 
                        ? 'Cette section ne sera plus visible sur votre site. Vous pourrez la réactiver à tout moment.' 
                        : 'Cette section sera visible sur votre site. Les autres sections seront automatiquement désactivées.'}
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