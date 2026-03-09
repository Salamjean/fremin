@extends('home.layouts.template')
@section('content')

    <!-- Modern Hero -->
    <div class="contact-header-v2">
        <div class="container text-center py-5">
            <h1 class="text-white display-2 mb-3 fw-black animate__animated animate__zoomIn"
                style="font-weight: 900; font-size: 45px; letter-spacing: -1px;">
                {{ $hero->main_title ?? 'PRÉSENTATION DU FREMIN' }}
            </h1>
            <div class="mx-auto bg-white mb-4" style="height: 4px; width: 80px;"></div>

        </div>
    </div>

    <!-- Section: Cadre Juridique et Vision -->
    <section id="institutional-base" class="institutional-base section">
        <div class="container" data-aos="fade-up">
            <div class="row gy-5 align-items-center">
                <div class="col-lg-12">
                    <div class="content-box-premium">
                        <h2 class="mb-4">{{ $institutionalFramework->title ?? 'Cadre institutionnel' }}</h2>
                        <div class="lead-text">
                            {!! $institutionalFramework->content ?? '' !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Bar -->
    <section class="pres-stats-bar">
        <div class="container">
            <!-- <div class="row g-4 justify-content-center">
                                                        @foreach($stats as $stat)
                                                            <div class="col-md-3">
                                                                <div class="stat-v2">
                                                                    <span class="number">
                                                                        <span class="counter"
                                                                            data-target="{{ preg_replace('/[^0-9]/', '', $stat->value) }}">0</span>{{ preg_replace('/[0-9]/', '', $stat->value) }}
                                                                    </span>
                                                                    <span class="label">{{ $stat->label }}</span>
                                                                </div>
                                                            </div>
                                                        @endforeach -->
        </div>
        </div>
    </section>

    <!-- Section: Missions -->
    <section id="missions-detailed" class="missions-detailed section bg-light">
        <div class="container section-title" data-aos="fade-up">
            <h2>{{ __('missions_title') }}</h2>
            <p>{{ __('missions_intro') }}</p>
        </div>

        <div class="container">
            <div class="row g-4">
                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="1000">
                    <div class="mission-item-card last">
                        @foreach($missions as $mission)
                            <p><span class="text-success">✓</span> {{ $mission->description }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Axes Stratégiques -->
    <section id="strategic-axes" class="strategic-axes section bg-white">
        <div class="container section-title" data-aos="fade-up">
            <h2>{{ __('strategic_axes_title') }}</h2>
            <p>Nos piliers pour le développement industriel ivoirien</p>
        </div>

        <div class="container">
            <div class="row g-0 axis-wrapper shadow-lg overflow-hidden rounded-4">
                @foreach($strategicAxes as $axis)
                    <div class="col-lg-4">
                        <div class="axis-card"
                            style="background-image: linear-gradient(rgba({{ $loop->index == 0 ? '0,155,58' : ($loop->index == 1 ? '255,130,0' : '17,17,17') }},0.85), rgba({{ $loop->index == 0 ? '0,155,58' : ($loop->index == 1 ? '255,130,0' : '17,17,17') }},0.85)), url('{{ asset($axis->image) }}');">
                            <div class="axis-content">
                                <span class="axis-num">{{ sprintf('%02d', $axis->axis_number) }}</span>
                                <h4 class="text-white">{{ $axis->title }}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section: Historique et Valeurs -->
    <section id="history-values" class="history-values section bg-light">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="history-box">
                        <h2 class="mb-4">{{ $historySection->title ?? __('history_title') }}</h2>
                        <div class="history-content card-premium p-4">
                            <p>{!! $historySection->content ?? '' !!}</p>

                            @if($historySection && $historySection->presidents)
                                <div class="collapse" id="historyCollapse">
                                    <p>Depuis sa mise en place, le Comité de Gestion du FREMIN a été successivement présidé par
                                        :</p>

                                    <ul class="list-unstyled mt-3">
                                        @foreach($historySection->presidents as $pres)
                                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>{{ $pres['name'] }} :
                                                {{ $pres['period'] }} </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <a href="javascript:void(0)" class="btn-read-more mt-2" data-bs-toggle="collapse"
                                data-bs-target="#historyCollapse" aria-expanded="false" aria-controls="historyCollapse"
                                id="historyToggleBtn">
                                Voir plus <i class="fas fa-chevron-down ms-1"></i>
                            </a>
                        </div>

                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                const btn = document.getElementById('historyToggleBtn');
                                const collapseElement = document.getElementById('historyCollapse');

                                if (collapseElement && btn) {
                                    collapseElement.addEventListener('shown.bs.collapse', function () {
                                        btn.innerHTML = 'Voir moins <i class="fas fa-chevron-up ms-1"></i>';
                                    });

                                    collapseElement.addEventListener('hidden.bs.collapse', function () {
                                        btn.innerHTML = 'Voir plus <i class="fas fa-chevron-down ms-1"></i>';
                                    });
                                }
                            });
                        </script>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left">
                    <div class="values-box">
                        <h3 class=" mb-4">Nos Valeurs</h3>
                        @foreach($values as $val)
                            <div class="value-item shadow-sm bg-white p-3 rounded-3 mb-3">
                                <div class="value-icon"><i class="{{ $val->icon }} text-success"></i></div>
                                <div>
                                    <h5 class="fw-bold mb-1">{{ $val->title }}</h5>
                                    <p class="mb-0 opacity-75 small">{{ $val->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Gouvernance (Comité de Gestion & Cellule Technique) -->
    <section id="governance" class="governance section bg-light">
        <div class="container">
            <div class="row gy-5">
                <h2>Gouvernance</h2>

                @php
                    $comite = $governanceSections->where('section_key', 'comite_gestion')->first();
                    $cellule = $governanceSections->where('section_key', 'cellule_technique')->first();
                    $tutelles = $governanceSections->where('section_key', 'tutelles')->first();
                @endphp

                @if($comite)
                    <div class="col-lg-6" data-aos="fade-right">
                        <div class="governance-box">
                            <h2 class="mb-4">{{ $comite->title }}</h2>
                            <div class="card-premium p-4">
                                <p class="mb-3">{{ $comite->description }}</p>
                                @if($comite->items)
                                    <ul class="list-unstyled">
                                        @foreach($comite->items as $item)
                                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> {{ $item }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                <div class="mt-4 text-end">
                                    <a href="{{ route('home.comite-gestion') }}"
                                        class="btn btn-sm btn-outline-success rounded-pill px-4">
                                        En savoir plus <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if($cellule)
                    <div class="col-lg-6" data-aos="fade-left">
                        <div class="governance-box">
                            <h2 class="mb-4">{{ $cellule->title }}</h2>
                            <div class="card-premium p-4">
                                <p class="mb-3">{{ $cellule->description }}</p>
                                @if($cellule->items)
                                    <ul class="list-unstyled">
                                        @foreach($cellule->items as $item)
                                            <li class="mb-2"><i class="fas fa-check-circle text-orange me-2"></i> {{ $item }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                <div class="mt-4 text-end">
                                    <a href="{{ route('home.comite-gestion') }}"
                                        class="btn btn-sm btn-outline-warning rounded-pill px-4 text-dark">
                                        En savoir plus <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            @if($tutelles)
                <div class="row mt-5" data-aos="fade-up">
                    <div class="col-12">
                        <div
                            class="tutelles-box text-center card-premium p-5 bg-white shadow-sm border-top border-4 border-success">
                            <h2 class="mb-3">{{ $tutelles->title }}</h2>
                            <p class="mb-2" style="font-size:17px; font-weight:200px;">{{ $tutelles->description }}</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Footer Counter Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const counters = document.querySelectorAll('.counter');
            const speed = 200;

            const startCounters = (elements) => {
                elements.forEach(counter => {
                    const updateCount = () => {
                        const target = +counter.getAttribute('data-target');
                        const count = +counter.innerText;
                        const inc = target / speed;
                        if (count < target) {
                            counter.innerText = Math.ceil(count + inc);
                            setTimeout(updateCount, 15);
                        } else {
                            counter.innerText = target;
                        }
                    };
                    updateCount();
                });
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const sectionCounters = entry.target.querySelectorAll('.counter');
                        startCounters(sectionCounters);
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.3 });

            const statsSection = document.querySelector('.pres-stats-bar');
            if (statsSection) {
                observer.observe(statsSection);
            }
        });
    </script>

@endsection