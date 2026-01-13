@extends('home.layouts.template')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb"
        style="background: linear-gradient(rgba(0, 99, 45, 0.7), rgba(0, 99, 45, 0.7)), url('{{ asset('assets/img/carousel-2.png') }}') center center no-repeat; background-size: cover;">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ $project->title }}</h3>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="#">Projets</a></li>
                <li class="breadcrumb-item active text-white">{{ strtoupper($project->type ?? 'Projet') }}</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Project Detail Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="project-img rounded shadow-lg overflow-hidden">
                        @if ($project->image)
                            <img src="{{ Str::startsWith($project->image, 'assets') ? asset($project->image) : asset('storage/' . $project->image) }}"
                                class="img-fluid w-100" alt="{{ $project->title }}">
                        @else
                            <img src="{{ asset('assets/img/carousel-1.png') }}" class="img-fluid w-100"
                                alt="{{ $project->title }}">
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.1s">
                    <div class="section-title">
                        <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">{{ $project->subtitle }}</h4>
                        <h1 class="display-5 mb-4">{{ $project->title }}</h1>
                        <div class="project-content mb-4" style="text-align: justify; line-height: 1.8; color: #666;">
                            {!! nl2br(e($project->description)) !!}
                        </div>
                        <a href="{{ route('home.contact') }}" class="btn btn-primary rounded-pill py-3 px-5">Nous
                            Contacter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Project Detail End -->

    <style>
        .project-img img {
            transition: transform 0.5s ease;
        }

        .project-img:hover img {
            transform: scale(1.05);
        }

        .project-content {
            font-size: 1.1rem;
        }
    </style>
@endsection