@extends('admin.layouts.template')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .presentation-values-form {
            --primary-dark: #06634e;
            --primary-light: #78ac11;
            --white: #ffffff;
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .presentation-values-form .card {
            border: none;
            margin: 2rem 0;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
            overflow: hidden;
        }

        .presentation-values-form .card-header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            padding: 1.5rem 2rem;
            color: white;
            border: none;
        }

        .presentation-values-form .form-label {
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
        }

        .presentation-values-form .form-control {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            border: 2px solid #e0e0e0;
            transition: var(--transition);
        }

        .presentation-values-form .form-control:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 0.25rem rgba(120, 172, 17, 0.1);
        }

        .presentation-values-form .btn-submit {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            border: none;
            border-radius: 12px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            color: white;
            transition: var(--transition);
        }

        .presentation-values-form .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(6, 99, 78, 0.3);
        }

        .presentation-values-form .btn-cancel {
            background-color: #f8f9fa;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            color: #6c757d;
            text-decoration: none;
            transition: var(--transition);
            display: inline-block;
        }

        .presentation-values-form .btn-cancel:hover {
            background-color: #e9ecef;
            color: #495057;
        }

        .presentation-values-form .icon-preview-box {
            width: 100px;
            height: 100px;
            background-color: #f8f9fa;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: var(--primary-light);
            border: 2px solid #e0e0e0;
            margin: 0 auto;
            transition: var(--transition);
        }

        .presentation-values-form .info-card {
            background-color: rgba(120, 172, 11, 0.05);
            border-left: 4px solid var(--primary-light);
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }
    </style>

    <div class="presentation-values-form container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-{{ isset($value) ? 'edit' : 'plus-circle' }} me-2"></i>
                            {{ isset($value) ? 'Modifier' : 'Ajouter' }} une Valeur
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-lg-8">
                                <form
                                    action="{{ isset($value) ? route('admin.presentation-values.update', $value->id) : route('admin.presentation-values.store') }}"
                                    method="POST">
                                    @csrf
                                    @if(isset($value))
                                        @method('PUT')
                                    @endif

                                    <div class="row g-4">
                                        <div class="col-md-9">
                                            <label class="form-label">Titre de la valeur</label>
                                            <input type="text" name="title"
                                                class="form-control @error('title') is-invalid @enderror"
                                                placeholder="ex: Intégrité, Innovation..."
                                                value="{{ old('title', $value->title ?? '') }}" required>
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-3">
                                            <label class="form-label">Ordre</label>
                                            <input type="number" name="sort_order"
                                                class="form-control @error('sort_order') is-invalid @enderror"
                                                value="{{ old('sort_order', $value->sort_order ?? 0) }}" required>
                                            @error('sort_order')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Icône FontAwesome</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i
                                                        class="fas fa-search text-muted"></i></span>
                                                <input type="text" name="icon" id="icon-input"
                                                    class="form-control @error('icon') is-invalid @enderror"
                                                    placeholder="ex: fas fa-shield-alt"
                                                    value="{{ old('icon', $value->icon ?? 'fas fa-shield-alt') }}" required>
                                            </div>
                                            <small class="text-muted mt-2 d-block">Utilisez les classes FontAwesome 5 (ex:
                                                fas fa-handshake).</small>
                                            @error('icon')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Description courte</label>
                                            <textarea name="description"
                                                class="form-control @error('description') is-invalid @enderror" rows="4"
                                                placeholder="Décrivez brièvement cette valeur..."
                                                required>{{ old('description', $value->description ?? '') }}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check form-switch bg-light p-3 rounded-3 border">
                                                <input class="form-check-input ms-0 me-3" type="checkbox" name="is_active"
                                                    id="is_active" {{ old('is_active', $value->is_active ?? true) ? 'checked' : '' }} value="1">
                                                <label class="form-check-label fw-bold" for="is_active">
                                                    Activer l'affichage sur le site
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-5 text-end border-top pt-4">
                                            <a href="{{ route('admin.presentation-values.index') }}"
                                                class="btn btn-cancel me-2">
                                                Annuler
                                            </a>
                                            <button type="submit" class="btn btn-submit">
                                                <i class="fas fa-save me-2"></i>
                                                {{ isset($value) ? 'Mettre à jour' : 'Enregistrer la valeur' }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-lg-4 border-start ps-lg-4 mt-4 mt-lg-0">
                                <div class="info-card">
                                    <h6 class="fw-bold text-dark mb-3">Aperçu de l'icône</h6>
                                    <div class="icon-preview-box" id="icon-preview-wrapper">
                                        <i id="icon-preview"
                                            class="{{ old('icon', $value->icon ?? 'fas fa-shield-alt') }}"></i>
                                    </div>
                                    <p class="text-center text-muted small mt-3">L'icône sera affichée en vert clair sur
                                        fond blanc.</p>
                                </div>

                                <div class="bg-light p-4 rounded-3">
                                    <h6 class="fw-bold text-dark mb-3"><i class="fas fa-lightbulb text-warning me-2"></i>
                                        Conseil</h6>
                                    <p class="text-muted small mb-0">Les valeurs sont des piliers de l'institution. Utilisez
                                        des descriptions fortes et inspirantes.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.getElementById('icon-input').addEventListener('input', function (e) {
                const icon = e.target.value || 'fas fa-question';
                document.getElementById('icon-preview').className = icon;
                document.getElementById('icon-preview-wrapper').style.color = '#78ac11';
            });
        </script>
    @endpush
@endsection