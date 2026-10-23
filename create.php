<?php
require_once 'config.php';
require_login();

$errors = [];
$data = ['kode_barang' => '', 'nama_barang' => '', 'kategori' => '', 'jumlah' => '', 'harga' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    [$errors, $data] = validate_barang($_POST);

    if (empty($errors)) {
        $stmt = $conn->prepare('INSERT INTO barang (kode_barang, nama_barang, kategori, jumlah, harga) VALUES (?, ?, ?, ?, ?)');
        $stmt->bind_param('sssid', $data['kode_barang'], $data['nama_barang'], $data['kategori'], $data['jumlah'], $data['harga']);
        if ($stmt->execute()) {
            $_SESSION['flash'] = 'ok_add';
            header('Location: index.php');
            exit;
        }
        $errors[] = ($conn->errno === 1062) ? t('err_dup') : $conn->error;
    }
}
include 'header.php';
?>
<h2><?= e(t('add')) ?></h2>
<?php include '_form.php'; include 'footer.php'; ?>
