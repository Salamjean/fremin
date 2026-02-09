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

        .testi-form-container {
            min-height: calc(100vh - 80px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            background: linear-gradient(135deg, #f9fafb 0%, #f0fdf4 100%);
            position: relative;
        }

        .testi-form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-dark), var(--secondary));
        }

        .testi-form-card {
            width: 100%;
            max-width: 800px;
            background: var(--white);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-xl);
            padding: 2.5rem;
            position: relative;
            overflow: hidden;
        }

        .testi-form-header {
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

        .form-control, .form-select {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 2px solid var(--gray-200);
            border-radius: var(--radius-md);
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-control:focus, .form-select:focus {
            outline: none;
            border-color: var(--primary-dark);
            box-shadow: 0 0 0 4px rgba(6, 99, 78, 0.1);
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        /* Logo Upload */
        .logo-upload-box {
            border: 2px dashed var(--gray-300);
            border-radius: var(--radius-lg);
            padding: 2rem;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
            background: var(--gray-50);
            position: relative;
        }

        .logo-upload-box:hover {
            border-color: var(--primary-dark);
            background: rgba(6, 99, 78, 0.05);
        }

        .logo-preview-img {
            max-width: 150px;
            max-height: 100px;
            object-fit: contain;
            margin-bottom: 1rem;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-sm);
            background: white;
            padding: 0.5rem;
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
    </style>

    <div class="testi-form-container">
        <div class="testi-form-card">
            <div class="testi-form-header">
                <div class="header-icon">
                    <i class="fas fa-{{ isset($testimonial) ? 'edit' : 'quote-left' }}"></i>
                </div>
                <h1 class="form-title">
                    {{ isset($testimonial) ? 'Modifier le Témoignage' : 'Nouveau Témoignage' }}
                </h1>
                <p class="form-subtitle">
                    {{ isset($testimonial) ? 'Mettez à jour les informations de cet avis client' : 'Ajoutez un nouvel avis client' }}
                </p>
            </div>

            <form action="{{ isset($testimonial) ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}" 
                  method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($testimonial))
                    @method('PUT')
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Nom de l'Entreprise</label>
                            <input type="text" name="company_name" class="form-control" 
                                   value="{{ old('company_name', $testimonial->company_name ?? '') }}" 
                                   placeholder="Ex: Entreprise X" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Secteur d'activité (FR)</label>
                            <input type="text" name="sector" class="form-control" 
                                   value="{{ old('sector', $testimonial->sector ?? '') }}" 
                                   placeholder="Ex: BTP, Agroalimentaire...">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Secteur d'activité (EN)</label>
                            <input type="text" name="sector_en" class="form-control" 
                                   value="{{ old('sector_en', $testimonial->sector_en ?? '') }}" 
                                   placeholder="Ex: Construction, Agri-food...">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Nom de l'Auteur</label>
                            <input type="text" name="author_name" class="form-control" 
                                   value="{{ old('author_name', $testimonial->author_name ?? '') }}" 
                                   placeholder="Ex: Jean Dupont" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Poste de l'Auteur (FR)</label>
                            <input type="text" name="author_position" class="form-control" 
                                   value="{{ old('author_position', $testimonial->author_position ?? '') }}" 
                                   placeholder="Ex: Directeur Général">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Poste de l'Auteur (EN)</label>
                            <input type="text" name="author_position_en" class="form-control" 
                                   value="{{ old('author_position_en', $testimonial->author_position_en ?? '') }}" 
                                   placeholder="Ex: General Manager">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Note (1 à 5)</label>
                            <select name="rating" class="form-select">
                                @for($i = 5; $i >= 1; $i--)
                                    <option value="{{ $i }}" {{ (old('rating', $testimonial->rating ?? 5) == $i) ? 'selected' : '' }}>
                                        {{ $i }} étoiles @if($i==5) (Excellent) @endif
                                    </option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Ordre d'affichage</label>
                            <input type="number" name="sort_order" class="form-control" 
                                   value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Témoignage / Citation (FR)</label>
                    <textarea name="quote" class="form-control" required 
                              placeholder="Écrivez le témoignage ici...">{{ old('quote', $testimonial->quote ?? '') }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Témoignage / Citation (EN)</label>
                    <textarea name="quote_en" class="form-control" 
                              placeholder="Write the testimonial here...">{{ old('quote_en', $testimonial->quote_en ?? '') }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Logo de l'Entreprise</label>
                    <div class="logo-upload-box" onclick="document.getElementById('logoInput').click()">
                        <div id="previewContainer">
                            @if(isset($testimonial) && $testimonial->company_logo)
                                <img src="{{ asset('storage/' . $testimonial->company_logo) }}" class="logo-preview-img" alt="Logo actuel">
                                <p class="text-muted mb-0">Cliquez pour changer le logo</p>
                            @else
                                <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                                <p class="text-muted mb-0">Cliquez pour télécharger le logo</p>
                                <small class="text-muted d-block mt-1">PNG, JPG (Max 2MB)</small>
                            @endif
                        </div>
                        <input type="file" name="company_logo" id="logoInput" class="d-none" 
                               accept="image/*" onchange="previewLogo(this)">
                    </div>
                </div>

                <div class="form-check form-switch mb-4">
                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                           value="1" {{ old('is_active', $testimonial->is_active ?? true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">Afficher ce témoignage sur le site</label>
                </div>

                <button type="submit" class="btn-submit">
                    <i class="fas fa-save"></i>
                    {{ isset($testimonial) ? 'Mettre à jour' : 'Enregistrer le Témoignage' }}
                </button>

                <a href="{{ route('admin.testimonials.index') }}" class="btn-cancel">
                    Annuler et retourner à la liste
                </a>
            </form>
        </div>
    </div>

    <script>
        function previewLogo(input) {
            const container = document.getElementById('previewContainer');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    container.innerHTML = `
                        <img src="${e.target.result}" class="logo-preview-img" alt="Aperçu">
                        <p class="text-muted mb-0">Logo sélectionné</p>
                    `;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection