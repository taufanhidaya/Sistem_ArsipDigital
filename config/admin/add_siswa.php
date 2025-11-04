<?php
/**
 * ============================================
 * FILE: config/admin/add_siswa.php
 * Backend untuk Tambah Siswa Baru - FIXED
 * ============================================
 */

session_start();

// Cek apakah user sudah login dan memiliki role admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../../login.php?error=unauthorized');
    exit();
}

// Include koneksi database
// FIXED: Path yang benar dari config/admin/add_siswa.php ke config/connect.php
require_once __DIR__ . '/../connect.php';

// Proses form hanya jika method POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Koneksi database
        $database = new Database();
        $conn = $database->getConnection();
        
        // Ambil data dari form dengan validasi
        $nisn = isset($_POST['nisn']) ? trim($_POST['nisn']) : '';
        $nis = isset($_POST['nis']) ? trim($_POST['nis']) : '';
        $nama_siswa = isset($_POST['nama_siswa']) ? trim($_POST['nama_siswa']) : '';
        $id_kelas = isset($_POST['id_kelas']) ? $_POST['id_kelas'] : null;
        $jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';
        $tanggal_lahir = isset($_POST['tanggal_lahir']) ? $_POST['tanggal_lahir'] : null;
        $tempat_lahir = isset($_POST['tempat_lahir']) ? trim($_POST['tempat_lahir']) : '';
        $alamat = isset($_POST['alamat']) ? trim($_POST['alamat']) : '';
        $no_telepon = isset($_POST['no_telepon']) ? trim($_POST['no_telepon']) : '';
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $username = isset($_POST['username']) ? trim($_POST['username']) : '';
        $password_input = isset($_POST['password']) ? trim($_POST['password']) : '';
        
        // Validasi input wajib
        if (empty($nisn) || empty($nis) || empty($nama_siswa) || empty($username)) {
            $_SESSION['alert_type'] = 'error';
            $_SESSION['alert_message'] = 'NISN, NIS, Nama Siswa, dan Username wajib diisi!';
            header('Location: ../../page/admin/dashboard_admin.php?page=manajemen_siswa');
            exit();
        }
        
        // Validasi format NISN (10 digit) dan NIS
        if (!is_numeric($nisn) || strlen($nisn) != 10) {
            $_SESSION['alert_type'] = 'error';
            $_SESSION['alert_message'] = 'NISN harus berupa 10 digit angka!';
            header('Location: ../../page/admin/dashboard_admin.php?page=manajemen_siswa');
            exit();
        }
        
        // Validasi jenis kelamin
        if (!in_array($jenis_kelamin, ['L', 'P'])) {
            $_SESSION['alert_type'] = 'error';
            $_SESSION['alert_message'] = 'Jenis kelamin tidak valid!';
            header('Location: ../../page/admin/dashboard_admin.php?page=manajemen_siswa');
            exit();
        }
        
        // Cek apakah NISN atau NIS sudah ada
        $check_stmt = $conn->prepare("SELECT nisn, nis FROM siswa WHERE nisn = :nisn OR nis = :nis");
        $check_stmt->bindParam(':nisn', $nisn);
        $check_stmt->bindParam(':nis', $nis);
        $check_stmt->execute();
        
        if ($check_stmt->rowCount() > 0) {
            $existing = $check_stmt->fetch();
            if ($existing['nisn'] == $nisn) {
                $error = 'NISN sudah terdaftar!';
            } else {
                $error = 'NIS sudah terdaftar!';
            }
            $_SESSION['alert_type'] = 'error';
            $_SESSION['alert_message'] = $error;
            header('Location: ../../page/admin/dashboard_admin.php?page=manajemen_siswa');
            exit();
        }
        
        // Cek apakah username sudah ada
        $check_user = $conn->prepare("SELECT username FROM users WHERE username = :username");
        $check_user->bindParam(':username', $username);
        $check_user->execute();
        
        if ($check_user->rowCount() > 0) {
            $_SESSION['alert_type'] = 'error';
            $_SESSION['alert_message'] = 'Username sudah digunakan! Silakan pilih username lain.';
            header('Location: ../../page/admin/dashboard_admin.php?page=manajemen_siswa');
            exit();
        }
        
        // Generate password jika kosong
        $plaintext_password = '';
        if (empty($password_input)) {
            // Generate password otomatis: nis_nama (contoh: 20230001_budi)
            $nama_parts = explode(' ', $nama_siswa);
            $first_name = strtolower($nama_parts[0]);
            $plaintext_password = $nis . '_' . $first_name;
        } else {
            $plaintext_password = $password_input;
        }
        
        // Hash password untuk disimpan di database
        $hashed_password = password_hash($plaintext_password, PASSWORD_DEFAULT);
        
        // Upload foto jika ada
        $foto_name = null;
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
            $foto = $_FILES['foto'];
            $allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
            $max_size = 2 * 1024 * 1024; // 2MB
            
            // Validasi tipe file
            $file_info = finfo_open(FILEINFO_MIME_TYPE);
            $mime_type = finfo_file($file_info, $foto['tmp_name']);
            finfo_close($file_info);
            
            if (in_array($mime_type, $allowed_types) && $foto['size'] <= $max_size) {
                $extension = pathinfo($foto['name'], PATHINFO_EXTENSION);
                $foto_name = 'siswa_' . $nisn . '_' . time() . '.' . $extension;
                
                // Path upload - dari config/admin/ ke root/uploads/siswa/
                $upload_dir = __DIR__ . '/../../uploads/siswa/';
                
                // Buat direktori jika belum ada
                if (!file_exists($upload_dir)) {
                    mkdir($upload_dir, 0755, true);
                }
                
                // Upload file
                if (!move_uploaded_file($foto['tmp_name'], $upload_dir . $foto_name)) {
                    $_SESSION['alert_type'] = 'warning';
                    $_SESSION['alert_message'] = 'Siswa berhasil ditambahkan, namun foto gagal diupload.';
                    $foto_name = null; // Reset jika gagal upload
                }
            } else {
                $_SESSION['alert_type'] = 'warning';
                $_SESSION['alert_message'] = 'Tipe file tidak didukung atau ukuran file terlalu besar (max 2MB). Siswa ditambahkan tanpa foto.';
            }
        }
        
        // Mulai transaksi
        $conn->beginTransaction();
        
        try {
            // 1. Insert ke tabel users
            $insert_user = $conn->prepare("
                INSERT INTO users (username, password, role, status, created_at) 
                VALUES (:username, :password, 'siswa', 'aktif', NOW())
            ");
            $insert_user->bindParam(':username', $username);
            $insert_user->bindParam(':password', $hashed_password);
            $insert_user->execute();
            
            // Ambil id_user yang baru dibuat
            $id_user = $conn->lastInsertId();
            
            // 2. Insert ke tabel siswa
            $insert_siswa = $conn->prepare("
                INSERT INTO siswa (
                    id_user, nisn, nis, nama_siswa, id_kelas, jenis_kelamin, 
                    tanggal_lahir, tempat_lahir, alamat, no_telepon, email, foto, status_siswa
                ) VALUES (
                    :id_user, :nisn, :nis, :nama_siswa, :id_kelas, :jenis_kelamin, 
                    :tanggal_lahir, :tempat_lahir, :alamat, :no_telepon, :email, :foto, 'aktif'
                )
            ");
            
            $insert_siswa->bindParam(':id_user', $id_user);
            $insert_siswa->bindParam(':nisn', $nisn);
            $insert_siswa->bindParam(':nis', $nis);
            $insert_siswa->bindParam(':nama_siswa', $nama_siswa);
            $insert_siswa->bindParam(':id_kelas', $id_kelas);
            $insert_siswa->bindParam(':jenis_kelamin', $jenis_kelamin);
            $insert_siswa->bindParam(':tanggal_lahir', $tanggal_lahir);
            $insert_siswa->bindParam(':tempat_lahir', $tempat_lahir);
            $insert_siswa->bindParam(':alamat', $alamat);
            $insert_siswa->bindParam(':no_telepon', $no_telepon);
            $insert_siswa->bindParam(':email', $email);
            $insert_siswa->bindParam(':foto', $foto_name);
            $insert_siswa->execute();
            
            // Commit transaksi
            $conn->commit();
            
            // Simpan plaintext password ke session untuk ditampilkan
            $_SESSION['alert_type'] = 'success';
            $_SESSION['alert_message'] = "
                <div style='text-align: left;'>
                    <strong><i class='fas fa-check-circle'></i> Siswa berhasil ditambahkan!</strong><br>
                    <div class='mt-3 p-3' style='background: #fff3cd; border: 2px solid #ffc107; border-radius: 10px;'>
                        <strong style='color: #856404;'><i class='fas fa-key'></i> Informasi Login Siswa:</strong><br>
                        <div class='mt-2'>
                            <strong>Nama:</strong> {$nama_siswa}<br>
                            <strong>NISN:</strong> {$nisn}<br>
                            <strong>NIS:</strong> {$nis}<br>
                            <hr style='margin: 10px 0; border-top: 1px solid #ffc107;'>
                            <strong>Username:</strong> <span style='background: #fff; padding: 4px 10px; border-radius: 5px; font-family: monospace;'>{$username}</span><br>
                            <strong>Password:</strong> <code style='background: #fff; padding: 4px 10px; border-radius: 5px; color: #d63384; font-size: 1.1em; font-weight: bold;'>{$plaintext_password}</code><br>
                        </div>
                        <div class='mt-2 p-2' style='background: #f8d7da; border: 1px solid #dc3545; border-radius: 5px;'>
                            <small style='color: #721c24;'><i class='fas fa-exclamation-triangle'></i> <strong>PENTING:</strong> Catat password ini! Password hanya ditampilkan sekali dan tidak dapat dilihat lagi.</small>
                        </div>
                    </div>
                </div>
            ";
            
            header('Location: ../../page/admin/dashboard_admin.php?page=manajemen_siswa');
            exit();
            
        } catch (PDOException $e) {
            // Rollback jika ada error
            $conn->rollBack();
            throw $e;
        }
        
    } catch (PDOException $e) {
        // Rollback jika ada error
        if ($conn && $conn->inTransaction()) {
            $conn->rollBack();
        }
        
        $_SESSION['alert_type'] = 'error';
        $_SESSION['alert_message'] = 'Gagal menambahkan siswa: ' . $e->getMessage();
        header('Location: ../../page/admin/dashboard_admin.php?page=manajemen_siswa');
        exit();
    } catch (Exception $e) {
        $_SESSION['alert_type'] = 'error';
        $_SESSION['alert_message'] = 'Terjadi kesalahan: ' . $e->getMessage();
        header('Location: ../../page/admin/dashboard_admin.php?page=manajemen_siswa');
        exit();
    }
} else {
    // Jika bukan POST, redirect
    header('Location: ../../page/admin/dashboard_admin.php?page=manajemen_siswa');
    exit();
}
?>