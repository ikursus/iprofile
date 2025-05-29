@extends('admin.layout')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard')

@section('page-actions')
<div class="d-flex gap-2">
    <button class="btn btn-outline-primary btn-sm" onclick="refreshDashboard()">
        <i class="bi bi-arrow-clockwise"></i> Refresh
    </button>
    <div class="dropdown">
        <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
            <i class="bi bi-download"></i> Export
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-pdf"></i> PDF Report</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-excel"></i> Excel Report</a></li>
        </ul>
    </div>
</div>
@endsection

@section('content')
<!-- Statistics Cards -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Users
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($totalUsers) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-people fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Users Aktif
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($activeUsers) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-person-check fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Jumlah Program
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($totalPrograms) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-file-earmark fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pendaftaran Program
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($totalUserPrograms) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-clipboard-check fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Charts and Tables Row -->
<div class="row">
    <!-- User Status Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="bi bi-pie-chart"></i> Status Users
                </h6>
            </div>
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="userStatusChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    @foreach($userStatusStats as $stat)
                        <span class="mr-2">
                            <i class="bi bi-circle-fill text-{{ $stat->status == 'aktif' ? 'success' : ($stat->status == 'tidak aktif' ? 'secondary' : 'warning') }}"></i>
                            {{ ucfirst($stat->status) }}: {{ $stat->total }}
                        </span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Monthly Registration Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="bi bi-bar-chart"></i> Pendaftaran Bulanan (6 Bulan Terakhir)
                </h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="monthlyChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Data Tables -->
<div class="row">
    <!-- Recent Users -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="bi bi-people"></i> Users Terkini
                </h6>
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-primary">
                    Lihat Semua
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Tarikh</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentUsers as $user)
                            <tr>
                                <td>
                                    <a href="{{ route('users.show', $user->id) }}" class="text-decoration-none">
                                        {{ $user->name }}
                                    </a>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="badge bg-{{ $user->status == 'aktif' ? 'success' : ($user->status == 'tidak aktif' ? 'secondary' : 'warning') }}">
                                        {{ ucfirst($user->status) }}
                                    </span>
                                </td>
                                <td>{{ $user->created_at }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">Tiada data users</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Programs -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="bi bi-file-earmark"></i> Program Terkini
                </h6>
                <a href="{{ route('programs.index') }}" class="btn btn-sm btn-outline-primary">
                    Lihat Semua
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Nama Program</th>
                                <th>Tarikh Cipta</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentPrograms as $program)
                            <tr>
                                <td>
                                    <a href="{{ route('programs.show', $program->id) }}" class="text-decoration-none">
                                        {{ $program->name ?? 'Program ' . $program->id }}
                                    </a>
                                </td>
                                <td>{{ $program->created_at }}</td>
                                <td>
                                    <a href="{{ route('programs.show', $program->id) }}" class="btn btn-sm btn-outline-info">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">Tiada data program</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.border-left-primary {
    border-left: 0.25rem solid #4e73df !important;
}
.border-left-success {
    border-left: 0.25rem solid #1cc88a !important;
}
.border-left-info {
    border-left: 0.25rem solid #36b9cc !important;
}
.border-left-warning {
    border-left: 0.25rem solid #f6c23e !important;
}
.text-gray-300 {
    color: #dddfeb !important;
}
.text-gray-800 {
    color: #5a5c69 !important;
}
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// User Status Pie Chart
const userStatusData = @json($userStatusStats);
const statusCtx = document.getElementById('userStatusChart').getContext('2d');
const statusChart = new Chart(statusCtx, {
    type: 'doughnut',
    data: {
        labels: userStatusData.map(item => item.status.charAt(0).toUpperCase() + item.status.slice(1)),
        datasets: [{
            data: userStatusData.map(item => item.total),
            backgroundColor: ['#1cc88a', '#6c757d', '#f6c23e'],
            hoverBackgroundColor: ['#17a673', '#5a6268', '#dda20a'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
    },
    options: {
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            }
        }
    },
});

// Monthly Registration Line Chart
const monthlyData = @json($monthlyStats);
const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
const monthlyChart = new Chart(monthlyCtx, {
    type: 'line',
    data: {
        labels: monthlyData.map(item => {
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ogs', 'Sep', 'Okt', 'Nov', 'Dis'];
            return months[item.month - 1] + ' ' + item.year;
        }).reverse(),
        datasets: [{
            label: "Pendaftaran",
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: monthlyData.map(item => item.total).reverse(),
        }],
    },
    options: {
        maintainAspectRatio: false,
        scales: {
            x: {
                grid: {
                    display: false,
                    drawBorder: false,
                },
                ticks: {
                    maxTicksLimit: 7
                }
            },
            y: {
                ticks: {
                    maxTicksLimit: 5,
                    padding: 10,
                },
                grid: {
                    color: "rgb(234, 236, 244)",
                    zeroLineColor: "rgb(234, 236, 244)",
                    drawBorder: false,
                    borderDash: [2],
                    zeroLineBorderDash: [2],
                }
            },
        },
        plugins: {
            legend: {
                display: false
            }
        }
    }
});

// Refresh Dashboard Function
function refreshDashboard() {
    fetch('{{ route("admin.dashboard.data") }}')
        .then(response => response.json())
        .then(data => {
            // Update statistics cards with more specific selectors
            const cards = document.querySelectorAll('.row .col-xl-3');
            if (cards[0]) cards[0].querySelector('.h5').textContent = data.totalUsers.toLocaleString();
            if (cards[1]) cards[1].querySelector('.h5').textContent = data.activeUsers.toLocaleString();
            if (cards[2]) cards[2].querySelector('.h5').textContent = data.totalPrograms.toLocaleString();
            if (cards[3]) cards[3].querySelector('.h5').textContent = data.totalUserPrograms.toLocaleString();
            
            // Show success message
            const alert = document.createElement('div');
            alert.className = 'alert alert-success alert-dismissible fade show';
            alert.innerHTML = '<i class="bi bi-check-circle"></i> Dashboard berjaya dikemaskini! <button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
            const mainElement = document.querySelector('main') || document.querySelector('.container-fluid');
            if (mainElement) {
                mainElement.insertBefore(alert, mainElement.firstChild);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            const alert = document.createElement('div');
            alert.className = 'alert alert-danger alert-dismissible fade show';
            alert.innerHTML = '<i class="bi bi-exclamation-triangle"></i> Ralat semasa mengemaskini dashboard! <button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
            const mainElement = document.querySelector('main') || document.querySelector('.container-fluid');
            if (mainElement) {
                mainElement.insertBefore(alert, mainElement.firstChild);
            }
        });
}
</script>
@endpush