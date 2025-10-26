<div class="mb-4">
    <h2 class="mb-1">📝 Penilaian</h2>
    <p class="text-secondary">Input dan kelola nilai siswa</p>
</div>

<!-- Filter Section -->
<div class="dashboard-card mb-4">
    <div class="row g-3">
        <div class="col-md-3">
            <label class="form-label">Pilih Kelas</label>
            <select class="form-select" id="selectKelas">
                <option>XII IPA 1</option>
                <option>XII IPA 2</option>
                <option>XI IPA 1</option>
                <option>XI IPA 2</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">Jenis Penilaian</label>
            <select class="form-select">
                <option>UTS</option>
                <option>UAS</option>
                <option>Quiz</option>
                <option>Tugas</option>
                <option>Praktikum</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">Semester</label>
            <select class="form-select">
                <option>Ganjil 2024/2025</option>
                <option>Genap 2023/2024</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">&nbsp;</label>
            <button class="btn btn-primary w-100">
                <i class="fas fa-filter me-2"></i>Filter
            </button>
        </div>
    </div>
</div>

<!-- Stats Summary -->
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="stat-card blue">
            <div class="stat-icon blue">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-value">32</div>
            <div class="stat-label">Total Siswa</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card green">
            <div class="stat-icon green">
                <i class="fas fa-check-double"></i>
            </div>
            <div class="stat-value">28</div>
            <div class="stat-label">Sudah Dinilai</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card orange">
            <div class="stat-icon orange">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-value">4</div>
            <div class="stat-label">Belum Dinilai</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card purple">
            <div class="stat-icon purple">
                <i class="fas fa-star"></i>
            </div>
            <div class="stat-value">87.5</div>
            <div class="stat-label">Rata-rata Kelas</div>
        </div>
    </div>
</div>

<!-- Grade Input Table -->
<div class="dashboard-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="fw-bold mb-0">Input Nilai - XII IPA 1 (UTS Kalkulus)</h5>
        <div class="d-flex gap-2">
            <button class="btn btn-sm btn-success">
                <i class="fas fa-save me-2"></i>Simpan Semua
            </button>
            <button class="btn btn-sm btn-info">
                <i class="fas fa-file-export me-2"></i>Export
            </button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th class="text-center">Nilai</th>
                    <th class="text-center">Grade</th>
                    <th class="text-center">Status</th>
                    <th>Catatan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>20230001</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="https://ui-avatars.com/api/?name=Budi+Setiawan&background=3b82f6&color=fff" 
                                 style="width: 32px; height: 32px; border-radius: 50%;" alt="Student">
                            <strong>Budi Setiawan</strong>
                        </div>
                    </td>
                    <td class="text-center">
                        <input type="number" class="form-control form-control-sm text-center" 
                               value="88" min="0" max="100" style="width: 70px; margin: 0 auto;">
                    </td>
                    <td class="text-center">
                        <span class="badge bg-success">A</span>
                    </td>
                    <td class="text-center">
                        <span class="badge bg-success">Sudah Dinilai</span>
                    </td>
                    <td>
                        <input type="text" class="form-control form-control-sm" 
                               placeholder="Tambah catatan..." value="Sangat baik">
                    </td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary">
                            <i class="fas fa-save"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>20230002</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="https://ui-avatars.com/api/?name=Siti+Nurhaliza&background=8b5cf6&color=fff" 
                                 style="width: 32px; height: 32px; border-radius: 50%;" alt="Student">
                            <strong>Siti Nurhaliza</strong>
                        </div>
                    </td>
                    <td class="text-center">
                        <input type="number" class="form-control form-control-sm text-center" 
                               value="95" min="0" max="100" style="width: 70px; margin: 0 auto;">
                    </td>
                    <td class="text-center">
                        <span class="badge bg-success">A</span>
                    </td>
                    <td class="text-center">
                        <span class="badge bg-success">Sudah Dinilai</span>
                    </td>
                    <td>
                        <input type="text" class="form-control form-control-sm" 
                               placeholder="Tambah catatan..." value="Luar biasa">
                    </td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary">
                            <i class="fas fa-save"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>20230003</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="https://ui-avatars.com/api/?name=Ahmad+Rifai&background=10b981&color=fff" 
                                 style="width: 32px; height: 32px; border-radius: 50%;" alt="Student">
                            <strong>Ahmad Rifai</strong>
                        </div>
                    </td>
                    <td class="text-center">
                        <input type="number" class="form-control form-control-sm text-center" 
                               placeholder="0-100" min="0" max="100" style="width: 70px; margin: 0 auto;">
                    </td>
                    <td class="text-center">
                        <span class="badge bg-secondary">-</span>
                    </td>
                    <td class="text-center">
                        <span class="badge bg-warning">Belum Dinilai</span>
                    </td>
                    <td>
                        <input type="text" class="form-control form-control-sm" 
                               placeholder="Tambah catatan...">
                    </td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary">
                            <i class="fas fa-save"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Statistik Nilai -->
<div class="row g-4 mt-3">
    <div class="col-lg-6">
        <div class="dashboard-card">
            <h5 class="fw-bold mb-4">Distribusi Nilai</h5>
            <canvas id="gradeChart" style="max-height: 300px;"></canvas>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="dashboard-card">
            <h5 class="fw-bold mb-4">Statistik Kelas</h5>
            <div class="d-flex flex-column gap-3">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-muted">Nilai Tertinggi</span>
                    <strong class="text-success" style="font-size: 1.5rem;">95</strong>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-muted">Nilai Terendah</span>
                    <strong class="text-danger" style="font-size: 1.5rem;">65</strong>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-muted">Rata-rata</span>
                    <strong class="text-primary" style="font-size: 1.5rem;">87.5</strong>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-muted">Median</span>
                    <strong style="font-size: 1.5rem;">86</strong>
                </div>
                <hr>
                <div>
                    <h6 class="fw-bold mb-3">Distribusi Grade</h6>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Grade A (≥85)</span>
                        <strong>18 siswa (56%)</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Grade B (70-84)</span>
                        <strong>10 siswa (31%)</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Grade C (60-69)</span>
                        <strong>4 siswa (13%)</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
const ctx = document.getElementById('gradeChart');
if (ctx) {
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['A (≥85)', 'B (70-84)', 'C (60-69)', 'D (50-59)', 'E (<50)'],
            datasets: [{
                label: 'Jumlah Siswa',
                data: [18, 10, 4, 0, 0],
                backgroundColor: [
                    'rgba(16, 185, 129, 0.8)',
                    'rgba(59, 130, 246, 0.8)',
                    'rgba(245, 158, 11, 0.8)',
                    'rgba(239, 68, 68, 0.8)',
                    'rgba(107, 114, 128, 0.8)'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
}
</script>