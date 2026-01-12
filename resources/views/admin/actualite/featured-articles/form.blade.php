@extends('admin.layouts.template')
@section('content')
    <style>
        .featured-articles-form-container {
            min-height: calc(100vh - 80px);
            padding: 2rem 1rem;
            background: linear-gradient(135deg, #f9fafb 0%, #f0fdf4 100%);
            position: relative;
        }

        .featured-articles-form-wrapper {
            width: 65%;
            margin: 0 auto;
            position: relative;
        }

        /* En-tête */
        .featured-articles-form-header {
            text-align: center;
            margin-bottom: 2.5rem;
            position: relative;
        }

        .featured-articles-form-header-icon {
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

        .featured-articles-form-header-icon i {
            font-size: 2rem;
            color: #ffffff;
        }

        .featured-articles-form-title {
            font-size: 2rem;
            font-weight: 700;
            color: #06634e;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #06634e, #78ac11);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .featured-articles-form-subtitle {
            color: #475569;
            font-size: 1rem;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Formulaire principal */
        .featured-articles-form-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 25px -5px rgba(6, 99, 78, 0.1);
            padding: 2.5rem;
            position: relative;
            margin-bottom: 2rem;
        }

        .featured-articles-form-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #06634e, #78ac11);
            border-radius: 16px 16px 0 0;
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

        /* Prévisualisation du badge */
        .badge-preview {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: linear-gradient(135deg, #78ac11, #8bc31f);
            color: #ffffff;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 1rem;
        }

        /* Suggestions d'icônes */
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
            .featured-articles-form-card {
                padding: 1.5rem;
            }

            .featured-articles-form-title {
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

            .icon-suggestions {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 480px) {
            .featured-articles-form-card {
                padding: 1.25rem;
            }

            .featured-articles-form-header-icon {
                width: 60px;
                height: 60px;
            }

            .featured-articles-form-header-icon i {
                font-size: 1.5rem;
            }

            .featured-articles-form-title {
                font-size: 1.5rem;
            }

            .form-section {
                padding: 1.25rem;
            }
        }
    </style>

    <div class="featured-articles-form-container">
        <div class="featured-articles-form-wrapper">
            <!-- En-tête -->
            <div class="featured-articles-form-header">
                <div class="featured-articles-form-header-icon">
                    <i class="fas fa-newspaper"></i>
                </div>
                <h1 class="featured-articles-form-title">
                    {{ isset($featuredArticle) ? 'Modifier l\'Article' : 'Nouvel Article "À la Une"' }}
                </h1>
                <p class="featured-articles-form-subtitle">
                    {{ isset($featuredArticle) ? 'Modifiez les détails de votre article en vedette' : 'Créez un nouvel article à mettre en avant' }}
                </p>
            </div>

            <!-- Formulaire principal -->
            <form action="{{ isset($featuredArticle) ? route('admin.featured-articles.update', $featuredArticle) : route('admin.featured-articles.store') }}"
                method="POST" enctype="multipart/form-data" id="featuredArticleForm" class="featured-articles-form-card">
                @csrf
                @if (isset($featuredArticle))
                    @method('PUT')
                @endif

                <!-- Section 1 : Image et Badge -->
                <div class="form-section">
                    <div class="section-header">
                        <i class="fas fa-image"></i>
                        Image et Badge
                    </div>

                    <div class="image-upload-area" id="imageUploadArea">
                        <div class="image-preview-container" id="imagePreviewContainer">
                            @if (isset($featuredArticle) && $featuredArticle->image)
                                <img src="{{ asset('storage/' . $featuredArticle->image) }}" alt="Image actuelle"
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
                            {{ isset($featuredArticle) ? 'Changer l\'image' : 'Choisir une image' }}
                        </button>

                        <input type="file" class="image-input" id="image" name="image" accept="image/*"
                            {{ !isset($featuredArticle) ? 'required' : '' }}>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="image_alt">
                            <i class="fas fa-search"></i>
                            Texte alternatif de l'image
                        </label>
                        <input type="text" class="form-control @error('image_alt') is-invalid @enderror"
                            id="image_alt" name="image_alt"
                            value="{{ old('image_alt', $featuredArticle->image_alt ?? '') }}"
                            placeholder="Ex: Lancement du nouveau programme d'accompagnement">
                        <div class="form-hint">Important pour l'accessibilité et le référencement (255 caractères max)</div>
                        @error('image_alt')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-fields-grid">
                        <div class="form-group">
                            <label class="form-label" for="badge_text">
                                <i class="fas fa-tag"></i>
                                Texte du badge
                            </label>
                            <input type="text" class="form-control @error('badge_text') is-invalid @enderror"
                                id="badge_text" name="badge_text"
                                value="{{ old('badge_text', $featuredArticle->badge_text ?? 'À la Une') }}"
                                placeholder="Ex: À la Une">
                            <div class="form-hint">Texte affiché dans le badge (50 caractères max)</div>
                            @error('badge_text')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="badge_icon">
                                <i class="fas fa-icons"></i>
                                Icône du badge
                            </label>
                            <div class="input-wrapper">
                                <input type="text" class="form-control @error('badge_icon') is-invalid @enderror"
                                    id="badge_icon" name="badge_icon"
                                    value="{{ old('badge_icon', $featuredArticle->badge_icon ?? 'fas fa-star') }}"
                                    placeholder="fas fa-star">
                                <span class="input-icon">
                                    <i id="badgeIconPreview" class="fas fa-star"></i>
                                </span>
                            </div>
                            <div class="form-hint">Classe FontAwesome pour l'icône du badge</div>
                            @error('badge_icon')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                            
                            <div class="icon-suggestions mt-2">
                                @foreach(['fas fa-star', 'fas fa-fire', 'fas fa-bolt', 'fas fa-gem', 
                                         'fas fa-crown', 'fas fa-trophy', 'fas fa-medal', 'fas fa-award'] as $icon)
                                    <div class="icon-suggestion" onclick="setIcon('badge_icon', '{{ $icon }}')">
                                        <i class="{{ $icon }}"></i>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Prévisualisation du badge -->
                    <div id="badgePreviewContainer" style="display: none;">
                        <div class="section-header">
                            <i class="fas fa-eye"></i>
                            Prévisualisation du badge
                        </div>
                        <div id="badgePreview" class="badge-preview">
                            <i id="previewBadgeIcon"></i>
                            <span id="previewBadgeText"></span>
                        </div>
                    </div>
                </div>

                <!-- Section 2 : Informations de l'article -->
                <div class="form-section">
                    <div class="section-header">
                        <i class="fas fa-info-circle"></i>
                        Informations de l'article
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="title">
                            <i class="fas fa-heading"></i>
                            Titre de l'article
                            <span class="required">*</span>
                        </label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                            id="title" name="title"
                            value="{{ old('title', $featuredArticle->title ?? '') }}"
                            placeholder="Ex: Lancement du Programme 'Industrie 4.0' pour la Modernisation des PME Ivoiriennes"
                            required>
                        <div class="form-hint">Titre principal de l'article (255 caractères max)</div>
                        @error('title')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="excerpt">
                            <i class="fas fa-align-left"></i>
                            Extrait de l'article
                            <span class="required">*</span>
                        </label>
                        <textarea class="form-textarea @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt"
                            rows="4" required placeholder="Ex: Le FREMIN lance un nouveau programme d'accompagnement pour aider les PME industrielles...">{{ old('excerpt', $featuredArticle->excerpt ?? '') }}</textarea>
                        <div class="form-hint">Court extrait qui sera affiché (500 caractères max)</div>
                        @error('excerpt')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-fields-grid">
                        <div class="form-group">
                            <label class="form-label" for="category">
                                <i class="fas fa-folder"></i>
                                Catégorie
                            </label>
                            <input type="text" class="form-control @error('category') is-invalid @enderror"
                                id="category" name="category"
                                value="{{ old('category', $featuredArticle->category ?? '') }}"
                                placeholder="Ex: Actualité">
                            <div class="form-hint">Catégorie de l'article (50 caractères max)</div>
                            @error('category')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="publication_date">
                                <i class="far fa-calendar"></i>
                                Date de publication
                                <span class="required">*</span>
                            </label>
                            <input type="date" class="form-control @error('publication_date') is-invalid @enderror"
                                id="publication_date" name="publication_date"
                                value="{{ old('publication_date', isset($featuredArticle) ? $featuredArticle->publication_date->format('Y-m-d') : now()->format('Y-m-d')) }}"
                                required>
                            <div class="form-hint">Date à laquelle l'article a été publié</div>
                            @error('publication_date')
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
                                value="{{ old('views', $featuredArticle->views ?? 0) }}"
                                min="0" step="1">
                            <div class="form-hint">Nombre de vues simulé pour l'article</div>
                            @error('views')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="read_more_text">
                                <i class="fas fa-book-open"></i>
                                Texte "Lire la suite"
                            </label>
                            <input type="text" class="form-control @error('read_more_text') is-invalid @enderror"
                                id="read_more_text" name="read_more_text"
                                value="{{ old('read_more_text', $featuredArticle->read_more_text ?? 'Lire l\'article complet') }}"
                                placeholder="Ex: Lire l'article complet">
                            <div class="form-hint">Texte du bouton "Lire la suite" (100 caractères max)</div>
                            @error('read_more_text')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="read_more_link">
                            <i class="fas fa-link"></i>
                            Lien vers l'article complet
                        </label>
                        <input type="url" class="form-control @error('read_more_link') is-invalid @enderror"
                            id="read_more_link" name="read_more_link"
                            value="{{ old('read_more_link', $featuredArticle->read_more_link ?? '') }}"
                            placeholder="https://example.com/article-complet">
                        <div class="form-hint">URL vers l'article complet (laisser vide si non disponible)</div>
                        @error('read_more_link')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Section 3 : Paramètres -->
                <div class="form-section">
                    <div class="section-header">
                        <i class="fas fa-cog"></i>
                        Paramètres
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="sort_order">
                            <i class="fas fa-sort-numeric-down"></i>
                            Ordre d'affichage
                            <span class="required">*</span>
                        </label>
                        <input type="number" class="form-control @error('sort_order') is-invalid @enderror"
                            id="sort_order" name="sort_order"
                            value="{{ old('sort_order', $featuredArticle->sort_order ?? 0) }}" required min="0" max="100">
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
                                {{ old('is_active', $featuredArticle->is_active ?? true) ? 'checked' : '' }}>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                    <div class="form-hint">Si activé, cet article sera visible dans la section "À la Une"</div>
                </div>

                <!-- Actions -->
                <div class="form-actions">
                    <a href="{{ route('admin.featured-articles.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left btn-icon"></i>
                        Retour à la liste
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-{{ isset($featuredArticle) ? 'sync-alt' : 'plus' }} btn-icon"></i>
                        {{ isset($featuredArticle) ? 'Mettre à jour' : 'Créer l\'article' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('featuredArticleForm');
            const imageUploadArea = document.getElementById('imageUploadArea');
            const imageInput = document.getElementById('image');
            const imagePreviewContainer = document.getElementById('imagePreviewContainer');
            const imagePlaceholder = document.getElementById('imagePlaceholder');
            const currentImage = document.getElementById('currentImage');
            const isActiveToggle = document.getElementById('is_active');
            
            // Éléments du badge
            const badgeTextInput = document.getElementById('badge_text');
            const badgeIconInput = document.getElementById('badge_icon');
            const badgeIconPreview = document.getElementById('badgeIconPreview');
            const badgePreviewContainer = document.getElementById('badgePreviewContainer');
            const previewBadgeIcon = document.getElementById('previewBadgeIcon');
            const previewBadgeText = document.getElementById('previewBadgeText');

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

            // Gestion du badge
            function updateBadgePreview() {
                const badgeText = badgeTextInput.value.trim() || 'À la Une';
                const badgeIcon = badgeIconInput.value.trim() || 'fas fa-star';
                
                // Mettre à jour la prévisualisation en temps réel
                badgeIconPreview.className = badgeIcon;
                
                // Afficher/mettre à jour la prévisualisation du badge
                if (badgeText || badgeIcon !== 'fas fa-star') {
                    badgePreviewContainer.style.display = 'block';
                    previewBadgeIcon.className = badgeIcon;
                    previewBadgeText.textContent = badgeText;
                } else {
                    badgePreviewContainer.style.display = 'none';
                }
            }

            // Initialiser la prévisualisation du badge
            updateBadgePreview();

            // Écouter les changements des champs du badge
            badgeTextInput.addEventListener('input', updateBadgePreview);
            badgeIconInput.addEventListener('input', updateBadgePreview);

            // Fonction pour définir l'icône depuis les suggestions
            window.setIcon = function(fieldId, iconClass) {
                const input = document.getElementById(fieldId);
                if (input) {
                    input.value = iconClass;
                    updateBadgePreview();
                }
            };

            // Animation sur le changement de statut
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

            // Validation en temps réel
            const requiredFields = ['title', 'excerpt', 'publication_date', 'sort_order'];

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
                    if (!{{ isset($featuredArticle) ? 'true' : 'false' }} && !imageInput.files[0]) {
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

                    // Validation de l'URL "Lire la suite"
                    const readMoreLink = document.getElementById('read_more_link');
                    if (readMoreLink.value.trim() !== '' && !isValidUrl(readMoreLink.value)) {
                        isValid = false;
                        if (!readMoreLink.classList.contains('is-invalid')) {
                            readMoreLink.classList.add('is-invalid');
                            const errorSpan = document.createElement('span');
                            errorSpan.className = 'error-message';
                            errorSpan.textContent = 'Veuillez entrer une URL valide';
                            readMoreLink.closest('.form-group').appendChild(errorSpan);
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
            const formControls = form.querySelectorAll('.form-control, .form-textarea');
            formControls.forEach(control => {
                control.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'translateY(-2px)';
                });

                control.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'translateY(0)';
                });
            });

            // Formater automatiquement le nombre de vues
            const viewsInput = document.getElementById('views');
            if (viewsInput) {
                viewsInput.addEventListener('blur', function() {
                    const value = parseInt(this.value);
                    if (!isNaN(value) && value >= 0) {
                        this.value = value;
                    } else {
                        this.value = 0;
                    }
                });
            }
        });
    </script>
@endsection