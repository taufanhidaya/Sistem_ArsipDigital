
    <!-- Page Header -->
    <div class="mb-4">
        <h2 class="mb-1">👤 Profil Saya</h2>
        <p class="text-secondary">Kelola informasi profil Anda</p>
    </div>

    <div class="row g-4">
        <!-- Profile Card -->
        <div class="col-lg-4">
            <div class="dashboard-card text-center">
                <img src="https://ui-avatars.com/api/?name=Budi+Setiawan&background=10b981&color=fff&size=150" 
                     class="rounded-circle mb-3" 
                     alt="Profile"
                     style="width: 150px; height: 150px;">
                <h4 class="fw-bold mb-1">Budi Setiawan</h4>
                <p class="text-muted mb-3">Siswa Kelas XII IPA 1</p>
                
                <div class="d-grid gap-2">
                    <button class="btn btn-primary">
                        <i class="fas fa-camera me-2"></i>Ganti Foto Profil
                    </button>
                    <button class="btn btn-outline-danger">
                        <i class="fas fa-trash me-2"></i>Hapus Foto
                    </button>
                </div>

                <hr class="my-4">

                <div class="text-start">
                    <h6 class="fw-bold mb-3">Status Akun</h6>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Status</span>
                        <span class="badge bg-success">Aktif</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Member Sejak</span>
                        <strong>Juli 2022</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Login Terakhir</span>
                        <strong>25 Okt 2025</strong>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Form -->
        <div class="col-lg-8">
            <div class="dashboard-card">
                <h5 class="card-title mb-4">Informasi Personal</h5>
                
                <form>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" value="Budi Setiawan">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">NIS</label>
                            <input type="text" class="form-control" value="20230001" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">NISN</label>
                            <input type="text" class="form-control" value="0012345678" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Jenis Kelamin</label>
                            <select class="form-select">
                                <option>Laki-laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" value="Jakarta">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" value="2007-05-15">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Agama</label>
                            <select class="form-select">
                                <option>Islam</option>
                                <option>Kristen</option>
                                <option>Katolik</option>
                                <option>Hindu</option>
                                <option>Buddha</option>
                                <option>Konghucu</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Nomor Telepon</label>
                            <input type="tel" class="form-control" value="0812-3456-7890">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" value="budi.setiawan@student.sch.id">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" rows="3">Jl. Merdeka No. 123, Jakarta Pusat, DKI Jakarta 10110</textarea>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Academic Info -->
            <div class="dashboard-card mt-4">
                <h5 class="card-title mb-4">Informasi Akademik</h5>
                
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Kelas</label>
                        <input type="text" class="form-control" value="XII IPA 1" disabled>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Tahun Ajaran</label>
                        <input type="text" class="form-control" value="2024/2025" disabled>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Semester</label>
                        <input type="text" class="form-control" value="Ganjil" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Wali Kelas</label>
                        <input type="text" class="form-control" value="Pak Ahmad Fauzi, S.Pd" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tahun Masuk</label>
                        <input type="text" class="form-control" value="2022" disabled>
                    </div>
                </div>
            </div>

            <!-- Parent Info -->
            <div class="dashboard-card mt-4">
                <h5 class="card-title mb-4">Informasi Orang Tua/Wali</h5>
                
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Ayah</label>
                        <input type="text" class="form-control" value="Bambang Suryanto">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nama Ibu</label>
                        <input type="text" class="form-control" value="Siti Nurhaliza">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Pekerjaan Ayah</label>
                        <input type="text" class="form-control" value="PNS">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Pekerjaan Ibu</label>
                        <input type="text" class="form-control" value="Ibu Rumah Tangga">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">No. Telepon Orang Tua</label>
                        <input type="tel" class="form-control" value="0813-9876-5432">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email Orang Tua</label>
                        <input type="email" class="form-control" value="bambang.s@email.com">
                    </div>
                </div>
            </div>

            <!-- Change Password -->
            <div class="dashboard-card mt-4">
                <h5 class="card-title mb-4">Ubah Password</h5>
                
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Password Lama</label>
                        <input type="password" class="form-control" placeholder="Masukkan password lama">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Password Baru</label>
                        <input type="password" class="form-control" placeholder="Masukkan password baru">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" placeholder="Konfirmasi password baru">
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex gap-3 mt-4">
                <button class="btn btn-success flex-grow-1">
                    <i class="fas fa-save me-2"></i>Simpan Perubahan
                </button>
                <button class="btn btn-outline-secondary">
                    <i class="fas fa-times me-2"></i>Batal
                </button>
            </div>
        </div>
    </div>
