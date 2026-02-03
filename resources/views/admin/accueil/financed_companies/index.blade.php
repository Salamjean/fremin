@extends('admin.layouts.template')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <style>
        .financed-admin {
            --primary-dark: #06634e;
            --primary-light: #78ac11;
            --white: #ffffff;
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .financed-admin .card {
            border: none;
            margin: 2rem 0;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
        }

        .financed-admin .card-header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            border-radius: 16px 16px 0 0;
            padding: 1.5rem 2rem;
            color: white;
        }

        .financed-admin .btn-primary {
            background-color: rgba(255, 255, 255, 0.15);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            color: white;
            transition: var(--transition);
        }

        .financed-admin .btn-primary:hover {
            background-color: rgba(255, 255, 255, 0.25);
            transform: translateY(-2px);
        }

        .financed-admin .table thead th {
            background-color: #f8f9fa;
            color: var(--primary-dark);
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            padding: 1.25rem;
        }

        .financed-admin .table tbody td {
            padding: 1.25rem;
            vertical-align: middle;
        }

        .financed-admin .preview-container {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .financed-admin .img-preview {
            width: 50px;
            height: 50px;
            background: #f8f9fa;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .financed-admin .img-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .financed-admin .img-label {
            position: absolute;
            bottom: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.6);
            color: white;
            font-size: 8px;
            text-align: center;
            padding: 1px 0;
        }

        .financed-admin .badge-status {
            padding: 0.5rem 1rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.8rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .financed-admin .badge-active {
            background-color: rgba(6, 99, 78, 0.1);
            color: var(--primary-dark);
            border: 1px solid rgba(6, 99, 78, 0.2);
        }

        .financed-admin .badge-inactive {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            border: 1px solid rgba(220, 53, 69, 0.2);
        }

        .financed-admin .action-btn {
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

        .financed-admin .btn-edit {
            background-color: rgba(120, 172, 11, 0.1);
            color: var(--primary-light);
            text-decoration: none;
        }

        .financed-admin .btn-delete {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
        }

        .financed-admin .btn-edit:hover {
            background-color: var(--primary-light);
            color: white !important;
            transform: translateY(-2px);
        }

        .financed-admin .btn-delete:hover {
            background-color: #dc3545;
            color: white;
            transform: translateY(-2px);
        }
    </style>

    <div class="financed-admin container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-building me-2"></i> Dernières Entreprises Financées</h5>
                <a href="{{ route('admin.financed-companies.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i> Ajouter une Entreprise
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 80px">Ordre</th>
                                <th>Entreprise</th>
                                <th>Secteur</th>
                                <th>Aperçu (Avant/Après)</th>
                                <th class="text-center">Statut</th>
                                <th class="text-center" style="width: 150px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($companies as $company)
                                <tr>
                                    <td class="text-center">
                                        <span class="fw-bold text-muted">{{ $company->sort_order }}</span>
                                    </td>
                                    <td>
                                        <span class="fw-semibold text-dark">{{ $company->company_name }}</span>
                                    </td>
                                    <td>
                                        <span
                                            class="badge bg-info-subtle text-info border-info-subtle">{{ $company->industry }}</span>
                                    </td>
                                    <td>
                                        <div class="preview-container">
                                            <div class="img-preview">
                                                @if($company->image_before)
                                                    <img src="{{ asset('storage/' . $company->image_before) }}" alt="Before">
                                                    <div class="img-label">AVANT</div>
                                                @else
                                                    <i class="fas fa-image text-muted"></i>
                                                @endif
                                            </div>
                                            <i class="fas fa-chevron-right text-muted small"></i>
                                            <div class="img-preview">
                                                @if($company->image_after)
                                                    <img src="{{ asset('storage/' . $company->image_after) }}" alt="After">
                                                    <div class="img-label">APRÈS</div>
                                                @else
                                                    <i class="fas fa-image text-muted"></i>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge-status {{ $company->is_active ? 'badge-active' : 'badge-inactive' }}"
                                            onclick="toggleCompanyStatus({{ $company->id }})"
                                            id="status-badge-{{ $company->id }}">
                                            <i
                                                class="fas fa-{{ $company->is_active ? 'check-circle' : 'times-circle' }} me-1"></i>
                                            {{ $company->is_active ? 'Actif' : 'Inactif' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.financed-companies.edit', $company) }}"
                                            class="action-btn btn-edit" title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="action-btn btn-delete"
                                            onclick="deleteCompany({{ $company->id }}, '{{ addslashes($company->company_name) }}')"
                                            title="Supprimer">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <form id="delete-form-{{ $company->id }}"
                                            action="{{ route('admin.financed-companies.destroy', $company) }}" method="POST"
                                            class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">Aucune entreprise enregistrée.</td>
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
        function toggleCompanyStatus(id) {
            fetch(`{{ url('admin/financed-companies') }}/${id}/toggle-status`, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' }
            })
                .then(response => response.json())
                .then(data => {
                    const badge = document.getElementById(`status-badge-${id}`);
                    if (data.success) {
                        // Assuming the API returns the new status or we toggle it locally
                        // The controller returns {success: true} for now, but let's be robust
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

        function deleteCompany(id, name) {
            Swal.fire({
                title: 'Supprimer ?',
                text: `Voulez-vous vraiment supprimer "${name}" ?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Annuler'
            }).then((result) => { if (result.isConfirmed) document.getElementById(`delete-form-${id}`).submit(); });
        }
    </script>
@endsection