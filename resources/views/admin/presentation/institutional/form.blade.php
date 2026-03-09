@extends('admin.layouts.template')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>

    <style>
        .institutional-framework-form {
            --primary-dark: #06634e;
            --primary-light: #78ac11;
            --white: #ffffff;
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .institutional-framework-form .card {
            border: none;
            margin: 2rem 0;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
            overflow: hidden;
        }

        .institutional-framework-form .card-header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            padding: 1.5rem 2rem;
            color: white;
            border: none;
        }

        .institutional-framework-form .form-label {
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
        }

        .institutional-framework-form .form-control {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            border: 2px solid #e0e0e0;
            transition: var(--transition);
        }

        .institutional-framework-form .btn-submit {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            border: none;
            border-radius: 12px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            color: white;
            transition: var(--transition);
        }

        .institutional-framework-form .btn-cancel {
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
            min-height: 300px;
        }
    </style>

    <div class="institutional-framework-form container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-{{ isset($framework) ? 'edit' : 'plus-circle' }} me-2"></i>
                            {{ isset($framework) ? 'Modifier' : 'Ajouter' }} le Cadre Institutionnel
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <form
                            action="{{ isset($framework) ? route('admin.institutional-frameworks.update', $framework->id) : route('admin.institutional-frameworks.store') }}"
                            method="POST">
                            @csrf
                            @if(isset($framework))
                                @method('PUT')
                            @endif

                            <div class="row g-4">
                                <div class="col-12">
                                    <label class="form-label">Titre</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        value="{{ old('title', $framework->title ?? 'Cadre institutionnel') }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Contenu</label>
                                    <textarea name="content" id="editor"
                                        class="form-control @error('content') is-invalid @enderror">{{ old('content', $framework->content ?? '') }}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 mt-5 text-end border-top pt-4">
                                    <a href="{{ route('admin.institutional-frameworks.index') }}"
                                        class="btn btn-cancel me-2">
                                        Annuler
                                    </a>
                                    <button type="submit" class="btn btn-submit">
                                        <i class="fas fa-save me-2"></i>
                                        {{ isset($framework) ? 'Mettre à jour' : 'Enregistrer' }}
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
    </script>
@endsection