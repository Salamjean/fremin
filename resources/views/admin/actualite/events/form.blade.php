@extends('admin.layouts.template')
@section('content')
    <style>
        :root {
            --primary-dark: #06634e;
            --primary-light: #0a7a62;
            --secondary: #78ac11;
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
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.12);
            --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.1);
            --shadow-lg: 0 10px 25px -5px rgba(6, 99, 78, 0.1);
            --shadow-xl: 0 20px 40px -10px rgba(6, 99, 78, 0.15);
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 24px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .event-form-container {
            min-height: calc(100vh - 80px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            background: linear-gradient(135deg, #f9fafb 0%, #f0fdf4 100%);
            position: relative;
            overflow: hidden;
        }

        .event-form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-dark), var(--secondary));
        }

        .event-form-wrapper {
            width: 70%;
            margin: 0 auto;
            position: relative;
        }

        /* En-tête */
        .event-form-header {
            text-align: center;
            margin-bottom: 2.5rem;
            position: relative;
        }

        .event-form-header-icon {
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

        .event-form-header-icon i {
            font-size: 2rem;
            color: var(--white);
        }

        .event-form-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, var(--primary-dark), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .event-form-subtitle {
            color: var(--gray-600);
            font-size: 1rem;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Carte principale */
        .event-form-card {
            background: var(--white);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-xl);
            padding: 2.5rem;
            position: relative;
            overflow: hidden;
        }

        .event-form-card::before {
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
        .event-form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2.5rem;
        }

        @media (max-width: 1024px) {
            .event-form-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }

        /* Colonnes */
        .event-form-left,
        .event-form-right {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        /* Sections du formulaire */
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
            border: 2px solid var(--gray-300);
            border-radius: var(--radius-md);
            background: var(--white);
            transition: var(--transition);
            color: var(--gray-700);
            line-height: 1.5;
            font-family: inherit;
        }

        .form-textarea {
            width: 95%;
            min-height: 120px;
            padding: 1rem;
            font-size: 1rem;
            border: 2px solid var(--gray-300);
            border-radius: var(--radius-md);
            background: var(--white);
            transition: var(--transition);
            color: var(--gray-700);
            line-height: 1.5;
            font-family: inherit;
            resize: vertical;
        }

        .form-control:focus,
        .form-textarea:focus {
            outline: none;
            border-color: var(--primary-dark);
            box-shadow: 0 0 0 4px rgba(6, 99, 78, 0.1);
        }

        .form-control:hover,
        .form-textarea:hover {
            border-color: var(--gray-400);
        }

        .form-control::placeholder,
        .form-textarea::placeholder {
            color: var(--gray-400);
        }

        .form-control.is-invalid,
        .form-textarea.is-invalid {
            border-color: #ef4444;
            background-color: #fef2f2;
        }

        .form-control.is-invalid:focus,
        .form-textarea.is-invalid:focus {
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1);
        }

        .error-message {
            display: block;
            margin-top: 0.5rem;
            font-size: 0.85rem;
            color: #ef4444;
            padding-left: 0.75rem;
            border-left: 3px solid #ef4444;
        }

        /* Grille des champs de date/heure */
        .datetime-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        @media (max-width: 640px) {
            .datetime-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Sélecteur de type de localisation */
        .location-type-selector {
            display: flex;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        .location-type-btn {
            flex: 1;
            padding: 0.75rem 1rem;
            border: 2px solid var(--gray-300);
            border-radius: var(--radius-md);
            background: var(--white);
            color: var(--gray-600);
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .location-type-btn:hover {
            border-color: var(--primary-dark);
            color: var(--primary-dark);
        }

        .location-type-btn.active {
            border-color: var(--primary-dark);
            background: var(--primary-dark);
            color: var(--white);
        }

        /* Sélecteur de style de bouton */
        .button-style-selector {
            display: flex;
            gap: 0.5rem;
            margin-top: 0.5rem;
            flex-wrap: wrap;
        }

        .button-style-btn {
            padding: 0.75rem 1.5rem;
            border: 2px solid var(--gray-300);
            border-radius: var(--radius-md);
            background: var(--white);
            color: var(--gray-600);
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            text-align: center;
            min-width: 120px;
        }

        .button-style-btn:hover {
            border-color: var(--primary-dark);
            color: var(--primary-dark);
        }

        .button-style-btn.active {
            border-color: var(--primary-dark);
            background: var(--primary-dark);
            color: var(--white);
        }

        .button-style-btn.btn-primary-style {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            color: var(--white);
        }

        .button-style-btn.btn-outline-primary-style {
            background: transparent;
            color: var(--primary-dark);
            border: 2px solid var(--primary-dark);
        }

        /* Toggle switches */
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

        input:checked + .toggle-slider {
            background: linear-gradient(135deg, var(--secondary), var(--secondary-light));
        }

        input:checked + .toggle-slider:before {
            transform: translateX(24px);
        }

        /* Aperçu en temps réel */
        .preview-section {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 1.75rem;
            border: 2px solid var(--gray-200);
        }

        .preview-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--primary-dark);
            margin-bottom: 1rem;
            text-align: center;
        }

        .preview-card {
            border: 2px solid var(--gray-200);
            border-radius: var(--radius-md);
            overflow: hidden;
            transition: var(--transition);
        }

        .preview-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
        }

        .preview-header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            padding: 1.5rem;
            color: var(--white);
            text-align: center;
            min-height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .preview-date-card {
            background: rgba(255, 255, 255, 0.1);
            padding: 1rem;
            border-radius: var(--radius-md);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            min-width: 100px;
        }

        .preview-month {
            font-size: 0.9rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 0.25rem;
        }

        .preview-day {
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1;
            margin-bottom: 0.25rem;
        }

        .preview-year {
            font-size: 0.9rem;
            font-weight: 500;
            opacity: 0.9;
        }

        .preview-content {
            padding: 1.5rem;
        }

        .preview-event-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 0.75rem;
            text-align: center;
        }

        .preview-info {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .preview-info-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--gray-600);
            font-size: 0.9rem;
        }

        .preview-info-item i {
            color: var(--secondary);
            min-width: 16px;
        }

        .preview-description {
            color: var(--gray-600);
            font-size: 0.85rem;
            line-height: 1.5;
            margin-bottom: 1rem;
            text-align: center;
        }

        .preview-button {
            display: block;
            width: 100%;
            padding: 0.75rem;
            border-radius: var(--radius-sm);
            font-weight: 500;
            text-align: center;
            text-decoration: none;
            transition: var(--transition);
            border: none;
            cursor: default;
        }

        /* Boutons d'action */
        .form-actions {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid var(--gray-200);
            grid-column: 1 / -1;
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
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
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
            grid-column: 1 / -1;
        }

        .form-footer a {
            color: var(--primary-dark);
            text-decoration: none;
            font-weight: 500;
        }

        .form-footer a:hover {
            color: var(--secondary);
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .event-form-card {
                padding: 1.5rem;
            }

            .event-form-title {
                font-size: 1.75rem;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                min-width: auto;
            }

            .form-section {
                padding: 1.25rem;
            }
        }

        @media (max-width: 480px) {
            .event-form-card {
                padding: 1.25rem;
            }

            .event-form-header-icon {
                width: 60px;
                height: 60px;
            }

            .event-form-header-icon i {
                font-size: 1.5rem;
            }

            .event-form-title {
                font-size: 1.5rem;
            }
        }
    </style>

    <div class="event-form-container">
        <div class="event-form-wrapper">
            <!-- En-tête -->
            <div class="event-form-header">
                <div class="event-form-header-icon">
                    <i class="fas fa-calendar-plus"></i>
                </div>
                <h1 class="event-form-title">
                    {{ isset($event) ? 'Modifier l\'Événement' : 'Nouvel Événement' }}
                </h1>
                <p class="event-form-subtitle">
                    {{ isset($event) ? 'Modifiez les détails de votre événement' : 'Créez un nouvel événement à afficher sur votre site' }}
                </p>
            </div>

            <!-- Formulaire principal -->
            <form action="{{ isset($event) ? route('admin.events.update', $event) : route('admin.events.store') }}"
                method="POST" enctype="multipart/form-data" id="eventForm" class="event-form-card">
                @csrf
                @if (isset($event))
                    @method('PUT')
                @endif

                <div class="event-form-grid">
                    <!-- Colonne gauche : Informations principales -->
                    <div class="event-form-left">
                        <!-- Section 1 : Titre et description -->
                        <div class="form-section">
                            <div class="section-header">
                                <i class="fas fa-heading"></i>
                                Informations de base
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="title">
                                    <i class="fas fa-font"></i>
                                    Titre de l'événement
                                    <span class="required">*</span>
                                </label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title"
                                    value="{{ old('title', $event->title ?? '') }}" required
                                    placeholder="Ex: Forum Innovation Industrielle">
                                <div class="form-hint">Titre principal de l'événement (255 caractères max)</div>
                                @error('title')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="description">
                                    <i class="fas fa-align-left"></i>
                                    Description
                                </label>
                                <textarea class="form-textarea @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="3" placeholder="Description détaillée de l'événement">{{ old('description', $event->description ?? '') }}</textarea>
                                <div class="form-hint">Description optionnelle (500 caractères max)</div>
                                @error('description')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Section 2 : Date et heure -->
                        <div class="form-section">
                            <div class="section-header">
                                <i class="far fa-clock"></i>
                                Date et heure
                            </div>

                            <div class="datetime-grid">
                                <div class="form-group">
                                    <label class="form-label" for="event_date">
                                        <i class="far fa-calendar"></i>
                                        Date
                                        <span class="required">*</span>
                                    </label>
                                    <input type="date" class="form-control @error('event_date') is-invalid @enderror"
                                        id="event_date" name="event_date"
                                        value="{{ old('event_date', isset($event) ? $event->event_date->format('Y-m-d') : '') }}" required>
                                    @error('event_date')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="start_time">
                                        <i class="far fa-clock"></i>
                                        Heure de début
                                        <span class="required">*</span>
                                    </label>
                                    <input type="time" class="form-control @error('start_time') is-invalid @enderror"
                                        id="start_time" name="start_time"
                                        value="{{ old('start_time', isset($event) ? $event->start_time->format('H:i') : '') }}" required>
                                    @error('start_time')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="end_time">
                                    <i class="far fa-clock"></i>
                                    Heure de fin
                                </label>
                                <input type="time" class="form-control @error('end_time') is-invalid @enderror"
                                    id="end_time" name="end_time"
                                    value="{{ old('end_time', isset($event) ? ($event->end_time ? $event->end_time->format('H:i') : '') : '') }}">
                                <div class="form-hint">Optionnel - laissez vide si non applicable</div>
                                @error('end_time')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Section 3 : Localisation -->
                        <div class="form-section">
                            <div class="section-header">
                                <i class="fas fa-map-marker-alt"></i>
                                Localisation
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="location_type">
                                    <i class="fas fa-location-dot"></i>
                                    Type de localisation
                                    <span class="required">*</span>
                                </label>
                                <div class="location-type-selector" id="locationTypeSelector">
                                    <button type="button" class="location-type-btn" data-value="in_person">
                                        <i class="fas fa-map-marker-alt"></i>
                                        En présentiel
                                    </button>
                                    <button type="button" class="location-type-btn" data-value="online">
                                        <i class="fas fa-video"></i>
                                        En ligne
                                    </button>
                                    <button type="button" class="location-type-btn" data-value="hybrid">
                                        <i class="fas fa-network-wired"></i>
                                        Hybride
                                    </button>
                                </div>
                                <input type="hidden" id="location_type" name="location_type"
                                    value="{{ old('location_type', $event->location_type ?? 'in_person') }}">
                                @error('location_type')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="location">
                                    <i class="fas fa-location-dot"></i>
                                    Lieu / Adresse
                                    <span class="required">*</span>
                                </label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror"
                                    id="location" name="location"
                                    value="{{ old('location', $event->location ?? '') }}" required
                                    placeholder="Ex: Hôtel Ivoire, Abidjan">
                                <div class="form-hint" id="locationHint">
                                    Lieu physique pour l'événement
                                </div>
                                @error('location')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Colonne droite : Configuration -->
                    <div class="event-form-right">
                        <!-- Section 4 : Bouton d'action -->
                        <div class="form-section">
                            <div class="section-header">
                                <i class="fas fa-hand-pointer"></i>
                                Bouton d'action
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="button_text">
                                    <i class="fas fa-font"></i>
                                    Texte du bouton
                                </label>
                                <input type="text" class="form-control @error('button_text') is-invalid @enderror"
                                    id="button_text" name="button_text"
                                    value="{{ old('button_text', $event->button_text ?? 'En savoir plus') }}"
                                    placeholder="Ex: En savoir plus">
                                <div class="form-hint">Texte affiché sur le bouton (50 caractères max)</div>
                                @error('button_text')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="button_link">
                                    <i class="fas fa-link"></i>
                                    Lien du bouton
                                </label>
                                <input type="url" class="form-control @error('button_link') is-invalid @enderror"
                                    id="button_link" name="button_link"
                                    value="{{ old('button_link', $event->button_link ?? '') }}"
                                    placeholder="Ex: https://exemple.com/inscription">
                                <div class="form-hint">URL vers la page d'inscription ou détails</div>
                                @error('button_link')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-palette"></i>
                                    Style du bouton
                                </label>
                                <div class="button-style-selector" id="buttonStyleSelector">
                                    <button type="button" class="button-style-btn btn-primary-style" data-value="btn-primary">
                                        Primaire
                                    </button>
                                    <button type="button" class="button-style-btn btn-outline-primary-style" data-value="btn-outline-primary">
                                        Contour
                                    </button>
                                </div>
                                <input type="hidden" id="button_class" name="button_class"
                                    value="{{ old('button_class', $event->button_class ?? 'btn-primary') }}">
                                @error('button_class')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Section 5 : Paramètres -->
                        <div class="form-section">
                            <div class="section-header">
                                <i class="fas fa-cog"></i>
                                Paramètres
                            </div>

                            <div class="toggle-wrapper">
                                <label class="toggle-label" for="is_active">
                                    <i class="fas fa-eye"></i>
                                    Activer l'événement
                                </label>
                                <label class="toggle-switch">
                                    <input type="checkbox" id="is_active" name="is_active" value="1"
                                        {{ old('is_active', $event->is_active ?? true) ? 'checked' : '' }}>
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>
                            <div class="form-hint">Si désactivé, l'événement ne sera pas affiché sur le site</div>

                            <div class="toggle-wrapper">
                                <label class="toggle-label" for="is_featured">
                                    <i class="fas fa-star"></i>
                                    Mettre en vedette
                                </label>
                                <label class="toggle-switch">
                                    <input type="checkbox" id="is_featured" name="is_featured" value="1"
                                        {{ old('is_featured', $event->is_featured ?? false) ? 'checked' : '' }}>
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>
                            <div class="form-hint">Les événements en vedette sont mis en avant</div>
                        </div>

                        <!-- Section 6 : Aperçu en temps réel -->
                        <div class="preview-section">
                            <h3 class="preview-title">Aperçu</h3>
                            <div class="preview-card">
                                <div class="preview-header">
                                    <div class="preview-date-card">
                                        <div class="preview-month" id="previewMonth">JANV</div>
                                        <div class="preview-day" id="previewDay">25</div>
                                        <div class="preview-year" id="previewYear">2024</div>
                                    </div>
                                </div>
                                <div class="preview-content">
                                    <h4 class="preview-event-title" id="previewTitle">Titre de l'événement</h4>
                                    <div class="preview-info">
                                        <div class="preview-info-item">
                                            <i class="fas fa-map-marker-alt" id="previewLocationIcon"></i>
                                            <span id="previewLocation">Lieu de l'événement</span>
                                        </div>
                                        <div class="preview-info-item">
                                            <i class="far fa-clock"></i>
                                            <span id="previewTime">Heure de l'événement</span>
                                        </div>
                                    </div>
                                    <p class="preview-description" id="previewDescription">
                                        Description de l'événement...
                                    </p>
                                    <button class="preview-button" id="previewButton" style="background: linear-gradient(135deg, var(--primary-dark), var(--primary-light)); color: white;">
                                        En savoir plus
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="form-actions">
                        <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left btn-icon"></i>
                            Retour à la liste
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-{{ isset($event) ? 'sync-alt' : 'plus' }} btn-icon"></i>
                            {{ isset($event) ? 'Mettre à jour' : 'Créer l\'événement' }}
                        </button>
                    </div>

                    <div class="form-footer">
                        <p>
                            Les champs marqués d'un <span class="required">*</span> sont obligatoires.
                            <a href="{{ route('admin.events.index') }}">Voir tous les événements</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Éléments du formulaire
            const form = document.getElementById('eventForm');
            const titleInput = document.getElementById('title');
            const descriptionInput = document.getElementById('description');
            const eventDateInput = document.getElementById('event_date');
            const startTimeInput = document.getElementById('start_time');
            const endTimeInput = document.getElementById('end_time');
            const locationInput = document.getElementById('location');
            const buttonTextInput = document.getElementById('button_text');
            const buttonLinkInput = document.getElementById('button_link');
            
            // Éléments de prévisualisation
            const previewTitle = document.getElementById('previewTitle');
            const previewDescription = document.getElementById('previewDescription');
            const previewMonth = document.getElementById('previewMonth');
            const previewDay = document.getElementById('previewDay');
            const previewYear = document.getElementById('previewYear');
            const previewLocation = document.getElementById('previewLocation');
            const previewLocationIcon = document.getElementById('previewLocationIcon');
            const previewTime = document.getElementById('previewTime');
            const previewButton = document.getElementById('previewButton');
            const locationHint = document.getElementById('locationHint');
            
            // Sélecteur de type de localisation
            const locationTypeSelector = document.getElementById('locationTypeSelector');
            const locationTypeInput = document.getElementById('location_type');
            const locationTypeButtons = locationTypeSelector.querySelectorAll('.location-type-btn');
            
            // Sélecteur de style de bouton
            const buttonStyleSelector = document.getElementById('buttonStyleSelector');
            const buttonClassInput = document.getElementById('button_class');
            const buttonStyleButtons = buttonStyleSelector.querySelectorAll('.button-style-btn');
            
            // Mois en français
            const frenchMonths = [
                'Janv', 'Fév', 'Mars', 'Avr', 'Mai', 'Juin',
                'Juil', 'Août', 'Sept', 'Oct', 'Nov', 'Déc'
            ];
            
            // Initialisation
            initializeForm();
            
            function initializeForm() {
                // Initialiser le type de localisation
                const currentLocationType = locationTypeInput.value;
                locationTypeButtons.forEach(btn => {
                    if (btn.dataset.value === currentLocationType) {
                        btn.classList.add('active');
                    }
                });
                updateLocationHint(currentLocationType);
                
                // Initialiser le style de bouton
                const currentButtonClass = buttonClassInput.value;
                buttonStyleButtons.forEach(btn => {
                    if (btn.dataset.value === currentButtonClass) {
                        btn.classList.add('active');
                        updatePreviewButtonStyle(currentButtonClass);
                    }
                });
                
                // Initialiser les valeurs de prévisualisation
                updatePreview();
                
                // Configurer les événements
                setupEventListeners();
            }
            
            function setupEventListeners() {
                // Mettre à jour la prévisualisation lors de la saisie
                [titleInput, descriptionInput, eventDateInput, startTimeInput, 
                 endTimeInput, locationInput, buttonTextInput, buttonLinkInput].forEach(input => {
                    input.addEventListener('input', updatePreview);
                });
                
                // Gérer le type de localisation
                locationTypeButtons.forEach(btn => {
                    btn.addEventListener('click', function() {
                        locationTypeButtons.forEach(b => b.classList.remove('active'));
                        this.classList.add('active');
                        locationTypeInput.value = this.dataset.value;
                        updateLocationHint(this.dataset.value);
                        updatePreview();
                    });
                });
                
                // Gérer le style de bouton
                buttonStyleButtons.forEach(btn => {
                    btn.addEventListener('click', function() {
                        buttonStyleButtons.forEach(b => b.classList.remove('active'));
                        this.classList.add('active');
                        buttonClassInput.value = this.dataset.value;
                        updatePreviewButtonStyle(this.dataset.value);
                    });
                });
                
                // Validation de la date
                eventDateInput.addEventListener('change', function() {
                    const selectedDate = new Date(this.value);
                    const today = new Date();
                    today.setHours(0, 0, 0, 0);
                    
                    if (selectedDate < today) {
                        showDateWarning();
                    }
                });
                
                // Validation de l'heure de fin
                endTimeInput.addEventListener('change', function() {
                    if (this.value && startTimeInput.value && this.value <= startTimeInput.value) {
                        showTimeError();
                    }
                });
            }
            
            function updatePreview() {
                // Titre
                previewTitle.textContent = titleInput.value || 'Titre de l\'événement';
                
                // Description
                previewDescription.textContent = descriptionInput.value 
                    ? (descriptionInput.value.length > 100 
                        ? descriptionInput.value.substring(0, 100) + '...'
                        : descriptionInput.value)
                    : 'Description de l\'événement...';
                
                // Date
                if (eventDateInput.value) {
                    const date = new Date(eventDateInput.value);
                    previewMonth.textContent = frenchMonths[date.getMonth()];
                    previewDay.textContent = date.getDate();
                    previewYear.textContent = date.getFullYear();
                }
                
                // Localisation
                const locationType = locationTypeInput.value;
                previewLocation.textContent = locationInput.value || 'Lieu de l\'événement';
                
                // Icône de localisation
                let locationIcon = 'fas fa-map-marker-alt';
                if (locationType === 'online') {
                    locationIcon = 'fas fa-video';
                } else if (locationType === 'hybrid') {
                    locationIcon = 'fas fa-network-wired';
                }
                previewLocationIcon.className = locationIcon;
                
                // Heure
                if (startTimeInput.value) {
                    let timeText = formatTime(startTimeInput.value);
                    if (endTimeInput.value) {
                        timeText += ` - ${formatTime(endTimeInput.value)}`;
                    }
                    previewTime.textContent = timeText;
                } else {
                    previewTime.textContent = 'Heure de l\'événement';
                }
                
                // Bouton
                previewButton.textContent = buttonTextInput.value || 'En savoir plus';
            }
            
            function updateLocationHint(locationType) {
                let hint = '';
                switch(locationType) {
                    case 'in_person':
                        hint = 'Lieu physique pour l\'événement';
                        break;
                    case 'online':
                        hint = 'Plateforme ou lien de connexion (ex: Zoom, Teams)';
                        break;
                    case 'hybrid':
                        hint = 'Lieu physique et informations de connexion en ligne';
                        break;
                }
                locationHint.textContent = hint;
                
                // Mettre à jour le placeholder
                let placeholder = '';
                switch(locationType) {
                    case 'in_person':
                        placeholder = 'Ex: Hôtel Ivoire, Abidjan';
                        break;
                    case 'online':
                        placeholder = 'Ex: Zoom Meeting (lien fourni après inscription)';
                        break;
                    case 'hybrid':
                        placeholder = 'Ex: Centre des Congrès + Zoom';
                        break;
                }
                locationInput.placeholder = placeholder;
            }
            
            function updatePreviewButtonStyle(buttonClass) {
                // Réinitialiser les styles
                previewButton.style.background = '';
                previewButton.style.color = '';
                previewButton.style.border = '';
                
                if (buttonClass === 'btn-primary') {
                    previewButton.style.background = 'linear-gradient(135deg, #06634e, #0a7a62)';
                    previewButton.style.color = 'white';
                } else if (buttonClass === 'btn-outline-primary') {
                    previewButton.style.background = 'transparent';
                    previewButton.style.color = '#06634e';
                    previewButton.style.border = '2px solid #06634e';
                }
            }
            
            function formatTime(timeString) {
                const [hours, minutes] = timeString.split(':');
                return `${hours}h${minutes}`;
            }
            
            function showDateWarning() {
                Swal.fire({
                    icon: 'warning',
                    title: 'Date passée',
                    text: 'Vous avez sélectionné une date dans le passé. Voulez-vous continuer ?',
                    showCancelButton: true,
                    confirmButtonText: 'Continuer',
                    cancelButtonText: 'Modifier',
                    customClass: {
                        popup: 'sweet-alert-popup',
                        confirmButton: 'sweet-alert-confirm',
                        cancelButton: 'sweet-alert-cancel'
                    }
                }).then((result) => {
                    if (!result.isConfirmed) {
                        eventDateInput.focus();
                    }
                });
            }
            
            function showTimeError() {
                Swal.fire({
                    icon: 'error',
                    title: 'Heure invalide',
                    text: 'L\'heure de fin doit être après l\'heure de début.',
                    confirmButtonText: 'Corriger',
                    customClass: {
                        popup: 'sweet-alert-popup',
                        confirmButton: 'sweet-alert-confirm'
                    }
                }).then(() => {
                    endTimeInput.focus();
                });
            }
            
            // Validation du formulaire
            if (form) {
                form.addEventListener('submit', function(e) {
                    let isValid = true;
                    const requiredFields = ['title', 'event_date', 'start_time', 'location'];
                    
                    requiredFields.forEach(fieldName => {
                        const field = document.getElementById(fieldName);
                        if (field && !field.value.trim()) {
                            isValid = false;
                            field.classList.add('is-invalid');
                            
                            let errorSpan = field.closest('.form-group')?.querySelector('.error-message');
                            if (!errorSpan) {
                                errorSpan = document.createElement('span');
                                errorSpan.className = 'error-message';
                                errorSpan.textContent = 'Ce champ est obligatoire';
                                field.closest('.form-group')?.appendChild(errorSpan);
                            }
                        }
                    });
                    
                    if (!isValid) {
                        e.preventDefault();
                        // Faire défiler jusqu'à la première erreur
                        const firstError = form.querySelector('.is-invalid');
                        if (firstError) {
                            firstError.scrollIntoView({
                                behavior: 'smooth',
                                block: 'center'
                            });
                            firstError.focus();
                        }
                        
                        Swal.fire({
                            icon: 'error',
                            title: 'Formulaire incomplet',
                            text: 'Veuillez remplir tous les champs obligatoires.',
                            confirmButtonText: 'Corriger',
                            customClass: {
                                popup: 'sweet-alert-popup',
                                confirmButton: 'sweet-alert-confirm'
                            }
                        });
                    }
                });
            }
            
            // Initialiser la date à aujourd'hui si vide
            if (!eventDateInput.value) {
                const today = new Date().toISOString().split('T')[0];
                eventDateInput.value = today;
                updatePreview();
            }
            
            // Initialiser l'heure de début à 9h00 si vide
            if (!startTimeInput.value) {
                startTimeInput.value = '09:00';
                updatePreview();
            }
        });
    </script>
@endsection