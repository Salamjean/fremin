@extends('admin.layouts.template')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <style>
        .presentation-missions-admin {
            --primary-dark: #06634e;
            --primary-light: #78ac11;
            --white: #ffffff;
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .presentation-missions-admin .card {
            border: none;
            margin: 2rem 0;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
        }

        .presentation-missions-admin .card-header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            border-radius: 16px 16px 0 0;
            padding: 1.5rem 2rem;
            color: white;
        }

        .presentation-missions-admin .btn-primary {
            background-color: rgba(255, 255, 255, 0.15);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            color: white;
            transition: var(--transition);
        }

        .presentation-missions-admin .btn-primary:hover {
            background-color: rgba(255, 255, 255, 0.25);
            transform: translateY(-2px);
        }

        .presentation-missions-admin .table thead th {
            background-color: #f8f9fa;
            color: var(--primary-dark);
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            padding: 1.25rem;
        }

        .presentation-missions-admin .table tbody td {
            padding: 1.25rem;
            vertical-align: middle;
        }

        .presentation-missions-admin .icon-wrapper {
            width: 50px;
            height: 50px;
            background-color: rgba(6, 99, 78, 0.05);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-dark);
            font-size: 1.25rem;
            border: 1px solid rgba(6, 99, 78, 0.1);
        }

        .presentation-missions-admin .badge-status {
            padding: 0.5rem 1rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.8rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .presentation-missions-admin .badge-active {
            background-color: rgba(6, 99, 78, 0.1);
            color: var(--primary-dark);
            border: 1px solid rgba(6, 99, 78, 0.2);
        }

        .presentation-missions-admin .badge-inactive {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            border: 1px solid rgba(220, 53, 69, 0.2);
        }

        .presentation-missions-admin .action-btn {
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

        .presentation-missions-admin .btn-edit {
            background-color: rgba(120, 172, 11, 0.1);
            color: var(--primary-light);
            text-decoration: none;
        }

        .presentation-missions-admin .btn-delete {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
        }

        .presentation-missions-admin .btn-edit:hover {
            background-color: var(--primary-light);
            color: white !important;
            transform: translateY(-2px);
        }

        .presentation-missions-admin .btn-delete:hover {
            background-color: #dc3545;
            color: white;
            transform: translateY(-2px);
        }
    </style>

    <div class="presentation-missions-admin container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-bullseye me-2"></i> Missions (Page Présentation)</h5>
                <a href="{{ route('admin.presentation-missions.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i> Nouvelle Mission
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 80px">Ordre</th>
                                <th style="width: 100px;">Icône</th>
                                <th>Titre</th>
                                <th>Description</th>
                                <th class="text-center">Statut</th>
                                <th class="text-center" style="width: 150px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($missions as $mission)
                                <tr>
                                    <td class="text-center fw-bold text-muted">{{ $mission->sort_order }}</td>
                                    <td>
                                        <div class="icon-wrapper">
                                            <i class="{{ $mission->icon }}"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <h6 class="mb-0 fw-bold text-dark">{{ $mission->title }}</h6>
                                    </td>
                                    <td>
                                        <small class="text-muted text-wrap d-block"
                                            style="max-width: 400px;">{{ Str::limit($mission->description, 120) }}</small>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge-status {{ $mission->is_active ? 'badge-active' : 'badge-inactive' }}"
                                            onclick="toggleMissionStatus({{ $mission->id }})"
                                            id="status-badge-{{ $mission->id }}">
                                            <i
                                                class="fas fa-{{ $mission->is_active ? 'check-circle' : 'times-circle' }} me-1"></i>
                                            {{ $mission->is_active ? 'Actif' : 'Inactif' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.presentation-missions.edit', $mission) }}"
                                            class="action-btn btn-edit" title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="action-btn btn-delete"
                                            onclick="deleteMission({{ $mission->id }}, '{{ addslashes($mission->title) }}')"
                                            title="Supprimer">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <form id="delete-form-{{ $mission->id }}"
                                            action="{{ route('admin.presentation-missions.destroy', $mission) }}" method="POST"
                                            class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">Aucune mission enregistrée.</td>
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
        function toggleMissionStatus(id) {
            fetch(`{{ url('admin/presentation-missions') }}/${id}/toggle-status`, {
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

        function deleteMission(id, title) {
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