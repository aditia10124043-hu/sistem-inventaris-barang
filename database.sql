CREATE DATABASE IF NOT EXISTS db_inventaris CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE db_inventaris;

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS barang (
  id INT AUTO_INCREMENT PRIMARY KEY,
  kode_barang VARCHAR(20) NOT NULL UNIQUE,
  nama_barang VARCHAR(100) NOT NULL,
  kategori VARCHAR(30) NOT NULL,
  jumlah INT NOT NULL DEFAULT 0,
  harga DECIMAL(12,2) NOT NULL DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Akun default: username = admin | password = admin123
INSERT INTO users (username, password) VALUES
('admin', '$2y$10$Ct7BrX4d1wRQ9DvasaMsn.iUbeu8sFXxd1jcLjIWUnCl2ANy14yOu');

INSERT INTO barang (kode_barang, nama_barang, kategori, jumlah, harga) VALUES
('BRG-001', 'Laptop Asus A14', 'elektronik', 5, 7500000),
('BRG-002', 'Kursi Kantor', 'furnitur', 12, 450000),
('BRG-003', 'Kertas A4 80gr', 'alat_tulis', 40, 55000);
