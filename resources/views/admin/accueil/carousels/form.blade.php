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
        --gray-800: #1e293b;
        --shadow-sm: 0 1px 3px rgba(0,0,0,0.12);
        --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.1);
        --shadow-lg: 0 10px 25px -5px rgba(6, 99, 78, 0.1);
        --shadow-xl: 0 20px 40px -10px rgba(6, 99, 78, 0.15);
        --radius-sm: 8px;
        --radius-md: 12px;
        --radius-lg: 16px;
        --radius-xl: 24px;
        --transition: all 0.3s ease;
    }

    .form-container {
        min-height: calc(100vh - 80px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem 1rem;
        background: linear-gradient(135deg, #f9fafb 0%, #f0fdf4 100%);
        position: relative;
        overflow: hidden;
    }

    .form-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-dark), var(--secondary));
    }

    .form-wrapper {
        width: 80%;
        margin: 0 auto;
        position: relative;
    }

    /* En-tête */
    .form-header {
        text-align: center;
        margin-bottom: 3rem;
        position: relative;
    }

    .form-header-icon {
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

    .form-header-icon::after {
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

    .form-header-icon i {
        font-size: 2rem;
        color: var(--white);
    }

    .form-title {
        font-size: 2.25rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 0.5rem;
        background: linear-gradient(135deg, var(--primary-dark), var(--secondary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .form-subtitle {
        color: var(--gray-600);
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* Carte principale avec deux colonnes */
    .form-card {
        background: var(--white);
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-xl);
        padding: 2.5rem;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .form-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 6px;
        background: linear-gradient(90deg, var(--primary-dark), var(--secondary));
        border-radius: var(--radius-xl) var(--radius-xl) 0 0;
    }

    /* Disposition en deux colonnes */
    .form-columns {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        align-items: start;
    }

    @media (max-width: 1024px) {
        .form-columns {
            grid-template-columns: 1fr;
            gap: 2rem;
        }
    }

    /* Colonne de gauche - Informations de base */
    .form-column-left {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    /* Colonne de droite - Image et configuration */
    .form-column-right {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    /* Section dans chaque colonne */
    .form-section {
        background: var(--gray-50);
        border-radius: var(--radius-lg);
        padding: 2rem;
        border: 1px solid var(--gray-200);
        transition: var(--transition);
    }

    .form-section:hover {
        border-color: var(--primary-dark);
        box-shadow: var(--shadow-md);
    }

    .form-section-title {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid var(--gray-200);
        color: var(--primary-dark);
        font-size: 1.25rem;
        font-weight: 600;
    }

    .form-section-title i {
        color: var(--secondary);
        font-size: 1.5rem;
    }

    /* Éléments de formulaire */
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
        font-size: 1rem;
    }

    .form-label .required {
        color: #ef4444;
        margin-left: 4px;
        font-weight: 700;
    }

    .form-label .hint {
        display: block;
        font-size: 0.875rem;
        font-weight: 400;
        color: var(--gray-500);
        margin-top: 0.25rem;
    }

    .input-wrapper {
        position: relative;
    }

    .form-control {
        width: 95%;
        padding: 1rem 1.25rem;
        font-size: 1rem;
        border: 2px solid var(--gray-200);
        border-radius: var(--radius-md);
        background: var(--white);
        transition: var(--transition);
        color: var(--gray-800);
        line-height: 1.5;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary-dark);
        box-shadow: 0 0 0 4px rgba(6, 99, 78, 0.1);
        background: var(--white);
    }

    .form-control:hover {
        border-color: var(--gray-300);
    }

    .form-control::placeholder {
        color: var(--gray-400);
    }

    .form-control.is-invalid {
        border-color: #ef4444;
        background-color: #fef2f2;
    }

    .form-control.is-invalid:focus {
        box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1);
    }

    .input-icon {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--gray-400);
        pointer-events: none;
    }

    .form-control:focus + .input-icon {
        color: var(--primary-dark);
    }

    .form-control.is-invalid + .input-icon {
        color: #ef4444;
    }

    .error-message {
        display: block;
        margin-top: 0.5rem;
        font-size: 0.875rem;
        color: #ef4444;
        padding-left: 0.75rem;
        border-left: 3px solid #ef4444;
        animation: slideIn 0.3s ease;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-5px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Zone d'upload d'image */
    .image-upload-section {
        margin-bottom: 2rem;
    }

    .file-upload-area {
        border: 2px dashed var(--gray-300);
        border-radius: var(--radius-md);
        padding: 2.5rem 2rem;
        text-align: center;
        cursor: pointer;
        transition: var(--transition);
        background: var(--gray-50);
        position: relative;
        overflow: hidden;
    }

    .file-upload-area:hover {
        border-color: var(--primary-dark);
        background: var(--white);
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    .file-upload-area.dragover {
        border-color: var(--secondary);
        background: rgba(120, 172, 17, 0.05);
    }

    .file-upload-icon {
        font-size: 2.5rem;
        color: var(--primary-dark);
        margin-bottom: 1rem;
    }

    .file-upload-text {
        color: var(--gray-700);
        font-weight: 500;
        margin-bottom: 0.5rem;
    }

    .file-upload-hint {
        color: var(--gray-500);
        font-size: 0.9rem;
        margin-bottom: 1rem;
    }

    .file-upload-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
        color: var(--white);
        border: none;
        border-radius: var(--radius-md);
        font-weight: 500;
        cursor: pointer;
        transition: var(--transition);
    }

    .file-upload-btn:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
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

    /* Prévisualisation d'image */
    .preview-container {
        margin-top: 1.5rem;
    }

    .preview-title {
        font-size: 0.9rem;
        color: var(--gray-600);
        margin-bottom: 0.75rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .preview-title i {
        color: var(--secondary);
    }

    .image-preview {
        border-radius: var(--radius-md);
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        transition: var(--transition);
        position: relative;
        border: 1px solid var(--gray-200);
    }

    .image-preview:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-xl);
    }

    .image-preview img {
        width: 100%;
        height: auto;
        display: block;
        aspect-ratio: 16/9;
        object-fit: cover;
    }

    .image-preview-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: var(--transition);
    }

    .image-preview:hover .image-preview-overlay {
        opacity: 1;
    }

    /* Configuration */
    .config-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
    }

    @media (max-width: 768px) {
        .config-grid {
            grid-template-columns: 1fr;
        }
    }

    .config-item {
        background: var(--white);
        padding: 1.5rem;
        border-radius: var(--radius-md);
        border: 2px solid var(--gray-200);
        transition: var(--transition);
    }

    .config-item:hover {
        border-color: var(--primary-dark);
        box-shadow: var(--shadow-sm);
    }

    .config-item label {
        display: block;
        margin-bottom: 0.75rem;
        font-weight: 600;
        color: var(--gray-700);
        font-size: 0.95rem;
    }

    /* Toggle switch */
    .toggle-group {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 0.5rem;
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

    input:checked + .toggle-slider {
        background: linear-gradient(135deg, var(--secondary), var(--secondary-light));
    }

    input:checked + .toggle-slider:before {
        transform: translateX(24px);
    }

    /* Boutons d'action */
    .form-actions {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-top: 2rem;
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
        box-shadow: var(--shadow-md);
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
        transition: var(--transition);
    }

    .form-footer a:hover {
        color: var(--secondary);
        text-decoration: underline;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .form-card {
            padding: 1.5rem;
        }

        .form-section {
            padding: 1.5rem;
        }

        .form-title {
            font-size: 1.75rem;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn {
            width: 100%;
            min-width: auto;
        }

        .file-upload-area {
            padding: 2rem 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .form-card {
            padding: 1rem;
        }

        .form-header-icon {
            width: 60px;
            height: 60px;
        }

        .form-header-icon i {
            font-size: 1.5rem;
        }

        .form-title {
            font-size: 1.5rem;
        }

        .form-subtitle {
            font-size: 1rem;
        }

        .form-section {
            padding: 1rem;
        }
    }
</style>


<div class="form-container">
    <div class="form-wrapper">
        <!-- En-tête centré -->
        <div class="form-header">
            <div class="form-header-icon">
                <i class="fas fa-sliders-h"></i>
            </div>
            <h1 class="form-title">{{ isset($carousel) ? 'Modifier le Slide' : 'Nouveau Slide' }}</h1>
            <p class="form-subtitle">
                {{ isset($carousel) ? 'Modifiez les détails de votre slide existant' : 'Créez un nouveau slide attrayant pour votre carousel' }}
            </p>
        </div>

        <!-- Formulaire principal avec deux colonnes -->
        <form action="{{ isset($carousel) ? route('admin.carousels.update', $carousel) : route('admin.carousels.store') }}" 
              method="POST" 
              enctype="multipart/form-data"
              id="carouselForm"
              class="form-card">
            @csrf
            @if(isset($carousel))
                @method('PUT')
            @endif

            <div class="form-columns">
                <!-- Colonne de gauche : Informations de base -->
                <div class="form-column-left">
                    <!-- Section : Contenu texte -->
                    <div class="form-section">
                        <h3 class="form-section-title">
                            <i class="fas fa-edit"></i>
                            Contenu texte
                        </h3>

                        <div class="form-group">
                            <label class="form-label" for="title">
                                <i class="fas fa-heading"></i>
                                Titre principal
                                <span class="required">*</span>
                            </label>
                            <div class="input-wrapper">
                                <input type="text" 
                                       class="form-control @error('title') is-invalid @enderror" 
                                       id="title" 
                                       name="title" 
                                       value="{{ old('title', $carousel->title ?? '') }}" 
                                       required
                                       placeholder="Ex: Découvrez notre nouvelle collection">
                                <span class="input-icon">
                                    <i class="fas fa-heading"></i>
                                </span>
                            </div>
                            <div class="hint">Titre principal qui apparaîtra sur le slide</div>
                            @error('title')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="subtitle">
                                <i class="fas fa-text-width"></i>
                                Sous-titre
                            </label>
                            <div class="input-wrapper">
                                <input type="text" 
                                       class="form-control @error('subtitle') is-invalid @enderror" 
                                       id="subtitle" 
                                       name="subtitle" 
                                       value="{{ old('subtitle', $carousel->subtitle ?? '') }}"
                                       placeholder="Ex: Édition limitée">
                                <span class="input-icon">
                                    <i class="fas fa-text-width"></i>
                                </span>
                            </div>
                            <div class="hint">Texte secondaire optionnel</div>
                            @error('subtitle')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="description">
                                <i class="fas fa-align-left"></i>
                                Description
                                <span class="required">*</span>
                            </label>
                            <div class="input-wrapper">
                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                          id="description" 
                                          name="description" 
                                          rows="5" 
                                          required
                                          placeholder="Décrivez le contenu de votre slide...">{{ old('description', $carousel->description ?? '') }}</textarea>
                                <span class="input-icon">
                                    <i class="fas fa-align-left"></i>
                                </span>
                            </div>
                            <div class="hint">Description détaillée du contenu du slide</div>
                            @error('description')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Section : Configuration de la position -->
                    <div class="form-section">
                        <h3 class="form-section-title">
                            <i class="fas fa-object-group"></i>
                            Position et disposition
                        </h3>

                        <div class="config-grid">
                            <div class="config-item">
                                <label for="layout">
                                    <i class="fas fa-arrows-alt-h"></i>
                                    Position du texte
                                    <span class="required">*</span>
                                </label>
                                <select class="form-control @error('layout') is-invalid @enderror" 
                                        id="layout" 
                                        name="layout" 
                                        required>
                                    <option value="left" {{ old('layout', $carousel->layout ?? '') == 'left' ? 'selected' : '' }}>
                                        Texte à gauche
                                    </option>
                                    <option value="right" {{ old('layout', $carousel->layout ?? '') == 'right' ? 'selected' : '' }}>
                                        Texte à droite
                                    </option>
                                </select>
                                @error('layout')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="config-item">
                                <label for="order">
                                    <i class="fas fa-sort-numeric-down"></i>
                                    Ordre d'affichage
                                    <span class="required">*</span>
                                </label>
                                <div class="input-wrapper">
                                    <input type="number" 
                                           class="form-control @error('order') is-invalid @enderror" 
                                           id="order" 
                                           name="order" 
                                           value="{{ old('order', $carousel->order ?? 0) }}" 
                                           required 
                                           min="0"
                                           placeholder="0">
                                    <span class="input-icon">
                                        <i class="fas fa-sort-numeric-down"></i>
                                    </span>
                                </div>
                                <div class="hint">Détermine la position dans le carousel</div>
                                @error('order')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="config-item">
                                <label for="is_active">
                                    <i class="fas fa-toggle-on"></i>
                                    Statut du slide
                                </label>
                                <div class="toggle-group">
                                    <span class="toggle-label">
                                        {{ old('is_active', $carousel->is_active ?? true) ? 'Actif' : 'Inactif' }}
                                    </span>
                                    <label class="toggle-switch">
                                        <input type="checkbox" 
                                               id="is_active" 
                                               name="is_active" 
                                               value="1" 
                                               {{ old('is_active', $carousel->is_active ?? true) ? 'checked' : '' }}>
                                        <span class="toggle-slider"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Colonne de droite : Image et SEO -->
                <div class="form-column-right">
                    <!-- Section : Image du slide -->
                    <div class="form-section">
                        <h3 class="form-section-title">
                            <i class="fas fa-image"></i>
                            Image du slide
                        </h3>

                        <div class="image-upload-section">
                            <label class="form-label">
                                <i class="fas fa-upload"></i>
                                Image du slide
                                <span class="required">{{ !isset($carousel) ? '*' : '' }}</span>
                            </label>
                            <div class="hint">
                                {{ isset($carousel) ? 'Laissez vide pour conserver l\'image actuelle' : 'Format recommandé : 1920x1080px (16:9)' }}
                            </div>
                            
                            <div class="file-upload-area" id="fileUploadArea">
                                <div class="file-upload-icon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </div>
                                <div class="file-upload-text">
                                    {{ isset($carousel) ? 'Glissez-déposez pour changer l\'image' : 'Glissez-déposez votre image ici' }}
                                </div>
                                <div class="file-upload-hint">
                                    ou cliquez pour parcourir
                                </div>
                                <button type="button" class="file-upload-btn">
                                    <i class="fas fa-folder-open"></i>
                                    Choisir un fichier
                                </button>
                                <input type="file" 
                                       class="file-input @error('image') is-invalid @enderror" 
                                       id="image" 
                                       name="image" 
                                       {{ isset($carousel) ? '' : 'required' }}
                                       accept="image/*">
                            </div>
                            
                            @error('image')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Prévisualisation -->
                        <div class="preview-container">
                            @if(isset($carousel) && $carousel->image)
                                <div class="preview-title">
                                    <i class="fas fa-image"></i>
                                    Image actuelle
                                </div>
                                <div class="image-preview">
                                    <img src="{{ asset('storage/' . $carousel->image) }}" 
                                         alt="{{ $carousel->image_alt ?? 'Slide image' }}">
                                    <div class="image-preview-overlay">
                                        <button type="button" class="file-upload-btn" onclick="document.getElementById('image').click()">
                                            <i class="fas fa-sync-alt"></i>
                                            Remplacer
                                        </button>
                                    </div>
                                </div>
                            @endif

                            <div id="newImagePreview" style="display: none;">
                                <div class="preview-title">
                                    <i class="fas fa-eye"></i>
                                    Aperçu de la nouvelle image
                                </div>
                                <div class="image-preview">
                                    <img id="previewImage" src="" alt="Aperçu de la nouvelle image">
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label" for="image_alt">
                                <i class="fas fa-search"></i>
                                Texte alternatif (SEO)
                            </label>
                            <div class="input-wrapper">
                                <input type="text" 
                                       class="form-control" 
                                       id="image_alt" 
                                       name="image_alt" 
                                       value="{{ old('image_alt', $carousel->image_alt ?? '') }}"
                                       placeholder="Ex: Collection de printemps 2024">
                                <span class="input-icon">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div>
                            <div class="hint">Description de l'image pour l'accessibilité et le référencement</div>
                        </div>
                    </div>

            <!-- Boutons d'action -->
            <div class="form-actions">
                <a href="{{ route('admin.carousels.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left btn-icon"></i>
                    Retour à la liste
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-{{ isset($carousel) ? 'sync-alt' : 'plus' }} btn-icon"></i>
                    {{ isset($carousel) ? 'Mettre à jour le slide' : 'Créer le slide' }}
                </button>
            </div>

            <div class="form-footer">
                <p>
                    Les champs marqués d'un <span class="required">*</span> sont obligatoires.
                    <a href="{{ route('admin.carousels.index') }}">Voir tous les slides</a>
                </p>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('carouselForm');
    const fileUploadArea = document.getElementById('fileUploadArea');
    const fileInput = document.getElementById('image');
    const newImagePreview = document.getElementById('newImagePreview');
    const previewImage = document.getElementById('previewImage');
    const toggleSwitch = document.getElementById('is_active');
    const toggleLabel = toggleSwitch?.closest('.toggle-group')?.querySelector('.toggle-label');
    const orderInput = document.getElementById('order');
    const orderDisplay = document.querySelector('.order-display .fs-4');

    // Drag and drop pour l'image
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        fileUploadArea.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        fileUploadArea.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        fileUploadArea.addEventListener(eventName, unhighlight, false);
    });

    function highlight() {
        fileUploadArea.classList.add('dragover');
    }

    function unhighlight() {
        fileUploadArea.classList.remove('dragover');
    }

    fileUploadArea.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        fileInput.files = files;
        handleFileSelect(files[0]);
    }

    // Gestion du clic sur la zone de dépôt
    fileUploadArea.querySelector('.file-upload-btn').addEventListener('click', function(e) {
        e.preventDefault();
        fileInput.click();
    });

    // Prévisualisation de l'image
    fileInput.addEventListener('change', function(e) {
        if (this.files && this.files[0]) {
            handleFileSelect(this.files[0]);
        }
    });

    function handleFileSelect(file) {
        if (!file.type.match('image.*')) {
            alert('Veuillez sélectionner une image valide');
            return;
        }

        const reader = new FileReader();
        reader.onload = function(e) {
            previewImage.src = e.target.result;
            newImagePreview.style.display = 'block';
            
            // Mettre à jour le texte de la zone de dépôt
            const uploadText = fileUploadArea.querySelector('.file-upload-text');
            uploadText.textContent = `Fichier sélectionné : ${file.name}`;
            
            // Faire défiler jusqu'à la prévisualisation
            newImagePreview.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        };
        reader.readAsDataURL(file);
    }

    // Mise à jour du statut du toggle
    if (toggleSwitch && toggleLabel) {
        toggleSwitch.addEventListener('change', function() {
            toggleLabel.textContent = this.checked ? 'Actif' : 'Inactif';
        });
    }

    // Mise à jour de l'affichage de l'ordre
    if (orderInput && orderDisplay) {
        orderInput.addEventListener('input', function() {
            orderDisplay.textContent = this.value;
        });
    }

    // Validation en temps réel
    const titleInput = document.getElementById('title');
    const descriptionInput = document.getElementById('description');
    
    function validateField(input, minLength, errorMessage) {
        const value = input.value.trim();
        const formGroup = input.closest('.form-group');
        let errorSpan = formGroup?.querySelector('.error-message');
        
        if (value.length < minLength) {
            input.classList.add('is-invalid');
            if (!errorSpan) {
                errorSpan = document.createElement('span');
                errorSpan.className = 'error-message';
                errorSpan.textContent = errorMessage;
                formGroup.appendChild(errorSpan);
            }
            return false;
        } else {
            input.classList.remove('is-invalid');
            if (errorSpan) {
                errorSpan.remove();
            }
            return true;
        }
    }

    if (titleInput) {
        titleInput.addEventListener('input', function() {
            validateField(this, 3, 'Le titre doit contenir au moins 3 caractères');
        });
    }

    if (descriptionInput) {
        descriptionInput.addEventListener('input', function() {
            validateField(this, 10, 'La description doit contenir au moins 10 caractères');
        });
    }

    // Validation du formulaire
    if (form) {
        form.addEventListener('submit', function(e) {
            let isValid = true;
            
            if (!validateField(titleInput, 3, 'Le titre doit contenir au moins 3 caractères')) {
                isValid = false;
            }
            
            if (!validateField(descriptionInput, 10, 'La description doit contenir au moins 10 caractères')) {
                isValid = false;
            }
            
            // Validation de l'image pour la création
            if (!{{ isset($carousel) ? 'true' : 'false' }} && !fileInput.files[0]) {
                isValid = false;
                const uploadArea = document.querySelector('.file-upload-area');
                uploadArea.style.borderColor = '#ef4444';
                uploadArea.style.backgroundColor = '#fef2f2';
                
                let errorSpan = uploadArea.parentElement.querySelector('.error-message');
                if (!errorSpan) {
                    errorSpan = document.createElement('span');
                    errorSpan.className = 'error-message';
                    errorSpan.textContent = 'Une image est requise pour créer un nouveau slide';
                    uploadArea.parentElement.appendChild(errorSpan);
                }
            }
            
            if (!isValid) {
                e.preventDefault();
                // Faire défiler jusqu'à la première erreur
                const firstError = form.querySelector('.is-invalid, .file-upload-area');
                if (firstError) {
                    firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    if (firstError.tagName === 'INPUT' || firstError.tagName === 'TEXTAREA') {
                        firstError.focus();
                    }
                }
            }
        });
    }

    // Animation sur le focus des champs
    const formControls = form.querySelectorAll('.form-control');
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