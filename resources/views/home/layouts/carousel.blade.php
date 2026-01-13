{{-- resources/views/home/accueil.blade.php --}}
<div class="header-carousel owl-carousel">
    @foreach($carousels as $carousel)
        <div class="header-carousel-item bg-success">
            <div class="carousel-caption">
                <div class="container">
                    <div class="row g-4 align-items-center">
                        @if($carousel->layout == 'left')
                            <!-- Texte à gauche, image à droite -->
                            <div class="col-lg-7 animated fadeInLeft">
                                <div class="text-sm-center text-md-start">
                                    @if($carousel->subtitle)
                                        <h4 class="text-white text-uppercase fw-bold mb-4">
                                            {{ $carousel->subtitle }}
                                        </h4>
                                    @endif
                                    <h1 class="display-1 text-white mb-4">
                                        {{ $carousel->title }}
                                    </h1>
                                    <p class="mb-5 fs-5 text-white">
                                        {{ $carousel->description }}
                                    </p>
                                    <div class="d-flex justify-content-center justify-content-md-start flex-shrink-0 mb-4">
                                        <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#">
                                            <i class="fas fa-info-circle me-2"></i> Présentation
                                        </a>
                                        <a class="btn btn-dark rounded-pill py-3 px-4 px-md-5 ms-2" href="#">
                                            Contact
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 animated fadeInRight">
                                <div class="calrousel-img" style="object-fit: cover;">
                                    <img src="{{ asset('storage/' . $carousel->image) }}" class="img-fluid w-100"
                                        alt="{{ $carousel->image_alt ?? $carousel->title }}">
                                </div>
                            </div>
                        @else
                            <!-- Image à gauche, texte à droite -->
                            <div class="col-lg-5 animated fadeInLeft">
                                <div class="calrousel-img">
                                    <img src="{{ asset('storage/' . $carousel->image) }}" class="img-fluid w-100"
                                        alt="{{ $carousel->image_alt ?? $carousel->title }}">
                                </div>
                            </div>
                            <div class="col-lg-7 animated fadeInRight">
                                <div class="text-sm-center text-md-end">
                                    @if($carousel->subtitle)
                                        <h4 class="text-white text-uppercase fw-bold mb-4">
                                            {{ $carousel->subtitle }}
                                        </h4>
                                    @endif
                                    <h1 class="display-1 text-white mb-4">
                                        {{ $carousel->title }}
                                    </h1>
                                    <p class="mb-5 fs-5 text-white">
                                        {{ $carousel->description }}
                                    </p>
                                    <div class="d-flex justify-content-center justify-content-md-end flex-shrink-0 mb-4">
                                        <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#">
                                            <i class="fas fa-handshake me-2"></i> Présentation
                                        </a>
                                        <a class="btn btn-dark rounded-pill py-3 px-4 px-md-5 ms-2" href="#">
                                            Contact
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>