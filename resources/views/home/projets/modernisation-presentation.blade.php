@extends('home.layouts.template')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section institutional-base" style="background: #f8f9fa; padding: 100px 0 60px;">
        <div class="container text-center" data-aos="fade-up">
            <h1 class="refined-title" style="color: #1a1a1a; font-weight: 800;">{{ __('modernization_industrial') }}</h1>
            <p class="lead-text" style="max-width: 800px; margin: 20px auto;">{{ __('project_presentation') }} du programme
                de mise à niveau.</p>
            <div class="tricolor-line shadow-sm mx-auto"
                style="width: 100px; height: 4px; background: linear-gradient(to right, #FF8200 33.33%, #fff 33.33%, #fff 66.66%, #009B3A 66.66%);">
            </div>
        </div>
    </section>

    @include('home.projets.modernisation-nav')

    <section class="project-presentation py-5">
        <div class="container">
            <div data-aos="fade-up">
                {!! $page->content ?? '' !!}
            </div>
        </div>
    </section>

@endsection