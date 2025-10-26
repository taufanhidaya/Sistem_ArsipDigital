<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-ARSIP - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #10b981;
            --primary-dark: #059669;
            --primary-light: #34d399;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        /* Animated Background */
        body::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -250px;
            right: -250px;
            animation: float 6s ease-in-out infinite;
        }

        body::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            bottom: -150px;
            left: -150px;
            animation: float 8s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            max-width: 950px;
            width: 100%;
            display: flex;
            position: relative;
            z-index: 1;
            max-height: 90vh;
        }

        .login-left {
            flex: 1;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            padding: 40px 35px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .login-left::before {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -100px;
            right: -100px;
        }

        .login-left::after {
            content: '';
            position: absolute;
            width: 150px;
            height: 150px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            bottom: -75px;
            left: -75px;
        }

        .logo-section {
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .logo-icon {
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .logo-icon i {
            font-size: 40px;
            color: var(--primary-color);
        }

        .logo-text {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 8px;
            letter-spacing: 2px;
        }

        .logo-subtitle {
            font-size: 0.9rem;
            opacity: 0.9;
            margin-bottom: 25px;
        }

        .feature-list {
            list-style: none;
            margin-top: 20px;
        }

        .feature-list li {
            padding: 8px 0;
            display: flex;
            align-items: center;
            font-size: 0.875rem;
        }

        .feature-list li i {
            margin-right: 12px;
            font-size: 1rem;
        }

        .login-right {
            flex: 1;
            padding: 35px 40px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 25px;
        }

        .login-header h2 {
            color: #1f2937;
            font-weight: 700;
            margin-bottom: 8px;
            font-size: 1.5rem;
        }

        .login-header p {
            color: #6b7280;
            font-size: 0.875rem;
        }

        .role-selector {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-bottom: 20px;
        }

        .role-card {
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            padding: 15px 8px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }

        .role-card:hover {
            border-color: var(--primary-light);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
        }

        .role-card.active {
            border-color: var(--primary-color);
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(5, 150, 105, 0.1) 100%);
        }

        .role-card input[type="radio"] {
            display: none;
        }

        .role-icon {
            width: 45px;
            height: 45px;
            margin: 0 auto 8px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            transition: all 0.3s ease;
        }

        .role-card.active .role-icon {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            transform: scale(1.1);
        }

        .role-card:not(.active) .role-icon {
            background: #f3f4f6;
            color: #6b7280;
        }

        .role-label {
            font-weight: 600;
            font-size: 0.85rem;
            color: #1f2937;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-label {
            display: block;
            margin-bottom: 6px;
            color: #374151;
            font-weight: 500;
            font-size: 0.85rem;
        }

        .form-control {
            width: 100%;
            padding: 10px 14px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        .input-icon {
            position: relative;
        }

        .input-icon i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 0.9rem;
        }

        .input-icon .form-control {
            padding-left: 40px;
        }

        .password-toggle {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #9ca3af;
            font-size: 0.9rem;
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
            font-size: 0.85rem;
        }

        .remember-me {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .remember-me input[type="checkbox"] {
            width: 16px;
            height: 16px;
            margin-right: 6px;
            cursor: pointer;
            accent-color: var(--primary-color);
        }

        .forgot-password {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .divider {
            text-align: center;
            margin: 18px 0;
            position: relative;
        }

        .divider::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            width: 100%;
            height: 1px;
            background: #e5e7eb;
        }

        .divider span {
            background: white;
            padding: 0 12px;
            position: relative;
            color: #9ca3af;
            font-size: 0.8rem;
        }

        .social-login {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px;
        }

        .btn-social {
            padding: 10px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            background: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            font-size: 0.85rem;
        }

        .btn-social:hover {
            border-color: var(--primary-color);
            background: #f0fdf4;
        }

        .btn-social i {
            font-size: 1.1rem;
        }

        .footer-text {
            text-align: center;
            margin-top: 18px;
            color: #6b7280;
            font-size: 0.85rem;
        }

        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            .login-container {
                flex-direction: column;
                max-width: 500px;
                max-height: 95vh;
                overflow-y: auto;
            }

            .login-left {
                padding: 30px 25px;
                min-height: auto;
            }

            .login-right {
                padding: 30px 25px;
            }

            .role-selector {
                grid-template-columns: repeat(3, 1fr);
                gap: 10px;
            }

            .role-card {
                padding: 12px 6px;
            }

            .role-icon {
                width: 40px;
                height: 40px;
                font-size: 1.1rem;
                margin-bottom: 6px;
            }

            .role-label {
                font-size: 0.75rem;
            }

            .feature-list {
                margin-top: 15px;
            }

            .feature-list li {
                padding: 6px 0;
                font-size: 0.8rem;
            }

            .feature-list li i {
                font-size: 0.9rem;
                margin-right: 10px;
            }

            .logo-text {
                font-size: 1.75rem;
            }

            .logo-subtitle {
                font-size: 0.85rem;
            }

            .logo-icon {
                width: 70px;
                height: 70px;
                margin-bottom: 12px;
            }

            .logo-icon i {
                font-size: 35px;
            }

            .login-header h2 {
                font-size: 1.3rem;
            }

            .login-header p {
                font-size: 0.8rem;
            }

            .form-label {
                font-size: 0.8rem;
            }

            .form-control {
                padding: 9px 12px;
                font-size: 0.85rem;
            }

            .input-icon .form-control {
                padding-left: 35px;
            }

            .input-icon i {
                left: 12px;
                font-size: 0.85rem;
            }

            .password-toggle {
                right: 12px;
                font-size: 0.85rem;
            }

            .remember-forgot {
                font-size: 0.8rem;
            }

            .remember-me input[type="checkbox"] {
                width: 14px;
                height: 14px;
            }

            .btn-login {
                padding: 11px;
                font-size: 0.9rem;
            }

            .social-login {
                gap: 8px;
            }

            .btn-social {
                padding: 9px 6px;
                font-size: 0.8rem;
                gap: 6px;
            }

            .btn-social i {
                font-size: 1rem;
            }

            .footer-text {
                font-size: 0.8rem;
                margin-top: 15px;
            }

            .divider {
                margin: 15px 0;
            }

            .divider span {
                font-size: 0.75rem;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 5px;
            }

            .login-container {
                border-radius: 15px;
                max-width: 100%;
            }

            .login-left {
                padding: 25px 20px;
            }

            .login-right {
                padding: 25px 20px;
            }

            .logo-text {
                font-size: 1.5rem;
            }

            .logo-icon {
                width: 60px;
                height: 60px;
            }

            .logo-icon i {
                font-size: 30px;
            }

            .role-selector {
                gap: 8px;
            }

            .role-card {
                padding: 10px 4px;
            }

            .role-icon {
                width: 35px;
                height: 35px;
                font-size: 1rem;
            }

            .role-label {
                font-size: 0.7rem;
            }

            .login-header h2 {
                font-size: 1.2rem;
            }

            .form-group {
                margin-bottom: 14px;
            }

            .btn-social span {
                display: none;
            }

            .social-login {
                grid-template-columns: 1fr 1fr;
            }

            .btn-social {
                justify-content: center;
                padding: 11px 8px;
            }

            .btn-social i {
                font-size: 1.2rem;
                margin: 0;
            }
        }

        @media (max-width: 360px) {
            .role-selector {
                gap: 6px;
            }

            .role-card {
                padding: 8px 3px;
            }

            .role-icon {
                width: 32px;
                height: 32px;
                font-size: 0.9rem;
                margin-bottom: 4px;
            }

            .role-label {
                font-size: 0.65rem;
            }

            .remember-forgot {
                flex-direction: column;
                gap: 8px;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Left Side -->
        <div class="login-left">
            <div class="logo-section">
                <div class="logo-icon">
                    <i class="fas fa-archive"></i>
                </div>
                <h1 class="logo-text">E-ARSIP</h1>
                <p class="logo-subtitle">Sistem Informasi Arsip Digital</p>
                
                <ul class="feature-list">
                    <li>
                        <i class="fas fa-check-circle"></i>
                        <span>Manajemen Arsip Digital</span>
                    </li>
                    <li>
                        <i class="fas fa-check-circle"></i>
                        <span>Keamanan Data Terjamin</span>
                    </li>
                    <li>
                        <i class="fas fa-check-circle"></i>
                        <span>Akses Multi Platform</span>
                    </li>
                    <li>
                        <i class="fas fa-check-circle"></i>
                        <span>Mudah & Efisien</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Right Side -->
        <div class="login-right">
            <div class="login-header">
                <h2>Selamat Datang!</h2>
                <p>Silakan login untuk melanjutkan ke dashboard</p>
            </div>

            <form id="loginForm">
                <!-- Role Selector -->
                <div class="role-selector">
                    <label class="role-card active">
                        <input type="radio" name="role" value="admin" checked>
                        <div class="role-icon">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <div class="role-label">Admin</div>
                    </label>
                    
                    <label class="role-card">
                        <input type="radio" name="role" value="guru">
                        <div class="role-icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="role-label">Guru</div>
                    </label>
                    
                    <label class="role-card">
                        <input type="radio" name="role" value="siswa">
                        <div class="role-icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="role-label">Siswa</div>
                    </label>
                </div>

                <!-- Username/Email -->
                <div class="form-group">
                    <label class="form-label">Username atau Email</label>
                    <div class="input-icon">
                        <i class="fas fa-user"></i>
                        <input type="text" class="form-control" placeholder="Masukkan username atau email" required>
                    </div>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <div class="input-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" class="form-control" id="password" placeholder="Masukkan password" required>
                        <i class="fas fa-eye password-toggle" id="togglePassword"></i>
                    </div>
                </div>

                <!-- Remember & Forgot -->
                <div class="remember-forgot">
                    <label class="remember-me">
                        <input type="checkbox">
                        <span>Ingat Saya</span>
                    </label>
                    <a href="#" class="forgot-password">Lupa Password?</a>
                </div>

                <!-- Login Button -->
                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt me-2"></i>
                    Login Sekarang
                </button>

                <!-- Divider -->
                <div class="divider">
                    <span>Atau login dengan</span>
                </div>

                <!-- Social Login -->
                <div class="social-login">
                    <button type="button" class="btn-social">
                        <i class="fab fa-google" style="color: #DB4437;"></i>
                        <span>Google</span>
                    </button>
                    <button type="button" class="btn-social">
                        <i class="fab fa-microsoft" style="color: #00A4EF;"></i>
                        <span>Microsoft</span>
                    </button>
                </div>

                <!-- Footer -->
                <div class="footer-text">
                    Belum punya akun? <a href="#" class="forgot-password">Hubungi Admin</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Role Card Selection
        const roleCards = document.querySelectorAll('.role-card');
        roleCards.forEach(card => {
            card.addEventListener('click', () => {
                roleCards.forEach(c => c.classList.remove('active'));
                card.classList.add('active');
                card.querySelector('input[type="radio"]').checked = true;
            });
        });

        // Password Toggle
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');

        togglePassword.addEventListener('click', () => {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            
            togglePassword.classList.toggle('fa-eye');
            togglePassword.classList.toggle('fa-eye-slash');
        });

        // Form Submit
        const loginForm = document.getElementById('loginForm');
        loginForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const selectedRole = document.querySelector('input[name="role"]:checked').value;
            const username = loginForm.querySelector('input[type="text"]').value;
            const passwordValue = password.value;
            
            // Simulasi login
            console.log('Login sebagai:', selectedRole);
            console.log('Username:', username);
            console.log('Password:', passwordValue);
            
            // Redirect ke dashboard (ganti dengan URL dashboard Anda)
            alert(`Login berhasil sebagai ${selectedRole}!\n\nUsername: ${username}`);
            // window.location.href = 'dashboard.html';
        });
    </script>
</body>
</html>