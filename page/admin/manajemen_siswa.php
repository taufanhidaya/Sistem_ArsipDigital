<?php
// Include koneksi database
require_once __DIR__ . '/../../config/connect.php';

// Koneksi database
$database = new Database();
$conn = $database->getConnection();

// Ambil data siswa dari database
$query = "
    SELECT s.*, k.nama_kelas, u.username, u.status as user_status
    FROM siswa s
    LEFT JOIN kelas k ON s.id_kelas = k.id_kelas
    LEFT JOIN users u ON s.id_user = u.id_user
    ORDER BY s.nama_siswa ASC
";
$stmt = $conn->prepare($query);
$stmt->execute();
$siswa_list = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Hitung statistik
$total_siswa = count($siswa_list);
$siswa_aktif = count(array_filter($siswa_list, function($s) { return $s['status_siswa'] == 'aktif'; }));

// Ambil data kelas untuk dropdown
$query_kelas = "SELECT id_kelas, nama_kelas FROM kelas ORDER BY nama_kelas ASC";
$stmt_kelas = $conn->prepare($query_kelas);
$stmt_kelas->execute();
$kelas_list = $stmt_kelas->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Alert Messages -->
<?php if (isset($_SESSION['alert_type']) && isset($_SESSION['alert_message'])): ?>
<div class="alert alert-<?php echo $_SESSION['alert_type'] == 'success' ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
    <i class="fas fa-<?php echo $_SESSION['alert_type'] == 'success' ? 'check-circle' : 'exclamation-circle'; ?> me-2"></i>
    <?php echo $_SESSION['alert_message']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php 
unset($_SESSION['alert_type']); 
unset($_SESSION['alert_message']); 
endif; 
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-1">👨‍🎓 Manajemen Siswa</h2>
        <p class="text-secondary mb-0">Kelola data siswa secara lengkap</p>
    </div>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahSiswa">
        <i class="fas fa-plus me-2"></i>Tambah Siswa Baru
    </button>
</div>

<!-- Stats -->
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="stat-card blue">
            <div class="stat-icon blue">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-value"><?php echo $total_siswa; ?></div>
            <div class="stat-label">Total Siswa</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card green">
            <div class="stat-icon green">
                <i class="fas fa-user-check"></i>
            </div>
            <div class="stat-value"><?php echo $siswa_aktif; ?></div>
            <div class="stat-label">Siswa Aktif</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card orange">
            <div class="stat-icon orange">
                <i class="fas fa-user-plus"></i>
            </div>
            <div class="stat-value"><?php echo $total_siswa - $siswa_aktif; ?></div>
            <div class="stat-label">Siswa Tidak Aktif</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card purple">
            <div class="stat-icon purple">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <div class="stat-value"><?php echo count($kelas_list); ?></div>
            <div class="stat-label">Total Kelas</div>
        </div>
    </div>
</div>

<!-- Filter -->
<div class="dashboard-card mb-4">
    <div class="row g-3">
        <div class="col-md-3">
            <select class="form-select" id="filterKelas">
                <option value="">Semua Kelas</option>
                <?php foreach ($kelas_list as $kelas): ?>
                    <option value="<?php echo $kelas['nama_kelas']; ?>"><?php echo $kelas['nama_kelas']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-3">
            <select class="form-select" id="filterStatus">
                <option value="">Semua Status</option>
                <option value="aktif">Aktif</option>
                <option value="lulus">Lulus</option>
                <option value="pindah">Pindah</option>
                <option value="keluar">Keluar</option>
            </select>
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" id="searchInput" placeholder="Cari nama atau NIS...">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary w-100" onclick="filterTable()">
                <i class="fas fa-search"></i> Cari
            </button>
        </div>
    </div>
</div>

<!-- Table -->
<div class="dashboard-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="fw-bold mb-0">Daftar Siswa</h5>
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
        <table class="table table-hover" id="tableSiswa">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Lengkap</th>
                    <th>Kelas</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>No. Telp</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach ($siswa_list as $siswa): 
                    $avatar_url = $siswa['foto'] ? '../../uploads/siswa/' . $siswa['foto'] : 'https://ui-avatars.com/api/?name=' . urlencode($siswa['nama_siswa']) . '&background=3b82f6&color=fff';
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($siswa['nis']); ?></td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="<?php echo $avatar_url; ?>" 
                                 style="width: 32px; height: 32px; border-radius: 50%; object-fit: cover;" 
                                 alt="<?php echo htmlspecialchars($siswa['nama_siswa']); ?>">
                            <strong><?php echo htmlspecialchars($siswa['nama_siswa']); ?></strong>
                        </div>
                    </td>
                    <td><?php echo htmlspecialchars($siswa['nama_kelas'] ?? '-'); ?></td>
                    <td><?php echo $siswa['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan'; ?></td>
                    <td><?php echo htmlspecialchars($siswa['email'] ?? '-'); ?></td>
                    <td><?php echo htmlspecialchars($siswa['no_telepon'] ?? '-'); ?></td>
                    <td class="text-center">
                        <?php
                        $badge_class = 'bg-success';
                        $status_text = 'Aktif';
                        
                        switch($siswa['status_siswa']) {
                            case 'lulus': $badge_class = 'bg-info'; $status_text = 'Lulus'; break;
                            case 'pindah': $badge_class = 'bg-warning'; $status_text = 'Pindah'; break;
                            case 'keluar': $badge_class = 'bg-danger'; $status_text = 'Keluar'; break;
                            case 'drop_out': $badge_class = 'bg-secondary'; $status_text = 'Drop Out'; break;
                        }
                        ?>
                        <span class="badge <?php echo $badge_class; ?>"><?php echo $status_text; ?></span>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-outline-primary me-1" title="Lihat Detail" 
                                onclick="viewDetail(<?php echo $siswa['id_siswa']; ?>)">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-success me-1" title="Edit"
                                onclick="editSiswa(<?php echo $siswa['id_siswa']; ?>)">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger" title="Hapus"
                                onclick="deleteSiswa(<?php echo $siswa['id_siswa']; ?>, '<?php echo htmlspecialchars($siswa['nama_siswa']); ?>')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
                
                <?php if (empty($siswa_list)): ?>
                <tr>
                    <td colspan="9" class="text-center py-4">
                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                        <p class="text-muted">Belum ada data siswa</p>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah Siswa -->
<div class="modal fade" id="modalTambahSiswa" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form class="modal-content" action="../../config/admin/add_siswa.php" method="POST" enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-user-plus me-2"></i>Tambah Siswa Baru
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <!-- Data Siswa -->
                    <div class="col-12">
                        <h6 class="text-primary mb-3">
                            <i class="fas fa-id-card me-2"></i>Data Identitas
                        </h6>
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label">NISN <span class="text-danger">*</span></label>
                        <input name="nisn" type="text" class="form-control" placeholder="Masukkan NISN" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">NIS <span class="text-danger">*</span></label>
                        <input name="nis" type="text" class="form-control" placeholder="Masukkan NIS" required>
                    </div>
                    
                    <div class="col-12">
                        <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input name="nama_siswa" type="text" class="form-control" placeholder="Masukkan nama lengkap" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Tempat Lahir</label>
                        <input name="tempat_lahir" type="text" class="form-control" placeholder="Contoh: Jakarta">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Lahir</label>
                        <input name="tanggal_lahir" type="date" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Kelas <span class="text-danger">*</span></label>
                        <select name="id_kelas" class="form-select" required>
                            <option value="">Pilih Kelas</option>
                            <?php foreach ($kelas_list as $kelas): ?>
                                <option value="<?php echo $kelas['id_kelas']; ?>">
                                    <?php echo htmlspecialchars($kelas['nama_kelas']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>

                    <!-- Kontak -->
                    <div class="col-12 mt-4">
                        <h6 class="text-primary mb-3">
                            <i class="fas fa-address-book me-2"></i>Data Kontak
                        </h6>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="2" placeholder="Masukkan alamat lengkap"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">No. Telepon</label>
                        <input name="no_telepon" type="text" class="form-control" placeholder="Contoh: 081234567890">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" placeholder="Contoh: siswa@email.com">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Foto Siswa (Opsional)</label>
                        <input name="foto" type="file" accept="image/*" class="form-control">
                        <small class="text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB</small>
                    </div>

                    <!-- Akun Login -->
                    <div class="col-12 mt-4">
                        <h6 class="text-primary mb-3">
                            <i class="fas fa-key me-2"></i>Akun Login Siswa
                        </h6>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Username <span class="text-danger">*</span></label>
                        <input name="username" type="text" class="form-control" placeholder="Username untuk login" required>
                        <small class="text-muted">Username harus unik</small>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Password</label>
                        <input name="password" type="text" class="form-control" placeholder="Kosongkan untuk generate otomatis">
                        <small class="text-muted">Jika kosong: <code>NIS_namaDepan</code></small>
                    </div>

                    <div class="col-12">
                        <div class="alert alert-info mb-0">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>Informasi:</strong> Password akan disimpan dalam bentuk hash (terenkripsi) di database. 
                            Plaintext password akan ditampilkan sekali setelah pembuatan akun untuk dicatat oleh admin.
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Batal
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Simpan Siswa
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// Filter Table
function filterTable() {
    const filterKelas = document.getElementById('filterKelas').value.toLowerCase();
    const filterStatus = document.getElementById('filterStatus').value.toLowerCase();
    const searchInput = document.getElementById('searchInput').value.toLowerCase();
    const table = document.getElementById('tableSiswa');
    const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

    for (let i = 0; i < rows.length; i++) {
        const row = rows[i];
        const nis = row.cells[1]?.textContent.toLowerCase() || '';
        const nama = row.cells[2]?.textContent.toLowerCase() || '';
        const kelas = row.cells[3]?.textContent.toLowerCase() || '';
        const status = row.cells[7]?.textContent.toLowerCase() || '';

        const matchKelas = !filterKelas || kelas.includes(filterKelas);
        const matchStatus = !filterStatus || status.includes(filterStatus);
        const matchSearch = !searchInput || nis.includes(searchInput) || nama.includes(searchInput);

        if (matchKelas && matchStatus && matchSearch) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    }
}

// Real-time search
document.getElementById('searchInput').addEventListener('keyup', filterTable);
document.getElementById('filterKelas').addEventListener('change', filterTable);
document.getElementById('filterStatus').addEventListener('change', filterTable);

// View Detail
function viewDetail(id) {
    alert('Fitur detail siswa akan segera dibuat. ID: ' + id);
}

// Edit Siswa
function editSiswa(id) {
    alert('Fitur edit siswa akan segera dibuat. ID: ' + id);
}

// Delete Siswa
function deleteSiswa(id, nama) {
    if (confirm('Apakah Anda yakin ingin menghapus siswa ' + nama + '?\n\nData yang dihapus tidak dapat dikembalikan!')) {
        window.location.href = '../../config/admin/delete_siswa.php?id=' + id;
    }
}
</script>