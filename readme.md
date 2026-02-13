# 🎬 OMDb App – Laravel 5.8 Movie Search Application

Aplikasi pencarian film berbasis Laravel 5.8 yang terintegrasi dengan OMDb API (Open Movie Database).

Project ini memungkinkan pengguna mencari film berdasarkan judul dan menampilkan informasi detail seperti poster, tahun rilis, genre, plot, dan rating IMDb.

---

## 🚀 Features

- Search movie by title
- Display movie details
- Integration with OMDb API
- Environment-based API configuration
- Clean MVC structure (Laravel 5.8)

---

## 🛠 Tech Stack

- PHP 7.1.3 – 7.4
- Laravel 5.8
- Blade Template Engine
- Guzzle HTTP Client
- Bootstrap

---

# ⚙️ Installation Guide

## 1. Clone Repository

```bash
git clone https://github.com/detrim/omdb-app.git
cd omdb-app
2. Install Dependencies
composer install

3. Copy Environment File

Linux / Mac:

cp .env.example .env


Windows:

copy .env.example .env

4. Configure Environment (.env)

Pastikan file .env memiliki konfigurasi berikut:

APP_NAME=OMDbApp
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

OMDB_API_KEY=YOUR_API_KEY
OMDB_BASE_URL=https://www.omdbapi.com/


Ganti YOUR_API_KEY dengan API key milik kamu.

🔑 Cara Mendapatkan OMDb API Key

Buka https://www.omdbapi.com/apikey.aspx

Pilih paket FREE

Masukkan email aktif

Aktivasi melalui email

Gunakan API key yang diberikan

5. Generate Application Key
php artisan key:generate

6. Clear Cache Configuration
php artisan config:clear
php artisan cache:clear

7. Jalankan Project
php artisan serve


Buka di browser:

http://127.0.0.1:8000

📡 Example API Request
https://www.omdbapi.com/?apikey=YOUR_API_KEY&s=batman

⚠️ Security Notes

Jangan upload file .env ke GitHub

Jangan menyimpan API key di repository public

Gunakan .env.example untuk berbagi konfigurasi

👨‍💻 Author

Deni Tri Muslimin
Web Developer (Laravel)
https://github.com/detrim
```
