@extends('admin.layouts.template')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .partner-form {
            --primary-dark: #06634e;
            --primary-light: #78ac11;
            --white: #ffffff;
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .partner-form .card {
            border: none;
            margin: 2rem auto;
            max-width: 800px;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
        }

        .partner-form .card-header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            border-radius: 16px 16px 0 0;
            padding: 1.5rem 2rem;
            color: white;
        }

        .partner-form .form-label { font-weight: 600; color: var(--primary-dark); margin-bottom: 0.5rem; }

        .partner-form .form-control { border-radius: 10px; padding: 0.75rem 1rem; border: 1px solid #e0e0e0; }

        .partner-form .btn-submit {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            color: white; border: none; border-radius: 12px; padding: 0.75rem 2.5rem; font-weight: 700;
        }

        .partner-form .btn-cancel {
            background-color: #f8f9fa; color: #6c757d; border: 1px solid #e0e0e0; border-radius: 12px; padding: 0.75rem 2rem; font-weight: 600; text-decoration: none;
        }

        .partner-form .logo-preview-wrapper {
            width: 150px; height: 120px; background: #f8f9fa; border: 2px dashed #e0e0e0; border-radius: 12px;
            display: flex; align-items: center; justify-content: center; margin-bottom: 1rem; overflow: hidden;
        }

        .partner-form .logo-preview-wrapper img { max-width: 100%; max-height: 100%; object-fit: contain; }
    </style>

    <div class="partner-form container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-{{ isset($partner) ? 'edit' : 'plus-circle' }} me-2"></i>
                    {{ isset($partner) ? 'Modifier le Partenaire' : 'Ajouter un Partenaire' }}
                </h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ isset($partner) ? route('admin.partners.update', $partner) : route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($partner)) @method('PUT') @endif

                    <div class="row g-4">
                        <div class="col-md-8">
                            <label class="form-label">Nom du Partenaire</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                   value="{{ old('name', $partner->name ?? '') }}" placeholder="Ex: IVOIRE TEXTILE" required>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Ordre d'affichage</label>
                            <input type="number" name="sort_order" class="form-control @error('sort_order') is-invalid @enderror" 
                                   value="{{ old('sort_order', $partner->sort_order ?? 0) }}" required>
                            @error('sort_order') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Site Web (Optionnel)</label>
                            <input type="url" name="website" class="form-control @error('website') is-invalid @enderror" 
                                   value="{{ old('website', $partner->website ?? '') }}" placeholder="https://example.com">
                            @error('website') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Logo du Partenaire</label>
                            <div class="logo-preview-wrapper" id="logo-preview">
                                @if(isset($partner) && $partner->logo)
                                    <img src="{{ asset('storage/' . $partner->logo) }}" alt="Logo">
                                @else
                                    <div class="text-center text-muted">
                                        <i class="fas fa-cloud-upload-alt fa-2x mb-2"></i>
                                        <p class="small mb-0">Aperçu du logo</p>
                                    </div>
                                @endif
                            </div>
                            <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" 
                                   onchange="previewLogo(event)" {{ isset($partner) ? '' : 'required' }}>
                            <small class="text-muted">Recommandé : PNG transparent ou fond blanc. Max 2MB.</small>
                            @error('logo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12">
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" 
                                       {{ old('is_active', $partner->is_active ?? true) ? 'checked' : '' }}>
                                <label class="form-check-label fw-bold text-dark" for="is_active">Actif (affiché sur le site)</label>
                            </div>
                        </div>

                        <div class="col-12 mt-5 d-flex justify-content-between">
                            <a href="{{ route('admin.partners.index') }}" class="btn-cancel">
                                <i class="fas fa-arrow-left me-2"></i> Annuler
                            </a>
                            <button type="submit" class="btn-submit">
                                <i class="fas fa-save me-2"></i> {{ isset($partner) ? 'Mettre à jour' : 'Enregistrer' }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewLogo(event) {
            const preview = document.getElementById('logo-preview');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `<img src="${e.target.result}" alt="Logo preview">`;
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
