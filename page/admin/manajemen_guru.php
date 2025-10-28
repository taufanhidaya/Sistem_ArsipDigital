<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-1">👨‍🏫 Manajemen Guru</h2>
        <p class="text-secondary">Kelola data guru dan tenaga pendidik</p>
    </div>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahGuru">
        <i class="fas fa-plus me-2"></i>Tambah Guru Baru
    </button>
</div>

<!-- Stats -->
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="stat-card green">
            <div class="stat-icon green">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <div class="stat-value">87</div>
            <div class="stat-label">Total Guru</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card blue">
            <div class="stat-icon blue">
                <i class="fas fa-user-check"></i>
            </div>
            <div class="stat-value">82</div>
            <div class="stat-label">Guru Aktif</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card purple">
            <div class="stat-icon purple">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-value">15</div>
            <div class="stat-label">Guru Wali Kelas</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card orange">
            <div class="stat-icon orange">
                <i class="fas fa-book"></i>
            </div>
            <div class="stat-value">18</div>
            <div class="stat-label">Mata Pelajaran</div>
        </div>
    </div>
</div>

<!-- Filter -->
<div class="dashboard-card mb-4">
    <div class="row g-3">
        <div class="col-md-3">
            <select class="form-select">
                <option>Semua Mata Pelajaran</option>
                <option>Matematika</option>
                <option>Bahasa Indonesia</option>
                <option>Bahasa Inggris</option>
                <option>Fisika</option>
                <option>Kimia</option>
            </select>
        </div>
        <div class="col-md-3">
            <select class="form-select">
                <option>Semua Status</option>
                <option>Aktif</option>
                <option>Tidak Aktif</option>
                <option>Cuti</option>
            </select>
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" placeholder="Cari nama atau NIP...">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary w-100"><i class="fas fa-search"></i></button>
        </div>
    </div>
</div>

<!-- Table -->
<div class="dashboard-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="fw-bold mb-0">Daftar Guru</h5>
        <button class="btn btn-sm btn-success">
            <i class="fas fa-file-excel me-1"></i>Export Excel
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama Lengkap</th>
                    <th>Mata Pelajaran</th>
                    <th>Email</th>
                    <th>No. Telp</th>
                    <th class="text-center">Wali Kelas</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>198501012010011001</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="https://ui-avatars.com/api/?name=Dimas+Saputra&background=10b981&color=fff" 
                                 style="width: 32px; height: 32px; border-radius: 50%;" alt="Teacher">
                            <strong>Dimas Saputra, S.Pd</strong>
                        </div>
                    </td>
                    <td>Matematika</td>
                    <td>dimas@sekolah.sch.id</td>
                    <td>0821-1234-5678</td>
                    <td class="text-center">
                        <span class="badge bg-info">XII IPA 1</span>
                    </td>
                    <td class="text-center">
                        <span class="badge bg-success">Aktif</span>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-outline-primary me-1">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-success me-1">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>199003152015032002</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="https://ui-avatars.com/api/?name=Linda+Permata&background=8b5cf6&color=fff" 
                                 style="width: 32px; height: 32px; border-radius: 50%;" alt="Teacher">
                            <strong>Linda Permata, S.Pd</strong>
                        </div>
                    </td>
                    <td>Bahasa Inggris</td>
                    <td>linda@sekolah.sch.id</td>
                    <td>0822-9876-5432</td>
                    <td class="text-center">
                        <span class="badge bg-secondary">-</span>
                    </td>
                    <td class="text-center">
                        <span class="badge bg-success">Aktif</span>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-outline-primary me-1">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-success me-1">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <nav class="mt-4">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled"><a class="page-link">Previous</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>
</div>