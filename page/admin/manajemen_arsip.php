<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-1">📁 Manajemen Arsip</h2>
        <p class="text-secondary">Kelola semua arsip dan dokumen sekolah</p>
    </div>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalUploadArsip">
        <i class="fas fa-upload me-2"></i>Upload Arsip Baru
    </button>
</div>

<!-- Stats -->
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="stat-card purple">
            <div class="stat-icon purple">
                <i class="fas fa-archive"></i>
            </div>
            <div class="stat-value">3,456</div>
            <div class="stat-label">Total Arsip</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card orange">
            <div class="stat-icon orange">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-value">23</div>
            <div class="stat-label">Pending Verifikasi</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card green">
            <div class="stat-icon green">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-value">3,433</div>
            <div class="stat-label">Terverifikasi</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card blue">
            <div class="stat-icon blue">
                <i class="fas fa-database"></i>
            </div>
            <div class="stat-value">8.4 GB</div>
            <div class="stat-label">Total Ukuran</div>
        </div>
    </div>
</div>

<!-- Filter -->
<div class="dashboard-card mb-4">
    <div class="row g-3">
        <div class="col-md-3">
            <select class="form-select">
                <option>Semua Kategori</option>
                <option>Rapor Siswa</option>
                <option>Surat Keterangan</option>
                <option>Dokumen Guru</option>
                <option>Administrasi</option>
            </select>
        </div>
        <div class="col-md-3">
            <select class="form-select">
                <option>Semua Status</option>
                <option>Pending</option>
                <option>Terverifikasi</option>
                <option>Ditolak</option>
            </select>
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" placeholder="Cari arsip...">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary w-100"><i class="fas fa-search"></i></button>
        </div>
    </div>
</div>

<!-- Grid Arsip -->
<div class="row g-4">
    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="dashboard-card">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="stat-icon blue" style="width: 48px; height: 48px;">
                    <i class="fas fa-file-pdf"></i>
                </div>
                <span class="badge bg-warning">Pending</span>
            </div>
            <h6 class="fw-bold mb-2">Rapor Semester Ganjil</h6>
            <p class="text-muted small mb-3">
                <i class="fas fa-folder me-1"></i>Rapor Siswa<br>
                <i class="fas fa-calendar me-1"></i>26 Okt 2025<br>
                <i class="fas fa-hdd me-1"></i>2.5 MB
            </p>
            <div class="d-flex gap-2">
                <button class="btn btn-sm btn-success flex-grow-1">
                    <i class="fas fa-check"></i> Verifikasi
                </button>
                <button class="btn btn-sm btn-outline-danger">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="dashboard-card">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="stat-icon green" style="width: 48px; height: 48px;">
                    <i class="fas fa-file-word"></i>
                </div>
                <span class="badge bg-success">Terverifikasi</span>
            </div>
            <h6 class="fw-bold mb-2">Surat Keterangan Aktif</h6>
            <p class="text-muted small mb-3">
                <i class="fas fa-folder me-1"></i>Surat Keterangan<br>
                <i class="fas fa-calendar me-1"></i>25 Okt 2025<br>
                <i class="fas fa-hdd me-1"></i>1.2 MB
            </p>
            <div class="d-flex gap-2">
                <button class="btn btn-sm btn-primary flex-grow-1">
                    <i class="fas fa-download"></i> Download
                </button>
                <button class="btn btn-sm btn-outline-danger">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="dashboard-card">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="stat-icon purple" style="width: 48px; height: 48px;">
                    <i class="fas fa-file-excel"></i>
                </div>
                <span class="badge bg-success">Terverifikasi</span>
            </div>
            <h6 class="fw-bold mb-2">Daftar Nilai UTS</h6>
            <p class="text-muted small mb-3">
                <i class="fas fa-folder me-1"></i>Dokumen Guru<br>
                <i class="fas fa-calendar me-1"></i>20 Okt 2025<br>
                <i class="fas fa-hdd me-1"></i>856 KB
            </p>
            <div class="d-flex gap-2">
                <button class="btn btn-sm btn-primary flex-grow-1">
                    <i class="fas fa-download"></i> Download
                </button>
                <button class="btn btn-sm btn-outline-danger">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="dashboard-card">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="stat-icon orange" style="width: 48px; height: 48px;">
                    <i class="fas fa-file-archive"></i>
                </div>
                <span class="badge bg-success">Terverifikasi</span>
            </div>
            <h6 class="fw-bold mb-2">Arsip Administrasi 2024</h6>
            <p class="text-muted small mb-3">
                <i class="fas fa-folder me-1"></i>Administrasi<br>
                <i class="fas fa-calendar me-1"></i>15 Okt 2025<br>
                <i class="fas fa-hdd me-1"></i>15.2 MB
            </p>
            <div class="d-flex gap-2">
                <button class="btn btn-sm btn-primary flex-grow-1">
                    <i class="fas fa-download"></i> Download
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