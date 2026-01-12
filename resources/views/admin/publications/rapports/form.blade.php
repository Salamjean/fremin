@extends('admin.layouts.template')
@section('content')
    <style>
        :root {
            --primary-dark: #06634e;
            --primary-light: #0a7a62;
            --secondary: #78ac11;
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

        .publication-form-container {
            min-height: calc(100vh - 80px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            background: linear-gradient(135deg, #f9fafb 0%, #f0fdf4 100%);
            position: relative;
            overflow: hidden;
        }

        .publication-form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-dark), var(--secondary));
        }

        .publication-form-wrapper {
            width: 65%;
            margin: 0 auto;
            position: relative;
        }

        /* En-tête */
        .publication-form-header {
            text-align: center;
            margin-bottom: 2.5rem;
            position: relative;
        }

        .publication-form-header-icon {
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

        .publication-form-header-icon i {
            font-size: 2rem;
            color: var(--white);
        }

        .publication-form-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, var(--primary-dark), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .publication-form-subtitle {
            color: var(--gray-600);
            font-size: 1rem;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Carte principale */
        .publication-form-card {
            background: var(--white);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-xl);
            padding: 2.5rem;
            position: relative;
            overflow: hidden;
        }

        .publication-form-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--primary-dark), var(--secondary));
            border-radius: var(--radius-xl) var(--radius-xl) 0 0;
        }

        /* Grille à deux colonnes */
        .publication-form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2.5rem;
        }

        @media (max-width: 1024px) {
            .publication-form-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }

        /* Colonnes */
        .publication-form-left,
        .publication-form-right {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        /* Sections du formulaire */
        .form-section {
            background: var(--gray-50);
            border-radius: var(--radius-lg);
            padding: 1.75rem;
            border: 1px solid var(--gray-200);
            transition: var(--transition);
        }

        .form-section:hover {
            border-color: var(--primary-dark);
            box-shadow: var(--shadow-sm);
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
            color: var(--primary-dark);
            font-size: 1.1rem;
            font-weight: 600;
        }

        .section-header i {
            color: var(--secondary);
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
            color: var(--gray-700);
            font-size: 0.95rem;
        }

        .form-label i {
            color: var(--primary-dark);
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
            color: var(--gray-500);
            margin-top: 0.5rem;
            line-height: 1.4;
        }

        .input-wrapper {
            position: relative;
        }

        .form-control,
        .form-select,
        .form-textarea {
            width: 95%;
            padding: 1rem;
            font-size: 1rem;
            border: 2px solid var(--gray-300);
            border-radius: var(--radius-md);
            background: var(--white);
            transition: var(--transition);
            color: var(--gray-700);
            line-height: 1.5;
            font-family: inherit;
        }

        .form-textarea {
            min-height: 120px;
            resize: vertical;
        }

        .form-control:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: var(--primary-dark);
            box-shadow: 0 0 0 4px rgba(6, 99, 78, 0.1);
        }

        .form-control:hover,
        .form-select:hover,
        .form-textarea:hover {
            border-color: var(--gray-400);
        }

        .form-control::placeholder,
        .form-textarea::placeholder {
            color: var(--gray-400);
        }

        .form-control.is-invalid,
        .form-select.is-invalid,
        .form-textarea.is-invalid {
            border-color: #ef4444;
            background-color: #fef2f2;
        }

        .form-control.is-invalid:focus,
        .form-select.is-invalid:focus,
        .form-textarea.is-invalid:focus {
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

        /* Zone de téléchargement de fichier */
        .file-upload-area {
            border: 2px dashed var(--gray-300);
            border-radius: var(--radius-md);
            padding: 2rem;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
            background: var(--white);
            position: relative;
            overflow: hidden;
        }

        .file-upload-area:hover {
            border-color: var(--primary-dark);
            background: var(--gray-50);
        }

        .file-upload-area.dragover {
            border-color: var(--secondary);
            background: rgba(120, 172, 17, 0.05);
        }

        .file-preview {
            margin-top: 1rem;
            padding: 1rem;
            background: var(--gray-100);
            border-radius: var(--radius-md);
            border: 1px solid var(--gray-200);
        }

        .file-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .file-icon {
            font-size: 2rem;
            color: #dc3545;
        }

        .file-details {
            flex: 1;
        }

        .file-name {
            font-weight: 600;
            color: var(--gray-700);
            margin-bottom: 0.25rem;
            word-break: break-all;
        }

        .file-meta {
            font-size: 0.85rem;
            color: var(--gray-500);
            display: flex;
            gap: 1rem;
        }

        .file-input {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            cursor: pointer;
        }

        /* Sélecteur de type */
        .type-selector {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 0.75rem;
            margin-top: 0.5rem;
        }

        .type-btn {
            padding: 1rem;
            border: 2px solid var(--gray-300);
            border-radius: var(--radius-md);
            background: var(--white);
            color: var(--gray-600);
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
        }

        .type-btn:hover {
            border-color: var(--primary-dark);
            color: var(--primary-dark);
        }

        .type-btn.active {
            border-color: var(--primary-dark);
            background: var(--primary-dark);
            color: var(--white);
        }

        .type-btn i {
            font-size: 1.25rem;
        }

        /* Toggle switches */
        .toggle-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem;
            background: var(--white);
            border-radius: var(--radius-md);
            border: 2px solid var(--gray-200);
            transition: var(--transition);
            margin-top: 1rem;
        }

        .toggle-wrapper:hover {
            border-color: var(--primary-dark);
        }

        .toggle-label {
            font-weight: 500;
            color: var(--gray-700);
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
            background: var(--gray-300);
            transition: var(--transition);
            border-radius: 34px;
        }

        .toggle-slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 4px;
            bottom: 4px;
            background: var(--white);
            transition: var(--transition);
            border-radius: 50%;
        }

        input:checked+.toggle-slider {
            background: linear-gradient(135deg, var(--secondary), var(--secondary-light));
        }

        input:checked+.toggle-slider:before {
            transform: translateX(24px);
        }

        /* Aperçu en temps réel */
        .preview-section {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 1.75rem;
            border: 2px solid var(--gray-200);
        }

        .preview-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--primary-dark);
            margin-bottom: 1rem;
            text-align: center;
        }

        .preview-card {
            border: 2px solid var(--gray-200);
            border-radius: var(--radius-md);
            overflow: hidden;
            transition: var(--transition);
        }

        .preview-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
        }

        .preview-badge {
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
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .preview-image {
            position: relative;
            height: 150px;
            overflow: hidden;
        }

        .preview-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .preview-content {
            padding: 1.5rem;
        }

        .preview-publication-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 0.75rem;
            text-align: center;
        }

        .preview-description {
            color: var(--gray-600);
            font-size: 0.85rem;
            line-height: 1.5;
            margin-bottom: 1rem;
            text-align: center;
        }

        .preview-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--gray-200);
        }

        .preview-meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--gray-500);
            font-size: 0.8rem;
        }

        .preview-meta-item i {
            color: var(--secondary);
        }

        .preview-footer {
            display: flex;
            gap: 0.5rem;
        }

        .preview-btn {
            flex: 1;
            padding: 0.5rem;
            border-radius: var(--radius-sm);
            font-size: 0.85rem;
            font-weight: 500;
            text-align: center;
            text-decoration: none;
            transition: var(--transition);
            border: none;
            cursor: default;
        }

        .preview-btn-primary {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            color: var(--white);
        }

        .preview-btn-outline {
            background: transparent;
            border: 1px solid var(--primary-dark);
            color: var(--primary-dark);
        }

        /* Boutons d'action */
        .form-actions {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid var(--gray-200);
            grid-column: 1 / -1;
        }

        .btn {
            padding: 1rem 2.5rem;
            border-radius: var(--radius-md);
            font-weight: 600;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            transition: var(--transition);
            cursor: pointer;
            border: none;
            min-width: 160px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            color: var(--white);
            box-shadow: 0 4px 15px rgba(6, 99, 78, 0.2);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(6, 99, 78, 0.3);
            background: linear-gradient(135deg, var(--primary-light), var(--primary-dark));
        }

        .btn-secondary {
            background: var(--white);
            color: var(--gray-700);
            border: 2px solid var(--gray-300);
        }

        .btn-secondary:hover {
            border-color: var(--primary-dark);
            color: var(--primary-dark);
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
            border-top: 1px solid var(--gray-200);
            color: var(--gray-500);
            font-size: 0.9rem;
            grid-column: 1 / -1;
        }

        .form-footer a {
            color: var(--primary-dark);
            text-decoration: none;
            font-weight: 500;
        }

        .form-footer a:hover {
            color: var(--secondary);
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .publication-form-card {
                padding: 1.5rem;
            }

            .publication-form-title {
                font-size: 1.75rem;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                min-width: auto;
            }

            .form-section {
                padding: 1.25rem;
            }

            .type-selector {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .publication-form-card {
                padding: 1.25rem;
            }

            .publication-form-header-icon {
                width: 60px;
                height: 60px;
            }

            .publication-form-header-icon i {
                font-size: 1.5rem;
            }

            .publication-form-title {
                font-size: 1.5rem;
            }

            .type-selector {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="publication-form-container">
        <div class="publication-form-wrapper">
            <!-- En-tête -->
            <div class="publication-form-header">
                <div class="publication-form-header-icon">
                    <i class="fas fa-file-upload"></i>
                </div>
                <h1 class="publication-form-title">
                    {{ isset($publication) ? 'Modifier la Publication' : 'Nouvelle Publication' }}
                </h1>
                <p class="publication-form-subtitle">
                    {{ isset($publication) ? 'Modifiez les détails de votre publication' : 'Ajoutez une nouvelle publication à votre bibliothèque' }}
                </p>
            </div>

            <!-- Formulaire principal -->
            <form
                action="{{ isset($publication) ? route('admin.publications.update', $publication) : route('admin.publications.store') }}"
                method="POST" enctype="multipart/form-data" id="publicationForm" class="publication-form-card">
                @csrf
                @if (isset($publication))
                    @method('PUT')
                @endif

                <div class="publication-form-grid">
                    <!-- Colonne gauche : Informations principales -->
                    <div class="publication-form-left">
                        <!-- Section 1 : Informations de base -->
                        <div class="form-section">
                            <div class="section-header">
                                <i class="fas fa-info-circle"></i>
                                Informations de base
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="title">
                                    <i class="fas fa-font"></i>
                                    Titre de la publication
                                    <span class="required">*</span>
                                </label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" value="{{ old('title', $publication->title ?? '') }}"
                                    required placeholder="Ex: Rapport Annuel d'Activités 2023">
                                <div class="form-hint">Titre complet de la publication (255 caractères max)</div>
                                @error('title')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="description">
                                    <i class="fas fa-align-left"></i>
                                    Description
                                    <span class="required">*</span>
                                </label>
                                <textarea class="form-textarea @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="4" required placeholder="Description détaillée de la publication">{{ old('description', $publication->description ?? '') }}</textarea>
                                <div class="form-hint">Description complète de la publication (500 caractères max)</div>
                                @error('description')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="type">
                                    <i class="fas fa-tag"></i>
                                    Type de publication
                                    <span class="required">*</span>
                                </label>
                                <div class="type-selector" id="typeSelector">
                                    <button type="button" class="type-btn" data-value="rapport">
                                        <i class="fas fa-file-contract"></i>
                                        <span>Rapport</span>
                                    </button>
                                    <button type="button" class="type-btn" data-value="etude">
                                        <i class="fas fa-chart-line"></i>
                                        <span>Étude</span>
                                    </button>
                                    <button type="button" class="type-btn" data-value="guide">
                                        <i class="fas fa-book"></i>
                                        <span>Guide</span>
                                    </button>
                                    <button type="button" class="type-btn" data-value="brochure">
                                        <i class="fas fa-newspaper"></i>
                                        <span>Brochure</span>
                                    </button>
                                    <button type="button" class="type-btn" data-value="autre">
                                        <i class="fas fa-file-alt"></i>
                                        <span>Autre</span>
                                    </button>
                                </div>
                                <input type="hidden" id="type" name="type"
                                    value="{{ old('type', $publication->type ?? 'rapport') }}">
                                @error('type')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Section 2 : Fichier PDF -->
                        <div class="form-section">
                            <div class="section-header">
                                <i class="fas fa-file-pdf"></i>
                                Fichier PDF
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="file">
                                    <i class="fas fa-upload"></i>
                                    Fichier PDF
                                    @if (!isset($publication))
                                        <span class="required">*</span>
                                    @endif
                                </label>
                                <div class="file-upload-area" id="fileUploadArea">
                                    @if (isset($publication) && $publication->file_path)
                                        <div class="file-preview" id="filePreview">
                                            <div class="file-info">
                                                <div class="file-icon">
                                                    <i class="fas fa-file-pdf"></i>
                                                </div>
                                                <div class="file-details">
                                                    <div class="file-name">{{ $publication->file_name }}</div>
                                                    <div class="file-meta">
                                                        <span>{{ $publication->file_size }}</span>
                                                        <span>{{ $publication->file_format }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-hint">Fichier actuel. Téléchargez un nouveau fichier pour le
                                            remplacer.</div>
                                    @else
                                        <div class="file-placeholder" id="filePlaceholder">
                                            <i class="fas fa-cloud-upload-alt fa-3x"
                                                style="color: var(--gray-400); margin-bottom: 1rem;"></i>
                                            <p style="color: var(--gray-500); margin-bottom: 0.5rem;">
                                                Cliquez pour télécharger ou glissez-déposez un fichier PDF
                                            </p>
                                            <p style="font-size: 0.9rem; color: var(--gray-400);">
                                                Taille max : 10MB • Format : PDF uniquement
                                            </p>
                                        </div>
                                    @endif
                                    <input type="file" class="file-input" id="file" name="file"
                                        accept=".pdf" {{ !isset($publication) ? 'required' : '' }}>
                                </div>
                                @error('file')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="page_count">
                                    <i class="fas fa-file-alt"></i>
                                    Nombre de pages
                                </label>
                                <input type="number" class="form-control @error('page_count') is-invalid @enderror"
                                    id="page_count" name="page_count"
                                    value="{{ old('page_count', $publication->page_count ?? '') }}" placeholder="Ex: 48"
                                    min="1">
                                <div class="form-hint">Nombre total de pages du document</div>
                                @error('page_count')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="file_size">
                                    <i class="fas fa-weight-hanging"></i>
                                    Taille du fichier
                                </label>
                                <input type="text" class="form-control @error('file_size') is-invalid @enderror"
                                    id="file_size" name="file_size"
                                    value="{{ old('file_size', $publication->file_size ?? '') }}"
                                    placeholder="Ex: 2.4 MB">
                                <div class="form-hint">Taille du fichier (ex: 2.4 MB, 1.8 MB)</div>
                                @error('file_size')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Colonne droite : Métadonnées et configuration -->
                    <div class="publication-form-right">
                        <!-- Section 3 : Métadonnées -->
                        <div class="form-section">
                            <div class="section-header">
                                <i class="fas fa-tags"></i>
                                Métadonnées
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="publication_date">
                                    <i class="far fa-calendar"></i>
                                    Date de publication
                                    <span class="required">*</span>
                                </label>
                                <input type="date" class="form-control @error('publication_date') is-invalid @enderror"
                                    id="publication_date" name="publication_date"
                                    value="{{ old('publication_date', isset($publication) ? $publication->publication_date->format('Y-m-d') : '') }}"
                                    required>
                                @error('publication_date')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="period">
                                    <i class="fas fa-calendar-alt"></i>
                                    Période couverte
                                </label>
                                <input type="text" class="form-control @error('period') is-invalid @enderror"
                                    id="period" name="period"
                                    value="{{ old('period', $publication->period ?? '') }}"
                                    placeholder="Ex: Année 2023, Q4 2023">
                                <div class="form-hint">Période couverte par le document</div>
                                @error('period')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="author">
                                    <i class="fas fa-user-edit"></i>
                                    Auteur/Éditeur
                                </label>
                                <input type="text" class="form-control @error('author') is-invalid @enderror"
                                    id="author" name="author"
                                    value="{{ old('author', $publication->author ?? '') }}"
                                    placeholder="Ex: FREMIN, Ministère de l'Industrie">
                                <div class="form-hint">Organisme ou personne ayant produit le document</div>
                                @error('author')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="language">
                                    <i class="fas fa-language"></i>
                                    Langue
                                </label>
                                <select class="form-select @error('language') is-invalid @enderror" id="language"
                                    name="language">
                                    <option value="fr"
                                        {{ old('language', $publication->language ?? 'fr') == 'fr' ? 'selected' : '' }}>
                                        Français</option>
                                    <option value="en"
                                        {{ old('language', $publication->language ?? 'fr') == 'en' ? 'selected' : '' }}>
                                        Anglais</option>
                                    <option value="es"
                                        {{ old('language', $publication->language ?? 'fr') == 'es' ? 'selected' : '' }}>
                                        Espagnol</option>
                                </select>
                                @error('language')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Section 4 : Image de couverture -->
                        <div class="form-section">
                            <div class="section-header">
                                <i class="fas fa-image"></i>
                                Image de couverture
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="thumbnail">
                                    <i class="fas fa-image"></i>
                                    Image de couverture
                                </label>
                                <div class="file-upload-area" id="thumbnailUploadArea">
                                    @if (isset($publication) && $publication->thumbnail)
                                        <div class="file-preview" id="thumbnailPreview">
                                            <div class="file-info">
                                                <div class="file-icon">
                                                    <i class="fas fa-image"></i>
                                                </div>
                                                <div class="file-details">
                                                    <div class="file-name">Image de couverture</div>
                                                    <div class="file-meta">
                                                        <span>Couverture</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-hint">
                                            <label
                                                style="display: flex; align-items: center; gap: 0.5rem; margin-top: 0.5rem;">
                                                <input type="checkbox" name="remove_thumbnail" value="1">
                                                <span style="font-size: 0.85rem;">Supprimer l'image actuelle</span>
                                            </label>
                                        </div>
                                    @else
                                        <div class="file-placeholder" id="thumbnailPlaceholder">
                                            <i class="fas fa-image fa-3x"
                                                style="color: var(--gray-400); margin-bottom: 1rem;"></i>
                                            <p style="color: var(--gray-500); margin-bottom: 0.5rem;">
                                                Cliquez pour télécharger une image de couverture
                                            </p>
                                            <p style="font-size: 0.9rem; color: var(--gray-400);">
                                                Taille max : 2MB • Formats : JPG, PNG, WEBP
                                            </p>
                                        </div>
                                    @endif
                                    <input type="file" class="file-input" id="thumbnail" name="thumbnail"
                                        accept="image/*">
                                </div>
                                @error('thumbnail')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="thumbnail_alt">
                                    <i class="fas fa-text-height"></i>
                                    Texte alternatif de l'image
                                </label>
                                <input type="text" class="form-control @error('thumbnail_alt') is-invalid @enderror"
                                    id="thumbnail_alt" name="thumbnail_alt"
                                    value="{{ old('thumbnail_alt', $publication->thumbnail_alt ?? '') }}"
                                    placeholder="Ex: Couverture du rapport annuel 2023">
                                <div class="form-hint">Description de l'image pour l'accessibilité</div>
                                @error('thumbnail_alt')
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
                                <label class="toggle-label" for="is_published">
                                    <i class="fas fa-eye"></i>
                                    Publier immédiatement
                                </label>
                                <label class="toggle-switch">
                                    <input type="checkbox" id="is_published" name="is_published" value="1"
                                        {{ old('is_published', $publication->is_published ?? false) ? 'checked' : '' }}>
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>
                            <div class="form-hint">Si activé, la publication sera visible sur le site</div>

                            <div class="toggle-wrapper">
                                <label class="toggle-label" for="is_featured">
                                    <i class="fas fa-star"></i>
                                    Mettre en vedette
                                </label>
                                <label class="toggle-switch">
                                    <input type="checkbox" id="is_featured" name="is_featured" value="1"
                                        {{ old('is_featured', $publication->is_featured ?? false) ? 'checked' : '' }}>
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>
                            <div class="form-hint">Les publications en vedette sont mises en avant</div>

                            <div class="toggle-wrapper">
                                <label class="toggle-label" for="is_active">
                                    <i class="fas fa-power-off"></i>
                                    Activer la publication
                                </label>
                                <label class="toggle-switch">
                                    <input type="checkbox" id="is_active" name="is_active" value="1"
                                        {{ old('is_active', $publication->is_active ?? true) ? 'checked' : '' }}>
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>
                            <div class="form-hint">Si désactivé, la publication ne sera pas visible même si publiée</div>
                        </div>

                        <!-- Section 6 : Aperçu en temps réel -->
                        <div class="preview-section">
                            <h3 class="preview-title">Aperçu de la publication</h3>
                            <div class="preview-card">
                                <div class="preview-image">
                                    <img src="{{ isset($publication) && $publication->thumbnail ? asset('storage/' . $publication->thumbnail) : asset('assets/img/default-publication.jpg') }}"
                                        id="previewImage" alt="Aperçu de la publication">
                                    <div class="preview-badge" id="previewBadge" style="background: #dc3545;">
                                        <i class="fas fa-file-contract"></i>
                                        <span id="previewType">Rapport</span>
                                    </div>
                                </div>
                                <div class="preview-content">
                                    <h4 class="preview-publication-title" id="previewTitle">Titre de la publication</h4>
                                    <p class="preview-description" id="previewDescription">
                                        Description de la publication...
                                    </p>
                                    <div class="preview-meta">
                                        <div class="preview-meta-item" id="previewDate">
                                            <i class="far fa-calendar"></i>
                                            <span>Date de publication</span>
                                        </div>
                                        <div class="preview-meta-item" id="previewPages">
                                            <i class="far fa-file"></i>
                                            <span>Pages</span>
                                        </div>
                                        <div class="preview-meta-item" id="previewSize">
                                            <i class="fas fa-weight-hanging"></i>
                                            <span>Taille</span>
                                        </div>
                                    </div>
                                    <div class="preview-footer">
                                        <button class="preview-btn preview-btn-primary">
                                            <i class="far fa-eye"></i> Aperçu
                                        </button>
                                        <button class="preview-btn preview-btn-outline">
                                            <i class="fas fa-download"></i> Télécharger
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="form-actions">
                        <a href="{{ route('admin.publications.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left btn-icon"></i>
                            Retour à la liste
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-{{ isset($publication) ? 'sync-alt' : 'plus' }} btn-icon"></i>
                            {{ isset($publication) ? 'Mettre à jour' : 'Créer la publication' }}
                        </button>
                    </div>

                    <div class="form-footer">
                        <p>
                            Les champs marqués d'un <span class="required">*</span> sont obligatoires.
                            <a href="{{ route('admin.publications.index') }}">Voir toutes les publications</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Éléments du formulaire
            const form = document.getElementById('publicationForm');
            const titleInput = document.getElementById('title');
            const descriptionInput = document.getElementById('description');
            const typeInput = document.getElementById('type');
            const typeButtons = document.querySelectorAll('.type-btn');
            const pageCountInput = document.getElementById('page_count');
            const fileSizeInput = document.getElementById('file_size');
            const publicationDateInput = document.getElementById('publication_date');
            const periodInput = document.getElementById('period');
            const authorInput = document.getElementById('author');
            const fileUploadArea = document.getElementById('fileUploadArea');
            const thumbnailUploadArea = document.getElementById('thumbnailUploadArea');

            // Éléments de prévisualisation
            const previewTitle = document.getElementById('previewTitle');
            const previewDescription = document.getElementById('previewDescription');
            const previewBadge = document.getElementById('previewBadge');
            const previewType = document.getElementById('previewType');
            const previewImage = document.getElementById('previewImage');
            const previewDate = document.getElementById('previewDate');
            const previewPages = document.getElementById('previewPages');
            const previewSize = document.getElementById('previewSize');

            // Types avec leurs icônes et couleurs
            const typeConfig = {
                rapport: {
                    icon: 'fa-file-contract',
                    color: '#dc3545',
                    text: 'Rapport'
                },
                etude: {
                    icon: 'fa-chart-line',
                    color: '#0d6efd',
                    text: 'Étude'
                },
                guide: {
                    icon: 'fa-book',
                    color: '#198754',
                    text: 'Guide'
                },
                brochure: {
                    icon: 'fa-newspaper',
                    color: '#6f42c1',
                    text: 'Brochure'
                },
                autre: {
                    icon: 'fa-file-alt',
                    color: '#6c757d',
                    text: 'Document'
                }
            };

            // Variables pour stocker les fichiers
            let currentFile = null;
            let currentThumbnail = null;

            // Initialisation
            initializeForm();

            function initializeForm() {
                // Initialiser le type
                const currentType = typeInput.value;
                typeButtons.forEach(btn => {
                    if (btn.dataset.value === currentType) {
                        btn.classList.add('active');
                        updatePreviewType(currentType);
                    }
                });

                // Initialiser la date à aujourd'hui si vide
                if (!publicationDateInput.value) {
                    const today = new Date().toISOString().split('T')[0];
                    publicationDateInput.value = today;
                }

                // Initialiser les valeurs de prévisualisation
                updatePreview();

                // Configurer les événements
                setupEventListeners();
            }

            function setupEventListeners() {
                // Mettre à jour la prévisualisation lors de la saisie
                [titleInput, descriptionInput, pageCountInput, fileSizeInput,
                    publicationDateInput, periodInput, authorInput
                ].forEach(input => {
                    input.addEventListener('input', updatePreview);
                });

                // Gérer le type
                typeButtons.forEach(btn => {
                    btn.addEventListener('click', function() {
                        typeButtons.forEach(b => b.classList.remove('active'));
                        this.classList.add('active');
                        typeInput.value = this.dataset.value;
                        updatePreviewType(this.dataset.value);
                        updatePreview();
                    });
                });

                // Gestion des fichiers - version simplifiée
                setupFileUploadSimple(fileUploadArea, 'file');
                setupFileUploadSimple(thumbnailUploadArea, 'thumbnail');

                // Validation de la date
                publicationDateInput.addEventListener('change', function() {
                    const selectedDate = new Date(this.value);
                    const today = new Date();

                    if (selectedDate > today) {
                        showDateWarning();
                    }
                });
            }

            // Version SIMPLIFIÉE sans remplacement d'input
            function setupFileUploadSimple(area, inputName) {
                const input = area.querySelector('input[type="file"]');
                const placeholder = area.querySelector('.file-placeholder');
                const preview = area.querySelector('.file-preview');

                // Click sur la zone
                area.addEventListener('click', function(e) {
                    // Ne déclencher que si on clique sur la zone, pas sur un élément existant
                    if (e.target === area || e.target === placeholder) {
                        input.click();
                    }
                });

                // Changement de fichier
                input.addEventListener('change', function(e) {
                    if (this.files && this.files[0]) {
                        const file = this.files[0];

                        // Validation basique
                        if (inputName === 'file' && !file.type.includes('pdf')) {
                            alert('Veuillez sélectionner un fichier PDF');
                            this.value = '';
                            return;
                        }

                        if (inputName === 'thumbnail' && !file.type.includes('image')) {
                            alert('Veuillez sélectionner une image');
                            this.value = '';
                            return;
                        }

                        // Afficher la prévisualisation
                        showFilePreview(file, area, inputName);

                        // Mettre à jour la taille du fichier pour les PDF
                        if (inputName === 'file') {
                            fileSizeInput.value = formatBytes(file.size);
                            updatePreview();
                        }

                        // Mettre à jour l'image de prévisualisation pour les thumbnails
                        if (inputName === 'thumbnail' && previewImage) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                previewImage.src = e.target.result;
                            };
                            reader.readAsDataURL(file);
                        }
                    }
                });
            }

            function showFilePreview(file, area, inputName) {
                const fileSize = formatBytes(file.size);
                const fileName = file.name.length > 30 ? file.name.substring(0, 30) + '...' : file.name;
                const isImage = inputName === 'thumbnail';

                let iconClass = isImage ? 'fas fa-image' : 'fas fa-file-pdf';
                let iconColor = isImage ? '#0d6efd' : '#dc3545';

                const html = `
            <div class="file-preview">
                <div class="file-info">
                    <div class="file-icon">
                        <i class="${iconClass}" style="color: ${iconColor}"></i>
                    </div>
                    <div class="file-details">
                        <div class="file-name">${fileName}</div>
                        <div class="file-meta">
                            <span>${fileSize}</span>
                            <span>${file.type.split('/').pop().toUpperCase()}</span>
                        </div>
                    </div>
                </div>
            </div>
        `;

                // Cacher le placeholder et montrer la prévisualisation
                const placeholder = area.querySelector('.file-placeholder');
                const existingPreview = area.querySelector('.file-preview');

                if (placeholder) placeholder.style.display = 'none';
                if (existingPreview) existingPreview.remove();

                area.insertAdjacentHTML('beforeend', html);
            }

            function updatePreview() {
                // Titre
                previewTitle.textContent = titleInput.value || 'Titre de la publication';

                // Description
                previewDescription.textContent = descriptionInput.value ?
                    (descriptionInput.value.length > 100 ?
                        descriptionInput.value.substring(0, 100) + '...' :
                        descriptionInput.value) :
                    'Description de la publication...';

                // Date
                if (publicationDateInput.value) {
                    const date = new Date(publicationDateInput.value);
                    const formattedDate = date.toLocaleDateString('fr-FR', {
                        month: 'long',
                        year: 'numeric'
                    }).replace(/^\w/, c => c.toUpperCase());

                    previewDate.innerHTML = `<i class="far fa-calendar"></i><span>${formattedDate}</span>`;
                }

                // Pages
                if (pageCountInput.value) {
                    previewPages.innerHTML =
                    `<i class="far fa-file"></i><span>${pageCountInput.value} pages</span>`;
                    previewPages.style.display = 'flex';
                } else {
                    previewPages.style.display = 'none';
                }

                // Taille
                if (fileSizeInput.value) {
                    previewSize.innerHTML =
                        `<i class="fas fa-weight-hanging"></i><span>${fileSizeInput.value}</span>`;
                    previewSize.style.display = 'flex';
                } else {
                    previewSize.style.display = 'none';
                }
            }

            function updatePreviewType(type) {
                const config = typeConfig[type] || typeConfig.rapport;
                previewBadge.style.background = config.color;
                previewBadge.innerHTML = `<i class="fas ${config.icon}"></i><span>${config.text}</span>`;
                previewType.textContent = config.text;
            }

            function formatBytes(bytes, decimals = 2) {
                if (bytes === 0) return '0 Bytes';
                const k = 1024;
                const dm = decimals < 0 ? 0 : decimals;
                const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));
                return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
            }

            function showDateWarning() {
                Swal.fire({
                    icon: 'warning',
                    title: 'Date future',
                    text: 'Vous avez sélectionné une date future. Voulez-vous continuer ?',
                    showCancelButton: true,
                    confirmButtonText: 'Continuer',
                    cancelButtonText: 'Modifier',
                    customClass: {
                        popup: 'sweet-alert-popup',
                        confirmButton: 'sweet-alert-confirm',
                        cancelButton: 'sweet-alert-cancel'
                    }
                }).then((result) => {
                    if (!result.isConfirmed) {
                        publicationDateInput.focus();
                    }
                });
            }

            // Validation du formulaire - VERSION CORRIGÉE
            if (form) {
                form.addEventListener('submit', function(e) {
                    console.log('Validation du formulaire...');

                    let isValid = true;
                    const errorMessages = [];

                    // Vérifier les champs textuels requis
                    const requiredTextFields = ['title', 'description', 'type', 'publication_date'];
                    requiredTextFields.forEach(fieldName => {
                        const field = document.getElementById(fieldName);
                        if (field && !field.value.trim()) {
                            isValid = false;
                            field.classList.add('is-invalid');
                            errorMessages.push(
                                `"${field.previousElementSibling?.textContent || fieldName}" est requis`
                                );
                        }
                    });

                    // Vérifier le fichier PDF pour les nouvelles publications
                    const isEditMode = {{ isset($publication) ? 'true' : 'false' }};
                    if (!isEditMode) {
                        const fileInput = document.getElementById('file');
                        if (!fileInput.files || fileInput.files.length === 0) {
                            isValid = false;
                            errorMessages.push('Le fichier PDF est requis');
                            // Ajouter un message d'erreur visuel
                            const fileArea = document.getElementById('fileUploadArea');
                            fileArea.style.borderColor = '#ef4444';
                            fileArea.style.background = '#fef2f2';
                        }
                    }

                    if (!isValid) {
                        e.preventDefault();

                        // Afficher toutes les erreurs
                        const errorDiv = document.createElement('div');
                        errorDiv.className = 'alert alert-danger';
                        errorDiv.innerHTML = `
                    <strong>Veuillez corriger les erreurs suivantes:</strong>
                    <ul class="mb-0">
                        ${errorMessages.map(msg => `<li>${msg}</li>`).join('')}
                    </ul>
                `;

                        // Insérer au début du formulaire
                        const firstSection = form.querySelector('.form-section');
                        if (firstSection) {
                            firstSection.parentNode.insertBefore(errorDiv, firstSection);
                        }

                        // Faire défiler vers le haut
                        window.scrollTo({
                            top: form.offsetTop - 100,
                            behavior: 'smooth'
                        });
                    }
                });
            }

            // Optionnel : Réinitialiser les styles d'erreur lors de la modification
            form.querySelectorAll('input, textarea, select').forEach(field => {
                field.addEventListener('input', function() {
                    this.classList.remove('is-invalid');
                    if (this.name === 'file') {
                        document.getElementById('fileUploadArea').style = '';
                    }
                });
            });
        });
    </script>
@endsection
