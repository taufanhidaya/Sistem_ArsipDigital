<?php
/**
 * ============================================
 * FILE: index.php
 * Routing utama setelah login
 * Mengarahkan user ke dashboard sesuai role
 * ============================================
 */

session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
    // Jika belum login, redirect ke halaman login
    header('Location: login.php?error=unauthorized');
    exit();
}

// Cek timeout session (opsional - 30 menit)
$timeout_duration = 1800; // 30 menit dalam detik
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
    // Session timeout
    session_unset();
    session_destroy();
    header('Location: login.php?error=session_timeout');
    exit();
}

// Update last activity time
$_SESSION['last_activity'] = time();

// Ambil role dari session
$role = $_SESSION['role'];

// Routing berdasarkan role
switch ($role) {
    case 'admin':
        header('Location: page/admin/dashboard_admin.php');
        exit();
        break;
        
    case 'guru':
        header('Location: page/guru/dashboard_guru.php');
        exit();
        break;
        
    case 'siswa':
        header('Location: page/siswa/dashboard_siswa.php');
        exit();
        break;
        
    default:
        // Jika role tidak dikenali, logout dan redirect ke login
        session_unset();
        session_destroy();
        header('Location: login.php?error=invalid_role');
        exit();
        break;
}
?>


<!-- ============================================ -->
<!-- FILE 3: page/admin/dashboard_admin.php (UPDATED) -->
<!-- Dashboard Admin dengan Proteksi Session -->
<!-- ============================================ -->

<?php
/**
 * ============================================
 * Proteksi Session - Harus di awal file
 * ============================================
 */
session_start();

// Cek apakah user sudah login dan memiliki role admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../../login.php?error=unauthorized');
    exit();
}

// Cek timeout session (30 menit)
$timeout_duration = 1800;
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
    session_unset();
    session_destroy();
    header('Location: ../../login.php?error=session_timeout');
    exit();
}

// Update last activity
$_SESSION['last_activity'] = time();

// Ambil data user dari session
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$nama_lengkap = isset($_SESSION['nama_lengkap']) ? $_SESSION['nama_lengkap'] : $username;

// Ambil parameter page dari URL, default ke 'dashboard'
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

// Daftar halaman yang diizinkan
$allowed_pages = [
    'dashboard',
    'manajemen_siswa',
    'manajemen_guru',
    'manajemen_admin',
    'manajemen_pelajaran',
    'manajemen_arsip',
    'manajemen_kelas',
    'laporan',
    'pengaturan'
];

// Validasi halaman
if (!in_array($page, $allowed_pages)) {
    $page = 'dashboard';
}

// Map menu ke file
$page_files = [
    'dashboard' => 'dashboard_content.php',
    'manajemen_siswa' => 'manajemen_siswa.php',
    'manajemen_guru' => 'manajemen_guru.php',
    'manajemen_admin' => 'manajemen_admin.php',
    'manajemen_pelajaran' => 'manajemen_pelajaran.php',
    'manajemen_arsip' => 'manajemen_arsip.php',
    'manajemen_kelas' => 'manajemen_kelas.php',
    'laporan' => 'laporan.php',
    'pengaturan' => 'pengaturan.php'
];

// Judul halaman
$page_titles = [
    'dashboard' => 'Dashboard Admin',
    'manajemen_siswa' => 'Manajemen Siswa',
    'manajemen_guru' => 'Manajemen Guru',
    'manajemen_admin' => 'Manajemen Admin',
    'manajemen_pelajaran' => 'Manajemen Pelajaran',
    'manajemen_arsip' => 'Manajemen Arsip',
    'manajemen_kelas' => 'Manajemen Kelas',
    'laporan' => 'Laporan',
    'pengaturan' => 'Pengaturan'
];

$current_title = $page_titles[$page] ?? 'Dashboard Admin';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $current_title; ?> - E-ARSIP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        :root {
            --primary-color: #10b981;
            --sidebar-width: 280px;
            --sidebar-collapsed: 80px;
            --dark-bg: #1f2937;
            --darker-bg: #111827;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f4f6;
            overflow-x: hidden;
        }

        .light-theme {
            --bg-primary: #ffffff;
            --bg-secondary: #f3f4f6;
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --border-color: #e5e7eb;
        }

        .dark-theme {
            --bg-primary: #1f2937;
            --bg-secondary: #111827;
            --text-primary: #f9fafb;
            --text-secondary: #9ca3af;
            --border-color: #374151;
        }

        body {
            background-color: var(--bg-secondary);
            color: var(--text-primary);
        }

        /* Header */
        .header {
            background-color: var(--bg-primary);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 1rem 1.5rem;
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1030;
            transition: all 0.3s ease;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--text-primary);
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            left: 0;
            top: 70px;
            bottom: 0;
            width: var(--sidebar-width);
            background: linear-gradient(180deg, #10b981 0%, #059669 100%);
            padding: 1.5rem 0;
            overflow-y: auto;
            transition: all 0.3s ease;
            z-index: 1020;
        }

        .sidebar.collapsed {
            width: var(--sidebar-collapsed);
        }

        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.3);
            border-radius: 3px;
        }

        .menu-section {
            margin-bottom: 2rem;
            padding: 0 1rem;
        }

        .menu-section-title {
            color: rgba(255,255,255,0.7);
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.5rem;
            padding: 0 0.75rem;
            transition: all 0.3s ease;
        }

        .sidebar.collapsed .menu-section-title {
            opacity: 0;
            height: 0;
            margin: 0;
            padding: 0;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 0.875rem 0.75rem;
            color: white;
            text-decoration: none;
            border-radius: 0.5rem;
            margin-bottom: 0.25rem;
            transition: all 0.2s ease;
            position: relative;
        }

        .menu-item:hover {
            background-color: rgba(255,255,255,0.1);
            color: white;
        }

        .menu-item.active {
            background-color: rgba(255,255,255,0.2);
            font-weight: 600;
        }

        .menu-item i {
            width: 24px;
            font-size: 1.25rem;
            margin-right: 1rem;
            transition: all 0.3s ease;
        }

        .sidebar.collapsed .menu-item i {
            margin-right: 0;
        }

        .menu-item span {
            transition: all 0.3s ease;
        }

        .sidebar.collapsed .menu-item span {
            opacity: 0;
            width: 0;
            display: none;
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            margin-top: 70px;
            padding: 2rem;
            transition: all 0.3s ease;
            min-height: calc(100vh - 70px);
        }

        .main-content.expanded {
            margin-left: var(--sidebar-collapsed);
        }

        /* Stats Cards */
        .stat-card {
            background-color: var(--bg-primary);
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border: 1px solid var(--border-color);
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        /* Profile */
        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--primary-color);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: var(--sidebar-collapsed);
            }

            .sidebar .menu-section-title {
                opacity: 0;
                height: 0;
                margin: 0;
            }

            .sidebar .menu-item span {
                display: none;
            }

            .main-content {
                margin-left: var(--sidebar-collapsed);
                padding: 1rem;
            }
        }
    </style>
</head>
<body class="light-theme">
    
    <!-- Header -->
    <div class="header d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
            <button class="sidebar-toggle" id="sidebarToggle" style="background: none; border: none; color: var(--text-primary); font-size: 1.25rem; cursor: pointer; padding: 0.5rem; border-radius: 0.5rem;">
                <i class="fas fa-bars"></i>
            </button>
            <div class="logo">DASHBOARD ADMIN</div>
        </div>
        
        <div class="d-flex align-items-center gap-3">
            <button class="theme-toggle" id="themeToggle" style="background: none; border: none; color: var(--text-primary); font-size: 1.25rem; cursor: pointer; padding: 0.5rem; border-radius: 0.5rem;">
                <i class="fas fa-moon"></i>
            </button>
            <div class="position-relative">
                <i class="fas fa-bell" style="font-size: 1.25rem; cursor: pointer;"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.65rem;">3</span>
            </div>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                    <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($nama_lengkap); ?>&background=10b981&color=fff" alt="Profile" class="profile-img">
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li class="px-3 py-2">
                        <div class="fw-bold"><?php echo htmlspecialchars($nama_lengkap); ?></div>
                        <small class="text-muted"><?php echo htmlspecialchars($username); ?></small>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="?page=pengaturan"><i class="fas fa-user me-2"></i>Profile</a></li>
                    <li><a class="dropdown-item" href="?page=pengaturan"><i class="fas fa-cog me-2"></i>Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#" onclick="confirmLogout(event)"><i class="fas fa-sign-out-alt me-2 text-danger"></i><span class="text-danger">Logout</span></a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="menu-section">
            <div class="menu-section-title">Main Menu</div>
            <a href="?page=dashboard" class="menu-item <?php echo $page == 'dashboard' ? 'active' : ''; ?>" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard">
                <i class="fas fa-home"></i>
                <span>DASHBOARD</span>
            </a>
        </div>

        <div class="menu-section">
            <div class="menu-section-title">Manajemen Data</div>
            <a href="?page=manajemen_siswa" class="menu-item <?php echo $page == 'manajemen_siswa' ? 'active' : ''; ?>" data-bs-toggle="tooltip" data-bs-placement="right" title="Manajemen Siswa">
                <i class="fas fa-user-graduate"></i>
                <span>MANAJEMEN SISWA</span>
            </a>
            <a href="?page=manajemen_guru" class="menu-item <?php echo $page == 'manajemen_guru' ? 'active' : ''; ?>" data-bs-toggle="tooltip" data-bs-placement="right" title="Manajemen Guru">
                <i class="fas fa-chalkboard-teacher"></i>
                <span>MANAJEMEN GURU</span>
            </a>
            <a href="?page=manajemen_admin" class="menu-item <?php echo $page == 'manajemen_admin' ? 'active' : ''; ?>" data-bs-toggle="tooltip" data-bs-placement="right" title="Manajemen Admin">
                <i class="fas fa-user-shield"></i>
                <span>MANAJEMEN ADMIN</span>
            </a>
        </div>

        <div class="menu-section">
            <div class="menu-section-title">Akademik</div>
            <a href="?page=manajemen_pelajaran" class="menu-item <?php echo $page == 'manajemen_pelajaran' ? 'active' : ''; ?>" data-bs-toggle="tooltip" data-bs-placement="right" title="Manajemen Pelajaran">
                <i class="fas fa-book"></i>
                <span>MANAJEMEN PELAJARAN</span>
            </a>
            <a href="?page=manajemen_arsip" class="menu-item <?php echo $page == 'manajemen_arsip' ? 'active' : ''; ?>" data-bs-toggle="tooltip" data-bs-placement="right" title="Manajemen Arsip">
                <i class="fas fa-archive"></i>
                <span>MANAJEMEN ARSIP</span>
            </a>
            <a href="?page=manajemen_kelas" class="menu-item <?php echo $page == 'manajemen_kelas' ? 'active' : ''; ?>" data-bs-toggle="tooltip" data-bs-placement="right" title="Manajemen Kelas">
                <i class="fas fa-door-open"></i>
                <span>MANAJEMEN KELAS</span>
            </a>
            <a href="?page=laporan" class="menu-item <?php echo $page == 'laporan' ? 'active' : ''; ?>" data-bs-toggle="tooltip" data-bs-placement="right" title="Laporan">
                <i class="fas fa-file-alt"></i>
                <span>LAPORAN</span>
            </a>
        </div>

        <div class="menu-section">
            <div class="menu-section-title">Pengaturan</div>
            <a href="?page=pengaturan" class="menu-item <?php echo $page == 'pengaturan' ? 'active' : ''; ?>" data-bs-toggle="tooltip" data-bs-placement="right" title="Pengaturan">
                <i class="fas fa-cog"></i>
                <span>PENGATURAN</span>
            </a>
            <a href="#" onclick="confirmLogout(event)" class="menu-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Log Out">
                <i class="fas fa-sign-out-alt"></i>
                <span>LOG OUT</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <?php
        // Load konten berdasarkan page
        $content_file = $page_files[$page];
        $file_path = __DIR__ . '/' . $content_file;
        
        if (file_exists($file_path)) {
            include $file_path;
        } else {
            echo '<div class="alert alert-warning">Halaman tidak ditemukan!</div>';
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Sidebar Toggle
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const sidebarToggle = document.getElementById('sidebarToggle');
        let tooltipList = [];

        function isMobile() {
            return window.innerWidth <= 768;
        }

        if (isMobile()) {
            sidebar.classList.add('collapsed');
            mainContent.classList.add('expanded');
        }

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
            updateTooltips();
        });

        function updateTooltips() {
            tooltipList.forEach(tooltip => tooltip.dispose());
            tooltipList = [];
            
            if (sidebar.classList.contains('collapsed')) {
                const tooltipElements = document.querySelectorAll('[data-bs-toggle="tooltip"]');
                tooltipList = [...tooltipElements].map(el => {
                    return new bootstrap.Tooltip(el, {
                        trigger: 'hover'
                    });
                });
            }
        }

        updateTooltips();

        // Theme Toggle
        const themeToggle = document.getElementById('themeToggle');
        const body = document.body;

        themeToggle.addEventListener('click', () => {
            body.classList.toggle('dark-theme');
            body.classList.toggle('light-theme');
            
            const icon = themeToggle.querySelector('i');
            if (body.classList.contains('dark-theme')) {
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
                localStorage.setItem('theme', 'dark');
            } else {
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');
                localStorage.setItem('theme', 'light');
            }
        });

        // Load saved theme
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'dark') {
            body.classList.remove('light-theme');
            body.classList.add('dark-theme');
            document.querySelector('#themeToggle i').classList.replace('fa-moon', 'fa-sun');
        }

        // Responsive
        window.addEventListener('resize', () => {
            if (isMobile() && !sidebar.classList.contains('collapsed')) {
                sidebar.classList.add('collapsed');
                mainContent.classList.add('expanded');
                updateTooltips();
            }
        });

        // Logout Confirmation
        function confirmLogout(event) {
            event.preventDefault();
            
            Swal.fire({
                title: 'Konfirmasi Logout',
                text: "Apakah Anda yakin ingin keluar dari sistem?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: '<i class="fas fa-sign-out-alt me-2"></i>Ya, Logout',
                cancelButtonText: '<i class="fas fa-times me-2"></i>Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Tampilkan loading
                    Swal.fire({
                        title: 'Logging out...',
                        text: 'Mohon tunggu sebentar',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                    
                    // Redirect ke logout.php
                    setTimeout(() => {
                        window.location.href = '../../logout.php';
                    }, 500);
                }
            });
        }

        // Auto logout jika session timeout (cek setiap 1 menit)
        setInterval(() => {
            fetch('../../check_session.php')
                .then(response => response.json())
                .then(data => {
                    if (!data.active) {
                        Swal.fire({
                            title: 'Session Berakhir',
                            text: 'Sesi Anda telah berakhir. Silakan login kembali.',
                            icon: 'warning',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            confirmButtonText: 'OK'
                        }).then(() => {
                            window.location.href = '../../login.php?error=session_timeout';
                        });
                    }
                });
        }, 60000); // Cek setiap 60 detik
    </script>
</body>
</html>