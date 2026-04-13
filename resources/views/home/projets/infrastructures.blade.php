@extends('home.layouts.template')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section institutional-base" style="background: #f8f9fa; padding: 100px 0 60px;">
        <div class="container text-center" data-aos="fade-up">
            <h1 class="refined-title" style="color: #1a1a1a; font-weight: 800;">Mise en place des infrastructures
                industrielles</h1>
            <p class="lead-text" style="max-width: 800px; margin: 20px auto;">Aménagement et mise en place des
                infrastructures pour les zones industrielles.</p>
            <div class="tricolor-line shadow-sm mx-auto"
                style="width: 100px; height: 4px; background: linear-gradient(to right, #FF8200 33.33%, #fff 33.33%, #fff 66.66%, #009B3A 66.66%);">
            </div>
        </div>
    </section>

    <section class="infrastructure-content py-5">
        <div class="container">

            <!-- Tabs Navigation -->
            <div class="d-flex justify-content-center mb-5">
                <ul class="nav nav-pills custom-nav-pills shadow-sm rounded-pill p-1 bg-white" id="infraTab" role="tablist"
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
            <div class="tab-content pt-2" id="infraTabContent">

                <!-- Tab 1: Présentation -->
                <div class="tab-pane fade show active" id="presentation" role="tabpanel" aria-labelledby="presentation-tab">
                    <div data-aos="fade-up">
                        {!! $page->content ?? '' !!}
                    </div>
                </div>

                <!-- Tab 2: Réalisations -->
                <div class="tab-pane fade" id="realisation" role="tabpanel" aria-labelledby="realisation-tab">
                    <div class="content-box-premium p-4 p-md-5" data-aos="fade-up">
                        <div class="section-header text-center mb-5">
                            <h3 style="color: #1a1a1a; font-weight: 700;">Détails des Travaux Prévus</h3>
                        </div>

                        <div class="table-responsive shadow-sm rounded-4 overflow-hidden">
                            <table class="table table-hover align-middle mb-0">
                                <thead style="background: #BFD7EA;">
                                    <tr>
                                        <th class="py-4 px-4 text-center text-uppercase fw-bold"
                                            style="font-size: 1.1rem; color: #1a1a1a;">
                                            {{ $page->title }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($page->realisations) && is_array($page->realisations))
                                        @foreach($page->realisations as $item)
                                            <tr>
                                                <td class="py-3 px-4 fw-medium border-bottom">
                                                    @if(Str::contains(strtolower($item), 'electricité'))
                                                        <i class="fas fa-bolt text-warning me-3"></i>
                                                    @elseif(Str::contains(strtolower($item), 'voirie') || Str::contains(strtolower($item), 'eau'))
                                                        <i class="fas fa-road text-secondary me-3"></i>
                                                    @else
                                                        <i class="fas fa-tools text-primary me-3"></i>
                                                    @endif
                                                    {{ $item }}
                                                </td>
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
                        <div class="row g-4">
                            @if(isset($page->media['gallery']) && is_array($page->media['gallery']))
                                @foreach($page->media['gallery'] as $img)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="gallery-item rounded-4 overflow-hidden shadow-sm position-relative">
                                            <img src="{{ str_starts_with($img, 'pages/') ? asset('storage/' . $img) : asset('assets/img/' . $img) }}" alt="Infrastructure Image"
                                                class="img-fluid w-100"
                                                style="height: 250px; object-fit: cover; transition: transform 0.5s ease;">
                                            <div class="gallery-overlay d-flex align-items-end p-3 position-absolute bottom-0 start-0 w-100 h-100"
                                                style="background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 60%);">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <style>
                            .gallery-item:hover img {
                                transform: scale(1.1);
                            }

                            .gallery-overlay {
                                opacity: 0.9;
                                transition: opacity 0.3s ease;
                            }

                            .gallery-item:hover .gallery-overlay {
                                opacity: 1;
                            }
                        </style>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection