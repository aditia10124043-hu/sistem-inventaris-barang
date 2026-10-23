<?php
session_start();

// ---- Koneksi database ----
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'db_inventaris';

mysqli_report(MYSQLI_REPORT_OFF);
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die('Koneksi gagal: ' . $conn->connect_error);
}
$conn->set_charset('utf8mb4');

require_once __DIR__ . '/lang.php';

// Sanitasi output (mencegah XSS)
function e($str) {
    return htmlspecialchars((string)$str, ENT_QUOTES, 'UTF-8');
}

// Sanitasi input teks: buang tag HTML/PHP dan spasi berlebih
function sanitize_text($str) {
    return trim(strip_tags((string)$str));
}

// Proteksi halaman: wajib login
function require_login() {
    if (empty($_SESSION['user'])) {
        header('Location: login.php');
        exit;
    }
}

// Validasi input form barang. Return [errors, data]
function validate_barang(array $post) {
    $errors = [];

    $kode     = sanitize_text($post['kode_barang'] ?? '');
    $nama     = sanitize_text($post['nama_barang'] ?? '');
    $kategori = $post['kategori'] ?? '';
    $jumlah   = filter_var($post['jumlah'] ?? '', FILTER_VALIDATE_INT);
    $harga    = filter_var($post['harga'] ?? '', FILTER_VALIDATE_FLOAT);

    // if-else
    if ($kode === '' || strlen($kode) > 20) {
        $errors[] = t('err_code');
    }
    if ($nama === '' || strlen($nama) > 100) {
        $errors[] = t('err_name');
    }

    // switch
    switch ($kategori) {
        case 'elektronik':
        case 'furnitur':
        case 'alat_tulis':
            break; // valid
        default:
            $errors[] = t('err_category');
    }

    if ($jumlah === false || $jumlah < 0) {
        $errors[] = t('err_qty');
    }
    if ($harga === false || $harga < 0) {
        $errors[] = t('err_price');
    }

    return [$errors, [
        'kode_barang' => $kode, 'nama_barang' => $nama, 'kategori' => $kategori,
        'jumlah' => $jumlah, 'harga' => $harga,
    ]];
}
