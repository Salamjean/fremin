@extends('home.layouts.template')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section institutional-base" style="background: #f8f9fa; padding: 100px 0 60px;">
        <div class="container text-center" data-aos="fade-up">
            <h1 class="refined-title" style="color: #1a1a1a; font-weight: 800;">{{ __('realizations') }}</h1>
            <p class="lead-text" style="max-width: 800px; margin: 20px auto;">Liste des entreprises accompagnées par secteur
                d'activité et type d'intervention.</p>
            <div class="tricolor-line shadow-sm mx-auto"
                style="width: 100px; height: 4px; background: linear-gradient(to right, #FF8200 33.33%, #fff 33.33%, #fff 66.66%, #009B3A 66.66%);">
            </div>
        </div>
    </section>

    @include('home.projets.modernisation-nav')

    <section class="realizations-list py-5">
        <div class="container">
            <div data-aos="fade-up">
                <div class="content-box-premium">
                    <h2 class="section-title mb-4" style="color: #009B3A; font-weight: 800;">Liste des
                        entreprises mises à niveau</h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mt-3 align-middle">
                            <thead class="table-dark" style="background-color: #009B3A;">
                                <tr>
                                    <th>N°</th>
                                    <th>RAISON SOCIALE</th>
                                    <th>ACTIVITE</th>
                                    <th>APPUI SOLLICITE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($page->realisations) && is_array($page->realisations))
                                    @foreach($page->realisations as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td class="fw-bold">{{ $item['name'] ?? '' }}</td>
                                            <td>{{ $item['sector'] ?? '' }}</td>
                                            <td>{!! nl2br(e($item['equipment'] ?? '')) !!}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection