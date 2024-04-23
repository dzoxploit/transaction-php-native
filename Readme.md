Transaction API
Ini adalah aplikasi sederhana yang menyediakan API untuk membuat transaksi pembayaran, memeriksa status transaksi, dan mengubah status transaksi.

Menjalankan Aplikasi dari CLI
Untuk menjalankan aplikasi dari CLI, ikuti langkah-langkah berikut:

Pastikan Anda telah menginstal PHP di komputer Anda. Anda dapat mengunduh PHP dari php.net.
Buka terminal atau command prompt.
Arahkan direktori Anda ke lokasi aplikasi ini.
Jalankan perintah berikut untuk membuat tabel transaksi dalam basis data Anda:
bash
Copy code
php migration.php
Setelah migrasi selesai, Anda dapat menjalankan aplikasi menggunakan perintah berikut:
bash
Copy code
php -S localhost:8000
Aplikasi akan berjalan di http://localhost:8000.
Import Postman Collection
Untuk mengimpor koleksi Postman dan menguji API, ikuti langkah-langkah berikut:

Buka Postman.
Klik tombol "Import" di pojok kiri atas.
Pilih opsi "Import File" dan pilih file koleksi Postman yang disertakan.
Setelah diimpor, Anda akan melihat koleksi API dengan permintaan untuk membuat transaksi, memeriksa status transaksi, dan mengubah status transaksi.
Pastikan untuk mengatur environment variable baseURL di Postman sesuai dengan URL tempat Anda menjalankan aplikasi (misalnya, http://localhost:8000/api).
Penggunaan API
Setelah menjalankan aplikasi dan mengimpor koleksi Postman, Anda dapat menggunakan API sebagai berikut:

Gunakan permintaan "Create Transaction" untuk membuat transaksi pembayaran baru.
Gunakan permintaan "Check Transaction Status" untuk memeriksa status transaksi berdasarkan merchant_id dan references_id.
Gunakan permintaan "Change Transaction Status (CLI)" untuk mengubah status transaksi berdasarkan references_id menggunakan CLI.
Pastikan untuk menyertakan parameter yang diperlukan dalam setiap permintaan sesuai dengan dokumentasi API.
