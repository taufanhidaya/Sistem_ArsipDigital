<div class="mb-4">
    <h2 class="mb-1">👨‍🎓 Data Siswa</h2>
    <p class="text-secondary">Kelola dan lihat data siswa yang Anda ajar</p>
</div>

<!-- Filter Section -->
<div class="dashboard-card mb-4">
    <div class="row g-3">
        <div class="col-md-3">
            <label class="form-label">Kelas</label>
            <select class="form-select">
                <option>Semua Kelas</option>
                <option>XII IPA 1</option>
                <option>XII IPA 2</option>
                <option>XI IPA 1</option>
                <option>XI IPA 2</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">Status</label>
            <select class="form-select">
                <option>Semua Status</option>
                <option>Aktif</option>
                <option>Tidak Aktif</option>
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label">Cari Siswa</label>
            <input type="text" class="form-control" placeholder="Nama atau NIS...">
        </div>
        <div class="col-md-2">
            <label class="form-label">&nbsp;</label>
            <button class="btn btn-primary w-100">
                <i class="fas fa-search me-2"></i>Cari
            </button>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="stat-card blue">
            <div class="stat-icon blue">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-value">180</div>
            <div class="stat-label">Total Siswa</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card green">
            <div class="stat-icon green">
                <i class="fas fa-user-check"></i>
            </div>
            <div class="stat-value">165</div>
            <div class="stat-label">Hadir Hari Ini</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card orange">
            <div class="stat-icon orange">
                <i class="fas fa-user-times"></i>
            </div>
            <div class="stat-value">15</div>
            <div class="stat-label">Tidak Hadir</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card purple">
            <div class="stat-icon purple">
                <i class="fas fa-star"></i>
            </div>
            <div class="stat-value">85.5</div>
            <div class="stat-label">Rata-rata Nilai</div>
        </div>
    </div>
</div>

<!-- Student Table -->
<div class="dashboard-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="fw-bold mb-0">Daftar Siswa - XII IPA 1</h5>
        <button class="btn btn-sm btn-success">
            <i class="fas fa-file-export me-2"></i>Export Excel
        </button>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Email</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Rata-rata</th>
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
                    <td>XII IPA 1</td>
                    <td>budi.setiawan@student.sch.id</td>
                    <td class="text-center">
                        <span class="badge bg-success">Aktif</span>
                    </td>
                    <td class="text-center"><strong>88.5</strong></td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-outline-primary me-1">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-success">
                            <i class="fas fa-edit"></i>
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
                    <td>XII IPA 1</td>
                    <td>siti.nurhaliza@student.sch.id</td>
                    <td class="text-center">
                        <span class="badge bg-success">Aktif</span>
                    </td>
                    <td class="text-center"><strong>92.0</strong></td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-outline-primary me-1">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-success">
                            <i class="fas fa-edit"></i>
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
                    <td>XII IPA 1</td>
                    <td>ahmad.rifai@student.sch.id</td>
                    <td class="text-center">
                        <span class="badge bg-success">Aktif</span>
                    </td>
                    <td class="text-center"><strong>85.5</strong></td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-outline-primary me-1">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-success">
                            <i class="fas fa-edit"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>20230004</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="https://ui-avatars.com/api/?name=Dewi+Lestari&background=f59e0b&color=fff" 
                                 style="width: 32px; height: 32px; border-radius: 50%;" alt="Student">
                            <strong>Dewi Lestari</strong>
                        </div>
                    </td>
                    <td>XII IPA 1</td>
                    <td>dewi.lestari@student.sch.id</td>
                    <td class="text-center">
                        <span class="badge bg-success">Aktif</span>
                    </td>
                    <td class="text-center"><strong>90.0</strong></td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-outline-primary me-1">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-success">
                            <i class="fas fa-edit"></i>
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
                <a class="page-link">Previous</a>
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