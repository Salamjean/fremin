@extends('admin.layouts.template')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>

    <style>
        .history-form {
            --primary-dark: #06634e;
            --primary-light: #78ac11;
            --white: #ffffff;
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .history-form .card {
            border: none;
            margin: 2rem 0;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
            overflow: hidden;
        }

        .history-form .card-header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            padding: 1.5rem 2rem;
            color: white;
            border: none;
        }

        .history-form .form-label {
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
        }

        .history-form .form-control {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            border: 2px solid #e0e0e0;
            transition: var(--transition);
        }

        .history-form .btn-submit {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            border: none;
            border-radius: 12px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            color: white;
            transition: var(--transition);
        }

        .history-form .btn-cancel {
            background-color: #f8f9fa;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            color: #6c757d;
            text-decoration: none;
            display: inline-block;
        }

        .ck-editor__editable {
            min-height: 250px;
        }

        .president-item {
            background-color: #f8f9fa;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 10px;
            border: 1px solid #e0e0e0;
        }
    </style>

    <div class="history-form container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-{{ isset($history) ? 'edit' : 'plus-circle' }} me-2"></i>
                            {{ isset($history) ? 'Modifier' : 'Ajouter' }} l'Historique
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <form
                            action="{{ isset($history) ? route('admin.history-sections.update', $history->id) : route('admin.history-sections.store') }}"
                            method="POST">
                            @csrf
                            @if(isset($history))
                                @method('PUT')
                            @endif

                            <div class="row g-4">
                                <div class="col-12">
                                    <label class="form-label">Titre</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        value="{{ old('title', $history->title ?? 'Historique') }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Contenu Principal</label>
                                    <textarea name="content" id="editor"
                                        class="form-control @error('content') is-invalid @enderror">{{ old('content', $history->content ?? '') }}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 mt-4">
                                    <label class="form-label d-flex justify-content-between">
                                        Liste des Présidents
                                        <button type="button" class="btn btn-sm btn-outline-success rounded-pill"
                                            onclick="addPresident()">
                                            <i class="fas fa-plus me-1"></i> Ajouter un président
                                        </button>
                                    </label>
                                    <div id="presidents-container">
                                        @if(isset($history) && $history->presidents)
                                            @foreach($history->presidents as $index => $president)
                                                <div class="president-item row g-2">
                                                    <div class="col-md-6">
                                                        <input type="text" name="president_names[]" class="form-control"
                                                            placeholder="Nom du président" value="{{ $president['name'] }}">
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input type="text" name="president_periods[]" class="form-control"
                                                            placeholder="Période (ex: De 2015 à 2018)"
                                                            value="{{ $president['period'] }}">
                                                    </div>
                                                    <div class="col-md-1 d-flex align-items-center">
                                                        <button type="button" class="btn btn-sm btn-danger rounded-circle"
                                                            onclick="this.parentElement.parentElement.remove()">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12 mt-3">
                                    <div class="form-check form-switch bg-light p-3 rounded-3 border">
                                        <input class="form-check-input ms-0 me-3" type="checkbox" name="is_active"
                                            id="is_active" {{ old('is_active', $history->is_active ?? true) ? 'checked' : '' }} value="1">
                                        <label class="form-check-label fw-bold" for="is_active">
                                            Activer l'affichage
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12 mt-5 text-end border-top pt-4">
                                    <a href="{{ route('admin.history-sections.index') }}" class="btn btn-cancel me-2">
                                        Annuler
                                    </a>
                                    <button type="submit" class="btn btn-submit">
                                        <i class="fas fa-save me-2"></i>
                                        {{ isset($history) ? 'Mettre à jour' : 'Enregistrer' }}
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
            .catch(error => { console.error(error); });

        function addPresident() {
            const container = document.getElementById('presidents-container');
            const div = document.createElement('div');
            div.className = 'president-item row g-2';
            div.innerHTML = `
                    <div class="col-md-6">
                        <input type="text" name="president_names[]" class="form-control" placeholder="Nom du président">
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="president_periods[]" class="form-control" placeholder="Période (ex: De 2015 à 2018)">
                    </div>
                    <div class="col-md-1 d-flex align-items-center">
                        <button type="button" class="btn btn-sm btn-danger rounded-circle" onclick="this.parentElement.parentElement.remove()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                `;
            container.appendChild(div);
        }
    </script>
@endsection