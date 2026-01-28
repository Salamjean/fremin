<section id="hero" class="hero section refined-hero">
    <div class="swiper hero-swiper">
        <div class="swiper-wrapper">
            <!-- Slide 1: Welcome -->
            <div class="swiper-slide">
                <div class="refined-container">
                    <div class="refined-row">
                        <div class="refined-col img-col">
                            <div class="refined-frame">
                                <img src="{{ asset('assets/img/fremin1.jpeg') }}" alt="FREMIN Industry" class="refined-img">
                                <div class="refined-overlay-grid"></div>
                            </div>
                        </div>
                        <div class="refined-col text-col">
                            <div class="refined-tag">
                                <span class="line"></span>
                                <span>NOTRE VISION</span>
                            </div>
                            <h1 class="refined-title">PROPULSER L'AVENIR <span>INDUSTRIEL</span></h1>
                            <p class="refined-lead">Accompagnement stratégique pour la restructuration et la modernisation des entreprises de Côte d'Ivoire.</p>
                            
                            <div class="refined-tricolor">
                                <span class="t-bar orange"></span>
                                <span class="t-bar white"></span>
                                <span class="t-bar green"></span>
                            </div>

                            <div class="refined-stats">
                                <div class="stat-block">
                                    <span class="num counter" data-target="127">0</span>
                                    <span class="label">Entreprises</span>
                                </div>
                                <div class="stat-block">
                                    <span class="num counter" data-target="5842">0</span>
                                    <span class="label">Emplois</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2: Ancrage Institutionnel -->
            <div class="swiper-slide">
                <div class="refined-container">
                    <div class="refined-row reversed">
                        <div class="refined-col img-col">
                            <div class="refined-frame">
                                <video autoplay muted loop playsinline class="refined-video">
                                    <source src="{{ asset('assets/img/video.mp4') }}" type="video/mp4">
                                </video>
                                <div class="refined-overlay-grid"></div>
                            </div>
                        </div>
                        <div class="refined-col text-col">
                            <div class="refined-tag">
                                <span class="line"></span>
                                <span>GOUVERNANCE</span>
                            </div>
                            <h1 class="refined-title">ANCRAGE <span>INSTITUTIONNEL</span></h1>
                            
                            <div class="refined-official-box">
                                <p>Le <strong>FREMIN</strong> est placé sous la tutelle technique du <strong>Ministre chargé de l'Industrie</strong> et sous la tutelle financière du <strong>Ministre chargé de l'Economie et des Finances</strong>.</p>
                            </div>

                            <div class="refined-identity">
                                <img src="{{ asset('assets/img/logo_fremin.jpg') }}" alt="Logo">
                                <div class="refined-id-meta">
                                    <span class="m-top">République de Côte d'Ivoire</span>
                                    <span class="m-bot">Gouvernance Stratégique</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3: Missions -->
            <div class="swiper-slide">
                <div class="refined-container">
                    <div class="refined-row">
                        <div class="refined-col img-col">
                            <div class="refined-frame">
                                <img src="{{ asset('assets/img/fremin7.jpeg') }}" alt="Missions" class="refined-img">
                                <div class="refined-overlay-grid"></div>
                            </div>
                        </div>
                        <div class="refined-col text-col">
                            <div class="refined-tag">
                                <span class="line"></span>
                                <span>NOS MISSIONS</span>
                            </div>
                            <h1 class="refined-title">MODERNISATION & <span>SOUTIEN</span></h1>
                            <p class="refined-lead">Fournir un accompagnement expert pour garantir la souveraineté et la compétitivité industrielle nationale.</p>
                            
                            <div class="refined-tricolor">
                                <span class="t-bar orange"></span>
                                <span class="t-bar white"></span>
                                <span class="t-bar green"></span>
                            </div>

                            <div class="stat-block">
                                <span class="label">OBJECTIF PRINCIPAL</span>
                                <p style="font-size: 15px; font-weight: 600; margin-top: 10px; color: #111;">Mise à niveau technique et financière des industries.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const swiper = new Swiper('.hero-swiper', {
                loop: true,
                speed: 1000,
                autoplay: { delay: 6000, disableOnInteraction: false },
                effect: 'fade',
                fadeEffect: { crossFade: true }
            });

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