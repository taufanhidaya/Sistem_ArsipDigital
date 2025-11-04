<?php
/**
 * ============================================
 * FILE: setup_kelas.php
 * Script untuk setup data kelas otomatis
 * Letakkan di root folder, akses: http://localhost/e-arsip/setup_kelas.php
 * ⚠️ HAPUS FILE INI SETELAH SELESAI DIJALANKAN!
 * ============================================
 */

require_once 'config/connect.php';

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setup Data Kelas - E-ARSIP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            min-height: 100vh;
            padding: 50px 20px;
        }
        .setup-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            max-width: 800px;
            margin: 0 auto;
        }
        .result-box {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
            max-height: 400px;
            overflow-y: auto;
        }
        .success-item {
            padding: 8px 12px;
            margin: 5px 0;
            background: #d1fae5;
            border-left: 4px solid #10b981;
            border-radius: 5px;
        }
        .error-item {
            padding: 8px 12px;
            margin: 5px 0;
            background: #fee2e2;
            border-left: 4px solid #ef4444;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="setup-card">
        <h2 class="text-center mb-4">
            <i class="fas fa-database text-success"></i> Setup Data Kelas
        </h2>
        
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['setup'])) {
            $database = new Database();
            $conn = $database->getConnection();
            
            $success_count = 0;
            $error_count = 0;
            $messages = [];
            
            try {
                // Data kelas yang akan diinsert
                $kelas_data = [
                    // Kelas X
                    ['X IPA 1', 'X', 'IPA', '2024/2025', 36, 'R-101'],
                    ['X IPA 2', 'X', 'IPA', '2024/2025', 36, 'R-102'],
                    ['X IPA 3', 'X', 'IPA', '2024/2025', 36, 'R-103'],
                    ['X IPS 1', 'X', 'IPS', '2024/2025', 36, 'R-104'],
                    ['X IPS 2', 'X', 'IPS', '2024/2025', 36, 'R-105'],
                    ['X Bahasa', 'X', 'Bahasa', '2024/2025', 36, 'R-106'],
                    
                    // Kelas XI
                    ['XI IPA 1', 'XI', 'IPA', '2024/2025', 36, 'R-201'],
                    ['XI IPA 2', 'XI', 'IPA', '2024/2025', 36, 'R-202'],
                    ['XI IPA 3', 'XI', 'IPA', '2024/2025', 36, 'R-203'],
                    ['XI IPS 1', 'XI', 'IPS', '2024/2025', 36, 'R-204'],
                    ['XI IPS 2', 'XI', 'IPS', '2024/2025', 36, 'R-205'],
                    ['XI Bahasa', 'XI', 'Bahasa', '2024/2025', 36, 'R-206'],
                    
                    // Kelas XII
                    ['XII IPA 1', 'XII', 'IPA', '2024/2025', 36, 'R-301'],
                    ['XII IPA 2', 'XII', 'IPA', '2024/2025', 36, 'R-302'],
                    ['XII IPA 3', 'XII', 'IPA', '2024/2025', 36, 'R-303'],
                    ['XII IPS 1', 'XII', 'IPS', '2024/2025', 36, 'R-304'],
                    ['XII IPS 2', 'XII', 'IPS', '2024/2025', 36, 'R-305'],
                    ['XII Bahasa', 'XII', 'Bahasa', '2024/2025', 36, 'R-306'],
                ];
                
                $stmt = $conn->prepare("
                    INSERT INTO kelas (nama_kelas, tingkat, jurusan, tahun_ajaran, kapasitas, ruangan) 
                    VALUES (:nama_kelas, :tingkat, :jurusan, :tahun_ajaran, :kapasitas, :ruangan)
                ");
                
                foreach ($kelas_data as $kelas) {
                    try {
                        // Cek apakah kelas sudah ada
                        $check = $conn->prepare("SELECT id_kelas FROM kelas WHERE nama_kelas = ?");
                        $check->execute([$kelas[0]]);
                        
                        if ($check->rowCount() > 0) {
                            $messages[] = ['type' => 'warning', 'text' => "⚠️ Kelas <strong>{$kelas[0]}</strong> sudah ada (dilewati)"];
                            continue;
                        }
                        
                        $stmt->execute([
                            ':nama_kelas' => $kelas[0],
                            ':tingkat' => $kelas[1],
                            ':jurusan' => $kelas[2],
                            ':tahun_ajaran' => $kelas[3],
                            ':kapasitas' => $kelas[4],
                            ':ruangan' => $kelas[5]
                        ]);
                        
                        $success_count++;
                        $messages[] = ['type' => 'success', 'text' => "✅ Berhasil: <strong>{$kelas[0]}</strong> ({$kelas[2]}) - Ruang {$kelas[5]}"];
                        
                    } catch (PDOException $e) {
                        $error_count++;
                        $messages[] = ['type' => 'error', 'text' => "❌ Gagal: <strong>{$kelas[0]}</strong> - " . $e->getMessage()];
                    }
                }
                
                echo '<div class="alert alert-info">';
                echo '<h5><i class="fas fa-info-circle"></i> Hasil Setup:</h5>';
                echo "<p class='mb-0'><strong>Berhasil:</strong> {$success_count} kelas | <strong>Gagal:</strong> {$error_count} kelas</p>";
                echo '</div>';
                
                echo '<div class="result-box">';
                foreach ($messages as $msg) {
                    $class = $msg['type'] == 'success' ? 'success-item' : ($msg['type'] == 'error' ? 'error-item' : 'alert alert-warning');
                    echo "<div class='{$class}'>{$msg['text']}</div>";
                }
                echo '</div>';
                
                // Tampilkan data kelas yang berhasil diinsert
                $result = $conn->query("SELECT * FROM kelas ORDER BY tingkat, nama_kelas");
                $all_kelas = $result->fetchAll(PDO::FETCH_ASSOC);
                
                echo '<div class="mt-4">';
                echo '<h5><i class="fas fa-list"></i> Daftar Kelas Saat Ini:</h5>';
                echo '<div class="table-responsive">';
                echo '<table class="table table-bordered table-sm">';
                echo '<thead class="table-success"><tr><th>No</th><th>Nama Kelas</th><th>Tingkat</th><th>Jurusan</th><th>Ruangan</th><th>Kapasitas</th></tr></thead>';
                echo '<tbody>';
                
                $no = 1;
                foreach ($all_kelas as $k) {
                    echo "<tr>";
                    echo "<td>{$no}</td>";
                    echo "<td><strong>{$k['nama_kelas']}</strong></td>";
                    echo "<td>{$k['tingkat']}</td>";
                    echo "<td>{$k['jurusan']}</td>";
                    echo "<td>{$k['ruangan']}</td>";
                    echo "<td>{$k['kapasitas']}</td>";
                    echo "</tr>";
                    $no++;
                }
                
                echo '</tbody></table>';
                echo '</div>';
                echo '</div>';
                
                if ($success_count > 0) {
                    echo '<div class="alert alert-success mt-4">';
                    echo '<i class="fas fa-check-circle"></i> <strong>Setup selesai!</strong><br>';
                    echo 'Sekarang Anda bisa menambahkan siswa dengan memilih kelas yang tersedia.<br>';
                    echo '<small class="text-danger">⚠️ Jangan lupa hapus file <code>setup_kelas.php</code> ini setelah selesai!</small>';
                    echo '</div>';
                    
                    echo '<div class="text-center mt-3">';
                    echo '<a href="page/admin/dashboard_admin.php?page=manajemen_siswa" class="btn btn-success">';
                    echo '<i class="fas fa-arrow-right me-2"></i>Lanjut ke Manajemen Siswa';
                    echo '</a>';
                    echo '</div>';
                }
                
            } catch (PDOException $e) {
                echo '<div class="alert alert-danger">';
                echo '<i class="fas fa-exclamation-triangle"></i> <strong>Error:</strong> ' . $e->getMessage();
                echo '</div>';
            }
        } else {
            // Form belum disubmit
            try {
                $database = new Database();
                $conn = $database->getConnection();
                
                // Cek jumlah kelas yang sudah ada
                $check = $conn->query("SELECT COUNT(*) as total FROM kelas");
                $existing = $check->fetch(PDO::FETCH_ASSOC);
                
                echo '<div class="alert alert-info">';
                echo '<i class="fas fa-info-circle"></i> ';
                echo 'Saat ini terdapat <strong>' . $existing['total'] . ' kelas</strong> di database.';
                echo '</div>';
                
                if ($existing['total'] > 0) {
                    echo '<div class="alert alert-warning">';
                    echo '<i class="fas fa-exclamation-triangle"></i> <strong>Perhatian:</strong><br>';
                    echo 'Kelas yang sudah ada tidak akan ditambahkan lagi (akan dilewati).';
                    echo '</div>';
                }
                
            } catch (PDOException $e) {
                echo '<div class="alert alert-danger">';
                echo '<i class="fas fa-times-circle"></i> <strong>Koneksi Database Gagal:</strong> ' . $e->getMessage();
                echo '</div>';
            }
        ?>
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-plus-circle text-success"></i> Data yang Akan Ditambahkan:</h5>
                <ul class="mb-3">
                    <li><strong>Kelas X:</strong> 6 kelas (IPA 1-3, IPS 1-2, Bahasa)</li>
                    <li><strong>Kelas XI:</strong> 6 kelas (IPA 1-3, IPS 1-2, Bahasa)</li>
                    <li><strong>Kelas XII:</strong> 6 kelas (IPA 1-3, IPS 1-2, Bahasa)</li>
                    <li><strong>Total:</strong> 18 kelas</li>
                </ul>
                
                <form method="POST">
                    <div class="d-grid">
                        <button type="submit" name="setup" class="btn btn-success btn-lg">
                            <i class="fas fa-play me-2"></i>Jalankan Setup Sekarang
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <?php } ?>
        
        <div class="text-center mt-4">
            <a href="login.php" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali ke Login
            </a>
        </div>
    </div>
</body>
</html>