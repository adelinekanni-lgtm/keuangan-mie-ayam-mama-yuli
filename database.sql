CREATE DATABASE warung_mama_yuli;
USE warung_mama_yuli;

CREATE TABLE users (
 id INT AUTO_INCREMENT PRIMARY KEY,
 username VARCHAR(50),
 password VARCHAR(255)
);

INSERT INTO users VALUES (NULL,'admin',MD5('admin'));

CREATE TABLE pemasukan (
 id INT AUTO_INCREMENT PRIMARY KEY,
 tanggal DATE,
 menu VARCHAR(100),
 harga INT,
 jumlah INT,
 total INT
);

CREATE TABLE pengeluaran (
 id INT AUTO_INCREMENT PRIMARY KEY,
 tanggal DATE,
 barang VARCHAR(100),
 harga INT,
 jumlah INT,
 total INT
);
