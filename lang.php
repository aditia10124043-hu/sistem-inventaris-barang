<?php
// Kamus bahasa. Pilihan bahasa disimpan di $_SESSION['lang']
$translations = [
  'id' => [
    'app_title' => 'Sistem Inventaris Barang', 'login' => 'Masuk', 'logout' => 'Keluar',
    'username' => 'Nama Pengguna', 'password' => 'Kata Sandi', 'login_failed' => 'Nama pengguna atau kata sandi salah.',
    'welcome' => 'Halo', 'data_list' => 'Daftar Barang', 'add' => 'Tambah Barang', 'edit' => 'Ubah', 'delete' => 'Hapus',
    'no' => 'No', 'code' => 'Kode', 'name' => 'Nama Barang', 'category' => 'Kategori', 'qty' => 'Jumlah', 'price' => 'Harga',
    'action' => 'Aksi', 'save' => 'Simpan', 'cancel' => 'Batal', 'choose' => '-- Pilih --',
    'elektronik' => 'Elektronik', 'furnitur' => 'Furnitur', 'alat_tulis' => 'Alat Tulis',
    'err_code' => 'Kode barang wajib diisi (maks. 20 karakter).', 'err_name' => 'Nama barang wajib diisi (maks. 100 karakter).', 'err_login_empty' => 'Nama pengguna dan kata sandi wajib diisi.',
    'err_category' => 'Kategori tidak valid.', 'err_qty' => 'Jumlah harus bilangan bulat >= 0.',
    'err_price' => 'Harga harus angka >= 0.', 'err_dup' => 'Kode barang sudah dipakai.',
    'ok_add' => 'Data berhasil ditambahkan.', 'ok_edit' => 'Data berhasil diubah.', 'ok_del' => 'Data berhasil dihapus.',
    'confirm_del' => 'Yakin ingin menghapus data ini?', 'empty' => 'Belum ada data.', 'not_found' => 'Data tidak ditemukan.',
  ],
  'en' => [
    'app_title' => 'Inventory Management System', 'login' => 'Login', 'logout' => 'Logout',
    'username' => 'Username', 'password' => 'Password', 'login_failed' => 'Wrong username or password.',
    'welcome' => 'Hello', 'data_list' => 'Item List', 'add' => 'Add Item', 'edit' => 'Edit', 'delete' => 'Delete',
    'no' => 'No', 'code' => 'Code', 'name' => 'Item Name', 'category' => 'Category', 'qty' => 'Quantity', 'price' => 'Price',
    'action' => 'Action', 'save' => 'Save', 'cancel' => 'Cancel', 'choose' => '-- Choose --',
    'elektronik' => 'Electronics', 'furnitur' => 'Furniture', 'alat_tulis' => 'Stationery',
    'err_code' => 'Item code is required (max. 20 chars).', 'err_name' => 'Item name is required (max. 100 chars).', 'err_login_empty' => 'Username and password are required.',
    'err_category' => 'Invalid category.', 'err_qty' => 'Quantity must be an integer >= 0.',
    'err_price' => 'Price must be a number >= 0.', 'err_dup' => 'Item code is already used.',
    'ok_add' => 'Item added successfully.', 'ok_edit' => 'Item updated successfully.', 'ok_del' => 'Item deleted successfully.',
    'confirm_del' => 'Are you sure you want to delete this item?', 'empty' => 'No data yet.', 'not_found' => 'Item not found.',
  ],
];

if (!isset($_SESSION['lang'])) { $_SESSION['lang'] = 'id'; }

function t($key) {
    global $translations;
    return $translations[$_SESSION['lang']][$key] ?? $key;
}
