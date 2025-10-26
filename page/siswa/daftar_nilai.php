
    <!-- Page Header -->
    <div class="mb-4">
        <h2 class="mb-1">📊 Daftar Nilai</h2>
        <p class="text-secondary">Lihat perkembangan akademik Anda</p>
    </div>

    <!-- Summary Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="stat-card purple">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Rata-rata Keseluruhan</div>
                        <div class="stat-value">85.5</div>
                        <small class="text-success"><i class="fas fa-arrow-up"></i> +2.3 dari semester lalu</small>
                    </div>
                    <div class="stat-icon purple">
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card green">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Peringkat Kelas</div>
                        <div class="stat-value">3</div>
                        <small class="text-muted">dari 36 siswa</small>
                    </div>
                    <div class="stat-icon green">
                        <i class="fas fa-trophy"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card blue">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Mata Pelajaran</div>
                        <div class="stat-value">12</div>
                        <small class="text-muted">Semester Ganjil 2024/2025</small>
                    </div>
                    <div class="stat-icon blue">
                        <i class="fas fa-book"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart -->
    <div class="row g-4 mb-4">
        <div class="col-lg-8">
            <div class="dashboard-card">
                <h5 class="card-title">Grafik Perkembangan Nilai</h5>
                <canvas id="gradesChart" style="max-height: 300px;"></canvas>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="dashboard-card">
                <h5 class="card-title">Nilai Tertinggi</h5>
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong>Matematika</strong>
                            <p class="text-muted mb-0 small">UTS Semester 1</p>
                        </div>
                        <span class="badge bg-success">95</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong>Fisika</strong>
                            <p class="text-muted mb-0 small">Praktikum</p>
                        </div>
                        <span class="badge bg-success">92</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong>Kimia</strong>
                            <p class="text-muted mb-0 small">Quiz 3</p>
                        </div>
                        <span class="badge bg-success">90</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Nilai per Mata Pelajaran -->
    <div class="dashboard-card">
        <h5 class="card-title">Nilai per Mata Pelajaran</h5>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Mata Pelajaran</th>
                        <th>Guru Pengampu</th>
                        <th class="text-center">UTS</th>
                        <th class="text-center">UAS</th>
                        <th class="text-center">Tugas</th>
                        <th class="text-center">Rata-rata</th>
                        <th class="text-center">Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><i class="fas fa-calculator text-primary me-2"></i>Matematika</td>
                        <td>Pak Budi Santoso</td>
                        <td class="text-center">88</td>
                        <td class="text-center">90</td>
                        <td class="text-center">85</td>
                        <td class="text-center"><strong>87.7</strong></td>
                        <td class="text-center"><span class="badge bg-success">A</span></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-flask text-danger me-2"></i>Kimia</td>
                        <td>Dr. Sari Wulandari</td>
                        <td class="text-center">85</td>
                        <td class="text-center">88</td>
                        <td class="text-center">90</td>
                        <td class="text-center"><strong>87.7</strong></td>
                        <td class="text-center"><span class="badge bg-success">A</span></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-atom text-info me-2"></i>Fisika</td>
                        <td>Pak Joko Widodo</td>
                        <td class="text-center">82</td>
                        <td class="text-center">85</td>
                        <td class="text-center">88</td>
                        <td class="text-center"><strong>85.0</strong></td>
                        <td class="text-center"><span class="badge bg-success">A</span></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-language text-purple me-2"></i>Bahasa Inggris</td>
                        <td>Mrs. Linda Permata</td>
                        <td class="text-center">90</td>
                        <td class="text-center">88</td>
                        <td class="text-center">92</td>
                        <td class="text-center"><strong>90.0</strong></td>
                        <td class="text-center"><span class="badge bg-success">A</span></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-book text-warning me-2"></i>Bahasa Indonesia</td>
                        <td>Bu Dewi Sartika</td>
                        <td class="text-center">86</td>
                        <td class="text-center">84</td>
                        <td class="text-center">88</td>
                        <td class="text-center"><strong>86.0</strong></td>
                        <td class="text-center"><span class="badge bg-success">A</span></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-chart-line text-success me-2"></i>Ekonomi</td>
                        <td>Bu Ani Rahmawati</td>
                        <td class="text-center">80</td>
                        <td class="text-center">82</td>
                        <td class="text-center">85</td>
                        <td class="text-center"><strong>82.3</strong></td>
                        <td class="text-center"><span class="badge bg-primary">B+</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
