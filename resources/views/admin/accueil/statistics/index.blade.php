@extends('admin.layouts.template')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <style>
        .stats-admin {
            --primary-dark: #06634e;
            --primary-light: #78ac11;
            --white: #ffffff;
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .stats-admin .card {
            border: none;
            margin: 2rem 0;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
        }

        .stats-admin .card-header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            border-radius: 16px 16px 0 0;
            padding: 1.5rem 2rem;
            color: white;
        }

        .stats-admin .btn-primary {
            background-color: rgba(255, 255, 255, 0.15);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            color: white;
            transition: var(--transition);
        }

        .stats-admin .btn-primary:hover {
            background-color: rgba(255, 255, 255, 0.25);
            transform: translateY(-2px);
        }

        .stats-admin .table thead th {
            background-color: #f8f9fa;
            color: var(--primary-dark);
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            padding: 1.25rem;
        }

        .stats-admin .table tbody td {
            padding: 1.25rem;
            vertical-align: middle;
        }

        .stats-admin .icon-box {
            width: 45px;
            height: 45px;
            background: rgba(120, 172, 11, 0.1);
            color: var(--primary-light);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }

        .stats-admin .badge-status {
            padding: 0.5rem 1rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.8rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .stats-admin .badge-active {
            background-color: rgba(6, 99, 78, 0.1);
            color: var(--primary-dark);
            border: 1px solid rgba(6, 99, 78, 0.2);
        }

        .stats-admin .badge-inactive {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            border: 1px solid rgba(220, 53, 69, 0.2);
        }

        .stats-admin .action-btn {
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

        .stats-admin .btn-edit {
            background-color: rgba(120, 172, 11, 0.1);
            color: var(--primary-light);
        }

        .stats-admin .btn-edit:hover {
            background-color: var(--primary-light);
            color: white;
            transform: translateY(-2px);
        }

        .stats-admin .btn-delete {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
        }

        .stats-admin .btn-delete:hover {
            background-color: #dc3545;
            color: white;
            transform: translateY(-2px);
        }
    </style>

    <div class="stats-admin container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-chart-line me-2"></i> Statistiques du FREMIN</h5>
                <a href="{{ route('admin.statistics.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i> Nouvelle Statistique
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 80px">Ordre</th>
                                <th style="width: 80px">Icone</th>
                                <th>Libellé</th>
                                <th>Valeur</th>
                                <th class="text-center">Statut</th>
                                <th class="text-center" style="width: 150px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($statistics as $stat)
                                <tr>
                                    <td class="text-center">
                                        <span class="fw-bold text-muted">{{ $stat->sort_order }}</span>
                                    </td>
                                    <td>
                                        <div class="icon-box">
                                            <i class="{{ $stat->icon }}"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="fw-semibold text-dark">{{ $stat->label }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border p-2">{{ $stat->value }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge-status {{ $stat->is_active ? 'badge-active' : 'badge-inactive' }}"
                                            onclick="toggleStatStatus({{ $stat->id }})" id="status-badge-{{ $stat->id }}">
                                            <i class="fas fa-{{ $stat->is_active ? 'check-circle' : 'times-circle' }} me-1"></i>
                                            {{ $stat->is_active ? 'Actif' : 'Inactif' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.statistics.edit', $stat) }}" class="action-btn btn-edit"
                                            title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="action-btn btn-delete"
                                            onclick="deleteStat({{ $stat->id }}, '{{ addslashes($stat->label) }}')"
                                            title="Supprimer">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <form id="delete-form-{{ $stat->id }}"
                                            action="{{ route('admin.statistics.destroy', $stat) }}" method="POST"
                                            class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <div class="text-muted">
                                            <i class="fas fa-info-circle fa-3x mb-3"></i>
                                            <p class="mb-0">Aucune statistique enregistrée.</p>
                                        </div>
                                    </td>
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
        function toggleStatStatus(id) {
            fetch(`{{ url('admin/statistics') }}/${id}/toggle-status`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const badge = document.getElementById(`status-badge-${id}`);
                        if (data.is_active) {
                            badge.className = 'badge-status badge-active';
                            badge.innerHTML = '<i class="fas fa-check-circle me-1"></i> Actif';
                        } else {
                            badge.className = 'badge-status badge-inactive';
                            badge.innerHTML = '<i class="fas fa-times-circle me-1"></i> Inactif';
                        }
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: 'Statut mis à jour',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                });
        }

        function deleteStat(id, label) {
            Swal.fire({
                title: 'Supprimer ?',
                text: `Voulez-vous vraiment supprimer "${label}" ?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${id}`).submit();
                }
            });
        }

        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Succès',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @endif
    </script>
@endsection