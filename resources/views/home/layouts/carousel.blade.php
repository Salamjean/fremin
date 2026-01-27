<section id="hero" class="hero section">


    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="hero-content" data-aos="fade-right" data-aos-delay="200">
                    <div class="badge-container">
                        <span class="hero-badge">Bienvenue sur FREMIN</span>
                    </div>

                    <h1 class="hero-title">Partenaire du Développement Industriel</h1>
                    <p class="hero-description">Nous accompagnons les entreprises ivoiriennes dans leur modernisation
                        technique, financière et organisationnelle pour un tissu productif national fort.</p>

                    <div class="hero-stats-classic">
                        <div class="stat-item">
                            <i class="bi bi-briefcase-fill"></i>
                            <div class="stat-text">
                                <span class="number"><span class="counter" data-target="127">0</span>+</span>
                                <span class="label">Entreprises</span>
                            </div>
                        </div>
                        <div class="stat-item">
                            <i class="bi bi-people-fill"></i>
                            <div class="stat-text">
                                <span class="number"><span class="counter" data-target="5842">0</span>+</span>
                                <span class="label">Emplois</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="hero-image-wrapper" data-aos="fade-left" data-aos-delay="100">
                    <video src="{{ asset('assets/img/video.mp4') }}" autoplay muted loop playsinline
                        class="img-fluid hero-main-video">
                        Votre navigateur ne supporte pas la balise vidéo.
                    </video>

                    <!-- Floating Stats Cards -->
                    <div class="floating-stat-card card-1" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-cash-stack"></i>
                        <div>
                            <span class="val"><span class="counter" data-target="68">0</span> Mrd</span>
                            <span class="lab">Décaissés</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mesh-gradient-container">
        <div class="mesh-circle orange"></div>
        <div class="mesh-circle white"></div>
        <div class="mesh-circle green"></div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const counters = document.querySelectorAll('.counter');
            const speed = 200; // The lower the slower

            const startCounters = () => {
                counters.forEach(counter => {
                    const updateCount = () => {
                        const target = +counter.getAttribute('data-target');
                        const count = +counter.innerText;

                        // Lower inc means slower and more precise animation
                        const inc = target / speed;

                        if (count < target) {
                            counter.innerText = Math.ceil(count + inc);
                            setTimeout(updateCount, 15);
                        } else {
                            counter.innerText = target;
                        }
                    };
                    updateCount();
                });
            };

            // Using Intersection Observer to start animation when visible
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        startCounters();
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });

            const heroSection = document.getElementById('hero');
            if (heroSection) {
                observer.observe(heroSection);
            }
        });
    </script>
</section>