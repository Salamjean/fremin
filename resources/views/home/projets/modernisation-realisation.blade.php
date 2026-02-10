@extends('home.layouts.template')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section institutional-base" style="background: #f8f9fa; padding: 100px 0 60px;">
        <div class="container text-center" data-aos="fade-up">
            <h1 class="refined-title" style="color: #1a1a1a; font-weight: 800;">{{ __('realizations') }}</h1>
            <p class="lead-text" style="max-width: 800px; margin: 20px auto;">Liste des entreprises accompagnées par secteur
                d'activité et type d'intervention.</p>
            <div class="tricolor-line shadow-sm mx-auto"
                style="width: 100px; height: 4px; background: linear-gradient(to right, #009B3A 33.33%, #fff 33.33%, #fff 66.66%, #FF8200 66.66%);">
            </div>
        </div>
    </section>

    <section class="realizations-list py-5">
        <div class="container">
            @php
                $sectors = [
                    'Agro-industrie' => 'fas fa-leaf',
                    'Textile & Cuir' => 'fas fa-tshirt',
                    'Chimie & Plasturgie' => 'fas fa-flask',
                    'Matériaux de construction' => 'fas fa-hammer',
                    'Mines & Énergie' => 'fas fa-microchip'
                ];
            @endphp

            @foreach($sectors as $sectorName => $icon)
                <div class="sector-group mb-5" data-aos="fade-up">
                    <div class="d-flex align-items-center mb-4 border-bottom pb-2">
                        <div class="m-icon me-3" style="width: 50px; height: 50px; font-size: 20px;"><i class="{{ $icon }}"></i>
                        </div>
                        <h3 style="font-weight: 800; color: #1a1a1a; margin-bottom: 0;">{{ $sectorName }}</h3>
                    </div>

                    <div class="row g-4">
                        @php
                            // Filter companies for this sector. 
                            // In a real scenario, this would be based on a sector_id or similar.
                            // For now, we use the financedCompanies collection.
                            $count = 0;
                        @endphp

                        @forelse($financedCompanies as $company)
                            {{-- Logic to match companies by sector if possible, otherwise showing sample --}}
                            <div class="col-lg-4 col-md-6">
                                <div class="mission-item-card h-100">
                                    <div class="d-flex align-items-center mb-3">
                                        @if($company->logo)
                                            <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}"
                                                style="height: 40px; margin-right: 15px;">
                                        @endif
                                        <h5 style="font-weight: 700; margin-bottom: 0;">{{ $company->name }}</h5>
                                    </div>
                                    <p class="small text-muted mb-2"><strong>Intervention :</strong>
                                        {{ $company->intervention_type ?? 'Mise à niveau technique' }}</p>
                                    <p class="small text-muted"><strong>Localisation :</strong>
                                        {{ $company->location ?? 'Abidjan' }}</p>
                                </div>
                            </div>
                            @php $count++; @endphp
                            @if($count >= 3) @break @endif
                        @empty
                            <div class="col-12">
                                <p class="text-muted italic">Données en cours de mise à jour pour ce secteur.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection