## Website Lelang Online

Website lelang online adalah aplikasi berbasis web yang dipergunakan untuk melakukan lelang secara online di internet. Melalui aplikasi lelang online, proses lelang dapat dilakukan dengan mudah dan efisien.Melalui aplikasi lelang, para pelanggan dapat dengan mudah menerima informasi mengenai barang yang diinginkan serta memudahkan mereka untuk ikut berpartisipasi dalam proses lelang.

## Fitur Website

- Website ini dibagi menjadi 3 halaman yaitu halaman admin, petugas, dan masyarakat
- Halaman admin untuk admin, Admin bisa mengelola data barang dan generate laporan
- Halaman petugas untuk petugas, Petugas bisa mengelola data barang, proses lelang, dan generate laporan
- Halaman masyarakat (halaman utama), digunakan masyarakat untuk melakukan proses pelelangan barang

## Instalasi

### Spesifikasi
- PHP ^8.1
- Laravel 9.x
- Database MySQL atau mariaDB

### Cara Install

1. Clone atau download source code
    - Para terminal, clone repo `git clone https://github.com/wildanwigenta/ukk_lelang_online.git`
    - atau `git clone git@github.com:wildanwigenta/ukk_lelang_online.git`
    - Jika tidak menggunakan Git, silakan **Download Zip** dan *extract* pada direktori web server (misal: xampp/htdocs)
2. `cd lelang_online`
3. `composer install`
4. `cp .env.example .env`
    - Jika tidak menggunakan Git, bisa rename file `.env.example` menjadi `.env`
5. Pada terminal `php artisan key:generate`
6. Buat **database pada mysql** untuk aplikasi ini
7. **Setting database** pada file `.env`
8. `php artisan migrate --seed`
9. `php artisan serve`
10. Selesai


