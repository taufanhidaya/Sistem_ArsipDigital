
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">🕐 Riwayat Tugas</h2>
            <p class="text-secondary">Lihat semua tugas yang telah dikerjakan</p>
        </div>
        <button class="btn btn-success">
            <i class="fas fa-download me-2"></i>Export PDF
        </button>
    </div>

    <!-- Filter Section -->
    <div class="dashboard-card mb-4">
        <div class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Periode</label>
                <select class="form-select">
                    <option>Semester Ganjil 2024/2025</option>
                    <option>Semester Genap 2023/2024</option>
                    <option>Semester Ganjil 2023/2024</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Mata Pelajaran</label>
                <select class="form-select">
                    <option>Semua</option>
                    <option>Matematika</option>
                    <option>Fisika</option>
                    <option>Kimia</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Status</label>
                <select class="form-select">
                    <option>Semua Status</option>
                    <option>Tepat Waktu</option>
                    <option>Terlambat</option>
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

    <!-- Stats -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="stat-card green">
                <div class="stat-icon green">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-value">24</div>
                <div class="stat-label">Total Selesai</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card blue">
                <div class="stat-icon blue">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-value">22</div>
                <div class="stat-label">Tepat Waktu</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card orange">
                <div class="stat-icon orange">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="stat-value">2</div>
                <div class="stat-label">Terlambat</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card purple">
                <div class="stat-icon purple">
                    <i class="fas fa-star"></i>
                </div>
                <div class="stat-value">86.5</div>
                <div class="stat-label">Rata-rata Nilai</div>
            </div>
        </div>
    </div>

    <!-- History Table -->
    <div class="dashboard-card">
        <h5 class="card-title mb-4">Daftar Tugas yang Telah Dikerjakan</h5>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Judul Tugas</th>
                        <th>Mata Pelajaran</th>
                        <th>Guru</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Nilai</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>20 Okt 2025</td>
                        <td>Quiz Trigonometri</td>
                        <td><i class="fas fa-calculator text-primary me-2"></i>Matematika</td>
                        <td>Pak Budi Santoso</td>
                        <td class="text-center">
                            <span class="badge bg-success">Tepat Waktu</span>
                        </td>
                        <td class="text-center"><strong class="text-success">92</strong></td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>18 Okt 2025</td>
                        <td>Essay Teks Persuasif</td>
                        <td><i class="fas fa-language text-purple me-2"></i>B. Inggris</td>
                        <td>Mrs. Linda</td>
                        <td class="text-center">
                            <span class="badge bg-success">Tepat Waktu</span>
                        </td>
                        <td class="text-center"><strong class="text-success">88</strong></td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>15 Okt 2025</td>
                        <td>Laporan Praktikum Gerak Parabola</td>
                        <td><i class="fas fa-atom text-info me-2"></i>Fisika</td>
                        <td>Pak Joko</td>
                        <td class="text-center">
                            <span class="badge bg-warning">Terlambat 1 hari</span>
                        </td>
                        <td class="text-center"><strong class="text-warning">75</strong></td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>12 Okt 2025</td>
                        <td>Soal Reaksi Redoks</td>
                        <td><i class="fas fa-flask text-danger me-2"></i>Kimia</td>
                        <td>Dr. Sari</td>
                        <td class="text-center">
                            <span class="badge bg-success">Tepat Waktu</span>
                        </td>
                        <td class="text-center"><strong class="text-success">90</strong></td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <nav class="mt-4">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
