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
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.12);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 25px -5px rgba(6, 99, 78, 0.1);
            --shadow-xl: 0 20px 40px -10px rgba(6, 99, 78, 0.15);
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 24px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .gov-form-container {
            min-height: calc(100vh - 80px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            background: linear-gradient(135deg, #f9fafb 0%, #f0fdf4 100%);
            position: relative;
        }

        .gov-form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-dark), var(--secondary));
        }

        .gov-form-card {
            width: 100%;
            max-width: 800px;
            background: var(--white);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-xl);
            padding: 2.5rem;
            position: relative;
            overflow: hidden;
        }

        .gov-form-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .header-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 1.5rem;
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow-lg);
        }

        .header-icon i {
            font-size: 1.75rem;
            color: var(--white);
        }

        .form-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
        }

        .form-subtitle {
            color: var(--gray-600);
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: var(--gray-700);
            margin-bottom: 0.5rem;
        }

        .form-control {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 2px solid var(--gray-200);
            border-radius: var(--radius-md);
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-dark);
            box-shadow: 0 0 0 4px rgba(6, 99, 78, 0.1);
        }

        .input-group {
            display: flex;
            border-radius: var(--radius-md);
            overflow: hidden;
            border: 2px solid var(--gray-200);
        }

        .input-group-text {
            background: var(--gray-50);
            padding: 0.875rem 1.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-dark);
            font-size: 1.25rem;
            border-right: 1px solid var(--gray-200);
        }

        .input-group .form-control {
            border: none;
            border-radius: 0;
            box-shadow: none;
        }

        .input-group:focus-within {
            border-color: var(--primary-dark);
            box-shadow: 0 0 0 4px rgba(6, 99, 78, 0.1);
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .btn-submit {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            color: var(--white);
            border: none;
            border-radius: var(--radius-md);
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            margin-top: 2rem;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(6, 99, 78, 0.3);
            background: linear-gradient(135deg, var(--primary-light), var(--primary-dark));
        }

        .btn-cancel {
            display: block;
            text-align: center;
            margin-top: 1rem;
            color: var(--gray-500);
            font-weight: 500;
            text-decoration: none;
            transition: var(--transition);
        }

        .btn-cancel:hover {
            color: var(--primary-dark);
        }
        
        .invalid-feedback {
            display: block;
            margin-top: 0.25rem;
            font-size: 0.875em;
            color: #dc3545;
        }
        
        .is-invalid {
            border-color: #dc3545 !important;
        }
    </style>

    <div class="gov-form-container">
        <div class="gov-form-card">
            <div class="gov-form-header">
                <div class="header-icon">
                    <i class="fas fa-{{ isset($governanceCard) ? 'edit' : 'sitemap' }}"></i>
                </div>
                <h1 class="form-title">
                    {{ isset($governanceCard) ? 'Modifier la Carte Gouvernance' : 'Nouvelle Carte Gouvernance' }}
                </h1>
                <p class="form-subtitle">
                    {{ isset($governanceCard) ? 'Mettez à jour les informations de cette carte' : 'Créez une nouvelle carte pour présenter votre gouvernance' }}
                </p>
            </div>

            <form action="{{ isset($governanceCard) ? route('admin.governance-cards.update', $governanceCard) : route('admin.governance-cards.store') }}" 
                  method="POST">
                @csrf
                @if(isset($governanceCard))
                    @method('PUT')
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Titre (FR)</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                                   value="{{ old('title', $governanceCard->title ?? '') }}" 
                                   placeholder="Ex: Notre Organisation" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Titre (EN)</label>
                            <input type="text" name="title_en" class="form-control @error('title_en') is-invalid @enderror" 
                                   value="{{ old('title_en', $governanceCard->title_en ?? '') }}" 
                                   placeholder="Ex: Our Organization">
                            @error('title_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Ordre d'affichage</label>
                            <input type="number" name="sort_order" class="form-control @error('sort_order') is-invalid @enderror" 
                                   value="{{ old('sort_order', $governanceCard->sort_order ?? 0) }}" required>
                            @error('sort_order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Icone (FontAwesome)</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i id="icon-preview" class="{{ old('icon', $governanceCard->icon ?? 'fas fa-sitemap') }}"></i>
                        </span>
                        <input type="text" name="icon" id="icon-input" class="form-control @error('icon') is-invalid @enderror" 
                               value="{{ old('icon', $governanceCard->icon ?? 'fas fa-sitemap') }}" 
                               placeholder="Ex: fas fa-sitemap" required oninput="updateIconPreview(this.value)">
                    </div>
                    @error('icon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted mt-1 d-block">Utilisez des classes FontAwesome (ex: fas fa-users)</small>
                </div>

                <div class="form-group">
                    <label class="form-label">Description (FR)</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" required 
                               placeholder="Description de la structure de gouvernance...">{{ old('description', $governanceCard->description ?? '') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Description (EN)</label>
                    <textarea name="description_en" class="form-control @error('description_en') is-invalid @enderror" 
                               placeholder="Description of the governance structure...">{{ old('description_en', $governanceCard->description_en ?? '') }}</textarea>
                    @error('description_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Éléments de liste (Optionnel, un par ligne)</label>
                    <textarea name="list_items" class="form-control @error('list_items') is-invalid @enderror" rows="4" 
                              placeholder="Point 1&#10;Point 2&#10;Point 3">{{ old('list_items', $governanceCard->list_items_string ?? '') }}</textarea>
                    @error('list_items')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Contenu détaillé (FR)</label>
                    <textarea name="content" id="editor_fr" class="form-control @error('content') is-invalid @enderror">{{ old('content', $governanceCard->content ?? '') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Contenu détaillé (EN)</label>
                    <textarea name="content_en" id="editor_en" class="form-control @error('content_en') is-invalid @enderror">{{ old('content_en', $governanceCard->content_en ?? '') }}</textarea>
                    @error('content_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check form-switch mb-4">
                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                           value="1" {{ old('is_active', $governanceCard->is_active ?? true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">Afficher cette carte sur le site</label>
                </div>

                <button type="submit" class="btn-submit">
                    <i class="fas fa-save"></i>
                    {{ isset($governanceCard) ? 'Mettre à jour' : 'Enregistrer la Carte' }}
                </button>

                <a href="{{ route('admin.governance-cards.index') }}" class="btn-cancel">
                    Annuler et retourner à la liste
                </a>
            </form>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script>
        function updateIconPreview(iconClass) {
            document.getElementById('icon-preview').className = iconClass;
        }

        CKEDITOR.replace('editor_fr', {
            height: 300,
            removeButtons: 'PasteFromWord'
        });
        CKEDITOR.replace('editor_en', {
            height: 300,
            removeButtons: 'PasteFromWord'
        });
    </script>
@endsection