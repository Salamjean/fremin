@extends('home.layouts.template')

@section('title', 'Gouvernance & Organes de Gestion - FREMIN')

@section('content')
    <style>
        .gov-tabs-section {
            padding: 60px 0;
            background: #fafafa;
        }

        .gov-tabs-nav {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 50px;
            flex-wrap: wrap;
        }

        .gov-tab-btn {
            padding: 12px 30px;
            border: none;
            background: #fff;
            color: #666;
            font-weight: 800;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            cursor: pointer;
            transition: 0.3s;
            border-bottom: 3px solid transparent;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
        }

        .gov-tab-btn.active {
            color: #009B3A;
            border-bottom-color: #009B3A;
        }

        .gov-tab-btn:hover:not(.active) {
            color: #111;
            transform: translateY(-2px);
        }

        .gov-tab-content {
            display: none;
            animation: fadeIn 0.5s ease;
        }

        .gov-tab-content.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Adjustments for integrated team section */
        .team-section-modern {
            padding: 40px 0;
            background: transparent;
        }

        .inst-detail-card {
            background: #fff;
            padding: 40px;
            margin-bottom: 30px;
            border-left: 4px solid #009B3A;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.02);
        }

        .inst-detail-card h2 {
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 20px;
            color: #111;
        }

        .inst-detail-list {
            list-style: none;
            padding: 0;
        }

        .inst-detail-list li {
            padding: 8px 0;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .inst-detail-list li::before {
            content: '→';
            color: #009B3A;
            font-weight: 900;
        }

        .inst-detail-subcard {
            background: #f9f9f9;
            padding: 25px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .inst-detail-subcard h3 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 15px;
            color: #009B3A;
        }

        .inst-detail-subcard.president {
            border-left: 4px solid #FF8200;
        }

        .inst-detail-subcard.vice-president {
            border-left: 4px solid #009B3A;
        }
    </style>

    <section class="inst-detail-header" style="background: #111; padding: 100px 0 60px; text-align: center; color: #fff;">
        <div class="container">
            <a href="{{route('home')}}" class="inst-back-btn"
                style="color: black; margin-bottom: 20px; display: inline-flex; align-items: center; gap: 10px; font-weight: 600; font-size: 14px; opacity: 0.7;">
                <i class="fas fa-arrow-left"></i> Retour à l'accueil
            </a>
            <h1
                style="font-size: 42px; font-weight: 900; text-transform: uppercase; letter-spacing: -1px; margin-bottom: 10px;">
                GOUVERNANCE</h1>
            <p style="opacity: 0.8; font-size: 18px;">Organes de Gestion et de Contrôle du FREMIN</p>
        </div>
    </section>

    <section class="gov-tabs-section">
        <div class="container">
            <div class="gov-tabs-nav" data-aos="fade-up">
                <button class="gov-tab-btn active" onclick="openTab(event, 'comite')">Comité de Gestion</button>
                <button class="gov-tab-btn" onclick="openTab(event, 'cellule')">Cellule Technique</button>
                <button class="gov-tab-btn" onclick="openTab(event, 'tutelles')">Tutelles Techniques</button>
            </div>

            <!-- Tab 1: Comité de Gestion -->
            <div id="comite" class="gov-tab-content active">
                <div class="row">
                    <div class="col-lg-8" data-aos="fade-right">
                        <div class="inst-detail-card">
                            <h2>Rôle et Mandat</h2>
                            <p>Le <strong>Comité de Gestion</strong> est l'organe de décision principal du FREMIN. Il est
                                responsable de l'administration du fonds et de la validation des décisions stratégiques.</p>
                        </div>
                        <div class="inst-detail-card">
                            <h2>Missions Principales</h2>
                            <ul class="inst-detail-list">
                                <li><strong>Validation des Dossiers</strong> : Examiner et approuver les demandes d'appui
                                </li>
                                <li><strong>Définition des Orientations</strong> : Établir les priorités et les stratégies
                                </li>
                                <li><strong>Gestion Financière</strong> : Superviser l'utilisation des ressources</li>
                                <li><strong>Approbation du Budget</strong> : Valider les budgets et plans de financement
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4" data-aos="fade-left">
                        <div class="inst-detail-subcard president">
                            <h3><i class="fas fa-crown"></i> Présidence</h3>
                            <p><strong>Ministère chargé de l'Industrie</strong></p>
                            <p class="small text-muted">Définit l'ordre du jour et assure le suivi des décisions.</p>
                        </div>
                        <div class="inst-detail-subcard vice-president">
                            <h3><i class="fas fa-user-tie"></i> Vice-Présidence</h3>
                            <p><strong>Ministère chargé des Finances</strong></p>
                            <p class="small text-muted">Supervise les aspects financiers et valide les projets d'appui.</p>
                        </div>
                    </div>
                </div>

                <!-- Team Section Modern - Cross Layout (2-1-2) -->
                <section class="team-section-modern" data-aos="fade-up">
                    <div class="section-header-modern">
                        <span class="section-badge">ÉQUIPE DIRIGEANTE</span>
                        <h2>Les Membres du Comité</h2>
                    </div>

                    @php
                        $nonPresidents = $teamMembers->where('is_president', false)->values();
                        $president = $teamMembers->where('is_president', true)->first();

                        $topMembers = $nonPresidents->take(2);
                        $bottomMembers = $nonPresidents->slice(2, 2);
                        $extraMembers = $nonPresidents->slice(4);
                    @endphp

                    <style>
                        .team-cross-layout {
                            display: flex;
                            flex-direction: column;
                            gap: 40px;
                            align-items: center;
                            max-width: 1000px;
                            margin: 0 auto;
                            padding: 20px 0;
                        }

                        .team-row {
                            display: grid;
                            grid-template-columns: repeat(2, 1fr);
                            gap: 30px;
                            width: 100%;
                        }

                        .president-row {
                            display: flex;
                            justify-content: center;
                            width: 100%;
                        }

                        .president-row .team-card-modern {
                            width: 100%;
                            max-width: 450px;
                        }

                        @media (max-width: 768px) {
                            .team-row {
                                grid-template-columns: 1fr;
                            }
                        }
                    </style>

                    <div class="team-cross-layout">
                        <!-- Top Row: 2 Members -->
                        <div class="team-row">
                            @foreach ($topMembers as $member)
                                <div class="team-card-modern" data-aos="fade-up">
                                    <div class="card-glow"></div>
                                    <div class="member-photo">
                                        <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}">
                                        <div class="role-badge">Membre</div>
                                    </div>
                                    <div class="member-info">
                                        <h3>{{ $member->name }}</h3>
                                        <p class="role">{{ $member->position }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Middle Row: President Centered -->
                        @if ($president)
                            <div class="president-row">
                                <div class="team-card-modern featured" data-aos="zoom-in">
                                    <div class="card-glow"></div>
                                    <div class="member-photo">
                                        <img src="{{ asset('storage/' . $president->image) }}" alt="{{ $president->name }}">
                                        <div class="role-badge president">Président</div>
                                    </div>
                                    <div class="member-info">
                                        <h3>{{ $president->name }}</h3>
                                        <p class="role">{{ $president->position }}</p>
                                        @if ($president->bio)
                                            <button
                                                onclick="showPresidentMessage('{{ addslashes($president->name) }}', '{{ addslashes($president->position) }}', '{{ asset('storage/' . $president->image) }}', '{{ addslashes($president->bio) }}')"
                                                class="btn-message">
                                                <i class="fas fa-quote-left"></i> <span>Mot du Président</span>
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Bottom Row: 2 Members -->
                        <div class="team-row">
                            @foreach ($bottomMembers as $member)
                                <div class="team-card-modern" data-aos="fade-up">
                                    <div class="card-glow"></div>
                                    <div class="member-photo">
                                        <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}">
                                        <div class="role-badge">Membre</div>
                                    </div>
                                    <div class="member-info">
                                        <h3>{{ $member->name }}</h3>
                                        <p class="role">{{ $member->position }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Extra Row: Remaining Members if any -->
                        @if ($extraMembers->count() > 0)
                            <div class="team-row" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));">
                                @foreach ($extraMembers as $member)
                                    <div class="team-card-modern" data-aos="fade-up">
                                        <div class="card-glow"></div>
                                        <div class="member-photo">
                                            <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}">
                                            <div class="role-badge">Membre</div>
                                        </div>
                                        <div class="member-info">
                                            <h3>{{ $member->name }}</h3>
                                            <p class="role">{{ $member->position }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </section>
            </div>

            <!-- Tab 2: Cellule Technique -->
            <div id="cellule" class="gov-tab-content">
                <div class="row">
                    <div class="col-lg-8" data-aos="fade-right">
                        <div class="inst-detail-card">
                            <h2>Rôle et Missions</h2>
                            <p>La <strong>Cellule Technique</strong> est l'organe d'appui technique du FREMIN. Elle assure
                                l'instruction des dossiers de demande d'appuis et le suivi des décisions.</p>
                        </div>
                        <div class="inst-detail-card">
                            <h2>Instruction des Dossiers</h2>
                            <ul class="inst-detail-list">
                                <li>Analyse technique et financière des projets</li>
                                <li>Évaluation de la viabilité économique</li>
                                <li>Formulation de recommandations au Comité</li>
                                <li>Suivi de la mise en œuvre des décisions</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4" data-aos="fade-left">
                        <div class="inst-detail-subcard">
                            <h3><i class="fas fa-flask"></i> Expertise</h3>
                            <p>Composée de représentants techniques des ministères en charge de l'Industrie, des Finances,
                                du Budget et des PME.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab 3: Tutelles -->
            <div id="tutelles" class="gov-tab-content">
                <div class="row gy-4">
                    <div class="col-md-6" data-aos="fade-up">
                        <div class="inst-detail-card h-100">
                            <h2><i class="fas fa-industry"></i> Tutelle Technique</h2>
                            <p><strong>Ministère chargé de l'Industrie</strong></p>
                            <ul class="inst-detail-list">
                                <li>Définition des orientations stratégiques</li>
                                <li>Validation des programmes et projets</li>
                                <li>Supervision des activités techniques</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="inst-detail-card h-100">
                            <h2><i class="fas fa-coins"></i> Tutelle Financière</h2>
                            <p><strong>Ministère chargé des Finances</strong></p>
                            <ul class="inst-detail-list">
                                <li>Contrôle de la gestion financière</li>
                                <li>Validation des budgets et plans financiers</li>
                                <li>Suivi de l'exécution budgétaire</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("gov-tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].classList.remove("active");
            }
            tablinks = document.getElementsByClassName("gov-tab-btn");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].classList.remove("active");
            }
            document.getElementById(tabName).classList.add("active");
            evt.currentTarget.classList.add("active");
        }

        function showPresidentMessage(name, role, image, bio) {
            Swal.fire({
                title: '<span style="color: #FF8200;">LE MOT DU PRÉSIDENT</span>',
                html: `
                                        <div class="text-start" style="font-family: 'Inter', sans-serif;">
                                            <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                                                <img src="${image}" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 3px solid #009B3A; margin-right: 15px;">
                                                <div>
                                                    <h5 class="mb-0 fw-bold">${name}</h5>
                                                    <p class="text-muted small mb-0">${role}</p>
                                                </div>
                                            </div>
                                            <p style="font-style: italic; color: #555; line-height: 1.6;">"${bio}"</p>
                                            <div class="text-end mt-4">
                                                <p class="mb-0" style="font-weight: 600; color: #009B3A;">${name}</p>
                                                <p class="small text-muted">Président du Comité de Gestion</p>
                                            </div>
                                        </div>
                                    `,
                showCloseButton: true,
                showConfirmButton: true,
                confirmButtonText: 'Fermer',
                confirmButtonColor: '#009B3A',
                width: '600px',
                background: '#fff',
                padding: '2em'
            });
        }
    </script>
@endsection