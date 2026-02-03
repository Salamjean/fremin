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

        .partner-form-container {
            min-height: calc(100vh - 80px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            background: linear-gradient(135deg, #f9fafb 0%, #f0fdf4 100%);
            position: relative;
        }

        .partner-form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-dark), var(--secondary));
        }

        .partner-form-card {
            width: 100%;
            max-width: 800px;
            background: var(--white);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-xl);
            padding: 2.5rem;
            position: relative;
            overflow: hidden;
        }

        .partner-form-header {
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

    <div class="partner-form-container">
        <div class="partner-form-card">
            <div class="partner-form-header">
                <div class="header-icon">
                    <i class="fas fa-{{ isset($partner) ? 'edit' : 'handshake' }}"></i>
                </div>
                <h1 class="form-title">
                    {{ isset($partner) ? 'Modifier le Partenaire' : 'Ajouter un Partenaire' }}
                </h1>
                <p class="form-subtitle">
                    {{ isset($partner) ? 'Mettez à jour les informations de ce partenaire' : 'Ajoutez un nouveau partenaire à votre liste' }}
                </p>
            </div>

            <form action="{{ isset($partner) ? route('admin.partners.update', $partner) : route('admin.partners.store') }}" 
                  method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($partner))
                    @method('PUT')
                @endif

                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="form-label">Nom du Partenaire</label>
                            <input type="text" name="name" class="form-control" 
                                   value="{{ old('name', $partner->name ?? '') }}" 
                                   placeholder="Ex: IVOIRE TEXTILE" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Ordre d'affichage</label>
                            <input type="number" name="sort_order" class="form-control" 
                                   value="{{ old('sort_order', $partner->sort_order ?? 0) }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Site Web (Optionnel)</label>
                    <input type="url" name="website" class="form-control" 
                           value="{{ old('website', $partner->website ?? '') }}" 
                           placeholder="https://example.com">
                </div>

                <div class="form-group">
                    <label class="form-label">Logo du Partenaire</label>
                    <div class="logo-upload-box" onclick="document.getElementById('logoInput').click()">
                        <div id="previewContainer">
                            @if(isset($partner) && $partner->logo)
                                <img src="{{ asset('storage/' . $partner->logo) }}" class="logo-preview-img" alt="Logo actuel">
                                <p class="text-muted mb-0">Cliquez pour changer le logo</p>
                            @else
                                <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                                <p class="text-muted mb-0">Cliquez pour télécharger le logo</p>
                                <small class="text-muted d-block mt-1">PNG, JPG (Max 2MB)</small>
                            @endif
                        </div>
                        <input type="file" name="logo" id="logoInput" class="d-none" 
                               accept="image/*" onchange="previewLogo(this)" {{ isset($partner) ? '' : 'required' }}>
                    </div>
                </div>

                <div class="form-check form-switch mb-4">
                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                           value="1" {{ old('is_active', $partner->is_active ?? true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">Afficher ce partenaire sur le site</label>
                </div>

                <button type="submit" class="btn-submit">
                    <i class="fas fa-save"></i>
                    {{ isset($partner) ? 'Mettre à jour' : 'Enregistrer le Partenaire' }}
                </button>

                <a href="{{ route('admin.partners.index') }}" class="btn-cancel">
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