<?php
/**
 * ============================================
 * FILE: index.php
 * Routing utama setelah login
 * Mengarahkan user ke dashboard sesuai role
 * ============================================
 */

session_start();

// Regenerate session ID untuk keamanan (mencegah session fixation)
if (!isset($_SESSION['session_created'])) {
    session_regenerate_id(true);
    $_SESSION['session_created'] = time();
}

// Session timeout (30 menit)
$session_timeout = 1800; // 30 menit dalam detik
if (isset($_SESSION['login_time']) && (time() - $_SESSION['login_time'] > $session_timeout)) {
    session_unset();
    session_destroy();
    header('Location: login.php?error=session_expired');
    exit();
}

// Update last activity time
$_SESSION['last_activity'] = time();

// Cek apakah user sudah login
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
    // Jika belum login, redirect ke halaman login
    header('Location: login.php');
    exit();
}

// Validasi role yang diperbolehkan
$allowed_roles = ['admin', 'guru', 'siswa'];
$role = $_SESSION['role'];

if (!in_array($role, $allowed_roles)) {
    session_destroy();
    header('Location: login.php?error=invalid_role');
    exit();
}

// Routing berdasarkan role
switch ($role) {
    case 'admin':
        header('Location: page/admin/dashboard_admin.php');
        exit();
    
    case 'guru':
        header('Location: page/guru/dashboard_guru.php');
        exit();
    
    case 'siswa':
        header('Location: page/siswa/dashboard_siswa.php');
        exit();
    
    default:
        // Jika role tidak dikenali (safety net)
        session_destroy();
        header('Location: login.php?error=invalid_role');
        exit();
}
?>