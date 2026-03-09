@extends('admin.layouts.template')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <style>
        .strategic-axes-admin {
            --primary-dark: #06634e;
            --primary-light: #78ac11;
            --white: #ffffff;
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .strategic-axes-admin .card {
            border: none;
            margin: 2rem 0;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
        }

        .strategic-axes-admin .card-header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            border-radius: 16px 16px 0 0;
            padding: 1.5rem 2rem;
            color: white;
        }

        .strategic-axes-admin .btn-primary {
            background-color: rgba(255, 255, 255, 0.15);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            color: white;
            transition: var(--transition);
        }

        .strategic-axes-admin .btn-primary:hover {
            background-color: rgba(255, 255, 255, 0.25);
            transform: translateY(-2px);
        }

        .strategic-axes-admin .table thead th {
            background-color: #f8f9fa;
            color: var(--primary-dark);
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            padding: 1.25rem;
        }

        .strategic-axes-admin .table tbody td {
            padding: 1.25rem;
            vertical-align: middle;
        }

        .strategic-axes-admin .axis-img {
            width: 80px;
            height: 50px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .strategic-axes-admin .badge-status {
            padding: 0.5rem 1rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.8rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .strategic-axes-admin .badge-active {
            background-color: rgba(6, 99, 78, 0.1);
            color: var(--primary-dark);
            border: 1px solid rgba(6, 99, 78, 0.2);
        }

        .strategic-axes-admin .badge-inactive {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            border: 1px solid rgba(220, 53, 69, 0.2);
        }

        .strategic-axes-admin .action-btn {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin: 0 4px;
            transition: var(--transition);
            border: none;
        }

        .strategic-axes-admin .btn-edit {
            background-color: rgba(120, 172, 11, 0.1);
            color: var(--primary-light);
            text-decoration: none;
        }

        .strategic-axes-admin .btn-delete {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
        }

        .strategic-axes-admin .btn-edit:hover {
            background-color: var(--primary-light);
            color: white !important;
            transform: translateY(-2px);
        }

        .strategic-axes-admin .btn-delete:hover {
            background-color: #dc3545;
            color: white;
            transform: translateY(-2px);
        }
    </style>

    <div class="strategic-axes-admin container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-layer-group me-2"></i> Axes Stratégiques</h5>
                <a href="{{ route('admin.strategic-axes.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i> Nouvel Axe
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 80px">N°</th>
                                <th style="width: 120px;">Image</th>
                                <th>Titre</th>
                                <th>Description</th>
                                <th class="text-center">Statut</th>
                                <th class="text-center" style="width: 150px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($axes as $axis)
                                <tr>
                                    <td class="text-center fw-bold text-muted">{{ $axis->axis_number }}</td>
                                    <td>
                                        <img src="{{ asset($axis->image) }}" alt="Axe" class="axis-img">
                                    </td>
                                    <td>
                                        <h6 class="mb-0 fw-bold text-dark">{{ $axis->title }}</h6>
                                    </td>
                                    <td>
                                        <small class="text-muted text-wrap d-block"
                                            style="max-width: 400px;">{{ Str::limit($axis->description, 100) }}</small>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge-status {{ $axis->is_active ? 'badge-active' : 'badge-inactive' }}"
                                            onclick="toggleAxisStatus({{ $axis->id }})" id="status-badge-{{ $axis->id }}">
                                            <i class="fas fa-{{ $axis->is_active ? 'check-circle' : 'times-circle' }} me-1"></i>
                                            {{ $axis->is_active ? 'Actif' : 'Inactif' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.strategic-axes.edit', $axis) }}" class="action-btn btn-edit"
                                            title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="action-btn btn-delete"
                                            onclick="deleteAxis({{ $axis->id }}, '{{ addslashes($axis->title) }}')"
                                            title="Supprimer">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <form id="delete-form-{{ $axis->id }}"
                                            action="{{ route('admin.strategic-axes.destroy', $axis) }}" method="POST"
                                            class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">Aucun axe enregistré.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function toggleAxisStatus(id) {
            fetch(`{{ url('admin/strategic-axes') }}/${id}/toggle-status`, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' }
            })
                .then(response => response.json())
                .then(data => {
                    const badge = document.getElementById(`status-badge-${id}`);
                    if (data.success) {
                        const isActive = badge.classList.contains('badge-inactive');
                        if (isActive) {
                            badge.className = 'badge-status badge-active';
                            badge.innerHTML = '<i class="fas fa-check-circle me-1"></i> Actif';
                        } else {
                            badge.className = 'badge-status badge-inactive';
                            badge.innerHTML = '<i class="fas fa-times-circle me-1"></i> Inactif';
                        }
                    }
                });
        }

        function deleteAxis(id, title) {
            Swal.fire({
                title: 'Supprimer ?',
                text: `Voulez-vous vraiment supprimer "${title}" ?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Oui, supprimer'
            }).then((result) => { if (result.isConfirmed) document.getElementById(`delete-form-${id}`).submit(); });
        }
    </script>
@endsection