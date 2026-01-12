@extends('admin.layouts.template')

@section('content')
    <style>
        :root {
            --dash-primary: #06634e;
            --dash-secondary: #78ac11;
            --dash-accent: #ffc107;
            --dash-white: #ffffff;
            --dash-gray-50: #f8fafc;
            --dash-gray-100: #f1f5f9;
            --dash-gray-200: #e2e8f0;
            --dash-gray-600: #475569;
            --dash-gray-800: #1e293b;
            --radius-dash: 1.25rem;
            --shadow-dash: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .dashboard-container {
            padding: 2.5rem;
            background: var(--dash-gray-50);
            min-height: calc(100vh - 64px);
        }

        .welcome-banner {
            background: linear-gradient(135deg, var(--dash-primary), #0a7a62);
            border-radius: var(--radius-dash);
            padding: 3rem;
            color: white;
            margin-bottom: 3rem;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-dash);
        }

        .welcome-banner::after {
            content: "";
            position: absolute;
            top: -50%;
            right: -10%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .welcome-title {
            font-size: 2.25rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }

        .welcome-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .stat-card {
            background: white;
            border-radius: var(--radius-dash);
            padding: 2rem;
            box-shadow: var(--shadow-dash);
            border: 1px solid var(--dash-gray-200);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .icon-pub {
            background: #fee2e2;
            color: #ef4444;
        }

        .icon-dl {
            background: #dcfce7;
            color: #22c55e;
        }

        .icon-prog {
            background: #e0f2fe;
            color: #0ea5e9;
        }

        .icon-opp {
            background: #fef3c7;
            color: #d97706;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 800;
            color: var(--dash-gray-800);
            margin-bottom: 0.25rem;
        }

        .stat-label {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--dash-gray-600);
            text-transform: uppercase;
            letter-spacing: 0.025em;
        }

        .stat-meta {
            margin-top: 1.5rem;
            padding-top: 1rem;
            border-top: 1px solid var(--dash-gray-100);
            display: flex;
            justify-content: space-between;
            font-size: 0.85rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Comparison Table / Recent Activity */
        .dashboard-row {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
        }

        .dash-box {
            background: white;
            border-radius: var(--radius-dash);
            padding: 2rem;
            box-shadow: var(--shadow-dash);
            border: 1px solid var(--dash-gray-200);
        }

        .box-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dash-gray-800);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .table-custom {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 0.75rem;
        }

        .table-custom th {
            text-align: left;
            font-size: 0.8rem;
            text-transform: uppercase;
            color: var(--dash-gray-600);
            padding: 0 1rem;
            font-weight: 700;
        }

        .table-custom td {
            padding: 1.25rem 1rem;
            background: var(--dash-gray-50);
            font-size: 0.95rem;
        }

        .table-custom tr td:first-child {
            border-radius: 12px 0 0 12px;
            font-weight: 600;
        }

        .table-custom tr td:last-child {
            border-radius: 0 12px 12px 0;
        }

        .badge {
            padding: 0.35rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .badge-success {
            background: #dcfce7;
            color: #166534;
        }

        .badge-warning {
            background: #fef3c7;
            color: #92400e;
        }

        /* Publication Status List */
        .status-list {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

        .status-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem;
            background: var(--dash-gray-50);
            border-radius: 12px;
            border-left: 4px solid var(--dash-primary);
        }

        .status-info h4 {
            font-size: 0.95rem;
            font-weight: 700;
            margin-bottom: 0.15rem;
            color: var(--dash-gray-800);
        }

        .status-info p {
            font-size: 0.8rem;
            color: var(--dash-gray-600);
        }

        .status-marker {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 700;
            font-size: 0.85rem;
        }

        .marker-online {
            color: #22c55e;
        }

        .marker-offline {
            color: #ef4444;
        }

        @media (max-width: 1024px) {
            .dashboard-row {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="dashboard-container">
        <div class="welcome-banner">
            <h1 class="welcome-title">Bonjour, {{ Auth::guard('admin')->user()->name }}</h1>
            <p class="welcome-subtitle">Voici l'état actuel de votre plateforme FREMIN.</p>
        </div>

        <!-- Main Stats -->
        <div class="stats-grid">
            <!-- Publications & Downloads -->
            <div class="stat-card">
                <div class="stat-icon icon-dl">
                    <i class="fas fa-download"></i>
                </div>
                <div class="stat-value">{{ number_format($pubStats['downloads']) }}</div>
                <div class="stat-label">Téléchargements</div>
                <div class="stat-meta">
                    <div class="meta-item"><i class="far fa-eye"></i> {{ $pubStats['views'] }} vues</div>
                    <div class="meta-item"><i class="fas fa-file-alt"></i> {{ $pubStats['total'] }} docs</div>
                </div>
            </div>

            <!-- Programs -->
            <div class="stat-card">
                <div class="stat-icon icon-prog">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <div class="stat-value">{{ $progStats['total'] }}</div>
                <div class="stat-label">Programmes</div>
                <div class="stat-meta">
                    <div class="meta-item" style="color: #22c55e"><i class="fas fa-check-circle"></i>
                        {{ $progStats['active'] }} actifs</div>
                    <div class="meta-item" style="color: #ef4444"><i class="fas fa-times-circle"></i>
                        {{ $progStats['inactive'] }} brouillons</div>
                </div>
            </div>

            <!-- Opportunities -->
            <div class="stat-card">
                <div class="stat-icon icon-opp">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <div class="stat-value">{{ $oppStats['total'] }}</div>
                <div class="stat-label">Opportunités</div>
                <div class="stat-meta">
                    <div class="meta-item" style="color: var(--dash-secondary)"><i class="fas fa-door-open"></i>
                        {{ $oppStats['open'] }} ouverts</div>
                    <div class="meta-item"><i class="fas fa-archive"></i> {{ $oppStats['closed'] }} clos</div>
                </div>
            </div>

            <!-- News & Activity -->
            <div class="stat-card">
                <div class="stat-icon icon-pub">
                    <i class="fas fa-newspaper"></i>
                </div>
                <div class="stat-value">{{ $newsStats['total'] }}</div>
                <div class="stat-label">Articles & Actualités</div>
                <div class="stat-meta">
                    <div class="meta-item"><i class="fas fa-calendar-alt"></i> {{ $newsStats['events'] }} événements</div>
                    <div class="meta-item"><i class="fas fa-rss"></i> {{ $newsStats['active'] }} en ligne</div>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="dashboard-row mb-4">
            <div class="dash-box" style="grid-column: span 2;">
                <div class="box-title">Évolution des Téléchargements (30 derniers jours)</div>
                <div style="height: 300px;">
                    <canvas id="evolutionChart"></canvas>
                </div>
            </div>
        </div>

        <div class="dashboard-row mb-4">
            <div class="dash-box">
                <div class="box-title">Performances des Documents (Top 7)</div>
                <div style="height: 300px;">
                    <canvas id="downloadsChart"></canvas>
                </div>
            </div>
            <div class="dash-box">
                <div class="box-title">Composition des Publications</div>
                <div style="height: 300px; display: flex; justify-content: center;">
                    <canvas id="typesChart"></canvas>
                </div>
            </div>
        </div>

        <div class="dashboard-row">
            <!-- Most Downloaded Publications -->
            <div class="dash-box">
                <div class="box-title">
                    Publications les plus populaires
                    <a href="{{ route('admin.publications.index') }}" class="btn btn-sm btn-outline-primary"
                        style="font-size: 0.75rem">Tout voir</a>
                </div>
                <table class="table-custom">
                    <thead>
                        <tr>
                            <th>Titre du Document</th>
                            <th>Type</th>
                            <th>Vues</th>
                            <th>Téléchargements</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pubStats['recent_downloads'] as $pub)
                            <tr>
                                <td>{{ Str::limit($pub->title, 40) }}</td>
                                <td><span class="badge badge-warning">{{ strtoupper($pub->type) }}</span></td>
                                <td>{{ $pub->views }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <strong>{{ $pub->downloads }}</strong>
                                        <div
                                            style="width: 60px; height: 6px; background: #e2e8f0; border-radius: 3px; position: relative;">
                                            <div
                                                style="position: absolute; left: 0; top: 0; height: 100%; background: var(--dash-secondary); border-radius: 3px; width: {{ $pubStats['downloads'] > 0 ? ($pub->downloads / $pubStats['downloads'] * 100) : 0 }}%;">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4">Aucune donnée disponible</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Publication Summary -->
            <div class="dash-box">
                <div class="box-title">État des Informations</div>
                <div class="status-list">
                    <div class="status-item" style="border-left-color: #ef4444;">
                        <div class="status-info">
                            <h4>Publications</h4>
                            <p>{{ $pubStats['draft'] }} document(s) en attente</p>
                        </div>
                        <div class="status-marker {{ $pubStats['published'] > 0 ? 'marker-online' : 'marker-offline' }}">
                            <i
                                class="fas {{ $pubStats['published'] > 0 ? 'fa-check-circle' : 'fa-exclamation-triangle' }}"></i>
                            {{ $pubStats['published'] }} Publiés
                        </div>
                    </div>

                    <div class="status-item" style="border-left-color: #0ea5e9;">
                        <div class="status-info">
                            <h4>Programmes</h4>
                            <p>{{ $progStats['inactive'] }} en cours d'édition</p>
                        </div>
                        <div class="status-marker {{ $progStats['active'] > 0 ? 'marker-online' : 'marker-offline' }}">
                            <i
                                class="fas {{ $progStats['active'] > 0 ? 'fa-check-circle' : 'fa-exclamation-triangle' }}"></i>
                            {{ $progStats['active'] }} Actifs
                        </div>
                    </div>

                    <div class="status-item" style="border-left-color: #f59e0b;">
                        <div class="status-info">
                            <h4>Appels</h4>
                            <p>{{ $oppStats['open'] }} appel(s) ouvert(s)</p>
                        </div>
                        <div class="status-marker {{ $oppStats['open'] > 0 ? 'marker-online' : 'marker-offline' }}">
                            <i class="fas {{ $oppStats['open'] > 0 ? 'fa-clock' : 'fa-times-circle' }}"></i>
                            {{ $oppStats['open'] }} En cours
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div style="margin-top: 1rem;">
                        <h5 style="font-size: 0.9rem; font-weight: 700; margin-bottom: 1rem; color: var(--dash-gray-600);">
                            Actions Rapides</h5>
                        <div class="d-grid gap-2">
                            <a href="{{ route('admin.programs.create') }}"
                                class="btn btn-outline-success btn-sm text-start">
                                <i class="fas fa-plus me-2"></i> Ajouter un programme
                            </a>
                            <a href="{{ route('admin.publications.create') }}"
                                class="btn btn-outline-primary btn-sm text-start">
                                <i class="fas fa-file-upload me-2"></i> Publier un rapport
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Chart 3: Evolution Chart (Bar)
            const ctxEvolution = document.getElementById('evolutionChart').getContext('2d');
            new Chart(ctxEvolution, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($charts['downloadsPeriod']->pluck('date')) !!},
                    datasets: [{
                        label: 'Téléchargements quotidiens',
                        data: {!! json_encode($charts['downloadsPeriod']->pluck('count')) !!},
                        backgroundColor: 'rgba(6, 99, 78, 0.7)',
                        borderColor: '#06634e',
                        borderWidth: 1,
                        borderRadius: 5,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: { stepSize: 1 },
                            grid: { color: '#f1f5f9' }
                        },
                        x: {
                            grid: { display: false }
                        }
                    }
                }
            });

            // Chart 1: Bar Chart for Top Publications
            const ctxDl = document.getElementById('downloadsChart').getContext('2d');
            new Chart(ctxDl, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($charts['topPubs']->pluck('title')->map(fn($t) => Str::limit($t, 15))) !!},
                    datasets: [{
                        label: 'Téléchargements',
                        data: {!! json_encode($charts['topPubs']->pluck('downloads')) !!},
                        backgroundColor: 'rgba(120, 172, 17, 0.6)',
                        borderColor: '#78ac11',
                        borderWidth: 2,
                        borderRadius: 8,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: { beginAtZero: true, grid: { display: false } },
                        x: { grid: { display: false } }
                    }
                }
            });

            // Chart 2: Types Chart (Bar)
            const ctxTypes = document.getElementById('typesChart').getContext('2d');
            const typeLabels = {
                'rapport': 'Rapports',
                'etude': 'Études',
                'guide': 'Guides',
                'brochure': 'Brochures',
                'autre': 'Autres'
            };

            const rawTypes = {!! json_encode($charts['pubTypes']) !!};
            const labels = rawTypes.map(item => typeLabels[item.type] || item.type);
            const data = rawTypes.map(item => item.count);

            new Chart(ctxTypes, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Nombre de documents',
                        data: data,
                        backgroundColor: [
                            '#06634e', '#78ac11', '#ffc107', '#0ea5e9', '#64748b'
                        ],
                        borderRadius: 8,
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: { beginAtZero: true, grid: { color: '#f1f5f9' } },
                        x: { grid: { display: false } }
                    }
                }
            });
        });
    </script>
@endsection