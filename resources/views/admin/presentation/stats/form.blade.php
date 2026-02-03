@extends('admin.layouts.template')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .presentation-stats-form {
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
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .presentation-stats-form .card {
            border: none;
            margin: 2rem 0;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .presentation-stats-form .card-header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            padding: 1.5rem 2rem;
            color: white;
            border: none;
            text-align: center;
        }

        .presentation-stats-form .form-label {
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
        }

        .presentation-stats-form .form-control {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            border: 2px solid #e0e0e0;
            transition: var(--transition);
        }

        .presentation-stats-form .form-control:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 0.25rem rgba(120, 172, 17, 0.1);
        }

        .presentation-stats-form .btn-submit {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            border: none;
            border-radius: 12px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            color: white;
            transition: var(--transition);
            width: 100%;
        }

        .presentation-stats-form .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(6, 99, 78, 0.3);
            background: linear-gradient(135deg, var(--primary-light), var(--primary-dark));
        }

        .presentation-stats-form .btn-cancel {
            background-color: #f8f9fa;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            color: #6c757d;
            text-decoration: none;
            transition: var(--transition);
            display: block;
            text-align: center;
            width: 100%;
            margin-top: 1rem;
        }

        .presentation-stats-form .btn-cancel:hover {
            color: var(--primary-dark);
        }

        .presentation-stats-form .info-card {
            background-color: rgba(120, 172, 17, 0.05);
            border-left: 4px solid var(--secondary);
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }
    </style>

    <div class="presentation-stats-form container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-{{ isset($stat) ? 'edit' : 'chart-bar' }} fa-3x mb-3"></i>
                        <h2 class="mb-0 fw-bold">
                            {{ isset($stat) ? 'Modifier la Statistique' : 'Ajouter une Statistique' }}
                        </h2>
                    </div>
                    <div class="card-body p-4">
                        <div class="info-card">
                            <h6 class="fw-bold text-dark mb-2"><i class="fas fa-info-circle me-2"></i> Information</h6>
                            <p class="text-muted small mb-0">Les statistiques apparaissent dans la barre animée de la page
                                Présentation. Restez concis pour un meilleur affichage.</p>
                        </div>

                        <form
                            action="{{ isset($stat) ? route('admin.presentation-stats.update', $stat) : route('admin.presentation-stats.store') }}"
                            method="POST">
                            @csrf
                            @if(isset($stat))
                                @method('PUT')
                            @endif

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label">Valeur du Chiffre</label>
                                    <input type="text" name="value"
                                        class="form-control @error('value') is-invalid @enderror"
                                        placeholder="ex: 25, 350+, 98%..." value="{{ old('value', $stat->value ?? '') }}"
                                        required>
                                    @error('value')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Ordre d'affichage</label>
                                    <input type="number" name="sort_order"
                                        class="form-control @error('sort_order') is-invalid @enderror"
                                        value="{{ old('sort_order', $stat->sort_order ?? 0) }}" required>
                                    @error('sort_order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Libellé</label>
                                    <input type="text" name="label"
                                        class="form-control @error('label') is-invalid @enderror"
                                        placeholder="ex: Années d'Expérience, Entreprises Assistées..."
                                        value="{{ old('label', $stat->label ?? '') }}" required>
                                    @error('label')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <div class="form-check form-switch p-3 rounded-3 border bg-light">
                                        <input class="form-check-input ms-0 me-3" type="checkbox" name="is_active"
                                            id="is_active" value="1" {{ old('is_active', $stat->is_active ?? true) ? 'checked' : '' }}>
                                        <label class="form-check-label fw-bold" for="is_active">
                                            Afficher cette statistique
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn-submit">
                                        <i class="fas fa-save me-2"></i>
                                        {{ isset($stat) ? 'Mettre à jour' : 'Enregistrer' }}
                                    </button>
                                    <a href="{{ route('admin.presentation-stats.index') }}" class="btn-cancel">
                                        Annuler et retourner
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection