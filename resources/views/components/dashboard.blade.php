@auth
<div class="main-content">
    <section class="section">
        <div class="margin-content">
            <div class="container-sm">
                <div class="section-header">
                    <h1>Dashboard</h1>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="far fa-user"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="padding-20">
                                        <div class="text-right">
                                            <h3 class="font-weight-bold mb-1">
                                                {{ $dashboardData['users'] ?? 'N/A' }}
                                            </h3>
                                            <p class="mb-0">Total Users</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-danger">
                                    <i class="far fa-file"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="padding-20">
                                        <div class="text-right">
                                            <h3 class="font-weight-bold mb-1">
                                                {{ $dashboardData['products'] ?? 'N/A' }}
                                            </h3>
                                            <p class="mb-0">Total Products</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-warning">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="padding-20">
                                        <div class="text-right">
                                            <h3 class="font-weight-bold mb-1">
                                                {{ $dashboardData['orders'] ?? 'N/A' }}
                                            </h3>
                                            <p class="mb-0">New Orders</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-success">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="padding-20">
                                        <div class="text-right">
                                            <h3 class="font-weight-bold mb-1">
                                                ${{ $dashboardData['revenue'] ?? 'N/A' }}
                                            </h3>
                                            <p class="mb-0">Total Revenue</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Sales Breakdown</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="salesChart" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4>User Activity</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="userActivityChart" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    .main-content {
        margin-left: 250px; /* Adjust this to match your sidebar width */
    }

    .card-statistic-1 {
        background-color: #fff;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        overflow: hidden;
        position: relative;
    }

    .card-statistic-1 .card-icon {
        position: absolute;
        top: 20px;
        left: 20px;
        font-size: 3rem;
        color: #fff;
        padding: 15px;
        border-radius: 3px;
    }

    .card-statistic-1 .bg-primary { background-color: #6777ef !important; }
    .card-statistic-1 .bg-danger { background-color: #fc544b !important; }
    .card-statistic-1 .bg-warning { background-color: #ff9f1c !important; }
    .card-statistic-1 .bg-success { background-color: #28a745 !important; }

    .card-statistic-1 .card-wrap {
        padding: 20px;
        text-align: right;
    }

    .card-statistic-1 .card-wrap .font-weight-bold {
        font-size: 1.5rem;
        line-height: 1.2;
    }

    .card-statistic-1 .card-wrap .mb-0 {
        font-size: 0.875rem;
    }

    .card {
        border: none;
        border-radius: 0.75rem;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }

    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #e3e6f0;
        padding: 15px 20px;
        border-radius: 0.75rem 0.75rem 0 0;
    }

    .card-header h4 {
        font-size: 1.25rem;
        margin-bottom: 0;
    }

    .card-body {
        padding: 20px;
    }

    .font-weight-bold {
        font-weight: 600 !important;
    }

    .main-content .section {
        padding: 20px;
    }

    .main-content .section .margin-content {
        margin-left: auto;
        margin-right: auto;
        max-width: 1200px;
    }

    .main-content .section .margin-content .container-sm {
        max-width: 100%;
    }

    .main-content .section .section-header {
        margin-bottom: 20px;
    }
</style>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function() {
            // Sales Breakdown Chart (Pie Chart)
            var salesChartCanvas = $('#salesChart').get(0).getContext('2d');
            var salesChart = new Chart(salesChartCanvas, {
                type: 'pie',
                data: {
                    labels: ['Electronics', 'Clothing', 'Books', 'Other'],
                    datasets: [{
                        label: 'Sales by Category',
                        data: [300, 150, 80, 120],
                        backgroundColor: ['#6777ef', '#28a745', '#ff9f1c', '#fc544b'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                        }
                    }
                }
            });

            // User Activity Chart (Bar Chart)
            var userActivityChartCanvas = $('#userActivityChart').get(0).getContext('2d');
            var userActivityChart = new Chart(userActivityChartCanvas, {
                type: 'bar',
                data: {
                    labels: ['New Users', 'Returning Users'],
                    datasets: [{
                        label: 'User Activity',
                        data: [700, 300],
                        backgroundColor: ['#007bff', '#17a2b8'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        });
    </script>
@endpush
@endauth
