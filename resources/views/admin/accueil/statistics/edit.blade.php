@extends('admin.layouts.template')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .stats-form {
            --primary-dark: #06634e;
            --primary-light: #78ac11;
            --white: #ffffff;
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .stats-form .card {
            border: none;
            margin: 2rem auto;
            max-width: 800px;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
        }

        .stats-form .card-header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            border-radius: 16px 16px 0 0;
            padding: 1.5rem 2rem;
            color: white;
        }

        .stats-form .form-label {
            font-weight: 600;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
        }

        .stats-form .form-control {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            border: 1px solid #e0e0e0;
            transition: var(--transition);
        }

        .stats-form .form-control:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 0.25rem rgba(120, 172, 11, 0.1);
        }

        .stats-form .btn-submit {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            color: white;
            border: none;
            border-radius: 12px;
            padding: 0.75rem 2.5rem;
            font-weight: 700;
            transition: var(--transition);
        }

        .stats-form .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(6, 99, 78, 0.2);
            color: white;
        }

        .stats-form .btn-cancel {
            background-color: #f8f9fa;
            color: #6c757d;
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            transition: var(--transition);
            text-decoration: none;
            display: inline-block;
        }

        .stats-form .btn-cancel:hover {
            background-color: #e9ecef;
            color: #495057;
        }

        .stats-form .icon-preview {
            width: 50px;
            height: 50px;
            background: #f8f9fa;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--primary-light);
            border: 1px solid #e0e0e0;
        }
    </style>

    <div class="stats-form container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-{{ isset($statistic) ? 'edit' : 'plus-circle' }} me-2"></i>
                    {{ isset($statistic) ? 'Modifier la Statistique' : 'Nouvelle Statistique' }}
                </h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ isset($statistic) ? route('admin.statistics.update', $statistic) : route('admin.statistics.store') }}" method="POST">
                    @csrf
                    @if(isset($statistic))
                        @method('PUT')
                    @endif

                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label">Libellé (FR)</label>
                            <input type="text" name="label" class="form-control @error('label') is-invalid @enderror" 
                                   value="{{ old('label', $statistic->label ?? '') }}" placeholder="Ex: Entreprises Assistées" required>
                            @error('label')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Libellé (EN)</label>
                            <input type="text" name="label_en" class="form-control @error('label_en') is-invalid @enderror" 
                                   value="{{ old('label_en', $statistic->label_en ?? '') }}" placeholder="Ex: Assisted Companies">
                            @error('label_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Valeur</label>
                            <input type="text" name="value" class="form-control @error('value') is-invalid @enderror" 
                                   value="{{ old('value', $statistic->value ?? '') }}" placeholder="Ex: 350+ ou 98%" required>
                            @error('value')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-8">
                            <label class="form-label">Icone (FontAwesome)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white">
                                    <div id="icon-preview" class="fs-5 text-success">
                                        <i class="{{ old('icon', $statistic->icon ?? 'fas fa-chart-line') }}"></i>
                                    </div>
                                </span>
                                <input type="text" name="icon" id="icon-input" class="form-control @error('icon') is-invalid @enderror" 
                                       value="{{ old('icon', $statistic->icon ?? 'fas fa-chart-line') }}" 
                                       placeholder="Ex: fas fa-building" required onkeyup="updateIconPreview(this.value)">
                            </div>
                            <small class="text-muted">Utilisez les classes FontAwesome (ex: fas fa-history)</small>
                            @error('icon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Ordre d'affichage</label>
                            <input type="number" name="sort_order" class="form-control @error('sort_order') is-invalid @enderror" 
                                   value="{{ old('sort_order', $statistic->sort_order ?? 0) }}" required>
                            @error('sort_order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" 
                                       {{ old('is_active', $statistic->is_active ?? true) ? 'checked' : '' }}>
                                <label class="form-check-label fw-bold text-dark" for="is_active">Afficher sur le site</label>
                            </div>
                        </div>

                        <div class="col-12 mt-5 d-flex justify-content-between">
                            <a href="{{ route('admin.statistics.index') }}" class="btn-cancel">
                                <i class="fas fa-arrow-left me-2"></i> Annuler
                            </a>
                            <button type="submit" class="btn-submit">
                                <i class="fas fa-save me-2"></i> {{ isset($statistic) ? 'Mettre à jour' : 'Enregistrer' }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function updateIconPreview(value) {
            const preview = document.getElementById('icon-preview');
            preview.innerHTML = `<i class="${value}"></i>`;
        }
    </script>
@endsection
