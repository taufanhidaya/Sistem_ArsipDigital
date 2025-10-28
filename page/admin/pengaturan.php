<div class="mb-4">
    <h2 class="mb-1">⚙️ Pengaturan</h2>
    <p class="text-secondary">Konfigurasi sistem dan pengaturan aplikasi</p>
</div>

<!-- Tabs -->
<ul class="nav nav-pills mb-4">
    <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#umumTab">Umum</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#sekolahTab">Profil Sekolah</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#sistemTab">Sistem</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#backupTab">Backup & Restore</a>
    </li>
</ul>

<div class="tab-content">
    <!-- Tab Umum -->
    <div class="tab-pane fade show active" id="umumTab">
        <div class="dashboard-card">
            <h5 class="fw-bold mb-4">Pengaturan Umum</h5>
            
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama Aplikasi</label>
                    <input type="text" class="form-control" value="E-ARSIP">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tahun Ajaran Aktif</label>
                    <select class="form-select">
                        <option>2024/2025</option>
                        <option>2025/2026</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Semester</label>
                    <select class="form-select">
                        <option>Ganjil</option>
                        <option>Genap</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Zona Waktu</label>
                    <select class="form-select">
                        <option>Asia/Jakarta (WIB)</option>
                        <option>Asia/Makassar (WITA)</option>
                        <option>Asia/Jayapura (WIT)</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Bahasa</label>
                    <select class="form-select">
                        <option>Indonesia</option>
                        <option>English</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Format Tanggal</label>
                    <select class="form-select">
                        <option>DD/MM/YYYY</option>
                        <option>MM/DD/YYYY</option>
                        <option>YYYY-MM-DD</option>
                    </select>
                </div>
            </div>

            <hr class="my-4">

            <h6 class="fw-bold mb-3">Notifikasi</h6>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="emailNotif" checked>
                <label class="form-check-label" for="emailNotif">
                    <strong>Notifikasi Email</strong><br>
                    <small class="text-muted">Kirim notifikasi penting via email</small>
                </label>
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="smsNotif">
                <label class="form-check-label" for="smsNotif">
                    <strong>Notifikasi SMS</strong><br>
                    <small class="text-muted">Kirim notifikasi via SMS</small>
                </label>
            </div>

            <div class="mt-4">
                <button class="btn btn-success">
                    <i class="fas fa-save me-2"></i>Simpan Perubahan
                </button>
            </div>
        </div>
    </div>

    <!-- Tab Profil Sekolah -->
    <div class="tab-pane fade" id="sekolahTab">
        <div class="dashboard-card">
            <h5 class="fw-bold mb-4">Profil Sekolah</h5>
            
            <div class="text-center mb-4">
                <img src="https://ui-avatars.com/api/?name=SMK&background=10b981&color=fff&size=150" 
                     class="rounded mb-3" 
                     style="width: 150px; height: 150px;" 
                     alt="Logo">
                <br>
                <button class="btn btn-sm btn-primary">
                    <i class="fas fa-upload me-1"></i>Upload Logo
                </button>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama Sekolah</label>
                    <input type="text" class="form-control" value="SMK Negeri 1 Kota">
                </div>
                <div class="col-md-6">
                    <label class="form-label">NPSN</label>
                    <input type="text" class="form-control" value="12345678">
                </div>
                <div class="col-12">
                    <label class="form-label">Alamat</label>
                    <textarea class="form-control" rows="3">Jl. Pendidikan No. 123, Kota, Provinsi</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" value="info@sekolah.sch.id">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Telepon</label>
                    <input type="text" class="form-control" value="(0123) 456789">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Kepala Sekolah</label>
                    <input type="text" class="form-control" value="Dr. Bambang Suryanto, M.Pd">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Akreditasi</label>
                    <select class="form-select">
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                    </select>
                </div>
            </div>

            <div class="mt-4">
                <button class="btn btn-success">
                    <i class="fas fa-save me-2"></i>Simpan Perubahan
                </button>
            </div>
        </div>
    </div>

    <!-- Tab Sistem -->
    <div class="tab-pane fade" id="sistemTab">
        <div class="dashboard-card">
            <h5 class="fw-bold mb-4">Pengaturan Sistem</h5>
            
            <h6 class="fw-bold mb-3">Keamanan</h6>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="2fa" checked>
                <label class="form-check-label" for="2fa">
                    <strong>Two-Factor Authentication</strong><br>
                    <small class="text-muted">Aktifkan autentikasi dua faktor untuk keamanan tambahan</small>
                </label>
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="forceSSL" checked>
                <label class="form-check-label" for="forceSSL">
                    <strong>Force HTTPS</strong><br>
                    <small class="text-muted">Paksa penggunaan koneksi HTTPS</small>
                </label>
            </div>

            <hr class="my-4">

            <h6 class="fw-bold mb-3">Upload File</h6>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Maksimal Ukuran File</label>
                    <select class="form-select">
                        <option>5 MB</option>
                        <option>10 MB</option>
                        <option>20 MB</option>
                        <option>50 MB</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tipe File yang Diizinkan</label>
                    <input type="text" class="form-control" value="pdf, doc, docx, xls, xlsx, jpg, png">
                </div>
            </div>

            <hr class="my-4">

            <h6 class="fw-bold mb-3">Maintenance Mode</h6>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="maintenance">
                <label class="form-check-label" for="maintenance">
                    <strong>Aktifkan Maintenance Mode</strong><br>
                    <small class="text-muted">Nonaktifkan akses sementara untuk pemeliharaan sistem</small>
                </label>
            </div>

            <div class="mt-4">
                <button class="btn btn-success">
                    <i class="fas fa-save me-2"></i>Simpan Perubahan
                </button>
            </div>
        </div>
    </div>

    <!-- Tab Backup -->
    <div class="tab-pane fade" id="backupTab">
        <div class="dashboard-card">
            <h5 class="fw-bold mb-4">Backup & Restore</h5>
            
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i>
                <strong>Backup Terakhir:</strong> 26 Oktober 2025, 00:00 WIB
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <button class="btn btn-primary w-100 py-3">
                        <i class="fas fa-download d-block mb-2" style="font-size: 2rem;"></i>
                        <strong>Backup Database</strong>
                        <p class="mb-0 small">Download backup database lengkap</p>
                    </button>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-success w-100 py-3">
                        <i class="fas fa-file-archive d-block mb-2" style="font-size: 2rem;"></i>
                        <strong>Backup File & Database</strong>
                        <p class="mb-0 small">Download backup lengkap dengan file</p>
                    </button>
                </div>
            </div>

            <hr class="my-4">

            <h6 class="fw-bold mb-3">Restore Database</h6>
            <div class="mb-3">
                <input type="file" class="form-control" accept=".sql">
                <small class="text-muted">Upload file backup (.sql) untuk restore database</small>
            </div>
            <button class="btn btn-warning">
                <i class="fas fa-upload me-2"></i>Restore Database
            </button>

            <hr class="my-4">

            <h6 class="fw-bold mb-3">Riwayat Backup</h6>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Jenis</th>
                            <th>Ukuran</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>26 Okt 2025, 00:00</td>
                            <td>Database + Files</td>
                            <td>125 MB</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>25 Okt 2025, 00:00</td>
                            <td>Database Only</td>
                            <td>8.5 MB</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>