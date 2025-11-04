<?php
/**
 * ============================================
 * FILE: config/siswa/submit_tugas.php
 * Handler untuk submit/kumpulkan tugas
 * ============================================
 */

session_start();

// Cek login dan role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'siswa') {
    header('Location: ../../login.php');
    exit();
}

require_once __DIR__ . '/../connect.php';
require_once __DIR__ . '/tugas_siswa.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $database = new Database();
        $conn = $database->getConnection();
        
        // Ambil data dari form
        $id_tugas = $_POST['id_tugas'];
        $catatan = trim($_POST['catatan']);
        
        // Ambil id_siswa dari session
        $stmt_siswa = $conn->prepare("SELECT id_siswa FROM siswa WHERE id_user = :user_id");
        $stmt_siswa->bindParam(':user_id', $_SESSION['user_id']);
        $stmt_siswa->execute();
        $siswa = $stmt_siswa->fetch(PDO::FETCH_ASSOC);
        
        if (!$siswa) {
            $_SESSION['alert_type'] = 'error';
            $_SESSION['alert_message'] = 'Data siswa tidak ditemukan!';
            header('Location: ../../page/siswa/dashboard_siswa.php?page=daftar_tugas');
            exit();
        }
        
        $id_siswa = $siswa['id_siswa'];
        
        // Handle upload file
        $file_jawaban = null;
        
        if (isset($_FILES['file_jawaban']) && $_FILES['file_jawaban']['error'] == UPLOAD_ERR_OK) {
            $file = $_FILES['file_jawaban'];
            $allowed_types = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'image/jpeg', 'image/jpg', 'image/png'];
            $max_size = 5 * 1024 * 1024; // 5MB
            
            // Validasi tipe file
            if (!in_array($file['type'], $allowed_types)) {
                $_SESSION['alert_type'] = 'error';
                $_SESSION['alert_message'] = 'Format file tidak diizinkan! Gunakan PDF, DOC, DOCX, JPG, atau PNG.';
                header('Location: ../../page/siswa/dashboard_siswa.php?page=daftar_tugas');
                exit();
            }
            
            // Validasi ukuran
            if ($file['size'] > $max_size) {
                $_SESSION['alert_type'] = 'error';
                $_SESSION['alert_message'] = 'Ukuran file terlalu besar! Maksimal 5MB.';
                header('Location: ../../page/siswa/dashboard_siswa.php?page=daftar_tugas');
                exit();
            }
            
            // Generate nama file unik
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $file_jawaban = 'jawaban_' . $id_tugas . '_' . $id_siswa . '_' . time() . '.' . $extension;
            $upload_dir = '../../uploads/jawaban_tugas/';
            
            // Buat direktori jika belum ada
            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }
            
            // Upload file
            if (!move_uploaded_file($file['tmp_name'], $upload_dir . $file_jawaban)) {
                $_SESSION['alert_type'] = 'error';
                $_SESSION['alert_message'] = 'Gagal mengupload file!';
                header('Location: ../../page/siswa/dashboard_siswa.php?page=daftar_tugas');
                exit();
            }
        }
        
        // Submit tugas ke database
        $success = submitTugas($id_tugas, $id_siswa, $file_jawaban, $catatan);
        
        if ($success) {
            // Update status tugas menjadi selesai
            $update_tugas = $conn->prepare("UPDATE tugas SET status = 'selesai' WHERE id_tugas = :id_tugas");
            $update_tugas->bindParam(':id_tugas', $id_tugas);
            $update_tugas->execute();
            
            $_SESSION['alert_type'] = 'success';
            $_SESSION['alert_message'] = 'Tugas berhasil dikumpulkan!';
        } else {
            // Hapus file jika gagal insert ke database
            if ($file_jawaban && file_exists($upload_dir . $file_jawaban)) {
                unlink($upload_dir . $file_jawaban);
            }
            
            $_SESSION['alert_type'] = 'error';
            $_SESSION['alert_message'] = 'Gagal mengumpulkan tugas!';
        }
        
        header('Location: ../../page/siswa/dashboard_siswa.php?page=daftar_tugas');
        exit();
        
    } catch (Exception $e) {
        $_SESSION['alert_type'] = 'error';
        $_SESSION['alert_message'] = 'Error: ' . $e->getMessage();
        header('Location: ../../page/siswa/dashboard_siswa.php?page=daftar_tugas');
        exit();
    }
} else {
    header('Location: ../../page/siswa/dashboard_siswa.php?page=daftar_tugas');
    exit();
}
?>