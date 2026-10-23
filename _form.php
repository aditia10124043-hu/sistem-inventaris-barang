<?php /* Form bersama untuk create & edit. Butuh variabel $data dan $errors */ ?>
<?php if (!empty($errors)): ?>
  <div class="alert error"><ul style="margin:0;padding-left:18px">
    <?php foreach ($errors as $err): ?><li><?= e($err) ?></li><?php endforeach; ?>
  </ul></div>
<?php endif; ?>
<form method="POST">
  <label><?= e(t('code')) ?></label>
  <input type="text" name="kode_barang" maxlength="20" value="<?= e($data['kode_barang']) ?>">

  <label><?= e(t('name')) ?></label>
  <input type="text" name="nama_barang" value="<?= e($data['nama_barang']) ?>">

  <label><?= e(t('category')) ?></label>
  <select name="kategori">
    <option value=""><?= e(t('choose')) ?></option>
    <?php foreach (['elektronik', 'furnitur', 'alat_tulis'] as $k): ?>
      <option value="<?= $k ?>" <?= $data['kategori'] === $k ? 'selected' : '' ?>><?= e(t($k)) ?></option>
    <?php endforeach; ?>
  </select>

  <label><?= e(t('qty')) ?></label>
  <input type="number" name="jumlah" min="0" value="<?= e($data['jumlah']) ?>">

  <label><?= e(t('price')) ?></label>
  <input type="number" name="harga" min="0" step="0.01" value="<?= e($data['harga']) ?>">

  <br><br>
  <button class="btn" type="submit"><?= e(t('save')) ?></button>
  <a class="btn gray" href="index.php"><?= e(t('cancel')) ?></a>
</form>
