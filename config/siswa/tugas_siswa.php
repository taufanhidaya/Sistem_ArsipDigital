<?php
/**
 * ============================================
 * FILE: config/siswa/tugas_siswa.php
 * Backend untuk mengambil data tugas siswa
 * ============================================
 */

require_once __DIR__ . '/../connect.php';

/**
 * Fungsi untuk mendapatkan tugas siswa berdasarkan user_id
 * @param int $user_id ID user siswa yang login
 * @return array Data tugas dan statistik
 */
function getTugasSiswa($user_id) {
    try {
        $database = new Database();
        $conn = $database->getConnection();
        
        // Ambil id_siswa dari user_id
        $stmt_siswa = $conn->prepare("SELECT id_siswa, id_kelas FROM siswa WHERE id_user = :user_id");
        $stmt_siswa->bindParam(':user_id', $user_id);
        $stmt_siswa->execute();
        $siswa = $stmt_siswa->fetch(PDO::FETCH_ASSOC);
        
        if (!$siswa) {
            return [
                'tugas' => [],
                'statistik' => [
                    'mendesak' => 0,
                    'dalam_progress' => 0,
                    'selesai_bulan_ini' => 0,
                    'terlambat' => 0,
                    'pending' => 0,
                    'selesai_total' => 0
                ],
                'mata_pelajaran' => []
            ];
        }
        
        $id_siswa = $siswa['id_siswa'];
        $id_kelas = $siswa['id_kelas'];
        
        // Query untuk mengambil tugas berdasarkan kelas siswa
        $query = "
            SELECT 
                t.*,
                m.nama_mapel,
                g.nama_guru,
                CASE 
                    WHEN t.deadline < NOW() AND t.status != 'selesai' THEN 'terlambat'
                    WHEN DATEDIFF(t.deadline, NOW()) <= 3 AND t.status != 'selesai' THEN 'mendesak'
                    ELSE t.status
                END as status_display
            FROM tugas t
            INNER JOIN mata_pelajaran m ON t.id_mapel = m.id_mapel
            INNER JOIN guru g ON t.id_guru = g.id_guru
            WHERE t.id_kelas = :id_kelas
            ORDER BY 
                CASE 
                    WHEN t.deadline < NOW() AND t.status != 'selesai' THEN 1
                    WHEN DATEDIFF(t.deadline, NOW()) <= 3 AND t.status != 'selesai' THEN 2
                    WHEN t.status = 'aktif' THEN 3
                    WHEN t.status = 'draft' THEN 4
                    ELSE 5
                END,
                t.deadline ASC
        ";
        
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id_kelas', $id_kelas);
        $stmt->execute();
        $tugas_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Hitung statistik
        $now = new DateTime();
        $statistik = [
            'mendesak' => 0,
            'dalam_progress' => 0,
            'selesai_bulan_ini' => 0,
            'terlambat' => 0,
            'pending' => 0,
            'selesai_total' => 0
        ];
        
        foreach ($tugas_list as $tugas) {
            $deadline = new DateTime($tugas['deadline']);
            $diff = $now->diff($deadline);
            $days_left = $diff->days;
            
            // Mendesak (deadline <= 3 hari dan belum selesai)
            if ($days_left <= 3 && $deadline > $now && $tugas['status'] != 'selesai') {
                $statistik['mendesak']++;
            }
            
            // Terlambat (melewati deadline dan belum selesai)
            if ($deadline < $now && $tugas['status'] != 'selesai') {
                $statistik['terlambat']++;
            }
            
            // Dalam Progress
            if ($tugas['status'] == 'aktif') {
                $statistik['dalam_progress']++;
            }
            
            // Selesai bulan ini
            if ($tugas['status'] == 'selesai') {
                $tanggal_selesai = new DateTime($tugas['tanggal_mulai']); // Sesuaikan dengan kolom tanggal selesai
                if ($tanggal_selesai->format('Y-m') == $now->format('Y-m')) {
                    $statistik['selesai_bulan_ini']++;
                }
                $statistik['selesai_total']++;
            }
            
            // Pending (draft atau aktif)
            if (in_array($tugas['status'], ['draft', 'aktif'])) {
                $statistik['pending']++;
            }
        }
        
        // Ambil daftar mata pelajaran untuk filter
        $query_mapel = "
            SELECT DISTINCT m.id_mapel, m.nama_mapel 
            FROM tugas t
            INNER JOIN mata_pelajaran m ON t.id_mapel = m.id_mapel
            WHERE t.id_kelas = :id_kelas
            ORDER BY m.nama_mapel ASC
        ";
        $stmt_mapel = $conn->prepare($query_mapel);
        $stmt_mapel->bindParam(':id_kelas', $id_kelas);
        $stmt_mapel->execute();
        $mata_pelajaran = $stmt_mapel->fetchAll(PDO::FETCH_ASSOC);
        
        return [
            'tugas' => $tugas_list,
            'statistik' => $statistik,
            'mata_pelajaran' => $mata_pelajaran
        ];
        
    } catch (PDOException $e) {
        error_log("Error getTugasSiswa: " . $e->getMessage());
        return [
            'tugas' => [],
            'statistik' => [
                'mendesak' => 0,
                'dalam_progress' => 0,
                'selesai_bulan_ini' => 0,
                'terlambat' => 0,
                'pending' => 0,
                'selesai_total' => 0
            ],
            'mata_pelajaran' => []
        ];
    }
}

/**
 * Fungsi untuk mendapatkan detail tugas
 * @param int $id_tugas ID tugas
 * @return array|null Data tugas
 */
function getDetailTugas($id_tugas) {
    try {
        $database = new Database();
        $conn = $database->getConnection();
        
        $query = "
            SELECT 
                t.*,
                m.nama_mapel,
                g.nama_guru,
                k.nama_kelas
            FROM tugas t
            INNER JOIN mata_pelajaran m ON t.id_mapel = m.id_mapel
            INNER JOIN guru g ON t.id_guru = g.id_guru
            INNER JOIN kelas k ON t.id_kelas = k.id_kelas
            WHERE t.id_tugas = :id_tugas
        ";
        
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id_tugas', $id_tugas);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
        
    } catch (PDOException $e) {
        error_log("Error getDetailTugas: " . $e->getMessage());
        return null;
    }
}

/**
 * Fungsi untuk submit/kumpulkan tugas
 * @param int $id_tugas ID tugas
 * @param int $id_siswa ID siswa
 * @param string $file_jawaban Nama file jawaban
 * @param string $catatan Catatan siswa
 * @return bool Success status
 */
function submitTugas($id_tugas, $id_siswa, $file_jawaban = null, $catatan = null) {
    try {
        $database = new Database();
        $conn = $database->getConnection();
        
        // Cek apakah sudah pernah submit
        $check = $conn->prepare("
            SELECT id_pengumpulan 
            FROM pengumpulan_tugas 
            WHERE id_tugas = :id_tugas AND id_siswa = :id_siswa
        ");
        $check->execute([':id_tugas' => $id_tugas, ':id_siswa' => $id_siswa]);
        
        if ($check->rowCount() > 0) {
            // Update jika sudah ada
            $update = $conn->prepare("
                UPDATE pengumpulan_tugas 
                SET file_jawaban = :file_jawaban,
                    catatan = :catatan,
                    tanggal_submit = NOW(),
                    status = 'sudah_dikumpulkan'
                WHERE id_tugas = :id_tugas AND id_siswa = :id_siswa
            ");
            
            return $update->execute([
                ':file_jawaban' => $file_jawaban,
                ':catatan' => $catatan,
                ':id_tugas' => $id_tugas,
                ':id_siswa' => $id_siswa
            ]);
        } else {
            // Insert baru
            $insert = $conn->prepare("
                INSERT INTO pengumpulan_tugas 
                (id_tugas, id_siswa, file_jawaban, catatan, tanggal_submit, status) 
                VALUES 
                (:id_tugas, :id_siswa, :file_jawaban, :catatan, NOW(), 'sudah_dikumpulkan')
            ");
            
            return $insert->execute([
                ':id_tugas' => $id_tugas,
                ':id_siswa' => $id_siswa,
                ':file_jawaban' => $file_jawaban,
                ':catatan' => $catatan
            ]);
        }
        
    } catch (PDOException $e) {
        error_log("Error submitTugas: " . $e->getMessage());
        return false;
    }
}
?>