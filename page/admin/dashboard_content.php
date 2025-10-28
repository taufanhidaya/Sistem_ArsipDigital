<!-- ============================================ -->
<!-- FILE: page/admin/dashboard_content.php -->
<!-- Konten Default untuk Dashboard Admin -->
<!-- ============================================ -->

<!-- Welcome Section -->
<div class="mb-4">
    <h2 class="mb-1">Selamat Datang, Admin! 👋</h2>
    <p class="text-secondary">Berikut adalah ringkasan sistem E-ARSIP hari ini</p>
</div>

<!-- Stats Cards -->
<div class="row g-4 mb-4">
    <div class="col-lg-3 col-md-6">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="stat-label">Total Siswa</div>
                    <div class="stat-value">1,248</div>
                    <small class="text-success"><i class="fas fa-arrow-up"></i> +12% dari bulan lalu</small>
                </div>
                <div class="stat-card-icon icon-blue">
                    <i class="fas fa-user-graduate"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="stat-label">Total Guru</div>
                    <div class="stat-value">87</div>
                    <small class="text-success"><i class="fas fa-arrow-up"></i> +3 guru baru</small>
                </div>
                <div class="stat-card-icon icon-green">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="stat-label">Total Arsip</div>
                    <div class="stat-value">3,456</div>
                    <small class="text-info"><i class="fas fa-arrow-up"></i> +156 dokumen</small>
                </div>
                <div class="stat-card-icon icon-purple">
                    <i class="fas fa-archive"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="stat-label">Total Kelas</div>
                    <div class="stat-value">36</div>
                    <small class="text-secondary"><i class="fas fa-minus"></i> Tidak ada perubahan</small>
                </div>
                <div class="stat-card-icon icon-orange">
                    <i class="fas fa-door-open"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Secondary Stats -->
<div class="row g-4 mb-4">
    <div class="col-lg-4 col-md-6">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="stat-label">Arsip Pending</div>
                    <div class="stat-value text-warning">23</div>
                    <small class="text-muted">Menunggu verifikasi</small>
                </div>
                <div class="stat-card-icon icon-orange">
                    <i class="fas fa-clock"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="stat-label">Pelajaran Aktif</div>
                    <div class="stat-value">18</div>
                    <small class="text-muted">Semester ini</small>
                </div>
                <div class="stat-card-icon icon-teal">
                    <i class="fas fa-book"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="stat-label">Laporan Bulan Ini</div>
                    <div class="stat-value">42</div>
                    <small class="text-success"><i class="fas fa-arrow-up"></i> +8 dari bulan lalu</small>
                </div>
                <div class="stat-card-icon icon-red">
                    <i class="fas fa-file-alt"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Charts & Calendar Row -->
<div class="row g-4 mb-4">
    <div class="col-lg-8">
        <div class="dashboard-card">
            <h5 class="card-title">Statistik Arsip Bulanan</h5>
            <canvas id="archiveChart" style="max-height: 300px;"></canvas>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="dashboard-card">
            <h5 class="card-title">Kalender - Oktober 2025</h5>
            <div class="calendar-header">
                <div>Min</div>
                <div>Sen</div>
                <div>Sel</div>
                <div>Rab</div>
                <div>Kam</div>
                <div>Jum</div>
                <div>Sab</div>
            </div>
            <div class="calendar-grid" id="calendarGrid">
                <!-- Calendar will be generated by JavaScript -->
            </div>
        </div>
    </div>
</div>

<!-- Recent Activities -->
<div class="row g-4">
    <div class="col-lg-6">
        <div class="dashboard-card">
            <h5 class="card-title">Aktivitas Terbaru</h5>
            <div class="list-group list-group-flush">
                <div class="list-group-item border-0 px-0">
                    <div class="d-flex align-items-center">
                        <div class="stat-card-icon icon-blue me-3" style="width: 40px; height: 40px; font-size: 1rem;">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-0">Siswa Baru Terdaftar</h6>
                            <small class="text-muted">Ahmad Rifai - Kelas X RPL 1</small>
                        </div>
                        <small class="text-muted">2 jam lalu</small>
                    </div>
                </div>
                <div class="list-group-item border-0 px-0">
                    <div class="d-flex align-items-center">
                        <div class="stat-card-icon icon-green me-3" style="width: 40px; height: 40px; font-size: 1rem;">
                            <i class="fas fa-file-upload"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-0">Arsip Baru Ditambahkan</h6>
                            <small class="text-muted">Rapor Semester Ganjil 2024/2025</small>
                        </div>
                        <small class="text-muted">5 jam lalu</small>
                    </div>
                </div>
                <div class="list-group-item border-0 px-0">
                    <div class="d-flex align-items-center">
                        <div class="stat-card-icon icon-purple me-3" style="width: 40px; height: 40px; font-size: 1rem;">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-0">Verifikasi Dokumen</h6>
                            <small class="text-muted">15 dokumen telah diverifikasi</small>
                        </div>
                        <small class="text-muted">1 hari lalu</small>
                    </div>
                </div>
                <div class="list-group-item border-0 px-0">
                    <div class="d-flex align-items-center">
                        <div class="stat-card-icon icon-orange me-3" style="width: 40px; height: 40px; font-size: 1rem;">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-0">Guru Baru Bergabung</h6>
                            <small class="text-muted">Ibu Sarah - Guru Bahasa Inggris</small>
                        </div>
                        <small class="text-muted">2 hari lalu</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="dashboard-card">
            <h5 class="card-title">Quick Actions</h5>
            <div class="row g-3">
                <div class="col-6">
                    <a href="?page=manajemen_siswa" class="text-decoration-none">
                        <button class="btn btn-primary w-100 py-3" style="background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); border: none;">
                            <i class="fas fa-user-plus d-block mb-2" style="font-size: 1.5rem;"></i>
                            <span>Tambah Siswa</span>
                        </button>
                    </a>
                </div>
                <div class="col-6">
                    <a href="?page=manajemen_arsip" class="text-decoration-none">
                        <button class="btn btn-success w-100 py-3" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); border: none;">
                            <i class="fas fa-file-upload d-block mb-2" style="font-size: 1.5rem;"></i>
                            <span>Upload Arsip</span>
                        </button>
                    </a>
                </div>
                <div class="col-6">
                    <a href="?page=laporan" class="text-decoration-none">
                        <button class="btn btn-warning w-100 py-3" style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); border: none;">
                            <i class="fas fa-chart-bar d-block mb-2" style="font-size: 1.5rem;"></i>
                            <span>Buat Laporan</span>
                        </button>
                    </a>
                </div>
                <div class="col-6">
                    <a href="?page=pengaturan" class="text-decoration-none">
                        <button class="btn btn-info w-100 py-3" style="background: linear-gradient(135deg, #14b8a6 0%, #0d9488 100%); border: none;">
                            <i class="fas fa-cog d-block mb-2" style="font-size: 1.5rem;"></i>
                            <span>Pengaturan</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
// Generate Calendar
function generateCalendar() {
    const calendarGrid = document.getElementById('calendarGrid');
    if (!calendarGrid) return;
    
    const today = new Date();
    const currentDay = today.getDate();
    const firstDay = new Date(today.getFullYear(), today.getMonth(), 1).getDay();
    const daysInMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0).getDate();
    
    // Add empty cells for days before month starts
    for (let i = 0; i < firstDay; i++) {
        const emptyDiv = document.createElement('div');
        calendarGrid.appendChild(emptyDiv);
    }
    
    // Add days
    for (let day = 1; day <= daysInMonth; day++) {
        const dayDiv = document.createElement('div');
        dayDiv.className = 'calendar-day';
        dayDiv.textContent = day;
        
        if (day === currentDay) {
            dayDiv.classList.add('active');
        }
        
        calendarGrid.appendChild(dayDiv);
    }
}

generateCalendar();

// Chart.js - Archive Statistics
const ctx = document.getElementById('archiveChart');
if (ctx) {
    const archiveChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Oct'],
            datasets: [{
                label: 'Arsip Ditambahkan',
                data: [120, 190, 170, 220, 280, 310, 290, 340, 380, 420],
                borderColor: '#10b981',
                backgroundColor: 'rgba(16, 185, 129, 0.1)',
                tension: 0.4,
                fill: true,
                pointBackgroundColor: '#10b981',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointRadius: 5,
                pointHoverRadius: 7
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    padding: 12,
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    cornerRadius: 8
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // Update chart colors based on theme
    const themeToggle = document.getElementById('themeToggle');
    if (themeToggle) {
        themeToggle.addEventListener('click', () => {
            setTimeout(() => {
                const isDark = document.body.classList.contains('dark-theme');
                archiveChart.options.scales.y.grid.color = isDark ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.05)';
                archiveChart.options.scales.y.ticks.color = isDark ? '#9ca3af' : '#6b7280';
                archiveChart.options.scales.x.ticks.color = isDark ? '#9ca3af' : '#6b7280';
                archiveChart.update();
            }, 100);
        });
    }
}
</script>