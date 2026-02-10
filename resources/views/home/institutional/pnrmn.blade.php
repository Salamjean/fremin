@extends('home.layouts.template')

@section('title', 'PNRMN - Programme National de Restructuration et Mise à Niveau')

@section('content')
    <!-- Institutional Detail Page -->
    <section class="inst-detail-page">
        <div class="inst-detail-container">

            <!-- Header -->
            <div class="inst-detail-header" data-aos="fade-down">
                <a href="{{route('home')}}" class="inst-back-btn">
                    <i class="fas fa-arrow-left"></i>
                    <span>Retour à l'accueil</span>
                </a>

                <div class="inst-detail-title-block">
                    <div class="inst-detail-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h1 class="inst-detail-title">
                        Programme National de Restructuration<br>
                        et de <span>Mise à Niveau (PNRMN)</span>
                    </h1>
                </div>
            </div>

            <!-- Content -->
            <div class="inst-detail-content" data-aos="fade-up">

                <div class="inst-detail-card">
                    <h2>Présentation du Programme</h2>
                    <p>Le <strong>Programme National de Restructuration et de Mise à Niveau (PNRMN)</strong> est une
                        initiative stratégique du FREMIN visant à moderniser et renforcer la compétitivité des entreprises
                        ivoiriennes.</p>
                </div>

                <div class="inst-detail-card">
                    <h2>Objectifs Principaux</h2>
                    <ul class="inst-detail-list">
                        <li>
                            <strong>Modernisation des entreprises</strong> : Accompagner les entreprises dans leur
                            transformation digitale et technologique
                        </li>
                        <li>
                            <strong>Amélioration de la compétitivité</strong> : Renforcer les capacités productives et la
                            qualité des produits
                        </li>
                        <li>
                            <strong>Accès au financement</strong> : Faciliter l'accès des entreprises aux financements pour
                            leurs investissements
                        </li>
                        <li>
                            <strong>Renforcement des capacités</strong> : Former et accompagner les ressources humaines des
                            entreprises
                        </li>
                    </ul>
                </div>

                <div class="inst-detail-card">
                    <h2>Axes d'Intervention</h2>

                    <div class="inst-detail-subcard">
                        <h3><i class="fas fa-hand-holding-usd"></i> Appuis Directs et Primes</h3>
                        <p>Le FREMIN finance l'accompagnement des entreprises via des appuis directs et des primes destinées
                            à :</p>
                        <ul class="inst-detail-list">
                            <li>Financer des études de diagnostic et d'audit</li>
                            <li>Appuyer la mise en œuvre de plans de modernisation</li>
                            <li>Subventionner l'acquisition d'équipements modernes</li>
                            <li>Soutenir la certification qualité (ISO, etc.)</li>
                        </ul>
                    </div>

                    <div class="inst-detail-subcard">
                        <h3><i class="fas fa-shield-alt"></i> Garanties aux Établissements de Crédit</h3>
                        <p>Le FREMIN octroie des garanties aux établissements de crédit pour faciliter l'accès au
                            financement des investissements :</p>
                        <ul class="inst-detail-list">
                            <li>Modernisation des outils de production</li>
                            <li>Rénovation des infrastructures</li>
                            <li>Extension des capacités de production</li>
                            <li>Acquisition de technologies innovantes</li>
                        </ul>
                    </div>

                    <div class="inst-detail-subcard">
                        <h3><i class="fas fa-microscope"></i> Appui aux Laboratoires Techniques</h3>
                        <p>Soutien aux laboratoires techniques locaux et structures de normalisation :</p>
                        <ul class="inst-detail-list">
                            <li>Renforcement des capacités techniques</li>
                            <li>Acquisition d'équipements de pointe</li>
                            <li>Formation du personnel technique</li>
                            <li>Certification et accréditation</li>
                        </ul>
                    </div>

                    <div class="inst-detail-subcard">
                        <h3><i class="fas fa-building"></i> Centres d'Appui (CACDI)</h3>
                        <p>Financement des Centres d'Appui à la Compétitivité et au Développement Industriel :</p>
                        <ul class="inst-detail-list">
                            <li>Services de conseil aux entreprises</li>
                            <li>Formation spécialisée</li>
                            <li>Accompagnement technique</li>
                            <li>Mise en réseau des entreprises</li>
                        </ul>
                    </div>
                </div>

                <div class="inst-detail-card">
                    <h2>Bénéficiaires</h2>
                    <p>Le programme s'adresse à toutes les entreprises ivoiriennes souhaitant améliorer leur compétitivité,
                        notamment :</p>
                    <ul class="inst-detail-list">
                        <li>PME et PMI des secteurs prioritaires</li>
                        <li>Entreprises industrielles en quête de modernisation</li>
                        <li>Structures de normalisation et de certification</li>
                        <li>Laboratoires techniques locaux</li>
                    </ul>
                </div>

                <div class="inst-detail-card highlight-card">
                    <h2>Comment Bénéficier du Programme ?</h2>
                    <p>Pour bénéficier des appuis du PNRMN, les entreprises doivent :</p>
                    <ol class="inst-detail-list">
                        <li>Déposer un dossier de demande d'appui auprès du FREMIN</li>
                        <li>Présenter un diagnostic de leur situation actuelle</li>
                        <li>Proposer un plan de restructuration ou de mise à niveau</li>
                        <li>Démontrer la viabilité économique du projet</li>
                    </ol>
                    <a href="{{route('home.contact')}}" class="inst-detail-cta">
                        <span>Nous Contacter</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </section>
@endsection