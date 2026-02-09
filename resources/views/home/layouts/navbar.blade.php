<header class="institutional-header d-flex align-items-center justify-content-between px-4 py-2">
  <div class="institutional-logo">
    <img src="{{ asset('assets/img/logo_fremin.jpg') }}" alt="Logo FREMIN" style="height: 60px;">
  </div>

  <div class="institutional-text text-center flex-grow-1 mx-4">
    <p class="m-0">Fonds de Restructuration et de Mise à Niveau des Entreprises Industrielles</p>
  </div>

  <div class="institutional-motto d-none d-lg-block">
    <img src="{{ asset('assets/img/embleme1111.png') }}" alt="" style="width: 100px;">
  </div>

  <!-- Language Toggle -->
  <div class="lang-toggle-wrapper ms-3">
    <input type="checkbox" id="lang-toggle" class="lang-checkbox" {{ app()->getLocale() == 'en' ? 'checked' : '' }}
      onchange="window.location.href = this.checked ? '{{ route('lang.switch', 'en') }}' : '{{ route('lang.switch', 'fr') }}'">
    <label for="lang-toggle" class="lang-label">
      <span class="lang-text fr">FR</span>
      <span class="lang-text en">EN</span>
      <div class="lang-slider"></div>
    </label>
  </div>
</header>

<header id="header" class="header d-flex align-items-center">
  <div class="container position-relative d-flex align-items-center justify-content-between">

    {{-- <a href="{{route('home')}}" class="logo d-flex align-items-center me-auto me-xl-0">
      <img src="{{asset('assets/img/logo_fremin.jpg')}}" alt="">
    </a> --}}

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="{{route('home')}}" class="active">{{ __('home') }}</a></li>
        <li><a href="{{route('home.about')}}">{{ __('presentation') }}</a></li>
        <li><a href="{{route('home.actuality')}}">{{ __('news_events') }}</a></li>
        <li><a href="{{route('home.publication')}}">{{ __('publications') }}</a></li>
        <li><a href="{{route('home.program')}}">{{ __('programs') }}</a></li>
        <li><a href="{{route('home.contact')}}">{{ __('contact') }}</a></li>

      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <!-- Global Search -->
    <div class="global-search-wrapper d-flex align-items-center gap-3">
      <form action="{{route('home.search')}}" method="GET" class="global-search-form">
        <div class="search-input-group">
          <i class="fas fa-search search-icon"></i>
          <input type="text" name="q" class="search-input" placeholder="{{ __('search') }}" autocomplete="off" required>
          <button type="submit" class="search-submit-btn">
            <i class="fas fa-arrow-right"></i>
          </button>
        </div>
      </form>

      <style>
        .lang-toggle-wrapper {
          position: relative;
          display: inline-block;
          z-index: 1001;
        }

        .lang-checkbox {
          display: none;
        }

        .lang-label {
          background-color: #06634e;
          width: 70px;
          height: 32px;
          border-radius: 32px;
          position: relative;
          cursor: pointer;
          display: flex;
          align-items: center;
          justify-content: space-between;
          padding: 0 8px;
          transition: all 0.3s ease;
          box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.2);
          border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .lang-slider {
          background-color: #fff;
          width: 24px;
          height: 24px;
          position: absolute;
          left: 4px;
          top: 3px;
          border-radius: 50%;
          transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
          z-index: 2;
        }

        .lang-text {
          color: #fff;
          font-size: 11px;
          font-weight: 800;
          z-index: 1;
          user-select: none;
          transition: opacity 0.3s;
        }

        .lang-text.fr {
          margin-left: auto;
          opacity: 1;
        }

        .lang-text.en {
          margin-right: auto;
          opacity: 0.5;
        }

        .lang-checkbox:checked+.lang-label .lang-slider {
          transform: translateX(38px);
        }

        .lang-checkbox:checked+.lang-label .lang-text.fr {
          opacity: 0.5;
        }

        .lang-checkbox:checked+.lang-label .lang-text.en {
          opacity: 1;
        }

        .lang-label:active .lang-slider {
          width: 30px;
        }
      </style>
    </div>

  </div>

</header>
<div class="hero-ticker-tape">
  <div class="ticker-content">
    <div class="ticker-track">
      <span>MISE À NIVEAU TECHNIQUE • RESTRUCTURATION FINANCIÈRE • CAPITAL HUMAIN • CERTIFICATION ISO •
        MODERNISATION INDUSTRIELLE • MISE À NIVEAU TECHNIQUE • RESTRUCTURATION FINANCIÈRE • CAPITAL HUMAIN •
        CERTIFICATION ISO • MODERNISATION INDUSTRIELLE</span>
    </div>
  </div>
</div>