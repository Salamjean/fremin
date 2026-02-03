@extends('home.layouts.template')

@section('title', 'Zones Industrielles - Infrastructures FREMIN')

@section('main')
    <section class="inst-detail-page">
        <div class="inst-detail-container">

            <div class="inst-detail-header" data-aos="fade-down">
                <a href="{{route('home')}}" class="inst-back-btn">
                    <i class="fas fa-arrow-left"></i>
                    <span>Retour à l'accueil</span>
                </a>

                <div class="inst-detail-title-block">
                    <div class="inst-detail-icon">
                        <i class="fas fa-industry"></i>
                    </div>
                    <h1 class="inst-detail-title">
                        Zones Industrielles<br>
                        <span>Infrastructures Modernes</span>
                    </h1>
                </div>
            </div>

            <div class="inst-detail-content" data-aos="fade-up">

                <div class="inst-detail-card">
                    <h2>Vision et Objectifs</h2>
                    <p>Le FREMIN développe des zones industrielles modernes pour accueillir les entreprises dans un
                        environnement propice à la productivité et à la compétitivité.</p>
                </div>

                <div class="inst-detail-card zone-card">
                    <h2><i class="fas fa-map-marker-alt"></i> Zone Industrielle de Koumassi</h2>
                    <div class="inst-detail-subcard">
                        <h3>Caractéristiques</h3>
                        <ul class="inst-detail-list">
                            <li>Superficie totale aménagée</li>
                            <li>Accès routier direct</li>
                            <li>Proximité du port d'Abidjan</li>
                            <li>Réseaux électrique et eau garantis</li>
                        </ul>
                    </div>
                    <div class="inst-detail-subcard">
                        <h3>Services Disponibles</h3>
                        <ul class="inst-detail-list">
                            <li>Électricité haute et basse tension</li>
                            <li>Eau potable et industrielle</li>
                            <li>Télécommunications haut débit</li>
                            <li>Voirie et drainage</li>
                        </ul>
                    </div>
                </div>

                <div class="inst-detail-card zone-card">
                    <h2><i class="fas fa-map-marker-alt"></i> Zone Industrielle de Vridi</h2>
                    <div class="inst-detail-subcard">
                        <h3>Avantages Stratégiques</h3>
                        <ul class="inst-detail-list">
                            <li>Proximité immédiate du port</li>
                            <li>Facilité d'import-export</li>
                            <li>Zone franche disponible</li>
                            <li>Infrastructures logistiques modernes</li>
                        </ul>
                    </div>
                    <div class="inst-detail-subcard">
                        <h3>Secteurs Ciblés</h3>
                        <ul class="inst-detail-list">
                            <li>Industrie manufacturière</li>
                            <li>Agroalimentaire</li>
                            <li>Logistique et entreposage</li>
                            <li>Transformation de matières premières</li>
                        </ul>
                    </div>
                </div>

                <div class="inst-detail-card zone-card">
                    <h2><i class="fas fa-map-marker-alt"></i> Zone Industrielle Akoupé Zeudji PK24</h2>
                    <div class="inst-detail-subcard">
                        <h3>Positionnement</h3>
                        <p>Zone stratégique située à 24km du centre-ville, offrant :</p>
                        <ul class="inst-detail-list">
                            <li>Grande superficie disponible</li>
                            <li>Coûts fonciers compétitifs</li>
                            <li>Environnement calme et sécurisé</li>
                            <li>Axe routier principal</li>
                        </ul>
                    </div>
                    <div class="inst-detail-subcard">
                        <h3>Infrastructures Prévues</h3>
                        <ul class="inst-detail-list">
                            <li>Aménagement moderne des parcelles</li>
                            <li>Électrification complète</li>
                            <li>Adduction d'eau potable</li>
                            <li>Système de drainage performant</li>
                        </ul>
                    </div>
                </div>

                <div class="inst-detail-card highlight-card">
                    <h2>Procédure d'Installation</h2>
                    <ol class="inst-detail-list">
                        <li>Manifestation d'intérêt auprès du FREMIN</li>
                        <li>Étude de faisabilité du projet</li>
                        <li>Attribution de parcelle selon disponibilité</li>
                        <li>Signature de convention d'établissement</li>
                    </ol>
                    <a href="{{route('home.contact')}}" class="inst-detail-cta">
                        <span>Demande d'Information</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </section>
@endsection