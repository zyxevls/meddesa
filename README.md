# 🏥 MedDesa CMS

## Medical Desa System - CMS & SaaS Platform for Village Health Center

![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
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
| 👥 **Manajemen Pasien** | Registrasi dan data rekam medis pasien |
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
│   └── index.php         # Entry point aplikasi
│
├── routes/
│   └── web.php           # Definisi route aplikasi
│
├── storage/              # File storage (uploads, logs)
│
└── views/               # Template HTML + CSS (Bootstrap/Tailwind)
    ├── auth/             # Halaman autentikasi
    ├── dashboard/        # Halaman admin dashboard
    ├── layouts/          # Template layout (header, sidebar, footer)
    ├── obat/             # View manajemen obat
    └── ...
```

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
│  Database    │  MySQL
└─────────────┘
```

---

## 🛠️ Tech Stack

| Teknologi | Deskripsi | Versi |
|-----------|-----------|-------|
| **PHP** | Server-side scripting | 8.1+ |
| **MySQL** | Relational database | 8.0+ |
| **Bootstrap** | Frontend CSS Framework | 5.3 |
| **Composer** | Dependency management | 2.x |
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

3. **Import SQL Schema**
   ```bash
   mysql -u root -p meddesa_db < database/schema.sql
   ```

4. **Konfigurasi Environment**
   
   Edit file [`config/database.php`](config/database.php):
   ```php
   return [
       'host'     => 'localhost',
       'database' => 'meddesa_db',
       'username' => 'root',
       'password' => '',
       'charset'  => 'utf8mb4'
   ];
   ```

5. **Jalankan Server**
   ```bash
   # Via PHP built-in server
   php -S localhost:8000 -t public
   
   # Atau via Laragon/XAMPP
   # Akses http://localhost/meddesa
   ```

6. **Login Default**
   ```
   URL: http://localhost:8000/auth/login
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
- [`app/services/authServices.php`](app/services/authServices.php)
- [`app/core/middleware.php`](app/core/middleware.php)

### 💊 Modul Obat

| Fitur | Endpoint | Method |
|-------|----------|--------|
| List Obat | `/obat` | GET |
| Tambah Obat | `/obat/create` | GET/POST |
| Edit Obat | `/obat/edit/{id}` | GET/POST |
| Hapus Obat | `/obat/delete/{id}` | GET |

**File terkait:**
- [`app/controllers/obatController.php`](app/controllers/obatController.php)
- [`app/repositories/obatRepository.php`](app/repositories/obatRepository.php)

### 📋 Routes

Semua route didefinisikan di [`routes/web.php`](routes/web.php):

```php
// Public Routes
Route::get('/', 'homeController@index');
Route::get('/login', 'authController@loginView');
Route::post('/login', 'authController@login');

// Protected Routes (Admin/Petugas)
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'dashboardController@index');
    Route::resource('/obat', 'obatController');
    // Tambahkan route lainnya di sini
});
```

---

## 🔧 Konfigurasi

### Struktur Config

```
config/
├── database.php      # Konfigurasi MySQL
├── app.php          # Konfigurasi aplikasi (future)
└── auth.php         # Konfigurasi auth (future)
```

### Middleware

Middleware yang tersedia di [`app/core/middleware.php`](app/core/middleware.php):

- `auth` - Cek status login
- `role` - Cek role user (admin/petugas)
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
       │              ┌─────┴─────┐             │
       │              │           │             │
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
                                           │
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
| **Phase 2** | Manajemen Obat & Pasien | 🔄 In Progress |
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

**MedDesa Development Team**

- GitHub: [@username](https://github.com/username)
- Email: dev@meddesa.id

---

## 🙏 Acknowledgments

- Bootstrap Team for the amazing CSS framework
- PHP Community for continuous innovation
- Indonesia Healthcare Ecosystem

---

<div align="center">
  <p>Made with ❤️ for Indonesian Healthcare</p>
  <p>© 2024 MedDesa CMS - Open Source Project</p>
</div>
