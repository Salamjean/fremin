@extends('admin.layouts.template')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <style>
        .governance-admin {
            --primary-dark: #06634e;
            --primary-light: #78ac11;
            --white: #ffffff;
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .governance-admin .card {
            border: none;
            margin: 2rem 0;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
        }

        .governance-admin .card-header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            border-radius: 16px 16px 0 0;
            padding: 1.5rem 2rem;
            color: white;
        }

        .governance-admin .btn-primary {
            background-color: rgba(255, 255, 255, 0.15);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            color: white;
            transition: var(--transition);
        }

        .governance-admin .table thead th {
            background-color: #f8f9fa;
            color: var(--primary-dark);
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            padding: 1.25rem;
        }

        .governance-admin .table tbody td {
            padding: 1.25rem;
            vertical-align: middle;
        }

        .governance-admin .badge-status {
            padding: 0.5rem 1rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.8rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .governance-admin .badge-active {
            background-color: rgba(6, 99, 78, 0.1);
            color: var(--primary-dark);
            border: 1px solid rgba(6, 99, 78, 0.2);
        }

        .governance-admin .badge-inactive {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            border: 1px solid rgba(220, 53, 69, 0.2);
        }

        .governance-admin .action-btn {
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

        .governance-admin .btn-edit {
            background-color: rgba(120, 172, 11, 0.1);
            color: var(--primary-light);
            text-decoration: none;
        }

        .governance-admin .btn-delete {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
        }
    </style>

    <div class="governance-admin container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-users-cog me-2"></i> Gouvernance</h5>
                <a href="{{ route('admin.presentation-governances.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i> Nouvel Élément
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 80px">Ordre</th>
                                <th>Clé / Identifiant</th>
                                <th>Titre</th>
                                <th>Description</th>
                                <th class="text-center">Statut</th>
                                <th class="text-center" style="width: 150px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($governances as $gov)
                                <tr>
                                    <td class="text-center fw-bold text-muted">{{ $gov->sort_order }}</td>
                                    <td><code>{{ $gov->section_key }}</code></td>
                                    <td>
                                        <h6 class="mb-0 fw-bold text-dark">{{ $gov->title }}</h6>
                                    </td>
                                    <td>
                                        <small class="text-muted text-wrap d-block"
                                            style="max-width: 400px;">{{ Str::limit($gov->description, 100) }}</small>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge-status {{ $gov->is_active ? 'badge-active' : 'badge-inactive' }}"
                                            onclick="toggleGovStatus({{ $gov->id }})" id="status-badge-{{ $gov->id }}">
                                            <i class="fas fa-{{ $gov->is_active ? 'check-circle' : 'times-circle' }} me-1"></i>
                                            {{ $gov->is_active ? 'Actif' : 'Inactif' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.presentation-governances.edit', $gov) }}"
                                            class="action-btn btn-edit" title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="action-btn btn-delete"
                                            onclick="deleteGov({{ $gov->id }}, '{{ addslashes($gov->title) }}')"
                                            title="Supprimer">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <form id="delete-form-{{ $gov->id }}"
                                            action="{{ route('admin.presentation-governances.destroy', $gov) }}" method="POST"
                                            class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">Aucun élément enregistré.</td>
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
        function toggleGovStatus(id) {
            fetch(`{{ url('admin/presentation-governances') }}/${id}/toggle-status`, {
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

        function deleteGov(id, title) {
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