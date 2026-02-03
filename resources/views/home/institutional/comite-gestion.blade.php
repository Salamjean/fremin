@extends('home.layouts.template')

@section('title', 'Comité de Gestion - Organe de Décision')

@section('main')
    <section class="inst-detail-page">
        <div class="inst-detail-container">

            <div class="inst-detail-header" data-aos="fade-down">
                <a href="{{route('home')}}" class="inst-back-btn">
                    <i class="fas fa-arrow-left"></i>
                    <span>Retour à l'accueil</span>
                </a>

                <div class="inst-detail-title-block">
                    <div class="inst-detail-icon green">
                        <i class="fas fa-users-cog"></i>
                    </div>
                    <h1 class="inst-detail-title">
                        Comité de Gestion<br>
                        <span>Organe de Décision</span>
                    </h1>
                </div>
            </div>

            <div class="inst-detail-content" data-aos="fade-up">

                <div class="inst-detail-card">
                    <h2>Rôle et Mandat</h2>
                    <p>Le <strong>Comité de Gestion</strong> est l'organe de décision principal du FREMIN. Il est
                        responsable de l'administration du fonds et de la validation des décisions stratégiques.</p>
                </div>

                <div class="inst-detail-card">
                    <h2>Composition</h2>
                    <p>Le Comité de Gestion est composé de représentants des ministères suivants :</p>

                    <div class="inst-detail-subcard president">
                        <h3><i class="fas fa-crown"></i> Présidence</h3>
                        <p><strong>Ministère chargé de l'Industrie</strong></p>
                        <ul class="inst-detail-list">
                            <li>Préside les réunions du Comité</li>
                            <li>Définit l'ordre du jour</li>
                            <li>Assure le suivi des décisions</li>
                        </ul>
                    </div>

                    <div class="inst-detail-subcard vice-president">
                        <h3><i class="fas fa-user-tie"></i> Vice-Présidence</h3>
                        <p><strong>Ministère chargé des Finances</strong></p>
                        <ul class="inst-detail-list">
                            <li>Assiste le Président</li>
                            <li>Supervise les aspects financiers</li>
                            <li>Valide les projets d'appui financier</li>
                        </ul>
                    </div>

                    <div class="inst-detail-subcard">
                        <h3><i class="fas fa-users"></i> Membres</h3>
                        <ul class="inst-detail-list">
                            <li><strong>Ministère chargé du Budget</strong> - Contrôle budgétaire et suivi des dépenses</li>
                            <li><strong>Ministère chargé des PME</strong> - Promotion et accompagnement des PME</li>
                            <li><strong>Banque Nationale d'Investissement (BNI)</strong> - Secrétariat et gestion
                                administrative</li>
                        </ul>
                    </div>
                </div>

                <div class="inst-detail-card">
                    <h2>Missions Principales</h2>
                    <ul class="inst-detail-list">
                        <li><strong>Validation des Dossiers</strong> : Examiner et approuver les demandes d'appui des
                            entreprises</li>
                        <li><strong>Définition des Orientations</strong> : Établir les priorités et les stratégies du FREMIN
                        </li>
                        <li><strong>Gestion Financière</strong> : Superviser l'utilisation des ressources du fonds</li>
                        <li><strong>Suivi et Évaluation</strong> : Contrôler la mise en œuvre des décisions et l'impact des
                            appuis</li>
                        <li><strong>Approbation du Budget</strong> : Valider les budgets annuels et les plans de financement
                        </li>
                    </ul>
                </div>

                <div class="inst-detail-card">
                    <h2>Modalités de Fonctionnement</h2>
                    <div class="inst-detail-subcard">
                        <h3>Réunions</h3>
                        <p>Le Comité de Gestion se réunit :</p>
                        <ul class="inst-detail-list">
                            <li>De manière ordinaire au moins 4 fois par an</li>
                            <li>En session extraordinaire à la demande du Président</li>
                            <li>Sur convocation écrite avec ordre du jour</li>
                        </ul>
                    </div>

                    <div class="inst-detail-subcard">
                        <h3>Décisions</h3>
                        <ul class="inst-detail-list">
                            <li>Prises à la majorité simple des membres présents</li>
                            <li>Consignées dans des procès-verbaux</li>
                            <li>Transmises aux instances concernées pour mise en œuvre</li>
                        </ul>
                    </div>
                </div>

                <div class="inst-detail-card highlight-card">
                    <h2>Contact</h2>
                    <p>Pour toute demande concernant le Comité de Gestion ou pour soumettre un dossier à son attention :</p>
                    <a href="{{route('home.contact')}}" class="inst-detail-cta">
                        <span>Nous Contacter</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </section>
@endsection