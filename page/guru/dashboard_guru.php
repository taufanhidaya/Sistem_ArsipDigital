<?php
// Ambil parameter page dari URL, default ke 'dashboard'
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

// Daftar halaman yang diizinkan
$allowed_pages = [
    'dashboard',
    'data_siswa',
    'tugas_materi',
    'penilaian',
    'arsip',
    'wali_kelas',
    'jadwal_mengajar',
    'laporan'
];

// Validasi halaman
if (!in_array($page, $allowed_pages)) {
    $page = 'dashboard';
}

// Map menu ke file
$page_files = [
    'dashboard' => 'dashboard_guru.php',
    'data_siswa' => 'data_siswa.php',
    'tugas_materi' => 'tugas_materi.php',
    'penilaian' => 'penilaian.php',
    'arsip' => 'arsip.php',
    'wali_kelas' => 'wali_kelas.php',
    'jadwal_mengajar' => 'jadwal_mengajar.php',
    'laporan' => 'laporan.php'
];

// Judul halaman
$page_titles = [
    'dashboard' => 'Dashboard Guru',
    'data_siswa' => 'Data Siswa',
    'tugas_materi' => 'Tugas & Materi',
    'penilaian' => 'Penilaian',
    'arsip' => 'Arsip',
    'wali_kelas' => 'Wali Kelas',
    'jadwal_mengajar' => 'Jadwal Mengajar',
    'laporan' => 'Laporan'
];

$current_title = $page_titles[$page] ?? 'Dashboard Guru';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $current_title; ?> - E-ARSIP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #10b981;
            --sidebar-width: 280px;
            --sidebar-collapsed: 80px;
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

        .dashboard-card {
            background-color: var(--bg-primary);
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            border: 1px solid var(--border-color);
        }

        .welcome-card {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border-radius: 1rem;
            padding: 2rem;
            color: white;
            margin-bottom: 2rem;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .welcome-card h2 {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .teacher-info {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(255,255,255,0.2);
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            margin-top: 1rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background-color: var(--bg-primary);
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }

        .stat-card.blue { border-left-color: #3b82f6; }
        .stat-card.green { border-left-color: #10b981; }
        .stat-card.purple { border-left-color: #8b5cf6; }
        .stat-card.orange { border-left-color: #f59e0b; }
        .stat-card.teal { border-left-color: #14b8a6; }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .stat-icon.blue { background: rgba(59, 130, 246, 0.1); color: #3b82f6; }
        .stat-icon.green { background: rgba(16, 185, 129, 0.1); color: #10b981; }
        .stat-icon.purple { background: rgba(139, 92, 246, 0.1); color: #8b5cf6; }
        .stat-icon.orange { background: rgba(245, 158, 11, 0.1); color: #f59e0b; }
        .stat-icon.teal { background: rgba(20, 184, 166, 0.1); color: #14b8a6; }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        .stat-label {
            color: var(--text-secondary);
            font-size: 0.875rem;
            font-weight: 500;
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-add {
            padding: 0.5rem 1.25rem;
            border-radius: 0.5rem;
            border: none;
            font-weight: 600;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.875rem;
        }

        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .class-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .class-card {
            background-color: var(--bg-primary);
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            border-top: 4px solid #10b981;
        }

        .class-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }

        .class-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 1rem;
        }

        .class-name {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.25rem;
        }

        .class-subject {
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        .class-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.75rem;
            font-weight: 600;
            background: rgba(16, 185, 129, 0.1);
            color: #10b981;
        }

        .class-stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .class-stat-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        .class-stat-item i {
            color: #10b981;
        }

        .class-actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn-class-action {
            flex: 1;
            padding: 0.5rem;
            border-radius: 0.5rem;
            border: 1px solid var(--border-color);
            background: var(--bg-primary);
            color: var(--text-primary);
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-class-action:hover {
            background: var(--bg-secondary);
        }

        .activity-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .activity-card {
            background-color: var(--bg-primary);
            border-radius: 1rem;
            padding: 1.25rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: all 0.3s ease;
        }

        .activity-card:hover {
            transform: translateX(5px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.12);
        }

        .activity-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            flex-shrink: 0;
        }

        .activity-content {
            flex: 1;
        }

        .activity-title {
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.25rem;
        }

        .activity-desc {
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        .activity-time {
            color: var(--text-secondary);
            font-size: 0.75rem;
            white-space: nowrap;
        }

        .theme-toggle, .sidebar-toggle {
            background: none;
            border: none;
            color: var(--text-primary);
            font-size: 1.25rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
        }

        .theme-toggle:hover, .sidebar-toggle:hover {
            background-color: var(--bg-secondary);
        }

        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--primary-color);
        }

        .schedule-card {
            background-color: var(--bg-primary);
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .schedule-table {
            width: 100%;
            margin-top: 1rem;
        }

        .schedule-table th {
            color: var(--text-secondary);
            font-weight: 600;
            font-size: 0.875rem;
            padding: 0.75rem;
            text-align: left;
            border-bottom: 2px solid var(--border-color);
        }

        .schedule-table td {
            padding: 1rem 0.75rem;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-primary);
        }

        .schedule-time {
            font-weight: 600;
            color: #10b981;
        }

        .schedule-class {
            font-weight: 600;
        }

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

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .class-grid {
                grid-template-columns: 1fr;
            }

            .section-title {
                flex-direction: column;
                gap: 1rem;
                align-items: start;
            }
        }
    </style>
</head>
<body class="light-theme">
    
    <div class="header d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
            <button class="sidebar-toggle" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
            <div class="logo">DASHBOARD GURU</div>
        </div>
        
        <div class="d-flex align-items-center gap-3">
            <button class="theme-toggle" id="themeToggle">
                <i class="fas fa-moon"></i>
            </button>
            <div class="position-relative">
                <i class="fas fa-bell" style="font-size: 1.25rem; cursor: pointer;"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.65rem;">5</span>
            </div>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                    <img src="https://ui-avatars.com/api/?name=Dimas+Saputra&background=10b981&color=fff" alt="Profile" class="profile-img">
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profile</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="../../login.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="sidebar" id="sidebar">
        <div class="menu-section">
            <div class="menu-section-title">Main Menu</div>
            <a href="?page=dashboard" class="menu-item <?php echo $page == 'dashboard' ? 'active' : ''; ?>" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard">
                <i class="fas fa-home"></i>
                <span>DASHBOARD</span>
            </a>
            <a href="?page=data_siswa" class="menu-item <?php echo $page == 'data_siswa' ? 'active' : ''; ?>" data-bs-toggle="tooltip" data-bs-placement="right" title="Data Siswa">
                <i class="fas fa-user-graduate"></i>
                <span>DATA SISWA</span>
            </a>
            <a href="?page=tugas_materi" class="menu-item <?php echo $page == 'tugas_materi' ? 'active' : ''; ?>" data-bs-toggle="tooltip" data-bs-placement="right" title="Tugas & Materi">
                <i class="fas fa-book-open"></i>
                <span>TUGAS & MATERI</span>
            </a>
            <a href="?page=penilaian" class="menu-item <?php echo $page == 'penilaian' ? 'active' : ''; ?>" data-bs-toggle="tooltip" data-bs-placement="right" title="Penilaian">
                <i class="fas fa-clipboard-check"></i>
                <span>PENILAIAN</span>
            </a>
            <a href="?page=arsip" class="menu-item <?php echo $page == 'arsip' ? 'active' : ''; ?>" data-bs-toggle="tooltip" data-bs-placement="right" title="Arsip">
                <i class="fas fa-archive"></i>
                <span>ARSIP</span>
            </a>
        </div>

        <div class="menu-section">
            <div class="menu-section-title">Kelas</div>
            <a href="?page=wali_kelas" class="menu-item <?php echo $page == 'wali_kelas' ? 'active' : ''; ?>" data-bs-toggle="tooltip" data-bs-placement="right" title="Wali Kelas">
                <i class="fas fa-users"></i>
                <span>WALI KELAS</span>
            </a>
            <a href="?page=jadwal_mengajar" class="menu-item <?php echo $page == 'jadwal_mengajar' ? 'active' : ''; ?>" data-bs-toggle="tooltip" data-bs-placement="right" title="Jadwal Mengajar">
                <i class="fas fa-calendar-alt"></i>
                <span>JADWAL MENGAJAR</span>
            </a>
            <a href="?page=laporan" class="menu-item <?php echo $page == 'laporan' ? 'active' : ''; ?>" data-bs-toggle="tooltip" data-bs-placement="right" title="Laporan">
                <i class="fas fa-file-alt"></i>
                <span>LAPORAN</span>
            </a>
        </div>

        <div class="menu-section">
            <a href="../../login.php" class="menu-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Log Out">
                <i class="fas fa-sign-out-alt"></i>
                <span>LOG OUT</span>
            </a>
        </div>
    </div>

    <div class="main-content" id="mainContent">
        <?php
        // Load konten berdasarkan page
        $content_file = $page_files[$page];
        $file_path = __DIR__ . '/' . $content_file;
        
        if (file_exists($file_path) && $page != 'dashboard') {
            include $file_path;
        } else {
            // Default dashboard content
            include 'dashboard_content.php';
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
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

        window.addEventListener('resize', () => {
            if (isMobile() && !sidebar.classList.contains('collapsed')) {
                sidebar.classList.add('collapsed');
                mainContent.classList.add('expanded');
                updateTooltips();
            }
        });
    </script>
</body>
</html>