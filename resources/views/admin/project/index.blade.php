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

        .items-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
        }

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

        .item-subtitle {
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

        .item-actions {
            display: flex;
            gap: 0.5rem;
            padding-top: 1rem;
            border-top: 1px solid var(--gray-100);
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
    </style>

    <div class="prog-admin">
        <div class="prog-header">
            <h1 class="prog-title">Gestion des Projets</h1>
            <p class="prog-subtitle">Pilotez les contenus AED et Zones Industrielles</p>
        </div>

        <div class="section-header">
            <div class="section-info">
                <h2>Liste des Projets</h2>
                <p>{{ $projects->count() }} projet(s) enregistré(s)</p>
            </div>
            <a href="{{ route('admin.projects.create') }}" class="btn-add">
                <i class="fas fa-plus"></i>
                Ajouter un Projet
            </a>
        </div>

        <div class="items-grid">
            @foreach($projects as $project)
                <div class="item-card">
                    <span class="status-dot {{ $project->is_active ? 'status-active' : 'status-inactive' }}"></span>
                    <div class="item-image">
                        <img src="{{ $project->image ? (Str::startsWith($project->image, 'assets') ? asset($project->image) : asset('storage/' . $project->image)) : 'https://placehold.co/600x400?text=Project' }}"
                            alt="{{ $project->title }}">
                        <span class="item-badge">{{ strtoupper($project->type ?? 'N/A') }}</span>
                    </div>
                    <div class="item-content">
                        <div class="item-subtitle">{{ $project->subtitle }}</div>
                        <h3 class="item-title">{{ $project->title }}</h3>
                        <p class="item-excerpt">{{ Str::limit(strip_tags($project->description), 120) }}</p>

                        <div class="item-actions">
                            <form action="{{ route('admin.projects.toggle-status', $project) }}" method="POST">
                                @csrf
                                <button type="submit" class="action-btn btn-toggle" title="Activer/Désactiver">
                                    <i class="fas fa-power-off"></i>
                                </button>
                            </form>
                            <a href="{{ route('admin.projects.edit', $project) }}" class="action-btn btn-edit" title="Modifier">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                                onsubmit="return confirm('Supprimer ce projet ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn btn-delete" title="Supprimer">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection