# Web Application Data Center

Aplikasi Data Center merupakan sistem pengelolaan data proyek pembangunan untuk mengelola data proyek seperti status, tanggal mulai dan berakhirnya proyek, lokasi, dan dokumen-dokumen penting lainnya yang akan menghasilkan sebuah laporan proyek.

## Cara install aplikasi
Aplikasi ini menggunakan `php7.4`. Sebelum menjalankan aplikasi instal semua depedency yang dibutuhkan dengan perintah
```bash
composer install
```
Lalu buat file `.env` pada root folder project dan copy semua isi dari file `.env.example` dan paste ke file `.env`. Lalu buat database `data-center` dan jalan kan aplikasinya dengan perintah
```bash
php spark serve
```
