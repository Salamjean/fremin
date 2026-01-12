@extends('admin.layouts.template')
@section('content')
    <style>
        .news-form-container {
            min-height: calc(100vh - 80px);
            padding: 2rem 1rem;
            background: linear-gradient(135deg, #f9fafb 0%, #f0fdf4 100%);
            position: relative;
        }

        .news-form-wrapper {
            width: 65%;
            margin: 0 auto;
            position: relative;
        }

        /* En-tête */
        .news-form-header {
            text-align: center;
            margin-bottom: 2.5rem;
            position: relative;
        }

        .news-form-header-icon {
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

        .news-form-header-icon i {
            font-size: 2rem;
            color: #ffffff;
        }

        .news-form-title {
            font-size: 2rem;
            font-weight: 700;
            color: #06634e;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #06634e, #78ac11);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .news-form-subtitle {
            color: #475569;
            font-size: 1rem;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Formulaire principal */
        .news-form-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 25px -5px rgba(6, 99, 78, 0.1);
            padding: 2.5rem;
            position: relative;
            margin-bottom: 2rem;
        }

        .news-form-card::before {
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

        .form-label .required {
            color: #ef4444;
            margin-left: 4px;
            font-weight: 700;
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

        .form-control, .form-textarea, .form-select {
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

        .form-control:focus, .form-textarea:focus, .form-select:focus {
            outline: none;
            border-color: #06634e;
            box-shadow: 0 0 0 4px rgba(6, 99, 78, 0.1);
            background: #ffffff;
        }

        .form-control:hover, .form-textarea:hover, .form-select:hover {
            border-color: #cbd5e1;
        }

        .form-control::placeholder, .form-textarea::placeholder {
            color: #94a3b8;
        }

        .form-control.is-invalid, .form-textarea.is-invalid, .form-select.is-invalid {
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
            min-height: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .image-upload-area:hover {
            border-color: #06634e;
            background: #ffffff;
        }

        .image-upload-area.dragover {
            border-color: #78ac11;
            background: rgba(120, 172, 17, 0.05);
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
            height: 250px;
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
            font-size: 4rem;
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
            margin-top: 1rem;
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

        /* Sélecteur de couleurs pour les catégories */
        .color-selector {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        .color-option {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .color-option:hover {
            transform: scale(1.1);
            border-color: #06634e;
        }

        .color-option.selected {
            border-color: #06634e;
            transform: scale(1.1);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        /* Champs conditionnels pour les événements */
        .conditional-field {
            display: none;
            animation: fadeIn 0.3s ease;
        }

        .conditional-field.show {
            display: block;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .news-form-card {
                padding: 1.5rem;
            }

            .news-form-title {
                font-size: 1.75rem;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                min-width: auto;
            }

            .image-upload-area {
                padding: 1.5rem;
                min-height: 250px;
            }

            .tab-btn {
                padding: 0.5rem 1rem;
                font-size: 0.9rem;
            }

            .color-selector {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        @media (max-width: 480px) {
            .news-form-card {
                padding: 1.25rem;
            }

            .news-form-header-icon {
                width: 60px;
                height: 60px;
            }

            .news-form-header-icon i {
                font-size: 1.5rem;
            }

            .news-form-title {
                font-size: 1.5rem;
            }

            .form-section {
                padding: 1.25rem;
            }
        }
    </style>

    <div class="news-form-container">
        <div class="news-form-wrapper">
            <!-- En-tête -->
            <div class="news-form-header">
                <div class="news-form-header-icon">
                    <i class="fas fa-newspaper"></i>
                </div>
                <h1 class="news-form-title">
                    {{ isset($news) ? 'Modifier l\'Article' : 'Nouvel Article d\'Actualité' }}
                </h1>
                <p class="news-form-subtitle">
                    {{ isset($news) ? 'Modifiez les détails de votre article' : 'Créez un nouvel article d\'actualité' }}
                </p>
            </div>

            <!-- Formulaire principal -->
            <form action="{{ isset($news) ? route('admin.news.update', $news) : route('admin.news.store') }}"
                method="POST" enctype="multipart/form-data" id="newsForm" class="news-form-card">
                @csrf
                @if (isset($news))
                    @method('PUT')
                @endif

                <!-- Navigation par onglets -->
                <div class="form-tabs">
                    <button type="button" class="tab-btn active" data-tab="basic">
                        <i class="fas fa-info-circle"></i> Informations
                    </button>
                    <button type="button" class="tab-btn" data-tab="content">
                        <i class="fas fa-align-left"></i> Contenu
                    </button>
                    <button type="button" class="tab-btn" data-tab="event">
                        <i class="fas fa-calendar-alt"></i> Événement
                    </button>
                    <button type="button" class="tab-btn" data-tab="settings">
                        <i class="fas fa-cog"></i> Paramètres
                    </button>
                </div>

                <!-- Onglet 1 : Informations de base -->
                <div id="basic-tab" class="tab-content active">
                    <div class="form-section">
                        <div class="section-header">
                            <i class="fas fa-image"></i>
                            Image et Catégories
                        </div>

                        <div class="image-upload-area" id="imageUploadArea">
                            <div class="image-preview-container" id="imagePreviewContainer">
                                @if (isset($news) && $news->image)
                                    <img src="{{ asset('storage/' . $news->image) }}" alt="Image actuelle"
                                        id="currentImage">
                                @else
                                    <div class="image-placeholder" id="imagePlaceholder">
                                        <i class="fas fa-image"></i>
                                        <span>Aucune image sélectionnée</span>
                                    </div>
                                @endif
                            </div>

                            <button type="button" class="image-upload-btn"
                                onclick="document.getElementById('image').click()">
                                <i class="fas fa-camera"></i>
                                {{ isset($news) ? 'Changer l\'image' : 'Choisir une image' }}
                            </button>

                            <input type="file" class="image-input" id="image" name="image" accept="image/*"
                                {{ !isset($news) ? 'required' : '' }}>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="image_alt">
                                <i class="fas fa-search"></i>
                                Texte alternatif de l'image
                            </label>
                            <input type="text" class="form-control @error('image_alt') is-invalid @enderror"
                                id="image_alt" name="image_alt"
                                value="{{ old('image_alt', $news->image_alt ?? '') }}"
                                placeholder="Ex: Atelier de formation FREMIN">
                            <div class="form-hint">Important pour l'accessibilité et le référencement (255 caractères max)</div>
                            @error('image_alt')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-fields-grid">
                            <div class="form-group">
                                <label class="form-label" for="category">
                                    <i class="fas fa-tag"></i>
                                    Catégorie
                                    <span class="required">*</span>
                                </label>
                                <input type="text" class="form-control @error('category') is-invalid @enderror"
                                    id="category" name="category"
                                    value="{{ old('category', $news->category ?? '') }}"
                                    placeholder="Ex: Atelier" required>
                                <div class="form-hint">Catégorie de l'article (50 caractères max)</div>
                                @error('category')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="category_color">
                                    <i class="fas fa-palette"></i>
                                    Couleur de la catégorie
                                </label>
                                <input type="text" class="form-control @error('category_color') is-invalid @enderror"
                                    id="category_color" name="category_color"
                                    value="{{ old('category_color', $news->category_color ?? 'bg-primary') }}"
                                    placeholder="Ex: bg-primary">
                                <div class="form-hint">Classe Bootstrap pour la couleur (ex: bg-primary, bg-success)</div>
                                
                                <div class="color-selector">
                                    @foreach(['bg-primary', 'bg-success', 'bg-info', 'bg-warning', 'bg-danger', 'bg-secondary',
                                             'bg-dark', 'bg-light', 'bg-purple', 'bg-pink', 'bg-teal', 'bg-orange'] as $color)
                                        <div class="color-option {{ $color }} {{ ($news->category_color ?? 'bg-primary') === $color ? 'selected' : '' }}"
                                             onclick="selectColor('{{ $color }}')"></div>
                                    @endforeach
                                </div>
                                
                                @error('category_color')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-fields-grid">
                            <div class="form-group">
                                <label class="form-label" for="date">
                                    <i class="far fa-calendar"></i>
                                    Date de publication
                                    <span class="required">*</span>
                                </label>
                                <input type="date" class="form-control @error('date') is-invalid @enderror"
                                    id="date" name="date"
                                    value="{{ old('date', isset($news) ? $news->date->format('Y-m-d') : now()->format('Y-m-d')) }}"
                                    required>
                                <div class="form-hint">Date à laquelle l'article a été publié</div>
                                @error('date')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="type">
                                    <i class="fas fa-filter"></i>
                                    Type d'article
                                    <span class="required">*</span>
                                </label>
                                <input type="text" class="form-control @error('type') is-invalid @enderror"
                                    id="type" name="type"
                                    value="{{ old('type', $news->type ?? '') }}"
                                    placeholder="Ex: Formation" required>
                                <div class="form-hint">Type spécifique de l'article (50 caractères max)</div>
                                @error('type')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-fields-grid">
                            <div class="form-group">
                                <label class="form-label" for="views">
                                    <i class="far fa-eye"></i>
                                    Nombre de vues
                                </label>
                                <input type="number" class="form-control @error('views') is-invalid @enderror"
                                    id="views" name="views"
                                    value="{{ old('views', $news->views ?? 0) }}"
                                    min="0" step="1">
                                <div class="form-hint">Nombre de vues simulé pour l'article</div>
                                @error('views')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Onglet 2 : Contenu -->
                <div id="content-tab" class="tab-content">
                    <div class="form-section">
                        <div class="section-header">
                            <i class="fas fa-align-left"></i>
                            Contenu de l'article
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="title">
                                <i class="fas fa-heading"></i>
                                Titre de l'article
                                <span class="required">*</span>
                            </label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                id="title" name="title"
                                value="{{ old('title', $news->title ?? '') }}"
                                placeholder="Ex: Atelier sur la Gestion de la Chaîne d'Approvisionnement"
                                required>
                            <div class="form-hint">Titre principal de l'article (255 caractères max)</div>
                            @error('title')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="excerpt">
                                <i class="fas fa-paragraph"></i>
                                Extrait de l'article
                                <span class="required">*</span>
                            </label>
                            <textarea class="form-textarea @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt"
                                rows="4" required placeholder="Ex: Formation intensive de 3 jours pour les responsables logistique...">{{ old('excerpt', $news->excerpt ?? '') }}</textarea>
                            <div class="form-hint">Court extrait qui sera affiché (500 caractères max)</div>
                            @error('excerpt')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-fields-grid">
                            <div class="form-group">
                                <label class="form-label" for="link">
                                    <i class="fas fa-link"></i>
                                    Lien vers l'article complet
                                </label>
                                <input type="url" class="form-control @error('link') is-invalid @enderror"
                                    id="link" name="link"
                                    value="{{ old('link', $news->link ?? '') }}"
                                    placeholder="https://example.com/article-complet">
                                <div class="form-hint">URL vers l'article complet (laisser vide si non disponible)</div>
                                @error('link')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="link_text">
                                    <i class="fas fa-book-open"></i>
                                    Texte du lien
                                </label>
                                <input type="text" class="form-control @error('link_text') is-invalid @enderror"
                                    id="link_text" name="link_text"
                                    value="{{ old('link_text', $news->link_text ?? 'Lire la suite') }}"
                                    placeholder="Ex: Lire la suite">
                                <div class="form-hint">Texte affiché pour le lien (100 caractères max)</div>
                                @error('link_text')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Onglet 3 : Événement -->
                <div id="event-tab" class="tab-content">
                    <div class="form-section">
                        <div class="section-header">
                            <i class="fas fa-calendar-alt"></i>
                            Configuration de l'événement
                        </div>

                        <div class="toggle-wrapper">
                            <label class="toggle-label" for="is_event">
                                <i class="fas fa-calendar-check"></i>
                                Cet article est un événement
                            </label>
                            <label class="toggle-switch">
                                <input type="checkbox" id="is_event" name="is_event" value="1"
                                    {{ old('is_event', $news->is_event ?? false) ? 'checked' : '' }}>
                                <span class="toggle-slider"></span>
                            </label>
                        </div>
                        <div class="form-hint">Cochez cette case si cet article représente un événement à venir</div>

                        <!-- Champs conditionnels pour les événements -->
                        <div id="eventFields" class="conditional-fields {{ old('is_event', $news->is_event ?? false) ? 'show' : '' }}">
                            <div class="form-fields-grid">
                                <div class="form-group">
                                    <label class="form-label" for="event_date">
                                        <i class="fas fa-calendar-day"></i>
                                        Date de l'événement
                                    </label>
                                    <input type="date" class="form-control @error('event_date') is-invalid @enderror"
                                        id="event_date" name="event_date"
                                        value="{{ old('event_date', isset($news) && $news->event_date ? $news->event_date->format('Y-m-d') : '') }}">
                                    <div class="form-hint">Date à laquelle l'événement aura lieu</div>
                                    @error('event_date')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="event_registrations">
                                        <i class="fas fa-users"></i>
                                        Nombre d'inscrits
                                    </label>
                                    <input type="number" class="form-control @error('event_registrations') is-invalid @enderror"
                                        id="event_registrations" name="event_registrations"
                                        value="{{ old('event_registrations', $news->event_registrations ?? 0) }}"
                                        min="0" step="1">
                                    <div class="form-hint">Nombre de personnes inscrites à l'événement</div>
                                    @error('event_registrations')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-fields-grid">
                                <div class="form-group">
                                    <label class="form-label" for="event_button_text">
                                        <i class="fas fa-edit"></i>
                                        Texte du bouton d'inscription
                                    </label>
                                    <input type="text" class="form-control @error('event_button_text') is-invalid @enderror"
                                        id="event_button_text" name="event_button_text"
                                        value="{{ old('event_button_text', $news->event_button_text ?? "S'inscrire") }}"
                                        placeholder="Ex: S'inscrire">
                                    <div class="form-hint">Texte affiché sur le bouton d'inscription (50 caractères max)</div>
                                    @error('event_button_text')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="event_button_icon">
                                        <i class="fas fa-icons"></i>
                                        Icône du bouton
                                    </label>
                                    <input type="text" class="form-control @error('event_button_icon') is-invalid @enderror"
                                        id="event_button_icon" name="event_button_icon"
                                        value="{{ old('event_button_icon', $news->event_button_icon ?? 'fas fa-calendar-plus') }}"
                                        placeholder="fas fa-calendar-plus">
                                    <div class="form-hint">Classe FontAwesome pour l'icône du bouton</div>
                                    @error('event_button_icon')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Onglet 4 : Paramètres -->
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
                                value="{{ old('sort_order', $news->sort_order ?? 0) }}" required min="0" max="100">
                            <div class="form-hint">Détermine la position dans la liste (0 = premier)</div>
                            @error('sort_order')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="toggle-wrapper">
                            <label class="toggle-label" for="is_active">
                                <i class="fas fa-eye"></i>
                                Afficher cet article sur le site
                            </label>
                            <label class="toggle-switch">
                                <input type="checkbox" id="is_active" name="is_active" value="1"
                                    {{ old('is_active', $news->is_active ?? true) ? 'checked' : '' }}>
                                <span class="toggle-slider"></span>
                            </label>
                        </div>
                        <div class="form-hint">Si activé, cet article sera visible dans la section actualités</div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="form-actions">
                    <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left btn-icon"></i>
                        Retour à la liste
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-{{ isset($news) ? 'sync-alt' : 'plus' }} btn-icon"></i>
                        {{ isset($news) ? 'Mettre à jour' : 'Créer l\'article' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('newsForm');
            const imageUploadArea = document.getElementById('imageUploadArea');
            const imageInput = document.getElementById('image');
            const imagePreviewContainer = document.getElementById('imagePreviewContainer');
            const imagePlaceholder = document.getElementById('imagePlaceholder');
            const currentImage = document.getElementById('currentImage');
            
            // Éléments pour les événements
            const isEventToggle = document.getElementById('is_event');
            const eventFields = document.getElementById('eventFields');
            
            // Élément pour la couleur
            const categoryColorInput = document.getElementById('category_color');

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
                imageUploadArea.classList.add('dragover');
            }

            function unhighlight() {
                imageUploadArea.classList.remove('dragover');
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

            // Gestion du toggle événement
            if (isEventToggle) {
                const toggleWrapper = isEventToggle.closest('.toggle-wrapper');
                
                // Initialiser l'état
                updateEventFields();
                
                isEventToggle.addEventListener('change', function() {
                    updateEventFields();
                    
                    if (this.checked) {
                        toggleWrapper.style.borderColor = '#78ac11';
                        toggleWrapper.style.backgroundColor = 'rgba(120, 172, 17, 0.05)';
                    } else {
                        toggleWrapper.style.borderColor = '#e2e8f0';
                        toggleWrapper.style.backgroundColor = '#ffffff';
                    }
                });

                function updateEventFields() {
                    if (isEventToggle.checked) {
                        eventFields.classList.add('show');
                        // Marquer la date de l'événement comme requise
                        document.getElementById('event_date').required = true;
                    } else {
                        eventFields.classList.remove('show');
                        // Enlever le required de la date de l'événement
                        document.getElementById('event_date').required = false;
                    }
                }
            }

            // Sélection de couleur
            window.selectColor = function(color) {
                categoryColorInput.value = color;
                
                // Mettre à jour la sélection visuelle
                document.querySelectorAll('.color-option').forEach(option => {
                    option.classList.remove('selected');
                });
                event.target.classList.add('selected');
            };

            // Mettre à jour la sélection de couleur au clic
            document.querySelectorAll('.color-option').forEach(option => {
                option.addEventListener('click', function() {
                    const color = this.className.split(' ').find(cls => cls.startsWith('bg-'));
                    if (color) {
                        categoryColorInput.value = color;
                        
                        // Mettre à jour la sélection visuelle
                        document.querySelectorAll('.color-option').forEach(opt => {
                            opt.classList.remove('selected');
                        });
                        this.classList.add('selected');
                    }
                });
            });

            // Validation en temps réel
            const requiredFields = ['category', 'date', 'type', 'title', 'excerpt', 'sort_order'];

            requiredFields.forEach(fieldName => {
                const field = document.getElementById(fieldName);
                if (field) {
                    field.addEventListener('blur', function() {
                        validateField(this);
                    });
                }
            });

            function validateField(field) {
                const value = field.value.trim();
                const formGroup = field.closest('.form-group');
                let errorSpan = formGroup?.querySelector('.error-message');

                if (field.required && value === '') {
                    field.classList.add('is-invalid');
                    if (!errorSpan) {
                        errorSpan = document.createElement('span');
                        errorSpan.className = 'error-message';
                        errorSpan.textContent = 'Ce champ est obligatoire';
                        formGroup.appendChild(errorSpan);
                    }
                    return false;
                } else if (field.type === 'url' && value !== '' && !isValidUrl(value)) {
                    field.classList.add('is-invalid');
                    if (!errorSpan) {
                        errorSpan = document.createElement('span');
                        errorSpan.className = 'error-message';
                        errorSpan.textContent = 'Veuillez entrer une URL valide';
                        formGroup.appendChild(errorSpan);
                    }
                    return false;
                } else {
                    field.classList.remove('is-invalid');
                    if (errorSpan) {
                        errorSpan.remove();
                    }
                    return true;
                }
            }

            function isValidUrl(string) {
                try {
                    new URL(string);
                    return true;
                } catch (_) {
                    return false;
                }
            }

            // Validation du formulaire
            if (form) {
                form.addEventListener('submit', function(e) {
                    let isValid = true;

                    requiredFields.forEach(fieldName => {
                        const field = document.getElementById(fieldName);
                        if (field && !validateField(field)) {
                            isValid = false;
                        }
                    });

                    // Validation de l'image pour la création
                    if (!{{ isset($news) ? 'true' : 'false' }} && !imageInput.files[0]) {
                        isValid = false;
                        imageUploadArea.style.borderColor = '#ef4444';
                        imageUploadArea.style.backgroundColor = '#fef2f2';

                        let errorSpan = imageUploadArea.querySelector('.error-message');
                        if (!errorSpan) {
                            errorSpan = document.createElement('span');
                            errorSpan.className = 'error-message';
                            errorSpan.textContent = 'Une image est requise pour créer un nouvel article';
                            imageUploadArea.appendChild(errorSpan);
                        }
                    }

                    // Validation de la date d'événement si c'est un événement
                    if (isEventToggle && isEventToggle.checked) {
                        const eventDateField = document.getElementById('event_date');
                        if (!eventDateField.value.trim()) {
                            isValid = false;
                            eventDateField.classList.add('is-invalid');
                            let errorSpan = eventDateField.closest('.form-group').querySelector('.error-message');
                            if (!errorSpan) {
                                errorSpan = document.createElement('span');
                                errorSpan.className = 'error-message';
                                errorSpan.textContent = 'La date de l\'événement est requise';
                                eventDateField.closest('.form-group').appendChild(errorSpan);
                            }
                        }
                    }

                    // Validation de l'URL "Lire la suite"
                    const linkField = document.getElementById('link');
                    if (linkField.value.trim() !== '' && !isValidUrl(linkField.value)) {
                        isValid = false;
                        if (!linkField.classList.contains('is-invalid')) {
                            linkField.classList.add('is-invalid');
                            const errorSpan = document.createElement('span');
                            errorSpan.className = 'error-message';
                            errorSpan.textContent = 'Veuillez entrer une URL valide';
                            linkField.closest('.form-group').appendChild(errorSpan);
                        }
                    }

                    if (!isValid) {
                        e.preventDefault();
                        // Faire défiler jusqu'à la première erreur
                        const firstError = form.querySelector('.is-invalid, .image-upload-area');
                        if (firstError) {
                            firstError.scrollIntoView({
                                behavior: 'smooth',
                                block: 'center'
                            });
                            if (firstError.tagName === 'INPUT' || firstError.tagName === 'TEXTAREA') {
                                firstError.focus();
                            }
                        }
                    }
                });
            }

            // Animation sur le focus des champs
            const formControls = form.querySelectorAll('.form-control, .form-textarea, .form-select');
            formControls.forEach(control => {
                control.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'translateY(-2px)';
                });

                control.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'translateY(0)';
                });
            });

            // Formater automatiquement les nombres
            const numberFields = ['views', 'event_registrations'];
            numberFields.forEach(fieldName => {
                const field = document.getElementById(fieldName);
                if (field) {
                    field.addEventListener('blur', function() {
                        const value = parseInt(this.value);
                        if (!isNaN(value) && value >= 0) {
                            this.value = value;
                        } else {
                            this.value = 0;
                        }
                    });
                }
            });

            // Sauvegarder l'onglet actif dans localStorage
            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const tabId = this.getAttribute('data-tab');
                    localStorage.setItem('newsFormActiveTab', tabId);
                });
            });

            // Restaurer l'onglet actif
            const activeTab = localStorage.getItem('newsFormActiveTab') || 'basic';
            document.querySelector(`[data-tab="${activeTab}"]`)?.click();
        });
    </script>
@endsection