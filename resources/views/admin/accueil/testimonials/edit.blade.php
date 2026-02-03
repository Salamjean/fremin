@extends('admin.layouts.template')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .testi-form {
            --primary-dark: #06634e;
            --primary-light: #78ac11;
            --white: #ffffff;
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .testi-form .card {
            border: none;
            margin: 2rem auto;
            max-width: 900px;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
        }

        .testi-form .card-header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            border-radius: 16px 16px 0 0;
            padding: 1.5rem 2rem;
            color: white;
        }

        .testi-form .form-label {
            font-weight: 600;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
        }

        .testi-form .form-control,
        .testi-form .form-select {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            border: 1px solid #e0e0e0;
        }

        .testi-form .btn-submit {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            color: white;
            border: none;
            border-radius: 12px;
            padding: 0.75rem 2.5rem;
            font-weight: 700;
            transition: var(--transition);
        }

        .testi-form .btn-cancel {
            background-color: #f8f9fa;
            color: #6c757d;
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
        }

        .testi-form .logo-preview-wrapper {
            width: 100px;
            height: 100px;
            background: #f8f9fa;
            border: 2px dashed #e0e0e0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            overflow: hidden;
        }

        .testi-form .logo-preview-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>

    <div class="testi-form container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-quote-left me-2"></i>
                    {{ isset($testimonial) ? 'Modifier le Témoignage' : 'Nouveau Témoignage' }}</h5>
            </div>
            <div class="card-body p-4">
                <form
                    action="{{ isset($testimonial) ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf @if(isset($testimonial)) @method('PUT') @endif

                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label">Nom de l'Auteur</label>
                            <input type="text" name="author_name"
                                class="form-control @error('author_name') is-invalid @enderror"
                                value="{{ old('author_name', $testimonial->author_name ?? '') }}"
                                placeholder="Ex: M. Kouassi Yao" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Position / Titre</label>
                            <input type="text" name="author_position"
                                class="form-control @error('author_position') is-invalid @enderror"
                                value="{{ old('author_position', $testimonial->author_position ?? '') }}"
                                placeholder="Ex: Directeur Général" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Nom de l'Entreprise</label>
                            <input type="text" name="company_name"
                                class="form-control @error('company_name') is-invalid @enderror"
                                value="{{ old('company_name', $testimonial->company_name ?? '') }}"
                                placeholder="Ex: IVOIRE TEXTILE" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Secteur d'activité</label>
                            <input type="text" name="sector" class="form-control @error('sector') is-invalid @enderror"
                                value="{{ old('sector', $testimonial->sector ?? '') }}" placeholder="Ex: Textile" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Note (1-5 étoiles)</label>
                            <select name="rating" class="form-select" required>
                                @for($i = 5; $i >= 1; $i--)
                                    <option value="{{ $i }}" {{ old('rating', $testimonial->rating ?? 5) == $i ? 'selected' : '' }}>{{ $i }} Étoile{{ $i > 1 ? 's' : '' }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Ordre d'affichage</label>
                            <input type="number" name="sort_order" class="form-control"
                                value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Logo de l'entreprise (Optionnel)</label>
                            <div class="d-flex align-items-center gap-3">
                                <div class="logo-preview-wrapper" id="logo-preview">
                                    @if(isset($testimonial) && $testimonial->company_logo)
                                        <img src="{{ asset('storage/' . $testimonial->company_logo) }}" alt="Logo">
                                    @else
                                        <i class="fas fa-camera text-muted fa-lg"></i>
                                    @endif
                                </div>
                                <input type="file" name="company_logo" class="form-control form-control-sm"
                                    onchange="previewLogo(event)">
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Témoignage (Citation)</label>
                            <textarea name="quote" class="form-control @error('quote') is-invalid @enderror" rows="4"
                                placeholder="Saisissez le témoignage ici..."
                                required>{{ old('quote', $testimonial->quote ?? '') }}</textarea>
                        </div>

                        <div class="col-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ old('is_active', $testimonial->is_active ?? true) ? 'checked' : '' }}>
                                <label class="form-check-label fw-bold text-dark" for="is_active">Afficher sur le
                                    site</label>
                            </div>
                        </div>

                        <div class="col-12 mt-4 d-flex justify-content-between">
                            <a href="{{ route('admin.testimonials.index') }}" class="btn-cancel"><i
                                    class="fas fa-arrow-left me-2"></i> Annuler</a>
                            <button type="submit" class="btn-submit"><i class="fas fa-save me-2"></i>
                                {{ isset($testimonial) ? 'Mettre à jour' : 'Enregistrer' }}</button>
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
                reader.onload = function (e) { preview.innerHTML = `<img src="${e.target.result}" alt="Logo">`; }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection