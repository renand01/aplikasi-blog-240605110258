-- ============================================================
-- File: db_blog.sql
-- Deskripsi: Script SQL untuk membuat database dan tabel
--            Sistem Manajemen Blog (CMS)
-- ============================================================

CREATE DATABASE IF NOT EXISTS db_blog
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;

USE db_blog;

-- ============================================================
-- Tabel: penulis
-- ============================================================
CREATE TABLE IF NOT EXISTS penulis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_depan VARCHAR(100) NOT NULL,
    nama_belakang VARCHAR(100) NOT NULL,
    user_name VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    foto VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================================
-- Tabel: kategori (ditambah kolom keterangan)
-- ============================================================
CREATE TABLE IF NOT EXISTS kategori (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(100) NOT NULL UNIQUE,
    keterangan VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================================
-- Tabel: artikel
-- ============================================================
CREATE TABLE IF NOT EXISTS artikel (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_penulis INT NOT NULL,
    id_kategori INT NOT NULL,
    judul VARCHAR(255) NOT NULL,
    isi TEXT NOT NULL,
    gambar VARCHAR(255) DEFAULT NULL,
    tanggal_publikasi DATETIME DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_penulis) REFERENCES penulis(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_kategori) REFERENCES kategori(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;
