@extends('home.layouts.template')

@section('title', 'Projets Spécifiques - Appui aux Entreprises en Difficulté')

@section('content')
    <section class="inst-detail-page">
        <div class="inst-detail-container">

            <div class="inst-detail-header" data-aos="fade-down">
                <a href="{{route('home')}}" class="inst-back-btn">
                    <i class="fas fa-arrow-left"></i>
                    <span>Retour à l'accueil</span>
                </a>

                <div class="inst-detail-title-block">
                    <div class="inst-detail-icon">
                        <i class="fas fa-virus"></i>
                    </div>
                    <h1 class="inst-detail-title">
                        Projets Spécifiques<br>
                        <span>Appui aux Entreprises en Difficulté (AED)</span>
                    </h1>
                </div>
            </div>

            <div class="inst-detail-content" data-aos="fade-up">

                <div class="inst-detail-card">
                    <h2>Contexte et Objectif</h2>
                    <p>Face aux crises mondiales récentes, le FREMIN a mis en place le projet <strong>"AED" (Appui aux
                            Entreprises en Difficulté)</strong> pour soutenir les entreprises ivoiriennes impactées par :
                    </p>
                    <ul class="inst-detail-list">
                        <li>La pandémie de <strong>COVID-19</strong></li>
                        <li>La <strong>guerre Russo-ukrainienne</strong> et ses répercussions économiques</li>
                    </ul>
                </div>

                <div class="inst-detail-card">
                    <h2>Types d'Appuis Disponibles</h2>

                    <div class="inst-detail-subcard">
                        <h3><i class="fas fa-coins"></i> Appuis Financiers Directs</h3>
                        <ul class="inst-detail-list">
                            <li>Subventions pour maintien de l'activité</li>
                            <li>Primes de relance</li>
                            <li>Aide au paiement des charges fixes</li>
                            <li>Fonds de roulement d'urgence</li>
                        </ul>
                    </div>

                    <div class="inst-detail-subcard">
                        <h3><i class="fas fa-chart-line"></i> Accompagnement Stratégique</h3>
                        <ul class="inst-detail-list">
                            <li>Diagnostic de la situation de l'entreprise</li>
                            <li>Élaboration de plan de redressement</li>
                            <li>Accompagnement dans la restructuration</li>
                            <li>Conseil en gestion de crise</li>
                        </ul>
                    </div>

                    <div class="inst-detail-subcard">
                        <h3><i class="fas fa-handshake"></i> Facilitation de l'Accès au Crédit</h3>
                        <ul class="inst-detail-list">
                            <li>Garanties bancaires renforcées</li>
                            <li>Délais de paiement négociés</li>
                            <li>Restructuration de la dette</li>
                            <li>Partenariats avec les institutions financières</li>
                        </ul>
                    </div>
                </div>

                <div class="inst-detail-card">
                    <h2>Secteurs Prioritaires</h2>
                    <p>Le projet AED cible en priorité les secteurs les plus touchés :</p>
                    <ul class="inst-detail-list">
                        <li>Industrie manufacturière</li>
                        <li>Agro-industrie</li>
                        <li>BTP et matériaux de construction</li>
                        <li>Services aux entreprises</li>
                    </ul>
                </div>

                <div class="inst-detail-card highlight-card">
                    <h2>Conditions d'Éligibilité</h2>
                    <ol class="inst-detail-list">
                        <li>Être une entreprise légalement établie en Côte d'Ivoire</li>
                        <li>Démontrer l'impact direct de la crise sur l'activité</li>
                        <li>Présenter un plan de redressement crédible</li>
                        <li>Être à jour de ses obligations fiscales et sociales (ou plan d'apurement)</li>
                    </ol>
                    <a href="{{route('home.contact')}}" class="inst-detail-cta">
                        <span>Déposer une Demande</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </section>
@endsection