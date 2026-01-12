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

        .team-management {
            min-height: calc(100vh - 80px);
            padding: 2rem 1rem;
            background: linear-gradient(135deg, #f9fafb 0%, #f0fdf4 100%);
            position: relative;
        }

        .team-management::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-dark), var(--secondary));
        }

        .team-container {
            width: 1400px;
            margin: 0 auto;
            position: relative;
        }

        /* En-tête */
        .team-header {
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
        }

        .team-header-icon {
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

        .team-header-icon::after {
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

        .team-header-icon i {
            font-size: 2rem;
            color: var(--white);
        }

        .team-title {
            font-size: 2.25rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, var(--primary-dark), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .team-subtitle {
            color: var(--gray-600);
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Carte principale */
        .team-card {
            background: var(--white);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-xl);
            padding: 2.5rem;
            position: relative;
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .team-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--primary-dark), var(--secondary));
            border-radius: var(--radius-xl) var(--radius-xl) 0 0;
        }

        /* Barre d'actions */
        .team-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid var(--gray-100);
        }

        .stats-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--gray-50);
            padding: 0.75rem 1.5rem;
            border-radius: var(--radius-md);
            border: 1px solid var(--gray-200);
            color: var(--gray-700);
            font-weight: 500;
            transition: var(--transition);
        }

        .stats-badge:hover {
            background: var(--white);
            border-color: var(--primary-dark);
            box-shadow: var(--shadow-sm);
        }

        .stats-badge i {
            color: var(--secondary);
        }

        .btn-add-member {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem 2rem;
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            color: var(--white);
            border: none;
            border-radius: var(--radius-md);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
        }

        .btn-add-member:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(6, 99, 78, 0.3);
            background: linear-gradient(135deg, var(--primary-light), var(--primary-dark));
            color: var(--white);
        }

        .btn-add-member i {
            font-size: 1.1rem;
        }

        /* Filtres et recherche */
        .team-filters {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .filter-group {
            flex: 1;
            min-width: 200px;
        }

        .filter-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--gray-700);
            font-size: 0.9rem;
        }

        .filter-select {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid var(--gray-200);
            border-radius: var(--radius-md);
            background: var(--white);
            color: var(--gray-700);
            font-size: 0.95rem;
            transition: var(--transition);
            cursor: pointer;
        }

        .filter-select:focus {
            outline: none;
            border-color: var(--primary-dark);
            box-shadow: 0 0 0 3px rgba(6, 99, 78, 0.1);
        }

        .search-box {
            position: relative;
            flex: 2;
            min-width: 300px;
        }

        .search-input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 3rem;
            border: 2px solid var(--gray-200);
            border-radius: var(--radius-md);
            background: var(--white);
            color: var(--gray-700);
            font-size: 0.95rem;
            transition: var(--transition);
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary-dark);
            box-shadow: 0 0 0 3px rgba(6, 99, 78, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
        }

        /* Grille des membres */
        .members-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 1.75rem;
            margin-top: 2rem;
        }

        @media (max-width: 768px) {
            .members-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Carte de membre */
        .member-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--gray-200);
            transition: var(--transition);
            position: relative;
        }

        .member-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-xl);
            border-color: var(--primary-dark);
        }

        .member-card-header {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .member-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .member-card:hover .member-image {
            transform: scale(1.08);
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, transparent 50%, rgba(6, 99, 78, 0.3));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .member-card:hover .image-overlay {
            opacity: 1;
        }

        .member-status {
            position: absolute;
            top: 1rem;
            right: 1rem;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            backdrop-filter: blur(10px);
        }

        .status-active {
            background: rgba(120, 172, 17, 0.9);
            color: var(--white);
        }

        .status-inactive {
            background: rgba(239, 68, 68, 0.9);
            color: var(--white);
        }

        .member-order {
            position: absolute;
            top: 1rem;
            left: 1rem;
            width: 36px;
            height: 36px;
            background: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: var(--primary-dark);
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }

        .member-card:hover .member-order {
            background: var(--primary-dark);
            color: var(--white);
            transform: scale(1.1);
        }

        /* Contenu de la carte */
        .member-content {
            padding: 1.5rem;
        }

        .member-name {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
            line-height: 1.3;
        }

        .member-position {
            color: var(--secondary);
            font-weight: 500;
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }

        .member-meta {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--gray-500);
            font-size: 0.875rem;
        }

        .meta-item i {
            color: var(--primary-dark);
            font-size: 0.9rem;
        }

        /* Actions de la carte */
        .member-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid var(--gray-200);
        }

        .social-links {
            display: flex;
            gap: 0.5rem;
        }

        .social-link {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--gray-100);
            color: var(--gray-600);
            text-decoration: none;
            transition: var(--transition);
        }

        .social-link:hover {
            background: var(--primary-dark);
            color: var(--white);
            transform: translateY(-2px);
        }

        .social-link.linkedin:hover {
            background: #0077b5;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .btn-action {
            padding: 0.5rem 1rem;
            border-radius: var(--radius-sm);
            font-size: 0.875rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: var(--transition);
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .btn-edit {
            background: rgba(6, 99, 78, 0.1);
            color: var(--primary-dark);
            border: 1px solid rgba(6, 99, 78, 0.2);
        }

        .btn-edit:hover {
            background: var(--primary-dark);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(6, 99, 78, 0.2);
        }

        .btn-delete {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .btn-delete:hover {
            background: #ef4444;
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.2);
        }

        /* État vide */
        .empty-state {
            padding: 4rem 2rem;
            text-align: center;
            background: var(--gray-50);
            border-radius: var(--radius-lg);
            border: 2px dashed var(--gray-300);
            margin: 2rem 0;
        }

        .empty-icon {
            font-size: 4rem;
            color: var(--gray-300);
            margin-bottom: 1.5rem;
        }

        .empty-title {
            font-size: 1.5rem;
            color: var(--gray-600);
            margin-bottom: 0.75rem;
            font-weight: 600;
        }

        .empty-description {
            color: var(--gray-500);
            max-width: 500px;
            margin: 0 auto 2rem;
            line-height: 1.6;
        }

        /* Notifications */
        .alert-success {
            background: rgba(120, 172, 17, 0.1);
            border: 1px solid var(--secondary);
            color: var(--secondary);
            border-radius: var(--radius-md);
            padding: 1rem 1.5rem;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            animation: slideIn 0.3s ease;
        }

        .alert-success i {
            font-size: 1.25rem;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Pagination/footer */
        .team-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid var(--gray-200);
            color: var(--gray-500);
            font-size: 0.9rem;
        }

        .team-stats {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .stat-value {
            font-weight: 700;
            color: var(--primary-dark);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .team-filters {
                flex-direction: column;
            }

            .search-box {
                min-width: 100%;
            }

            .filter-group {
                min-width: 100%;
            }
        }

        @media (max-width: 768px) {
            .team-card {
                padding: 1.5rem;
            }

            .team-actions {
                flex-direction: column;
                gap: 1rem;
                align-items: stretch;
            }

            .btn-add-member {
                justify-content: center;
            }

            .member-actions {
                flex-direction: column;
                gap: 1rem;
                align-items: stretch;
            }

            .action-buttons {
                justify-content: center;
            }

            .social-links {
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .team-header-icon {
                width: 60px;
                height: 60px;
            }

            .team-header-icon i {
                font-size: 1.5rem;
            }

            .team-title {
                font-size: 1.75rem;
            }

            .team-card {
                padding: 1.25rem;
            }

            .member-content {
                padding: 1.25rem;
            }
        }
    </style>

    <div class="team-management">
        <div class="team-container">
            <!-- En-tête -->
            <div class="team-header">
                <div class="team-header-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h1 class="team-title">Gestion de l'Équipe</h1>
                <p class="team-subtitle">
                    Gérez les membres de votre équipe, leurs informations et leur visibilité sur le site
                </p>
            </div>

            <!-- Carte principale -->
            <div class="team-card">
                <!-- Notifications -->
                @if (session('success'))
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                icon: 'success',
                                title: 'Succès !',
                                text: '{{ session('success') }}',
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                background: '#f9fafb',
                                color: '#06634e',
                                iconColor: '#78ac11'
                            });
                        });
                    </script>
                @endif

                @if (session('error'))
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Erreur !',
                                text: '{{ session('error') }}',
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 4000,
                                timerProgressBar: true,
                                background: '#fef2f2',
                                color: '#dc3545',
                                iconColor: '#dc3545'
                            });
                        });
                    </script>
                @endif

                <!-- Barre d'actions -->
                <div class="team-actions">
                    <div class="stats-badge">
                        <i class="fas fa-user-friends"></i>
                        <span>{{ $teamMembers->count() }} membre{{ $teamMembers->count() > 1 ? 's' : '' }}</span>
                    </div>
                    <a href="{{ route('admin.team.create') }}" class="btn-add-member">
                        <i class="fas fa-user-plus"></i>
                        Ajouter un membre
                    </a>
                </div>

                <!-- Grille des membres -->
                @if ($teamMembers->isEmpty())
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="empty-title">Aucun membre d'équipe</h3>
                        <p class="empty-description">
                            Commencez par ajouter les membres de votre équipe pour les afficher sur votre site.
                        </p>
                        <a href="{{ route('admin.team.create') }}" class="btn-add-member">
                            <i class="fas fa-user-plus"></i>
                            Ajouter votre premier membre
                        </a>
                    </div>
                @else
                    <div class="members-grid" id="membersGrid">
                        @foreach ($teamMembers as $member)
                            <div class="member-card" data-status="{{ $member->is_active ? 'active' : 'inactive' }}"
                                data-order="{{ $member->order }}" data-name="{{ strtolower($member->name) }}">

                                <!-- En-tête de la carte -->
                                <div class="member-card-header">
                                    @if ($member->image)
                                        <img src="{{ asset('storage/' . $member->image) }}"
                                            alt="{{ $member->image_alt ?? $member->name }}" class="member-image">
                                    @else
                                        <div
                                            class="h-100 w-100 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                                            <i class="fas fa-user text-gray-400" style="font-size: 4rem;"></i>
                                        </div>
                                    @endif

                                    <div class="image-overlay"></div>

                                    <!-- Badge de statut -->
                                    <div
                                        class="member-status {{ $member->is_active ? 'status-active' : 'status-inactive' }}">
                                        {{ $member->is_active ? 'Actif' : 'Inactif' }}
                                    </div>

                                    <!-- Numéro d'ordre -->
                                    <div class="member-order">
                                        {{ $member->order }}
                                    </div>
                                </div>

                                <!-- Contenu de la carte -->
                                <div class="member-content">
                                    <h3 class="member-name">{{ $member->name }}</h3>
                                    <p class="member-position">{{ $member->position }}</p>

                                    <div class="member-meta">
                                        @if ($member->linkedin_url)
                                            <div class="meta-item">
                                                <i class="fab fa-linkedin"></i>
                                                <span>LinkedIn</span>
                                            </div>
                                        @endif
                                        <div class="meta-item">
                                            <i class="fas fa-calendar-alt"></i>
                                            <span>Ajouté le {{ $member->created_at->format('d/m/Y') }}</span>
                                        </div>
                                    </div>

                                    <!-- Actions -->
                                    <div class="member-actions">
                                        <div class="social-links">
                                            <a href="#" class="social-link">
                                                <i class="fas fa-user"></i>
                                            </a>
                                            @if ($member->linkedin_url)
                                                <a href="{{ $member->linkedin_url }}" target="_blank"
                                                    class="social-link linkedin" title="Voir le profil LinkedIn">
                                                    <i class="fab fa-linkedin-in"></i>
                                                </a>
                                            @endif
                                        </div>

                                        <div class="action-buttons">
                                            <a href="{{ route('admin.team.edit', $member) }}" class="btn-action btn-edit"
                                                title="Modifier">
                                                <i class="fas fa-edit"></i>
                                                Modifier
                                            </a>

                                            <form action="{{ route('admin.team.destroy', $member) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-action btn-delete"
                                                    onclick="return confirmDelete('{{ $member->name }}')"
                                                    title="Supprimer">
                                                    <i class="fas fa-trash"></i>
                                                    Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <!-- Pied de page -->
                @if (!$teamMembers->isEmpty())
                    <div class="team-footer">
                        <div class="team-stats">
                            <div class="stat-item">
                                <i class="fas fa-user-friends"></i>
                                <span><span class="stat-value">{{ $teamMembers->count() }}</span>
                                    membre{{ $teamMembers->count() > 1 ? 's' : '' }}</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-eye"></i>
                                <span><span class="stat-value">{{ $teamMembers->where('is_active', true)->count() }}</span>
                                    actif{{ $teamMembers->where('is_active', true)->count() > 1 ? 's' : '' }}</span>
                            </div>
                        </div>
                        <a href="{{ route('admin.team.create') }}" class="btn-action btn-edit">
                            <i class="fas fa-user-plus"></i>
                            Ajouter un membre
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Filtres dynamiques
            const statusFilter = document.getElementById('statusFilter');
            const sortFilter = document.getElementById('sortFilter');
            const searchInput = document.getElementById('searchInput');
            const membersGrid = document.getElementById('membersGrid');
            const memberCards = membersGrid ? Array.from(membersGrid.querySelectorAll('.member-card')) : [];

            function filterAndSortMembers() {
                const status = statusFilter.value;
                const sortBy = sortFilter.value;
                const searchTerm = searchInput.value.toLowerCase();

                // Filtrage
                let filteredCards = memberCards.filter(card => {
                    const cardStatus = card.dataset.status;
                    const cardName = card.dataset.name;
                    const cardText = card.textContent.toLowerCase();

                    // Filtre par statut
                    if (status && cardStatus !== status) return false;

                    // Filtre par recherche
                    if (searchTerm && !cardText.includes(searchTerm) && !cardName.includes(searchTerm)) {
                        return false;
                    }

                    return true;
                });

                // Tri
                filteredCards.sort((a, b) => {
                    switch (sortBy) {
                        case 'order':
                            return parseInt(a.dataset.order) - parseInt(b.dataset.order);
                        case 'order-desc':
                            return parseInt(b.dataset.order) - parseInt(a.dataset.order);
                        case 'name':
                            return a.dataset.name.localeCompare(b.dataset.name);
                        case 'name-desc':
                            return b.dataset.name.localeCompare(a.dataset.name);
                        default:
                            return 0;
                    }
                });

                // Réorganisation des cartes
                filteredCards.forEach(card => {
                    membersGrid.appendChild(card);
                });

                // Animation de réorganisation
                memberCards.forEach(card => {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                });

                setTimeout(() => {
                    filteredCards.forEach(card => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                        card.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
                    });
                }, 50);
            }

            // Écouteurs d'événements
            if (statusFilter) statusFilter.addEventListener('change', filterAndSortMembers);
            if (sortFilter) sortFilter.addEventListener('change', filterAndSortMembers);
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    clearTimeout(this.searchTimeout);
                    this.searchTimeout = setTimeout(filterAndSortMembers, 300);
                });
            }

            // Animation des cartes au survol
            memberCards.forEach(card => {
                const image = card.querySelector('.member-image');
                const orderBadge = card.querySelector('.member-order');

                card.addEventListener('mouseenter', () => {
                    card.style.zIndex = '10';
                });

                card.addEventListener('mouseleave', () => {
                    card.style.zIndex = '1';
                });
            });

            // Confirmation de suppression améliorée
            window.confirmDelete = function(memberName) {
                return confirm(
                    `⚠️ Suppression du membre\n\nÊtes-vous sûr de vouloir supprimer "${memberName}" ?\n\nCette action supprimera également la photo associée et est irréversible.`
                    );
            };

            // Initialisation de l'animation des cartes
            if (memberCards.length > 0) {
                memberCards.forEach((card, index) => {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(30px)';

                    setTimeout(() => {
                        card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, index * 100);
                });
            }

            // Mise à jour du badge de statistiques en temps réel
            function updateStats() {
                const visibleCards = memberCards.filter(card => {
                    const computedStyle = window.getComputedStyle(card);
                    return computedStyle.display !== 'none';
                });

                const activeCards = visibleCards.filter(card => card.dataset.status === 'active');

                const totalElement = document.querySelector('.stat-value:nth-of-type(1)');
                const activeElement = document.querySelector('.stat-value:nth-of-type(2)');

                if (totalElement) totalElement.textContent = visibleCards.length;
                if (activeElement) activeElement.textContent = activeCards.length;
            }

            // Observer les changements dans le DOM pour mettre à jour les stats
            const observer = new MutationObserver(updateStats);
            if (membersGrid) {
                observer.observe(membersGrid, {
                    childList: true,
                    subtree: true
                });
            }
        });

        // Fonction pour exporter les données
        function exportTeamData(format = 'csv') {
            // Implémentation d'exportation simplifiée
            alert(
                `Export des données d'équipe en ${format}...\n\nCette fonctionnalité serait normalement implémentée avec une API backend.`);
        }
    </script>

@endsection
