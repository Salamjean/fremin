@extends('home.layouts.template')

@section('title', $card->title)

@section('content')
    <!-- Institutional Detail Page -->
    <section class="inst-detail-page">
        <div class="inst-detail-container">

            <!-- Header -->
            <div class="inst-detail-header" data-aos="fade-down">
                <a href="{{route('home')}}" class="inst-back-btn">
                    <i class="fas fa-arrow-left"></i>
                    <span>{{ __('back_to_home') }}</span>
                </a>

                <div class="inst-detail-title-block">
                    <div class="inst-detail-icon">
                        <i class="{{ $card->icon }}"></i>
                    </div>
                    <h1 class="inst-detail-title">
                        {!! $card->title !!}
                    </h1>
                </div>
            </div>

            <!-- Content -->
            <div class="inst-detail-content" data-aos="fade-up">

                <div class="inst-detail-card">
                    <h2>{{ __('presentation') }}</h2>
                    <p>{!! $card->description !!}</p>
                </div>

                @if($card->list_items && count($card->list_items) > 0)
                    <div class="inst-detail-card">
                        <h2>{{ __('key_points') }}</h2>
                        <ul class="inst-detail-list">
                            @foreach($card->list_items as $item)
                                <li>{!! $item !!}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if($card->content)
                    <div class="inst-detail-card dynamic-content">
                        {!! $card->content !!}
                    </div>
                @endif

                <div class="inst-detail-card highlight-card">
                    <h2>{{ __('more_info_question') }}</h2>
                    <p>{{ __('more_info_contact_text') }}</p>
                    <a href="{{route('home.contact')}}" class="inst-detail-cta">
                        <span>{{ __('contact_us') }}</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <style>
        .dynamic-content {
            line-height: 1.8;
            color: #444;
        }

        .dynamic-content h2,
        .dynamic-content h3 {
            color: var(--accent-color);
            margin-top: 2rem;
            margin-bottom: 1rem;
        }

        .dynamic-content ul,
        .dynamic-content ol {
            margin-bottom: 1.5rem;
            padding-left: 1.5rem;
        }

        .dynamic-content li {
            margin-bottom: 0.5rem;
        }
    </style>
@endsection