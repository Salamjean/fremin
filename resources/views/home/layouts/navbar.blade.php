<!-- Navbar & Hero Start -->
        <div class="container-fluid nav-bar px-0 px-lg-4 py-lg-0">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light"> 
                    <a href="{{route('home')}}" class="navbar-brand p-0">
                        <img src="{{asset('assets/img/logo_fremin.jpg')}}" alt="Logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav mx-0 mx-lg-auto">
                            <a href="{{route('home')}}" class="nav-item nav-link active">Accueil</a>
                            <a href="{{route('home.about')}}" class="nav-item nav-link">Présentation</a>
                            <a href="{{route('home.actuality')}}" class="nav-item nav-link">Actualité, Évènement</a>
                            <a href="{{route('home.publication')}}" class="nav-item nav-link" >Ressource, Publication</a>
                            <a href="{{route('home.program')}}" class="nav-item nav-link" >Programme, Opportunité</a>
                            <div class="nav-btn px-3">
                                <a href="{{route('home.contact')}}" class="btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0"> Contactez - nous </a>
                            </div>
                        </div>
                    </div>
                    <div class="d-none d-xl-flex flex-shrink-0 ps-4">
                        <a href="#" class="btn btn-light btn-lg-square rounded-circle position-relative wow tada" data-wow-delay=".9s">
                            <i class="fa fa-phone-alt fa-2x"></i>
                            <div class="position-absolute" style="top: 7px; right: 12px;">
                                <span><i class="fa fa-comment-dots text-secondary"></i></span>
                            </div>
                        </a>
                        <div class="d-flex flex-column ms-3">
                            <span>Appelez - nous</span>
                            <a href="tel:+ 0123 456 7890"><span class="text-dark">+225 27 45 678 901</span></a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar & Hero End -->