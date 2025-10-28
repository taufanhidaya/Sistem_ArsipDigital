<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-1">🛡️ Manajemen Admin</h2>
        <p class="text-secondary">Kelola akun administrator sistem</p>
    </div>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahAdmin">
        <i class="fas fa-plus me-2"></i>Tambah Admin Baru
    </button>
</div>

<!-- Stats -->
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="stat-card blue">
            <div class="stat-icon blue">
                <i class="fas fa-user-shield"></i>
            </div>
            <div class="stat-value">5</div>
            <div class="stat-label">Total Admin</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card green">
            <div class="stat-icon green">
                <i class="fas fa-user-check"></i>
            </div>
            <div class="stat-value">4</div>
            <div class="stat-label">Admin Aktif</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card purple">
            <div class="stat-icon purple">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-value">2</div>
            <div class="stat-label">Online Sekarang</div>
        </div>
    </div>
</div>

<!-- Table -->
<div class="dashboard-card">
    <h5 class="fw-bold mb-4">Daftar Administrator</h5>
    
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Level Akses</th>
                    <th class="text-center">Login Terakhir</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><strong>superadmin</strong></td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="https://ui-avatars.com/api/?name=Super+Admin&background=ef4444&color=fff" 
                                 style="width: 32px; height: 32px; border-radius: 50%;" alt="Admin">
                            <strong>Super Admin</strong>
                        </div>
                    </td>
                    <td>superadmin@sekolah.sch.id</td>
                    <td><span class="badge bg-danger">Super Admin</span></td>
                    <td class="text-center">26 Okt 2025, 07:15</td>
                    <td class="text-center">
                        <span class="badge bg-success">Online</span>
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
</div>

<!-- Activity Log -->
<div class="dashboard-card mt-4">
    <h5 class="fw-bold mb-4">Log Aktivitas Admin</h5>
    
    <div class="d-flex flex-column gap-3">
        <div class="d-flex align-items-center gap-3 p-3" style="background: var(--bg-secondary); border-radius: 0.75rem;">
            <div class="stat-card-icon icon-green" style="width: 40px; height: 40px; font-size: 1rem;">
                <i class="fas fa-sign-in-alt"></i>
            </div>
            <div class="flex-grow-1">
                <strong>Super Admin</strong> login ke sistem
                <p class="text-muted mb-0 small">26 Oktober 2025, 08:30 WIB</p>
            </div>
        </div>
        
        <div class="d-flex align-items-center gap-3 p-3" style="background: var(--bg-secondary); border-radius: 0.75rem;">
            <div class="stat-card-icon icon-blue" style="width: 40px; height: 40px; font-size: 1rem;">
                <i class="fas fa-user-plus"></i>
            </div>
            <div class="flex-grow-1">
                <strong>Ahmad Fauzi</strong> menambahkan siswa baru
                <p class="text-muted mb-0 small">26 Oktober 2025, 07:20 WIB</p>
            </div>
        </div>
        
        <div class="d-flex align-items-center gap-3 p-3" style="background: var(--bg-secondary); border-radius: 0.75rem;">
            <div class="stat-card-icon icon-purple" style="width: 40px; height: 40px; font-size: 1rem;">
                <i class="fas fa-edit"></i>
            </div>
            <div class="flex-grow-1">
                <strong>Ahmad Fauzi</strong> mengubah data guru
                <p class="text-muted mb-0 small">25 Oktober 2025, 16:45 WIB</p>
            </div>
        </div>
    </div>
</div>