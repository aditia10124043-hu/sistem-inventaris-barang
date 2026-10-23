<?php
require_once 'config.php';
require_login();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = filter_var($_POST['id'] ?? '', FILTER_VALIDATE_INT);
    if ($id) {
        $stmt = $conn->prepare('DELETE FROM barang WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $_SESSION['flash'] = 'ok_del';
    }
}
header('Location: index.php');
exit;
