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

        .testimonials-admin {
            min-height: calc(100vh - 80px);
            padding: 2rem 1rem;
            background: linear-gradient(135deg, #f9fafb 0%, #f0fdf4 100%);
            position: relative;
        }

        .testimonials-admin::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-dark), var(--secondary));
        }

        .testimonials-container {
            max-width: 1400px;
            margin: 0 auto;
            position: relative;
        }

        /* En-tête */
        .testimonials-header {
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
        }

        .testimonials-header-icon {
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

        .testimonials-header-icon i {
            font-size: 2rem;
            color: var(--white);
        }

        .testimonials-title {
            font-size: 2.25rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, var(--primary-dark), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .testimonials-subtitle {
            color: var(--gray-600);
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Carte principale */
        .testimonials-card {
            background: var(--white);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-xl);
            padding: 2.5rem;
            position: relative;
            overflow: hidden;
            margin-bottom: 2rem;
            width: 100%;
        }

        .testimonials-card::before {
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
        .testimonials-actions {
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

        .btn-add-testimonial {
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

        .btn-add-testimonial:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(6, 99, 78, 0.3);
            background: linear-gradient(135deg, var(--primary-light), var(--primary-dark));
            color: var(--white);
        }

        .btn-add-testimonial i {
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

        /* Author and Quote */
        .author-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid var(--white);
            box-shadow: var(--shadow-sm);
        }

        .author-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .author-details {
            display: flex;
            flex-direction: column;
        }

        .author-name {
            font-weight: 600;
            color: var(--gray-800);
            font-size: 1.05rem;
        }

        .author-role {
            font-size: 0.85rem;
            color: var(--gray-500);
        }

        .quote-preview {
            font-style: italic;
            color: var(--gray-600);
            position: relative;
            padding-left: 1rem;
            border-left: 3px solid var(--secondary);
            font-size: 0.95rem;
            max-width: 400px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Rating Stars */
        .rating-stars {
            color: #ffc107;
            font-size: 0.9rem;
            display: inline-flex;
            gap: 2px;
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
            .testimonials-card {
                padding: 1.5rem;
            }

            .testimonials-actions {
                flex-direction: column;
                gap: 1rem;
            }

            .btn-add-testimonial {
                width: 100%;
                justify-content: center;
            }

            .table thead {
                display: none;
            }

            .table, .table tbody, .table tr, .table td {
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
        }
    </style>

    <div class="testimonials-admin">
        <div class="testimonials-container">
            <!-- En-tête -->
            <div class="testimonials-header">
                <div class="testimonials-header-icon">
                    <i class="fas fa-quote-left"></i>
                </div>
                <h1 class="testimonials-title">Témoignages Clients</h1>
                <p class="testimonials-subtitle">
                    Gérez les avis et témoignages de vos clients satisfaits
                </p>
            </div>

            <!-- Carte principale -->
            <div class="testimonials-card">
                <!-- Barre d'actions -->
                <div class="testimonials-actions">
                    <div class="stats-badge">
                        <i class="fas fa-comment-dots"></i>
                        <span>{{ $testimonials->count() }} avis</span>
                    </div>
                    <a href="{{ route('admin.testimonials.create') }}" class="btn-add-testimonial">
                        <i class="fas fa-plus"></i>
                        Nouveau Témoignage
                    </a>
                </div>

                @if($testimonials->isEmpty())
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="far fa-comments"></i>
                        </div>
                        <h3 class="empty-title">Aucun témoignage</h3>
                        <p class="text-muted mb-4">Commencez par ajouter votre premier témoignage client.</p>
                        <a href="{{ route('admin.testimonials.create') }}" class="btn-add-testimonial">
                            <i class="fas fa-plus"></i>
                            Ajouter maintenant
                        </a>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Auteur</th>
                                    <th>Témoignage</th>
                                    <th>Note</th>
                                    <th>Statut</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($testimonials as $testimonial)
                                    <tr>
                                        <td>
                                            <div class="author-info">
                                                <div class="author-avatar">
                                                    @if($testimonial->author_image)
                                                        <img src="{{ asset('storage/' . $testimonial->author_image) }}" alt="Avatar">
                                                    @else
                                                        <div class="w-100 h-100 bg-secondary d-flex align-items-center justify-content-center text-white">
                                                            {{ substr($testimonial->author_name, 0, 1) }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="author-details">
                                                    <span class="author-name">{{ $testimonial->author_name }}</span>
                                                    <span class="author-role">{{ $testimonial->author_role }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="quote-preview">
                                                "{{ Str::limit($testimonial->content, 60) }}"
                                            </div>
                                        </td>
                                        <td>
                                            <div class="rating-stars">
                                                @for($i = 1; $i <= 5; $i++)
                                                    @if($i <= $testimonial->rating)
                                                        <i class="fas fa-star"></i>
                                                    @else
                                                        <i class="far fa-star"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                        </td>
                                        <td>
                                            <span class="status-badge {{ $testimonial->is_active ? 'active' : 'inactive' }}">
                                                <i class="fas fa-circle" style="font-size: 0.5rem; margin-right: 0.25rem;"></i>
                                                {{ $testimonial->is_active ? 'Visible' : 'Masqué' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="action-buttons justify-content-end">
                                                <a href="{{ route('admin.testimonials.edit', $testimonial) }}" 
                                                   class="btn-action btn-edit" title="Modifier">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" 
                                                      method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
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