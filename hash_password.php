<?php
/**
 * ============================================
 * FILE: hash_password.php
 * Tool untuk generate password hash
 * Gunakan file ini untuk membuat hash password baru
 * ============================================
 */

// Cek jika ada parameter password dari URL atau form
if (isset($_POST['password']) || isset($_GET['password'])) {
    $password = $_POST['password'] ?? $_GET['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    
    echo "<div style='font-family: monospace; padding: 20px; background: #f0f9ff; border: 2px solid #10b981; border-radius: 10px; margin: 20px;'>";
    echo "<h2 style='color: #10b981;'>Password Hash Generator</h2>";
    echo "<p><strong>Original Password:</strong> " . htmlspecialchars($password) . "</p>";
    echo "<p><strong>Hashed Password:</strong></p>";
    echo "<textarea style='width: 100%; padding: 10px; font-family: monospace; background: #fff; border: 1px solid #ddd; border-radius: 5px;' rows='3' readonly>" . $hash . "</textarea>";
    echo "<p style='color: #666; font-size: 0.9em;'>Copy hash di atas dan paste ke database untuk field password</p>";
    echo "</div>";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Hash Generator - E-ARSIP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            max-width: 600px;
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }
        .btn-generate {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border: none;
            padding: 12px 30px;
            border-radius: 10px;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-generate:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
            color: white;
        }
        h1 {
            color: #1f2937;
            margin-bottom: 10px;
        }
        .subtitle {
            color: #6b7280;
            margin-bottom: 30px;
        }
        .form-label {
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }
        .form-control {
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            padding: 12px;
        }
        .form-control:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }
        .info-box {
            background: #f0f9ff;
            border-left: 4px solid #10b981;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }
        .info-box h6 {
            color: #10b981;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .info-box ul {
            margin: 0;
            padding-left: 20px;
        }
        .info-box li {
            color: #374151;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">🔐 Password Hash Generator</h1>
        <p class="subtitle text-center">Tool untuk generate password hash untuk sistem E-ARSIP</p>
        
        <form method="POST" action="">
            <div class="mb-3">
                <label for="password" class="form-label">Masukkan Password</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="Contoh: password123" required>
                <small class="text-muted">Password akan di-hash menggunakan bcrypt (PASSWORD_DEFAULT)</small>
            </div>
            
            <button type="submit" class="btn btn-generate w-100">Generate Hash</button>
        </form>
        
        <div class="info-box">
            <h6>📋 Cara Menggunakan:</h6>
            <ul>
                <li>Masukkan password yang ingin di-hash</li>
                <li>Klik tombol "Generate Hash"</li>
                <li>Copy hash yang dihasilkan</li>
                <li>Paste ke database pada field <code>password</code></li>
                <li>Password sudah siap digunakan untuk login</li>
            </ul>
        </div>
        
        <div class="info-box mt-3">
            <h6>⚠️ Password Default Sistem:</h6>
            <ul>
                <li><strong>Semua user:</strong> password123</li>
                <li>Gunakan SQL script yang sudah disediakan untuk setup awal</li>
                <li>Setelah login pertama kali, ubah password default</li>
            </ul>
        </div>
    </div>
</body>
</html>