@extends('admin.layouts.template')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>

    <style>
        .project-form {
            --primary-dark: #06634e;
            --primary-light: #78ac11;
            --white: #ffffff;
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .project-form .card {
            border: none;
            margin: 2rem 0;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
            overflow: hidden;
        }

        .project-form .card-header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            padding: 1.5rem 2rem;
            color: white;
            border: none;
        }

        .project-form .form-label {
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
        }

        .project-form .form-control {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            border: 2px solid #e0e0e0;
            transition: var(--transition);
        }

        .project-form .btn-submit {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            border: none;
            border-radius: 12px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            color: white;
            transition: var(--transition);
        }

        .project-form .btn-cancel {
            background-color: #f8f9fa;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            color: #6c757d;
            text-decoration: none;
            display: inline-block;
        }
    </style>

    <div class="project-form container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="fas fa-edit me-2"></i> Modifier la Page : {{ $projectPage->title }}
                        </h5>
                        <a href="{{ route('admin.project-pages.index') }}" class="btn btn-sm btn-light">
                            <i class="fas fa-arrow-left me-1"></i> Retour
                        </a>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('admin.project-pages.update', $projectPage->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-4">
                                <div class="col-md-9">
                                    <label class="form-label">Titre de la Page</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        value="{{ old('title', $projectPage->title) }}" required>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-check form-switch mt-4 pt-2">
                                        <input type="hidden" name="is_active" value="0">
                                        <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                            id="is_active" {{ old('is_active', $projectPage->is_active) ? 'checked' : '' }}>
                                        <label class="form-check-label fw-bold text-dark" for="is_active">Page
                                            Active</label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Sous-titre (Slogan/Introduction)</label>
                                    <input type="text" name="subtitle"
                                        class="form-control @error('subtitle') is-invalid @enderror"
                                        value="{{ old('subtitle', $projectPage->subtitle) }}">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Contenu Principal (HTML/Texte riche)</label>
                                    <textarea name="content" id="editor"
                                        class="form-control @error('content') is-invalid @enderror">{{ old('content', $projectPage->content) }}</textarea>
                                </div>

                                <hr class="my-5">

                                <!-- Realisations Section -->
                                <div class="col-12">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h6 class="fw-bold mb-0 text-uppercase" style="color: var(--primary-dark)">
                                            <i class="fas fa-tasks me-2"></i> Réalisations / Travaux Prévus
                                        </h6>
                                        <button type="button" class="btn btn-sm btn-outline-success"
                                            onclick="addRealisation()">
                                            <i class="fas fa-plus me-1"></i> Ajouter une ligne
                                        </button>
                                    </div>

                                    <div id="realisations-container">
                                        @php
                                            $realisations = old('realisations', $projectPage->realisations ?? []);
                                        @endphp

                                        @foreach($realisations as $index => $item)
                                            <div class="realisation-row row g-2 mb-3 align-items-center">
                                                @if(is_array($item))
                                                    <div class="col-md-4">
                                                        <input type="text" name="realisations[{{ $index }}][name]"
                                                            class="form-control" placeholder="Nom de l'entreprise"
                                                            value="{{ $item['name'] ?? '' }}">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" name="realisations[{{ $index }}][sector]"
                                                            class="form-control" placeholder="Secteur"
                                                            value="{{ $item['sector'] ?? '' }}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" name="realisations[{{ $index }}][equipment]"
                                                            class="form-control" placeholder="Équipement"
                                                            value="{{ $item['equipment'] ?? '' }}">
                                                    </div>
                                                @else
                                                    <div class="col-md-11">
                                                        <input type="text" name="realisations[{{ $index }}]" class="form-control"
                                                            placeholder="Détail du travail" value="{{ $item }}">
                                                    </div>
                                                @endif
                                                <div class="col-md-1 text-end">
                                                    <button type="button" class="btn btn-sm btn-outline-danger"
                                                        onclick="removeRow(this)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <hr class="my-5">

                                <!-- Media Section -->
                                <div class="col-12">
                                    <h6 class="fw-bold mb-3 text-uppercase" style="color: var(--primary-dark)">
                                        <i class="fas fa-photo-video me-2"></i> Médias (Vidéos & Galerie)
                                    </h6>

                                    <div class="row g-4">
                                        <div class="col-md-12">
                                            <label class="form-label">Lien Vidéo YouTube (URL Iframe src)</label>
                                            <input type="text" name="media[video]" class="form-control"
                                                placeholder="https://www.youtube.com/embed/..."
                                                value="{{ old('media.video', $projectPage->media['video'] ?? '') }}">
                                        </div>

                                        <div class="col-12">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <label class="form-label mb-0">Galerie d'images (Fichiers existants et nouveaux)</label>
                                                <button type="button" class="btn btn-sm btn-outline-success"
                                                    onclick="addImage()">
                                                    <i class="fas fa-plus me-1"></i> Ajouter une image (Nom ou Upload)
                                                </button>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label small">Uploader de nouvelles images :</label>
                                                <input type="file" name="gallery_uploads[]" class="form-control" multiple accept="image/*">
                                            </div>
                                            <div id="gallery-container" class="row g-3">
                                                @php
                                                    $gallery = old('media.gallery', $projectPage->media['gallery'] ?? []);
                                                @endphp
                                                @foreach($gallery as $img)
                                                    <div class="col-md-3 gallery-item">
                                                        <div class="card h-100 border shadow-sm">
                                                            @if($img)
                                                                <img src="{{ str_starts_with($img, 'pages/') ? asset('storage/' . $img) : asset('assets/img/' . $img) }}" 
                                                                     class="card-img-top" style="height: 120px; object-fit: cover;" alt="Image">
                                                            @endif
                                                            <div class="card-body p-2">
                                                                <div class="input-group input-group-sm">
                                                                    <input type="text" name="media[gallery][]" class="form-control"
                                                                        value="{{ $img }}" placeholder="image.jpg">
                                                                    <button class="btn btn-outline-danger" type="button"
                                                                        onclick="removeRow(this)">
                                                                        <i class="fas fa-times"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 text-end mt-5">
                                    <a href="{{ route('admin.project-pages.index') }}"
                                        class="btn btn-cancel me-2">Annuler</a>
                                    <button type="submit" class="btn btn-submit">
                                        <i class="fas fa-save me-2"></i>Enregistrer les modifications
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
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo']
            })
            .catch(error => {
                console.error(error);
            });

        function removeRow(btn) {
            btn.closest('.realisation-row, .gallery-item').remove();
        }

        let realisationCount = {{ count($projectPage->realisations ?? []) }};
        const isStructured = {{ is_array($projectPage->realisations[0] ?? null) ? 'true' : 'false' }};

        function addRealisation() {
            const container = document.getElementById('realisations-container');
            const div = document.createElement('div');
            div.className = 'realisation-row row g-2 mb-3 align-items-center';

            if (isStructured) {
                div.innerHTML = `
                        <div class="col-md-4"><input type="text" name="realisations[${realisationCount}][name]" class="form-control" placeholder="Nom"></div>
                        <div class="col-md-3"><input type="text" name="realisations[${realisationCount}][sector]" class="form-control" placeholder="Secteur"></div>
                        <div class="col-md-4"><input type="text" name="realisations[${realisationCount}][equipment]" class="form-control" placeholder="Équipement"></div>
                        <div class="col-md-1 text-end"><button type="button" class="btn btn-sm btn-outline-danger" onclick="removeRow(this)"><i class="fas fa-trash"></i></button></div>
                    `;
            } else {
                div.innerHTML = `
                        <div class="col-md-11"><input type="text" name="realisations[${realisationCount}]" class="form-control" placeholder="Nouveau détail"></div>
                        <div class="col-md-1 text-end"><button type="button" class="btn btn-sm btn-outline-danger" onclick="removeRow(this)"><i class="fas fa-trash"></i></button></div>
                    `;
            }
            container.appendChild(div);
            realisationCount++;
        }

        function addImage() {
            const container = document.getElementById('gallery-container');
            const div = document.createElement('div');
            div.className = 'col-md-3 gallery-item';
            div.innerHTML = `
                    <div class="input-group">
                        <input type="text" name="media[gallery][]" class="form-control" placeholder="nom_image.jpg">
                        <button class="btn btn-outline-danger" type="button" onclick="removeRow(this)"><i class="fas fa-times"></i></button>
                    </div>
                `;
            container.appendChild(div);
        }
    </script>
@endsection