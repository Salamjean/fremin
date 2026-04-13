@extends('home.layouts.template')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section institutional-base" style="background: #f8f9fa; padding: 100px 0 60px;">
        <div class="container text-center" data-aos="fade-up">
            <h1 class="refined-title" style="color: #1a1a1a; font-weight: 800;">{{ __('direct_support') }}</h1>
            <p class="lead-text" style="max-width: 800px; margin: 20px auto;">Accompagnements directs aux entreprises
                industrielles</p>
            <div class="tricolor-line shadow-sm mx-auto"
                style="width: 100px; height: 4px; background: linear-gradient(to right, #FF8200 33.33%, #fff 33.33%, #fff 66.66%, #009B3A 66.66%);">
            </div>
        </div>
    </section>

    <section class="support-cards py-5">
        <div class="container">
            <div class="row g-4 justify-content-center align-items-start" id="supportAccordion">
                @if($page && $page->items)
                    @foreach($page->items as $index => $item)
                        <div class="col-12" data-aos="fade-up" data-aos-delay="{{ ($loop->index + 1) * 100 }}">
                            <div class="card-premium h-100 overflow-hidden shadow-sm p-4"
                                style="background: white; border-radius: 12px; border: 1px solid rgba(0,0,0,0.05);">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="m-icon me-3" style="color: #009B3A; font-size: 1.5rem;"><i
                                            class="fas fa-industry"></i></div>
                                    <h3 class="m-0" style="color: black; font-weight: 700; line-height: 1.3;">
                                        {{ $item['title'] ?? '' }}</h3>
                                </div>

                                @if(isset($item['images']) && count($item['images']) > 0)
                                    <div class="row g-2 mb-3">
                                        @foreach($item['images'] as $image)
                                            <div class="col-md-{{ 12 / count($item['images']) }}">
                                                <div class="bg-secondary rounded"
                                                    style="height: 300px; display: flex; align-items: center; justify-content: center; color: white;">
                                                    <img src="{{ str_starts_with($image, 'pages/') ? asset('storage/' . $image) : asset('assets/img/' . $image) }}"
                                                        style="width: 100%; height: 100%; object-fit: cover;" alt="Image d'illustration">
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

    <style>
        .card-premium {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-premium:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
            border-bottom: 5px solid #009B3A !important;
        }
    </style>

@endsection