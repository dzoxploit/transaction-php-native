# Transaction API

Ini adalah aplikasi sederhana yang menyediakan API untuk membuat transaksi pembayaran, memeriksa status transaksi, dan mengubah status transaksi.

## Persyaratan

Sebelum Anda dapat menjalankan aplikasi ini, pastikan Anda telah memenuhi persyaratan berikut:

- PHP terinstal di komputer Anda. Anda dapat mengunduh PHP dari [php.net](https://www.php.net/downloads).
- XAMPP atau server web sejenis telah diinstal dan dijalankan di komputer Anda.

## Menjalankan Aplikasi

Berikut adalah langkah-langkah untuk menjalankan aplikasi ini:

1. Pastikan XAMPP atau server web sejenis telah diaktifkan di komputer Anda.

2. Salin atau pindahkan folder aplikasi ini ke dalam direktori `htdocs` di dalam direktori instalasi XAMPP Anda.

3. Buka terminal atau command prompt.

4. Arahkan direktori Anda ke lokasi aplikasi ini.

5. Setelah itu ubah file api/config/config.php sesuai dengan environtment anda

6. Jalankan perintah berikut untuk melakukan migrasi basis data dan membuat tabel transaksi:

   ```bash
   cd db
   php migration.php
   ```

7. Setelah migrasi selesai, Anda dapat menjalankan aplikasi menggunakan perintah berikut:

   ```bash
   php -S localhost:8000
   ```

   Aplikasi akan berjalan di `http://localhost:8000`.

   Atau bisa dijalankan di `http://localhost/{folder_project}/api/{eg: check_transaction.php}`

   Jika menggunakan localhost:8000 maka tidak perlu menambahkan {folder_project} di routingnya

## Menjalankan Migrasi Basis Data

Untuk menjalankan migrasi basis data, pastikan Anda berada di direktori aplikasi dan jalankan perintah berikut:

```bash
cd db
php migration.php
```

Ini akan membuat tabel transaksi dalam basis data Anda.

## Menggunakan Transaction CLI

Anda juga dapat menggunakan CLI untuk mengubah status transaksi. Berikut adalah menggunakan CLI untuk update Transaksi

```bash
cd api
php transaction-cli.php {reference_id} {Paid / Pending / Failed / Expired}
```

# Penggunaan API

Setelah menjalankan aplikasi, Anda dapat menggunakan API dengan cara import collection dibagian folder documentation/transaction-php.postman_collection dengan rincian sebagai berikut:

Gunakan permintaan "Create Transaction" dalam Postman untuk membuat transaksi pembayaran baru.
Gunakan permintaan "Check Transaction Status" dalam Postman untuk memeriksa status transaksi berdasarkan merchant_id dan references_id.
Gunakan permintaan "Change Transaction Status (CLI)" dalam Postman untuk mengubah status transaksi berdasarkan references_id menggunakan CLI.
Pastikan untuk menyertakan parameter yang diperlukan dalam setiap permintaan sesuai dengan dokumentasi API.

# Kontribusi

Kami menyambut kontribusi dari siapa pun! Jika Anda ingin berkontribusi pada proyek ini, silakan kirimkan pull request.

# Lisensi

Proyek ini dilisensikan di bawah Lisensi MIT. Lihat LICENSE untuk informasi lebih lanjut.
