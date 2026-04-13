@extends('admin.layouts.template')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

    <style>
        .form-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
        }

        .item-row {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border-left: 5px solid #009B3A;
            position: relative;
        }

        .btn-remove {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .image-input-group {
            background: #fff;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
            border: 1px solid #dee2e6;
        }
    </style>

    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="card form-card">
                    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                        <h4 class="mb-0 fw-bold text-success">Modifier la Page : {{ $activityPage->title }}</h4>
                        <a href="{{ route('admin.activity-pages.index') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-arrow-left me-1"></i> Retour
                        </a>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('admin.activity-pages.update', $activityPage->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Titre de la Page</label>
                                    <input type="text" name="title" class="form-control"
                                        value="{{ old('title', $activityPage->title) }}" required>
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label fw-bold">Sous-titre / Description Courte</label>
                                    <input type="text" name="subtitle" class="form-control"
                                        value="{{ old('subtitle', $activityPage->subtitle) }}">
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check form-switch mt-4 pt-2">
                                        <input type="hidden" name="is_active" value="0">
                                        <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                            id="is_active" {{ old('is_active', $activityPage->is_active) ? 'checked' : '' }}>
                                        <label class="form-check-label fw-bold text-dark" for="is_active">Page Active</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">Contenu Principal (HTML)</label>
                                <textarea name="content" id="editor" class="form-control">{{ old('content', $activityPage->content) }}</textarea>
                            </div>

                            <hr class="my-5">

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="fw-bold mb-0"><i class="fas fa-th-list me-2 text-primary"></i>Éléments / Cartes de l'Activité</h5>
                                <button type="button" onclick="addItem()" class="btn btn-success btn-sm">
                                    <i class="fas fa-plus me-1"></i> Ajouter un élément
                                </button>
                            </div>

                            <div id="items-container">
                                @if ($activityPage->items && is_array($activityPage->items))
                                    @foreach ($activityPage->items as $index => $item)
                                        <div class="item-row" id="item-{{ $index }}">
                                            <button type="button" class="btn btn-danger btn-sm btn-remove" onclick="removeRow('item-{{ $index }}')">
                                                <i class="fas fa-times"></i>
                                            </button>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label small fw-bold">Titre de l'élément</label>
                                                    <input type="text" name="items[{{ $index }}][title]" class="form-control" value="{{ $item['title'] ?? '' }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label small fw-bold">Lien Vidéo (YouTube/Google Drive Embed)</label>
                                                    <input type="text" name="items[{{ $index }}][video]" class="form-control" value="{{ $item['video'] ?? '' }}" placeholder="URL de l'iframe src">
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label small fw-bold">Description / Texte</label>
                                                    <textarea name="items[{{ $index }}][description]" class="form-control" rows="3">{{ $item['description'] ?? '' }}</textarea>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label small fw-bold mb-1">Uploader de nouvelles images :</label>
                                                        <input type="file" name="items[{{ $index }}][image_uploads][]" class="form-control form-control-sm" multiple accept="image/*">
                                                    </div>
                                                    <div id="images-container-{{ $index }}" class="row g-2">
                                                        @if(isset($item['images']) && is_array($item['images']))
                                                            @foreach($item['images'] as $imgIndex => $img)
                                                                <div class="col-md-4 mb-2" id="img-{{ $index }}-{{ $imgIndex }}">
                                                                    <div class="card h-100 border shadow-sm">
                                                                        @if($img)
                                                                            <img src="{{ str_starts_with($img, 'pages/') ? asset('storage/' . $img) : asset('assets/img/' . $img) }}" 
                                                                                 class="card-img-top" style="height: 80px; object-fit: cover;" alt="Image">
                                                                        @endif
                                                                        <div class="card-body p-1">
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" name="items[{{ $index }}][images][]" class="form-control form-control-sm" value="{{ $img }}">
                                                                                <button class="btn btn-outline-danger btn-sm" type="button" onclick="this.parentElement.parentElement.parentElement.parentElement.remove()">
                                                                                    <i class="fas fa-trash"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                                @if($activityPage->slug == 'ceremonies')
                                                <div class="col-md-4">
                                                    <label class="form-label small fw-bold">Type d'élément</label>
                                                    <select name="items[{{ $index }}][type]" class="form-select form-select-sm">
                                                        <option value="ceremonie" {{ ($item['type'] ?? '') == 'ceremonie' ? 'selected' : '' }}>Cérémonie</option>
                                                        <option value="atelier" {{ ($item['type'] ?? '') == 'atelier' ? 'selected' : '' }}>Atelier</option>
                                                    </select>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <div class="mt-5 text-end">
                                <button type="submit" class="btn btn-primary px-5 shadow-sm">
                                    <i class="fas fa-save me-2"></i> Enregistrer les modifications
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replace('editor');

        let itemIndex = {{ $activityPage->items ? count($activityPage->items) : 0 }};

        function addItem() {
            const container = document.getElementById('items-container');
            const isCeremoniePage = '{{ $activityPage->slug }}' === 'ceremonies';
            
            const html = `
                <div class="item-row" id="item-${itemIndex}">
                    <button type="button" class="btn btn-danger btn-sm btn-remove" onclick="removeRow('item-${itemIndex}')">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Titre de l'élément</label>
                            <input type="text" name="items[${itemIndex}][title]" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Lien Vidéo (Embed URL)</label>
                            <input type="text" name="items[${itemIndex}][video]" class="form-control" placeholder="URL de l'iframe src">
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Description / Texte</label>
                            <textarea name="items[${itemIndex}][description]" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="col-12">
                            <div class="mb-2">
                                <label class="form-label small fw-bold mb-1">Uploader de nouvelles images :</label>
                                <input type="file" name="items[${itemIndex}][image_uploads][]" class="form-control form-control-sm" multiple accept="image/*">
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <label class="form-label small fw-bold mb-0">Images existantes (Nom) :</label>
                                <button type="button" onclick="addImage('${itemIndex}')" class="btn btn-outline-primary btn-xs" style="padding: 2px 8px; font-size: 10px;">
                                    <i class="fas fa-plus"></i> Ajouter Nom d'image
                                </button>
                            </div>
                            <div id="images-container-${itemIndex}" class="row g-2"></div>
                        </div>
                        ${isCeremoniePage ? `
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Type d'élément</label>
                            <select name="items[${itemIndex}][type]" class="form-select form-select-sm">
                                <option value="ceremonie">Cérémonie</option>
                                <option value="atelier">Atelier</option>
                            </select>
                        </div>` : ''}
                    </div>
                </div>
            `;
            
            container.insertAdjacentHTML('beforeend', html);
            itemIndex++;
        }

        function addImage(idx) {
            const container = document.getElementById(`images-container-${idx}`);
            const html = `
                <div class="col-md-4 mb-2">
                    <div class="card h-100 border shadow-sm">
                        <div class="card-body p-1">
                            <div class="input-group input-group-sm">
                                <input type="text" name="items[${idx}][images][]" class="form-control form-control-sm" placeholder="nom_image.jpg">
                                <button class="btn btn-outline-danger btn-sm" type="button" onclick="this.parentElement.parentElement.parentElement.parentElement.remove()">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', html);
        }

        function removeRow(id) {
            if (confirm('Voulez-vous vraiment supprimer cet élément ?')) {
                document.getElementById(id).remove();
            }
        }
    </script>
@endsection
