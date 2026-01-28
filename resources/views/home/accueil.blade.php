@extends('home.layouts.template')
@section('content')

  @include('home.layouts.carousel')

  <!-- Institutional Overview Section (Modern & Intuitive) -->
  <section id="institutional-overview" class="institutional-overview">
    <div class="inst-container" data-aos="fade-up">
      <!-- Ancrage Theme (Left) -->
      <div class="inst-col ancrage-theme">
        <div class="inst-header">
          <span class="inst-label">STRUCTURE D'ÉTAT</span>
          <h2 class="inst-title">ANCRAGE<br>INSTITUTIONNEL</h2>
        </div>
        
        <div class="inst-card">
          <div class="inst-icon-box"><i class="fas fa-landmark"></i></div>
          <h4>Tutelle Technique</h4>
          <p>Le <strong>FREMIN</strong> est placé sous la tutelle technique du <strong>Ministre en charge de l'Industrie</strong>.</p>
        </div>

        <div class="inst-card">
          <div class="inst-icon-box"><i class="fas fa-balance-scale"></i></div>
          <h4>Tutelle Financière</h4>
          <p>Sous la tutelle du <strong>Ministre de l'Économie</strong> en liaison avec le <strong>Budget</strong>.</p>
        </div>

        <div class="inst-card full-width">
          <div class="inst-icon-box"><i class="fas fa-shield-alt"></i></div>
          <h4>Mission Régalienne</h4>
          <p>Instrument stratégique de l'État pour la mise en œuvre du Programme National de Restructuration et de Mise à Niveau des entreprises industrielles.</p>
        </div>
      </div>

      <!-- Mission Theme (Right) -->
      <div class="inst-col mission-theme">
        <div class="inst-header">
          <span class="inst-label">CADRE OPÉRATIONNEL</span>
          <h2 class="inst-title">MISSIONS &<br>GOUVERNANCE</h2>
        </div>

        <div class="inst-card">
          <div class="inst-icon-box"><i class="fas fa-bullseye"></i></div>
          <h4>Objet du Fonds</h4>
          <p>Appui à la restructuration technique et financière des entreprises industrielles.</p>
        </div>

        <div class="inst-card">
          <div class="inst-icon-box"><i class="fas fa-rocket"></i></div>
          <h4>Vision 2030</h4>
          <p>Faire de l'industrie un moteur de croissance robuste et créateur d'emplois durables.</p>
        </div>

        <div class="inst-card full-width">
          <div class="inst-icon-box"><i class="fas fa-users-cog"></i></div>
          <h4>Organes de Gestion</h4>
          <ul class="inst-list-modern">
            <li>Comité de Gestion (Décision)</li>
            <li>Direction de la Mise à Niveau</li>
            <li>Direction Administrative et Financière</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Compact News Section -->
  @if(isset($newsArticles) && $newsArticles->isNotEmpty())
    <section id="compact-news" class="compact-news section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Dernières Actualités</h2>
        <p>L'actualité industrielle et les activités du FREMIN en un coup d'œil</p>
      </div>

      <div class="container-fluid px-5" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-5 align-items-stretch">

          <!-- Trending News List (Left) -->
          <div class="col-lg-4">
            <div class="news-side-panel">
              <div class="panel-header d-flex justify-content-between align-items-center mb-4">
                <h4 class="m-0 fw-bold border-start border-4 border-success ps-3">DERNIÈRES MISSIONS</h4>
                <a href="#" class="view-all text-muted small">Voir tout <i class="fas fa-plus"></i></a>
              </div>

              <div class="side-news-list">
                <div class="side-news-item active">
                  <div class="side-news-img">
                    <img src="{{ asset('assets/img/fremin1.jpeg') }}" alt="">
                  </div>
                  <div class="side-news-info">
                    <span class="news-category">RAPPORT</span>
                    <h5>Mission d'évaluation du Programme de Mise à Niveau (Phase 3)</h5>
                    <span class="news-date"><i class="far fa-calendar-alt"></i> 27 Jan. 2026</span>
                  </div>
                </div>

                <div class="side-news-item">
                  <div class="side-news-img">
                    <img src="{{ asset('assets/img/fremin3.jpeg') }}" alt="">
                  </div>
                  <div class="side-news-info">
                    <span class="news-category">AWARDS</span>
                    <h5>4e édition des Awards de la Performance Industrielle</h5>
                    <span class="news-date"><i class="far fa-calendar-alt"></i> 20 Jan. 2026</span>
                  </div>
                </div>

                <div class="side-news-item">
                  <div class="side-news-img">
                    <img src="{{ asset('assets/img/fremin1.jpeg') }}" alt="">
                  </div>
                  <div class="side-news-info">
                    <span class="news-category">FINANCE</span>
                    <h5>Signature de convention pour le financement industriel</h5>
                    <span class="news-date"><i class="far fa-calendar-alt"></i> 15 Jan. 2026</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Featured News Spotlight (Center) -->
          <div class="col-lg-5">
            <div class="news-spotlight">
              <div class="spotlight-badge">À LA UNE</div>
              <div class="spotlight-img-wrap">
                <img src="{{ asset('assets/img/fremin3.jpeg') }}" alt="Featured">
                <div class="spotlight-content">
                  <div class="spotlight-title-wrap">
                    <span class="spotlight-cat mb-2 d-inline-block">FONCTION PUBLIQUE</span>
                    <h3 style="color:white">Dernière rencontre trimestrielle des DRH au titre de l'année 2025</h3>
                    <a href="{{ route('home.actuality') }}" class="spotlight-link">Découvrir l'article <i
                        class="fas fa-chevron-right ms-2"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Official/Contact Spotlight (Right) -->
          <div class="col-lg-3">
            <div class="institutional-card-v2">
              <div class="decorative-top"></div>
              <div class="official-profile text-center py-4">
                <div class="official-portrait-wrap mb-3 shadow-sm">
                  <img src="{{ asset('assets/img/ministre1.jpg') }}" alt="Commissaire General">
                </div>
                <h5 class="fw-bold mb-1">M. Ibrahim Khalil Konaté</h5>
                <p class="text-success small fw-bold mb-3">MINISTRE DU COMMERCE, DE L'INDUSTRIE ET DE L'ARTISANAT</p>
                <button onclick="showMinisterMessage()" class="btn-action-outline w-100 border-0">
                  <i class="fas fa-quote-left me-2"></i> MOT DU MINISTRE
                </button>
              </div>
            </div>
          </div>

        </div>
      </div>

      <script>
        function showMinisterMessage() {
          Swal.fire({
            title: '<span style="color: #FF8200;">LE MOT DU MINISTRE</span>',
            html: `
                                    <div class="text-start" style="font-family: 'Inter', sans-serif;">
                                      <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                                        <img src="{{ asset('assets/img/ministre1.jpg') }}" 
                                             style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 3px solid #009B3A; margin-right: 15px;">
                                        <div>
                                          <h5 class="mb-0 fw-bold">M. Ibrahim Khalil Konaté</h5>
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
        }
      </script>
    </section>
  @endif
  <!-- /Compact News Section -->

  

  <!-- Featured Departments Section -->
  <section id="funded-companies" class="funded-companies section">
    <div class="container section-title" data-aos="fade-up">
      <h2>Dernières Entreprises Financées</h2>
      <p>Découvrez l'impact concret de nos financements sur le tissu industriel national</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper init-swiper funded-carousel">
        <script type="application/json" class="swiper-config">
                        {
                          "loop": true,
                          "speed": 600,
                          "autoplay": { "delay": 5000 },
                          "slidesPerView": "auto",
                          "pagination": { 
                            "el": ".swiper-pagination", 
                            "type": "bullets", 
                            "clickable": true 
                          },
                          "breakpoints": {
                            "320": { 
                              "slidesPerView": 1, 
                              "spaceBetween": 20 
                            },
                            "1200": { 
                              "slidesPerView": 1, 
                              "spaceBetween": 0 
                            }
                          }
                        }
                        </script>
        <div class="swiper-wrapper">

          <!-- Company 1 -->
          <div class="swiper-slide">
            <div class="funded-item">
              <div class="row align-items-center">
                <div class="col-lg-7">
                  <div class="comparison-container" onmousemove="moveSlider(event)">
                    <img src="{{ asset('assets/img/agro_after.png') }}" alt="After" class="comparison-image image-after">
                    <img src="{{ asset('assets/img/agro_before.png') }}" alt="Before"
                      class="comparison-image image-before">
                    <div class="comparison-slider"></div>
                    <span class="comparison-label label-before">AVANT</span>
                    <span class="comparison-label label-after">APRÈS</span>
                  </div>
                </div>
                <div class="col-lg-5">
                  <div class="funded-content">
                    <span class="industry">Agro-Industrie</span>
                    <h3>Société Ivoirienne de Transformation</h3>
                    <p>Grâce au prêt de FREMIN, cette unité de transformation a pu automatiser son processus de
                      production, triplant sa capacité journalière et améliorant les conditions sanitaires.</p>
                    <a href="contact.html" class="btn-candidature">Plus de détails</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Company 2 -->
          <div class="swiper-slide">
            <div class="funded-item">
              <div class="row align-items-center">
                <div class="col-lg-7">
                  <div class="comparison-container" onmousemove="moveSlider(event)">
                    <img src="{{ asset('assets/img/gallery/gallery-2.webp') }}" alt="After"
                      class="comparison-image image-after">
                    <img src="{{ asset('assets/img/gallery/gallery-1.webp') }}" alt="Before"
                      class="comparison-image image-before">
                    <div class="comparison-slider"></div>
                    <span class="comparison-label label-before">AVANT</span>
                    <span class="comparison-label label-after">APRÈS</span>
                  </div>
                </div>
                <div class="col-lg-5">
                  <div class="funded-content">
                    <span class="industry">Textile</span>
                    <h3>Atelier des Tissages Modernes</h3>
                    <p>Un investissement stratégique dans des métiers à tisser haute performance a permis à cet atelier de
                      conquérir de nouveaux marchés à l'exportation.</p>
                    <a href="contact.html" class="btn-candidature">Plus de détails</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section>

  <script>
    function moveSlider(e) {
      const container = e.currentTarget;
      const slider = container.querySelector('.comparison-slider');
      const afterImage = container.querySelector('.image-after');

      const rect = container.getBoundingClientRect();
      let x = e.clientX - rect.left;

      if (x < 0) x = 0;
      if (x > rect.width) x = rect.width;

      const percentage = (x / rect.width) * 100;

      slider.style.left = percentage + '%';
      afterImage.style.clipPath = `inset(0 ${100 - percentage}% 0 0)`;
    }
  </script>
  <!-- /Featured Departments Section -->

  <!-- Featured Services Section -->
  <section id="featured-services" class="featured-services section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Nos Services Industriels</h2>
      <p>Un accompagnement sur mesure pour la mise à niveau et la performance de votre entreprise</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row gy-4">

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="service-card">
            <div class="service-icon">
              <i class="fas fa-microscope"></i>
            </div>
            <div class="service-image">
              <img src="{{ asset('assets/img/fremin1.jpeg') }}" alt="Service" class="img-fluid" loading="lazy">
            </div>
            <div class="service-content">
              <h3>Diagnostic Technique</h3>
              <p>Audit approfondi de votre outil de production pour identifier les gisements de productivité et de
                modernisation nécessaires.</p>
              <a href="contact.html" class="service-link">En savoir plus <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        </div><!-- End Service Card -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="service-card">
            <div class="service-icon">
              <i class="fas fa-chart-line"></i>
            </div>
            <div class="service-image">
              <img src="{{ asset('assets/img/fremin3.jpeg') }}" alt="Service" class="img-fluid" loading="lazy">
            </div>
            <div class="service-content">
              <h3>Restructuration Financière</h3>
              <p>Optimisation de votre structure de capital et accompagnement dans la recherche de financements adaptés à
                votre croissance.</p>
              <a href="contact.html" class="service-link">En savoir plus <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        </div><!-- End Service Card -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
          <div class="service-card">
            <div class="service-icon">
              <i class="fas fa-cogs"></i>
            </div>
            <div class="service-image">
              <img src="{{ asset('assets/img/fremin7.jpeg') }}" alt="Service" class="img-fluid" loading="lazy">
            </div>
            <div class="service-content">
              <h3>Modernisation des Procédés</h3>
              <p>Intégration de technologies de pointe et de solutions numériques pour digitaliser et automatiser vos
                chaînes de valeur.</p>
              <a href="contact.html" class="service-link">En savoir plus <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        </div><!-- End Service Card -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="service-card">
            <div class="service-icon">
              <i class="fas fa-certificate"></i>
            </div>
            <div class="service-image">
              <img src="{{ asset('assets/img/fremin9.jpeg') }}" alt="Service" class="img-fluid" loading="lazy">
            </div>
            <div class="service-content">
              <h3>Assistance Certification</h3>
              <p>Accompagnement rigoureux vers l'obtention des normes internationales (ISO) pour accroître votre
                compétitivité.</p>
              <a href="contact.html" class="service-link">En savoir plus <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        </div><!-- End Service Card -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="service-card">
            <div class="service-icon">
              <i class="fas fa-users-cog"></i>
            </div>
            <div class="service-image">
              <img src="{{ asset('assets/img/fremin10.jpeg') }}" alt="Service" class="img-fluid" loading="lazy">
            </div>
            <div class="service-content">
              <h3>Renforcement de Capacités</h3>
              <p>Programmes de formation technique et managériale pour vos équipes, afin de soutenir l'excellence
                opérationnelle.</p>
              <a href="contact.html" class="service-link">En savoir plus <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        </div><!-- End Service Card -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
          <div class="service-card">
            <div class="service-icon">
              <i class="fas fa-chess-knight"></i>
            </div>
            <div class="service-image">
              <img src="{{ asset('assets/img/fremin6.jpeg') }}" alt="Service" class="img-fluid" loading="lazy">
            </div>
            <div class="service-content">
              <h3>Pilotage Stratégique</h3>
              <p>Élaboration de schémas directeurs et de plans stratégiques pour une vision claire et une gouvernance
                maîtrisée.</p>
              <a href="contact.html" class="service-link">En savoir plus <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <!-- End Service Card -->

      </div>

    </div>

  </section><!-- /Featured Services Section -->

  <!-- Find A Doctor Section -->
  <section id="find-a-doctor" class="find-a-doctor section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="200">
        <div class="col-lg-10">
          <div class="search-header">
            <h2>Une équipe au service du développement industriel</h2>
            <p>Le FREMIN s’appuie sur une équipe pluridisciplinaire composée de professionnels expérimentés, engagés
              dans l’accompagnement, la restructuration et la mise à niveau des entreprises industrielles ivoiriennes.</p>
          </div>

          <div class="specialists-showcase" data-aos="fade-up" data-aos-delay="300">
            <div class="specialist-card featured" data-aos="slide-up" data-aos-delay="100">
              <div class="profile-image">
                <img src="{{asset('assets/img/Esso.jpeg')}}" alt="Marc Koffi" class="img-fluid">
              </div>
              <div class="card-content">
                <div class="tricolor-bar">
                  <span class="orange"></span>
                  <span class="white"></span>
                  <span class="green"></span>
                </div>
                <div class="specialist-data">
                  <h3>M. ESSO Jacques</h3>
                  <p class="specialty">Président du Comité de Gestion, Ministère en charge de l'industrie</p>
                  <div class="credentials">
                  </div>
                </div>
              </div>
            </div>

            <div class="specialist-card" data-aos="slide-up" data-aos-delay="200">
              <div class="profile-image">
                <img src="{{asset('assets/img/Soumahoro.jpeg')}}" alt="Affoua N'Guessan" class="img-fluid">
              </div>
              <div class="card-content">
                <div class="tricolor-bar">
                  <span class="orange"></span>
                  <span class="white"></span>
                  <span class="green"></span>
                </div>
                <div class="specialist-data">
                  <h3>M. SOUMAHORO Dély</h3>
                  <p class="specialty">Membre du Comité de Gestion, Ministère en charge des finances</p>
                  <div class="credentials">
                  </div>
                </div>
              </div>
            </div>

            <div class="specialist-card" data-aos="slide-up" data-aos-delay="300">
              <div class="profile-image">
                <img src="{{asset('assets/img/AHUELIe.jpeg')}}" alt="Sarah Thompson" class="img-fluid">
              </div>
              <div class="card-content">
                <div class="tricolor-bar">
                  <span class="orange"></span>
                  <span class="white"></span>
                  <span class="green"></span>
                </div>
                <div class="specialist-data">
                  <h3>M. AHUELIE Manouan</h3>
                  <p class="specialty">Membre du Comité de Gestion, Ministère en charge du budget</p>
                  <div class="credentials">
                  </div>
                </div>
              </div>
            </div>

            <div class="specialist-card" data-aos="slide-up" data-aos-delay="400">
              <div class="profile-image">
                <img src="{{asset('assets/img/ANGOA.jpeg')}}" alt="Michael Rivera" class="img-fluid">
              </div>
              <div class="card-content">
                <div class="tricolor-bar">
                  <span class="orange"></span>
                  <span class="white"></span>
                  <span class="green"></span>
                </div>
                <div class="specialist-data">
                  <h3>M. ANGOA Berthin</h3>
                  <p class="specialty">Membre du Comité de Gestion, Ministère en charge des PME</p>
                  <div class="credentials">
                  </div>
                </div>
              </div>
            </div>

            <div class="specialist-card" data-aos="slide-up" data-aos-delay="500">
              <div class="profile-image">
                <img src="{{asset('assets/img/Kante.jpeg')}}" alt="Lisa Garcia" class="img-fluid">
              </div>
              <div class="card-content">
                <div class="tricolor-bar">
                  <span class="orange"></span>
                  <span class="white"></span>
                  <span class="green"></span>
                </div>
                <div class="specialist-data">
                  <h3>M. KANTE Ismaël</h3>
                  <p class="specialty">Suppléant membre du Comité de Gestion, Banque Nationale D'investissement</p>
                  <div class="credentials">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section><!-- /Find A Doctor Section -->

@endsection

<script>
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
</style>