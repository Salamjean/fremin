@extends('home.layouts.template')

@section('title', 'Cellule Technique - Assistance et Analyse')

@section('content')
    <section class="inst-detail-page">
        <div class="inst-detail-container">

            <div class="inst-detail-header" data-aos="fade-down">
                <a href="{{route('home')}}" class="inst-back-btn">
                    <i class="fas fa-arrow-left"></i>
                    <span>Retour à l'accueil</span>
                </a>

                <div class="inst-detail-title-block">
                    <div class="inst-detail-icon green">
                        <i class="fas fa-flask"></i>
                    </div>
                    <h1 class="inst-detail-title">
                        Cellule Technique<br>
                        <span>Assistance et Analyse</span>
                    </h1>
                </div>
            </div>

            <div class="inst-detail-content" data-aos="fade-up">

                <div class="inst-detail-card">
                    <h2>Rôle et Missions</h2>
                    <p>La <strong>Cellule Technique</strong> est l'organe d'appui technique du FREMIN. Elle assure
                        l'instruction des dossiers de demande d'appuis et le suivi des décisions du Comité de Gestion.</p>
                </div>

                <div class="inst-detail-card">
                    <h2>Composition</h2>
                    <p>La Cellule Technique est composée de représentants techniques des différents ministères :</p>

                    <div class="inst-detail-subcard">
                        <h3><i class="fas fa-user-cog"></i> Responsable</h3>
                        <p><strong>Représentant du Ministère en charge de l'Industrie (Présidence)</strong></p>
                        <ul class="inst-detail-list">
                            <li>Coordonne les travaux de la cellule</li>
                            <li>Anime les réunions techniques</li>
                            <li>Présente les dossiers au Comité de Gestion</li>
                        </ul>
                    </div>

                    <div class="inst-detail-subcard">
                        <h3><i class="fas fa-users"></i> Membres</h3>
                        <ul class="inst-detail-list">
                            <li><strong>Représentant du Ministère en charge des Finances</strong></li>
                            <li><strong>Représentant du Ministère en charge du Budget</strong></li>
                            <li><strong>Représentant du Ministère en charge des PME</strong></li>
                        </ul>
                    </div>
                </div>

                <div class="inst-detail-card">
                    <h2>Missions Principales</h2>

                    <div class="inst-detail-subcard">
                        <h3><i class="fas fa-folder-open"></i> Instruction des Dossiers</h3>
                        <ul class="inst-detail-list">
                            <li>Réception et enregistrement des demandes d'appui</li>
                            <li>Vérification de la conformité administrative</li>
                            <li>Analyse technique et financière des projets</li>
                            <li>Évaluation de la viabilité économique</li>
                            <li>Formulation de recommandations au Comité de Gestion</li>
                        </ul>
                    </div>

                    <div class="inst-detail-subcard">
                        <h3><i class="fas fa-tasks"></i> Suivi et Évaluation</h3>
                        <ul class="inst-detail-list">
                            <li>Suivi de la mise en œuvre des décisions du Comité</li>
                            <li>Contrôle de l'utilisation des appuis accordés</li>
                            <li>Évaluation de l'impact des interventions</li>
                            <li>Reporting régulier au Comité de Gestion</li>
                        </ul>
                    </div>

                    <div class="inst-detail-subcard">
                        <h3><i class="fas fa-chart-bar"></i> Études et Analyses</h3>
                        <ul class="inst-detail-list">
                            <li>Réalisation d'études sectorielles</li>
                            <li>Analyse de l'évolution du tissu industriel</li>
                            <li>Identification de nouveaux besoins</li>
                            <li>Proposition d'actions ciblées</li>
                        </ul>
                    </div>
                </div>

                <div class="inst-detail-card">
                    <h2>Processus d'Instruction</h2>
                    <ol class="inst-detail-list">
                        <li><strong>Réception</strong> : Enregistrement du dossier de demande</li>
                        <li><strong>Analyse Préliminaire</strong> : Vérification de l'éligibilité</li>
                        <li><strong>Étude Approfondie</strong> : Analyse technique, financière et économique</li>
                        <li><strong>Visite Terrain</strong> : Inspection de l'entreprise si nécessaire</li>
                        <li><strong>Rédaction du Rapport</strong> : Synthèse et recommandations</li>
                        <li><strong>Présentation</strong> : Soumission au Comité de Gestion</li>
                    </ol>
                </div>

                <div class="inst-detail-card">
                    <h2>Critères d'Évaluation</h2>
                    <p>La Cellule Technique évalue les dossiers selon plusieurs critères :</p>
                    <ul class="inst-detail-list">
                        <li>Pertinence du projet par rapport aux objectifs du FREMIN</li>
                        <li>Viabilité technique et financière</li>
                        <li>Impact économique et social attendu</li>
                        <li>Capacités de gestion de l'entreprise</li>
                        <li>Ratio coût/bénéfice de l'appui</li>
                    </ul>
                </div>

                <div class="inst-detail-card highlight-card">
                    <h2>Soumettre un Dossier</h2>
                    <p>Pour soumettre une demande d'appui à la Cellule Technique :</p>
                    <a href="{{route('home.contact')}}" class="inst-detail-cta">
                        <span>Déposer un Dossier</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </section>
@endsection