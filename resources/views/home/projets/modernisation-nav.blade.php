<div class="container mb-5">
    <div class="d-flex justify-content-center">
        <div class="nav nav-pills custom-nav-pills shadow-sm rounded-pill p-1 bg-white" id="v-pills-tab" role="tablist"
            aria-orientation="horizontal">
            <a class="nav-link rounded-pill px-4 {{ Route::is('home.projets.modernisation.presentation') ? 'active' : '' }}"
                href="{{ route('home.projets.modernisation.presentation') }}"
                style="{{ Route::is('home.projets.modernisation.presentation') ? 'background-color: #009B3A; color: white;' : 'color: #333;' }}">
                {{ __('project_presentation') }}
            </a>
            <a class="nav-link rounded-pill px-4 {{ Route::is('home.projets.modernisation.realisation') ? 'active' : '' }}"
                href="{{ route('home.projets.modernisation.realisation') }}"
                style="{{ Route::is('home.projets.modernisation.realisation') ? 'background-color: #009B3A; color: white;' : 'color: #333;' }}">
                {{ __('realizations') }}
            </a>
            <a class="nav-link rounded-pill px-4 {{ Route::is('home.projets.modernisation.media') ? 'active' : '' }}"
                href="{{ route('home.projets.modernisation.media') }}"
                style="{{ Route::is('home.projets.modernisation.media') ? 'background-color: #009B3A; color: white;' : 'color: #333;' }}">
                {{ __('media') }}
            </a>
        </div>
    </div>
</div>

<style>
    .custom-nav-pills .nav-link {
        transition: all 0.3s ease;
        font-weight: 600;
    }

    .custom-nav-pills .nav-link:hover {
        background-color: rgba(0, 155, 58, 0.1);
        color: #009B3A !important;
    }

    .custom-nav-pills .nav-link.active:hover {
        background-color: #009B3A;
        color: white !important;
    }
</style>