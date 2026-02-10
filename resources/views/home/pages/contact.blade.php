@extends('home.layouts.template')
@section('content')

    <!-- Modern Hero V2 -->
    <div class="contact-header-v2">
        <div class="container text-center py-5">
            <h1 class="text-white display-2 mb-3 fw-black animate__animated animate__zoomIn"
                style="font-weight: 900;font-size: 40px; letter-spacing: -2px;">NOUS CONTACTER</h1>
            <div class="mx-auto bg-white mb-4" style="height: 4px; width: 80px;"></div>
            <p class="text-white lead animate__animated animate__fadeInUp fw-medium">Des experts à votre écoute pour la
                transformation de votre entreprise.</p>
        </div>
    </div>

    <!-- Contact Content -->
    <div class="bg-light py-5">
        <div class="container py-5">

            <!-- Contact Info Cards -->
            <div class="row g-4 mb-5">
                <!-- Address Card -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-info-card text-center">
                        <div class="contact-icon-box mx-auto">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Siège Social</h4>
                        <p class="text-muted">Abidjan, Côte d'Ivoire<br>Plateau, Avenue Jean-Paul II</p>
                    </div>
                </div>
                <!-- Phone Card -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="contact-info-card text-center">
                        <div class="contact-icon-box mx-auto">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Téléphone</h4>
                        <p class="text-muted">Standard: +225 27 22 44 55 66<br>Support: +225 07 00 00 00 00</p>
                    </div>
                </div>
                <!-- Email Card -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="contact-info-card text-center">
                        <div class="contact-icon-box mx-auto">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h4 class="fw-bold mb-3">E-mail</h4>
                        <p class="text-muted">info@fremin.ci<br>contact@fremin.ci</p>
                    </div>
                </div>
            </div>

            <div class="row g-5 align-items-stretch">
                <!-- Contact Form -->
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="contact-form-premium h-100">
                        <h3 class="fw-bold mb-4 border-start border-4 border-success ps-3">Envoyez-nous un message</h3>
                        <p class="text-muted mb-4">Une question ? Un projet de restructuration ? Notre équipe vous répondra
                            dans les plus brefs délais.</p>

                        <form action="#" method="POST">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Nom Complet" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" placeholder="Votre Email" required>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Sujet du message" required>
                                </div>
                                <div class="col-md-12">
                                    <textarea class="form-control" rows="6" placeholder="Votre message..."
                                        required></textarea>
                                </div>
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-contact-submit">
                                        Envoyer le message <i class="fas fa-paper-plane ms-2"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Map -->
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="map-container-v2 h-100">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.3021893585474!2d-3.9933947257574567!3d5.37080243548577!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc1eb006be9a845%3A0x3e30fbbd06970562!2sFREMIN%2C%20fonds%20de%20restructuration%20et%20de%20mise%20%C3%A0%20niveau%20des%20entreprises%20industrielles!5e0!3m2!1sfr!2sci!4v1770657856389!5m2!1sfr!2sci"
                            width="600" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection