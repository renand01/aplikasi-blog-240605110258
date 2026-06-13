# Sistem Manajemen Blog (CMS) & Halaman Pengunjung

Proyek ini merupakan pengembangan dari aplikasi blog berbasis web yang dibangun menggunakan Laravel dan database MySQL (`db_blog`). Aplikasi ini mengimplementasikan dua bagian utama:
1. **CMS (Content Management System) / Halaman Admin**: Digunakan oleh penulis terautentikasi untuk mengelola data artikel, penulis, dan kategori artikel.
2. **Halaman Pengunjung (Publik)**: Halaman yang dapat diakses oleh umum tanpa perlu login, menampilkan artikel terbaru, filter berdasarkan kategori, serta detail artikel dengan rekomendasi artikel terkait.

---

## Identitas Pengembang
- **Nama Lengkap**: Yasmin Winda Masruroh
- **NIM**: 240605110258

---

## Deskripsi Aplikasi
Aplikasi ini dirancang sebagai platform manajemen konten blog yang memadukan keandalan sistem administrasi (CMS) dengan antarmuka membaca yang nyaman bagi pengunjung umum. Di balik layar, platform ini menyediakan ruang kerja khusus bagi penulis terdaftar untuk mengelola tulisan mereka—mulai dari menerbitkan artikel baru yang dilengkapi ilustrasi gambar, hingga mengorganisasi kategori tulisan serta memperbarui profil penulis secara dinamis. Di sisi pengunjung, aplikasi menyuguhkan antarmuka yang bersih dan responsif untuk menjelajahi artikel-artikel terbaru, memfilter topik tulisan melalui widget kategori interaktif di bilah samping, serta menikmati artikel pilihan secara mendalam lengkap dengan rekomendasi artikel terkait yang relevan.

---

## Prasyarat (Prerequisites)
Sebelum menjalankan aplikasi ini secara lokal, pastikan Anda telah menginstal software berikut:
- **PHP** (minimal versi 8.2)
- **Composer**
- **XAMPP** (atau layanan web server local & MySQL database)
- **Node.js & NPM**

---

## Langkah-langkah Menjalankan Aplikasi secara Lokal

1. **Clone Repositori**:
   ```bash
   git clone https://github.com/[username-github]/aplikasi-blog-[nim].git
   cd aplikasi-blog-[nim]
   ```

2. **Instal Dependensi PHP**:
   ```bash
   composer install
   ```

3. **Instal Dependensi Node (jika diperlukan)**:
   ```bash
   npm install
   npm run dev
   ```

4. **Konfigurasi Environment (`.env`)**:
   Salin file `.env.example` menjadi `.env`:
   ```bash
   cp .env.example .env
   ```
   Buka file `.env` baru tersebut, lalu sesuaikan konfigurasi database sesuai dengan server lokal Anda:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=db_blog
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```

6. **Import Database**:
   - Pastikan MySQL/XAMPP Anda aktif.
   - Buat database baru bernama `db_blog` di phpMyAdmin atau MySQL CLI.
   - Import file `database/db_blog.sql` yang berada di dalam proyek ke dalam database `db_blog` Anda.

7. **Buat Symlink Storage**:
   Untuk menampilkan gambar artikel dan foto profil penulis, buat tautan direktori storage ke public:
   ```bash
   php artisan storage:link
   ```

8. **Jalankan Aplikasi**:
   Mulai server pengembangan lokal Laravel:
   ```bash
   php artisan serve
   ```
   Aplikasi kini dapat diakses melalui browser Anda di alamat: [http://127.0.0.1:8000]  [http://127.0.0.1:8000/dashboard] 

---

## Demonstrasi Video YouTube
Tonton video demonstrasi fitur lengkap (CMS & Halaman Pengunjung) melalui tautan berikut:
- **Tautan Video**: [https://youtu.be/KqAor7rBzB0?si=VREOh66wgDzJMlvH]
