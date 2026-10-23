<?php
require_once 'config.php';

if (!empty($_SESSION['user'])) { header('Location: index.php'); exit; }

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = sanitize_text($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    // Validasi kelengkapan data (if-else)
    if ($username === '' || $password === '') {
        $error = t('err_login_empty');
    } else {
        $stmt = $conn->prepare('SELECT username, password FROM users WHERE username = ?');
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();

        if ($row && password_verify($password, $row['password'])) {
            session_regenerate_id(true);
            $_SESSION['user'] = $row['username'];
            header('Location: index.php');
            exit;
        } else {
            $error = t('login_failed');
        }
    }
}
include 'header.php';
?>
<h2><?= e(t('login')) ?></h2>
<?php if ($error): ?><div class="alert error"><?= e($error) ?></div><?php endif; ?>
<form method="POST">
  <label><?= e(t('username')) ?></label>
  <input type="text" name="username" required value="<?= e($_POST['username'] ?? '') ?>">
  <label><?= e(t('password')) ?></label>
  <input type="password" name="password" required>
  <br><br>
  <button class="btn" type="submit"><?= e(t('login')) ?></button>
</form>
<?php include 'footer.php'; ?>
