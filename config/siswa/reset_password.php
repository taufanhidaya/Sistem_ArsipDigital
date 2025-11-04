<?php
session_start();
require_once 'db_connect.php';

function generate_password($length = 10){
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#%';
    $p = '';
    for($i=0;$i<$length;$i++) $p .= $chars[random_int(0, strlen($chars)-1)];
    return $p;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['id_user'])) {
    $_SESSION['error'] = "Invalid request.";
    header("Location: dashboard_siswa.php");
    exit;
}

$id_user = (int)$_POST['id_user'];

// cek user exist
$stmt = $conn->prepare("SELECT username FROM user WHERE id_user = ?");
$stmt->bind_param("i", $id_user);
$stmt->execute();
$res = $stmt->get_result();
if ($res->num_rows === 0) {
    $_SESSION['error'] = "User tidak ditemukan.";
    header("Location: dashboard_siswa.php");
    exit;
}
$row = $res->fetch_assoc();
$username = $row['username'];
$stmt->close();

$newpass = generate_password(10);
$hash = password_hash($newpass, PASSWORD_DEFAULT);

$stmt = $conn->prepare("UPDATE user SET password = ?, updated_at = NOW() WHERE id_user = ?");
$stmt->bind_param("si", $hash, $id_user);
if ($stmt->execute()) {
    $u = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
    $p = htmlspecialchars($newpass, ENT_QUOTES, 'UTF-8');
    $_SESSION['success'] = "Password berhasil direset untuk user <strong>{$u}</strong>.<br>Password baru (lihat sekali): <strong>{$p}</strong>";
} else {
    $_SESSION['error'] = "Gagal reset password.";
}
$stmt->close();

header("Location: dashboard_siswa.php");
exit;
