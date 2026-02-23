@extends('admin.layouts.template')

@section('title', 'Ajouter une question FAQ')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Nouvelle Question</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.faqs.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" name="question" id="question" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="answer">Réponse</label>
                            <textarea name="answer" id="answer" rows="5" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="sort_order">Ordre d'affichage</label>
                            <input type="number" name="sort_order" id="sort_order" class="form-control" value="0">
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" checked>
                                <label class="custom-control-label" for="is_active">Actif</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                        <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection