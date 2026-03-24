@extends('home.layouts.template')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section institutional-base" style="background: #f8f9fa; padding: 100px 0 60px;">
        <div class="container text-center" data-aos="fade-up">
            <h1 class="refined-title" style="color: #1a1a1a; font-weight: 800;">{{ __('aed_program') }}</h1>
            <p class="lead-text" style="max-width: 800px; margin: 20px auto;">Accompagnement aux
                entreprises industrielles en difficultés.</p>
            <div class="tricolor-line shadow-sm mx-auto"
                style="width: 100px; height: 4px; background: linear-gradient(to right, #FF8200 33.33%, #fff 33.33%, #fff 66.66%, #009B3A 66.66%);">
            </div>
        </div>
    </section>

    <section class="aed-content py-5">
        <div class="container">

            <!-- Tabs Navigation -->
            <div class="d-flex justify-content-center mb-5">
                <ul class="nav nav-pills custom-nav-pills shadow-sm rounded-pill p-1 bg-white" id="aedTab" role="tablist"
                    aria-orientation="horizontal">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill px-4 active" id="presentation-tab" data-bs-toggle="tab"
                            data-bs-target="#presentation" type="button" role="tab" aria-controls="presentation"
                            aria-selected="true">Présentation</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill px-4" id="realisation-tab" data-bs-toggle="tab"
                            data-bs-target="#realisation" type="button" role="tab" aria-controls="realisation"
                            aria-selected="false">Réalisations</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill px-4" id="media-tab" data-bs-toggle="tab"
                            data-bs-target="#media" type="button" role="tab" aria-controls="media"
                            aria-selected="false">{{ __('media') }}</button>
                    </li>
                </ul>
            </div>

            <style>
                .custom-nav-pills .nav-link {
                    transition: all 0.3s ease;
                    font-weight: 600;
                    color: #333;
                }

                .custom-nav-pills .nav-link:hover {
                    background-color: rgba(0, 155, 58, 0.1);
                    color: #009B3A !important;
                }

                .custom-nav-pills .nav-link.active,
                .custom-nav-pills .nav-link.active:focus,
                .custom-nav-pills .nav-link.active:hover {
                    background-color: #009B3A !important;
                    color: white !important;
                }
            </style>

            <!-- Tabs Content -->
            <div class="tab-content pt-2" id="aedTabContent">

                <!-- Tabs Content -->
                <div class="tab-content pt-2" id="aedTabContent">

                    <!-- Tab 1: Présentation -->
                    <div class="tab-pane fade show active" id="presentation" role="tabpanel"
                        aria-labelledby="presentation-tab">
                        <div data-aos="fade-up">
                            {!! $page->content ?? '' !!}
                        </div>
                    </div>

                    <!-- Tab 2: Réalisations -->
                    <div class="tab-pane fade" id="realisation" role="tabpanel" aria-labelledby="realisation-tab">
                        <div class="content-box-premium" data-aos="fade-up">
                            <h3 class="section-title mb-4" style="color: #009B3A; font-weight: 800;">Liste des entreprises
                                ayant bénéficié d’équipement</h3>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover align-middle">
                                    <thead class="table-dark" style="background-color: #009B3A;">
                                        <tr>
                                            <th>N°</th>
                                            <th>Entreprises bénéficiaires</th>
                                            <th>Secteur d’activité</th>
                                            <th>Equipements reçus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($page->realisations) && is_array($page->realisations))
                                            @foreach($page->realisations as $index => $item)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $item['name'] ?? '' }}</td>
                                                    <td>{{ $item['sector'] ?? '' }}</td>
                                                    <td>{{ $item['equipment'] ?? '' }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Tab 3: Média -->
                    <div class="tab-pane fade" id="media" role="tabpanel" aria-labelledby="media-tab">
                        <div class="content-box-premium p-4 p-md-5" data-aos="fade-up">
                            <div class="media-masonry-grid">
                                <div class="row g-4">
                                    @if(isset($page->media['video']))
                                        <div class="col-lg-8 col-md-12">
                                            <div class="media-card video-card rounded-4 overflow-hidden position-relative shadow-sm"
                                                style="height: 420px;">
                                                <iframe width="100%" height="100%" src="{{ $page->media['video'] }}"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                                <div class="badge-type position-absolute top-0 end-0 m-3 px-3 py-1 bg-warning text-dark rounded-pill fw-bold"
                                                    style="pointer-events: none;">Vidéo</div>
                                            </div>
                                        </div>
                                    @endif

                                    @if(isset($page->media['gallery']) && is_array($page->media['gallery']))
                                        @foreach($page->media['gallery'] as $img)
                                            <div
                                                class="{{ $loop->first && !isset($page->media['video']) ? 'col-lg-8' : ($loop->index < 4 ? 'col-lg-4' : 'col-lg-3') }} col-md-6">
                                                <div class="media-card rounded-4 overflow-hidden position-relative shadow-sm"
                                                    style="height: {{ $loop->index < 4 ? '420px' : '250px' }};">
                                                    <img src="{{ asset('assets/img/' . $img) }}" alt="Project Image"
                                                        class="w-100 h-100 object-fit-cover transition-transform">
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <style>
                                .media-card {
                                    cursor: pointer;
                                    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
                                }

                                .media-card img {
                                    transition: transform 0.8s ease;
                                }

                                .media-card:hover img {
                                    transform: scale(1.1);
                                }

                                .media-overlay {
                                    position: absolute;
                                    top: 0;
                                    left: 0;
                                    width: 100%;
                                    height: 100%;
                                    background: linear-gradient(to top, rgba(0, 0, 0, 0.85) 0%, rgba(0, 0, 0, 0.2) 50%, transparent 100%);
                                    opacity: 0.9;
                                    transition: opacity 0.4s ease;
                                }

                                .media-card:hover .media-overlay {
                                    opacity: 1;
                                    background: linear-gradient(to top, rgba(0, 155, 58, 0.8) 0%, rgba(0, 0, 0, 0.4) 60%, transparent 100%);
                                }

                                .video-card .play-button-wrapper i {
                                    transition: transform 0.3s ease;
                                }

                                .video-card:hover .play-button-wrapper i {
                                    transform: scale(1.2);
                                }

                                .object-fit-cover {
                                    object-fit: cover;
                                }

                                .transition-transform {
                                    transition: transform 0.8s ease;
                                }
                            </style>
                        </div>
                    </div>

                </div>
            </div>
    </section>

@endsection