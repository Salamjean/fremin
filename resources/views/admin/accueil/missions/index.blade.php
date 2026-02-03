@extends('admin.layouts.template')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <style>
        .missions-admin {
            --primary-dark: #06634e;
            --primary-light: #78ac11;
            --white: #ffffff;
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .missions-admin .card {
            border: none;
            margin: 2rem 0;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
        }

        .missions-admin .card-header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            border-radius: 16px 16px 0 0;
            padding: 1.5rem 2rem;
            color: white;
        }

        .missions-admin .btn-primary {
            background-color: rgba(255, 255, 255, 0.15);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            color: white;
        }

        .missions-admin .table thead th {
            background-color: #f8f9fa;
            color: var(--primary-dark);
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.85rem;
            padding: 1.25rem;
        }

        .missions-admin .table tbody td {
            padding: 1.25rem;
            vertical-align: middle;
        }

        .missions-admin .icon-circle {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }

        .missions-admin .theme-orange {
            background: rgba(253, 126, 20, 0.1);
            color: #fd7e14;
        }

        .missions-admin .theme-green {
            background: rgba(120, 172, 11, 0.1);
            color: var(--primary-light);
        }

        .missions-admin .theme-dark {
            background: rgba(33, 37, 41, 0.1);
            color: #212529;
        }

        .missions-admin .badge-status {
            padding: 0.5rem 1rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.8rem;
            cursor: pointer;
        }

        .missions-admin .badge-active {
            background-color: rgba(6, 99, 78, 0.1);
            color: var(--primary-dark);
            border: 1px solid rgba(6, 99, 78, 0.2);
        }

        .missions-admin .badge-inactive {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            border: 1px solid rgba(220, 53, 69, 0.2);
        }

        .missions-admin .action-btn {
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

        .missions-admin .btn-edit {
            background-color: rgba(120, 172, 11, 0.1);
            color: var(--primary-light);
        }

        .missions-admin .btn-delete {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
        }
    </style>

    <div class="missions-admin container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-bullseye me-2"></i> Nos Missions (Cartes)</h5>
                <a href="{{ route('admin.mission-cards.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i> Nouvelle Carte
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 80px">Ordre</th>
                                <th style="width: 80px">Icone</th>
                                <th>Titre</th>
                                <th>Thème</th>
                                <th>Points clés</th>
                                <th class="text-center">Statut</th>
                                <th class="text-center" style="width: 150px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($missionCards as $card)
                                <tr>
                                    <td class="text-center fw-bold text-muted">{{ $card->sort_order }}</td>
                                    <td>
                                        <div class="icon-circle theme-{{ $card->theme }}">
                                            <i class="{{ $card->icon }}"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="fw-bold text-dark">{{ $card->title }}</div>
                                        <small class="text-muted">{{ Str::limit($card->description, 50) }}</small>
                                    </td>
                                    <td>
                                        <span
                                            class="badge rounded-pill bg-{{ $card->theme == 'dark' ? 'dark' : ($card->theme == 'orange' ? 'warning' : 'success') }}">
                                            {{ ucfirst($card->theme) }}
                                        </span>
                                    </td>
                                    <td>
                                        <small class="text-muted">
                                            {{ count($card->list_items ?? []) }} point(s)
                                        </small>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge-status {{ $card->is_active ? 'badge-active' : 'badge-inactive' }}"
                                            onclick="toggleMissionStatus({{ $card->id }})" id="status-badge-{{ $card->id }}">
                                            <i class="fas fa-{{ $card->is_active ? 'check-circle' : 'times-circle' }} me-1"></i>
                                            {{ $card->is_active ? 'Actif' : 'Inactif' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.mission-cards.edit', $card) }}" class="action-btn btn-edit"
                                            title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="action-btn btn-delete"
                                            onclick="deleteMission({{ $card->id }}, '{{ addslashes($card->title) }}')"
                                            title="Supprimer">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <form id="delete-form-{{ $card->id }}"
                                            action="{{ route('admin.mission-cards.destroy', $card) }}" method="POST"
                                            class="d-none">
                                            @csrf @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5 text-muted">Aucune carte mission enregistrée.</td>
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
            fetch(`{{ url('admin/mission-cards') }}/${id}/toggle-status`, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' }
            })
                .then(response => response.json())
                .then(data => {
                    const badge = document.getElementById(`status-badge-${id}`);
                    if (data.is_active) {
                        badge.className = 'badge-status badge-active';
                        badge.innerHTML = '<i class="fas fa-check-circle me-1"></i> Actif';
                    } else {
                        badge.className = 'badge-status badge-inactive';
                        badge.innerHTML = '<i class="fas fa-times-circle me-1"></i> Inactif';
                    }
                });
        }

        function deleteMission(id, title) {
            Swal.fire({
                title: 'Supprimer ?',
                text: `Voulez-vous supprimer la carte "${title}" ?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Oui, supprimer'
            }).then((result) => { if (result.isConfirmed) document.getElementById(`delete-form-${id}`).submit(); });
        }
    </script>
@endsection