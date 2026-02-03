@extends('home.layouts.template')
@section('content')

    <!-- Search Results Hero -->
    <div class="contact-header-v2">
        <div class="container text-center py-5">
            <h1 class="text-white display-2 mb-3 fw-black animate__animated animate__zoomIn"
                style="font-weight: 900; font-size: 45px; letter-spacing: -1px;">RÉSULTATS DE RECHERCHE</h1>
            <div class="mx-auto bg-white mb-4" style="height: 4px; width: 80px;"></div>
            @if($query)
                <p class="text-white lead animate__animated animate__fadeInUp fw-medium">
                    Résultats pour : <strong>"{{ $query }}"</strong>
                </p>
            @endif
        </div>
    </div>

    <!-- Search Results Section -->
    <section class="py-5 bg-light">
        <div class="container py-5">

            <!-- Search Stats -->
            <div class="mb-4" data-aos="fade-up">
                <h5 class="text-muted">
                    <i class="fas fa-search text-success me-2"></i>
                    {{ count($results) }} résultat(s) trouvé(s)
                </h5>
            </div>

            @if(count($results) > 0)
                <!-- Results List -->
                <div class="row g-4">
                    @foreach($results as $result)
                        <div class="col-12" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            <div class="search-result-card">
                                <div class="result-type-badge badge-{{ strtolower($result['type']) }}">
                                    @if($result['type'] == 'Actualité')
                                        <i class="fas fa-newspaper"></i>
                                    @elseif($result['type'] == 'Publication')
                                        <i class="fas fa-file-alt"></i>
                                    @else
                                        <i class="fas fa-project-diagram"></i>
                                    @endif
                                    {{ $result['type'] }}
                                </div>

                                <h4 class="result-title">
                                    <a href="{{ $result['url'] }}">{{ $result['title'] }}</a>
                                </h4>

                                <p class="result-excerpt">{{ Str::limit($result['excerpt'], 200) }}</p>

                                <div class="result-meta">
                                    <span class="meta-date">
                                        <i class="far fa-calendar me-1"></i>
                                        {{ \Carbon\Carbon::parse($result['date'])->format('d/m/Y') }}
                                    </span>
                                    <a href="{{ $result['url'] }}" class="result-link">
                                        Lire la suite <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- No Results -->
                <div class="text-center py-5" data-aos="fade-up">
                    <div class="mb-4">
                        <i class="fas fa-search fa-4x text-muted opacity-50"></i>
                    </div>
                    <h3 class="mb-3">Aucun résultat trouvé</h3>
                    <p class="text-muted mb-4">
                        Nous n'avons trouvé aucun résultat pour "<strong>{{ $query }}</strong>"
                    </p>
                    <div class="search-suggestions">
                        <p class="fw-bold mb-3">Suggestions :</p>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Vérifiez l'orthographe des mots</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Essayez des mots-clés différents
                            </li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Utilisez des termes plus généraux
                            </li>
                        </ul>
                    </div>
                    <a href="{{ route('home') }}" class="btn btn-success btn-lg mt-4">
                        <i class="fas fa-home me-2"></i> Retour à l'accueil
                    </a>
                </div>
            @endif

        </div>
    </section>

    <style>
        .search-result-card {
            background: #ffffff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            position: relative;
            border-left: 4px solid #009B3A;
        }

        .search-result-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .result-type-badge {
            display: inline-block;
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 15px;
        }

        .badge-actualité {
            background: linear-gradient(135deg, #FF8200, #ffaa40);
            color: #ffffff;
        }

        .badge-publication {
            background: linear-gradient(135deg, #0066CC, #4d94ff);
            color: #ffffff;
        }

        .badge-programme {
            background: linear-gradient(135deg, #009B3A, #33b36b);
            color: #ffffff;
        }

        .result-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .result-title a {
            color: #1a1a1a;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .result-title a:hover {
            color: #009B3A;
        }

        .result-excerpt {
            color: #666;
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .result-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 15px;
            border-top: 1px solid #f0f0f0;
        }

        .meta-date {
            color: #999;
            font-size: 14px;
        }

        .result-link {
            color: #009B3A;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .result-link:hover {
            color: #FF8200;
        }

        .search-suggestions {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 30px;
            max-width: 500px;
            margin: 0 auto;
        }

        @media (max-width: 768px) {
            .search-result-card {
                padding: 20px;
            }

            .result-title {
                font-size: 20px;
            }

            .result-meta {
                flex-direction: column;
                gap: 10px;
                align-items: flex-start;
            }
        }
    </style>

@endsection