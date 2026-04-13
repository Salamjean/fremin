@extends('home.layouts.template')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section institutional-base" style="background: #f8f9fa; padding: 100px 0 60px;">
        <div class="container text-center" data-aos="fade-up">
            <h1 class="refined-title" style="color: #1a1a1a; font-weight: 800;">Cérémonies & Ateliers</h1>
            <p class="lead-text" style="max-width: 800px; margin: 20px auto;">Retrouvez ici les cérémonies officielles et
                les ateliers techniques organisés par le FREMIN.</p>
            <div class="tricolor-line shadow-sm mx-auto"
                style="width: 100px; height: 4px; background: linear-gradient(to right, #FF8200 33.33%, #fff 33.33%, #fff 66.66%, black 66.66%);">
            </div>
        </div>
    </section>

    <section class="activities-tabs py-5">
        <div class="container">

            <!-- Tabs Navigation -->
            <ul class="nav nav-pills justify-content-center mb-5" id="activityTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $activeTab == 'ceremonies' ? 'active' : '' }}" id="ceremonies-tab"
                        data-bs-toggle="pill" data-bs-target="#ceremonies-content" type="button" role="tab"
                        aria-controls="ceremonies-content"
                        aria-selected="{{ $activeTab == 'ceremonies' ? 'true' : 'false' }}"
                        style="border-radius: 30px; padding: 10px 30px; font-weight: 700;">
                        Cérémonies
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $activeTab == 'ateliers' ? 'active' : '' }}" id="ateliers-tab"
                        data-bs-toggle="pill" data-bs-target="#ateliers-content" type="button" role="tab"
                        aria-controls="ateliers-content" aria-selected="{{ $activeTab == 'ateliers' ? 'true' : 'false' }}"
                        style="border-radius: 30px; padding: 10px 30px; font-weight: 700;">
                        Ateliers
                    </button>
                </li>
            </ul>

            <!-- Tabs Content -->
            <div class="tab-content" id="activityTabsContent">

                <!-- Cérémonies Tab -->
                <div class="tab-pane fade {{ $activeTab == 'ceremonies' ? 'show active' : '' }}" id="ceremonies-content"
                    role="tabpanel" aria-labelledby="ceremonies-tab">
                    <div class="row g-4">
                        @if($page && $page->items)
                            @foreach(collect($page->items)->where('type', 'ceremonie') as $item)
                                <div class="col-12" data-aos="fade-up">
                                    <div class="card-premium h-60 overflow-hidden shadow-sm p-4">
                                        <h3 class="mb-3" style="color: black; font-weight: 700;">{{ $item['title'] ?? '' }}</h3>

                                        @if(!empty($item['video_url']))
                                            @php
                                                $videoUrl = $item['video_url'];
                                                if (strpos($videoUrl, 'youtube.com') !== false || strpos($videoUrl, 'youtu.be') !== false) {
                                                    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $videoUrl, $match)) {
                                                        $videoId = $match[1];
                                                        $videoUrl = "https://www.youtube.com/embed/" . $videoId . "?rel=0&loop=1&playlist=" . $videoId;
                                                    }
                                                }
                                            @endphp
                                            <div class="ratio ratio-16x9 mb-3 rounded overflow-hidden shadow-sm">
                                                <iframe src="{{ $videoUrl }}" title="Video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen
                                                    class="w-100 h-60 border-0"></iframe>
                                            </div>
                                        @endif

                                        @if(isset($item['images']) && count($item['images']) > 0)
                                            <div class="row g-3 mb-4 gallery-wrapper">
                                                @php $imgCount = count($item['images']); @endphp
                                                @foreach($item['images'] as $imgIndex => $image)
                                                    <div class="{{ $imgCount == 1 ? 'col-12' : ($imgCount == 2 ? 'col-md-6' : 'col-md-4') }}">
                                                        <div class="activity-gallery-item {{ $imgCount == 1 ? 'large' : '' }}">
                                                            <img src="{{ str_starts_with($image, 'pages/') ? asset('storage/' . $image) : asset('assets/img/' . $image) }}"
                                                                alt="Image {{ $imgIndex + 1 }}">
                                                            <div class="gallery-overlay">
                                                                <i class="fas fa-search-plus"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif

                                        <div class="text-muted" style="font-size: 1.15rem; line-height: 1.6; text-align: justify;">
                                            {!! nl2br(e($item['description'] ?? '')) !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <!-- Ateliers Tab -->
                <div class="tab-pane fade {{ $activeTab == 'ateliers' ? 'show active' : '' }}" id="ateliers-content"
                    role="tabpanel" aria-labelledby="ateliers-tab">
                    <div class="row g-4">
                        @if($page && $page->items)
                            @foreach(collect($page->items)->where('type', 'atelier') as $item)
                                <div class="col-12" data-aos="fade-up">
                                    <div class="card-premium h-100 overflow-hidden shadow-sm p-4">
                                        <h3 class="mb-3" style="color: black; font-weight: 700;">{{ $item['title'] ?? '' }}</h3>

                                        @if(!empty($item['video_url']))
                                            @php
                                                $videoUrl = $item['video_url'];
                                                if (strpos($videoUrl, 'youtube.com') !== false || strpos($videoUrl, 'youtu.be') !== false) {
                                                    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $videoUrl, $match)) {
                                                        $videoId = $match[1];
                                                        $videoUrl = "https://www.youtube.com/embed/" . $videoId . "?rel=0&loop=1&playlist=" . $videoId;
                                                    }
                                                }
                                            @endphp
                                            <div class="ratio ratio-16x9 mb-3 rounded overflow-hidden">
                                                <iframe src="{{ $videoUrl }}" title="Video player" allowfullscreen
                                                    class="w-100 h-100 border-0"></iframe>
                                            </div>
                                        @endif

                                        @if(isset($item['images']) && count($item['images']) > 0)
                                            <div class="row g-3 mb-4 gallery-wrapper">
                                                @php $imgCount = count($item['images']); @endphp
                                                @foreach($item['images'] as $imgIndex => $image)
                                                    <div class="{{ $imgCount == 1 ? 'col-12' : ($imgCount == 2 ? 'col-md-6' : 'col-md-4') }}">
                                                        <div class="activity-gallery-item {{ $imgCount == 1 ? 'large' : '' }}">
                                                            <img src="{{ str_starts_with($image, 'pages/') ? asset('storage/' . $image) : asset('assets/img/' . $image) }}"
                                                                alt="Image {{ $imgIndex + 1 }}">
                                                            <div class="gallery-overlay">
                                                                <i class="fas fa-search-plus"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif

                                        <div class="text-muted" style="font-size: 1.15rem; line-height: 1.6; text-align: justify;">
                                            {!! nl2br(e($item['description'] ?? '')) !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>

    <style>
        .nav-pills .nav-link {
            color: #1a1a1a;
            background-color: #f8f9fa;
            margin: 0 10px;
            transition: all 0.3s ease;
        }

        .nav-pills .nav-link.active {
            background-color: black;
            color: white;
            box-shadow: 0 4px 10px rgba(0, 155, 58, 0.3);
        }

        .nav-pills .nav-link:hover:not(.active) {
            background-color: #e9ecef;
        }

        /* Augmentation de la taille de la police pour les textes */
        p.text-muted {
            font-size: 1.15rem;
            line-height: 1.6;
            text-align: justify;
            hyphens: auto;
            -webkit-hyphens: auto;
            -moz-hyphens: auto;
        }

        p.lead-text {
            font-size: 1.25rem;
        }

        /* Styles pour la galerie premium */
        .activity-gallery-item {
            position: relative;
            height: 250px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            cursor: pointer;
            border: 1px solid rgba(0,0,0,0.05);
        }

        .activity-gallery-item.large {
            height: 450px;
        }

        .activity-gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .activity-gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        }

        .activity-gallery-item:hover img {
            transform: scale(1.08);
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 155, 58, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .activity-gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-overlay i {
            color: white;
            font-size: 2rem;
            transform: scale(0.8);
            transition: transform 0.3s ease;
        }

        .activity-gallery-item:hover .gallery-overlay i {
            transform: scale(1);
        }

        @media (max-width: 768px) {
            .activity-gallery-item, .activity-gallery-item.large {
                height: 250px;
            }
        }
    </style>

@endsection