# 🏥 MedDesa CMS

## Medical Desa System - CMS & SaaS Platform for Village Health Center

![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind-4-38bdf8?style=for-the-badge&logo=tailwindcss&logoColor=white)
![jQuery](https://img.shields.io/badge/jQuery-3.7.1-0868AC?style=for-the-badge&logo=jquery&logoColor=white)
![Composer](https://img.shields.io/badge/Composer-2.x-F38C20?style=for-the-badge&logo=composer&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

> Sistem Informasi Manajemen Puskesmas Desa berbasis PHP Native dengan Clean Architecture yang modern, scalable, dan mudah dikembangkan.

---

## 🎯 Tentang Project

MedDesa CMS adalah platform CMS dan SaaS sederhana yang dirancang khusus untuk Website Puskesmas Desa di Indonesia. Dibangun dengan PHP Native dan MySQL, sistem ini mengadopsi standar **Clean Architecture** untuk memastikan kode yang bersih, terstruktur, dan mudah maintenance.

### ✨ Fitur Utama

| Modul | Deskripsi |
|-------|-----------|
| 🏠 **Landing Page** | Halaman publik untuk menampilkan informasi puskesmas |
| 📊 **Dashboard Admin** | Panel kontrol dengan statistik dan visualisasi data |
| 💊 **Manajemen Obat** | CRUD obat, stok, dan kategori obat |
| 👥 **Manajemen Pasien** | CRUD pasien, detail rekam medis, dan pencarian |
| 👨‍⚕️ **Manajemen Dokter** | Data dokter, jadwal, dan spesialisasi |
| 📋 **Rekam Medis** | Pencatatan riwayat kunjungan dan treatment |
| 📅 **Antrian & Booking** | Sistem antrian online dan reservasi jadwal |
| 📰 **Artikel Kesehatan** | Publish artikel edukasi kesehatan masyarakat |
| 🔐 **Role-based Auth** | Sistem login dengan role Admin & Petugas |
| 📱 **API Ready** | Arsitektur siap untuk integrasi mobile app (future) |

---

## 🧠 Arsitektur Sistem

Proyek ini mengimplementasikan **Clean Architecture** dengan struktur direktori berikut:

```
meddesa/
├── app/
│   ├── controllers/      # Handle HTTP Request & Response
│   ├── core/             # Config, Database, Router, Middleware
│   ├── helpers/          # Utility functions & helper classes
│   ├── models/           # Entity (Business Logic Objects)
│   ├── repositories/     # Data Access Layer (Query Builder)
│   └── services/         # Business Logic Layer
│
├── config/
│   └── database.php     # Konfigurasi koneksi database
│
├── public/
│   ├── .htaccess         # URL Rewriting rules
│   └── index.php         # Entry point aplikasi
│
├── routes/
│   └── web.php           # Definisi route aplikasi
│
├── storage/              # File storage (uploads, logs)
│
├── views/
│   ├── admin/
│   │   ├── dashboard/    # Halaman admin dashboard
│   │   ├── obat/         # View manajemen obat
│   │   └── pasien/       # View manajemen pasien
│   ├── auth/             # Halaman autentikasi
│   └── layouts/          # Template layout (header, sidebar, footer)
│
├── composer.json          # PHP dependencies
├── .htaccess              # Root URL rewriting
└── index.php              # Root entry point
```

### Fitur Tambahan

- **Flash Messages** - Notifikasi sukses/error menggunakan `php-flasher`
- **URL Rewriting** - Clean URL dengan `.htaccess`
- **Environment Config** - Konfigurasi via `.env` menggunakan `vlucas/phpdotenv`

### Alur Kerja (Request Lifecycle)

```
User Request
     │
     ▼
┌─────────────┐
│   public/   │  Entry Point
│  index.php  │
└──────┬──────┘
       │
       ▼
┌─────────────┐
│   Router    │  Route Matching
└──────┬──────┘
       │
       ▼
┌─────────────┐
│ Middleware  │  Authentication & Authorization
└──────┬──────┘
       │
       ▼
┌─────────────┐
│ Controller  │  Handle Request
└──────┬──────┘
       │
       ▼
┌─────────────┐
│  Service    │  Business Logic
└──────┬──────┘
       │
       ▼
┌─────────────┐
│ Repository  │  Data Access
└──────┬──────┘
       │
       ▼
┌─────────────┐
│  Database   │  MySQL
└─────────────┘
```

---

## 🛠️ Tech Stack

| Teknologi | Deskripsi | Versi |
|-----------|-----------|-------|
| **PHP** | Server-side scripting | 8.1+ |
| **MySQL** | Relational database | 8.0+ |
| **Tailwind CSS** | Frontend CSS Framework | 4.x |
| **jQuery** | JavaScript Library | 3.7.1 |
| **Composer** | Dependency management | 2.x |
| **vlucas/phpdotenv** | Environment variable management | ^5.6 |
| **php-flasher/flasher** | Flash notification library | latest |
| **psr/container** | Container interface | ^2.0 |
| **Apache/Nginx** | Web server | Latest |

---

## 📦 Instalasi

### Prerequisites

- PHP 8.1 atau lebih tinggi
- MySQL 8.0 atau lebih tinggi
- XAMPP / WAMP / Laragon (Local Development)
- Composer (untuk dependency management)

### Langkah Instalasi

1. **Clone Repository**
   ```bash
   git clone https://github.com/username/meddesa.git
   cd meddesa
   ```

2. **Setup Database**
   ```bash
   # Buat database baru
   mysql -u root -p
   CREATE DATABASE meddesa_db;
   ```

3. **Install Dependencies**
   ```bash
   composer install
   ```

4. **Import SQL Schema**
   ```bash
   mysql -u root -p meddesa_db < database/schema.sql
   ```

5. **Konfigurasi Environment**
   
   Copy `.env.example` ke `.env` dan edit konfigurasi database:
   ```
   DB_HOST=localhost
   DB_NAME=meddesa_db
   DB_USER=root
   DB_PASS=
   ```

6. **Jalankan Server**
   ```bash
   # Via PHP built-in server
   php -S localhost:8000 -t public
   
   # Atau via Laragon/XAMPP
   # Akses http://localhost/meddesa
   ```

7. **Login Default**
   ```
   URL: http://localhost:8000/login
   Email: admin@meddesa.id
   Password: admin123
   ```

---

## 📚 Dokumentasi Modul

### 🔐 Autentikasi & Otorisasi

| Role | Akses |
|------|-------|
| **Admin** | Full access ke semua fitur |
| **Petugas** | Terbatas pada fitur operasional |

**File terkait:**
- [`app/controllers/authController.php`](app/controllers/authController.php)
- [`app/core/middleware.php`](app/core/middleware.php)

### 💊 Modul Obat

| Fitur | Endpoint | Method |
|-------|----------|--------|
| List Obat | `/admin/obat` | GET |
| Tambah Obat | `/admin/obat/create` | GET/POST |
| Edit Obat | `/admin/obat/edit/{id}` | GET/POST |
| Hapus Obat | `/admin/obat/delete/{id}` | GET |

**File terkait:**
- [`app/controllers/obatController.php`](app/controllers/obatController.php)
- [`app/repositories/obatRepository.php`](app/repositories/obatRepository.php)

### 👥 Modul Pasien

| Fitur | Endpoint | Method |
|-------|----------|--------|
| List Pasien | `/admin/pasien` | GET |
| Tambah Pasien | `/admin/pasien/create` | GET/POST |
| Detail Pasien | `/admin/pasien/detail/{id}` | GET |
| Edit Pasien | `/admin/pasien/edit/{id}` | GET/POST |
| Hapus Pasien | `/admin/pasien/delete/{id}` | GET |

**File terkait:**
- [`app/controllers/pasienController.php`](app/controllers/pasienController.php)
- [`app/repositories/pasienRepository.php`](app/repositories/pasienRepository.php)

### 📋 Routes

Semua route didefinisikan di [`routes/web.php`](routes/web.php):

```php
$router = new Router();

// Public Routes
$router->get('/', 'HomeController@index');
$router->get('/login', 'AuthController@showLogin');
$router->post('/login', 'AuthController@login');
$router->get('/logout', 'AuthController@logout');

// Protected Routes (Admin)
$router->get('/admin/dashboard', 'DashboardController@index');
$router->get('/admin/obat', 'ObatController@index');
$router->get('/admin/pasien', 'PasienController@index');
// Tambahkan route lainnya di sini
```

---

## 🔧 Konfigurasi

### Struktur Config

```
config/
└── database.php      # Konfigurasi MySQL (.env supported)
```

### Helper

Helper yang tersedia di [`app/helpers/`](app/helpers/):

- `flasher.php` - Flash message notifications (success, error, warning, info)

### Middleware

Middleware yang tersedia di [`app/core/middleware.php`](app/core/middleware.php):

- `auth` - Cek status login
- `guest` - Redirect jika sudah login

---

## 📝 Struktur Database (ERD Concept)

```
┌─────────────┐     ┌─────────────┐     ┌─────────────┐
│   users     │     │   doctors   │     │   patients  │
├─────────────┤     ├─────────────┤     ├─────────────┤
│ id          │     │ id          │     │ id          │
│ name        │     │ name        │     │ name        │
│ email       │     │ specialty   │     │ birth_date  │
│ password    │     │ phone       │     │ address     │
│ role        │     │ schedule    │     │ phone       │
│ created_at  │     └─────────────┘     └─────────────┘
└─────────────┘            │                   │
       │                   │                   │
       │               ┌───┴──────┐            │
       │               │          │            │
┌──────┴──────┐  ┌─────┴─────┐ ┌──┴────────┐   │
│  medical_   │  │  queues   │ │  medical  │   │
│  records    │  │           │ │  records  │   │
├─────────────┤  ├───────────┤ ├───────────┤   │
│ id          │  │ id        │ │ id        │   │
│ patient_id  │  │ patient_id│ │ patient_id│   │
│ doctor_id   │  │ doctor_id │ │ doctor_id │   │
│ diagnosis   │  │ queue_num │ │ diagnosis │   │
│ treatment   │  │ status    │ │ treatment │   │
│ date        │  │ date      │ │ date      │   │
└─────────────┘  └───────────┘ └───────────┘   │
                                           │   │
                                     ┌─────┴─────┐
                                     │ medicines │
                                     ├───────────┤
                                     │ id        │
                                     │ name      │
                                     │ stock     │
                                     │ price     │
                                     │ category  │
                                     └───────────┘
```

---

## 🚀 Roadmap Development

| Phase | Fitur | Status |
|-------|-------|--------|
| **Phase 1** | Core Structure & Auth | ✅ Done |
| **Phase 2** | Manajemen Obat & Pasien | ✅ Done |
| **Phase 3** | Manajemen Dokter & Jadwal | 📋 Planned |
| **Phase 4** | Rekam Medis & Antrian | 📋 Planned |
| **Phase 5** | Landing Page & Artikel | 📋 Planned |
| **Phase 6** | API RESTful | 📋 Planned |
| **Phase 7** | Mobile App Integration | 📋 Planned |

---

## 🤝 Kontribusi

Kontribusi sangat diterima! Mohon:

1. Fork repository ini
2. Buat branch baru (`git checkout -b feature/fitur-baru`)
3. Commit perubahan (`git commit -m 'Menambah fitur baru'`)
4. Push ke branch (`git push origin feature/fitur-baru`)
5. Buat Pull Request

---

## 📄 Lisensi

Project ini dilisensikan di bawah MIT License - lihat file [LICENSE.md](LICENSE.md) untuk detail.

---

## 👨‍💻 Author

**Muhamad Jaelani** (zyxevls)

- GitHub: [@zyxevls](https://github.com/zyxevls)
- Email: jaelanim465@gmail.com

---

## 🙏 Acknowledgments

- Tailwind CSS Team for the utility-first CSS framework
- jQuery Team for the JavaScript library
- php-flasher for flash notification support
- PHP Community for continuous innovation
- Indonesia Healthcare Ecosystem

---

<div align="center">
  <p>Made with ❤️ for Indonesian Healthcare</p>
  <p>© 2024-2026 MedDesa CMS - Open Source Project</p>
</div>
