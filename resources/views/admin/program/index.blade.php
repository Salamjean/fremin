@extends('admin.layouts.template')

@section('content')
    <style>
        :root {
            --primary-dark: #06634e;
            --primary-light: #0a7a62;
            --secondary: #78ac11;
            --secondary-light: #8bc31f;
            --accent: #ffc107;
            --white: #ffffff;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-300: #cbd5e1;
            --gray-400: #94a3b8;
            --gray-500: #64748b;
            --gray-600: #475569;
            --gray-700: #334155;
            --gray-800: #1e293b;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            --shadow-md: 0 10px 15px -3px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 20px 25px -5px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 25px 50px -12px rgb(0 0 0 / 0.25);
            --radius-sm: 0.375rem;
            --radius: 0.5rem;
            --radius-md: 0.75rem;
            --radius-lg: 1rem;
            --radius-xl: 1.5rem;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .prog-admin {
            padding: 2rem;
            background: var(--gray-50);
            min-height: 100vh;
        }

        .prog-header {
            margin-bottom: 2.5rem;
            text-align: center;
        }

        .prog-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
            letter-spacing: -0.025em;
        }

        .prog-subtitle {
            color: var(--gray-500);
            font-size: 1.1rem;
        }

        /* Tab Styles */
        .tabs-container {
            background: var(--white);
            padding: 0.5rem;
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-md);
            display: flex;
            gap: 0.5rem;
            margin-bottom: 3rem;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
        }

        .tab-btn {
            padding: 0.75rem 2rem;
            border-radius: var(--radius-lg);
            font-weight: 600;
            color: var(--gray-500);
            cursor: pointer;
            transition: var(--transition);
            border: none;
            background: transparent;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .tab-btn i {
            font-size: 1.25rem;
        }

        .tab-btn:hover {
            color: var(--primary-dark);
            background: var(--gray-100);
        }

        .tab-btn.active {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            color: var(--white);
            box-shadow: 0 4px 12px rgba(6, 99, 78, 0.2);
        }

        /* Content Area */
        .tab-content {
            display: none;
            animation: fadeIn 0.4s ease-out;
        }

        .tab-content.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Header de section */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding: 0 1rem;
        }

        .section-info h2 {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--gray-800);
            margin-bottom: 0.25rem;
        }

        .section-info p {
            color: var(--gray-500);
        }

        .btn-add {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.875rem 1.75rem;
            background: linear-gradient(135deg, var(--secondary), var(--secondary-light));
            color: var(--white);
            border-radius: var(--radius-lg);
            font-weight: 600;
            text-decoration: none !important;
            transition: var(--transition);
            box-shadow: 0 4px 12px rgba(120, 172, 17, 0.2);
        }

        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(120, 172, 17, 0.3);
            color: white;
        }

        /* Grid layout */
        .items-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
        }

        /* Card Design */
        .item-card {
            background: var(--white);
            border-radius: var(--radius-xl);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border: 1px solid var(--gray-200);
            position: relative;
        }

        .item-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
            border-color: var(--primary-light);
        }

        .item-image {
            position: relative;
            height: 220px;
            overflow: hidden;
        }

        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .item-card:hover .item-image img {
            transform: scale(1.1);
        }

        .item-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            padding: 0.5rem 1rem;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(4px);
            border-radius: var(--radius-md);
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--primary-dark);
            z-index: 2;
            box-shadow: var(--shadow-sm);
        }

        .status-dot {
            position: absolute;
            top: 1rem;
            left: 1rem;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: 2px solid white;
            z-index: 2;
        }

        .status-active {
            background: #22c55e;
            box-shadow: 0 0 8px #22c55e;
        }

        .status-inactive {
            background: #ef4444;
            box-shadow: 0 0 8px #ef4444;
        }

        .item-content {
            padding: 1.5rem;
        }

        .item-category {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--secondary);
            margin-bottom: 0.5rem;
            letter-spacing: 0.05em;
        }

        .item-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--gray-800);
            margin-bottom: 0.75rem;
            line-height: 1.3;
        }

        .item-excerpt {
            font-size: 0.9rem;
            color: var(--gray-600);
            margin-bottom: 1.5rem;
            line-height: 1.6;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .item-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid var(--gray-100);
        }

        .item-order {
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            font-weight: 700;
            color: var(--gray-400);
            font-size: 0.875rem;
        }

        .item-actions {
            display: flex;
            gap: 0.5rem;
        }

        .action-btn {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: var(--radius);
            transition: var(--transition);
            border: none;
            cursor: pointer;
        }

        .btn-edit {
            background: var(--gray-100);
            color: var(--primary-dark);
        }

        .btn-edit:hover {
            background: var(--primary-dark);
            color: white;
        }

        .btn-delete {
            background: #fef2f2;
            color: #ef4444;
        }

        .btn-delete:hover {
            background: #ef4444;
            color: white;
        }

        .btn-toggle {
            background: var(--gray-100);
            color: var(--gray-600);
        }

        .btn-toggle:hover {
            background: var(--secondary);
            color: white;
        }

        /* Empty state */
        .empty-state {
            text-align: center;
            padding: 5rem 2rem;
            background: var(--white);
            border-radius: var(--radius-xl);
            border: 2px dashed var(--gray-300);
        }

        .empty-icon {
            font-size: 4rem;
            color: var(--gray-300);
            margin-bottom: 1rem;
        }
    </style>

    <div class="prog-admin">
        <div class="prog-header">
            <h1 class="prog-title">Programmes & Opportunités</h1>
            <p class="prog-subtitle">Gérez vos programmes d'accompagnement et vos appels en cours.</p>
        </div>

        <!-- Tabs Selector -->
        <div class="tabs-container">
            <button class="tab-btn {{ !request('tab') || request('tab') == 'programs' ? 'active' : '' }}"
                onclick="switchTab('programs')">
                <i class="fas fa-project-diagram"></i>
                Programmes d'Accompagnement
            </button>
            <button class="tab-btn {{ request('tab') == 'opportunities' ? 'active' : '' }}"
                onclick="switchTab('opportunities')">
                <i class="fas fa-bullhorn"></i>
                Appels en Cours
            </button>
        </div>

        <!-- Programs content -->
        <div id="programs" class="tab-content {{ !request('tab') || request('tab') == 'programs' ? 'active' : '' }}">
            <div class="section-header">
                <div class="section-info">
                    <h2>Nos Programmes</h2>
                    <p>{{ $programs->count() }} programme(s) enregistré(s)</p>
                </div>
                <a href="{{ route('admin.programs.create') }}" class="btn-add">
                    <i class="fas fa-plus"></i>
                    Ajouter un Programme
                </a>
            </div>

            @if($programs->isEmpty())
                <div class="empty-state">
                    <i class="fas fa-folder-open empty-icon"></i>
                    <h3>Aucun programme pour le moment</h3>
                    <p>Commencez par ajouter votre premier programme d'accompagnement.</p>
                    <a href="{{ route('admin.programs.create') }}" class="btn-add mt-3">Ajouter maintenant</a>
                </div>
            @else
                <div class="items-grid">
                    @foreach($programs as $program)
                        <div class="item-card">
                            <span class="status-dot {{ $program->is_active ? 'status-active' : 'status-inactive' }}"></span>
                            <div class="item-image">
                                <img src="{{ $program->image ? asset('storage/' . $program->image) : 'https://placehold.co/600x400?text=Premium+Program' }}"
                                    alt="{{ $program->image_alt }}">
                                @if($program->category)
                                    <span class="item-badge">{{ $program->category }}</span>
                                @endif
                            </div>
                            <div class="item-content">
                                <div class="item-category">{{ $program->subtitle }}</div>
                                <h3 class="item-title">{{ $program->title }}</h3>
                                <p class="item-excerpt">{{ Str::limit(strip_tags($program->description), 120) }}</p>

                                <div class="item-meta">
                                    <div class="item-order">
                                        <i class="fas fa-sort"></i>
                                        Ordre: {{ $program->sort_order }}
                                    </div>
                                    <div class="item-actions">
                                        <form action="{{ route('admin.programs.toggle-status', $program) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="action-btn btn-toggle" title="Activer/Désactiver">
                                                <i class="fas fa-power-off"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('admin.programs.edit', $program) }}" class="action-btn btn-edit"
                                            title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.programs.destroy', $program) }}" method="POST"
                                            onsubmit="return confirm('Supprimer ce programme ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-btn btn-delete" title="Supprimer">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Opportunities content -->
        <div id="opportunities" class="tab-content {{ request('tab') == 'opportunities' ? 'active' : '' }}">
            <div class="section-header">
                <div class="section-info">
                    <h2>Appels en Cours</h2>
                    <p>{{ $opportunities->count() }} opportunité(s) enregistrée(s)</p>
                </div>
                <a href="{{ route('admin.opportunities.create') }}" class="btn-add">
                    <i class="fas fa-plus"></i>
                    Nouvel Appel
                </a>
            </div>

            @if($opportunities->isEmpty())
                <div class="empty-state">
                    <i class="fas fa-bullhorn empty-icon"></i>
                    <h3>Aucun appel en cours</h3>
                    <p>Partagez de nouvelles opportunités avec votre communauté.</p>
                    <a href="{{ route('admin.opportunities.create') }}" class="btn-add mt-3">Publier un appel</a>
                </div>
            @else
                <div class="items-grid">
                    @foreach($opportunities as $opportunity)
                        <div class="item-card">
                            <span class="status-dot {{ $opportunity->is_active ? 'status-active' : 'status-inactive' }}"></span>
                            <div class="item-image">
                                <img src="{{ $opportunity->image ? asset('storage/' . $opportunity->image) : 'https://placehold.co/600x400?text=Call+to+Action' }}"
                                    alt="{{ $opportunity->image_alt }}">
                                <span class="item-badge"
                                    style="background: {{ $opportunity->status == 'open' ? 'var(--secondary)' : ($opportunity->status == 'closed' ? '#ef4444' : '#64748b') }}; color: white;">
                                    {{ strtoupper($opportunity->status) }}
                                </span>
                            </div>
                            <div class="item-content">
                                <div class="item-category">{{ $opportunity->type }}</div>
                                <h3 class="item-title">{{ $opportunity->title }}</h3>
                                <div style="font-size: 0.85rem; color: var(--accent); font-weight: 700; margin-bottom: 0.5rem;">
                                    <i class="far fa-calendar-alt"></i> Deadline:
                                    {{ $opportunity->deadline ? $opportunity->deadline->format('d/m/Y') : 'N/A' }}
                                </div>
                                <p class="item-excerpt">{{ Str::limit(strip_tags($opportunity->description), 120) }}</p>

                                <div class="item-meta">
                                    <div class="item-order">
                                        <i class="fas fa-map-marker-alt"></i> {{ $opportunity->location ?: 'À distance' }}
                                    </div>
                                    <div class="item-actions">
                                        <form action="{{ route('admin.opportunities.toggle-status', $opportunity) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="action-btn btn-toggle" title="Activer/Désactiver">
                                                <i class="fas fa-power-off"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('admin.opportunities.edit', $opportunity) }}" class="action-btn btn-edit"
                                            title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.opportunities.destroy', $opportunity) }}" method="POST"
                                            onsubmit="return confirm('Supprimer cet appel ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-btn btn-delete" title="Supprimer">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <script>
        function switchTab(tabId) {
            // Toggle Buttons
            document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
            const activeBtn = document.querySelector(`.tab-btn[onclick="switchTab('${tabId}')"]`);
            if (activeBtn) activeBtn.classList.add('active');

            // Toggle Content
            document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));
            document.getElementById(tabId).classList.add('active');

            // Update URL
            const url = new URL(window.location);
            url.searchParams.set('tab', tabId);
            window.history.pushState({}, '', url);
        }
    </script>
@endsection