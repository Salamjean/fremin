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

    .events-admin {
        min-height: calc(100vh - 80px);
        padding: 2rem 1rem;
        background: linear-gradient(135deg, #f9fafb 0%, #f0fdf4 100%);
        position: relative;
    }

    .events-admin::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-dark), var(--secondary));
    }

    .events-container {
        max-width: 1400px;
        margin: 0 auto;
        position: relative;
    }

    /* En-tête */
    .events-header {
        text-align: center;
        margin-bottom: 3rem;
        position: relative;
    }

    .events-header-icon {
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

    .events-header-icon i {
        font-size: 2rem;
        color: var(--white);
    }

    .events-title {
        font-size: 2.25rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 0.5rem;
        background: linear-gradient(135deg, var(--primary-dark), var(--secondary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .events-subtitle {
        color: var(--gray-600);
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* Carte principale */
    .events-card {
        background: var(--white);
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-xl);
        padding: 2.5rem;
        position: relative;
        overflow: hidden;
        margin-bottom: 2rem;
        width: 100%;
    }

    .events-card::before {
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
    .events-actions {
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

    .btn-add-event {
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

    .btn-add-event:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(6, 99, 78, 0.3);
        background: linear-gradient(135deg, var(--primary-light), var(--primary-dark));
        color: var(--white);
    }

    .btn-add-event i {
        font-size: 1.1rem;
    }

    /* Grille des événements */
    .events-list {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    @media (max-width: 768px) {
        .events-list {
            grid-template-columns: 1fr;
        }
    }

    /* Carte d'événement */
    .event-card {
        background: var(--white);
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-md);
        border: 2px solid var(--gray-200);
        transition: var(--transition);
        position: relative;
    }

    .event-card:hover {
        transform: translateY(-6px);
        box-shadow: var(--shadow-xl);
        border-color: var(--primary-dark);
    }

    .event-card.featured {
        border-color: var(--secondary);
        box-shadow: 0 0 0 3px rgba(120, 172, 17, 0.1);
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

    .inactive-badge {
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

    /* En-tête avec date */
    .event-header {
        background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
        padding: 1.5rem;
        color: var(--white);
        position: relative;
        min-height: 120px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .event-date-card {
        text-align: center;
        background: rgba(255, 255, 255, 0.1);
        padding: 1rem;
        border-radius: var(--radius-md);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        min-width: 100px;
    }

    .event-month {
        font-size: 0.9rem;
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
        margin-bottom: 0.25rem;
    }

    .event-day {
        font-size: 2.5rem;
        font-weight: 700;
        line-height: 1;
        margin-bottom: 0.25rem;
    }

    .event-year {
        font-size: 0.9rem;
        font-weight: 500;
        opacity: 0.9;
    }

    /* Contenu de la carte */
    .event-content {
        padding: 1.75rem;
    }

    .event-title {
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

    /* Informations de localisation */
    .event-info {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        margin-bottom: 1.5rem;
    }

    .info-item {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        color: var(--gray-600);
        font-size: 0.95rem;
    }

    .info-item i {
        color: var(--secondary);
        min-width: 20px;
        margin-top: 0.125rem;
    }

    /* Description */
    .event-description {
        color: var(--gray-600);
        font-size: 0.9rem;
        line-height: 1.5;
        margin-bottom: 1.5rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Bouton d'action */
    .event-button {
        display: block;
        width: 100%;
        padding: 0.75rem 1rem;
        border-radius: var(--radius-sm);
        font-weight: 500;
        text-align: center;
        text-decoration: none;
        transition: var(--transition);
        border: none;
        cursor: pointer;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
        color: var(--white);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, var(--primary-light), var(--primary-dark));
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(6, 99, 78, 0.2);
    }

    .btn-outline-primary {
        background: transparent;
        color: var(--primary-dark);
        border: 2px solid var(--primary-dark);
    }

    .btn-outline-primary:hover {
        background: var(--primary-dark);
        color: var(--white);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(6, 99, 78, 0.2);
    }

    /* Métadonnées et actions */
    .event-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 1.5rem;
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
    .event-actions {
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
    .events-filters {
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
    .events-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 1px solid var(--gray-200);
        color: var(--gray-500);
        font-size: 0.9rem;
    }

    .events-stats-info {
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
        .events-list {
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        }
    }

    @media (max-width: 768px) {
        .events-card {
            padding: 1.5rem;
        }
        
        .events-actions {
            flex-direction: column;
            gap: 1rem;
            align-items: stretch;
        }
        
        .btn-add-event {
            justify-content: center;
        }
        
        .events-list {
            grid-template-columns: 1fr;
        }
        
        .events-filters {
            justify-content: center;
        }
        
        .event-actions {
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .events-footer {
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }
    }

    @media (max-width: 480px) {
        .events-header-icon {
            width: 60px;
            height: 60px;
        }
        
        .events-header-icon i {
            font-size: 1.5rem;
        }
        
        .events-title {
            font-size: 1.75rem;
        }
        
        .events-card {
            padding: 1.25rem;
        }
        
        .event-content {
            padding: 1.25rem;
        }
        
        .filter-btn {
            flex: 1;
            min-width: 140px;
            justify-content: center;
        }
    }
</style>

<div class="events-admin">
    <div class="events-container">
        <!-- En-tête -->
        <div class="events-header">
            <div class="events-header-icon">
                <i class="fas fa-calendar-check"></i>
            </div>
            <h1 class="events-title">Gestion des Événements</h1>
            <p class="events-subtitle">
                Gérez les événements à venir qui apparaissent sur votre site.
            </p>
        </div>

        <!-- Carte principale -->
        <div class="events-card">
            <!-- Barre d'actions -->
            <div class="events-actions">
                <div class="stats-badge">
                    <i class="fas fa-calendar-alt"></i>
                    <span>{{ $events->count() }} événement{{ $events->count() > 1 ? 's' : '' }}</span>
                </div>
                <a href="{{ route('admin.events.create') }}" class="btn-add-event">
                    <i class="fas fa-plus"></i>
                    Nouvel Événement
                </a>
            </div>

            <!-- Filtres -->
            <div class="events-filters">
                <button class="filter-btn active" data-filter="all">
                    <i class="fas fa-list"></i>
                    Tous ({{ $events->count() }})
                </button>
                <button class="filter-btn" data-filter="active">
                    <i class="fas fa-eye"></i>
                    Actifs ({{ $events->where('is_active', true)->count() }})
                </button>
                <button class="filter-btn" data-filter="featured">
                    <i class="fas fa-star"></i>
                    Vedettes ({{ $events->where('is_featured', true)->count() }})
                </button>
                <button class="filter-btn" data-filter="upcoming">
                    <i class="fas fa-clock"></i>
                    À venir ({{ $events->where('event_date', '>=', today())->count() }})
                </button>
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
                                    <strong>Conseil :</strong> Seuls les événements actifs seront affichés sur votre site.
                                </p>
                                <ul style="margin: 0; padding-left: 1.25rem; color: #475569; font-size: 0.9rem;">
                                    <li>Les événements avec badge étoile sont en vedette</li>
                                    <li>Cliquez sur l'icône œil pour activer/désactiver</li>
                                    <li>Cliquez sur l'icône étoile pour mettre en vedette</li>
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

            <!-- Grille des événements -->
            @if($events->isEmpty())
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-calendar-times"></i>
                    </div>
                    <h3 class="empty-title">Aucun événement programmé</h3>
                    <p class="empty-description">
                        Créez votre premier événement pour commencer à informer vos visiteurs.
                    </p>
                    <a href="{{ route('admin.events.create') }}" class="btn-add-event">
                        <i class="fas fa-plus"></i>
                        Créer votre premier événement
                    </a>
                </div>
            @else
                <div class="events-list" id="eventsList">
                    @foreach($events as $event)
                    <div class="event-card {{ $event->is_featured ? 'featured' : '' }}"
                         data-active="{{ $event->is_active ? 'true' : 'false' }}"
                         data-featured="{{ $event->is_featured ? 'true' : 'false' }}"
                         data-date="{{ $event->event_date->format('Y-m-d') }}">
                        
                        <!-- Badge vedette -->
                        @if($event->is_featured)
                            <div class="featured-badge">
                                <i class="fas fa-star"></i>
                                En vedette
                            </div>
                        @endif

                        <!-- Badge inactif -->
                        @if(!$event->is_active)
                            <div class="inactive-badge">
                                <i class="fas fa-eye-slash"></i>
                                Inactif
                            </div>
                        @endif

                        <!-- En-tête avec date -->
                        <div class="event-header">
                            <div class="event-date-card">
                                <div class="event-month">{{ $event->month_short }}</div>
                                <div class="event-day">{{ $event->day }}</div>
                                <div class="event-year">{{ $event->year }}</div>
                            </div>
                        </div>
                        
                        <!-- Contenu -->
                        <div class="event-content">
                            <h3 class="event-title">{{ $event->title }}</h3>
                            
                            <!-- Informations -->
                            <div class="event-info">
                                <div class="info-item">
                                    <i class="{{ $event->location_icon }}"></i>
                                    <span>{{ $event->location }}</span>
                                </div>
                                <div class="info-item">
                                    <i class="far fa-clock"></i>
                                    <span>{{ $event->formatted_time }}</span>
                                </div>
                            </div>
                            
                            <!-- Description -->
                            @if($event->description)
                                <p class="event-description">{{ Str::limit($event->description, 120) }}</p>
                            @endif
                            
                            <!-- Bouton -->
                            <button class="event-button {{ $event->button_css }}">
                                {{ $event->button_text ?: 'En savoir plus' }}
                            </button>
                            
                            <!-- Métadonnées et actions -->
                            <div class="event-meta">
                                <div class="meta-date">
                                    <i class="far fa-calendar"></i>
                                    {{ $event->event_date->format('d/m/Y') }}
                                </div>
                                
                                <div class="event-actions">
                                    <a href="{{ route('admin.events.edit', $event) }}" 
                                       class="btn-action btn-edit"
                                       title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    
                                    <form action="{{ route('admin.events.toggle-status', $event) }}" 
                                          method="POST" 
                                          class="d-inline">
                                        @csrf
                                        <button type="button" 
                                                class="btn-action btn-status toggle-status-btn"
                                                data-title="{{ $event->title }}"
                                                data-active="{{ $event->is_active }}"
                                                title="{{ $event->is_active ? 'Désactiver' : 'Activer' }}">
                                            <i class="fas {{ $event->is_active ? 'fa-eye' : 'fa-eye-slash' }}"></i>
                                        </button>
                                    </form>
                                    
                                    <form action="{{ route('admin.events.toggle-featured', $event) }}" 
                                          method="POST" 
                                          class="d-inline">
                                        @csrf
                                        <button type="button" 
                                                class="btn-action btn-featured toggle-featured-btn"
                                                data-title="{{ $event->title }}"
                                                data-featured="{{ $event->is_featured }}"
                                                title="{{ $event->is_featured ? 'Retirer de la vedette' : 'Mettre en vedette' }}">
                                            <i class="fas {{ $event->is_featured ? 'fa-star' : 'fa-star' }}"></i>
                                        </button>
                                    </form>
                                    
                                    <form action="{{ route('admin.events.destroy', $event) }}" 
                                          method="POST" 
                                          class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" 
                                                class="btn-action btn-delete delete-btn"
                                                data-title="{{ $event->title }}"
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
            @if(!$events->isEmpty())
            <div class="events-footer">
                <div class="events-stats-info">
                    <div class="stats-item">
                        <i class="fas fa-calendar-alt"></i>
                        <span><span class="stats-value">{{ $events->count() }}</span> événement{{ $events->count() > 1 ? 's' : '' }}</span>
                    </div>
                    <div class="stats-item">
                        <i class="fas fa-eye"></i>
                        <span><span class="stats-value">{{ $events->where('is_active', true)->count() }}</span> actif{{ $events->where('is_active', true)->count() > 1 ? 's' : '' }}</span>
                    </div>
                    <div class="stats-item">
                        <i class="fas fa-star"></i>
                        <span><span class="stats-value">{{ $events->where('is_featured', true)->count() }}</span> en vedette</span>
                    </div>
                </div>
                <a href="{{ route('admin.events.create') }}" class="btn-action btn-edit">
                    <i class="fas fa-plus"></i>
                    Ajouter un événement
                </a>
            </div>
            @endif
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation des cartes au survol
    const cards = document.querySelectorAll('.event-card');
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
            const eventTitle = this.dataset.title;
            confirmDeleteEvent(eventTitle, this);
        });
    });

    // Confirmation pour activer/désactiver
    const toggleButtons = document.querySelectorAll('.toggle-status-btn');
    toggleButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const eventTitle = this.dataset.title;
            const isActive = this.dataset.active === 'true';
            confirmToggleStatus(eventTitle, isActive, this);
        });
    });

    // Confirmation pour mettre en vedette
    const featuredButtons = document.querySelectorAll('.toggle-featured-btn');
    featuredButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const eventTitle = this.dataset.title;
            const isFeatured = this.dataset.featured === 'true';
            confirmToggleFeatured(eventTitle, isFeatured, this);
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
            filterEvents(filter);
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
    function filterEvents(filter) {
        const events = document.querySelectorAll('.event-card');
        const today = new Date().toISOString().split('T')[0];
        
        events.forEach(event => {
            const isActive = event.dataset.active === 'true';
            const isFeatured = event.dataset.featured === 'true';
            const eventDate = event.dataset.date;
            const isUpcoming = eventDate >= today;
            
            let show = false;
            
            switch(filter) {
                case 'all':
                    show = true;
                    break;
                case 'active':
                    show = isActive;
                    break;
                case 'featured':
                    show = isFeatured && isActive;
                    break;
                case 'upcoming':
                    show = isActive && isUpcoming;
                    break;
            }
            
            if (show) {
                event.style.display = 'block';
                setTimeout(() => {
                    event.style.opacity = '1';
                    event.style.transform = 'translateY(0)';
                }, 50);
            } else {
                event.style.opacity = '0';
                event.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    event.style.display = 'none';
                }, 300);
            }
        });
    }
});

// Fonction de confirmation pour la suppression
function confirmDeleteEvent(eventTitle, button) {
    const form = button.closest('.delete-form');
    
    Swal.fire({
        title: 'Confirmer la suppression',
        html: `
            <div style="text-align: center; padding: 1rem;">
                <div style="width: 80px; height: 80px; margin: 0 auto 1.5rem; background: linear-gradient(135deg, #fef2f2, #fee2e2); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-trash-alt" style="font-size: 2rem; color: #ef4444;"></i>
                </div>
                <h3 style="color: #334155; margin-bottom: 0.75rem;">Supprimer cet événement ?</h3>
                <p style="color: #06634e; font-weight: 600; font-size: 1.1rem; margin-bottom: 1rem; padding: 0.5rem; background: #f0fdf4; border-radius: 8px;">
                    "${eventTitle}"
                </p>
                <p style="color: #64748b; font-size: 0.95rem; line-height: 1.5; margin-bottom: 1rem;">
                    Cet événement sera définitivement supprimé.
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
function confirmToggleStatus(eventTitle, isActive, button) {
    const form = button.closest('form');
    const action = isActive ? 'désactiver' : 'activer';
    const actionColor = isActive ? '#64748b' : '#78ac11';
    const actionBg = isActive ? '#f1f5f9' : '#f0fdf4';
    const actionIcon = isActive ? 'fa-eye-slash' : 'fa-eye';
    const confirmText = isActive ? 'Désactiver' : 'Activer';
    
    Swal.fire({
        title: `${isActive ? 'Désactiver' : 'Activer'} l'événement`,
        html: `
            <div style="text-align: center; padding: 1rem;">
                <div style="width: 80px; height: 80px; margin: 0 auto 1.5rem; background: linear-gradient(135deg, ${actionBg}, ${isActive ? '#e2e8f0' : '#dcfce7'}); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    <i class="fas ${actionIcon}" style="font-size: 2rem; color: ${actionColor};"></i>
                </div>
                <h3 style="color: #334155; margin-bottom: 0.75rem;">
                    ${isActive ? 'Désactiver' : 'Activer'} cet événement ?
                </h3>
                <p style="color: #06634e; font-weight: 600; font-size: 1.1rem; margin-bottom: 1rem; padding: 0.5rem; background: ${actionBg}; border-radius: 8px;">
                    "${eventTitle}"
                </p>
                <p style="color: #64748b; font-size: 0.95rem; line-height: 1.5;">
                    ${isActive 
                        ? 'Cet événement ne sera plus visible sur votre site.' 
                        : 'Cet événement sera visible sur votre site.'}
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

// Fonction de confirmation pour mettre en vedette
function confirmToggleFeatured(eventTitle, isFeatured, button) {
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
                    ${isFeatured ? 'Retirer cet événement de la vedette ?' : 'Mettre cet événement en vedette ?'}
                </h3>
                <p style="color: #06634e; font-weight: 600; font-size: 1.1rem; margin-bottom: 1rem; padding: 0.5rem; background: ${actionBg}; border-radius: 8px;">
                    "${eventTitle}"
                </p>
                <p style="color: #64748b; font-size: 0.95rem; line-height: 1.5;">
                    ${isFeatured 
                        ? 'Cet événement ne sera plus mis en avant sur votre site.' 
                        : 'Cet événement sera mis en avant sur votre site.'}
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