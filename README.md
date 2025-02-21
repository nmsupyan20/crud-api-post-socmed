# CRUD API Post Social Media

Project ini dibuat dalam rangka menyelesaikan technical test backend internship Octoscript.id. Tujuan dari project ini adalah untuk membuat sebuah API yang dapat melakukan proses CRUD (Create, Read, Update, Delete) untuk mengelola postingan sosial media. Dokumentasi dari API dibuat dengan menggunakan Swagger dan dapat diakses pada url http://localhost:8080/ . Namun, sebelum mengakses url tersebut, diperlukan langkah-langkah untuk menjalankan program. 
&nbsp;

## Daftar Isi Panduan Menjalankan Program
1. [Clone Repository](#clone-repository)
2. [Database, Migration dan Seeder](#database-migration-dan-seeder)
3. [Jalankan Program](#jalankan-program)

&nbsp;
## Clone Repository

Aktifkan XAMPP (saya menggunakan versi 8.2.12) dan buka command prompt di folder htdocs. Kemudian, jalankan perintah di bawah ini.
```
git clone https://github.com/nmsupyan20/crud-api-post-socmed.git
```
Setelah proses clone selesai, masuk ke dalam folder crud-api-post-socmed dengan menggunakan perintah `cd` seperti perintah di bawah.
```
cd crud-api-post-socmed
```
Lalu, ketikan perintah `composer install` untuk menginstal semua dependency yang dibutuhkan oleh project ini. Untuk mengetikkan perintah `composer install` pastikan composer telah terinstal di perangkat. Cara untuk memeriksanya dengan mengetikkan `composer --version`. Jika composer belum terinstal silahkan instal terlebih dahulu pada halaman website resminya di [composer](https://getcomposer.org/).
```
composer install
```
Setelah itu, ketikkan perintah `code .` di terminal untuk langsung membuka text editor Visual Studio Code.

&nbsp;
## Database, Migration dan Seeder

Buat sebuah database dengan nama `crud_api_post_socmed` dengan perintah berikut.
```
CREATE DATABASE crud_api_post_socmed;
```
Lalu, ubah file dengan nama `env` menjadi `.env` dan jalankan migration menggunakan perintah di bawah.
```
php spark migrate
```
Perintah migrate di atas akan membuat sebuah table dengan nama post. Setelah itu, jalankan seeder untuk membuat dummy data dengan perintah sebagai berikut.
```
php spark db:seed PostSeeder
```
Saat menjalankan perintah  `php spark db:seed PostSeeder`, maka tabel post akan terisi dengan data dummy.

&nbsp;
## Jalankan Program

Setelah semua langkah di atas telah dilakukan, program sudah siap untuk dijalankan. Untuk menjalankan program gunakan perintah `php spark serve` seperti berikut.
```
php spark serve
```
Dengan menjalankan perintah di atas, maka dokumentasi API sudah bisa diakses pada link http://localhost:8080 . Dokumentasi tersebut dibuat dengan menggunakan Swaagger UI (untuk tampilan) dan Swagger-PHP (untuk anotasi swagger).

