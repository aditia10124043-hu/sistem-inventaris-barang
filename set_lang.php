<?php
require_once 'config.php';
$lang = $_GET['lang'] ?? 'id';
if (in_array($lang, ['id', 'en'], true)) {
    $_SESSION['lang'] = $lang;   // simpan pilihan bahasa di session
}
$back = basename(parse_url($_SERVER['HTTP_REFERER'] ?? 'index.php', PHP_URL_PATH));
$query = parse_url($_SERVER['HTTP_REFERER'] ?? '', PHP_URL_QUERY);
header('Location: ' . ($back ?: 'index.php') . ($query ? '?' . $query : ''));
exit;
