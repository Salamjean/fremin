@extends('admin.layouts.template')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .page-header {
            background: linear-gradient(135deg, #06634e, #78ac11);
            color: white;
            padding: 2rem;
            border-radius: 16px;
            margin-bottom: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .page-card {
            border: none;
            border-radius: 16px;
            transition: transform 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .page-card:hover {
            transform: translateY(-5px);
        }
    </style>

    <div class="container-fluid py-4">
        <div class="page-header d-flex justify-content-between align-items-center">
            <div>
                <h2 class="mb-1">Gestion des Pages Projets</h2>
                <p class="mb-0">Gérez le contenu des pages institutionnelles des projets.</p>
            </div>
        </div>

        <div class="row g-4">
            @foreach($pages as $page)
                <div class="col-md-4">
                    <div class="card h-100 page-card">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-success">{{ $page->title }}</h5>
                            <p class="card-text text-muted small">{{ $page->subtitle }}</p>
                            <div class="mt-auto pt-3 border-top">
                                <a href="{{ route('admin.project-pages.edit', $page->id) }}"
                                    class="btn btn-outline-success btn-sm w-100 mb-2">
                                    <i class="fas fa-edit me-1"></i> Modifier le contenu
                                </a>
                                <span class="badge {{ $page->is_active ? 'bg-success' : 'bg-danger' }} w-100">
                                    {{ $page->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection