@extends('admin.layouts.template')
@section('content')
    <style>
        :root {
            --primary-dark: #06634e;
            --primary-light: #0a7a62;
            --secondary: #78ac11;
            --secondary-light: #8bc31f;
            --white: #ffffff;
            --light-bg: #f9fafb;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-300: #cbd5e1;
            --gray-400: #94a3b8;
            --gray-500: #64748b;
            --gray-600: #475569;
            --gray-700: #334155;
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.12);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 25px -5px rgba(6, 99, 78, 0.1);
            --shadow-xl: 0 20px 40px -10px rgba(6, 99, 78, 0.15);
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 24px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .team-form-container {
            min-height: calc(100vh - 80px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            background: linear-gradient(135deg, #f9fafb 0%, #f0fdf4 100%);
            position: relative;
            overflow: hidden;
        }

        .team-form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-dark), var(--secondary));
        }

        .team-form-wrapper {
            width: 80%;
            margin: 0 auto;
            position: relative;
        }

        /* En-tête */
        .team-form-header {
            text-align: center;
            margin-bottom: 2.5rem;
            position: relative;
        }

        .team-form-header-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            box-shadow: var(--shadow-lg);
        }

        .team-form-header-icon::after {
            content: '';
            position: absolute;
            inset: -4px;
            background: linear-gradient(135deg, var(--primary-dark), var(--secondary));
            border-radius: 50%;
            z-index: -1;
            opacity: 0.3;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 0.3;
            }

            50% {
                transform: scale(1.05);
                opacity: 0.5;
            }
        }

        .team-form-header-icon i {
            font-size: 2rem;
            color: var(--white);
        }

        .team-form-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, var(--primary-dark), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .team-form-subtitle {
            color: var(--gray-600);
            font-size: 1rem;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Carte principale */
        .team-form-card {
            background: var(--white);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-xl);
            padding: 2.5rem;
            position: relative;
            overflow: hidden;
        }

        .team-form-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--primary-dark), var(--secondary));
            border-radius: var(--radius-xl) var(--radius-xl) 0 0;
        }

        /* Grille à deux colonnes */
        .team-form-grid {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 2.5rem;
            align-items: start;
        }

        @media (max-width: 768px) {
            .team-form-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }

        /* Colonne de gauche - Photo */
        .team-photo-section {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .photo-upload-area {
            border: 2px dashed var(--gray-300);
            border-radius: var(--radius-lg);
            padding: 2rem;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
            background: var(--gray-50);
            position: relative;
            overflow: hidden;
            min-height: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .photo-upload-area:hover {
            border-color: var(--primary-dark);
            background: var(--white);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .photo-upload-area.dragover {
            border-color: var(--secondary);
            background: rgba(120, 172, 17, 0.05);
        }

        .photo-preview-container {
            width: 100%;
            height: 250px;
            border-radius: var(--radius-md);
            overflow: hidden;
            margin-bottom: 1rem;
            position: relative;
            box-shadow: var(--shadow-md);
            transition: var(--transition);
        }

        .photo-preview-container:hover {
            transform: scale(1.02);
            box-shadow: var(--shadow-lg);
        }

        .photo-preview-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .photo-placeholder {
            width: 100%;
            height: 250px;
            background: linear-gradient(135deg, var(--gray-100), var(--gray-200));
            border-radius: var(--radius-md);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: var(--gray-500);
        }

        .photo-placeholder i {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .photo-upload-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            color: var(--white);
            border: none;
            border-radius: var(--radius-md);
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            margin-top: 1rem;
        }

        .photo-upload-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .photo-input {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            cursor: pointer;
        }

        .photo-info {
            text-align: center;
            color: var(--gray-500);
            font-size: 0.9rem;
            line-height: 1.5;
        }

        /* Colonne de droite - Formulaire */
        .team-form-section {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .form-section {
            background: var(--gray-50);
            border-radius: var(--radius-lg);
            padding: 1.75rem;
            border: 1px solid var(--gray-200);
            transition: var(--transition);
        }

        .form-section:hover {
            border-color: var(--primary-dark);
            box-shadow: var(--shadow-sm);
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
            color: var(--primary-dark);
            font-size: 1.1rem;
            font-weight: 600;
        }

        .section-header i {
            color: var(--secondary);
            font-size: 1.25rem;
        }

        /* Groupes de formulaire */
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.75rem;
            font-weight: 600;
            color: var(--gray-700);
            font-size: 0.95rem;
        }

        .form-label i {
            color: var(--primary-dark);
            font-size: 0.9rem;
        }

        .form-label .required {
            color: #ef4444;
            margin-left: 4px;
            font-weight: 700;
        }

        .form-hint {
            display: block;
            font-size: 0.85rem;
            color: var(--gray-500);
            margin-top: 0.5rem;
            line-height: 1.4;
        }

        .input-wrapper {
            position: relative;
        }

        .form-control {
            width: 95%;
            padding: 1rem;
            font-size: 1rem;
            border: 2px solid var(--gray-200);
            border-radius: var(--radius-md);
            background: var(--white);
            transition: var(--transition);
            color: var(--gray-800);
            line-height: 1.5;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-dark);
            box-shadow: 0 0 0 4px rgba(6, 99, 78, 0.1);
            background: var(--white);
        }

        .form-control:hover {
            border-color: var(--gray-300);
        }

        .form-control::placeholder {
            color: var(--gray-400);
        }

        .form-control.is-invalid {
            border-color: #ef4444;
            background-color: #fef2f2;
        }

        .form-control.is-invalid:focus {
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1);
        }

        .input-icon {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
            pointer-events: none;
        }

        .form-control:focus+.input-icon {
            color: var(--primary-dark);
        }

        .error-message {
            display: block;
            margin-top: 0.5rem;
            font-size: 0.85rem;
            color: #ef4444;
            padding-left: 0.75rem;
            border-left: 3px solid #ef4444;
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Grille des champs */
        .form-fields-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
        }

        @media (max-width: 640px) {
            .form-fields-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Toggle switch */
        .toggle-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem;
            background: var(--white);
            border-radius: var(--radius-md);
            border: 2px solid var(--gray-200);
            transition: var(--transition);
            margin-top: 1rem;
        }

        .toggle-wrapper:hover {
            border-color: var(--primary-dark);
        }

        .toggle-label {
            font-weight: 500;
            color: var(--gray-700);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .toggle-switch {
            position: relative;
            width: 52px;
            height: 28px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: var(--gray-300);
            transition: var(--transition);
            border-radius: 34px;
        }

        .toggle-slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 4px;
            bottom: 4px;
            background: var(--white);
            transition: var(--transition);
            border-radius: 50%;
        }

        input:checked+.toggle-slider {
            background: linear-gradient(135deg, var(--secondary), var(--secondary-light));
        }

        input:checked+.toggle-slider:before {
            transform: translateX(24px);
        }

        /* Boutons d'action */
        .form-actions {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid var(--gray-200);
        }

        .btn {
            padding: 1rem 2.5rem;
            border-radius: var(--radius-md);
            font-weight: 600;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            transition: var(--transition);
            cursor: pointer;
            border: none;
            min-width: 160px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            color: var(--white);
            box-shadow: 0 4px 15px rgba(6, 99, 78, 0.2);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(6, 99, 78, 0.3);
            background: linear-gradient(135deg, var(--primary-light), var(--primary-dark));
        }

        .btn-secondary {
            background: var(--white);
            color: var(--gray-700);
            border: 2px solid var(--gray-300);
        }

        .btn-secondary:hover {
            border-color: var(--primary-dark);
            color: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        .btn-icon {
            font-size: 1.1rem;
        }

        /* Pied de page */
        .form-footer {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--gray-200);
            color: var(--gray-500);
            font-size: 0.9rem;
        }

        .form-footer a {
            color: var(--primary-dark);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .form-footer a:hover {
            color: var(--secondary);
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .team-form-card {
                padding: 1.5rem;
            }

            .team-form-title {
                font-size: 1.75rem;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                min-width: auto;
            }

            .photo-upload-area {
                padding: 1.5rem;
                min-height: 250px;
            }
        }

        @media (max-width: 480px) {
            .team-form-card {
                padding: 1.25rem;
            }

            .team-form-header-icon {
                width: 60px;
                height: 60px;
            }

            .team-form-header-icon i {
                font-size: 1.5rem;
            }

            .team-form-title {
                font-size: 1.5rem;
            }

            .form-section {
                padding: 1.25rem;
            }
        }
    </style>

    <div class="team-form-container">
        <div class="team-form-wrapper">
            <!-- En-tête -->
            <div class="team-form-header">
                <div class="team-form-header-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h1 class="team-form-title">
                    {{ isset($teamMember) ? 'Modifier le Membre' : 'Nouveau Membre' }}
                </h1>
                <p class="team-form-subtitle">
                    {{ isset($teamMember) ? 'Modifiez les informations du membre de l\'équipe' : 'Ajoutez un nouveau membre à votre équipe' }}
                </p>
            </div>

            <!-- Formulaire principal -->
            <form action="{{ isset($teamMember) ? route('admin.team.update', $teamMember) : route('admin.team.store') }}"
                method="POST" enctype="multipart/form-data" id="teamMemberForm" class="team-form-card">
                @csrf
                @if (isset($teamMember))
                    @method('PUT')
                @endif

                <div class="team-form-grid">
                    <!-- Colonne gauche : Photo -->
                    <div class="team-photo-section">
                        <div class="photo-upload-area" id="photoUploadArea">
                            <div class="photo-preview-container" id="photoPreviewContainer">
                                @if (isset($teamMember) && $teamMember->image)
                                    <img src="{{ asset('storage/' . $teamMember->image) }}" alt="Photo actuelle"
                                        id="currentPhoto">
                                @else
                                    <div class="photo-placeholder" id="photoPlaceholder">
                                        <i class="fas fa-user"></i>
                                        <span>Aucune photo sélectionnée</span>
                                    </div>
                                @endif
                            </div>

                            <button type="button" class="photo-upload-btn"
                                onclick="document.getElementById('photoInput').click()">
                                <i class="fas fa-camera"></i>
                                {{ isset($teamMember) ? 'Changer la photo' : 'Choisir une photo' }}
                            </button>

                            <input type="file" class="photo-input" id="photoInput" name="image" accept="image/*"
                                {{ !isset($teamMember) ? 'required' : '' }}>
                        </div>

                        <div class="photo-info">
                            <p><strong>Recommandations :</strong></p>
                            <p>• Taille idéale : 400x400px</p>
                            <p>• Formats : JPG, PNG, WEBP</p>
                            <p>• Taille max : 2MB</p>
                        </div>
                    </div>

                    <!-- Colonne droite : Formulaire -->
                    <div class="team-form-section">
                        <!-- Section 1 : Informations personnelles -->
                        <div class="form-section">
                            <div class="section-header">
                                <i class="fas fa-id-card"></i>
                                Informations personnelles
                            </div>

                            <div class="form-fields-grid">
                                <div class="form-group">
                                    <label class="form-label" for="name">
                                        <i class="fas fa-user"></i>
                                        Nom & Prénom
                                        <span class="required">*</span>
                                    </label>
                                    <div class="input-wrapper">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name', $teamMember->name ?? '') }}"
                                            required placeholder="Ex: Jean Dupont">
                                        <span class="input-icon">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </div>
                                    @error('name')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="position">
                                        <i class="fas fa-briefcase"></i>
                                        Poste (FR)
                                        <span class="required">*</span>
                                    </label>
                                    <div class="input-wrapper">
                                        <input type="text" class="form-control @error('position') is-invalid @enderror"
                                            id="position" name="position"
                                            value="{{ old('position', $teamMember->position ?? '') }}" required
                                            placeholder="Ex: Directeur Marketing">
                                        <span class="input-icon">
                                            <i class="fas fa-briefcase"></i>
                                        </span>
                                    </div>
                                    @error('position')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="position_en">
                                        <i class="fas fa-briefcase"></i>
                                        Poste (EN)
                                    </label>
                                    <div class="input-wrapper">
                                        <input type="text" class="form-control @error('position_en') is-invalid @enderror"
                                            id="position_en" name="position_en"
                                            value="{{ old('position_en', $teamMember->position_en ?? '') }}"
                                            placeholder="Ex: Marketing Director">
                                        <span class="input-icon">
                                            <i class="fas fa-briefcase"></i>
                                        </span>
                                    </div>
                                    @error('position_en')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="linkedin_url">
                                        <i class="fab fa-linkedin"></i>
                                        Lien LinkedIn
                                    </label>
                                    <div class="input-wrapper">
                                        <input type="url"
                                            class="form-control @error('linkedin_url') is-invalid @enderror"
                                            id="linkedin_url" name="linkedin_url"
                                            value="{{ old('linkedin_url', $teamMember->linkedin_url ?? '') }}"
                                            placeholder="https://linkedin.com/in/username">
                                        <span class="input-icon">
                                            <i class="fab fa-linkedin"></i>
                                        </span>
                                    </div>
                                    <div class="form-hint">Lien vers le profil LinkedIn (optionnel)</div>
                                    @error('linkedin_url')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Section 2 : Paramètres -->
                            <div class="form-section">
                                <div class="section-header">
                                    <i class="fas fa-cog"></i>
                                    Paramètres d'affichage
                                </div>

                                <div class="form-fields-grid">
                                    <div class="form-group">
                                        <label class="form-label" for="sort_order">
                                            <i class="fas fa-sort-numeric-down"></i>
                                            Ordre d'affichage
                                            <span class="required">*</span>
                                        </label>
                                        <div class="input-wrapper">
                                            <input type="number" class="form-control @error('sort_order') is-invalid @enderror"
                                                id="sort_order" name="sort_order"
                                                value="{{ old('sort_order', $teamMember->sort_order ?? 0) }}" required min="0"
                                                placeholder="0">
                                            <span class="input-icon">
                                                <i class="fas fa-sort-numeric-down"></i>
                                            </span>
                                        </div>
                                        <div class="form-hint">Détermine la position dans la liste des membres</div>
                                        @error('sort_order')
                                            <span class="error-message">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="image_alt">
                                            <i class="fas fa-search"></i>
                                            Texte alternatif
                                        </label>
                                        <div class="input-wrapper">
                                            <input type="text" class="form-control" id="image_alt" name="image_alt"
                                                value="{{ old('image_alt', $teamMember->image_alt ?? '') }}"
                                                placeholder="Ex: Jean Dupont - Directeur Marketing">
                                            <span class="input-icon">
                                                <i class="fas fa-search"></i>
                                            </span>
                                        </div>
                                        <div class="form-hint">Pour l'accessibilité et le référencement (SEO)</div>
                                    </div>

                                    <div class="toggle-wrapper">
                                        <label class="toggle-label" for="is_active">
                                            <i class="fas fa-eye"></i>
                                            Afficher ce membre sur le site
                                        </label>
                                        <label class="toggle-switch">
                                            <input type="checkbox" id="is_active" name="is_active" value="1"
                                                {{ old('is_active', $teamMember->is_active ?? true) ? 'checked' : '' }}>
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </div>

                                    <div class="toggle-wrapper">
                                        <label class="toggle-label" for="is_president">
                                            <i class="fas fa-crown"></i>
                                            Est le Président (Message activé)
                                        </label>
                                        <label class="toggle-switch">
                                            <input type="checkbox" id="is_president" name="is_president" value="1"
                                                {{ old('is_president', $teamMember->is_president ?? false) ? 'checked' : '' }}>
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-section">
                                <div class="section-header">
                                    <i class="fas fa-align-left"></i>
                                    Biographie & Message
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="bio">
                                        <i class="fas fa-quote-left"></i>
                                        Biographie / Message (FR)
                                    </label>
                                    <textarea class="form-control @error('bio') is-invalid @enderror" 
                                        id="bio" name="bio" rows="6" 
                                        placeholder="Saisissez la biographie ou le message ici...">{{ old('bio', $teamMember->bio ?? '') }}</textarea>
                                    <div class="form-hint">Ce texte sera affiché dans le modal de message du président.</div>
                                    @error('bio')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="bio_en">
                                        <i class="fas fa-quote-left"></i>
                                        Biographie / Message (EN)
                                    </label>
                                    <textarea class="form-control @error('bio_en') is-invalid @enderror" 
                                        id="bio_en" name="bio_en" rows="6" 
                                        placeholder="Enter the biography or message here...">{{ old('bio_en', $teamMember->bio_en ?? '') }}</textarea>
                                    <div class="form-hint">This text will be displayed in the president's message modal.</div>
                                    @error('bio_en')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="form-actions">
                            <a href="{{ route('admin.team.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left btn-icon"></i>
                                Retour à la liste
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-{{ isset($teamMember) ? 'sync-alt' : 'plus' }} btn-icon"></i>
                                {{ isset($teamMember) ? 'Mettre à jour' : 'Créer le membre' }}
                            </button>
                        </div>

                        <div class="form-footer">
                            <p>
                                Les champs marqués d'un <span class="required">*</span> sont obligatoires.
                                <a href="{{ route('admin.team.index') }}">Voir tous les membres</a>
                            </p>
                        </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('teamMemberForm');
            const photoUploadArea = document.getElementById('photoUploadArea');
            const photoInput = document.getElementById('photoInput');
            const photoPreviewContainer = document.getElementById('photoPreviewContainer');
            const photoPlaceholder = document.getElementById('photoPlaceholder');
            const currentPhoto = document.getElementById('currentPhoto');
            const isActiveToggle = document.getElementById('is_active');

            // Drag and drop pour la photo
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                photoUploadArea.addEventListener(eventName, preventDefaults, false);
            });

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            ['dragenter', 'dragover'].forEach(eventName => {
                photoUploadArea.addEventListener(eventName, highlight, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                photoUploadArea.addEventListener(eventName, unhighlight, false);
            });

            function highlight() {
                photoUploadArea.classList.add('dragover');
            }

            function unhighlight() {
                photoUploadArea.classList.remove('dragover');
            }

            photoUploadArea.addEventListener('drop', handleDrop, false);

            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                photoInput.files = files;
                handlePhotoSelect(files[0]);
            }

            // Gestion de la sélection de photo
            photoInput.addEventListener('change', function(e) {
                if (this.files && this.files[0]) {
                    handlePhotoSelect(this.files[0]);
                }
            });

            function handlePhotoSelect(file) {
                if (!file.type.match('image.*')) {
                    showError('Veuillez sélectionner une image valide');
                    return;
                }

                if (file.size > 2 * 1024 * 1024) { // 2MB
                    showError('La taille de l\'image ne doit pas dépasser 2MB');
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    // Créer une nouvelle image pour la prévisualisation
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.width = '100%';
                    img.style.height = '100%';
                    img.style.objectFit = 'cover';

                    // Mettre à jour le conteneur de prévisualisation
                    photoPreviewContainer.innerHTML = '';
                    photoPreviewContainer.appendChild(img);

                    // Cacher le placeholder s'il existe
                    if (photoPlaceholder) {
                        photoPlaceholder.style.display = 'none';
                    }

                    // Supprimer l'image actuelle si elle existe
                    if (currentPhoto) {
                        currentPhoto.style.display = 'none';
                    }
                };
                reader.readAsDataURL(file);
            }

            function showError(message) {
                // Créer un message d'erreur
                const errorDiv = document.createElement('div');
                errorDiv.className = 'error-message';
                errorDiv.style.textAlign = 'center';
                errorDiv.style.padding = '1rem';
                errorDiv.style.color = '#ef4444';
                errorDiv.style.border = '2px dashed #ef4444';
                errorDiv.style.borderRadius = 'var(--radius-md)';
                errorDiv.innerHTML = `<i class="fas fa-exclamation-triangle"></i><br>${message}`;

                // Ajouter le message d'erreur
                photoPreviewContainer.innerHTML = '';
                photoPreviewContainer.appendChild(errorDiv);

                // Réafficher le placeholder après 3 secondes
                setTimeout(() => {
                    if (photoPlaceholder) {
                        photoPlaceholder.style.display = 'flex';
                        photoPreviewContainer.innerHTML = '';
                        photoPreviewContainer.appendChild(photoPlaceholder);
                    }
                }, 3000);
            }

            // Animation sur le changement de statut
            if (isActiveToggle) {
                const toggleWrapper = isActiveToggle.closest('.toggle-wrapper');
                isActiveToggle.addEventListener('change', function() {
                    if (this.checked) {
                        toggleWrapper.style.borderColor = 'var(--secondary)';
                        toggleWrapper.style.backgroundColor = 'rgba(120, 172, 17, 0.05)';
                    } else {
                        toggleWrapper.style.borderColor = 'var(--gray-200)';
                        toggleWrapper.style.backgroundColor = 'var(--white)';
                    }
                });
            }

            // Validation en temps réel
            const requiredFields = ['name', 'position', 'sort_order'];

            requiredFields.forEach(fieldName => {
                const field = document.getElementById(fieldName);
                if (field) {
                    field.addEventListener('blur', function() {
                        validateField(this);
                    });
                }
            });

            function validateField(field) {
                const value = field.value.trim();
                const formGroup = field.closest('.form-group');
                let errorSpan = formGroup?.querySelector('.error-message');

                if (field.required && value === '') {
                    field.classList.add('is-invalid');
                    if (!errorSpan) {
                        errorSpan = document.createElement('span');
                        errorSpan.className = 'error-message';
                        errorSpan.textContent = 'Ce champ est obligatoire';
                        formGroup.appendChild(errorSpan);
                    }
                    return false;
                } else if (field.type === 'url' && value !== '' && !isValidUrl(value)) {
                    field.classList.add('is-invalid');
                    if (!errorSpan) {
                        errorSpan = document.createElement('span');
                        errorSpan.className = 'error-message';
                        errorSpan.textContent = 'Veuillez entrer une URL valide';
                        formGroup.appendChild(errorSpan);
                    }
                    return false;
                } else {
                    field.classList.remove('is-invalid');
                    if (errorSpan) {
                        errorSpan.remove();
                    }
                    return true;
                }
            }

            function isValidUrl(string) {
                try {
                    new URL(string);
                    return true;
                } catch (_) {
                    return false;
                }
            }

            // Validation du formulaire
            if (form) {
                form.addEventListener('submit', function(e) {
                    let isValid = true;

                    requiredFields.forEach(fieldName => {
                        const field = document.getElementById(fieldName);
                        if (field && !validateField(field)) {
                            isValid = false;
                        }
                    });

                    // Validation de la photo pour la création
                    if (!{{ isset($teamMember) ? 'true' : 'false' }} && !photoInput.files[0]) {
                        isValid = false;
                        photoUploadArea.style.borderColor = '#ef4444';
                        photoUploadArea.style.backgroundColor = '#fef2f2';

                        let errorSpan = photoUploadArea.querySelector('.error-message');
                        if (!errorSpan) {
                            errorSpan = document.createElement('span');
                            errorSpan.className = 'error-message';
                            errorSpan.textContent = 'Une photo est requise pour créer un nouveau membre';
                            photoUploadArea.appendChild(errorSpan);
                        }
                    }

                    if (!isValid) {
                        e.preventDefault();
                        // Faire défiler jusqu'à la première erreur
                        const firstError = form.querySelector('.is-invalid, .photo-upload-area');
                        if (firstError) {
                            firstError.scrollIntoView({
                                behavior: 'smooth',
                                block: 'center'
                            });
                            if (firstError.tagName === 'INPUT') {
                                firstError.focus();
                            }
                        }
                    }
                });
            }

            // Animation sur le focus des champs
            const formControls = form.querySelectorAll('.form-control');
            formControls.forEach(control => {
                control.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'translateY(-2px)';
                });

                control.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
@endsection
