<?php
require_once 'config.php';
require_login();

$result = $conn->query('SELECT * FROM barang ORDER BY id DESC');

$flash = $_SESSION['flash'] ?? '';
unset($_SESSION['flash']);

include 'header.php';
?>
<h2><?= e(t('data_list')) ?></h2>
<?php if ($flash): ?><div class="alert success"><?= e(t($flash)) ?></div><?php endif; ?>
<a class="btn" href="create.php">+ <?= e(t('add')) ?></a>

<table>
  <tr>
    <th><?= e(t('no')) ?></th><th><?= e(t('code')) ?></th><th><?= e(t('name')) ?></th>
    <th><?= e(t('category')) ?></th><th><?= e(t('qty')) ?></th><th><?= e(t('price')) ?></th><th><?= e(t('action')) ?></th>
  </tr>
  <?php if ($result->num_rows === 0): ?>
    <tr><td colspan="7"><?= e(t('empty')) ?></td></tr>
  <?php else: $no = 1; while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= e($row['kode_barang']) ?></td>
      <td><?= e($row['nama_barang']) ?></td>
      <td><?= e(t($row['kategori'])) ?></td>
      <td><?= (int)$row['jumlah'] ?></td>
      <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
      <td>
        <a class="btn small" href="edit.php?id=<?= (int)$row['id'] ?>"><?= e(t('edit')) ?></a>
        <form class="inline" method="POST" action="delete.php" onsubmit="return confirm('<?= e(t('confirm_del')) ?>')">
          <input type="hidden" name="id" value="<?= (int)$row['id'] ?>">
          <button class="btn small danger" type="submit"><?= e(t('delete')) ?></button>
        </form>
      </td>
    </tr>
  <?php endwhile; endif; ?>
</table>
<?php include 'footer.php'; ?>
