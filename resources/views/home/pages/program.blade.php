@extends('home.layouts.template')
@section('content')

    <!-- Cinematic Hero -->
    <div class="contact-header-v2">
        <div class="container text-center py-5">
            <h1 class="text-white display-2 mb-3 fw-black animate__animated animate__zoomIn"
                style="font-weight: 900; font-size: 45px; letter-spacing: -1px;">{{ $hero->main_title ?? 'NOS PROGRAMMES' }}
            </h1>
            <div class="mx-auto bg-white mb-4" style="height: 4px; width: 80px;"></div>
            <p class="text-white lead animate__animated animate__fadeInUp fw-medium">
                {{ $hero->subtitle ?? 'Des solutions stratégiques pour la compétitivité et la croissance de l\'industrie Ivoirienne.' }}
            </p>
        </div>
    </div>

    <!-- Featured Programs -->
    <section class="py-5 bg-white">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold">Programmes d'Accompagnement</h2>
                <div class="mx-auto mt-3" style="height: 3px; width: 60px; background: #FF8200;"></div>
            </div>

            <div class="row g-4">
                @forelse($programs as $program)
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                        <div class="prog-card-v2">
                            <div class="prog-icon-v2"><i class="{{ $program->icon ?? 'fas fa-industry' }}"></i></div>
                            <h4 class="fw-bold mb-3">{{ $program->title }}</h4>
                            <p class="text-muted mb-4">{{ $program->description }}</p>
                            <a href="{{ $program->link ?? '#' }}"
                                class="news-link-premium mt-auto">{{ $program->link_text ?? 'DÉCOUVRIR LE PROGRAMME' }} <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">Aucun programme disponible pour le moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Opportunities Section -->
    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold">Appels à Projets en Cours</h2>
                <p class="text-muted">Opportunités et appels à candidatures ouverts aux entreprises.</p>
                <div class="mx-auto mt-3" style="height: 3px; width: 60px; background: #06634e;"></div>
            </div>

            <div class="row g-4 justify-content-center">
                @forelse($opportunities as $opportunity)
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                        <div class="prog-card-v2 bg-white border-0 shadow-sm">
                            <div class="prog-icon-v2 text-white" style="background: #06634e;"><i class="fas fa-bullhorn"></i>
                            </div>
                            <h4 class="fw-bold mb-3">{{ $opportunity->title }}</h4>

                            @if($opportunity->deadline)
                                <div class="mb-3">
                                    <span class="badge bg-warning text-dark"><i class="far fa-clock me-1"></i> Date limite :
                                        {{ \Carbon\Carbon::parse($opportunity->deadline)->format('d/m/Y') }}</span>
                                </div>
                            @endif

                            <p class="text-muted mb-4">{{ Str::limit($opportunity->description, 120) }}</p>
                            <a href="{{ $opportunity->link ?? '#' }}" class="news-link-premium mt-auto"
                                style="color: #06634e;">{{ $opportunity->link_text ?? 'POSTULER MAINTENANT' }} <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">Aucun appel à projets en cours actuellement.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Application Process -->
    <section class="py-5 bg-white">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <h2 class="fw-bold mb-4">Comment Postuler ?</h2>
                    <p class="text-muted mb-5">Un processus simplifié et transparent pour permettre à chaque entreprise de
                        bénéficier de notre expertise.</p>

                    <div class="process-step-v2">
                        <div class="step-num-v2">01</div>
                        <h5 class="fw-bold mb-2">Inscription en ligne</h5>
                        <p class="text-muted small">Créez votre compte sur notre portail dédié et renseignez les
                            informations de base de votre structure.</p>
                    </div>

                    <div class="process-step-v2">
                        <div class="step-num-v2">02</div>
                        <h5 class="fw-bold mb-2">Dépôt du dossier</h5>
                        <p class="text-muted small">Soumettez l'ensemble des pièces justificatives (fiscales, comptables et
                            techniques) requises par le programme.</p>
                    </div>

                    <div class="process-step-v2">
                        <div class="step-num-v2">03</div>
                        <h5 class="fw-bold mb-2">Audit & Diagnostic</h5>
                        <p class="text-muted small">Nos experts réalisent une analyse approfondie de votre outil de
                            production pour définir un plan de mise à niveau.</p>
                    </div>

                    <div class="process-step-v2">
                        <div class="step-num-v2">04</div>
                        <h5 class="fw-bold mb-2">Validation & Déploiement</h5>
                        <p class="text-muted small">Après validation par le comité, nous lançons l'exécution des actions
                            d'accompagnement prévues.</p>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left">
                    <div class="bg-white p-5 shadow-sm border-top border-5 border-orange h-100">
                        <h3 class="fw-bold mb-4">Critères d'Éligibilité</h3>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="criteria-box-v2">
                                    <div class="criteria-header-v2"><i class="fas fa-building"></i>
                                        <h6 class="fw-bold mb-0">Secteur</h6>
                                    </div>
                                    <ul class="criteria-list-v2">
                                        <li class="check"><i class="fas fa-check"></i> Industrie de transformation</li>
                                        <li class="check"><i class="fas fa-check"></i> Agro-alimentaire</li>
                                        <li class="check"><i class="fas fa-check"></i> Chimie & Plasturgie</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="criteria-box-v2">
                                    <div class="criteria-header-v2"><i class="fas fa-chart-area"></i>
                                        <h6 class="fw-bold mb-0">Taille</h6>
                                    </div>
                                    <ul class="criteria-list-v2">
                                        <li class="check"><i class="fas fa-check"></i> PME / PMI</li>
                                        <li class="check"><i class="fas fa-check"></i> Grande Entreprise</li>
                                        <li class="check"><i class="fas fa-check"></i> Start-up industrielle</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="criteria-box-v2">
                                    <div class="criteria-header-v2"><i class="fas fa-file-invoice-dollar"></i>
                                        <h6 class="fw-bold mb-0">Statut</h6>
                                    </div>
                                    <ul class="criteria-list-v2">
                                        <li class="check"><i class="fas fa-check"></i> Formellement constituée</li>
                                        <li class="check"><i class="fas fa-check"></i> À jour fiscalement</li>
                                        <li class="check"><i class="fas fa-check"></i> +2 ans d'activité</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="criteria-box-v2">
                                    <div class="criteria-header-v2"><i class="fas fa-globe-africa"></i>
                                        <h6 class="fw-bold mb-0">Localisation</h6>
                                    </div>
                                    <ul class="criteria-list-v2">
                                        <li class="check"><i class="fas fa-check"></i> Territoire ivoirien</li>
                                        <li class="check"><i class="fas fa-check"></i> Siège en Côte d'Ivoire</li>
                                        <li class="check"><i class="fas fa-check"></i> Zones industrielles</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection