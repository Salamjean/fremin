@extends('home.layouts.template')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section institutional-base" style="background: #f8f9fa; padding: 100px 0 60px;">
        <div class="container text-center" data-aos="fade-up">
            <h1 class="refined-title" style="color: #1a1a1a; font-weight: 800;">{{ __('modernization_industrial') }}</h1>
            <p class="lead-text" style="max-width: 800px; margin: 20px auto;">{{ __('project_presentation') }} du programme
                de mise à niveau.</p>
            <div class="tricolor-line shadow-sm mx-auto"
                style="width: 100px; height: 4px; background: linear-gradient(to right, #009B3A 33.33%, #fff 33.33%, #fff 66.66%, #FF8200 66.66%);">
            </div>
        </div>
    </section>

    @include('home.projets.modernisation-nav')

    <section class="project-presentation py-5">
        <div class="container">
            <div data-aos="fade-up">
                <div class="content-box-premium mb-5">
                    <h2 class="section-title mb-4" style="color: #009B3A; font-weight: 800;">Contexte et Objectifs</h2>
                    <p class="lead-text mb-4">La Côte d’Ivoire a adopté en 2013 un Programme National de Restructuration et
                        de Mise à Niveau (PNRMN) destiné à préparer les entreprises manufacturières ivoiriennes à faire face
                        à une concurrence accrue dans le cadre des accords multilatéraux de libre-échange. L’objectif
                        général de ce programme était de soutenir la dynamique d’accroissement de la valeur ajoutée
                        industrielle et de l’emploi, notamment des jeunes et des femmes, tout en améliorant la qualité des
                        produits manufacturiers ivoiriens pour faciliter leur accès au marché international dans un contexte
                        de libéralisation et d’ouverture de l’économie. A travers ce programme, le Gouvernement envisageait
                        d’accompagner 120 à 150 entreprises industrielles à fort potentiel de croissance, en déployant à
                        large échelle des actions de renforcement de leur capacité et de leur compétitivité.</p>

                    <p class="mb-4">La mise en œuvre du programme a nécessité la signature d’un mémorandum d’entente entre
                        l’Etat et le Secteur Privé en septembre 2013 et la création de l’Agence pour le Développement et la
                        Compétitivité des Industries de Côte d’Ivoire (en abrégé ADCI) et du Fonds de Restructuration et de
                        Mise à Niveau des entreprises industrielles (en abrégé FREMIN), en 2014. Le FREMIN est le Fonds
                        National chargé d’assurer le financement des activités du PNRMN. Quant à l’ADCI, elle a été créée
                        sous forme d’une société anonyme, détenue à 60% par les organisations du secteur privé (CCI-CI,
                        CGECI, FNISCI, FIPME) et à 40% par l’Etat, en vue de prendre en charge la mise en œuvre des appuis
                        directs aux entreprises.</p>
                </div>

                <div class="content-box-premium mb-5">
                    <h2 class="section-title mb-4" style="color: #009B3A; font-weight: 800;">Composantes du Programme</h2>
                    <p>Le PNRMN est structuré autour de trois (3) composantes, à savoir :</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> <strong>Composante 1
                                :</strong> appuis directs aux entreprises</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> <strong>Composante 2
                                :</strong> amélioration des infrastructures et de la qualité</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> <strong>Composante 3
                                :</strong> mise en place des Centres d’Appui à la Compétitivité et au Développement
                            Industriel (en abrégé CACDI)</li>
                    </ul>
                </div>

                <div class="content-box-premium">
                    <h2 class="section-title mb-4" style="color: #009B3A; font-weight: 800;">Présentation et Avantages</h2>
                    <p class="mb-3">La Mise à Niveau des entreprises industrielles s’opère par le biais d’avantages accordés
                        aux entreprises, à savoir :</p>
                    <ul class="list-unstyled mb-4">
                        <li class="mb-2"><i class="fas fa-arrow-right text-warning me-2"></i> Une prime de 80% du montant du
                            diagnostic global et stratégique</li>
                        <li class="mb-2"><i class="fas fa-arrow-right text-warning me-2"></i> Une prime de 80% du montant de
                            l’investissement immatériel (missions de conseil, d’assistance technique, acquisition de
                            logiciels et/ou formations) à réaliser par l’entreprise</li>
                        <li class="mb-2"><i class="fas fa-arrow-right text-warning me-2"></i> Un accompagnement pour
                            faciliter l’accès au crédit à moyen et/ou long terme structuré auprès du système bancaire pour
                            financer les investissements matériels des entreprises industrielles (équipements industriels ou
                            de laboratoires, locaux techniques)</li>
                    </ul>
                    <p class="mb-3">Le programme a pour objectif de développer la production industrielle, de promouvoir
                        l’investissement et l’emploi, tout en améliorant la compétitivité des entreprises industrielles au
                        niveau régional et international.</p>
                    <p class="mb-3">Le FREMIN est l’instrument financier de la mise en œuvre du PNRMN.</p>
                    <p>L’ADCI participe à la mise en œuvre du Programme National de Restructuration et de Mise à Niveau
                        (PNRMN) en tant qu’organe d’exécution de la composante relative à l’appui direct aux entreprises. A
                        ce titre, elle accompagne les entreprises industrielles dans le renforcement de leurs capacités
                        opérationnelles et de leur compétitivité.</p>
                </div>
            </div>
        </div>
    </section>

@endsection