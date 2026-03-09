@extends('admin.layouts.template')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .strategic-axes-form {
            --primary-dark: #06634e;
            --primary-light: #78ac11;
            --white: #ffffff;
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .strategic-axes-form .card {
            border: none;
            margin: 2rem 0;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
            overflow: hidden;
        }

        .strategic-axes-form .card-header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            padding: 1.5rem 2rem;
            color: white;
            border: none;
        }

        .strategic-axes-form .form-label {
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
        }

        .strategic-axes-form .form-control {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            border: 2px solid #e0e0e0;
            transition: var(--transition);
        }

        .strategic-axes-form .btn-submit {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            border: none;
            border-radius: 12px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            color: white;
            transition: var(--transition);
        }

        .strategic-axes-form .btn-cancel {
            background-color: #f8f9fa;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            color: #6c757d;
            text-decoration: none;
            display: inline-block;
        }

        .strategic-axes-form .img-preview {
            max-width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 12px;
            margin-top: 10px;
            border: 2px solid #e0e0e0;
        }
    </style>

    <div class="strategic-axes-form container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-{{ isset($axis) ? 'edit' : 'plus-circle' }} me-2"></i>
                            {{ isset($axis) ? 'Modifier' : 'Ajouter' }} un Axe Stratégique
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <form
                            action="{{ isset($axis) ? route('admin.strategic-axes.update', $axis->id) : route('admin.strategic-axes.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($axis))
                                @method('PUT')
                            @endif

                            <div class="row g-4">
                                <div class="col-md-3">
                                    <label class="form-label">Numéro de l'axe</label>
                                    <input type="number" name="axis_number"
                                        class="form-control @error('axis_number') is-invalid @enderror"
                                        value="{{ old('axis_number', $axis->axis_number ?? 1) }}" required>
                                    @error('axis_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-9">
                                    <label class="form-label">Titre de l'axe</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        value="{{ old('title', $axis->title ?? '') }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Description (Optionnel)</label>
                                    <textarea name="description"
                                        class="form-control @error('description') is-invalid @enderror"
                                        rows="3">{{ old('description', $axis->description ?? '') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Image de fond</label>
                                    <input type="file" name="image"
                                        class="form-control @error('image') is-invalid @enderror"
                                        onchange="previewImage(event)">
                                    <div id="image-preview-container">
                                        @if(isset($axis) && $axis->image)
                                            <img src="{{ asset($axis->image) }}" class="img-preview" id="preview-img">
                                        @else
                                            <img src="#" class="img-preview d-none" id="preview-img">
                                        @endif
                                    </div>
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <div class="form-check form-switch bg-light p-3 rounded-3 border">
                                        <input class="form-check-input ms-0 me-3" type="checkbox" name="is_active"
                                            id="is_active" {{ old('is_active', $axis->is_active ?? true) ? 'checked' : '' }}
                                            value="1">
                                        <label class="form-check-label fw-bold" for="is_active">
                                            Activer l'affichage
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12 mt-5 text-end border-top pt-4">
                                    <a href="{{ route('admin.strategic-axes.index') }}" class="btn btn-cancel me-2">
                                        Annuler
                                    </a>
                                    <button type="submit" class="btn btn-submit">
                                        <i class="fas fa-save me-2"></i>
                                        {{ isset($axis) ? 'Mettre à jour' : 'Enregistrer' }}
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
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function () {
                const output = document.getElementById('preview-img');
                output.src = reader.result;
                output.classList.remove('d-none');
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection