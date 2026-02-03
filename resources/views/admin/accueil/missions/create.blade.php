@extends('admin.layouts.template')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .mission-form {
            --primary-dark: #06634e;
            --primary-light: #78ac11;
            --white: #ffffff;
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .mission-form .card {
            border: none;
            margin: 2rem auto;
            max-width: 900px;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
        }

        .mission-form .card-header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            border-radius: 16px 16px 0 0;
            padding: 1.5rem 2rem;
            color: white;
        }

        .mission-form .form-label {
            font-weight: 600;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
        }

        .mission-form .form-control,
        .mission-form .form-select {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            border: 1px solid #e0e0e0;
            transition: var(--transition);
        }

        .mission-form .form-control:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 0.25rem rgba(120, 172, 11, 0.1);
        }

        .mission-form .btn-submit {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            color: white;
            border: none;
            border-radius: 12px;
            padding: 0.75rem 2.5rem;
            font-weight: 700;
            transition: var(--transition);
        }

        .mission-form .btn-cancel {
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

    <div class="mission-form container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-{{ isset($missionCard) ? 'edit' : 'plus-circle' }} me-2"></i>
                    {{ isset($missionCard) ? 'Modifier la Carte Mission' : 'Nouvelle Carte Mission' }}</h5>
            </div>
            <div class="card-body p-4">
                <form
                    action="{{ isset($missionCard) ? route('admin.mission-cards.update', $missionCard) : route('admin.mission-cards.store') }}"
                    method="POST">
                    @csrf @if(isset($missionCard)) @method('PUT') @endif

                    <div class="row g-4">
                        <div class="col-md-8">
                            <label class="form-label">Titre de la carte</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title', $missionCard->title ?? '') }}" placeholder="Ex: Notre Vision"
                                required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Thème Couleur</label>
                            <select name="theme" class="form-select @error('theme') is-invalid @enderror" required>
                                <option value="orange" {{ old('theme', $missionCard->theme ?? '') == 'orange' ? 'selected' : '' }}>Orange</option>
                                <option value="green" {{ old('theme', $missionCard->theme ?? '') == 'green' ? 'selected' : '' }}>Vert</option>
                                <option value="dark" {{ old('theme', $missionCard->theme ?? '') == 'dark' ? 'selected' : '' }}>Sombre</option>
                            </select>
                            @error('theme')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Icone (FontAwesome)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i id="icon-preview"
                                        class="{{ old('icon', $missionCard->icon ?? 'fas fa-bullseye') }}"></i></span>
                                <input type="text" name="icon" class="form-control @error('icon') is-invalid @enderror"
                                    value="{{ old('icon', $missionCard->icon ?? 'fas fa-bullseye') }}"
                                    onkeyup="document.getElementById('icon-preview').className = this.value" required>
                                @error('icon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <small class="text-muted">Ex: fas fa-eye, fas fa-chart-line</small>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Ordre d'affichage</label>
                            <input type="number" name="sort_order"
                                class="form-control @error('sort_order') is-invalid @enderror"
                                value="{{ old('sort_order', $missionCard->sort_order ?? 0) }}" required>
                            @error('sort_order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Description principale</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                rows="3" required>{{ old('description', $missionCard->description ?? '') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Points clés (un par ligne)</label>
                            <textarea name="list_items" class="form-control @error('list_items') is-invalid @enderror"
                                rows="5"
                                placeholder="Saisissez un point par ligne...">{{ old('list_items', $missionCard->list_items_string ?? '') }}</textarea>
                            <small class="text-muted">Ces points apparaîtront sous forme de liste à puces sous la
                                description.</small>
                            @error('list_items')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Lien (Optionnel)</label>
                            <input type="text" name="link" class="form-control @error('link') is-invalid @enderror"
                                value="{{ old('link', $missionCard->link ?? '') }}" placeholder="Ex: /missions, #contact">
                            @error('link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $missionCard->is_active ?? true) ? 'checked' : '' }}>
                                <label class="form-check-label fw-bold text-dark" for="is_active">Afficher sur le
                                    site</label>
                            </div>
                        </div>

                        <div class="col-12 mt-4 d-flex justify-content-between">
                            <a href="{{ route('admin.mission-cards.index') }}" class="btn-cancel"><i
                                    class="fas fa-arrow-left me-2"></i> Annuler</a>
                            <button type="submit" class="btn-submit"><i class="fas fa-save me-2"></i>
                                {{ isset($missionCard) ? 'Mettre à jour' : 'Enregistrer' }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection