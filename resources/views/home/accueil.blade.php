@extends('home.layouts.template')
@section('content')

    @include('home.layouts.carousel')

    <!-- Institutional Overview Section - Compact Refinement -->
    <section id="institutional-overview" class="institutional-overview-compact">
        <div class="inst-container-compact" data-aos="fade-up">
            <div class="inst-header-compact">
                <h2 class="inst-title-compact">PRINCIPAUX ORGANES DE GESTION</h2>
                <div class="tricolor-accent-compact">
                    <span class="bar green"></span>
                    <span class="bar white"></span>
                    <span class="bar orange"></span>
                </div>
            </div>

            <div class="inst-grid-compact">
                @foreach ($governanceCards as $card)
                    <div class="card-compact" data-aos="fade-up" data-aos-delay="{{ 100 * $loop->index }}">
                        <div class="icon-wrap"><i class="{{ $card->icon }}"></i></div>
                        <div class="card-body-compact">
                            <h4>{{ $card->title }}</h4>
                            <p>{!! $card->description !!}</p>
                            @if ($card->list_items)
                                <ul class="list-compact">
                                    @foreach ($card->list_items as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="inst-footer-action">
                <a href="{{ route('home.about') }}" class="btn-discover-all">
                    <span>Voir plus</span>
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Specific Projects Section - Compact Design -->
    <section id="specific-projects" class="specific-projects-compact">
        <div class="inst-container-compact" data-aos="fade-up">
            <div class="inst-header-compact">
                <h2 class="inst-title-compact">Nos Projets</h2>
                <div class="tricolor-accent-compact">
                    <span class="bar orange"></span>
                    <span class="bar white"></span>
                    <span class="bar green"></span>
                </div>
            </div>

            <div class="inst-grid-compact">
                <!-- PNRMN -->
                <div class="card-compact" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon-wrap orange"><i class="fas fa-industry"></i></div>
                    <div class="card-body-compact">
                        <h4>Mise à niveau des entreprises industrielles</h4>
                        <p>Ce projet est réalisé dans le cadre du Programme National de Restructuration et de Mise à Niveau
                            (PNRMN) des entreprises industrielles. Le PNRMN vise à préparer les entreprises manufacturières
                            ivoiriennes à faire face à une concurrence accrue, dans le cadre des accords multilatéraux de
                            libre-échange. Le FREMIN est l’instrument financier de mise en œuvre des activités du PNRMN.</p>
                        <a href="{{ route('home.projets.modernisation.presentation') }}" class="card-link-compact">En savoir
                            plus <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- AED -->
                <div class="card-compact" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-wrap orange"><i class="fas fa-ambulance"></i></div>
                    <div class="card-body-compact">
                        <h4>Appui aux entreprises en difficultés (AED)</h4>
                        <p>Le projet d’Appui aux Entreprises en Difficulté (AED) a été mis en place pour soutenir les
                            entreprises impactées par les effets post COVID-19 et à l’inflation suscitée par la guerre
                            russo-ukrainienne.</p>
                        <a href="{{ route('home.projets.aed') }}" class="card-link-compact">En savoir plus <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Infrastructure -->
                <div class="card-compact" data-aos="fade-up" data-aos-delay="300">
                    <div class="icon-wrap orange"><i class="fas fa-tools"></i></div>
                    <div class="card-body-compact">
                        <h4>Mise en place des infrastructures industrielles</h4>
                        <p>Développement et réhabilitation des zones industrielles pour offrir un écosystème performant aux
                            investisseurs.</p>
                        <a href="{{ route('home.projets.infrastructures') }}" class="card-link-compact">En savoir plus <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="agro-success" class="agro-success section">
        <div class="inst-container-compact" data-aos="fade-up">
            <div class="inst-header-compact mb-4 text-center">
                <h2 class="inst-title-compact">RÉALISATIONS PRINCIPALES</h2>
                <div class="tricolor-accent-compact mx-auto">
                    <span class="bar orange"></span>
                    <span class="bar white"></span>
                    <span class="bar green"></span>
                </div>
                <p class="mt-3">Les principales réalisations du FREMIN au profit des acteurs du secteur industriel
                </p>
            </div>
        </div>

        <div class="container" data-aos="fade-up">
            <div class="swiper init-swiper agro-carousel">
                <script type="application/json" class="swiper-config">
                                                                                                    {
                                                                                                        "loop": true,
                                                                                                        "speed": 600,
                                                                                                        "autoplay": { "delay": 6000 },
                                                                                                        "slidesPerView": 1,
                                                                                                        "pagination": { "el": ".agro-pagination", "clickable": true },
                                                                                                        "navigation": { "nextEl": ".agro-next", "prevEl": ".agro-prev" }
                                                                                                    }
                                                                                                    </script>

                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide">
                        <div class="agro-slide-card">
                            <div class="row align-items-center g-0">
                                <div class="col-lg-5">
                                    <div class="agro-content-box">
                                        <div class="quote-mark"><i class="fas fa-quote-left"></i></div>
                                        <h3>Elaboration de cinq (05) stratégies de développement de cinq (05) cluster</h3>
                                        <p>Les clusters sont des ensembles d’unités industriels regroupés autour d’un
                                            secteur ou d’une filière donnée. Ils se caractérisent par un réseau
                                            d’entreprises industrielles et d’institutions proches géographiquement et
                                            interdépendantes liées par des métiers, des technologies et des savoir-faire.
                                            . Il s’agit notamment des clusters de la chimie et plasturgie, des matériaux de
                                            construction, d’ameublement et d’équipement, de l’emballage, de l’agro-industrie
                                            et de l’industrie pharmaceutique.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="agro-gallery">
                                        <div class="agro-img-main">
                                            <img src="{{ asset('assets/img/remises.png') }}" alt="Remise équipements 1">
                                        </div>
                                        <div class="agro-img-sub">
                                            <img src="{{ asset('assets/img/remises1.png') }}" alt="Remise équipements 2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="swiper-slide">
                        <div class="agro-slide-card">
                            <div class="row align-items-center g-0">
                                <div class="col-lg-5">
                                    <div class="agro-content-box">
                                        <div class="quote-mark"><i class="fas fa-quote-left"></i></div>
                                        <h3>Stratégie pour le développement de la petite transformation</h3>
                                        <p>La création d’emplois décents constitue un enjeu majeur pour le Gouvernement
                                            ivoirien. Afin d’y répondre, les autorités ont placé l’industrialisation au cœur
                                            de la transformation structurelle de l’économie, conformément aux orientations
                                            du PND 2021-2025. À ce titre, la stratégie du Ministère du Commerce, de
                                            l’Industrie et de l’Artisanat repose notamment sur le développement de clusters
                                            prioritaires.
                                            Dans cette dynamique, le Ministère, à travers le Fonds de Restructuration et de
                                            Mise à Niveau des entreprises industrielles (FREMIN), a initié une étude
                                            stratégique pour le développement de la petite transformation (Très Petite
                                            Entreprise et des Petites et Moyennes Industries en Côte d’Ivoire)
                                            .</p>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="agro-gallery">
                                        <div class="agro-img-main">
                                            <img src="{{ asset('assets/img/image.png') }}" alt="Tricycles 1">
                                        </div>
                                        <div class="agro-img-sub">
                                            <img src="{{ asset('assets/img/moto1.png') }}" alt="Tricycles 2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 3 -->
                    <div class="swiper-slide">
                        <div class="agro-slide-card">
                            <div class="row align-items-center g-0">
                                <div class="col-lg-5">
                                    <div class="agro-content-box">
                                        <div class="quote-mark"><i class="fas fa-quote-left"></i></div>
                                        <h3>Construction du centre Centre des Expositions des Produits de la Petite
                                            Transformation et de l’Artisanat (CEPPTA) </h3>
                                        <p>Le Ministère du Commerce, de l’Industrie et de l’Artisanat, à travers le FREMIN a
                                            réalisé la première phase du CEPPTA dans la zone industrielle de Yamoussoukro.
                                            Les travaux de construction de la première ont démarré en juillet 2024 et ont
                                            pris fin en octobre 2025, sous le suivi des services compétents du Ministère de
                                            la Construction ainsi que des organes de gestion du FREMIN.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="agro-gallery">
                                        <div class="agro-img-main">
                                            <img src="{{ asset('assets/img/image.png') }}" alt="Tricycles 1">
                                        </div>
                                        <div class="agro-img-sub">
                                            <img src="{{ asset('assets/img/moto1.png') }}" alt="Tricycles 2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 4 -->
                    <div class="swiper-slide">
                        <div class="agro-slide-card">
                            <div class="row align-items-center g-0">
                                <div class="col-lg-5">
                                    <div class="agro-content-box">
                                        <div class="quote-mark"><i class="fas fa-quote-left"></i></div>
                                        <h3>Acquisition et distribution d’équipements de production au profit des acteurs de
                                            la petite agro-transformation</h3>
                                        <p>Dans le cadre d’un vaste programme d’appui aux acteurs transformateurs
                                            agroalimentaires qui vise à soutenir plus d’un millier de bénéficiaires à
                                            l’échelle nationale. Le Ministre Docteur Souleymane Diarassouba a présidé le
                                            jeudi 19 juin 2025, au Centre de Démonstration et de Promotion de Technologie
                                            (CDT) la première phase de la cérémonie de remise des équipements de production
                                            au profit de douze (12) acteurs dont onze (11) femmes de l’agro-transformation.
                                            Ces équipements de production
                                            sont composés entre de broyeurs, déshydrateurs, extracteurs de jus,
                                            torréfacteurs et de séchoirs.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="agro-gallery">
                                        <div class="agro-img-main">
                                            <img src="{{ asset('assets/img/image.png') }}" alt="Tricycles 1">
                                        </div>
                                        <div class="agro-img-sub">
                                            <img src="{{ asset('assets/img/moto1.png') }}" alt="Tricycles 2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation Controls -->
                <div class="agro-controls">
                    <div class="agro-prev"><i class="fas fa-chevron-left"></i></div>
                    <div class="agro-pagination"></div>
                    <div class="agro-next"><i class="fas fa-chevron-right"></i></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Bar -->
    <section class="pres-stats-bar" style="height: auto;">
        <div class="container">
            <div class="row g-4 justify-content-center">
                @foreach($statistics as $stat)
                    <div class="col-md-3">
                        <div class="stat-v2">
                            <span class="number">
                                <span class="purecounter" data-purecounter-start="0"
                                    data-purecounter-end="{{ preg_replace('/[^0-9]/', '', $stat->value) }}"
                                    data-purecounter-duration="1">0</span>{{ preg_replace('/[0-9]/', '', $stat->value) }}
                            </span>
                            <span class="label">{{ $stat->label }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Compact News Section -->
    <section id="compact-news" class="compact-news section">
        <div class="inst-container-compact" data-aos="fade-up">
            <div class="inst-header-compact mb-5">
                <h2 class="inst-title-compact">Mot du ministre</h2>
                <div class="tricolor-accent-compact">
                    <span class="bar orange"></span>
                    <span class="bar white"></span>
                    <span class="bar green"></span>
                </div>
            </div>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">

                <!-- Official/Contact Spotlight -->
                <div class="col-lg-5">
                    <div class="institutional-card-v2">
                        <div class="decorative-top"></div>
                        <div class="official-profile text-center py-5">
                            @if(isset($ministerInfo))
                                <div class="official-portrait-wrap mb-4 shadow-sm mx-auto">
                                    <img src="{{ asset('storage/' . $ministerInfo->image) }}" alt="{{ $ministerInfo->name }}">
                                </div>
                                <h4 class="fw-bold mb-2">{{ $ministerInfo->name }}</h4>
                                <p class="text-success fw-bold mb-4">{{Str::upper($ministerInfo->function)}}</p>
                                <button onclick="showMinisterMessage()" class="btn-action-outline px-4 py-2">
                                    <i class="fas fa-quote-left me-2"></i> MOT DU MINISTRE
                                </button>
                            @else
                                <div class="official-portrait-wrap mb-4 shadow-sm mx-auto">
                                    <img src="{{ asset('assets/img/ministre.jpg') }}" alt="Ministre">
                                </div>
                                <h4 class="fw-bold mb-2">M. Souleymane Diarrassouba</h4>
                                <p class="text-success fw-bold mb-4">MINISTRE DU COMMERCE ET DE L'INDUSTRIE</p>
                                <button onclick="showMinisterMessage()" class="btn-action-outline px-4 py-2">
                                    <i class="fas fa-quote-left me-2"></i> MOT DU MINISTRE
                                </button>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <script>
            function showMinisterMessage() {
                @if(isset($ministerInfo))
                    const ministerName = @json($ministerInfo->name);
                    const ministerFunction = @json($ministerInfo->function);
                    const ministerImage = "{{ asset('storage/' . $ministerInfo->image) }}";
                    const ministerSignature = "{{ $ministerInfo->signature ? asset('storage/' . $ministerInfo->signature) : '' }}";
                    const ministerMessage = `{!! nl2br(e($ministerInfo->message)) !!}`;

                    let signatureHtml = '';
                    if (ministerSignature) {
                        signatureHtml = `<div class="text-end mt-4">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <img src="${ministerSignature}" style="max-height: 50px; opacity: 0.7;">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>`;
                    }

                    Swal.fire({
                        title: '<span style="color: #FF8200;">LE MOT DU MINISTRE</span>',
                        html: `
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="text-start" style="font-family: 'Inter', sans-serif;">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <img src="${ministerImage}" 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 3px solid #009B3A; margin-right: 15px;">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <h5 class="mb-0 fw-bold">${ministerName}</h5>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <p class="text-muted small mb-0">${ministerFunction}</p>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div style="font-style: italic; color: #555; line-height: 1.6;">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            "${ministerMessage}"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ${signatureHtml}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    `,
                        showCloseButton: true,
                        showConfirmButton: true,
                        confirmButtonText: 'Fermer',
                        confirmButtonColor: '#009B3A',
                        width: '600px',
                        background: '#fff',
                        padding: '2em',
                        customClass: {
                            popup: 'institutional-swal-popup'
                        }
                    });
                @else
                    Swal.fire({
                        title: '<span style="color: #FF8200;">LE MOT DU MINISTRE</span>',
                        html: `
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="text-start" style="font-family: 'Inter', sans-serif;">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <img src="{{ asset('assets/img/mot_ministre.jpg') }}" 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 3px solid #009B3A; margin-right: 15px;">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <h5 class="mb-0 fw-bold">M. Souleymane Diarrassouba</h5>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <p class="text-muted small mb-0">Ministre du Commerce et de l'Industrie</p>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <p style="font-style: italic; color: #555; line-height: 1.6;">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            "Le Fonds de Restructuration et de Mise à Niveau des entreprises industrielles, en abrégé FREMIN, au fil des ans, s’est positionné comme l’un des principaux instruments pour le développement industriel en Côte d’Ivoire. 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            En effet, il poursuit efficacement sa mission de soutien à l’activité industrielle, notamment la mise en œuvre du Programme National de Restructuration et de Mise à Niveau des entreprises industrielles (PNRMN), la promotion de la petite transformation industrielle, l’appui aux entreprises en difficultés, en parfaite cohérence avec la vision du Gouvernement en matière de transformation structurelle de notre économie.
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            L’année qui s’achève a été marquée par de nombreuses actions et des résultats concrets, qui traduisent l’engagement, le professionnalisme et le sens élevé des responsabilités des organes de gestion du FREMIN.
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            Il me tient à cœur d’exprimer toute ma fierté au regard du travail accompli tout au long de l’année écoulée et vous exhorte à maintenir cette dynamique afin que ce Fonds demeure un outil stratégique et crédible au service du développement industriel de notre pays."
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </p>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="text-end mt-4">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <img src="{{ asset('assets/img/signature_minister.png') }}" style="max-height: 50px; opacity: 0.7;">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    `,
                        showCloseButton: true,
                        showConfirmButton: true,
                        confirmButtonText: 'Fermer',
                        confirmButtonColor: '#009B3A',
                        width: '600px',
                        background: '#fff',
                        padding: '2em',
                        customClass: {
                            popup: 'institutional-swal-popup'
                        }
                    });
                @endif
                                                                                                                                                                                                                                                                                                }
        </script>

        <script>
            function showPresidentMessage() {
                Swal.fire({
                    title: '<span style="color: #FF8200;">LE MOT DU PRÉSIDENT</span>',
                    html: `
                                                                                                                                                                                                                                                                                                                                                                                  <div class="text-start" style="font-family: 'Inter', sans-serif;">
                                                                                                                                                                                                                                                                                                                                                                                    <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                                                                                                                                                                                                                                                                                                                                                                                      <img src="{{ asset('assets/img/Esso.jpeg') }}" 
                                                                                                                                                                                                                                                                                                                                                                                           style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 3px solid #009B3A; margin-right: 15px;">
                                                                                                                                                                                                                                                                                                                                                                                      <div>
                                                                                                                                                                                                                                                                                                                                                                                        <h5 class="mb-0 fw-bold">M. ESSO Jacques</h5>
                                                                                                                                                                                                                                                                                                                                                                                        <p class="text-muted small mb-0">Président du Comité de Gestion</p>
                                                                                                                                                                                                                                                                                                                                                                                      </div>
                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                    <p style="font-style: italic; color: #555; line-height: 1.6;">
                                                                                                                                                                                                                                                                                                                                                                                      "En ma qualité de Président du Comité de Gestion du FREMIN, je tiens à souligner l'importance stratégique de notre mission dans l'accompagnement des entreprises industrielles ivoiriennes vers l'excellence et la compétitivité internationale.
                                                                                                                                                                                                                                                                                                                                                                                      Le FREMIN constitue un levier essentiel de la politique industrielle nationale. À travers le Programme National de Restructuration et de Mise à Niveau (PNRMN), nous œuvrons quotidiennement pour moderniser notre tissu industriel et renforcer les capacités de nos entreprises.
                                                                                                                                                                                                                                                                                                                                                                                      Notre engagement se traduit par un accompagnement technique et financier de qualité, une gouvernance transparente et des décisions guidées par l'intérêt supérieur du développement industriel de notre pays.
                                                                                                                                                                                                                                                                                                                                                                                      Je félicite l'ensemble des acteurs du FREMIN pour leur professionnalisme et leur dévouement, et j'encourage toutes les entreprises éligibles à solliciter nos appuis pour leurs projets de modernisation et d'expansion."
                                                                                                                                                                                                                                                                                                                                                                                    </p>
                                                                                                                                                                                                                                                                                                                                                                                    <div class="text-end mt-4">
                                                                                                                                                                                                                                                                                                                                                                                      <p class="mb-0" style="font-weight: 600; color: #009B3A;">M. ESSO Jacques</p>
                                                                                                                                                                                                                                                                                                                                                                                      <p class="small text-muted">Président du Comité de Gestion du FREMIN</p>
                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                  </div>
                                                                                                                                                                                                                                                                                                                                                                                `,
                    showCloseButton: true,
                    showConfirmButton: true,
                    confirmButtonText: 'Fermer',
                    confirmButtonColor: '#009B3A',
                    width: '600px',
                    background: '#fff',
                    padding: '2em',
                    customClass: {
                        popup: 'institutional-swal-popup'
                    }
                });
            }
        </script>
    </section>
    <!-- /Compact News Section -->





    <!-- Partners Section -->
    <section class="partners-section">
        <div class="container">

            <!-- Section Header -->
            <div class="partners-header" data-aos="fade-up">
                <h2>{{ __('our_partners') }}</h2>
            </div>

            <!-- Partners Carousel -->
            <div class="partners-carousel" data-aos="fade-up" data-aos-delay="200">

                @foreach ($partners as $partner)
                    <div class="partner-item" style="text-align: center; margin: 0 10px;">
                        <div class="partner-logo">
                            @if($partner->website)
                                <a href="{{ $partner->website }}" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}">
                                </a>
                            @else
                                <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}">
                            @endif
                        </div>
                        <p class="partner-name" style="margin-top: 8px; font-size: 14px; font-weight: 600; color: #333;">
                            {{ $partner->name }}
                        </p>
                    </div>
                @endforeach

            </div>

        </div>
    </section><!-- /Partners Section -->

    @include('home.layouts.faq')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const counters = document.querySelectorAll('.counter');
            const duration = 2000; // 2 seconds animation
            const frameDuration = 20; // Update every 20ms

            const startCounters = (elements) => {
                elements.forEach(counter => {
                    const target = +counter.getAttribute('data-target');
                    const increment = target / (duration / frameDuration);

                    let current = 0;

                    const updateCount = () => {
                        current += increment;

                        if (current < target) {
                            counter.innerText = Math.ceil(current);
                            setTimeout(updateCount, frameDuration);
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

<script>
    // Testimonials Carousel Scroll
    function scrollTestimonials(direction) {
        const carousel = document.querySelector('.testimonials-carousel');
        const cards = document.querySelectorAll('.testimonial-card');
        const dots = document.querySelectorAll('.testimonials-nav .dot');

        if (!carousel || cards.length === 0) return;

        const cardWidth = cards[0].offsetWidth;
        const gap = 35; // gap entre les cartes
        const scrollAmount = cardWidth + gap;

        let currentScroll = carousel.scrollLeft;
        let newScroll;

        if (direction === 'next') {
            newScroll = currentScroll + scrollAmount;
        } else {
            newScroll = currentScroll - scrollAmount;
        }

        // Smooth scroll
        carousel.scrollTo({
            left: newScroll,
            behavior: 'smooth'
        });

        // Update dots
        setTimeout(() => {
            const activeIndex = Math.round(carousel.scrollLeft / scrollAmount);
            dots.forEach((dot, index) => {
                if (index === activeIndex) {
                    dot.classList.add('active');
                } else {
                    dot.classList.remove('active');
                }
            });
        }, 300);
    }

    // Dots click navigation
    document.addEventListener('DOMContentLoaded', function () {
        const dots = document.querySelectorAll('.testimonials-nav .dot');
        const carousel = document.querySelector('.testimonials-carousel');
        const cards = document.querySelectorAll('.testimonial-card');

        if (carousel && cards.length > 0) {
            const cardWidth = cards[0].offsetWidth;
            const gap = 35;
            const scrollAmount = cardWidth + gap;

            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    carousel.scrollTo({
                        left: scrollAmount * index,
                        behavior: 'smooth'
                    });

                    dots.forEach(d => d.classList.remove('active'));
                    dot.classList.add('active');
                });
            });

            // Update dots on scroll
            carousel.addEventListener('scroll', () => {
                const activeIndex = Math.round(carousel.scrollLeft / scrollAmount);
                dots.forEach((dot, index) => {
                    if (index === activeIndex) {
                        dot.classList.add('active');
                    } else {
                        dot.classList.remove('active');
                    }
                });
            });
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.toggle-feature').forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                const featureId = this.dataset.feature;
                const feature = document.getElementById(featureId);
                const preview = feature.querySelector('.text-preview');
                const full = feature.querySelector('.text-full');

                if (full.style.display === 'none') {
                    preview.style.display = 'none';
                    full.style.display = 'inline';
                    this.textContent = 'Voir moins';
                } else {
                    preview.style.display = 'inline';
                    full.style.display = 'none';
                    this.textContent = 'Voir plus';
                }
            });
        });

        // Introduction toggle
        document.querySelectorAll('.toggle-introduction').forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                const introId = this.dataset.intro;
                const intro = document.getElementById(introId);
                const preview = intro.querySelector('.text-preview');
                const full = intro.querySelector('.text-full');

                if (full.style.display === 'none') {
                    preview.style.display = 'none';
                    full.style.display = 'inline';
                    this.textContent = 'Voir moins';
                } else {
                    preview.style.display = 'inline';
                    full.style.display = 'none';
                    this.textContent = 'Voir plus';
                }
            });
        });
    });
</script>

<style>
    /* OVERRIDE COMPLET pour la pagination */
    #funded-companies .swiper-pagination {
        position: static !important;
        bottom: 0 !important;
        margin-top: 20px !important;
        padding: 0 !important;
        height: auto !important;
        line-height: 1 !important;
    }

    #funded-companies .swiper-pagination-bullet {
        margin: 0 5px !important;
        width: 12px !important;
        height: 12px !important;
        background: #FF8200 !important;
        opacity: 0.6 !important;
        vertical-align: middle !important;
    }

    #funded-companies .swiper-pagination-bullet-active {
        opacity: 1 !important;
        background: #009B3A !important;
        transform: scale(1.1) !important;
    }

    /* Reset complet de tous les espaces */
    #funded-companies .swiper-container,
    #funded-companies .swiper,
    #funded-companies .swiper-wrapper {
        padding: 0 !important;
        margin: 0 !important;
    }

    #funded-companies .swiper-slide {
        margin: 0 !important;
        padding: 0 !important;
    }

    /* Comparison Slider Styling */
    .comparison-container {
        position: relative;
        width: 100%;
        height: 450px;
        overflow: hidden;
        border-radius: 12px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        cursor: ew-resize;
    }

    .comparison-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        pointer-events: none;
    }

    .image-after {
        z-index: 1;
        clip-path: inset(0 0 0 50%);
        /* Start hidden from left */
    }

    .image-before {
        z-index: 0;
    }

    .comparison-slider {
        position: absolute;
        top: 0;
        left: 50%;
        width: 4px;
        height: 100%;
        background: #fff;
        z-index: 2;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        pointer-events: none;
    }

    .comparison-slider::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 40px;
        height: 40px;
        background: #fff;
        border-radius: 50%;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%23333' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='15 18 9 12 15 6'%3E%3C/polyline%3E%3Cpolyline points='9 18 3 12 9 6'%3E%3C/polyline%3E%3Cpolyline points='21 18 15 12 21 6'%3E%3C/polyline%3E%3C/svg%3E");
        background-size: 20px;
        background-position: center;
        background-repeat: no-repeat;
    }

    .comparison-label {
        position: absolute;
        bottom: 20px;
        padding: 5px 15px;
        background: rgba(0, 0, 0, 0.6);
        color: #fff;
        font-size: 12px;
        font-weight: 700;
        border-radius: 4px;
        z-index: 3;
        pointer-events: none;
    }

    .label-before {
        left: 20px;
    }

    .label-after {
        right: 20px;
    }
</style>