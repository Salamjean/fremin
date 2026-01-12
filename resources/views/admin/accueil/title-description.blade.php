{{-- resources/views/admin/accueil/carousels/index.blade.php --}}
@extends('admin.layouts.template')
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Gestion du Carousel</h5>
        <a href="{{ route('admin.carousels.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Ajouter un slide
        </a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Ordre</th>
                        <th>Image</th>
                        <th>Titre</th>
                        <th>Sous-titre</th>
                        <th>Position</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carousels as $carousel)
                    <tr>
                        <td>{{ $carousel->order }}</td>
                        <td>
                            @if($carousel->image)
                                <img src="{{ asset('storage/' . $carousel->image) }}" 
                                     alt="{{ $carousel->image_alt }}" 
                                     style="width: 80px; height: 60px; object-fit: cover;">
                            @else
                                <span class="text-muted">Aucune image</span>
                            @endif
                        </td>
                        <td>{{ Str::limit($carousel->title, 50) }}</td>
                        <td>{{ Str::limit($carousel->subtitle, 30) }}</td>
                        <td>
                            <span class="badge bg-{{ $carousel->layout == 'left' ? 'info' : 'warning' }}">
                                {{ $carousel->layout == 'left' ? 'Gauche' : 'Droite' }}
                            </span>
                        </td>
                        <td>
                            <span class="badge bg-{{ $carousel->is_active ? 'success' : 'danger' }}">
                                {{ $carousel->is_active ? 'Actif' : 'Inactif' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.carousels.edit', $carousel) }}" 
                               class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.carousels.destroy', $carousel) }}" 
                                  method="POST" 
                                  class="d-inline"
                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce slide ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection