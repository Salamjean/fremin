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
                                            <div class="row g-2 mb-3">
                                                @foreach($item['images'] as $image)
                                                    <div
                                                        class="col-md-{{ count($item['images']) > 1 ? (count($item['images']) == 2 ? 6 : 4) : 12 }}">
                                                        <div class="bg-secondary rounded mb-2"
                                                            style="height: 300px; display: flex; align-items: center; justify-content: center; color: white;">
                                                            <img src="{{ str_starts_with($image, 'pages/') ? asset('storage/' . $image) : asset('assets/img/' . $image) }}"
                                                                style="width: 100%; height: 100%; object-fit: cover;" alt="">
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
                                            <div class="row g-2 mb-3">
                                                @foreach($item['images'] as $image)
                                                    <div
                                                        class="col-md-{{ count($item['images']) > 1 ? (count($item['images']) == 2 ? 6 : 12) : 12 }} {{ count($item['images']) == 1 ? 'col-12' : '' }}">
                                                        <div class="bg-secondary rounded"
                                                            style="height: {{ count($item['images']) == 1 ? '500px' : '300px' }}; display: flex; align-items: center; justify-content: center; color: white;">
                                                            <img src="{{ str_starts_with($image, 'pages/') ? asset('storage/' . $image) : asset('assets/img/' . $image) }}"
                                                                style="width: 100%; height: 100%; object-fit: cover;" alt="">
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
    </style>

@endsection