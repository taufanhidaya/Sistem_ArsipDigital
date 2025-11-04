<?php
/**
 * ============================================
 * FILE: config/functions.php
 * Helper Functions untuk Sistem E-ARSIP
 * ============================================
 */

/**
 * Cek apakah user sudah login
 * @return bool
 */
function isLoggedIn() {
    return isset($_SESSION['user_id']) && isset($_SESSION['role']);
}

/**
 * Redirect jika belum login
 * @param string $redirect_url URL untuk redirect jika belum login
 */
function requireLogin($redirect_url = 'login.php') {
    if (!isLoggedIn()) {
        header('Location: ' . $redirect_url);
        exit();
    }
}

/**
 * Cek role user
 * @param string|array $allowed_roles Role yang diizinkan
 * @return bool
 */
function hasRole($allowed_roles) {
    if (!isLoggedIn()) {
        return false;
    }
    
    if (is_array($allowed_roles)) {
        return in_array($_SESSION['role'], $allowed_roles);
    }
    
    return $_SESSION['role'] === $allowed_roles;
}

/**
 * Redirect jika role tidak sesuai
 * @param string|array $allowed_roles Role yang diizinkan
 * @param string $redirect_url URL untuk redirect jika tidak punya akses
 */
function requireRole($allowed_roles, $redirect_url = 'index.php') {
    if (!hasRole($allowed_roles)) {
        header('Location: ' . $redirect_url);
        exit();
    }
}

/**
 * Ambil data user yang sedang login
 * @return array|null
 */
function getCurrentUser() {
    if (!isLoggedIn()) {
        return null;
    }
    
    return [
        'id' => $_SESSION['user_id'] ?? null,
        'username' => $_SESSION['username'] ?? null,
        'role' => $_SESSION['role'] ?? null
    ];
}

/**
 * Sanitasi input untuk keamanan
 * @param string $data
 * @return string
 */
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

/**
 * Generate hash password
 * @param string $password
 * @return string
 */
function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

/**
 * Verifikasi password
 * @param string $password Password plain text
 * @param string $hash Password yang sudah di-hash
 * @return bool
 */
function verifyPassword($password, $hash) {
    return password_verify($password, $hash);
}

/**
 * Format tanggal Indonesia
 * @param string $date
 * @param bool $include_time
 * @return string
 */
function formatTanggal($date, $include_time = false) {
    if (empty($date)) {
        return '-';
    }
    
    $bulan = [
        1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];
    
    $timestamp = strtotime($date);
    $tanggal = date('j', $timestamp);
    $bulan_idx = date('n', $timestamp);
    $tahun = date('Y', $timestamp);
    
    $formatted = $tanggal . ' ' . $bulan[$bulan_idx] . ' ' . $tahun;
    
    if ($include_time) {
        $formatted .= ' ' . date('H:i', $timestamp);
    }
    
    return $formatted;
}

/**
 * Generate alert message
 * @param string $type success|error|warning|info
 * @param string $message
 * @return string HTML alert
 */
function showAlert($type, $message) {
    $icon = [
        'success' => 'check-circle',
        'error' => 'exclamation-circle',
        'warning' => 'exclamation-triangle',
        'info' => 'info-circle'
    ];
    
    $alert_class = [
        'success' => 'alert-success',
        'error' => 'alert-danger',
        'warning' => 'alert-warning',
        'info' => 'alert-info'
    ];
    
    return '
    <div class="alert ' . $alert_class[$type] . ' alert-dismissible fade show" role="alert">
        <i class="fas fa-' . $icon[$type] . ' me-2"></i>
        ' . $message . '
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>';
}

/**
 * Redirect dengan pesan
 * @param string $url
 * @param string $type
 * @param string $message
 */
function redirectWithMessage($url, $type, $message) {
    $_SESSION['alert_type'] = $type;
    $_SESSION['alert_message'] = $message;
    header('Location: ' . $url);
    exit();
}

/**
 * Tampilkan pesan dari session
 * @return string|null
 */
function displaySessionAlert() {
    if (isset($_SESSION['alert_type']) && isset($_SESSION['alert_message'])) {
        $alert = showAlert($_SESSION['alert_type'], $_SESSION['alert_message']);
        unset($_SESSION['alert_type']);
        unset($_SESSION['alert_message']);
        return $alert;
    }
    return null;
}

/**
 * Upload file dengan validasi
 * @param array $file File dari $_FILES
 * @param string $target_dir Direktori tujuan
 * @param array $allowed_types Tipe file yang diizinkan
 * @param int $max_size Ukuran maksimal dalam bytes (default 5MB)
 * @return array ['success' => bool, 'message' => string, 'filename' => string]
 */
function uploadFile($file, $target_dir, $allowed_types = ['jpg', 'jpeg', 'png', 'pdf'], $max_size = 5242880) {
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return ['success' => false, 'message' => 'Error upload file', 'filename' => null];
    }
    
    // Validasi ukuran
    if ($file['size'] > $max_size) {
        return ['success' => false, 'message' => 'Ukuran file terlalu besar (max 5MB)', 'filename' => null];
    }
    
    // Validasi tipe file
    $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($file_extension, $allowed_types)) {
        return ['success' => false, 'message' => 'Tipe file tidak diizinkan', 'filename' => null];
    }
    
    // Generate nama file unik
    $new_filename = uniqid() . '_' . time() . '.' . $file_extension;
    $target_file = $target_dir . $new_filename;
    
    // Buat direktori jika belum ada
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0755, true);
    }
    
    // Upload file
    if (move_uploaded_file($file['tmp_name'], $target_file)) {
        return ['success' => true, 'message' => 'File berhasil diupload', 'filename' => $new_filename];
    }
    
    return ['success' => false, 'message' => 'Gagal mengupload file', 'filename' => null];
}

/**
 * Hapus file
 * @param string $file_path
 * @return bool
 */
function deleteFile($file_path) {
    if (file_exists($file_path)) {
        return unlink($file_path);
    }
    return false;
}

/**
 * Generate random string
 * @param int $length
 * @return string
 */
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

/**
 * Escape output untuk mencegah XSS
 * @param string $string
 * @return string
 */
function e($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

/**
 * Debug helper - print data dengan format bagus
 * @param mixed $data
 */
function dd($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    die();
}

/**
 * Get user profile image URL
 * @param string|null $foto
 * @param string $nama
 * @return string
 */
function getUserAvatar($foto = null, $nama = 'User') {
    if ($foto && file_exists('uploads/profile/' . $foto)) {
        return 'uploads/profile/' . $foto;
    }
    
    // Generate avatar dari nama menggunakan UI Avatars
    $nama_encoded = urlencode($nama);
    return "https://ui-avatars.com/api/?name={$nama_encoded}&background=10b981&color=fff";
}

/**
 * Pagination helper
 * @param int $total_rows Total data
 * @param int $page Halaman saat ini
 * @param int $per_page Data per halaman
 * @return array
 */
function paginate($total_rows, $page = 1, $per_page = 10) {
    $total_pages = ceil($total_rows / $per_page);
    $page = max(1, min($page, $total_pages));
    $offset = ($page - 1) * $per_page;
    
    return [
        'total_rows' => $total_rows,
        'total_pages' => $total_pages,
        'current_page' => $page,
        'per_page' => $per_page,
        'offset' => $offset,
        'has_prev' => $page > 1,
        'has_next' => $page < $total_pages
    ];
}
?>