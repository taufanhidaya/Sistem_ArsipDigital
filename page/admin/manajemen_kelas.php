<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-1">🏫 Manajemen Kelas</h2>
        <p class="text-secondary">Kelola kelas dan pembagian siswa</p>
    </div>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahKelas">
        <i class="fas fa-plus me-2"></i>Tambah Kelas Baru
    </button>
</div>

<!-- Stats -->
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="stat-card orange">
            <div class="stat-icon orange">
                <i class="fas fa-door-open"></i>
            </div>
            <div class="stat-value">36</div>
            <div class="stat-label">Total Kelas</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card blue">
            <div class="stat-icon blue">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-value">1,248</div>
            <div class="stat-label">Total Siswa</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card green">
            <div class="stat-icon green">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <div class="stat-value">36</div>
            <div class="stat-label">Wali Kelas</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card purple">
            <div class="stat-icon purple">
                <i class="fas fa-chart-line"></i>
            </div>
            <div class="stat-value">34.6</div>
            <div class="stat-label">Rata-rata Siswa/Kelas</div>
        </div>
    </div>
</div>

<!-- Filter -->
<div class="dashboard-card mb-4">
    <div class="row g-3">
        <div class="col-md-4">
            <select class="form-select">
                <option>Semua Tingkat</option>
                <option>Kelas X</option>
                <option>Kelas XI</option>
                <option>Kelas XII</option>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-select">
                <option>Semua Jurusan</option>
                <option>IPA</option>
                <option>IPS</option>
            </select>
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" placeholder="Cari nama kelas...">
        </div>
    </div>
</div>

<!-- Kelas Grid -->
<div class="row g-4">
    <div class="col-lg-4 col-md-6">
        <div class="dashboard-card">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <h4 class="fw-bold text-primary mb-1">XII IPA 1</h4>
                    <p class="text-muted mb-0">Tahun Ajaran 2024/2025</p>
                </div>
                <span class="badge bg-success">Aktif</span>
            </div>
            
            <div class="mb-3">
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Wali Kelas:</span>
                    <strong>Linda Permata, S.Pd</strong>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Jumlah Siswa:</span>
                    <strong>30 Siswa</strong>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="text-muted">Ruang Kelas:</span>
                    <strong>Ruang 202</strong>
                </div>
            </div>

            <hr>

            <div class="d-flex gap-2">
                <button class="btn btn-sm btn-primary flex-grow-1">
                    <i class="fas fa-eye me-1"></i>Detail
                </button>
                <button class="btn btn-sm btn-outline-success">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-outline-danger">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="dashboard-card">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <h4 class="fw-bold text-purple mb-1">XI IPA 1</h4>
                    <p class="text-muted mb-0">Tahun Ajaran 2024/2025</p>
                </div>
                <span class="badge bg-success">Aktif</span>
            </div>
            
            <div class="mb-3">
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Wali Kelas:</span>
                    <strong>Budi Santoso, M.Pd</strong>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Jumlah Siswa:</span>
                    <strong>28 Siswa</strong>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="text-muted">Ruang Kelas:</span>
                    <strong>Ruang 203</strong>
                </div>
            </div>

            <hr>

            <div class="d-flex gap-2">
                <button class="btn btn-sm btn-primary flex-grow-1">
                    <i class="fas fa-eye me-1"></i>Detail
                </button>
                <button class="btn btn-sm btn-outline-success">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-outline-danger">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Pagination -->
<nav class="mt-5">
    <ul class="pagination justify-content-center">
        <li class="page-item disabled"><a class="page-link">Previous</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
</nav>