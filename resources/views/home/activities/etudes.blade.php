@extends('home.layouts.template')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section institutional-base" style="background: #f8f9fa; padding: 100px 0 60px;">
        <div class="container text-center" data-aos="fade-up">
            <h1 class="refined-title" style="color: #1a1a1a; font-weight: 800;">{{ __('studies_conducted') }}</h1>
            <p class="lead-text" style="max-width: 800px; margin: 20px auto;">{{ __('activities_desc') }}</p>
            <div class="tricolor-line shadow-sm mx-auto"
                style="width: 100px; height: 4px; background: linear-gradient(to right, #FF8200 33.33%, #fff 33.33%, #fff 66.66%, #009B3A 66.66%);">
            </div>
        </div>
    </section>

    <section class="studies-list py-5">
        <div class="container">
            <div class="row g-4 align-items-start" id="studiesAccordion">
                @if($page && $page->items)
                    @foreach($page->items as $index => $item)
                        <div class="col-12" data-aos="fade-up" data-aos-delay="{{ ($loop->index + 1) * 100 }}">
                            <div class="card-premium h-100 overflow-hidden shadow-sm p-4"
                                style="background: white; border-radius: 12px; border: 1px solid rgba(0,0,0,0.05);">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="m-icon me-3" style="color: #009B3A; font-size: 1.5rem;"><i
                                            class="fas fa-project-diagram"></i></div>
                                    <h3 class="m-0" style="color: black; font-weight: 700; line-height: 1.3;">
                                        {{ $item['title'] ?? '' }}</h3>
                                </div>

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
    </section>
    </div>
    </div>
    </section>

    <style>
        .card-premium {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-premium:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
            border-bottom: 5px solid #009B3A !important;
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