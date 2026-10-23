<?php
require_once 'config.php';
require_login();

$id = filter_var($_GET['id'] ?? '', FILTER_VALIDATE_INT);
if (!$id) { header('Location: index.php'); exit; }

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    [$errors, $data] = validate_barang($_POST);

    if (empty($errors)) {
        $stmt = $conn->prepare('UPDATE barang SET kode_barang=?, nama_barang=?, kategori=?, jumlah=?, harga=? WHERE id=?');
        $stmt->bind_param('sssidi', $data['kode_barang'], $data['nama_barang'], $data['kategori'], $data['jumlah'], $data['harga'], $id);
        if ($stmt->execute()) {
            $_SESSION['flash'] = 'ok_edit';
            header('Location: index.php');
            exit;
        }
        $errors[] = ($conn->errno === 1062) ? t('err_dup') : $conn->error;
    }
} else {
    $stmt = $conn->prepare('SELECT kode_barang, nama_barang, kategori, jumlah, harga FROM barang WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $data = $stmt->get_result()->fetch_assoc();
    if (!$data) { $_SESSION['flash'] = 'not_found'; header('Location: index.php'); exit; }
}
include 'header.php';
?>
<h2><?= e(t('edit')) ?></h2>
<?php include '_form.php'; include 'footer.php'; ?>
