@extends('admin.layouts.template')

@section('content')
    <style>
        /* Reuse styles from other admin pages */
        :root {
            --primary-dark: #06634e;
            --secondary: #78ac11;
            --white: #ffffff;
            --gray-50: #f8fafc;
            --gray-200: #e2e8f0;
            --gray-600: #475569;
            --radius-md: 12px;
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .admin-card {
            background: var(--white);
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-md);
            padding: 2rem;
            margin-top: 2rem;
        }

        .form-label {
            font-weight: 600;
            color: var(--gray-600);
            margin-bottom: 0.5rem;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid var(--gray-200);
            padding: 0.75rem 1rem;
        }

        .btn-submit {
            background: var(--primary-dark);
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-submit:hover {
            background: #05503e;
            transform: translateY(-2px);
        }

        .preview-image {
            max-width: 150px;
            margin-top: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="admin-card">
                <h2 class="mb-4" style="color: var(--primary-dark); font-weight: 700;">
                    <i class="fas fa-user-tie me-2"></i> Mot du Ministre
                </h2>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('admin.minister-infos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nom du Ministre (FR)</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $ministerInfo->name ?? '') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fonction / Titre (FR)</label>
                            <input type="text" name="function" class="form-control"
                                value="{{ old('function', $ministerInfo->function ?? '') }}" required
                                placeholder="Ex: Ministre du Commerce...">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nom du Ministre (EN)</label>
                            <input type="text" name="name_en" class="form-control"
                                value="{{ old('name_en', $ministerInfo->name_en ?? '') }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fonction / Titre (EN)</label>
                            <input type="text" name="function_en" class="form-control"
                                value="{{ old('function_en', $ministerInfo->function_en ?? '') }}"
                                placeholder="Ex: Minister of Trade...">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Photo du Ministre</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                            @if(isset($ministerInfo->image))
                                <img src="{{ asset('storage/' . $ministerInfo->image) }}" class="preview-image" alt="Aperçu">
                            @endif
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Signature (Optionnel)</label>
                            <input type="file" name="signature" class="form-control" accept="image/*">
                            @if(isset($ministerInfo->signature))
                                <img src="{{ asset('storage/' . $ministerInfo->signature) }}" class="preview-image"
                                    alt="Signature">
                            @endif
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Message / Mot de bienvenue (FR)</label>
                        <textarea name="message" class="form-control" rows="6"
                            required>{{ old('message', $ministerInfo->message ?? '') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Message / Mot de bienvenue (EN)</label>
                        <textarea name="message_en" class="form-control"
                            rows="6">{{ old('message_en', $ministerInfo->message_en ?? '') }}</textarea>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn-submit">
                            <i class="fas fa-save me-2"></i> Enregistrer les modifications
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection