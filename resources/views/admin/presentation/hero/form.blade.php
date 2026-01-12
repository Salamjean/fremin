{{-- resources/views/admin/accueil/hero/form.blade.php --}}
@extends('admin.layouts.template')
@section('content')
    <style>
        .hero-form-container {
            min-height: calc(100vh - 80px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            background: linear-gradient(135deg, #f9fafb 0%, #f0fdf4 100%);
            position: relative;
            overflow: hidden;
        }

        .hero-form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #06634e, #78ac11);
        }

        .hero-form-wrapper {
            width: 80%;
            margin: 0 auto;
            position: relative;
        }

        /* En-tête */
        .hero-form-header {
            text-align: center;
            margin-bottom: 2.5rem;
            position: relative;
        }

        .hero-form-header-icon {
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

        .hero-form-header-icon i {
            font-size: 2rem;
            color: #ffffff;
        }

        .hero-form-title {
            font-size: 2rem;
            font-weight: 700;
            color: #06634e;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #06634e, #78ac11);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-form-subtitle {
            color: #475569;
            font-size: 1rem;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Carte principale */
        .hero-form-card {
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 20px 40px -10px rgba(6, 99, 78, 0.15);
            padding: 2.5rem;
            position: relative;
            overflow: hidden;
        }

        .hero-form-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, #06634e, #78ac11);
            border-radius: 24px 24px 0 0;
        }

        /* Grille à deux colonnes */
        .hero-form-grid {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 2.5rem;
            align-items: start;
        }

        @media (max-width: 768px) {
            .hero-form-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }

        /* Colonne de gauche - Photo */
        .hero-photo-section {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .photo-upload-area {
            border: 2px dashed #cbd5e1;
            border-radius: 16px;
            padding: 2rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #f8fafc;
            position: relative;
            overflow: hidden;
            min-height: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .photo-upload-area:hover {
            border-color: #06634e;
            background: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .photo-upload-area.dragover {
            border-color: #78ac11;
            background: rgba(120, 172, 17, 0.05);
        }

        .photo-preview-container {
            width: 100%;
            height: 250px;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 1rem;
            position: relative;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .photo-preview-container:hover {
            transform: scale(1.02);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .photo-preview-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .photo-placeholder {
            width: 100%;
            height: 250px;
            background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #64748b;
        }

        .photo-placeholder i {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .photo-upload-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: linear-gradient(135deg, #06634e, #0a7a62);
            color: #ffffff;
            border: none;
            border-radius: 12px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .photo-upload-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .photo-input {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            cursor: pointer;
        }

        .photo-info {
            text-align: center;
            color: #64748b;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        /* Colonne de droite - Formulaire */
        .hero-form-section {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .form-section {
            background: #f8fafc;
            border-radius: 16px;
            padding: 1.75rem;
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
            border-radius: 12px;
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

        .form-control.is-invalid:focus, .form-textarea.is-invalid:focus {
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1);
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

        @media (max-width: 640px) {
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
            border-radius: 12px;
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
            border-radius: 12px;
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

        /* Pied de page */
        .form-footer {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e2e8f0;
            color: #64748b;
            font-size: 0.9rem;
        }

        .form-footer a {
            color: #06634e;
            text-decoration: none;
            font-weight: 500;
        }

        .form-footer a:hover {
            color: #78ac11;
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-form-card {
                padding: 1.5rem;
            }

            .hero-form-title {
                font-size: 1.75rem;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                min-width: auto;
            }

            .photo-upload-area {
                padding: 1.5rem;
                min-height: 250px;
            }
        }

        @media (max-width: 480px) {
            .hero-form-card {
                padding: 1.25rem;
            }

            .hero-form-header-icon {
                width: 60px;
                height: 60px;
            }

            .hero-form-header-icon i {
                font-size: 1.5rem;
            }

            .hero-form-title {
                font-size: 1.5rem;
            }

            .form-section {
                padding: 1.25rem;
            }
        }
    </style>

    <div class="hero-form-container">
        <div class="hero-form-wrapper">
            <!-- En-tête -->
            <div class="hero-form-header">
                <div class="hero-form-header-icon">
                    <i class="fas fa-star"></i>
                </div>
                <h1 class="hero-form-title">
                    {{ isset($hero) ? 'Modifier la Section Hero' : 'Nouvelle Section Hero' }}
                </h1>
                <p class="hero-form-subtitle">
                    {{ isset($hero) ? 'Modifiez le contenu de votre section hero' : 'Configurez la section hero de votre site' }}
                </p>
            </div>

            <!-- Formulaire principal -->
            <form action="{{ isset($hero) ? route('admin.hero.update', $hero) : route('admin.hero.store') }}"
                method="POST" enctype="multipart/form-data" id="heroForm" class="hero-form-card">
                @csrf
                @if (isset($hero))
                    @method('PUT')
                @endif

                <div class="hero-form-grid">
                    <!-- Colonne gauche : Photo -->
                    <div class="hero-photo-section">
                        <div class="photo-upload-area" id="photoUploadArea">
                            <div class="photo-preview-container" id="photoPreviewContainer">
                                @if (isset($hero) && $hero->image)
                                    <img src="{{ asset('storage/' . $hero->image) }}" alt="Photo actuelle"
                                        id="currentPhoto">
                                @else
                                    <div class="photo-placeholder" id="photoPlaceholder">
                                        <i class="fas fa-image"></i>
                                        <span>Aucune image sélectionnée</span>
                                    </div>
                                @endif
                            </div>

                            <button type="button" class="photo-upload-btn"
                                onclick="document.getElementById('photoInput').click()">
                                <i class="fas fa-camera"></i>
                                {{ isset($hero) ? 'Changer l\'image' : 'Choisir une image' }}
                            </button>

                            <input type="file" class="photo-input" id="photoInput" name="image" accept="image/*"
                                {{ !isset($hero) ? 'required' : '' }}>
                        </div>

                        <div class="photo-info">
                            <p><strong>Recommandations :</strong></p>
                            <p>• Format paysage recommandé</p>
                            <p>• Formats : JPG, PNG, WEBP</p>
                            <p>• Taille max : 5MB</p>
                            <p>• Résolution : 1200x800px minimum</p>
                        </div>
                    </div>

                    <!-- Colonne droite : Formulaire -->
                    <div class="hero-form-section">
                        <!-- Section 1 : Titre principal -->
                        <div class="form-section">
                            <div class="section-header">
                                <i class="fas fa-heading"></i>
                                Titre principal
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="main_title">
                                    <i class="fas fa-font"></i>
                                    Titre principal
                                    <span class="required">*</span>
                                </label>
                                <div class="input-wrapper">
                                    <input type="text" class="form-control @error('main_title') is-invalid @enderror"
                                        id="main_title" name="main_title"
                                        value="{{ old('main_title', $hero->main_title ?? '') }}" required
                                        placeholder="Ex: FREMIN">
                                    <span class="input-icon">
                                        <i class="fas fa-font"></i>
                                    </span>
                                </div>
                                <div class="form-hint">Titre principal de la section (100 caractères max)</div>
                                @error('main_title')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="subtitle">
                                    <i class="fas fa-subscript"></i>
                                    Sous-titre
                                </label>
                                <div class="input-wrapper">
                                    <input type="text" class="form-control @error('subtitle') is-invalid @enderror"
                                        id="subtitle" name="subtitle"
                                        value="{{ old('subtitle', $hero->subtitle ?? '') }}"
                                        placeholder="Ex: Fonds de Restructuration et de Mise à Niveau">
                                    <span class="input-icon">
                                        <i class="fas fa-subscript"></i>
                                    </span>
                                </div>
                                <div class="form-hint">Sous-titre optionnel (255 caractères max)</div>
                                @error('subtitle')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Section 2 : Description -->
                        <div class="form-section">
                            <div class="section-header">
                                <i class="fas fa-align-left"></i>
                                Description
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="description">
                                    <i class="fas fa-paragraph"></i>
                                    Description
                                    <span class="required">*</span>
                                </label>
                                <textarea class="form-textarea @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="4" required placeholder="Ex: Accompagnons la compétitivité du secteur industriel ivoirien">{{ old('description', $hero->description ?? '') }}</textarea>
                                <div class="form-hint">Description principale de la section (500 caractères max)</div>
                                @error('description')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Section 3 : Statistiques -->
                        <div class="form-section">
                            <div class="section-header">
                                <i class="fas fa-chart-bar"></i>
                                Statistiques
                            </div>

                            <div class="form-fields-grid">
                                <div class="form-group">
                                    <label class="form-label" for="stat_number">
                                        <i class="fas fa-hashtag"></i>
                                        Chiffre statistique
                                    </label>
                                    <div class="input-wrapper">
                                        <input type="text" class="form-control @error('stat_number') is-invalid @enderror"
                                            id="stat_number" name="stat_number"
                                            value="{{ old('stat_number', $hero->stat_number ?? '') }}"
                                            placeholder="Ex: 150+">
                                        <span class="input-icon">
                                            <i class="fas fa-hashtag"></i>
                                        </span>
                                    </div>
                                    <div class="form-hint">Chiffre à afficher (ex: 150+, 1000)</div>
                                    @error('stat_number')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="stat_label">
                                        <i class="fas fa-tag"></i>
                                        Libellé statistique
                                    </label>
                                    <div class="input-wrapper">
                                        <input type="text" class="form-control @error('stat_label') is-invalid @enderror"
                                            id="stat_label" name="stat_label"
                                            value="{{ old('stat_label', $hero->stat_label ?? '') }}"
                                            placeholder="Ex: Entreprises accompagnées">
                                        <span class="input-icon">
                                            <i class="fas fa-tag"></i>
                                        </span>
                                    </div>
                                    <div class="form-hint">Texte associé au chiffre (100 caractères max)</div>
                                    @error('stat_label')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Section 4 : Accessibilité -->
                        <div class="form-section">
                            <div class="section-header">
                                <i class="fas fa-universal-access"></i>
                                Accessibilité
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="image_alt">
                                    <i class="fas fa-search"></i>
                                    Texte alternatif de l'image
                                </label>
                                <div class="input-wrapper">
                                    <input type="text" class="form-control @error('image_alt') is-invalid @enderror"
                                        id="image_alt" name="image_alt"
                                        value="{{ old('image_alt', $hero->image_alt ?? '') }}"
                                        placeholder="Ex: Industrie Ivoirienne - Usine moderne">
                                    <span class="input-icon">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>
                                <div class="form-hint">Important pour l'accessibilité et le référencement (255 caractères max)</div>
                                @error('image_alt')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Section 5 : Paramètres -->
                        <div class="form-section">
                            <div class="section-header">
                                <i class="fas fa-cog"></i>
                                Paramètres
                            </div>

                            <div class="toggle-wrapper">
                                <label class="toggle-label" for="is_active">
                                    <i class="fas fa-eye"></i>
                                    Afficher cette section sur le site
                                </label>
                                <label class="toggle-switch">
                                    <input type="checkbox" id="is_active" name="is_active" value="1"
                                        {{ old('is_active', $hero->is_active ?? true) ? 'checked' : '' }}>
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>
                            <div class="form-hint">Si activé, cette section sera affichée sur la page d'accueil</div>
                        </div>

                        <!-- Actions -->
                        <div class="form-actions">
                            <a href="{{ route('admin.hero.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left btn-icon"></i>
                                Retour à la liste
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-{{ isset($hero) ? 'sync-alt' : 'plus' }} btn-icon"></i>
                                {{ isset($hero) ? 'Mettre à jour' : 'Créer la section' }}
                            </button>
                        </div>

                        <div class="form-footer">
                            <p>
                                Les champs marqués d'un <span class="required">*</span> sont obligatoires.
                                <a href="{{ route('admin.hero.index') }}">Voir toutes les sections</a>
                            </p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('heroForm');
            const photoUploadArea = document.getElementById('photoUploadArea');
            const photoInput = document.getElementById('photoInput');
            const photoPreviewContainer = document.getElementById('photoPreviewContainer');
            const photoPlaceholder = document.getElementById('photoPlaceholder');
            const currentPhoto = document.getElementById('currentPhoto');
            const isActiveToggle = document.getElementById('is_active');

            // Drag and drop pour l'image
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                photoUploadArea.addEventListener(eventName, preventDefaults, false);
            });

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            ['dragenter', 'dragover'].forEach(eventName => {
                photoUploadArea.addEventListener(eventName, highlight, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                photoUploadArea.addEventListener(eventName, unhighlight, false);
            });

            function highlight() {
                photoUploadArea.classList.add('dragover');
            }

            function unhighlight() {
                photoUploadArea.classList.remove('dragover');
            }

            photoUploadArea.addEventListener('drop', handleDrop, false);

            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                photoInput.files = files;
                handlePhotoSelect(files[0]);
            }

            // Gestion de la sélection d'image
            photoInput.addEventListener('change', function(e) {
                if (this.files && this.files[0]) {
                    handlePhotoSelect(this.files[0]);
                }
            });

            function handlePhotoSelect(file) {
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
                    img.style.height = '100%';
                    img.style.objectFit = 'cover';

                    // Mettre à jour le conteneur de prévisualisation
                    photoPreviewContainer.innerHTML = '';
                    photoPreviewContainer.appendChild(img);

                    // Cacher le placeholder s'il existe
                    if (photoPlaceholder) {
                        photoPlaceholder.style.display = 'none';
                    }

                    // Supprimer l'image actuelle si elle existe
                    if (currentPhoto) {
                        currentPhoto.style.display = 'none';
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
                errorDiv.style.borderRadius = '12px';
                errorDiv.innerHTML = `<i class="fas fa-exclamation-triangle"></i><br>${message}`;

                // Ajouter le message d'erreur
                photoPreviewContainer.innerHTML = '';
                photoPreviewContainer.appendChild(errorDiv);

                // Réafficher le placeholder après 3 secondes
                setTimeout(() => {
                    if (photoPlaceholder) {
                        photoPlaceholder.style.display = 'flex';
                        photoPreviewContainer.innerHTML = '';
                        photoPreviewContainer.appendChild(photoPlaceholder);
                    }
                }, 3000);
            }

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
            const requiredFields = ['main_title', 'description'];

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
                } else {
                    field.classList.remove('is-invalid');
                    if (errorSpan) {
                        errorSpan.remove();
                    }
                    return true;
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
                    if (!{{ isset($hero) ? 'true' : 'false' }} && !photoInput.files[0]) {
                        isValid = false;
                        photoUploadArea.style.borderColor = '#ef4444';
                        photoUploadArea.style.backgroundColor = '#fef2f2';

                        let errorSpan = photoUploadArea.querySelector('.error-message');
                        if (!errorSpan) {
                            errorSpan = document.createElement('span');
                            errorSpan.className = 'error-message';
                            errorSpan.textContent = 'Une image est requise pour créer une nouvelle section';
                            photoUploadArea.appendChild(errorSpan);
                        }
                    }

                    if (!isValid) {
                        e.preventDefault();
                        // Faire défiler jusqu'à la première erreur
                        const firstError = form.querySelector('.is-invalid, .photo-upload-area');
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
        });
    </script>
@endsection