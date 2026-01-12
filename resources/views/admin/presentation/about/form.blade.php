@extends('admin.layouts.template')
@section('content')
    <style>
        .about-form-container {
            min-height: calc(100vh - 80px);
            padding: 2rem 1rem;
            background: linear-gradient(135deg, #f9fafb 0%, #f0fdf4 100%);
            position: relative;
        }

        .about-form-wrapper {
            width: 90%;
            margin: 0 auto;
            position: relative;
        }

        /* En-tête */
        .about-form-header {
            text-align: center;
            margin-bottom: 2.5rem;
            position: relative;
        }

        .about-form-header-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            background: linear-gradient(135deg, #06634e, #0a7a62);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            box-shadow: 0 10px 25px -5px rgba(6, 99, 78, 0.1);
        }

        .about-form-header-icon i {
            font-size: 2rem;
            color: #ffffff;
        }

        .about-form-title {
            font-size: 2rem;
            font-weight: 700;
            color: #06634e;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #06634e, #78ac11);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .about-form-subtitle {
            color: #475569;
            font-size: 1rem;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Formulaire principal */
        .about-form-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 25px -5px rgba(6, 99, 78, 0.1);
            padding: 2.5rem;
            position: relative;
            margin-bottom: 2rem;
        }

        .about-form-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #06634e, #78ac11);
            border-radius: 16px 16px 0 0;
        }

        /* Navigation par onglets */
        .form-tabs {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 2rem;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 0.5rem;
        }

        .tab-btn {
            padding: 0.75rem 1.5rem;
            background: #f1f5f9;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            color: #475569;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .tab-btn:hover {
            background: #e2e8f0;
            color: #06634e;
        }

        .tab-btn.active {
            background: linear-gradient(135deg, #06634e, #0a7a62);
            color: #ffffff;
            box-shadow: 0 2px 8px rgba(6, 99, 78, 0.2);
        }

        /* Contenu des onglets */
        .tab-content {
            display: none;
            animation: fadeIn 0.3s ease;
        }

        .tab-content.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Sections du formulaire */
        .form-section {
            background: #f8fafc;
            border-radius: 12px;
            padding: 1.75rem;
            margin-bottom: 1.5rem;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .form-section:hover {
            border-color: #06634e;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12);
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
            color: #06634e;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .section-header i {
            color: #78ac11;
            font-size: 1.25rem;
        }

        /* Groupes de formulaire */
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.75rem;
            font-weight: 600;
            color: #334155;
            font-size: 0.95rem;
        }

        .form-label i {
            color: #06634e;
            font-size: 0.9rem;
        }

        .form-hint {
            display: block;
            font-size: 0.85rem;
            color: #64748b;
            margin-top: 0.5rem;
            line-height: 1.4;
        }

        .input-wrapper {
            position: relative;
        }

        .form-control, .form-textarea {
            width: 95%;
            padding: 1rem;
            font-size: 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            background: #ffffff;
            transition: all 0.3s ease;
            color: #1e293b;
            line-height: 1.5;
            font-family: inherit;
        }

        .form-textarea {
            min-height: 100px;
            resize: vertical;
        }

        .form-control:focus, .form-textarea:focus {
            outline: none;
            border-color: #06634e;
            box-shadow: 0 0 0 4px rgba(6, 99, 78, 0.1);
            background: #ffffff;
        }

        .form-control:hover, .form-textarea:hover {
            border-color: #cbd5e1;
        }

        .form-control::placeholder, .form-textarea::placeholder {
            color: #94a3b8;
        }

        .form-control.is-invalid, .form-textarea.is-invalid {
            border-color: #ef4444;
            background-color: #fef2f2;
        }

        .error-message {
            display: block;
            margin-top: 0.5rem;
            font-size: 0.85rem;
            color: #ef4444;
            padding-left: 0.75rem;
            border-left: 3px solid #ef4444;
        }

        /* Grille des champs */
        .form-fields-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        @media (max-width: 768px) {
            .form-fields-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Zone de téléchargement d'image */
        .image-upload-area {
            border: 2px dashed #cbd5e1;
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #f8fafc;
            position: relative;
            overflow: hidden;
            margin-bottom: 1rem;
        }

        .image-upload-area:hover {
            border-color: #06634e;
            background: #ffffff;
        }

        .image-preview-container {
            width: 100%;
            max-height: 300px;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 1rem;
        }

        .image-preview-container img {
            width: 100%;
            height: auto;
            max-height: 300px;
            object-fit: cover;
            display: block;
        }

        .image-placeholder {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #64748b;
            margin-bottom: 1rem;
        }

        .image-placeholder i {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .image-upload-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: linear-gradient(135deg, #06634e, #0a7a62);
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .image-upload-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .image-input {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            cursor: pointer;
        }

        /* Toggle switch */
        .toggle-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem;
            background: #ffffff;
            border-radius: 8px;
            border: 2px solid #e2e8f0;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .toggle-wrapper:hover {
            border-color: #06634e;
        }

        .toggle-label {
            font-weight: 500;
            color: #334155;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .toggle-switch {
            position: relative;
            width: 52px;
            height: 28px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: #cbd5e1;
            transition: all 0.3s ease;
            border-radius: 34px;
        }

        .toggle-slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 4px;
            bottom: 4px;
            background: #ffffff;
            transition: all 0.3s ease;
            border-radius: 50%;
        }

        input:checked + .toggle-slider {
            background: linear-gradient(135deg, #78ac11, #8bc31f);
        }

        input:checked + .toggle-slider:before {
            transform: translateX(24px);
        }

        /* Boutons d'action */
        .form-actions {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid #e2e8f0;
        }

        .btn {
            padding: 1rem 2.5rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            min-width: 160px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #06634e, #0a7a62);
            color: #ffffff;
            box-shadow: 0 4px 15px rgba(6, 99, 78, 0.2);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(6, 99, 78, 0.3);
            background: linear-gradient(135deg, #0a7a62, #06634e);
        }

        .btn-secondary {
            background: #ffffff;
            color: #334155;
            border: 2px solid #cbd5e1;
        }

        .btn-secondary:hover {
            border-color: #06634e;
            color: #06634e;
            transform: translateY(-3px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .btn-icon {
            font-size: 1.1rem;
        }

        /* Champs d'icônes */
        .icon-input-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .icon-preview {
            width: 40px;
            height: 40px;
            background: #06634e;
            color: #ffffff;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }

        /* Prévisualisation des icônes */
        .icon-suggestions {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .icon-suggestion {
            width: 40px;
            height: 40px;
            background: #f1f5f9;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1.25rem;
            color: #475569;
        }

        .icon-suggestion:hover {
            background: #06634e;
            color: #ffffff;
            transform: scale(1.1);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .about-form-card {
                padding: 1.5rem;
            }

            .about-form-title {
                font-size: 1.75rem;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                min-width: auto;
            }

            .tab-btn {
                padding: 0.5rem 1rem;
                font-size: 0.9rem;
            }

            .icon-suggestions {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 480px) {
            .about-form-card {
                padding: 1.25rem;
            }

            .about-form-header-icon {
                width: 60px;
                height: 60px;
            }

            .about-form-header-icon i {
                font-size: 1.5rem;
            }

            .about-form-title {
                font-size: 1.5rem;
            }

            .form-section {
                padding: 1.25rem;
            }
        }
    </style>

    <div class="about-form-container">
        <div class="about-form-wrapper">
            <!-- En-tête -->
            <div class="about-form-header">
                <div class="about-form-header-icon">
                    <i class="fas fa-info-circle"></i>
                </div>
                <h1 class="about-form-title">
                    {{ isset($about) ? 'Modifier "Qui sommes-nous"' : 'Nouvelle Section "Qui sommes-nous"' }}
                </h1>
                <p class="about-form-subtitle">
                    {{ isset($about) ? 'Modifiez le contenu de votre section' : 'Configurez la section "Qui sommes-nous" de votre site' }}
                </p>
            </div>

            <!-- Formulaire principal -->
            <form action="{{ isset($about) ? route('admin.about.update', $about) : route('admin.about.store') }}"
                method="POST" enctype="multipart/form-data" id="aboutForm" class="about-form-card">
                @csrf
                @if (isset($about))
                    @method('PUT')
                @endif

                <!-- Navigation par onglets -->
                <div class="form-tabs">
                    <button type="button" class="tab-btn active" data-tab="general">
                        <i class="fas fa-cog"></i> Général
                    </button>
                    <button type="button" class="tab-btn" data-tab="content">
                        <i class="fas fa-align-left"></i> Contenu
                    </button>
                    <button type="button" class="tab-btn" data-tab="features">
                        <i class="fas fa-star"></i> Fonctionnalités
                    </button>
                    <button type="button" class="tab-btn" data-tab="values">
                        <i class="fas fa-gem"></i> Valeurs
                    </button>
                    <button type="button" class="tab-btn" data-tab="settings">
                        <i class="fas fa-sliders-h"></i> Paramètres
                    </button>
                </div>

                <!-- Onglet 1 : Général -->
                <div id="general-tab" class="tab-content active">
                    <div class="form-section">
                        <div class="section-header">
                            <i class="fas fa-heading"></i>
                            Titres de la section
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="section_title">
                                <i class="fas fa-font"></i>
                                Titre principal
                            </label>
                            <input type="text" class="form-control @error('section_title') is-invalid @enderror"
                                id="section_title" name="section_title"
                                value="{{ old('section_title', $about->section_title ?? '') }}"
                                placeholder="Ex: Qui sommes-nous ?">
                            <div class="form-hint">Titre principal de la section (optionnel)</div>
                            @error('section_title')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="section_subtitle">
                                <i class="fas fa-subscript"></i>
                                Sous-titre
                            </label>
                            <input type="text" class="form-control @error('section_subtitle') is-invalid @enderror"
                                id="section_subtitle" name="section_subtitle"
                                value="{{ old('section_subtitle', $about->section_subtitle ?? '') }}"
                                placeholder="Ex: Structure placée sous la tutelle du Ministère du Commerce et de l'Industrie">
                            <div class="form-hint">Sous-titre de la section (optionnel, 255 caractères max)</div>
                            @error('section_subtitle')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-section">
                        <div class="section-header">
                            <i class="fas fa-image"></i>
                            Image principale
                        </div>

                        <div class="image-upload-area" id="imageUploadArea">
                            <div class="image-preview-container" id="imagePreviewContainer">
                                @if (isset($about) && $about->main_image)
                                    <img src="{{ asset('storage/' . $about->main_image) }}" alt="Image actuelle"
                                        id="currentImage">
                                @else
                                    <div class="image-placeholder" id="imagePlaceholder">
                                        <i class="fas fa-image"></i>
                                        <span>Aucune image sélectionnée</span>
                                    </div>
                                @endif
                            </div>

                            <button type="button" class="image-upload-btn"
                                onclick="document.getElementById('main_image').click()">
                                <i class="fas fa-camera"></i>
                                {{ isset($about) ? 'Changer l\'image' : 'Choisir une image' }}
                            </button>

                            <input type="file" class="image-input" id="main_image" name="main_image" accept="image/*">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="main_image_alt">
                                <i class="fas fa-search"></i>
                                Texte alternatif de l'image
                            </label>
                            <input type="text" class="form-control @error('main_image_alt') is-invalid @enderror"
                                id="main_image_alt" name="main_image_alt"
                                value="{{ old('main_image_alt', $about->main_image_alt ?? '') }}"
                                placeholder="Ex: FREMIN Institution - Photo de présentation">
                            <div class="form-hint">Important pour l'accessibilité et le référencement (255 caractères max)</div>
                            @error('main_image_alt')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Onglet 2 : Contenu -->
                <div id="content-tab" class="tab-content">
                    <div class="form-section">
                        <div class="section-header">
                            <i class="fas fa-align-left"></i>
                            Contenu principal
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="content_title">
                                <i class="fas fa-heading"></i>
                                Titre du contenu
                            </label>
                            <input type="text" class="form-control @error('content_title') is-invalid @enderror"
                                id="content_title" name="content_title"
                                value="{{ old('content_title', $about->content_title ?? '') }}"
                                placeholder="Ex: Notre Histoire">
                            <div class="form-hint">Titre du contenu principal (optionnel)</div>
                            @error('content_title')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="content_text">
                                <i class="fas fa-paragraph"></i>
                                Texte de présentation
                            </label>
                            <textarea class="form-textarea @error('content_text') is-invalid @enderror" id="content_text" name="content_text"
                                rows="6" placeholder="Ex: Créé pour moderniser le tissu productif ivoirien, le FREMIN s'inscrit dans la vision gouvernementale...">{{ old('content_text', $about->content_text ?? '') }}</textarea>
                            <div class="form-hint">Texte de présentation de votre organisation</div>
                            @error('content_text')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Onglet 3 : Fonctionnalités -->
                <div id="features-tab" class="tab-content">
                    <div class="form-section">
                        <div class="section-header">
                            <i class="fas fa-star"></i>
                            Fonctionnalités principales
                        </div>

                        <div class="form-fields-grid">
                            <!-- Fonctionnalité 1 -->
                            <div class="form-group">
                                <label class="form-label" for="feature1_title">
                                    <i class="fas fa-tag"></i>
                                    Titre Fonctionnalité 1
                                </label>
                                <input type="text" class="form-control @error('feature1_title') is-invalid @enderror"
                                    id="feature1_title" name="feature1_title"
                                    value="{{ old('feature1_title', $about->feature1_title ?? '') }}"
                                    placeholder="Ex: Modernisation">
                                <div class="form-hint">Titre de la première fonctionnalité (optionnel)</div>
                                @error('feature1_title')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="feature1_text">
                                    <i class="fas fa-align-left"></i>
                                    Description Fonctionnalité 1
                                </label>
                                <input type="text" class="form-control @error('feature1_text') is-invalid @enderror"
                                    id="feature1_text" name="feature1_text"
                                    value="{{ old('feature1_text', $about->feature1_text ?? '') }}"
                                    placeholder="Ex: Modernisation du tissu productif">
                                <div class="form-hint">Description courte (255 caractères max)</div>
                                @error('feature1_text')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Fonctionnalité 2 -->
                            <div class="form-group">
                                <label class="form-label" for="feature2_title">
                                    <i class="fas fa-tag"></i>
                                    Titre Fonctionnalité 2
                                </label>
                                <input type="text" class="form-control @error('feature2_title') is-invalid @enderror"
                                    id="feature2_title" name="feature2_title"
                                    value="{{ old('feature2_title', $about->feature2_title ?? '') }}"
                                    placeholder="Ex: Accompagnement">
                                <div class="form-hint">Titre de la deuxième fonctionnalité (optionnel)</div>
                                @error('feature2_title')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="feature2_text">
                                    <i class="fas fa-align-left"></i>
                                    Description Fonctionnalité 2
                                </label>
                                <input type="text" class="form-control @error('feature2_text') is-invalid @enderror"
                                    id="feature2_text" name="feature2_text"
                                    value="{{ old('feature2_text', $about->feature2_text ?? '') }}"
                                    placeholder="Ex: Accompagnement personnalisé">
                                <div class="form-hint">Description courte (255 caractères max)</div>
                                @error('feature2_text')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Icônes des fonctionnalités -->
                        <div class="form-fields-grid">
                            <div class="form-group">
                                <label class="form-label" for="feature1_icon">
                                    <i class="fas fa-icons"></i>
                                    Icône Fonctionnalité 1
                                </label>
                                <div class="icon-input-group">
                                    <div class="icon-preview" id="feature1IconPreview">
                                        @if(isset($about) && $about->feature1_icon)
                                            <i class="{{ $about->feature1_icon }}"></i>
                                        @else
                                            <i class="fas fa-chart-line"></i>
                                        @endif
                                    </div>
                                    <input type="text" class="form-control" id="feature1_icon" name="feature1_icon"
                                        value="{{ old('feature1_icon', $about->feature1_icon ?? 'fas fa-chart-line') }}"
                                        placeholder="fas fa-chart-line">
                                </div>
                                <div class="form-hint">Classe FontAwesome (ex: fas fa-chart-line)</div>
                                
                                <div class="icon-suggestions mt-2">
                                    @foreach(['fas fa-chart-line', 'fas fa-rocket', 'fas fa-lightbulb', 'fas fa-cogs', 
                                             'fas fa-users', 'fas fa-handshake', 'fas fa-bullseye', 'fas fa-trophy'] as $icon)
                                        <div class="icon-suggestion" onclick="setIcon('feature1_icon', '{{ $icon }}')">
                                            <i class="{{ $icon }}"></i>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="feature2_icon">
                                    <i class="fas fa-icons"></i>
                                    Icône Fonctionnalité 2
                                </label>
                                <div class="icon-input-group">
                                    <div class="icon-preview" id="feature2IconPreview">
                                        @if(isset($about) && $about->feature2_icon)
                                            <i class="{{ $about->feature2_icon }}"></i>
                                        @else
                                            <i class="fas fa-hands-helping"></i>
                                        @endif
                                    </div>
                                    <input type="text" class="form-control" id="feature2_icon" name="feature2_icon"
                                        value="{{ old('feature2_icon', $about->feature2_icon ?? 'fas fa-hands-helping') }}"
                                        placeholder="fas fa-hands-helping">
                                </div>
                                <div class="form-hint">Classe FontAwesome (ex: fas fa-hands-helping)</div>
                                
                                <div class="icon-suggestions mt-2">
                                    @foreach(['fas fa-hands-helping', 'fas fa-user-friends', 'fas fa-comments', 'fas fa-heart',
                                             'fas fa-shield-alt', 'fas fa-clock', 'fas fa-gem', 'fas fa-star'] as $icon)
                                        <div class="icon-suggestion" onclick="setIcon('feature2_icon', '{{ $icon }}')">
                                            <i class="{{ $icon }}"></i>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Onglet 4 : Valeurs -->
                <div id="values-tab" class="tab-content">
                    <!-- Mission -->
                    <div class="form-section">
                        <div class="section-header">
                            <i class="fas fa-bullseye"></i>
                            Mission
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="mission_title">
                                <i class="fas fa-tag"></i>
                                Titre Mission
                            </label>
                            <input type="text" class="form-control @error('mission_title') is-invalid @enderror"
                                id="mission_title" name="mission_title"
                                value="{{ old('mission_title', $about->mission_title ?? '') }}"
                                placeholder="Ex: Notre Mission">
                            <div class="form-hint">Titre de la mission (optionnel)</div>
                            @error('mission_title')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="mission_text">
                                <i class="fas fa-align-left"></i>
                                Texte Mission
                            </label>
                            <textarea class="form-textarea @error('mission_text') is-invalid @enderror" id="mission_text" name="mission_text"
                                rows="3" placeholder="Ex: Accompagner la compétitivité du secteur industriel...">{{ old('mission_text', $about->mission_text ?? '') }}</textarea>
                            <div class="form-hint">Description de votre mission</div>
                            @error('mission_text')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="mission_icon">
                                <i class="fas fa-icons"></i>
                                Icône Mission
                            </label>
                            <div class="icon-input-group">
                                <div class="icon-preview" id="missionIconPreview">
                                    @if(isset($about) && $about->mission_icon)
                                        <i class="{{ $about->mission_icon }}"></i>
                                    @else
                                        <i class="fas fa-bullseye"></i>
                                    @endif
                                </div>
                                <input type="text" class="form-control" id="mission_icon" name="mission_icon"
                                    value="{{ old('mission_icon', $about->mission_icon ?? 'fas fa-bullseye') }}"
                                    placeholder="fas fa-bullseye">
                            </div>
                            <div class="form-hint">Classe FontAwesome (ex: fas fa-bullseye)</div>
                        </div>
                    </div>

                    <!-- Vision -->
                    <div class="form-section">
                        <div class="section-header">
                            <i class="fas fa-eye"></i>
                            Vision
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="vision_title">
                                <i class="fas fa-tag"></i>
                                Titre Vision
                            </label>
                            <input type="text" class="form-control @error('vision_title') is-invalid @enderror"
                                id="vision_title" name="vision_title"
                                value="{{ old('vision_title', $about->vision_title ?? '') }}"
                                placeholder="Ex: Notre Vision">
                            <div class="form-hint">Titre de la vision (optionnel)</div>
                            @error('vision_title')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="vision_text">
                                <i class="fas fa-align-left"></i>
                                Texte Vision
                            </label>
                            <textarea class="form-textarea @error('vision_text') is-invalid @enderror" id="vision_text" name="vision_text"
                                rows="3" placeholder="Ex: Devenir le partenaire privilégié de l'industrie...">{{ old('vision_text', $about->vision_text ?? '') }}</textarea>
                            <div class="form-hint">Description de votre vision</div>
                            @error('vision_text')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="vision_icon">
                                <i class="fas fa-icons"></i>
                                Icône Vision
                            </label>
                            <div class="icon-input-group">
                                <div class="icon-preview" id="visionIconPreview">
                                    @if(isset($about) && $about->vision_icon)
                                        <i class="{{ $about->vision_icon }}"></i>
                                    @else
                                        <i class="fas fa-eye"></i>
                                    @endif
                                </div>
                                <input type="text" class="form-control" id="vision_icon" name="vision_icon"
                                    value="{{ old('vision_icon', $about->vision_icon ?? 'fas fa-eye') }}"
                                    placeholder="fas fa-eye">
                            </div>
                            <div class="form-hint">Classe FontAwesome (ex: fas fa-eye)</div>
                        </div>
                    </div>

                    <!-- Valeurs -->
                    <div class="form-section">
                        <div class="section-header">
                            <i class="fas fa-gem"></i>
                            Valeurs
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="values_title">
                                <i class="fas fa-tag"></i>
                                Titre Valeurs
                            </label>
                            <input type="text" class="form-control @error('values_title') is-invalid @enderror"
                                id="values_title" name="values_title"
                                value="{{ old('values_title', $about->values_title ?? '') }}"
                                placeholder="Ex: Nos Valeurs">
                            <div class="form-hint">Titre des valeurs (optionnel)</div>
                            @error('values_title')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="values_text">
                                <i class="fas fa-align-left"></i>
                                Texte Valeurs
                            </label>
                            <textarea class="form-textarea @error('values_text') is-invalid @enderror" id="values_text" name="values_text"
                                rows="3" placeholder="Ex: Excellence, Innovation, Transparence...">{{ old('values_text', $about->values_text ?? '') }}</textarea>
                            <div class="form-hint">Description de vos valeurs</div>
                            @error('values_text')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="values_icon">
                                <i class="fas fa-icons"></i>
                                Icône Valeurs
                            </label>
                            <div class="icon-input-group">
                                <div class="icon-preview" id="valuesIconPreview">
                                    @if(isset($about) && $about->values_icon)
                                        <i class="{{ $about->values_icon }}"></i>
                                    @else
                                        <i class="fas fa-handshake"></i>
                                    @endif
                                </div>
                                <input type="text" class="form-control" id="values_icon" name="values_icon"
                                    value="{{ old('values_icon', $about->values_icon ?? 'fas fa-handshake') }}"
                                    placeholder="fas fa-handshake">
                            </div>
                            <div class="form-hint">Classe FontAwesome (ex: fas fa-handshake)</div>
                        </div>
                    </div>
                </div>

                <!-- Onglet 5 : Paramètres -->
                <div id="settings-tab" class="tab-content">
                    <div class="form-section">
                        <div class="section-header">
                            <i class="fas fa-sliders-h"></i>
                            Paramètres d'affichage
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="sort_order">
                                <i class="fas fa-sort-numeric-down"></i>
                                Ordre d'affichage
                                <span class="required">*</span>
                            </label>
                            <input type="number" class="form-control @error('sort_order') is-invalid @enderror"
                                id="sort_order" name="sort_order"
                                value="{{ old('sort_order', $about->sort_order ?? 0) }}" required min="0" max="100">
                            <div class="form-hint">Détermine la position dans la liste des sections (0 = premier)</div>
                            @error('sort_order')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="toggle-wrapper">
                            <label class="toggle-label" for="is_active">
                                <i class="fas fa-eye"></i>
                                Afficher cette section sur le site
                            </label>
                            <label class="toggle-switch">
                                <input type="checkbox" id="is_active" name="is_active" value="1"
                                    {{ old('is_active', $about->is_active ?? true) ? 'checked' : '' }}>
                                <span class="toggle-slider"></span>
                            </label>
                        </div>
                        <div class="form-hint">Si activé, cette section sera affichée sur la page d'accueil</div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="form-actions">
                    <a href="{{ route('admin.about.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left btn-icon"></i>
                        Retour à la liste
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-{{ isset($about) ? 'sync-alt' : 'plus' }} btn-icon"></i>
                        {{ isset($about) ? 'Mettre à jour' : 'Créer la section' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gestion des onglets
            const tabButtons = document.querySelectorAll('.tab-btn');
            const tabContents = document.querySelectorAll('.tab-content');

            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const tabId = this.getAttribute('data-tab');
                    
                    // Désactiver tous les onglets
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    tabContents.forEach(content => content.classList.remove('active'));
                    
                    // Activer l'onglet sélectionné
                    this.classList.add('active');
                    document.getElementById(`${tabId}-tab`).classList.add('active');
                });
            });

            // Gestion de l'image
            const imageUploadArea = document.getElementById('imageUploadArea');
            const imageInput = document.getElementById('main_image');
            const imagePreviewContainer = document.getElementById('imagePreviewContainer');
            const imagePlaceholder = document.getElementById('imagePlaceholder');
            const currentImage = document.getElementById('currentImage');

            // Drag and drop pour l'image
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                imageUploadArea.addEventListener(eventName, preventDefaults, false);
            });

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            ['dragenter', 'dragover'].forEach(eventName => {
                imageUploadArea.addEventListener(eventName, highlight, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                imageUploadArea.addEventListener(eventName, unhighlight, false);
            });

            function highlight() {
                imageUploadArea.style.borderColor = '#06634e';
                imageUploadArea.style.backgroundColor = 'rgba(6, 99, 78, 0.05)';
            }

            function unhighlight() {
                imageUploadArea.style.borderColor = '#cbd5e1';
                imageUploadArea.style.backgroundColor = '#f8fafc';
            }

            imageUploadArea.addEventListener('drop', handleDrop, false);

            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                imageInput.files = files;
                handleImageSelect(files[0]);
            }

            // Gestion de la sélection d'image
            imageInput.addEventListener('change', function(e) {
                if (this.files && this.files[0]) {
                    handleImageSelect(this.files[0]);
                }
            });

            function handleImageSelect(file) {
                if (!file.type.match('image.*')) {
                    showError('Veuillez sélectionner une image valide');
                    return;
                }

                if (file.size > 5 * 1024 * 1024) { // 5MB
                    showError('La taille de l\'image ne doit pas dépasser 5MB');
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    // Créer une nouvelle image pour la prévisualisation
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.width = '100%';
                    img.style.height = 'auto';
                    img.style.objectFit = 'cover';

                    // Mettre à jour le conteneur de prévisualisation
                    imagePreviewContainer.innerHTML = '';
                    imagePreviewContainer.appendChild(img);

                    // Cacher le placeholder s'il existe
                    if (imagePlaceholder) {
                        imagePlaceholder.style.display = 'none';
                    }

                    // Supprimer l'image actuelle si elle existe
                    if (currentImage) {
                        currentImage.style.display = 'none';
                    }
                };
                reader.readAsDataURL(file);
            }

            function showError(message) {
                // Créer un message d'erreur
                const errorDiv = document.createElement('div');
                errorDiv.className = 'error-message';
                errorDiv.style.textAlign = 'center';
                errorDiv.style.padding = '1rem';
                errorDiv.style.color = '#ef4444';
                errorDiv.style.border = '2px dashed #ef4444';
                errorDiv.style.borderRadius = '8px';
                errorDiv.innerHTML = `<i class="fas fa-exclamation-triangle"></i><br>${message}`;

                // Ajouter le message d'erreur
                imagePreviewContainer.innerHTML = '';
                imagePreviewContainer.appendChild(errorDiv);

                // Réafficher le placeholder après 3 secondes
                setTimeout(() => {
                    if (imagePlaceholder) {
                        imagePlaceholder.style.display = 'flex';
                        imagePreviewContainer.innerHTML = '';
                        imagePreviewContainer.appendChild(imagePlaceholder);
                    }
                }, 3000);
            }

            // Gestion des icônes
            window.setIcon = function(fieldId, iconClass) {
                const input = document.getElementById(fieldId);
                const preview = document.getElementById(fieldId + 'Preview');
                
                if (input && preview) {
                    input.value = iconClass;
                    preview.innerHTML = `<i class="${iconClass}"></i>`;
                }
            };

            // Mise à jour des prévisualisations d'icônes en temps réel
            const iconInputs = ['feature1_icon', 'feature2_icon', 'mission_icon', 'vision_icon', 'values_icon'];
            iconInputs.forEach(inputId => {
                const input = document.getElementById(inputId);
                const preview = document.getElementById(inputId + 'Preview');
                
                if (input && preview) {
                    input.addEventListener('input', function() {
                        if (this.value.trim() !== '') {
                            preview.innerHTML = `<i class="${this.value}"></i>`;
                        } else {
                            preview.innerHTML = '<i class="fas fa-icons"></i>';
                        }
                    });
                }
            });

            // Toggle switch
            const isActiveToggle = document.getElementById('is_active');
            if (isActiveToggle) {
                const toggleWrapper = isActiveToggle.closest('.toggle-wrapper');
                isActiveToggle.addEventListener('change', function() {
                    if (this.checked) {
                        toggleWrapper.style.borderColor = '#78ac11';
                        toggleWrapper.style.backgroundColor = 'rgba(120, 172, 17, 0.05)';
                    } else {
                        toggleWrapper.style.borderColor = '#e2e8f0';
                        toggleWrapper.style.backgroundColor = '#ffffff';
                    }
                });
            }

            // Validation
            const form = document.getElementById('aboutForm');
            if (form) {
                form.addEventListener('submit', function(e) {
                    let isValid = true;
                    
                    // Validation de l'ordre (requis)
                    const orderField = document.getElementById('sort_order');
                    if (orderField && !orderField.value.trim()) {
                        orderField.classList.add('is-invalid');
                        isValid = false;
                    }
                    
                    if (!isValid) {
                        e.preventDefault();
                        // Aller à l'onglet paramètres
                        document.querySelector('[data-tab="settings"]').click();
                        orderField.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                        orderField.focus();
                    }
                });
            }

            // Sauvegarder l'onglet actif dans localStorage
            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const tabId = this.getAttribute('data-tab');
                    localStorage.setItem('aboutFormActiveTab', tabId);
                });
            });

            // Restaurer l'onglet actif
            const activeTab = localStorage.getItem('aboutFormActiveTab') || 'general';
            document.querySelector(`[data-tab="${activeTab}"]`)?.click();
        });
    </script>
@endsection