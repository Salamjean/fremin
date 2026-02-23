@extends('admin.layouts.template')

@section('title', 'Modifier une question FAQ')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Modifier la Question</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.faqs.update', $faq) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" name="question" id="question" class="form-control"
                                value="{{ $faq->question }}" required>
                        </div>

                        <div class="form-group">
                            <label for="answer">Réponse</label>
                            <textarea name="answer" id="answer" rows="5" class="form-control"
                                required>{{ $faq->answer }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="sort_order">Ordre d'affichage</label>
                            <input type="number" name="sort_order" id="sort_order" class="form-control"
                                value="{{ $faq->sort_order }}">
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" {{ $faq->is_active ? 'checked' : '' }}>
                                <label class="custom-control-label" for="is_active">Actif</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection