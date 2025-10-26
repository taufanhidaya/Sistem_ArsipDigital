============================================
<!-- FILE: page/siswa/dashboard_content.php -->
<!-- Konten Default untuk Dashboard -->
<!-- ============================================ -->

<!-- Welcome Card -->
<div class="welcome-card">
    <h2>👋 Selamat Datang, Budi Setiawan!</h2>
    <p>Semangat belajar hari ini! Jangan lupa kerjakan tugas-tugas yang belum selesai.</p>
    <div class="student-info">
        <i class="fas fa-id-card"></i>
        <span>NIS: 20230001 | Kelas: XII IPA 1</span>
    </div>
</div>

<!-- Stats Grid -->
<div class="stats-grid">
    <div class="stat-card blue">
        <div class="stat-card-header">
            <div class="stat-icon blue">
                <i class="fas fa-tasks"></i>
            </div>
        </div>
        <div class="stat-value">8</div>
        <div class="stat-label">Tugas Aktif</div>
    </div>

    <div class="stat-card green">
        <div class="stat-card-header">
            <div class="stat-icon green">
                <i class="fas fa-check-circle"></i>
            </div>
        </div>
        <div class="stat-value">24</div>
        <div class="stat-label">Tugas Selesai</div>
    </div>

    <div class="stat-card purple">
        <div class="stat-card-header">
            <div class="stat-icon purple">
                <i class="fas fa-chart-line"></i>
            </div>
        </div>
        <div class="stat-value">85.5</div>
        <div class="stat-label">Rata-rata Nilai</div>
    </div>

    <div class="stat-card orange">
        <div class="stat-card-header">
            <div class="stat-icon orange">
                <i class="fas fa-folder"></i>
            </div>
        </div>
        <div class="stat-value">45</div>
        <div class="stat-label">Materi Tersimpan</div>
    </div>
</div>

<!-- Tasks Section -->
<h3 class="section-title">📝 Tugas Terbaru</h3>
<div class="task-list">
    <!-- Task 1 - Urgent -->
    <div class="task-card urgent">
        <div class="task-header">
            <div>
                <div class="task-title">Laporan Praktikum Kimia - Titrasi Asam Basa</div>
                <div class="task-subject">Kimia</div>
            </div>
            <span class="task-badge badge-urgent">Mendesak</span>
        </div>
        <div class="task-meta">
            <span><i class="far fa-calendar"></i>Deadline: 26 Okt 2025</span>
            <span><i class="far fa-clock"></i>Sisa 1 hari</span>
        </div>
        <div class="task-description">
            Buat laporan lengkap praktikum titrasi asam basa yang telah dilakukan minggu lalu. Include data pengamatan, perhitungan, dan kesimpulan.
        </div>
        <div class="task-footer">
            <div class="teacher-info">
                <img src="https://ui-avatars.com/api/?name=Dr+Sari&background=ef4444&color=fff" class="teacher-avatar" alt="Teacher">
                <span class="teacher-name">Dr. Sari Wulandari</span>
            </div>
            <button class="task-action">Kerjakan Sekarang</button>
        </div>
    </div>

    <!-- Task 2 - Pending -->
    <div class="task-card">
        <div class="task-header">
            <div>
                <div class="task-title">Essay: Analisis Teks Drama "Hamlet"</div>
                <div class="task-subject">Bahasa Inggris</div>
            </div>
            <span class="task-badge badge-pending">Dalam Progress</span>
        </div>
        <div class="task-meta">
            <span><i class="far fa-calendar"></i>Deadline: 30 Okt 2025</span>
            <span><i class="far fa-clock"></i>Sisa 5 hari</span>
        </div>
        <div class="task-description">
            Tulis essay 500-700 kata menganalisis karakter utama dan tema dalam drama "Hamlet" karya Shakespeare.
        </div>
        <div class="task-footer">
            <div class="teacher-info">
                <img src="https://ui-avatars.com/api/?name=Mrs+Linda&background=8b5cf6&color=fff" class="teacher-avatar" alt="Teacher">
                <span class="teacher-name">Mrs. Linda Permata</span>
            </div>
            <button class="task-action">Lanjutkan</button>
        </div>
    </div>

    <!-- Task 3 -->
    <div class="task-card">
        <div class="task-header">
            <div>
                <div class="task-title">Soal Latihan: Integral Tentu dan Tak Tentu</div>
                <div class="task-subject">Matematika</div>
            </div>
            <span class="task-badge badge-pending">Belum Dikerjakan</span>
        </div>
        <div class="task-meta">
            <span><i class="far fa-calendar"></i>Deadline: 2 Nov 2025</span>
            <span><i class="far fa-clock"></i>Sisa 8 hari</span>
        </div>
        <div class="task-description">
            Kerjakan 15 soal latihan integral dari buku paket halaman 45-47. Upload jawaban dalam format PDF.
        </div>
        <div class="task-footer">
            <div class="teacher-info">
                <img src="https://ui-avatars.com/api/?name=Pak+Budi&background=3b82f6&color=fff" class="teacher-avatar" alt="Teacher">
                <span class="teacher-name">Pak Budi Santoso, M.Pd</span>
            </div>
            <button class="task-action">Mulai Mengerjakan</button>
        </div>
    </div>

    <!-- Task 4 -->
    <div class="task-card">
        <div class="task-header">
            <div>
                <div class="task-title">Presentasi Kelompok: Sistem Ekonomi Indonesia</div>
                <div class="task-subject">Ekonomi</div>
            </div>
            <span class="task-badge badge-pending">Belum Dikerjakan</span>
        </div>
        <div class="task-meta">
            <span><i class="far fa-calendar"></i>Deadline: 5 Nov 2025</span>
            <span><i class="far fa-clock"></i>Sisa 11 hari</span>
        </div>
        <div class="task-description">
            Buat slide presentasi kelompok tentang sistem ekonomi Indonesia. Maksimal 15 slide, presentasi 10-15 menit.
        </div>
        <div class="task-footer">
            <div class="teacher-info">
                <img src="https://ui-avatars.com/api/?name=Bu+Ani&background=10b981&color=fff" class="teacher-avatar" alt="Teacher">
                <span class="teacher-name">Bu Ani Rahmawati</span>
            </div>
            <button class="task-action">Lihat Detail</button>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="mt-5">
    <h3 class="section-title">⚡ Akses Cepat</h3>
    <div class="row g-3">
        <div class="col-md-3 col-sm-6">
            <a href="?page=arsip_materi" class="text-decoration-none">
                <div class="stat-card blue" style="cursor: pointer;">
                    <div class="text-center">
                        <div class="stat-icon blue mx-auto mb-3">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <div class="stat-label">Materi Pelajaran</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="stat-card green" style="cursor: pointer;">
                <div class="text-center">
                    <div class="stat-icon green mx-auto mb-3">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="stat-label">Jadwal Pelajaran</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <a href="?page=daftar_nilai" class="text-decoration-none">
                <div class="stat-card purple" style="cursor: pointer;">
                    <div class="text-center">
                        <div class="stat-icon purple mx-auto mb-3">
                            <i class="fas fa-award"></i>
                        </div>
                        <div class="stat-label">Raport Digital</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="stat-card orange" style="cursor: pointer;">
                <div class="text-center">
                    <div class="stat-icon orange mx-auto mb-3">
                        <i class="fas fa-question-circle"></i>
                    </div>
                    <div class="stat-label">Bantuan</div>
                </div>
            </div>
        </div>
    </div>
</div>