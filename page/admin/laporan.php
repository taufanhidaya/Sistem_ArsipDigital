<div class="mb-4">
    <h2 class="mb-1">📊 Laporan</h2>
    <p class="text-secondary">Generate dan lihat berbagai laporan sistem</p>
</div>

<!-- Quick Reports -->
<div class="row g-3 mb-4">
    <div class="col-lg-3 col-md-6">
        <div class="stat-card blue" style="cursor: pointer;">
            <div class="text-center">
                <div class="stat-icon blue mx-auto mb-3">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <h6 class="fw-bold">Laporan Siswa</h6>
                <p class="text-muted small mb-0">Data lengkap siswa</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="stat-card green" style="cursor: pointer;">
            <div class="text-center">
                <div class="stat-icon green mx-auto mb-3">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <h6 class="fw-bold">Laporan Guru</h6>
                <p class="text-muted small mb-0">Data lengkap guru</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="stat-card purple" style="cursor: pointer;">
            <div class="text-center">
                <div class="stat-icon purple mx-auto mb-3">
                    <i class="fas fa-archive"></i>
                </div>
                <h6 class="fw-bold">Laporan Arsip</h6>
                <p class="text-muted small mb-0">Statistik arsip</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="stat-card orange" style="cursor: pointer;">
            <div class="text-center">
                <div class="stat-icon orange mx-auto mb-3">
                    <i class="fas fa-door-open"></i>
                </div>
                <h6 class="fw-bold">Laporan Kelas</h6>
                <p class="text-muted small mb-0">Data per kelas</p>
            </div>
        </div>
    </div>
</div>

<!-- Filter -->
<div class="dashboard-card mb-4">
    <h5 class="fw-bold mb-4">Generate Laporan Custom</h5>
    <div class="row g-3">
        <div class="col-md-3">
            <label class="form-label">Jenis Laporan</label>
            <select class="form-select">
                <option>Laporan Siswa</option>
                <option>Laporan Guru</option>
                <option>Laporan Kelas</option>
                <option>Laporan Arsip</option>
                <option>Laporan Pelajaran</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">Periode</label>
            <select class="form-select">
                <option>Bulan Ini</option>
                <option>3 Bulan Terakhir</option>
                <option>Semester Ganjil</option>
                <option>Tahun Ajaran 2024/2025</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">Format</label>
            <select class="form-select">
                <option>PDF</option>
                <option>Excel</option>
                <option>CSV</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">&nbsp;</label>
            <button class="btn btn-primary w-100">
                <i class="fas fa-cog me-2"></i>Generate Laporan
            </button>
        </div>
    </div>
</div>

<!-- Statistik Overview -->
<div class="row g-4 mb-4">
    <div class="col-lg-6">
        <div class="dashboard-card">
            <h5 class="fw-bold mb-4">Statistik Siswa per Tingkat</h5>
            <canvas id="siswaChart" style="max-height: 300px;"></canvas>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="dashboard-card">
            <h5 class="fw-bold mb-4">Pertumbuhan Arsip</h5>
            <canvas id="arsipChart" style="max-height: 300px;"></canvas>
        </div>
    </div>
</div>

<!-- Laporan Terbaru -->
<div class="dashboard-card">
    <h5 class="fw-bold mb-4">Riwayat Laporan yang Dibuat</h5>
    
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Jenis Laporan</th>
                    <th>Periode</th>
                    <th>Dibuat Oleh</th>
                    <th>Format</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>26 Okt 2025</td>
                    <td><strong>Laporan Siswa Lengkap</strong></td>
                    <td>Oktober 2025</td>
                    <td>Super Admin</td>
                    <td><span class="badge bg-danger">PDF</span></td>
                    <td class="text-center">
                        <span class="badge bg-success">Selesai</span>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary">
                            <i class="fas fa-download"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>25 Okt 2025</td>
                    <td><strong>Laporan Arsip Bulanan</strong></td>
                    <td>Oktober 2025</td>
                    <td>Ahmad Fauzi</td>
                    <td><span class="badge bg-success">Excel</span></td>
                    <td class="text-center">
                        <span class="badge bg-success">Selesai</span>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary">
                            <i class="fas fa-download"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>20 Okt 2025</td>
                    <td><strong>Laporan Guru Aktif</strong></td>
                    <td>Tahun 2024/2025</td>
                    <td>Super Admin</td>
                    <td><span class="badge bg-danger">PDF</span></td>
                    <td class="text-center">
                        <span class="badge bg-success">Selesai</span>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary">
                            <i class="fas fa-download"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
// Chart Siswa
const siswaCtx = document.getElementById('siswaChart');
if (siswaCtx) {
    new Chart(siswaCtx, {
        type: 'bar',
        data: {
            labels: ['Kelas X', 'Kelas XI', 'Kelas XII'],
            datasets: [{
                label: 'Jumlah Siswa',
                data: [420, 408, 420],
                backgroundColor: [
                    'rgba(59, 130, 246, 0.8)',
                    'rgba(16, 185, 129, 0.8)',
                    'rgba(139, 92, 246, 0.8)'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } }
        }
    });
}

// Chart Arsip
const arsipCtx = document.getElementById('arsipChart');
if (arsipCtx) {
    new Chart(arsipCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt'],
            datasets: [{
                label: 'Arsip Ditambahkan',
                data: [120, 190, 170, 220, 280, 310, 290, 340, 380, 420],
                borderColor: '#10b981',
                backgroundColor: 'rgba(16, 185, 129, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } }
        }
    });
}
</script>