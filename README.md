<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Sistem Manajemen & Stok Tiket Konser

Aplikasi web berbasis Laravel untuk mencatat dan mengelola data serta stok tiket konser musik Pop-Punk / Punk Rock Indonesia (MCPR, Rebellion Rose, Superman Is Dead, Stand Here Alone, Dongker, Romi & The Jahats, Marjinal).
Dibuat untuk Tes Magang ARRE Tech.

## Fitur
- Register, login, dan logout
- CRUD tiket konser: daftar, tambah, detail, edit, hapus
- Upload poster konser (jpg, png, webp, maksimal 2 MB)
- Validasi input di sisi server
- Pencarian berdasarkan band, event, atau venue
- Filter kategori tiket: VIP, Presale, Early Bird, General Admission
- Indikator status stok: Tersedia, Menipis, Habis
- Penyesuaian stok tiket lewat form edit
- Konfirmasi hapus dengan modal, poster ikut terhapus
- Ringkasan dashboard (total konser, total stok, potensi pendapatan)
- Halaman login dan register dengan tema Architect
- Tampilan responsif dengan Bootstrap

## Teknologi
- PHP, Laravel
- Eloquent ORM, Blade
- SQLite / MariaDB
- Bootstrap 5
- Laravel Breeze (autentikasi)

## Cara Menggunakan
1. Login dengan email `test@gmail.com` dan password `bismillah`, atau daftar akun lewat halaman **Register**.
2. Halaman **Daftar Tiket** menampilkan ringkasan dan semua tiket konser.
3. Gunakan tab kategori atau kotak pencarian untuk menyaring tiket.
4. Klik **Tambah Tiket**, isi form (poster boleh dikosongkan), lalu simpan.
5. Gunakan tombol **Detail** untuk melihat tiket, ikon pensil untuk mengedit, dan tong sampah untuk menghapus.
6. Ubah kolom **Jumlah Stok Tiket** lewat form edit untuk menyesuaikan stok.
7. Status stok otomatis berubah: **Tersedia** (lebih dari 25), **Menipis** (1 sampai 25), **Habis** (0).
8. Saat menghapus, konfirmasi muncul lebih dulu. Data dan file poster dihapus setelah dikonfirmasi.
9. Klik nama pengguna di pojok kanan atas, lalu pilih **Logout** untuk keluar.

## Struktur Proyek
| File / Folder | Fungsi |
|---|---|
| `app/Models/Ticket.php` | Model tiket, kategori, scope pencarian, dan status stok |
| `app/Http/Controllers/TicketController.php` | Logika CRUD tiket, pencarian, dan upload poster |
| `app/Http/Requests/TicketRequest.php` | Aturan validasi input tiket |
| `database/migrations/` | Struktur tabel |
| `database/seeders/` | Data awal tiket band punk dan akun login |
| `resources/views/tickets/` | Tampilan CRUD (index, create, edit, show) |
| `resources/views/auth/` | Tampilan login dan register |
| `resources/views/layouts/` | Layout dan sidebar |
| `routes/web.php` | Daftar route aplikasi |

## Struktur Database
**tickets**: id, band, event, venue, event_date, price, stock, category, poster, description, timestamps


## Pembuat
Atta Alfarizi (attaerpeel@gmail.com)
