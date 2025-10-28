<!-- ============================================ -->
<!-- FILE: page/admin/manajemen_pelajaran.php -->
<!-- Manajemen Pelajaran dengan CRUD Lengkap -->
<!-- ============================================ -->

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-1">📚 Manajemen Pelajaran</h2>
        <p class="text-secondary">Kelola mata pelajaran dan kurikulum</p>
    </div>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahPelajaran">
        <i class="fas fa-plus me-2"></i>Tambah Mata Pelajaran
    </button>
</div>

<!-- Stats -->
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="stat-card blue">
            <div class="stat-icon blue">
                <i class="fas fa-book"></i>
            </div>
            <div class="stat-value">18</div>
            <div class="stat-label">Total Mata Pelajaran</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card green">
            <div class="stat-icon green">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-value">18</div>
            <div class="stat-label">Pelajaran Aktif</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card purple">
            <div class="stat-icon purple">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <div class="stat-value">87</div>
            <div class="stat-label">Total Pengajar</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card orange">
            <div class="stat-icon orange">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <div class="stat-value">2</div>
            <div class="stat-label">Jurusan</div>
        </div>
    </div>
</div>

<!-- Filter & Search -->
<div class="dashboard-card mb-4">
    <div class="row g-3">
        <div class="col-md-3">
            <select class="form-select" id="filterKategori">
                <option value="">Semua Kategori</option>
                <option value="wajib">Pelajaran Wajib</option>
                <option value="jurusan">Pelajaran Jurusan</option>
            </select>
        </div>
        <div class="col-md-3">
            <select class="form-select" id="filterJurusan">
                <option value="">Semua Jurusan</option>
                <option value="ipa">IPA</option>
                <option value="ips">IPS</option>
            </select>
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" id="searchPelajaran" placeholder="Cari nama atau kode mata pelajaran...">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary w-100" onclick="filterData()">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</div>

<!-- Tabs -->
<ul class="nav nav-pills mb-4">
    <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#semuaTab">Semua (18)</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#wajibTab">Pelajaran Wajib (12)</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#jurusanTab">Pelajaran Jurusan (6)</a>
    </li>
</ul>

<div class="tab-content">
    <!-- Tab Semua -->
    <div class="tab-pane fade show active" id="semuaTab">
        <div class="dashboard-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-bold mb-0">Daftar Mata Pelajaran</h5>
                <div class="d-flex gap-2">
                    <button class="btn btn-sm btn-success">
                        <i class="fas fa-file-excel me-1"></i>Export Excel
                    </button>
                    <button class="btn btn-sm btn-danger">
                        <i class="fas fa-file-pdf me-1"></i>Export PDF
                    </button>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table table-hover" id="tablePelajaran">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Mata Pelajaran</th>
                            <th>Kategori</th>
                            <th>Jurusan</th>
                            <th>Jumlah Guru</th>
                            <th class="text-center">KKM</th>
                            <th class="text-center">Jam/Minggu</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><strong>MAT</strong></td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="stat-icon blue" style="width: 32px; height: 32px; font-size: 0.875rem;">
                                        <i class="fas fa-calculator"></i>
                                    </div>
                                    <strong>Matematika</strong>
                                </div>
                            </td>
                            <td><span class="badge bg-primary">Wajib</span></td>
                            <td>-</td>
                            <td>8 Guru</td>
                            <td class="text-center"><span class="badge bg-info">75</span></td>
                            <td class="text-center">4 Jam</td>
                            <td class="text-center">
                                <span class="badge bg-success">Aktif</span>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-info me-1" title="Detail" data-bs-toggle="modal" data-bs-target="#modalDetailPelajaran">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-success me-1" title="Edit" data-bs-toggle="modal" data-bs-target="#modalEditPelajaran">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" title="Hapus" onclick="confirmDelete('Matematika')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><strong>IND</strong></td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="stat-icon green" style="width: 32px; height: 32px; font-size: 0.875rem;">
                                        <i class="fas fa-book"></i>
                                    </div>
                                    <strong>Bahasa Indonesia</strong>
                                </div>
                            </td>
                            <td><span class="badge bg-primary">Wajib</span></td>
                            <td>-</td>
                            <td>6 Guru</td>
                            <td class="text-center"><span class="badge bg-info">75</span></td>
                            <td class="text-center">4 Jam</td>
                            <td class="text-center">
                                <span class="badge bg-success">Aktif</span>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-info me-1" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-success me-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><strong>ENG</strong></td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="stat-icon purple" style="width: 32px; height: 32px; font-size: 0.875rem;">
                                        <i class="fas fa-language"></i>
                                    </div>
                                    <strong>Bahasa Inggris</strong>
                                </div>
                            </td>
                            <td><span class="badge bg-primary">Wajib</span></td>
                            <td>-</td>
                            <td>7 Guru</td>
                            <td class="text-center"><span class="badge bg-info">75</span></td>
                            <td class="text-center">3 Jam</td>
                            <td class="text-center">
                                <span class="badge bg-success">Aktif</span>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-info me-1" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-success me-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><strong>FIS</strong></td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="stat-icon blue" style="width: 32px; height: 32px; font-size: 0.875rem;">
                                        <i class="fas fa-atom"></i>
                                    </div>
                                    <strong>Fisika</strong>
                                </div>
                            </td>
                            <td><span class="badge bg-success">Jurusan</span></td>
                            <td><span class="badge bg-info">IPA</span></td>
                            <td>5 Guru</td>
                            <td class="text-center"><span class="badge bg-info">75</span></td>
                            <td class="text-center">4 Jam</td>
                            <td class="text-center">
                                <span class="badge bg-success">Aktif</span>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-info me-1" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-success me-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td><strong>KIM</strong></td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="stat-icon green" style="width: 32px; height: 32px; font-size: 0.875rem;">
                                        <i class="fas fa-flask"></i>
                                    </div>
                                    <strong>Kimia</strong>
                                </div>
                            </td>
                            <td><span class="badge bg-success">Jurusan</span></td>
                            <td><span class="badge bg-info">IPA</span></td>
                            <td>4 Guru</td>
                            <td class="text-center"><span class="badge bg-info">75</span></td>
                            <td class="text-center">4 Jam</td>
                            <td class="text-center">
                                <span class="badge bg-success">Aktif</span>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-info me-1" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-success me-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <nav class="mt-4">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled"><a class="page-link">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Tab Wajib -->
    <div class="tab-pane fade" id="wajibTab">
        <div class="dashboard-card">
            <h5 class="fw-bold mb-4">Mata Pelajaran Wajib</h5>
            <p class="text-muted">Menampilkan mata pelajaran wajib untuk semua jurusan...</p>
        </div>
    </div>

    <!-- Tab Jurusan -->
    <div class="tab-pane fade" id="jurusanTab">
        <div class="dashboard-card">
            <h5 class="fw-bold mb-4">Mata Pelajaran Jurusan</h5>
            <p class="text-muted">Menampilkan mata pelajaran khusus per jurusan...</p>
        </div>
    </div>
</div>

<!-- Modal Tambah Pelajaran -->
<div class="modal fade" id="modalTambahPelajaran" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-plus-circle text-primary me-2"></i>Tambah Mata Pelajaran Baru
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="formTambahPelajaran">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Kode Mata Pelajaran <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Contoh: MAT" required>
                            <small class="text-muted">Maksimal 5 karakter</small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Nama Mata Pelajaran <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Contoh: Matematika" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Kategori <span class="text-danger">*</span></label>
                            <select class="form-select" required>
                                <option value="">Pilih Kategori</option>
                                <option value="wajib">Pelajaran Wajib</option>
                                <option value="jurusan">Pelajaran Jurusan</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Jurusan</label>
                            <select class="form-select">
                                <option value="">Semua Jurusan</option>
                                <option value="ipa">IPA</option>
                                <option value="ips">IPS</option>
                            </select>
                            <small class="text-muted">Kosongkan jika pelajaran wajib</small>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">KKM <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" placeholder="75" min="0" max="100" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Jam Pelajaran/Minggu <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" placeholder="4" min="1" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-select" required>
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Deskripsi/Silabus</label>
                            <textarea class="form-control" rows="4" placeholder="Deskripsi singkat mata pelajaran..."></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Icon/Gambar</label>
                            <input type="file" class="form-control" accept="image/*">
                            <small class="text-muted">Format: JPG, PNG. Maksimal 2MB</small>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Batal
                </button>
                <button type="submit" form="formTambahPelajaran" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i>Simpan
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Pelajaran -->
<div class="modal fade" id="modalEditPelajaran" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-edit text-success me-2"></i>Edit Mata Pelajaran
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="formEditPelajaran">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Kode Mata Pelajaran <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="MAT" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Nama Mata Pelajaran <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="Matematika" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Kategori <span class="text-danger">*</span></label>
                            <select class="form-select" required>
                                <option value="wajib" selected>Pelajaran Wajib</option>
                                <option value="jurusan">Pelajaran Jurusan</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Jurusan</label>
                            <select class="form-select">
                                <option value="" selected>Semua Jurusan</option>
                                <option value="ipa">IPA</option>
                                <option value="ips">IPS</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">KKM <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" value="75" min="0" max="100" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Jam Pelajaran/Minggu <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" value="4" min="1" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-select" required>
                                <option value="aktif" selected>Aktif</option>
                                <option value="nonaktif">Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Deskripsi/Silabus</label>
                            <textarea class="form-control" rows="4">Mata pelajaran matematika untuk jenjang SMA...</textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Batal
                </button>
                <button type="submit" form="formEditPelajaran" class="btn btn-success">
                    <i class="fas fa-save me-1"></i>Update
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Pelajaran -->
<div class="modal fade" id="modalDetailPelajaran" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-info-circle text-info me-2"></i>Detail Mata Pelajaran
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="text-center mb-4">
                            <div class="stat-icon blue mx-auto mb-3" style="width: 80px; height: 80px; font-size: 2rem;">
                                <i class="fas fa-calculator"></i>
                            </div>
                            <h3 class="fw-bold">Matematika</h3>
                            <span class="badge bg-primary">Pelajaran Wajib</span>
                            <span class="badge bg-success">Aktif</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="dashboard-card">
                            <h6 class="fw-bold mb-3">Informasi Umum</h6>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Kode:</span>
                                <strong>MAT</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Kategori:</span>
                                <strong>Wajib</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Jurusan:</span>
                                <strong>Semua</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">KKM:</span>
                                <strong class="text-info">75</strong>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="text-muted">Jam/Minggu:</span>
                                <strong>4 Jam</strong>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="dashboard-card">
                            <h6 class="fw-bold mb-3">Statistik</h6>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Jumlah Guru:</span>
                                <strong>8 Guru</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Jumlah Kelas:</span>
                                <strong>36 Kelas</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Total Siswa:</span>
                                <strong>1,248 Siswa</strong>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="text-muted">Rata-rata Nilai:</span>
                                <strong class="text-success">84.5</strong>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="dashboard-card">
                            <h6 class="fw-bold mb-3">Deskripsi</h6>
                            <p class="text-muted mb-0">
                                Mata pelajaran Matematika adalah mata pelajaran wajib yang mempelajari tentang 
                                konsep-konsep dasar matematika, aljabar, geometri, trigonometri, kalkulus, dan statistika. 
                                Mata pelajaran ini bertujuan untuk mengembangkan kemampuan berpikir logis, analitis, 
                                sistematis, kritis, dan kreatif siswa.
                            </p>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="dashboard-card">
                            <h6 class="fw-bold mb-3">Daftar Guru Pengampu</h6>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Nama Guru</th>
                                            <th>Kelas</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Dimas Saputra, S.Pd</td>
                                            <td>XII IPA 1, XI IPA 1</td>
                                            <td><span class="badge bg-success">Aktif</span></td>
                                        </tr>
                                        <tr>
                                            <td>Budi Santoso, M.Pd</td>
                                            <td>XII IPA 2, XI IPA 2</td>
                                            <td><span class="badge bg-success">Aktif</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Tutup
                </button>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalEditPelajaran">
                    <i class="fas fa-edit me-1"></i>Edit Data
                </button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
 