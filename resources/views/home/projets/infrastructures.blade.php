@extends('home.layouts.template')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section institutional-base" style="background: #f8f9fa; padding: 100px 0 60px;">
        <div class="container text-center" data-aos="fade-up">
            <h1 class="refined-title" style="color: #1a1a1a; font-weight: 800;">{{ __('industrial_infrastructure') }}</h1>
            <p class="lead-text" style="max-width: 800px; margin: 20px auto;">Aménagement et mise en place des
                infrastructures pour les zones industrielles.</p>
            <div class="tricolor-line shadow-sm mx-auto"
                style="width: 100px; height: 4px; background: linear-gradient(to right, #009B3A 33.33%, #fff 33.33%, #fff 66.66%, #FF8200 66.66%);">
            </div>
        </div>
    </section>

    <section class="infrastructure-content py-5">
        <div class="container">

            <!-- Tabs Navigation -->
            <ul class="nav nav-tabs nav-tabs-bordered mb-4" id="infraTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="presentation-tab" data-bs-toggle="tab"
                        data-bs-target="#presentation" type="button" role="tab" aria-controls="presentation"
                        aria-selected="true" style="color: #009B3A; font-weight: 700;">Présentation</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="realisation-tab" data-bs-toggle="tab" data-bs-target="#realisation"
                        type="button" role="tab" aria-controls="realisation" aria-selected="false"
                        style="color: #1a1a1a; font-weight: 600;">Réalisations</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="media-tab" data-bs-toggle="tab" data-bs-target="#media" type="button"
                        role="tab" aria-controls="media" aria-selected="false"
                        style="color: #1a1a1a; font-weight: 600;">Images & Vidéo</button>
                </li>
            </ul>

            <!-- Tabs Content -->
            <div class="tab-content pt-2" id="infraTabContent">

                <!-- Tab 1: Présentation -->
                <div class="tab-pane fade show active" id="presentation" role="tabpanel" aria-labelledby="presentation-tab">
                    <div class="content-box-premium py-5 text-center" data-aos="fade-up">
                        <i class="fas fa-info-circle fa-3x text-muted mb-3"></i>
                        <h4 class="text-muted">Présentation</h4>
                        <p class="lead text-muted">Contenu en attente d'information.</p>
                    </div>
                </div>

                <!-- Tab 2: Réalisations -->
                <div class="tab-pane fade" id="realisation" role="tabpanel" aria-labelledby="realisation-tab">
                    <div class="content-box-premium py-5 text-center" data-aos="fade-up">
                        <i class="fas fa-clipboard-list fa-3x text-muted mb-3"></i>
                        <h4 class="text-muted">Réalisations</h4>
                        <p class="lead text-muted">Liste des entreprises accompagnées en attente.</p>
                    </div>
                </div>

                <!-- Tab 3: Média -->
                <div class="tab-pane fade" id="media" role="tabpanel" aria-labelledby="media-tab">
                    <div class="content-box-premium py-5 text-center" data-aos="fade-up">
                        <i class="fas fa-photo-video fa-3x text-muted mb-3"></i>
                        <h4 class="text-muted">Galerie Multimédia</h4>
                        <p class="lead text-muted">Images et vidéos en attente.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection