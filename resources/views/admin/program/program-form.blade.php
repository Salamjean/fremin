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

    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border-radius: 0.75rem;
        border: 1px solid #cbd5e1;
        transition: all 0.3s;
    }

    .form-control:focus {
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
            <h1 class="form-title">{{ isset($program) ? 'Modifier le Programme' : 'Nouveau Programme' }}</h1>
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

        @if(session('error'))
            <div
                style="background: #fef2f2; border: 1px solid #ef4444; color: #ef4444; padding: 1rem; border-radius: 0.75rem; margin-bottom: 2rem;">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ isset($program) ? route('admin.programs.update', $program) : route('admin.programs.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($program)) @method('PUT') @endif

            <div class="form-section">
                <h3 class="section-title"><i class="fas fa-image"></i> Visuel du Programme</h3>
                <div class="image-preview" id="previewContainer">
                    @if(isset($program) && $program->image)
                        <img src="{{ asset('storage/' . $program->image) }}" id="preview">
                    @else
                        <div id="placeholder"><i class="fas fa-camera fa-3x text-gray-300"></i></div>
                        <img id="preview" style="display:none">
                    @endif
                </div>
                <div class="form-group">
                    <label class="form-label">Image de couverture</label>
                    <input type="file" name="image" class="form-control" onchange="previewImage(this)">
                </div>
                <div class="form-group">
                    <label class="form-label">Texte alternatif (SEO)</label>
                    <input type="text" name="image_alt" class="form-control"
                        value="{{ old('image_alt', $program->image_alt ?? '') }}">
                </div>
            </div>

            <div class="form-section">
                <h3 class="section-title"><i class="fas fa-info-circle"></i> Détails</h3>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="form-label">Titre du Programme</label>
                            <input type="text" name="title" class="form-control"
                                value="{{ old('title', $program->title ?? '') }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Icone (FontAwesome)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0"
                                    style="border-radius: 0.75rem 0 0 0.75rem;">
                                    <i id="icon-preview-display"
                                        class="{{ old('icon', $program->icon ?? 'fas fa-briefcase') }}"></i>
                                </span>
                                <input type="text" name="icon" class="form-control border-start-0"
                                    style="border-radius: 0 0.75rem 0.75rem 0;"
                                    value="{{ old('icon', $program->icon ?? 'fas fa-briefcase') }}"
                                    onkeyup="document.getElementById('icon-preview-display').className = this.value"
                                    required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Sous-titre / Catégorie</label>
                    <input type="text" name="subtitle" class="form-control"
                        value="{{ old('subtitle', $program->subtitle ?? '') }}"
                        placeholder="Ex: Accompagnement technique">
                </div>
                <div class="form-group">
                    <label class="form-label">Description détaillée</label>
                    <textarea name="description" class="form-control" rows="6"
                        required>{{ old('description', $program->description ?? '') }}</textarea>
                </div>
            </div>

            <div class="form-section">
                <h3 class="section-title"><i class="fas fa-link"></i> Action & Tri</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Lien (URL)</label>
                            <input type="url" name="link" class="form-control"
                                value="{{ old('link', $program->link ?? '') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Texte du bouton</label>
                            <input type="text" name="link_text" class="form-control"
                                value="{{ old('link_text', $program->link_text ?? 'En savoir plus') }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Ordre d'affichage</label>
                    <input type="number" name="sort_order" class="form-control"
                        value="{{ old('sort_order', $program->sort_order ?? 0) }}" required>
                </div>
                <div class="form-group">
                    <label class="d-flex align-items-center gap-2">
                        <input type="checkbox" name="is_active" {{ old('is_active', $program->is_active ?? true) ? 'checked' : '' }}>
                        Publier ce programme immédiatement
                    </label>
                </div>
            </div>

            <button type="submit" class="btn-submit">
                {{ isset($program) ? 'Mettre à jour' : 'Enregistrer le Programme' }}
            </button>
        </form>
    </div>
</div>

<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('preview').src = e.target.result;
                document.getElementById('preview').style.display = 'block';
                document.getElementById('placeholder').style.display = 'none';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>