<section id="faq" class="faq-section">
    <div class="container" data-aos="fade-up">

        <div class="faq-header text-center mb-5">
            <h2 class="faq-title">FAQs</h2>
            <div class="faq-divider"></div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="accordion" id="faqAccordion">
                    @foreach($faqs as $faq)
                        <div class="accordion-item shadow-sm border-0 mb-3" data-aos="fade-up"
                            data-aos-delay="{{ 100 * $loop->iteration }}">
                            <h2 class="accordion-header" id="heading{{ $loop->index }}">
                                <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }} fw-bold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->index }}"
                                    aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                    aria-controls="collapse{{ $loop->index }}">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box me-3">
                                            <i class="fas fa-question-circle"></i>
                                        </div>
                                        {{ $faq->question }}
                                    </div>
                                </button>
                            </h2>
                            <div id="collapse{{ $loop->index }}"
                                class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                aria-labelledby="heading{{ $loop->index }}" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="mb-0 text-muted">{{ $faq->answer }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</section>

<style>
    /* FAQ Premium Styles */
    .faq-section {
        padding: 80px 0;
        background-color: #f9f9f9;
        position: relative;
        overflow: hidden;
    }

    /* Background decoration */
    .faq-section::before {
        content: '';
        position: absolute;
        top: -50px;
        right: -50px;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(255, 130, 0, 0.05) 0%, rgba(255, 255, 255, 0) 70%);
        border-radius: 50%;
        z-index: 0;
    }

    .faq-section::after {
        content: '';
        position: absolute;
        bottom: -50px;
        left: -50px;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(0, 155, 58, 0.05) 0%, rgba(255, 255, 255, 0) 70%);
        border-radius: 50%;
        z-index: 0;
    }

    .faq-header {
        position: relative;
        z-index: 1;
    }

    .faq-subtitle {
        color: #FF8200;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.9rem;
        display: block;
        margin-bottom: 10px;
    }

    .faq-title {
        color: #009B3A;
        font-weight: 800;
        font-size: 2.5rem;
        margin-bottom: 20px;
        font-family: 'Montserrat', sans-serif;
        /* Assuming font is available, fallback to sans-serif */
    }

    .faq-divider {
        width: 60px;
        height: 4px;
        background: linear-gradient(to right, #FF8200, #009B3A);
        margin: 0 auto;
        border-radius: 2px;
    }

    .accordion-item {
        border-radius: 12px !important;
        overflow: hidden;
        transition: all 0.3s ease;
        background: #fff;
        z-index: 1;
    }

    .accordion-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
    }

    .accordion-button {
        padding: 20px 25px;
        background-color: #fff;
        color: #333;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        border: none;
        box-shadow: none !important;
        /* Remove default focus shadow */
    }

    .accordion-button:not(.collapsed) {
        background-color: #fff;
        /* Keep white background on expanded */
        color: #009B3A;
        box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .125);
        /* Subtle separator */
    }

    .accordion-button:focus {
        border-color: rgba(0, 155, 58, 0.1);
        box-shadow: none;
    }

    .accordion-button::after {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23333'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        transition: transform 0.3s ease-in-out;
    }

    .accordion-button:not(.collapsed)::after {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23009B3A'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        transform: rotate(-180deg);
    }

    .icon-box {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: rgba(255, 130, 0, 0.1);
        color: #FF8200;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        transition: all 0.3s ease;
    }

    .accordion-button:not(.collapsed) .icon-box {
        background-color: #FF8200;
        color: #fff;
    }

    .accordion-body {
        padding: 25px;
        background-color: #fff;
        font-size: 1rem;
        line-height: 1.6;
        color: #555;
        border-top: 1px solid rgba(0, 0, 0, 0.05);
    }

    @media (max-width: 768px) {
        .faq-title {
            font-size: 2rem;
        }

        .accordion-button {
            font-size: 1rem;
            padding: 15px 20px;
        }
    }
</style>