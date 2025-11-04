<?php
/**
 * ============================================
 * FILE: test_connection.php
 * File untuk test koneksi database
 * Akses via browser: http://localhost/e-arsip/test_connection.php
 * ============================================
 */

require_once 'config/connect.php';

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Koneksi Database - E-ARSIP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .test-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            max-width: 600px;
            width: 100%;
        }
        
        .test-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .test-header h2 {
            color: #1f2937;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .test-header p {
            color: #6b7280;
            font-size: 0.9rem;
        }
        
        .test-result {
            background: #f9fafb;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .test-item {
            display: flex;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .test-item:last-child {
            border-bottom: none;
        }
        
        .test-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 1.2rem;
        }
        
        .test-icon.success {
            background: #d1fae5;
            color: #059669;
        }
        
        .test-icon.error {
            background: #fee2e2;
            color: #dc2626;
        }
        
        .test-content {
            flex: 1;
        }
        
        .test-label {
            font-weight: 600;
            color: #374151;
            margin-bottom: 3px;
        }
        
        .test-value {
            color: #6b7280;
            font-size: 0.9rem;
        }
        
        .alert-custom {
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        
        .alert-custom i {
            font-size: 1.5rem;
            margin-right: 12px;
        }
        
        .btn-back {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-back:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }
        
        .code-box {
            background: #1f2937;
            color: #10b981;
            padding: 15px;
            border-radius: 10px;
            font-family: 'Courier New', monospace;
            font-size: 0.85rem;
            overflow-x: auto;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="test-card">
        <div class="test-header">
            <h2><i class="fas fa-database"></i> Test Koneksi Database</h2>
            <p>E-ARSIP - Sistem Informasi Arsip Digital</p>
        </div>

        <?php
        try {
            // Test koneksi
            $database = new Database();
            $conn = $database->getConnection();
            
            if ($conn) {
                echo '<div class="alert-custom" style="background: #d1fae5; color: #059669; border: 1px solid #a7f3d0;">
                        <i class="fas fa-check-circle"></i>
                        <div>
                            <strong>Koneksi Berhasil!</strong><br>
                            <small>Database terhubung dengan sukses</small>
                        </div>
                      </div>';
                
                echo '<div class="test-result">';
                
                // Info database
                echo '<div class="test-item">
                        <div class="test-icon success">
                            <i class="fas fa-server"></i>
                        </div>
                        <div class="test-content">
                            <div class="test-label">Database Host</div>
                            <div class="test-value">' . DB_HOST . '</div>
                        </div>
                      </div>';
                
                echo '<div class="test-item">
                        <div class="test-icon success">
                            <i class="fas fa-database"></i>
                        </div>
                        <div class="test-content">
                            <div class="test-label">Database Name</div>
                            <div class="test-value">' . DB_NAME . '</div>
                        </div>
                      </div>';
                
                echo '<div class="test-item">
                        <div class="test-icon success">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="test-content">
                            <div class="test-label">Database User</div>
                            <div class="test-value">' . DB_USER . '</div>
                        </div>
                      </div>';
                
                // Cek tabel users
                $stmt = $conn->query("SHOW TABLES LIKE 'users'");
                $table_exists = $stmt->rowCount() > 0;
                
                if ($table_exists) {
                    // Hitung jumlah user per role
                    $stmt = $conn->query("SELECT role, COUNT(*) as total FROM users GROUP BY role");
                    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    echo '<div class="test-item">
                            <div class="test-icon success">
                                <i class="fas fa-table"></i>
                            </div>
                            <div class="test-content">
                                <div class="test-label">Tabel Users</div>
                                <div class="test-value">✓ Ditemukan</div>
                            </div>
                          </div>';
                    
                    foreach ($users as $user) {
                        $role_icon = [
                            'admin' => 'fa-user-shield',
                            'guru' => 'fa-chalkboard-teacher',
                            'siswa' => 'fa-user-graduate'
                        ];
                        
                        echo '<div class="test-item">
                                <div class="test-icon success">
                                    <i class="fas ' . ($role_icon[$user['role']] ?? 'fa-users') . '"></i>
                                </div>
                                <div class="test-content">
                                    <div class="test-label">Total ' . ucfirst($user['role']) . '</div>
                                    <div class="test-value">' . $user['total'] . ' user</div>
                                </div>
                              </div>';
                    }
                } else {
                    echo '<div class="test-item">
                            <div class="test-icon error">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div class="test-content">
                                <div class="test-label">Tabel Users</div>
                                <div class="test-value">✗ Tidak ditemukan</div>
                            </div>
                          </div>';
                }
                
                echo '</div>';
                
                // Info untuk generate password
                echo '<div class="alert-custom" style="background: #dbeafe; color: #1e40af; border: 1px solid #93c5fd; margin-top: 20px;">
                        <i class="fas fa-info-circle"></i>
                        <div>
                            <strong>Generate Password Hash</strong><br>
                            <small>Gunakan kode PHP berikut untuk generate password:</small>
                        </div>
                      </div>';
                
                echo '<div class="code-box">
                        &lt;?php<br>
                        echo password_hash("password123", PASSWORD_DEFAULT);<br>
                        ?&gt;
                      </div>';
                
            } else {
                throw new Exception("Tidak dapat terhubung ke database");
            }
            
        } catch (Exception $e) {
            echo '<div class="alert-custom" style="background: #fee2e2; color: #dc2626; border: 1px solid #fca5a5;">
                    <i class="fas fa-times-circle"></i>
                    <div>
                        <strong>Koneksi Gagal!</strong><br>
                        <small>' . $e->getMessage() . '</small>
                    </div>
                  </div>';
            
            echo '<div class="test-result">';
            echo '<div class="test-item">
                    <div class="test-icon error">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="test-content">
                        <div class="test-label">Error Message</div>
                        <div class="test-value">' . $e->getMessage() . '</div>
                    </div>
                  </div>';
            echo '</div>';
            
            echo '<div class="alert-custom" style="background: #fef3c7; color: #92400e; border: 1px solid #fde68a; margin-top: 20px;">
                    <i class="fas fa-lightbulb"></i>
                    <div>
                        <strong>Solusi:</strong><br>
                        <small>
                            1. Pastikan XAMPP/WAMP sudah berjalan<br>
                            2. Cek konfigurasi di config/database.php<br>
                            3. Pastikan database "e_arsip" sudah dibuat
                        </small>
                    </div>
                  </div>';
        }
        ?>
        
        <button onclick="window.location.href='login.php'" class="btn-back">
            <i class="fas fa-arrow-left me-2"></i> Kembali ke Login
        </button>
    </div>
</body>
</html>