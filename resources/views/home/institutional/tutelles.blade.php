@extends('home.layouts.template')

@section('title', 'Tutelles Techniques - Gouvernance FREMIN')

@section('main')
    <section class="inst-detail-page">
        <div class="inst-detail-container">

            <div class="inst-detail-header" data-aos="fade-down">
                <a href="{{route('home')}}" class="inst-back-btn">
                    <i class="fas fa-arrow-left"></i>
                    <span>Retour à l' accueil</span>
                </a>

                <div class="inst-detail-title-block">
                    <div class="inst-detail-icon green">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <h1 class="inst-detail-title">
                        Tutelles Techniques<br>
                        <span>Gouvernance et Contrôle</span>
                    </h1>
                </div>
            </div>

            <div class="inst-detail-content" data-aos="fade-up">

                <div class="inst-detail-card">
                    <h2>Structure de Gouvernance</h2>
                    <p>Le FREMIN est placé sous une double tutelle pour assurer une gouvernance efficace et un contrôle
                        rigoureux de ses activités.</p>
                </div>

                <div class="inst-detail-card">
                    <h2><i class="fas fa-industry"></i> Tutelle Technique</h2>
                    <h3>Ministère en charge de l'Industrie</h3>

                    <div class="inst-detail-subcard">
                        <h4>Rôle et Responsabilités</h4>
                        <ul class="inst-detail-list">
                            <li>Définition des orientations stratégiques du FREMIN</li>
                            <li>Validation des programmes et projets</li>
                            <li>Supervision des activités techniques</li>
                            <li>Évaluation de l'impact sur le secteur industriel</li>
                        </ul>
                    </div>

                    <div class="inst-detail-subcard">
                        <h4>Missions</h4>
                        <ul class="inst-detail-list">
                            <li>Assurer l'alignement des actions du FREMIN avec la politique industrielle nationale</li>
                            <li>Approuver les grands axes d'intervention</li>
                            <li>Suivre la mise en œuvre des programmes</li>
                            <li>Coordonner avec les autres structures du secteur industriel</li>
                        </ul>
                    </div>
                </div>

                <div class="inst-detail-card">
                    <h2><i class="fas fa-coins"></i> Tutelle Financière</h2>
                    <h3>Ministère en charge de l'Économie</h3>

                    <div class="inst-detail-subcard">
                        <h4>Rôle et Responsabilités</h4>
                        <ul class="inst-detail-list">
                            <li>Contrôle de la gestion financière du FREMIN</li>
                            <li>Validation des budgets et plans financiers</li>
                            <li>Suivi de l'exécution budgétaire</li>
                            <li>Approbation des dépenses importantes</li>
                        </ul>
                    </div>

                    <div class="inst-detail-subcard">
                        <h4>Missions</h4>
                        <ul class="inst-detail-list">
                            <li>Garantir la bonne utilisation des ressources du fonds</li>
                            <li>Assurer la conformité aux règles de gestion publique</li>
                            <li>Contrôler la régularité des opérations financières</li>
                            <li>Veiller à la p érennité financière du FREMIN</li>
                        </ul>
                    </div>
                </div>

                <div class="inst-detail-card">
                    <h2><i class="fas fa-chart-line"></i> Coordination avec le Budget</h2>
                    <h3>Ministère en charge du Budget</h3>

                    <div class="inst-detail-subcard">
                        <h4>Rôle Complémentaire</h4>
                        <ul class="inst-detail-list">
                            <li>Liaison entre le FREMIN et les autorités budgétaires</li>
                            <li>Suivi de l'exécution des dotations budgétaires</li>
                            <li>Contrôle de la soutenabilité des engagements</li>
                            <li>Validation des reports et ajustements budgétaires</li>
                        </ul>
                    </div>
                </div>

                <div class="inst-detail-card">
                    <h2>Mécanismes de Contrôle</h2>
                    <ul class="inst-detail-list">
                        <li><strong>Rapports Périodiques</strong> : Soumission régulière de rapports d'activité et
                            financiers</li>
                        <li><strong>Audits</strong> : Audits internes et externes réguliers</li>
                        <li><strong>Réunions de Coordination</strong> : Rencontres trimestrielles avec les tutelles</li>
                        <li><strong>Validation Préalable</strong> : Approbation nécessaire pour les décisions majeures</li>
                    </ul>
                </div>

                <div class="inst-detail-card">
                    <h2>Avantages de cette Gouvernance</h2>
                    <div class="inst-detail-subcard">
                        <h3>Transparence</h3>
                        <p>Le dispositif de double tutelle assure une transparence totale dans la gestion du FREMIN.</p>
                    </div>

                    <div class="inst-detail-subcard">
                        <h3>Efficacité</h3>
                        <p>La coordination entre tutelles technique et financière garantit des décisions équilibrées.</p>
                    </div>

                    <div class="inst-detail-subcard">
                        <h3>Redevabilité</h3>
                        <p>Les mécanismes de contrôle assurent une gestion responsable des ressources publiques.</p>
                    </div>
                </div>

                <div class="inst-detail-card highlight-card">
                    <h2>Contact avec les Tutelles</h2>
                    <p>Pour toute question concernant la gouvernance du FREMIN :</p>
                    <a href="{{route('home.contact')}}" class="inst-detail-cta">
                        <span>Nous Contacter</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </section>
@endsection