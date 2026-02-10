<section id="hero" class="hero section refined-hero">
    <div class="swiper hero-swiper">
        <div class="swiper-wrapper">
            @foreach($carousels as $carousel)
                <div class="swiper-slide">
                    <div class="refined-container">
                        <div class="refined-row {{ $carousel->layout == 'right' ? 'reversed' : '' }}">
                            <div class="refined-col img-col">
                                <div class="refined-frame">
                                    @if(Str::endsWith($carousel->image, '.mp4'))
                                        <video autoplay muted loop playsinline class="refined-video">
                                            <source src="{{ asset('assets/img/video.mp4') }}" type="video/mp4">
                                        </video>
                                    @else
                                        <img src="{{ asset('storage/' . $carousel->image) }}" alt="{{ $carousel->image_alt }}"
                                            class="refined-img">
                                    @endif
                                    <div class="refined-overlay-grid"></div>
                                </div>
                            </div>
                            <div class="refined-col text-col">
                                <div class="refined-tag">
                                    <span class="line"></span>
                                    <span>{{ $carousel->subtitle }}</span>
                                </div>
                                <h1 class="refined-title">{!! $carousel->title !!}</h1>
                                <p class="refined-lead">{{ $carousel->description }}</p>

                                @if($carousel->button_text)
                                    <a href="{{ $carousel->button_link }}" class="btn-action mt-4">
                                        {{ $carousel->button_text }}
                                        <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                @endif

                                <div class="refined-tricolor">
                                    <span class="t-bar orange"></span>
                                    <span class="t-bar white"></span>
                                    <span class="t-bar green"></span>
                                </div>

                                <!-- "Voir plus" button integrated in the slide -->
                                <div class="carousel-action mt-4">
                                    <a href="{{ route('home.about') }}" class="btn-more-minimal">
                                        <span class="text">DÉCOUVRIR FREMIN</span>
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modern Navigation Arrows -->
    <div class="hero-nav-btn hero-prev">
        <i class="bi bi-chevron-left"></i>
    </div>
    <div class="hero-nav-btn hero-next">
        <i class="bi bi-chevron-right"></i>
    </div>

    <!-- Modern Pagination with National Colors -->
    <div class="hero-pagination"></div>

    <!-- Progress Bar -->
    <div class="hero-progress-bar">
        <div class="hero-progress-fill"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const swiper = new Swiper('.hero-swiper', {
                loop: true,
                speed: 1200,
                autoplay: {
                    delay: 9000, // 9 seconds as requested
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true
                },
                effect: 'creative',
                creativeEffect: {
                    prev: {
                        translate: ['-120%', 0, -500],
                        opacity: 0
                    },
                    next: {
                        translate: ['120%', 0, -500],
                        opacity: 0
                    }
                },
                autoHeight: true,
                navigation: {
                    nextEl: '.hero-next',
                    prevEl: '.hero-prev',
                },
                pagination: {
                    el: '.hero-pagination',
                    clickable: true,
                    renderBullet: function (index, className) {
                        const colors = ['orange-bullet', 'white-bullet', 'green-bullet'];
                        return '<span class="' + className + ' hero-bullet ' + colors[index % 3] + '"></span>';
                    },
                },
                on: {
                    autoplayTimeLeft(s, time, progress) {
                        const progressBar = document.querySelector('.hero-progress-fill');
                        if (progressBar) {
                            progressBar.style.width = ((1 - progress) * 100) + '%';
                        }
                    }
                }
            });

            // Counter animation
            const counters = document.querySelectorAll('.counter');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        counters.forEach(counter => {
                            const updateCount = () => {
                                const target = +counter.getAttribute('data-target');
                                const count = +counter.innerText;
                                const inc = target / 100;
                                if (count < target) {
                                    counter.innerText = Math.ceil(count + inc);
                                    setTimeout(updateCount, 20);
                                } else { counter.innerText = target; }
                            };
                            updateCount();
                        });
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });
            const hero = document.querySelector('.refined-hero');
            if (hero) observer.observe(hero);
        });
    </script>
</section>