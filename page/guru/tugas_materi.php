<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-1">📚 Tugas & Materi</h2>
        <p class="text-secondary">Kelola tugas dan materi pembelajaran</p>
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambahMateri">
            <i class="fas fa-file-upload me-2"></i>Upload Materi
        </button>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahTugas">
            <i class="fas fa-plus me-2"></i>Buat Tugas Baru
        </button>
    </div>
</div>

<!-- Stats Summary -->
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="stat-card blue">
            <div class="stat-icon blue">
                <i class="fas fa-tasks"></i>
            </div>
            <div class="stat-value">12</div>
            <div class="stat-label">Tugas Aktif</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card green">
            <div class="stat-icon green">
                <i class="fas fa-folder"></i>
            </div>
            <div class="stat-value">45</div>
            <div class="stat-label">Total Materi</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card orange">
            <div class="stat-icon orange">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-value">8</div>
            <div class="stat-label">Perlu Diperiksa</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card purple">
            <div class="stat-icon purple">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-value">156</div>
            <div class="stat-label">Selesai Diperiksa</div>
        </div>
    </div>
</div>

<!-- Tabs -->
<ul class="nav nav-pills mb-4">
    <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#tugasTab">Tugas (12)</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#materiTab">Materi (45)</a>
    </li>
</ul>

<div class="tab-content">
    <!-- Tab Tugas -->
    <div class="tab-pane fade show active" id="tugasTab">
        <div class="dashboard-card mb-3">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="flex-grow-1">
                    <div class="d-flex align-items-center gap-3 mb-2">
                        <h5 class="fw-bold mb-0">Laporan Praktikum - Kalkulus Integral</h5>
                        <span class="badge bg-warning">Pending Review</span>
                    </div>
                    <p class="text-muted mb-2">
                        <i class="fas fa-chalkboard me-2"></i>XII IPA 1
                        <i class="fas fa-calendar ms-3 me-2"></i>Deadline: 30 Oktober 2025
                        <i class="fas fa-users ms-3 me-2"></i>24/32 Siswa Mengumpulkan
                    </p>
                    <p class="mb-0">Buat laporan lengkap praktikum tentang aplikasi integral dalam kehidupan sehari-hari.</p>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-eye me-1"></i>Lihat
                    </button>
                    <button class="btn btn-sm btn-outline-success">
                        <i class="fas fa-check me-1"></i>Periksa
                    </button>
                    <button class="btn btn-sm btn-outline-danger">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            <div class="progress" style="height: 8px;">
                <div class="progress-bar bg-success" style="width: 100%"></div>
            </div>
            <small class="text-muted">Progress pengumpulan: 100%</small>
        </div>

        <div class="dashboard-card mb-3">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="flex-grow-1">
                    <div class="d-flex align-items-center gap-3 mb-2">
                        <h5 class="fw-bold mb-0">Essay - Matriks dan Determinan</h5>
                        <span class="badge bg-danger">Mendesak</span>
                    </div>
                    <p class="text-muted mb-2">
                        <i class="fas fa-chalkboard me-2"></i>XI IPA 2
                        <i class="fas fa-calendar ms-3 me-2"></i>Deadline: 27 Oktober 2025 (Besok!)
                        <i class="fas fa-users ms-3 me-2"></i>18/30 Siswa Mengumpulkan
                    </p>
                    <p class="mb-0">Jelaskan aplikasi matriks dalam sistem persamaan linear dengan contoh nyata.</p>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-eye me-1"></i>Lihat
                    </button>
                    <button class="btn btn-sm btn-outline-success">
                        <i class="fas fa-check me-1"></i>Periksa
                    </button>
                    <button class="btn btn-sm btn-outline-danger">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            <div class="progress" style="height: 8px;">
                <div class="progress-bar bg-warning" style="width: 60%"></div>
            </div>
            <small class="text-muted">Progress pengumpulan: 60%</small>
        </div>
    </div>

    <!-- Tab Materi -->
    <div class="tab-pane fade" id="materiTab">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="dashboard-card">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="stat-icon blue">
                            <i class="fas fa-file-pdf"></i>
                        </div>
                        <span class="badge bg-primary">PDF</span>
                    </div>
                    <h6 class="fw-bold mb-2">Modul Kalkulus Integral</h6>
                    <p class="text-muted small mb-3">
                        <i class="fas fa-chalkboard me-1"></i>XII IPA 1<br>
                        <i class="fas fa-calendar me-1"></i>20 Oktober 2025<br>
                        <i class="fas fa-download me-1"></i>28 Downloads
                    </p>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-primary flex-grow-1">
                            <i class="fas fa-eye me-1"></i>Lihat
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
                        <div class="stat-icon green" style="background: rgba(239, 68, 68, 0.1); color: #dc2626;">
                            <i class="fas fa-file-powerpoint"></i>
                        </div>
                        <span class="badge bg-danger">PPT</span>
                    </div>
                    <h6 class="fw-bold mb-2">Presentasi Trigonometri</h6>
                    <p class="text-muted small mb-3">
                        <i class="fas fa-chalkboard me-1"></i>XI IPA 1<br>
                        <i class="fas fa-calendar me-1"></i>18 Oktober 2025<br>
                        <i class="fas fa-download me-1"></i>25 Downloads
                    </p>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-primary flex-grow-1">
                            <i class="fas fa-eye me-1"></i>Lihat
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
                        <div class="stat-icon purple" style="background: rgba(239, 68, 68, 0.1); color: #dc2626;">
                            <i class="fas fa-video"></i>
                        </div>
                        <span class="badge bg-danger">Video</span>
                    </div>
                    <h6 class="fw-bold mb-2">Tutorial Matriks Interaktif</h6>
                    <p class="text-muted small mb-3">
                        <i class="fas fa-chalkboard me-1"></i>XI IPA 2<br>
                        <i class="fas fa-calendar me-1"></i>15 Oktober 2025<br>
                        <i class="fas fa-eye me-1"></i>30 Views
                    </p>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-primary flex-grow-1">
                            <i class="fas fa-play me-1"></i>Play
                        </button>
                        <button class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>