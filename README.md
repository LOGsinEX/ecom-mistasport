# Website E-commerce Laravel untuk Penjualan Parfum

Website e-commerce sederhana Laravel untuk penjualan parfum dengan dua peran admin dan pengguna.

## Daftar Isi

- [Instalasi](#instalasi)
- [Fitur](#fitur)
- [Peran dan Izin](#peran-dan-izin)

## Instalasi

1. Clone repositori: `git clone https://github.com/nama-pengguna-anda/laravel-ecommerce-parfum.git`
2. Pasang dependensi: `composer install`
3. Salin `.env.example` ke `.env` dan konfigurasikan kredensial basis data Anda.
4. Buat kunci aplikasi: `php artisan key:generate`
5. Migrasikan basis data: `php artisan migrate`
7. Jalankan server pengembangan: `php artisan serve`
8. Tambahkan product dengan login menggunakan akun admin

## Fitur

- Pendaftaran dan login pengguna
- Keranjang belanja
- Proses checkout
- Pembuatan invoice
- Dashboard admin untuk mengelola produk, stok, dan transaksi

## Peran dan Izin

- Admin:(email : akunadmin@gmail.com, password : 12345678) 
  - Note : login dengan akun admin untuk akses dashboard admin
  - Mengelola produk (tambah, edit, hapus)
  - Mengelola stok
  - Melihat semua transaksi
  - Mencetak transaksi

- Pengguna:
  - Akses dashboard toko
  - Menambahkan produk ke keranjang
  - Melakukan checkout dan mencetak invoice
