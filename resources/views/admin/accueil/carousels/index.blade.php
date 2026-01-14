@extends('admin.layouts.template')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <style>
        .carousel-admin {
            --primary-dark: #06634e;
            --primary-light: #78ac11;
            --white: #ffffff;
            --light-bg: #f8f9fa;
            --border-color: #e0e0e0;
            --success-bg: rgba(6, 99, 78, 0.1);
            --warning-bg: rgba(255, 193, 7, 0.1);
            --danger-bg: rgba(220, 53, 69, 0.1);
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.08);
            --shadow-lg: 0 8px 32px rgba(0, 0, 0, 0.12);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .carousel-admin .card {
            border: none;
            margin: 2rem 0;
            border-radius: 16px;
            background-color: #e9eaef;
            overflow: hidden;
            box-shadow: var(--shadow-md);
            transition: var(--transition);
        }

        .carousel-admin .card:hover {
            box-shadow: var(--shadow-lg);
        }

        .carousel-admin .card-header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            border: none;
            border-radius: 16px 16px 0 0;
            padding: 1.75rem 2rem;
            position: relative;
            overflow: hidden;
        }

        .carousel-admin .card-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        }

        .carousel-admin .card-header h5 {
            color: var(--white);
            font-weight: 700;
            font-size: 1.5rem;
            margin: 0;
            letter-spacing: 0.5px;
        }

        .carousel-admin .card-header .btn-primary {
            background-color: rgba(255, 255, 255, 0.15);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            font-size: 1rem;
            transition: var(--transition);
            backdrop-filter: blur(10px);
        }

        .carousel-admin .card-header .btn-primary:hover {
            background-color: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(6, 99, 78, 0.3);
        }

        .carousel-admin .btn-outline-primary {
            border: 2px solid var(--primary-light);
            color: var(--primary-light);
            border-radius: 10px;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            transition: var(--transition);
        }

        .carousel-admin .btn-outline-primary:hover {
            background-color: var(--primary-light);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(120, 172, 17, 0.3);
        }

        .carousel-admin .table {
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0 12px;
        }

        .carousel-admin .table thead {
            background-color: transparent;
        }

        .carousel-admin .table thead th {
            color: var(--primary-dark);
            border: none;
            font-weight: 600;
            padding: 1.25rem 1.5rem;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid rgba(6, 99, 78, 0.1);
        }

        .carousel-admin .table tbody tr {
            transition: var(--transition);
            background: var(--white);
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
            margin-bottom: 12px;
        }

        .carousel-admin .table tbody tr:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
        }

        .carousel-admin .table tbody td {
            padding: 1.25rem 1.5rem;
            vertical-align: middle;
            border: none;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
        }

        .carousel-admin .table tbody td:first-child {
            border-radius: 12px 0 0 12px;
            border-left: 1px solid rgba(0, 0, 0, 0.05);
        }

        .carousel-admin .table tbody td:last-child {
            border-radius: 0 12px 12px 0;
            border-right: 1px solid rgba(0, 0, 0, 0.05);
        }

        .carousel-admin .order-badge {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            color: var(--white);
            width: 40px;
            height: 40px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1rem;
            box-shadow: 0 4px 8px rgba(6, 99, 78, 0.2);
        }

        .carousel-admin .badge-left,
        .carousel-admin .badge-right,
        .carousel-admin .badge-active,
        .carousel-admin .badge-inactive {
            padding: 0.5rem 1rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            box-shadow: var(--shadow-sm);
        }

        .carousel-admin .badge-left {
            background-color: var(--success-bg);
            color: var(--primary-dark);
            border: 1px solid rgba(6, 99, 78, 0.2);
        }

        .carousel-admin .badge-right {
            background-color: var(--warning-bg);
            color: #ffc107;
            border: 1px solid rgba(255, 193, 7, 0.2);
        }

        .carousel-admin .badge-active {
            background-color: var(--success-bg);
            color: var(--primary-dark);
            border: 1px solid rgba(6, 99, 78, 0.2);
        }

        .carousel-admin .badge-inactive {
            background-color: var(--danger-bg);
            color: #dc3545;
            border: 1px solid rgba(220, 53, 69, 0.2);
        }

        .carousel-admin .img-thumbnail {
            border: 2px solid var(--border-color);
            border-radius: 10px;
            padding: 4px;
            transition: var(--transition);
            width: 100px;
            height: 75px;
            object-fit: cover;
        }

        .carousel-admin .img-thumbnail:hover {
            border-color: var(--primary-light);
            transform: scale(1.08);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .carousel-admin .action-buttons {
            display: flex;
            gap: 10px;
        }

        .carousel-admin .btn-edit {
            background: linear-gradient(135deg, var(--primary-light), #94c414);
            color: var(--white);
            border: none;
            border-radius: 10px;
            padding: 0.6rem 1.2rem;
            font-weight: 500;
            transition: var(--transition);
            box-shadow: 0 4px 8px rgba(120, 172, 17, 0.2);
        }

        .carousel-admin .btn-edit:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            transform: translateY(-3px);
            box-shadow: 0 8px 16px rgba(6, 99, 78, 0.3);
        }

        .carousel-admin .btn-delete {
            background: linear-gradient(135deg, #dc3545, #e35d6a);
            color: var(--white);
            border: none;
            border-radius: 10px;
            padding: 0.6rem 1.2rem;
            font-weight: 500;
            transition: var(--transition);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.2);
        }

        .carousel-admin .btn-delete:hover {
            background: linear-gradient(135deg, #c82333, #dc3545);
            transform: translateY(-3px);
            box-shadow: 0 8px 16px rgba(220, 53, 69, 0.3);
        }

        .carousel-admin .alert-success {
            background-color: var(--success-bg);
            border: 1px solid var(--primary-dark);
            color: var(--primary-dark);
            border-radius: 12px;
            margin-bottom: 1.5rem;
            padding: 1rem 1.5rem;
            box-shadow: var(--shadow-sm);
        }

        .carousel-admin .alert-success i {
            color: var(--primary-dark);
        }

        .carousel-admin .empty-state {
            padding: 4rem 2rem;
            text-align: center;
        }

        .carousel-admin .empty-state-icon {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, rgba(6, 99, 78, 0.1), rgba(120, 172, 17, 0.1));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            color: var(--primary-light);
            font-size: 3.5rem;
            box-shadow: var(--shadow-md);
        }

        .carousel-admin .empty-state h4 {
            color: var(--primary-dark);
            font-weight: 700;
            margin-bottom: 1rem;
            font-size: 1.75rem;
        }

        .carousel-admin .empty-state p {
            color: #6c757d;
            font-size: 1.1rem;
            margin-bottom: 2rem;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        .carousel-admin .card-footer {
            background-color: rgba(6, 99, 78, 0.03);
            border-top: 1px solid rgba(6, 99, 78, 0.1);
            padding: 1.5rem 2rem;
            border-radius: 0 0 16px 16px;
        }

        .carousel-admin .info-text {
            color: var(--primary-dark);
            font-weight: 500;
            font-size: 0.95rem;
        }

        .carousel-admin .info-text i {
            color: var(--primary-light);
        }

        @media (max-width: 768px) {
            .carousel-admin .card-header {
                padding: 1.25rem;
                text-align: center;
            }

            .carousel-admin .table-responsive {
                border: 1px solid var(--border-color);
                border-radius: 12px;
                overflow: hidden;
                margin: 0 -1rem;
            }

            .carousel-admin .action-buttons {
                flex-direction: column;
                gap: 8px;
            }

            .carousel-admin .btn-edit,
            .carousel-admin .btn-delete {
                width: 100%;
                justify-content: center;
            }

            .carousel-admin .empty-state {
                padding: 3rem 1rem;
            }

            .carousel-admin .empty-state-icon {
                width: 80px;
                height: 80px;
                font-size: 2.5rem;
            }
        }

        .carousel-admin .fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .carousel-admin .status-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 8px;
            box-shadow: 0 0 8px currentColor;
        }

        .carousel-admin .status-indicator.active {
            background-color: var(--primary-light);
            color: var(--primary-light);
        }

        .carousel-admin .status-indicator.inactive {
            background-color: #dc3545;
            color: #dc3545;
        }
    </style>

    <div class="carousel-admin fade-in" style="background-color: white">
        <div class="card">
            <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-center">
                <h5 class="mb-3 mb-md-0">
                    <i class="fas fa-sliders-h me-2"></i>Gestion du Carousel
                </h5>
                <a href="{{ route('admin.carousels.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle me-2"></i>Nouveau Slide
                </a>
            </div>

            <div class="card-body p-4">
                @if(session('success'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <i class="fas fa-check-circle me-3 fs-4"></i>
                        <div class="fw-semibold">{{ session('success') }}</div>
                    </div>
                @endif

                @if($carousels->isEmpty())
                    <div class="empty-state">
                        <div class="empty-state-icon">
                            <i class="fas fa-images"></i>
                        </div>
                        <h4 class="mt-3 mb-2">Aucun slide disponible</h4>
                        <p class="text-muted mb-4">Commencez par créer votre premier slide pour votre carousel</p>
                        <a href="{{ route('admin.carousels.create') }}" class="btn btn-primary px-5 py-3">
                            <i class="fas fa-plus-circle me-2"></i>Créer mon premier slide
                        </a>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 80px;">Ordre</th>
                                    <th style="width: 120px;">Image</th>
                                    <th>Titre & Description</th>
                                    <th style="width: 160px;">Position</th>
                                    <th style="width: 120px;">Statut</th>
                                    <th style="width: 150px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carousels as $carousel)
                                    <tr class="fade-in" style="animation-delay: {{ $loop->index * 0.05 }}s;">
                                        <td>
                                            <div class="order-badge">{{ $carousel->order }}</div>
                                        </td>
                                        <td>
                                            @if($carousel->image)
                                                <img src="{{ asset('storage/' . $carousel->image) }}" alt="{{ $carousel->image_alt }}"
                                                    class="img-thumbnail" data-bs-toggle="modal"
                                                    data-bs-target="#imageModal{{ $carousel->id }}" style="cursor: zoom-in;">
                                            @else
                                                <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                                    style="width: 100px; height: 75px;">
                                                    <i class="fas fa-image text-muted fa-2x"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <strong class="text-dark mb-1">{{ Str::limit($carousel->title, 50) }}</strong>
                                                @if($carousel->subtitle)
                                                    <small class="text-muted">{{ Str::limit($carousel->subtitle, 80) }}</small>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            @if($carousel->layout == 'left')
                                                <span class="badge-left">
                                                    <i class="fas fa-align-left"></i>
                                                    Texte gauche
                                                </span>
                                            @else
                                                <span class="badge-right">
                                                    <i class="fas fa-align-right"></i>
                                                    Texte droit
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($carousel->is_active)
                                                <span class="badge-active">
                                                    <span class="status-indicator active"></span>
                                                    Actif
                                                </span>
                                            @else
                                                <span class="badge-inactive">
                                                    <span class="status-indicator inactive"></span>
                                                    Inactif
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="action-buttons">
                                                <a href="{{ route('admin.carousels.edit', $carousel) }}"
                                                    class="btn-edit d-flex align-items-center justify-content-center">
                                                    <i class="fas fa-edit me-2"></i>
                                                    <span class="d-none d-md-inline">Éditer</span>
                                                </a>
                                                <button type="button"
                                                    class="btn-delete d-flex align-items-center justify-content-center delete-slide"
                                                    data-id="{{ $carousel->id }}" data-title="{{ $carousel->title }}">
                                                    <i class="fas fa-trash-alt me-2"></i>
                                                    <span class="d-none d-md-inline">Supprimer</span>
                                                </button>
                                            </div>
                                            <form id="delete-form-{{ $carousel->id }}"
                                                action="{{ route('admin.carousels.destroy', $carousel) }}" method="POST"
                                                class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

            @if(!$carousels->isEmpty())
                <div class="card-footer">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                        <div class="info-text mb-3 mb-md-0">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>{{ $carousels->count() }}</strong> slide{{ $carousels->count() > 1 ? 's' : '' }}
                            enregistré{{ $carousels->count() > 1 ? 's' : '' }}
                        </div>
                        <div>
                            <a href="{{ route('admin.carousels.create') }}" class="btn btn-outline-primary">
                                <i class="fas fa-plus-circle me-2"></i>Ajouter un slide
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Modals pour les images (déplacés ici pour éviter les conflits de z-index) -->
    @foreach($carousels as $carousel)
        @if($carousel->image)
            <div class="modal fade" id="imageModal{{ $carousel->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content shadow-lg border-0">
                        <div class="modal-header bg-light">
                            <h5 class="modal-title fw-bold text-dark">{{ $carousel->title }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-0 text-center bg-dark rounded-bottom overflow-hidden">
                            <img src="{{ asset('storage/' . $carousel->image) }}" alt="{{ $carousel->image_alt }}" class="img-fluid"
                                style="max-height: 85vh; width: auto; display: inline-block;">
                        </div>
                        @if($carousel->subtitle)
                            <div class="modal-footer bg-light justify-content-start">
                                <p class="text-muted mb-0 small"><i class="fas fa-info-circle me-2"></i>{{ $carousel->subtitle }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    @endforeach

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Animation au chargement
            const cards = document.querySelectorAll('.carousel-admin .fade-in');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.05}s`;
            });

            // Gestion des suppressions avec SweetAlert2
            const deleteButtons = document.querySelectorAll('.delete-slide');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    const slideId = this.getAttribute('data-id');
                    const slideTitle = this.getAttribute('data-title');

                    Swal.fire({
                        title: 'Êtes-vous sûr ?',
                        html: `
                            <div class="text-start">
                                <p class="mb-3">Vous êtes sur le point de supprimer le slide :</p>
                                <div class="alert alert-warning py-2 mb-3">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    <strong>"${slideTitle}"</strong>
                                </div>
                                <p class="text-danger mb-0">
                                    <i class="fas fa-info-circle me-2"></i>
                                    Cette action est irréversible. L'image associée sera également supprimée.
                                </p>
                            </div>
                        `,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#dc3545',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Oui, supprimer !',
                        cancelButtonText: 'Annuler',
                        reverseButtons: true,
                        backdrop: true,
                        allowOutsideClick: false,
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        },
                        customClass: {
                            confirmButton: 'btn btn-danger px-4 py-2',
                            cancelButton: 'btn btn-outline-secondary px-4 py-2',
                            popup: 'rounded-3'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Afficher une animation de chargement
                            Swal.fire({
                                title: 'Suppression en cours...',
                                text: 'Veuillez patienter',
                                allowOutsideClick: false,
                                didOpen: () => {
                                    Swal.showLoading();
                                }
                            });

                            // Soumettre le formulaire
                            document.getElementById(`delete-form-${slideId}`).submit();
                        }
                    });
                });
            });

            // Animation des boutons
            const actionButtons = document.querySelectorAll('.btn-edit, .btn-delete, .btn-primary, .btn-outline-primary');
            actionButtons.forEach(button => {
                button.addEventListener('mouseenter', function () {
                    this.style.transform = 'translateY(-3px)';
                });

                button.addEventListener('mouseleave', function () {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Animation des lignes du tableau au survol
            const tableRows = document.querySelectorAll('.carousel-admin tbody tr');
            tableRows.forEach(row => {
                row.addEventListener('mouseenter', function () {
                    this.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
                });
            });

            // Gestion des messages de succès avec SweetAlert2
            @if(session('success'))
                Swal.fire({
                    title: 'Succès !',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                    toast: true,
                    position: 'top-end',
                    background: 'linear-gradient(135deg, #06634e, #78ac11)',
                    color: '#ffffff',
                    showClass: {
                        popup: 'animate__animated animate__slideInRight animate__faster'
                    }
                });
            @endif

            // Gestion des erreurs avec SweetAlert2
            @if($errors->any())
                Swal.fire({
                    title: 'Erreur !',
                    html: `
                            <div class="text-start">
                                <p class="mb-2">Des erreurs sont survenues :</p>
                                <ul class="list-unstyled">
                                    @foreach($errors->all() as $error)
                                        <li class="text-danger mb-1">
                                            <i class="fas fa-times-circle me-2"></i> {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        `,
                    icon: 'error',
                    confirmButtonColor: '#dc3545',
                    confirmButtonText: 'OK',
                    customClass: {
                        popup: 'rounded-3'
                    }
                });
            @endif
        });

        // Fonction pour confirmer la navigation
        window.addEventListener('beforeunload', function (e) {
            const hasUnsavedChanges = document.querySelector('form[data-unsaved]');
            if (hasUnsavedChanges) {
                e.preventDefault();
                e.returnValue = 'Vous avez des modifications non enregistrées. Êtes-vous sûr de vouloir quitter ?';
                return e.returnValue;
            }
        });
    </script>

@endsection