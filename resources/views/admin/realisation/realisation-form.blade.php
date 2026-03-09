<style>
    .prog-form-container {
        padding: 2rem;
        background: #f8fafc;
    }

    .form-card {
        background: white;
        border-radius: 1.5rem;
        padding: 2.5rem;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        border: 1px solid #e2e8f0;
        max-width: 900px;
        margin: 0 auto;
    }

    .form-header {
        margin-bottom: 2rem;
        border-bottom: 2px solid #f1f5f9;
        padding-bottom: 1rem;
    }

    .form-title {
        font-size: 1.75rem;
        font-weight: 800;
        color: #06634e;
    }

    .form-section {
        margin-bottom: 2rem;
    }

    .section-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #475569;
        margin-bottom: 1.25rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .section-title i {
        color: #78ac11;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        font-size: 0.9rem;
        font-weight: 600;
        color: #334155;
        margin-bottom: 0.5rem;
    }

    .form-control,
    .form-select {
        width: 100%;
        padding: 0.75rem 1rem;
        border-radius: 0.75rem;
        border: 1px solid #cbd5e1;
        transition: all 0.3s;
    }

    .form-control:focus,
    .form-select:focus {
        outline: none;
        border-color: #06634e;
        box-shadow: 0 0 0 3px rgba(6, 99, 78, 0.1);
    }

    .image-preview {
        width: 100%;
        height: 250px;
        background: #f1f5f9;
        border-radius: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        border: 2px dashed #cbd5e1;
        margin-bottom: 1rem;
    }

    .image-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .btn-submit {
        background: linear-gradient(135deg, #06634e, #0a7a62);
        color: white;
        padding: 1rem 2rem;
        border-radius: 0.75rem;
        font-weight: 700;
        border: none;
        cursor: pointer;
        width: 100%;
        transition: all 0.3s;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(6, 99, 78, 0.2);
    }
</style>

<div class="prog-form-container">
    <div class="form-card">
        <div class="form-header">
            <h1 class="form-title">{{ isset($realisation) ? 'Modifier la Réalisation' : 'Nouvelle Réalisation' }}</h1>
        </div>

        @if ($errors->any())
            <div
                style="background: #fef2f2; border: 1px solid #ef4444; color: #ef4444; padding: 1rem; border-radius: 0.75rem; margin-bottom: 2rem;">
                <ul style="margin: 0; padding-left: 1.25rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ isset($realisation) ? route('admin.realisations.update', $realisation) : route('admin.realisations.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($realisation)) @method('PUT') @endif

            <div class="form-section">
                <h3 class="section-title"><i class="fas fa-image"></i> Visuel Principal</h3>
                <div class="image-preview" id="previewContainerMain">
                    @if(isset($realisation) && $realisation->image_main)
                        <img src="{{ Str::startsWith($realisation->image_main, 'assets') ? asset($realisation->image_main) : asset('storage/' . $realisation->image_main) }}"
                            id="previewMain">
                    @else
                        <div id="placeholderMain"><i class="fas fa-camera fa-3x text-gray-300"></i></div>
                        <img id="previewMain" style="display:none">
                    @endif
                </div>
                <div class="form-group">
                    <label class="form-label">Image Principale</label>
                    <input type="file" name="image_main" class="form-control"
                        onchange="previewImage(this, 'previewMain', 'placeholderMain')">
                </div>
            </div>

            <div class="form-section">
                <h3 class="section-title"><i class="fas fa-images"></i> Visuel Secondaire</h3>
                <div class="image-preview" id="previewContainerSub">
                    @if(isset($realisation) && $realisation->image_sub)
                        <img src="{{ Str::startsWith($realisation->image_sub, 'assets') ? asset($realisation->image_sub) : asset('storage/' . $realisation->image_sub) }}"
                            id="previewSub">
                    @else
                        <div id="placeholderSub"><i class="fas fa-image fa-3x text-gray-300"></i></div>
                        <img id="previewSub" style="display:none">
                    @endif
                </div>
                <div class="form-group">
                    <label class="form-label">Image Secondaire (Optionnelle)</label>
                    <input type="file" name="image_sub" class="form-control"
                        onchange="previewImage(this, 'previewSub', 'placeholderSub')">
                </div>
            </div>

            <div class="form-section">
                <h3 class="section-title"><i class="fas fa-info-circle"></i> Détails</h3>
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label class="form-label">Titre de la Réalisation</label>
                            <input type="text" name="title" class="form-control"
                                value="{{ old('title', $realisation->title ?? '') }}" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Ordre d'affichage</label>
                            <input type="number" name="sort_order" class="form-control"
                                value="{{ old('sort_order', $realisation->sort_order ?? 0) }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="8"
                        required>{{ old('description', $realisation->description ?? '') }}</textarea>
                </div>
                <div class="form-group">
                    <label class="d-flex align-items-center gap-2">
                        <input type="checkbox" name="is_active" {{ old('is_active', $realisation->is_active ?? true) ? 'checked' : '' }}>
                        Publier cette réalisation sur le site
                    </label>
                </div>
            </div>

            <button type="submit" class="btn-submit">
                {{ isset($realisation) ? 'Mettre à jour' : 'Enregistrer' }}
            </button>
        </form>
    </div>
</div>

<script>
    function previewImage(input, previewId, placeholderId) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById(previewId).src = e.target.result;
                document.getElementById(previewId).style.display = 'block';
                document.getElementById(placeholderId).style.display = 'none';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>