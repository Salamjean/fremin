@extends('admin.layouts.template')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .financed-form {
            --primary-dark: #06634e;
            --primary-light: #78ac11;
            --white: #ffffff;
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .financed-form .card {
            border: none;
            margin: 2rem auto;
            max-width: 900px;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
        }

        .financed-form .card-header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            border-radius: 16px 16px 0 0;
            padding: 1.5rem 2rem;
            color: white;
        }

        .financed-form .form-label { font-weight: 600; color: var(--primary-dark); margin-bottom: 0.5rem; }

        .financed-form .form-control { border-radius: 10px; padding: 0.75rem 1rem; border: 1px solid #e0e0e0; }

        .financed-form .btn-submit {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            color: white; border: none; border-radius: 12px; padding: 0.75rem 2.5rem; font-weight: 700;
        }

        .financed-form .btn-cancel {
            background-color: #f8f9fa; color: #6c757d; border: 1px solid #e0e0e0; border-radius: 12px; padding: 0.75rem 2rem; font-weight: 600; text-decoration: none;
        }

        .financed-form .img-preview-wrapper {
            width: 100%; height: 200px; background: #f8f9fa; border: 2px dashed #e0e0e0; border-radius: 12px;
            display: flex; align-items: center; justify-content: center; margin-bottom: 1rem; overflow: hidden;
            position: relative;
        }

        .financed-form .img-preview-wrapper img { max-width: 100%; max-height: 100%; object-fit: cover; }
        
        .financed-form .img-preview-label {
            position: absolute; top: 10px; left: 10px; background: var(--primary-dark); color: white;
            padding: 2px 10px; border-radius: 20px; font-size: 10px; font-weight: bold;
        }
    </style>

    <div class="financed-form container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-{{ isset($company) ? 'edit' : 'plus-circle' }} me-2"></i>
                    {{ isset($company) ? 'Modifier l\'Entreprise' : 'Ajouter une Entreprise' }}
                </h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ isset($company) ? route('admin.financed-companies.update', $company) : route('admin.financed-companies.store') }}" 
                      method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($company)) @method('PUT') @endif

                    <div class="row g-4">
                        <div class="col-md-8">
                            <label class="form-label">Nom de l'Entreprise</label>
                            <input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror" 
                                   value="{{ old('company_name', $company->company_name ?? '') }}" placeholder="Ex: COOP-CA" required>
                            @error('company_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Ordre d'affichage</label>
                            <input type="number" name="sort_order" class="form-control @error('sort_order') is-invalid @enderror" 
                                   value="{{ old('sort_order', $company->sort_order ?? 0) }}" required>
                            @error('sort_order') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Secteur d'Activité</label>
                            <input type="text" name="industry" class="form-control @error('industry') is-invalid @enderror" 
                                   value="{{ old('industry', $company->industry ?? '') }}" placeholder="Ex: Agro-industrie">
                            @error('industry') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Description de l'Impact</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3"
                                      placeholder="Comment le financement a aidé cette entreprise...">{{ old('description', $company->description ?? '') }}</textarea>
                            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 text-center">
                            <label class="form-label d-block">Situation AVANT</label>
                            <div class="img-preview-wrapper" id="preview-before-container">
                                <span class="img-preview-label">AVANT</span>
                                @if(isset($company) && $company->image_before)
                                    <img src="{{ asset('storage/' . $company->image_before) }}" id="preview-before" alt="Avant">
                                @else
                                    <div class="text-center text-muted" id="placeholder-before">
                                        <i class="fas fa-history fa-2x mb-2"></i>
                                        <p class="small mb-0">Pas d'image</p>
                                    </div>
                                    <img src="" id="preview-before" style="display:none">
                                @endif
                            </div>
                            <input type="file" name="image_before" class="form-control" onchange="previewImage(event, 'before')" accept="image/*">
                        </div>

                        <div class="col-md-6 text-center">
                            <label class="form-label d-block">Situation APRÈS</label>
                            <div class="img-preview-wrapper" id="preview-after-container">
                                <span class="img-preview-label">APRÈS</span>
                                @if(isset($company) && $company->image_after)
                                    <img src="{{ asset('storage/' . $company->image_after) }}" id="preview-after" alt="Après">
                                @else
                                    <div class="text-center text-muted" id="placeholder-after">
                                        <i class="fas fa-rocket fa-2x mb-2"></i>
                                        <p class="small mb-0">Pas d'image</p>
                                    </div>
                                    <img src="" id="preview-after" style="display:none">
                                @endif
                            </div>
                            <input type="file" name="image_after" class="form-control" onchange="previewImage(event, 'after')" accept="image/*">
                        </div>

                        <div class="col-12">
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" 
                                       {{ old('is_active', $company->is_active ?? true) ? 'checked' : '' }}>
                                <label class="form-check-label fw-bold text-dark" for="is_active">Afficher sur le site</label>
                            </div>
                        </div>

                        <div class="col-12 mt-5 d-flex justify-content-between">
                            <a href="{{ route('admin.financed-companies.index') }}" class="btn-cancel">
                                <i class="fas fa-arrow-left me-2"></i> Annuler
                            </a>
                            <button type="submit" class="btn-submit">
                                <i class="fas fa-save me-2"></i> {{ isset($company) ? 'Mettre à jour' : 'Enregistrer' }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event, type) {
            const file = event.target.files[0];
            const preview = document.getElementById(`preview-${type}`);
            const placeholder = document.getElementById(`placeholder-${type}`);
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    if(placeholder) placeholder.style.display = 'none';
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
