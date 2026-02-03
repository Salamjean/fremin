@extends('admin.layouts.template')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .gov-form {
            --primary-dark: #06634e;
            --primary-light: #78ac11;
            --white: #ffffff;
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .gov-form .card {
            border: none;
            margin: 2rem auto;
            max-width: 900px;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
        }

        .gov-form .card-header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            border-radius: 16px 16px 0 0;
            padding: 1.5rem 2rem;
            color: white;
        }

        .gov-form .form-label {
            font-weight: 600;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
        }

        .gov-form .form-control {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            border: 1px solid #e0e0e0;
            transition: var(--transition);
        }

        .gov-form .form-control:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 0.25rem rgba(120, 172, 11, 0.1);
        }

        .gov-form .btn-submit {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            color: white;
            border: none;
            border-radius: 12px;
            padding: 0.75rem 2.5rem;
            font-weight: 700;
            transition: var(--transition);
        }

        .gov-form .btn-cancel {
            background-color: #f8f9fa;
            color: #6c757d;
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
        }
    </style>

    <div class="gov-form container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-{{ isset($governanceCard) ? 'edit' : 'plus-circle' }} me-2"></i>
                    {{ isset($governanceCard) ? 'Modifier la Carte Gouvernance' : 'Nouvelle Carte Gouvernance' }}</h5>
            </div>
            <div class="card-body p-4">
                <form
                    action="{{ isset($governanceCard) ? route('admin.governance-cards.update', $governanceCard) : route('admin.governance-cards.store') }}"
                    method="POST">
                    @csrf @if(isset($governanceCard)) @method('PUT') @endif

                    <div class="row g-4">
                        <div class="col-md-9">
                            <label class="form-label">Titre de la carte</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title', $governanceCard->title ?? '') }}"
                                placeholder="Ex: Notre Organisation" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Ordre d'affichage</label>
                            <input type="number" name="sort_order" class="form-control"
                                value="{{ old('sort_order', $governanceCard->sort_order ?? 0) }}" required>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Icone (FontAwesome)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i id="icon-preview"
                                        class="{{ old('icon', $governanceCard->icon ?? 'fas fa-sitemap') }}"></i></span>
                                <input type="text" name="icon" class="form-control"
                                    value="{{ old('icon', $governanceCard->icon ?? 'fas fa-sitemap') }}"
                                    onkeyup="document.getElementById('icon-preview').className = this.value" required>
                            </div>
                            <small class="text-muted">Ex: fas fa-users, fas fa-balance-scale</small>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Description principale</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                rows="3" required>{{ old('description', $governanceCard->description ?? '') }}</textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Éléments de liste (un par ligne)</label>
                            <textarea name="list_items" class="form-control" rows="5"
                                placeholder="Saisissez un élément par ligne...">{{ old('list_items', $governanceCard->list_items_string ?? '') }}</textarea>
                            <small class="text-muted">Ces éléments seront affichés sous forme de liste dans la
                                carte.</small>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Lien (Optionnel)</label>
                            <input type="text" name="link" class="form-control"
                                value="{{ old('link', $governanceCard->link ?? '') }}" placeholder="Ex: /gouvernance">
                        </div>

                        <div class="col-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ old('is_active', $governanceCard->is_active ?? true) ? 'checked' : '' }}>
                                <label class="form-check-label fw-bold text-dark" for="is_active">Actif</label>
                            </div>
                        </div>

                        <div class="col-12 mt-4 d-flex justify-content-between">
                            <a href="{{ route('admin.governance-cards.index') }}" class="btn-cancel"><i
                                    class="fas fa-arrow-left me-2"></i> Annuler</a>
                            <button type="submit" class="btn-submit"><i class="fas fa-save me-2"></i>
                                {{ isset($governanceCard) ? 'Mettre à jour' : 'Enregistrer' }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection