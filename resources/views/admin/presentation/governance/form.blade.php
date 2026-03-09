@extends('admin.layouts.template')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>

    <style>
        .governance-form {
            --primary-dark: #06634e;
            --primary-light: #78ac11;
            --white: #ffffff;
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .governance-form .card {
            border: none;
            margin: 2rem 0;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
            overflow: hidden;
        }

        .governance-form .card-header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            padding: 1.5rem 2rem;
            color: white;
            border: none;
        }

        .governance-form .form-label {
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
        }

        .governance-form .form-control {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            border: 2px solid #e0e0e0;
            transition: var(--transition);
        }

        .governance-form .btn-submit {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            border: none;
            border-radius: 12px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            color: white;
            transition: var(--transition);
        }

        .governance-form .btn-cancel {
            background-color: #f8f9fa;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            color: #6c757d;
            text-decoration: none;
            display: inline-block;
        }

        .list-item-box {
            background-color: #f8f9fa;
            border-radius: 12px;
            padding: 10px;
            margin-bottom: 8px;
            border: 1px solid #e0e0e0;
        }
    </style>

    <div class="governance-form container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-{{ isset($governance) ? 'edit' : 'plus-circle' }} me-2"></i>
                            {{ isset($governance) ? 'Modifier' : 'Ajouter' }} un Élément de Gouvernance
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <form
                            action="{{ isset($governance) ? route('admin.presentation-governances.update', $governance->id) : route('admin.presentation-governances.store') }}"
                            method="POST">
                            @csrf
                            @if(isset($governance))
                                @method('PUT')
                            @endif

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label">Identifiant Unique (Clé)</label>
                                    <input type="text" name="section_key"
                                        class="form-control @error('section_key') is-invalid @enderror"
                                        placeholder="ex: comite_gestion, cellule_technique, tutelles"
                                        value="{{ old('section_key', $governance->section_key ?? '') }}" required>
                                    @error('section_key')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Ne pas modifier s'il s'agit d'une section existante sur le
                                        site.</small>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Titre</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        value="{{ old('title', $governance->title ?? '') }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-2">
                                    <label class="form-label">Ordre</label>
                                    <input type="number" name="sort_order"
                                        class="form-control @error('sort_order') is-invalid @enderror"
                                        value="{{ old('sort_order', $governance->sort_order ?? 0) }}" required>
                                    @error('sort_order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Description / Introduction</label>
                                    <textarea name="description"
                                        class="form-control @error('description') is-invalid @enderror" rows="4"
                                        required>{{ old('description', $governance->description ?? '') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Contenu / Rôle (Optionnel)</label>
                                    <textarea name="content" id="editor"
                                        class="form-control @error('content') is-invalid @enderror">{{ old('content', $governance->content ?? '') }}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 mt-4">
                                    <label class="form-label d-flex justify-content-between">
                                        Liste des membres / éléments de la liste
                                        <button type="button" class="btn btn-sm btn-outline-success rounded-pill"
                                            onclick="addListItem()">
                                            <i class="fas fa-plus me-1"></i> Ajouter un élément
                                        </button>
                                    </label>
                                    <div id="list-items-container">
                                        @if(isset($governance) && $governance->items)
                                            @foreach($governance->items as $item)
                                                <div class="list-item-box d-flex g-2">
                                                    <input type="text" name="list_items[]" class="form-control me-2"
                                                        placeholder="Texte de l'élément" value="{{ $item }}">
                                                    <button type="button" class="btn btn-sm btn-danger rounded-circle"
                                                        onclick="this.parentElement.remove()">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12 mt-3">
                                    <div class="form-check form-switch bg-light p-3 rounded-3 border">
                                        <input class="form-check-input ms-0 me-3" type="checkbox" name="is_active"
                                            id="is_active" {{ old('is_active', $governance->is_active ?? true) ? 'checked' : '' }} value="1">
                                        <label class="form-check-label fw-bold" for="is_active">
                                            Activer l'affichage
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12 mt-5 text-end border-top pt-4">
                                    <a href="{{ route('admin.presentation-governances.index') }}"
                                        class="btn btn-cancel me-2">
                                        Annuler
                                    </a>
                                    <button type="submit" class="btn btn-submit">
                                        <i class="fas fa-save me-2"></i>
                                        {{ isset($governance) ? 'Mettre à jour' : 'Enregistrer' }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
            })
            .catch(error => {
                console.error(error);
            });

        function addListItem() {
            const container = document.getElementById('list-items-container');
            const div = document.createElement('div');
            div.className = 'list-item-box d-flex g-2';
            div.innerHTML = `
                        <input type="text" name="list_items[]" class="form-control me-2" placeholder="Texte de l'élément">
                        <button type="button" class="btn btn-sm btn-danger rounded-circle" onclick="this.parentElement.remove()">
                            <i class="fas fa-times"></i>
                        </button>
                    `;
            container.appendChild(div);
        }
    </script>
@endsection