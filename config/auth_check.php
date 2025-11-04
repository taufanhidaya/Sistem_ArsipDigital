<?php
/**
 * ============================================
 * FILE: config/auth_check.php
 * Middleware untuk validasi session di setiap halaman
 * Include file ini di setiap halaman dashboard
 * ============================================
 */

// Pastikan session sudah dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Fungsi untuk cek apakah user sudah login
 */
function checkLogin() {
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
        header('Location: ../../login.php?error=unauthorized');
        exit();
    }
}

/**
 * Fungsi untuk cek session timeout
 * Default 30 menit (1800 detik)
 */
function checkSessionTimeout($timeout = 1800) {
    if (isset($_SESSION['login_time'])) {
        $elapsed = time() - $_SESSION['login_time'];
        if ($elapsed > $timeout) {
            session_unset();
            session_destroy();
            header('Location: ../../login.php?error=session_expired');
            exit();
        }
    }
    // Update last activity
    $_SESSION['last_activity'] = time();
}

/**
 * Fungsi untuk validasi role
 * @param string|array $allowed_roles Role yang diizinkan akses
 */
function checkRole($allowed_roles) {
    if (is_string($allowed_roles)) {
        $allowed_roles = [$allowed_roles];
    }
    
    if (!in_array($_SESSION['role'], $allowed_roles)) {
        header('Location: ../../login.php?error=unauthorized');
        exit();
    }
}

/**
 * Fungsi untuk get user info dari session
 */
function getUserInfo() {
    return [
        'id' => $_SESSION['user_id'] ?? null,
        'username' => $_SESSION['username'] ?? null,
        'role' => $_SESSION['role'] ?? null,
        'login_time' => $_SESSION['login_time'] ?? null
    ];
}

/**
 * Fungsi untuk prevent back after logout
 */
function preventBackAfterLogout() {
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
}

// Auto check pada setiap request
checkLogin();
checkSessionTimeout();
preventBackAfterLogout();
?>