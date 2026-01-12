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

    .about-management {
        min-height: calc(100vh - 80px);
        padding: 2rem 1rem;
        background: linear-gradient(135deg, #f9fafb 0%, #f0fdf4 100%);
        position: relative;
    }

    .about-management::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-dark), var(--secondary));
    }

    .about-container {
        max-width: 1400px;
        margin: 0 auto;
        position: relative;
    }

    /* En-tête */
    .about-header {
        text-align: center;
        margin-bottom: 3rem;
        position: relative;
    }

    .about-header-icon {
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

    .about-header-icon::after {
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

    .about-header-icon i {
        font-size: 2rem;
        color: var(--white);
    }

    .about-title {
        font-size: 2.25rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 0.5rem;
        background: linear-gradient(135deg, var(--primary-dark), var(--secondary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .about-subtitle {
        color: var(--gray-600);
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* Carte principale */
    .about-card {
        background: var(--white);
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-xl);
        padding: 2.5rem;
        position: relative;
        overflow: hidden;
        margin-bottom: 2rem;
    }

    .about-card::before {
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
    .about-actions {
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

    .btn-add-section {
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

    .btn-add-section:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(6, 99, 78, 0.3);
        background: linear-gradient(135deg, var(--primary-light), var(--primary-dark));
        color: var(--white);
    }

    .btn-add-section i {
        font-size: 1.1rem;
    }

    /* Grille des sections */
    .about-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(420px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    @media (max-width: 768px) {
        .about-grid {
            grid-template-columns: 1fr;
        }
    }

    /* Carte de section */
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
    }

    /* En-tête de la carte */
    .section-header {
        padding: 1.75rem 1.75rem 1rem;
        border-bottom: 1px solid var(--gray-200);
        background: var(--gray-50);
    }

    .section-main-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 0.5rem;
        line-height: 1.3;
    }

    .section-subtitle {
        color: var(--secondary);
        font-weight: 500;
        font-size: 0.95rem;
    }

    /* Contenu de la carte */
    .section-content {
        padding: 1.75rem;
    }

    /* Image */
    .image-container {
        width: 100%;
        height: 200px;
        border-radius: var(--radius-md);
        overflow: hidden;
        margin-bottom: 1.5rem;
        position: relative;
    }

    .section-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .section-card:hover .section-image {
        transform: scale(1.05);
    }

    .image-placeholder {
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, var(--gray-100), var(--gray-200));
        border-radius: var(--radius-md);
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

    /* Contenu texte */
    .content-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--primary-dark);
        margin-bottom: 1rem;
    }

    .content-text {
        color: var(--gray-600);
        font-size: 0.9rem;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Caractéristiques */
    .features-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .feature-item {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        padding: 1rem;
        background: var(--gray-50);
        border-radius: var(--radius-md);
        border: 1px solid var(--gray-200);
        transition: var(--transition);
    }

    .feature-item:hover {
        border-color: var(--primary-dark);
        background: var(--white);
    }

    .feature-icon {
        width: 36px;
        height: 36px;
        min-width: 36px;
        background: var(--primary-dark);
        color: var(--white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
    }

    .feature-content h6 {
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--primary-dark);
        margin-bottom: 0.25rem;
    }

    .feature-content p {
        font-size: 0.8rem;
        color: var(--gray-500);
        margin: 0;
        line-height: 1.4;
    }

    /* Valeurs */
    .values-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .value-item {
        text-align: center;
        padding: 1rem;
        background: rgba(120, 172, 17, 0.05);
        border-radius: var(--radius-md);
        border: 1px solid rgba(120, 172, 17, 0.1);
        transition: var(--transition);
    }

    .value-item:hover {
        background: rgba(120, 172, 17, 0.1);
        border-color: var(--secondary);
        transform: translateY(-2px);
    }

    .value-icon {
        color: var(--secondary);
        font-size: 1.5rem;
        margin-bottom: 0.75rem;
    }

    .value-title {
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--primary-dark);
        margin-bottom: 0.25rem;
    }

    .value-text {
        font-size: 0.8rem;
        color: var(--gray-500);
        line-height: 1.4;
    }

    /* Métadonnées et actions */
    .section-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 1px solid var(--gray-200);
    }

    .section-order {
        width: 40px;
        height: 40px;
        background: var(--primary-dark);
        color: var(--white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        transition: var(--transition);
    }

    .section-card:hover .section-order {
        background: var(--secondary);
        transform: scale(1.1);
    }

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
    .about-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 1px solid var(--gray-200);
        color: var(--gray-500);
        font-size: 0.9rem;
    }

    .about-stats-info {
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
        .about-grid {
            grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
        }
        
        .values-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .about-card {
            padding: 1.5rem;
        }
        
        .about-actions {
            flex-direction: column;
            gap: 1rem;
            align-items: stretch;
        }
        
        .btn-add-section {
            justify-content: center;
        }
        
        .about-grid {
            grid-template-columns: 1fr;
        }
        
        .features-grid {
            grid-template-columns: 1fr;
        }
        
        .values-grid {
            grid-template-columns: 1fr;
        }
        
        .section-meta {
            flex-direction: column;
            gap: 1rem;
            align-items: stretch;
        }
        
        .section-actions {
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .about-header-icon {
            width: 60px;
            height: 60px;
        }
        
        .about-header-icon i {
            font-size: 1.5rem;
        }
        
        .about-title {
            font-size: 1.75rem;
        }
        
        .about-card {
            padding: 1.25rem;
        }
        
        .section-content {
            padding: 1.25rem;
        }
        
        .about-footer {
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }
    }
</style>

<div class="about-management">
    <div class="about-container">
        <!-- En-tête -->
        <div class="about-header">
            <div class="about-header-icon">
                <i class="fas fa-info-circle"></i>
            </div>
            <h1 class="about-title">Gestion "Qui sommes-nous"</h1>
            <p class="about-subtitle">
                Gérez les sections de présentation de votre entreprise ou organisation
            </p>
        </div>

        <!-- Carte principale -->
        <div class="about-card">
            <!-- Barre d'actions -->
            <div class="about-actions">
                <div class="stats-badge">
                    <i class="fas fa-layer-group"></i>
                    <span>{{ $aboutSections->count() }} section{{ $aboutSections->count() > 1 ? 's' : '' }}</span>
                </div>
                <a href="{{ route('admin.about.create') }}" class="btn-add-section">
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
                                    <strong>Gestion des sections :</strong> Seule la section active (badge vert) sera affichée.
                                </p>
                                <ul style="margin: 0; padding-left: 1.25rem; color: #475569; font-size: 0.9rem;">
                                    <li>Présentez votre entreprise ou organisation</li>
                                    <li>Ajoutez des caractéristiques et valeurs</li>
                                    <li>Activez/désactivez selon vos besoins</li>
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
            @if($aboutSections->isEmpty())
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <h3 class="empty-title">Aucune section de présentation</h3>
                    <p class="empty-description">
                        Créez votre première section "Qui sommes-nous" pour présenter votre entreprise ou organisation.
                    </p>
                    <a href="{{ route('admin.about.create') }}" class="btn-add-section">
                        <i class="fas fa-plus"></i>
                        Créer votre première section
                    </a>
                </div>
            @else
                <div class="about-grid" id="aboutGrid">
                    @foreach($aboutSections as $about)
                    <div class="section-card {{ $about->is_active ? 'active' : '' }}" 
                         data-order="{{ $about->order }}"
                         data-active="{{ $about->is_active ? 'true' : 'false' }}">
                        
                        <!-- Badge d'état actif -->
                        @if($about->is_active)
                            <div class="active-badge">
                                <i class="fas fa-check-circle"></i>
                                Actif
                            </div>
                        @endif

                        <!-- En-tête de la section -->
                        <div class="section-header">
                            @if($about->section_title)
                                <h3 class="section-main-title">{{ $about->section_title }}</h3>
                            @endif
                            @if($about->section_subtitle)
                                <p class="section-subtitle">{{ Str::limit($about->section_subtitle, 100) }}</p>
                            @endif
                        </div>
                        
                        <!-- Contenu -->
                        <div class="section-content">
                            <!-- Image principale -->
                            @if($about->main_image)
                                <div class="image-container">
                                    <img src="{{ asset('storage/' . $about->main_image) }}" 
                                         alt="{{ $about->main_image_alt ?? 'Section About' }}" 
                                         class="section-image">
                                </div>
                            @else
                                <div class="image-placeholder">
                                    <i class="fas fa-image"></i>
                                    <span>Aucune image</span>
                                </div>
                            @endif
                            
                            <!-- Titre et texte du contenu -->
                            @if($about->content_title)
                                <h4 class="content-title">{{ $about->content_title }}</h4>
                            @endif
                            
                            @if($about->content_text)
                                <p class="content-text">{{ Str::limit($about->content_text, 200) }}</p>
                            @endif
                            
                            <!-- Caractéristiques -->
                            @if($about->feature1_title || $about->feature2_title)
                                <div class="features-grid">
                                    @if($about->feature1_title)
                                    <div class="feature-item">
                                        @if($about->feature1_icon)
                                        <div class="feature-icon">
                                            <i class="{{ $about->feature1_icon }}"></i>
                                        </div>
                                        @endif
                                        <div class="feature-content">
                                            <h6>{{ $about->feature1_title }}</h6>
                                            @if($about->feature1_text)
                                            <p>{{ Str::limit($about->feature1_text, 60) }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                                    
                                    @if($about->feature2_title)
                                    <div class="feature-item">
                                        @if($about->feature2_icon)
                                        <div class="feature-icon">
                                            <i class="{{ $about->feature2_icon }}"></i>
                                        </div>
                                        @endif
                                        <div class="feature-content">
                                            <h6>{{ $about->feature2_title }}</h6>
                                            @if($about->feature2_text)
                                            <p>{{ Str::limit($about->feature2_text, 60) }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            @endif
                            
                            <!-- Valeurs (Mission, Vision, Valeurs) -->
                            @if($about->mission_title || $about->vision_title || $about->values_title)
                                <div class="values-grid">
                                    @if($about->mission_title)
                                    <div class="value-item">
                                        @if($about->mission_icon)
                                        <div class="value-icon">
                                            <i class="{{ $about->mission_icon }}"></i>
                                        </div>
                                        @endif
                                        <div class="value-title">{{ Str::limit($about->mission_title, 25) }}</div>
                                        @if($about->mission_text)
                                        <div class="value-text">{{ Str::limit($about->mission_text, 60) }}</div>
                                        @endif
                                    </div>
                                    @endif
                                    
                                    @if($about->vision_title)
                                    <div class="value-item">
                                        @if($about->vision_icon)
                                        <div class="value-icon">
                                            <i class="{{ $about->vision_icon }}"></i>
                                        </div>
                                        @endif
                                        <div class="value-title">{{ Str::limit($about->vision_title, 25) }}</div>
                                        @if($about->vision_text)
                                        <div class="value-text">{{ Str::limit($about->vision_text, 60) }}</div>
                                        @endif
                                    </div>
                                    @endif
                                    
                                    @if($about->values_title)
                                    <div class="value-item">
                                        @if($about->values_icon)
                                        <div class="value-icon">
                                            <i class="{{ $about->values_icon }}"></i>
                                        </div>
                                        @endif
                                        <div class="value-title">{{ Str::limit($about->values_title, 25) }}</div>
                                        @if($about->values_text)
                                        <div class="value-text">{{ Str::limit($about->values_text, 60) }}</div>
                                        @endif
                                    </div>
                                    @endif
                                </div>
                            @endif
                            
                            <!-- Métadonnées et actions -->
                            <div class="section-meta">
                                <div class="section-order">
                                    {{ $about->order }}
                                </div>
                                
                                <div class="section-actions">
                                    <a href="{{ route('admin.about.edit', $about) }}" 
                                       class="btn-action btn-edit"
                                       title="Modifier">
                                        <i class="fas fa-edit"></i>
                                        Modifier
                                    </a>
                                    
                                    <form action="{{ route('admin.about.toggle-status', $about) }}" 
                                          method="POST" 
                                          class="d-inline toggle-form">
                                        @csrf
                                        <button type="button" 
                                                class="btn-action btn-status toggle-status-btn"
                                                data-title="{{ $about->section_title ?? 'Cette section' }}"
                                                data-active="{{ $about->is_active }}"
                                                title="{{ $about->is_active ? 'Désactiver' : 'Activer' }}">
                                            <i class="fas fa-power-off"></i>
                                            {{ $about->is_active ? 'Désactiver' : 'Activer' }}
                                        </button>
                                    </form>
                                    
                                    <form action="{{ route('admin.about.destroy', $about) }}" 
                                          method="POST" 
                                          class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" 
                                                class="btn-action btn-delete delete-btn"
                                                data-title="{{ $about->section_title ?? 'Cette section' }}"
                                                title="Supprimer">
                                            <i class="fas fa-trash"></i>
                                            Supprimer
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
            @if(!$aboutSections->isEmpty())
            <div class="about-footer">
                <div class="about-stats-info">
                    <div class="stats-item">
                        <i class="fas fa-layer-group"></i>
                        <span><span class="stats-value">{{ $aboutSections->count() }}</span> section{{ $aboutSections->count() > 1 ? 's' : '' }}</span>
                    </div>
                    <div class="stats-item">
                        <i class="fas fa-eye"></i>
                        <span><span class="stats-value">{{ $aboutSections->where('is_active', true)->count() }}</span> active{{ $aboutSections->where('is_active', true)->count() > 1 ? 's' : '' }}</span>
                    </div>
                </div>
                <a href="{{ route('admin.about.create') }}" class="btn-action btn-edit">
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
            const sectionTitle = this.dataset.title;
            confirmDeleteSection(sectionTitle, this);
        });
    });

    // Confirmation pour activer/désactiver
    const toggleButtons = document.querySelectorAll('.toggle-status-btn');
    toggleButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const sectionTitle = this.dataset.title;
            const isActive = this.dataset.active === 'true';
            confirmToggleStatus(sectionTitle, isActive, this);
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
function confirmDeleteSection(sectionTitle, button) {
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
                    "${sectionTitle}"
                </p>
                <p style="color: #64748b; font-size: 0.95rem; line-height: 1.5; margin-bottom: 1rem;">
                    Cette section "Qui sommes-nous" et son image seront définitivement supprimées.
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
function confirmToggleStatus(sectionTitle, isActive, button) {
    const form = button.closest('.toggle-form');
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
                    "${sectionTitle}"
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