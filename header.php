<?php /* dipanggil setelah config.php */ ?>
<!DOCTYPE html>
<html lang="<?= e($_SESSION['lang']) ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e(t('app_title')) ?></title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="nav">
  <strong><?= e(t('app_title')) ?></strong>
  <div>
    <a href="set_lang.php?lang=id">ID</a> | <a href="set_lang.php?lang=en">EN</a>
    <?php if (!empty($_SESSION['user'])): ?>
      &nbsp;|&nbsp; <?= e(t('welcome')) ?>, <?= e($_SESSION['user']) ?>
      &nbsp;<a class="btn small" href="logout.php"><?= e(t('logout')) ?></a>
    <?php endif; ?>
  </div>
</nav>
<main class="container">
