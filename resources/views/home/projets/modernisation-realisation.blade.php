@extends('home.layouts.template')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section institutional-base" style="background: #f8f9fa; padding: 100px 0 60px;">
        <div class="container text-center" data-aos="fade-up">
            <h1 class="refined-title" style="color: #1a1a1a; font-weight: 800;">{{ __('realizations') }}</h1>
            <p class="lead-text" style="max-width: 800px; margin: 20px auto;">Liste des entreprises accompagnées par secteur
                d'activité et type d'intervention.</p>
            <div class="tricolor-line shadow-sm mx-auto"
                style="width: 100px; height: 4px; background: linear-gradient(to right, #FF8200 33.33%, #fff 33.33%, #fff 66.66%, #009B3A 66.66%);">
            </div>
        </div>
    </section>

    @include('home.projets.modernisation-nav')

    <section class="realizations-list py-5">
        <div class="container">
            <div data-aos="fade-up">
                <div class="content-box-premium">
                    <h2 class="section-title mb-4" style="color: #009B3A; font-weight: 800;">Réalisations : Liste des
                        entreprises mises à niveau</h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mt-3 align-middle">
                            <thead class="table-dark" style="background-color: #009B3A;">
                                <tr>
                                    <th>N°</th>
                                    <th>RAISON SOCIALE</th>
                                    <th>ACTIVITE</th>
                                    <th>APPUI SOLLICITE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>STAR COSMETIC</td>
                                    <td>Hygiène corporelle</td>
                                    <td>Diagnostic stratégique, Plan de mise à niveau, et Plan d'affaires</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>SOTIC</td>
                                    <td>Equipementier</td>
                                    <td>
                                        Diagnostic stratégique, Plan de mise à niveau, et Plan d'affaires<br>
                                        Assistance technique pour la démarche de certification qualité, environnement et
                                        sécurité selon la norme ISO 4 5001
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>DIAKITE COCOA PRODUCTS</td>
                                    <td>Transformation de fèves de cacao</td>
                                    <td>
                                        Diagnostic stratégique, Plan de mise à niveau, et Plan d'affaires<br>
                                        Formaliser les programmes prérequis (PRP) pour amorcer le processus de certification
                                        FSSC 22000
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>SOCIETE D’IMPORTATION ET DE FABRICATION D’ALIMENTATION ANIMALE (SIFAAP SA)</td>
                                    <td>Fabrication d’aliments pour volailles</td>
                                    <td>Diagnostic stratégique, Plan de mise à niveau, et Plan d'affaires</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>SEM ENTREPRISES</td>
                                    <td>Industrie Mécanique</td>
                                    <td>Assistance Technique In Situ pour l'optimisation de la chaîne logistique</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>AFRIQUE PHYTO PLUS (A2P)</td>
                                    <td>Conditionnement et commercialisation de produits phytosanitaires</td>
                                    <td>Assistance Technique In Situ Marketing & Ventes</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>NOUVELLE SOCIETE DE PUBLICITE ET DE PROMOTION PAR L'OBJET (N-S2PO)</td>
                                    <td>Conception de panneaux publicitaires métalliques</td>
                                    <td>Assistance Technique In Situ Lean Management</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>SOCIETE NOUVELLE PUBLISTAR (SN PUBLISTAR)</td>
                                    <td>Sérigraphie-Publicité-Décoration</td>
                                    <td>
                                        Accompagnement à la démarche qualité Mise en place d'un Système de Management de la
                                        Qualité (SMQ) ISO 9001 V 2015<br>
                                        Assistance technique pour la mise en place d'une politique de gestion des ressources
                                        humaines
                                    </td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>ALUMINIUM DISTRIBUTION SYSTEME WEST AFRICA (ADS)</td>
                                    <td>Fabrication de matériaux de construction en aluminium</td>
                                    <td>Accompagnement à la démarche qualité : Mise en place d'un Système de Management de
                                        la Qualité (SMQ) ISO 9001 V 2015</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>SOCIETE INTERNATIONALE DE CHARCUTERIE ET DE SALAISONS (SICS)</td>
                                    <td>Elevage, boucherie charcuterie et salaisons</td>
                                    <td>Assistance technique in situ Lean management</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>FOODS CO SA</td>
                                    <td>Transformation de noix de Cajou</td>
                                    <td>
                                        Diagnostic stratégique, Plan de mise à niveau, et Plan d'affaires<br>
                                        Assistance technique pour la mise en place d’un système intégré de gestion
                                    </td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>DERMOPHARM</td>
                                    <td>Pharmaceutique / Cosmétique</td>
                                    <td>Diagnostic stratégique, Plan de mise à niveau, et Plan d'affaires</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>ABN’ GROUP</td>
                                    <td>Textile-habillement</td>
                                    <td>Diagnostic stratégique, Plan de mise à niveau, et Plan d'affaires</td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td>APINOME</td>
                                    <td>Agro-industrie / Agro-alimentaire</td>
                                    <td>Assistance technique pour la certification au système HACCP</td>
                                </tr>
                                <tr>
                                    <td>15</td>
                                    <td>SOCIETE DE CONSERVATION ET DE TRANSFORMATION DES PRODUITS VIVRIERS (COTRAVI)</td>
                                    <td>Agroalimentaire</td>
                                    <td>Assistance technique pour l’élaboration d’une politique commerciale et marketing
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection