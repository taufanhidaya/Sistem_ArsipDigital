<?php
/**
 * ============================================
 * FILE: page/guru/proses_tugas.php
 * Proses CRUD untuk Tugas
 * ============================================
 */

session_start();

// Include auth check
require_once __DIR__ . '/../../config/auth_check.php';
checkRole('guru');

// Include database
require_once __DIR__ . '/../../config/connect.php';
$database = new Database();
$conn = $database->getConnection();

// Ambil info user
$user_info = getUserInfo();
$id_guru = $user_info['id'];

// Proses berdasarkan action
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'] ?? '';
    
    if ($action == 'tambah') {
        try {
            // Ambil data dari form
            $id_mapel = $_POST['id_mapel'];
            $id_kelas = $_POST['id_kelas'];
            $judul_tugas = trim($_POST['judul_tugas']);
            $deskripsi = trim($_POST['deskripsi']);
            $tipe_tugas = $_POST['tipe_tugas'];
            $deadline = $_POST['deadline'];
            
            // Generate kode tugas unik
            $kode_tugas = 'TGS-' . date('Ymd') . '-' . sprintf('%04d', rand(1000, 9999));
            
            // Handle file upload (opsional)
            $file_tugas = null;
            if (isset($_FILES['file_tugas']) && $_FILES['file_tugas']['error'] == 0) {
                $upload_dir = __DIR__ . '/../../uploads/tugas/';
                
                // Buat folder jika belum ada
                if (!file_exists($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }
                
                $file_name = $_FILES['file_tugas']['name'];
                $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
                $new_file_name = 'tugas_' . time() . '_' . uniqid() . '.' . $file_ext;
                $target_file = $upload_dir . $new_file_name;
                
                // Validasi ekstensi file
                $allowed_ext = ['pdf', 'doc', 'docx', 'ppt', 'pptx'];
                if (!in_array(strtolower($file_ext), $allowed_ext)) {
                    $_SESSION['error'] = 'Format file tidak diizinkan!';
                    header('Location: dashboard_guru.php?page=tugas_materi');
                    exit();
                }
                
                // Validasi ukuran file (max 10MB)
                if ($_FILES['file_tugas']['size'] > 10 * 1024 * 1024) {
                    $_SESSION['error'] = 'Ukuran file maksimal 10MB!';
                    header('Location: dashboard_guru.php?page=tugas_materi');
                    exit();
                }
                
                if (move_uploaded_file($_FILES['file_tugas']['tmp_name'], $target_file)) {
                    $file_tugas = $new_file_name;
                }
            }
            
            // Insert ke database
            $stmt = $conn->prepare("
                INSERT INTO tugas (kode_tugas, id_guru, id_mapel, id_kelas, judul_tugas, deskripsi, file_tugas, tipe_tugas, tanggal_dibuat, deadline, status) 
                VALUES (:kode_tugas, :id_guru, :id_mapel, :id_kelas, :judul_tugas, :deskripsi, :file_tugas, :tipe_tugas, NOW(), :deadline, 'aktif')
            ");
            
            $stmt->bindParam(':kode_tugas', $kode_tugas);
            $stmt->bindParam(':id_guru', $id_guru);
            $stmt->bindParam(':id_mapel', $id_mapel);
            $stmt->bindParam(':id_kelas', $id_kelas);
            $stmt->bindParam(':judul_tugas', $judul_tugas);
            $stmt->bindParam(':deskripsi', $deskripsi);
            $stmt->bindParam(':file_tugas', $file_tugas);
            $stmt->bindParam(':tipe_tugas', $tipe_tugas);
            $stmt->bindParam(':deadline', $deadline);
            
            if ($stmt->execute()) {
                $_SESSION['success'] = 'Tugas berhasil ditambahkan!';
            } else {
                $_SESSION['error'] = 'Gagal menambahkan tugas!';
            }
            
        } catch (PDOException $e) {
            $_SESSION['error'] = 'Error: ' . $e->getMessage();
        }
        
        header('Location: dashboard_guru.php?page=tugas_materi');
        exit();
    }
    
    if ($action == 'edit') {
        try {
            $id_tugas = $_POST['id_tugas'];
            $judul_tugas = trim($_POST['judul_tugas']);
            $deskripsi = trim($_POST['deskripsi']);
            $deadline = $_POST['deadline'];
            
            $stmt = $conn->prepare("
                UPDATE tugas 
                SET judul_tugas = :judul_tugas, deskripsi = :deskripsi, deadline = :deadline 
                WHERE id_tugas = :id_tugas AND id_guru = :id_guru
            ");
            
            $stmt->bindParam(':judul_tugas', $judul_tugas);
            $stmt->bindParam(':deskripsi', $deskripsi);
            $stmt->bindParam(':deadline', $deadline);
            $stmt->bindParam(':id_tugas', $id_tugas);
            $stmt->bindParam(':id_guru', $id_guru);
            
            if ($stmt->execute()) {
                $_SESSION['success'] = 'Tugas berhasil diupdate!';
            } else {
                $_SESSION['error'] = 'Gagal mengupdate tugas!';
            }
            
        } catch (PDOException $e) {
            $_SESSION['error'] = 'Error: ' . $e->getMessage();
        }
        
        header('Location: dashboard_guru.php?page=tugas_materi');
        exit();
    }
}

// Proses hapus (GET request)
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action']) && $_GET['action'] == 'hapus') {
    try {
        $id_tugas = $_GET['id'];
        
        // Ambil data tugas untuk hapus file
        $stmt = $conn->prepare("SELECT file_tugas FROM tugas WHERE id_tugas = :id_tugas AND id_guru = :id_guru");
        $stmt->bindParam(':id_tugas', $id_tugas);
        $stmt->bindParam(':id_guru', $id_guru);
        $stmt->execute();
        $tugas = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($tugas) {
            // Hapus file jika ada
            if ($tugas['file_tugas']) {
                $file_path = __DIR__ . '/../../uploads/tugas/' . $tugas['file_tugas'];
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
            
            // Hapus dari database
            $delete_stmt = $conn->prepare("DELETE FROM tugas WHERE id_tugas = :id_tugas AND id_guru = :id_guru");
            $delete_stmt->bindParam(':id_tugas', $id_tugas);
            $delete_stmt->bindParam(':id_guru', $id_guru);
            
            if ($delete_stmt->execute()) {
                $_SESSION['success'] = 'Tugas berhasil dihapus!';
            } else {
                $_SESSION['error'] = 'Gagal menghapus tugas!';
            }
        } else {
            $_SESSION['error'] = 'Tugas tidak ditemukan!';
        }
        
    } catch (PDOException $e) {
        $_SESSION['error'] = 'Error: ' . $e->getMessage();
    }
    
    header('Location: dashboard_guru.php?page=tugas_materi');
    exit();
}

// Jika tidak ada action yang valid
$_SESSION['error'] = 'Action tidak valid!';
header('Location: dashboard_guru.php?page=tugas_materi');
exit();
?>