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

        .carousel-admin {
            min-height: calc(100vh - 80px);
            padding: 2rem 1rem;
            background: linear-gradient(135deg, #f9fafb 0%, #f0fdf4 100%);
            position: relative;
        }

        .carousel-admin::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-dark), var(--secondary));
        }

        .carousel-container {
            max-width: 1400px;
            margin: 0 auto;
            position: relative;
        }

        /* En-tête */
        .carousel-header {
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
        }

        .carousel-header-icon {
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

        .carousel-header-icon i {
            font-size: 2rem;
            color: var(--white);
        }

        .carousel-title {
            font-size: 2.25rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, var(--primary-dark), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .carousel-subtitle {
            color: var(--gray-600);
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Carte principale */
        .carousel-card {
            background: var(--white);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-xl);
            padding: 2.5rem;
            position: relative;
            overflow: hidden;
            margin-bottom: 2rem;
            width: 100%;
        }

        .carousel-card::before {
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
        .carousel-actions {
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

        .btn-add-slide {
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

        .btn-add-slide:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(6, 99, 78, 0.3);
            background: linear-gradient(135deg, var(--primary-light), var(--primary-dark));
            color: var(--white);
        }

        .btn-add-slide i {
            font-size: 1.1rem;
        }

        /* Table Styles */
        .table-responsive {
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            background: var(--white);
        }

        .table thead {
            background: var(--gray-50);
        }

        .table th {
            padding: 1.25rem 1.5rem;
            text-align: left;
            font-weight: 600;
            color: var(--primary-dark);
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            border-bottom: 2px solid var(--gray-200);
        }

        .table td {
            padding: 1.25rem 1.5rem;
            vertical-align: middle;
            border-bottom: 1px solid var(--gray-100);
            color: var(--gray-600);
        }

        .table tr:last-child td {
            border-bottom: none;
        }

        .table tr:hover td {
            background: var(--gray-50);
        }

        /* Slide Preview */
        .slide-preview {
            width: 120px;
            height: 70px;
            border-radius: var(--radius-md);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            border: 2px solid var(--gray-200);
            position: relative;
        }

        .slide-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .slide-preview:hover img {
            transform: scale(1.1);
        }

        /* Badges */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .status-badge.active {
            background: rgba(120, 172, 17, 0.1);
            color: var(--secondary);
            border: 1px solid rgba(120, 172, 17, 0.2);
        }

        .status-badge.inactive {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        /* Actions */
        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .btn-action {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: var(--radius-md);
            border: none;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
        }

        .btn-edit {
            background: rgba(6, 99, 78, 0.1);
            color: var(--primary-dark);
        }

        .btn-edit:hover {
            background: var(--primary-dark);
            color: var(--white);
            transform: translateY(-2px);
        }

        .btn-delete {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
        }

        .btn-delete:hover {
            background: #ef4444;
            color: var(--white);
            transform: translateY(-2px);
        }

        /* Order Badge */
        .order-badge {
            width: 32px;
            height: 32px;
            background: var(--gray-100);
            color: var(--gray-600);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.9rem;
        }

        /* Empty State */
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

        /* Responsive */
        @media (max-width: 768px) {
            .carousel-card {
                padding: 1.5rem;
            }

            .carousel-actions {
                flex-direction: column;
                gap: 1rem;
            }

            .btn-add-slide {
                width: 100%;
                justify-content: center;
            }

            .table thead {
                display: none;
            }

            .table,
            .table tbody,
            .table tr,
            .table td {
                display: block;
                width: 100%;
            }

            .table tr {
                margin-bottom: 1.5rem;
                border: 1px solid var(--gray-200);
                border-radius: var(--radius-lg);
                padding: 1rem;
            }

            .table td {
                padding: 0.75rem 0;
                display: flex;
                justify-content: space-between;
                align-items: center;
                border: none;
                border-bottom: 1px dashed var(--gray-200);
            }

            .table td:last-child {
                border-bottom: none;
            }

            .slide-preview {
                width: 100%;
                height: 200px;
                margin-bottom: 1rem;
            }
        }
    </style>

    <div class="carousel-admin">
        <div class="carousel-container">
            <!-- En-tête -->
            <div class="carousel-header">
                <div class="carousel-header-icon">
                    <i class="fas fa-images"></i>
                </div>
                <h1 class="carousel-title">Gestion du Carousel</h1>
                <p class="carousel-subtitle">
                    Gérez les diapositives qui s'affichent sur votre page d'accueil
                </p>
            </div>

            <!-- Carte principale -->
            <div class="carousel-card">
                <!-- Barre d'actions -->
                <div class="carousel-actions">
                    <div class="stats-badge">
                        <i class="fas fa-layer-group"></i>
                        <span>{{ $carousels->count() }} diapositive{{ $carousels->count() > 1 ? 's' : '' }}</span>
                    </div>
                    <a href="{{ route('admin.carousels.create') }}" class="btn-add-slide">
                        <i class="fas fa-plus"></i>
                        Nouvelle Diapositive
                    </a>
                </div>

                @if($carousels->isEmpty())
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="fas fa-images"></i>
                        </div>
                        <h3 class="empty-title">Aucune diapositive</h3>
                        <p class="text-muted mb-4">Commencez par ajouter votre première diapositive au carousel.</p>
                        <a href="{{ route('admin.carousels.create') }}" class="btn-add-slide">
                            <i class="fas fa-plus"></i>
                            Ajouter maintenant
                        </a>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Aperçu</th>
                                    <th>Titre & Description</th>
                                    <th>Ordre</th>
                                    <th>Statut</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carousels as $carousel)
                                    <tr>
                                        <td style="width: 150px;">
                                            <div class="slide-preview">
                                                @if($carousel->image)
                                                    <img src="{{ asset('storage/' . $carousel->image) }}" alt="Aperçu">
                                                @else
                                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-light">
                                                        <i class="fas fa-image text-muted"></i>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div style="font-weight: 600; color: var(--gray-800); margin-bottom: 0.25rem;">
                                                {{ $carousel->title }}
                                            </div>
                                            <div style="font-size: 0.9rem; color: var(--gray-500);">
                                                {{ Str::limit($carousel->description, 60) }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="order-badge">
                                                {{ $carousel->sort_order }}
                                            </div>
                                        </td>
                                        <td>
                                            <span class="status-badge {{ $carousel->is_active ? 'active' : 'inactive' }}">
                                                <i class="fas fa-circle" style="font-size: 0.5rem; margin-right: 0.25rem;"></i>
                                                {{ $carousel->is_active ? 'Actif' : 'Inactif' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="action-buttons justify-content-end">
                                                <a href="{{ route('admin.carousels.edit', $carousel) }}" class="btn-action btn-edit"
                                                    title="Modifier">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.carousels.destroy', $carousel) }}" method="POST"
                                                    onsubmit="return confirm('Confirmer la suppression ?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-action btn-delete" title="Supprimer">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection