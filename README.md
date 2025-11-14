# SI CAPS - Sistem Informasi Harga Pangan Pamekasan

Proyek ini adalah sistem informasi monitoring harga komoditas pangan di Kabupaten Pamekasan yang telah **selesai dikembangkan** dengan backend dan frontend yang terintegrasi.

## 🚀 Live Demo

**Production URL:** [http://diskominfopamekasan.my.id](http://diskominfopamekasan.my.id)

## 📊 Project Management

**Spreadsheet Project Management:** [Google Sheets - SI CAPS](https://docs.google.com/spreadsheets/d/1kgFJAmdwjoAIJAg5N_faBXwuAkInID9syFS69hodlNk/edit?usp=sharing)

---

## 🏗️ Arsitektur Sistem

### Frontend
- **Framework:** HTML, CSS, JavaScript (Vanilla)
- **Libraries:** Chart.js, jQuery, AlpineJS, Flatpickr, Bootstrap
- **Router:** PHP-based simple routing (`index.php`)
- **Views:** 
  - `home.php` - Dashboard utama dengan grafik harga
  - `profile.php` - Halaman profil
  - `login.php` - Autentikasi
  - `carousel.php` - Komponen card komoditas
  - `average.php` & `average_kab.php` - Tabel rata-rata harga

### Backend (API)
- **Location:** `api/` folder
- **Technology:** PHP Native
- **Endpoints:**
  - `get_data.php` - Mengambil data harga per tanggal
  - `get_average_data.php` - Rata-rata harga Madura
  - `get_average_data_kab.php` - Rata-rata harga per kabupaten
  - `get_average_madura.php` - Data agregat Madura
  - `fetch_prices.php` - Fetch harga realtime
  - `fetch_month_prices.php` - Data bulanan

### Cara Kerja Integrasi FE-BE

```
┌─────────────┐          HTTP Request           ┌──────────────┐
│             │  ────────────────────────────>   │              │
│  Frontend   │   (fetch/file_get_contents)      │   Backend    │
│  (Views)    │                                   │  (API PHP)   │
│             │  <────────────────────────────   │              │
└─────────────┘      JSON Response               └──────────────┘
                                                         │
                                                         ▼
                                                  ┌──────────────┐
                                                  │   Database   │
                                                  │   (MySQL)    │
                                                  └──────────────┘
```

1. **User** membuka halaman (misal: Dashboard)
2. **Frontend** (`views/home.php`) me-load dan include `carousel.php`
3. **`carousel.php`** melakukan request ke API:
   ```php
   file_get_contents("http://diskominfopamekasan.my.id/api/get_data.php?tanggal=2025-01-14")
   ```
4. **Backend API** query database, process data, return JSON
5. **Frontend** render data ke Card dan Chart menggunakan Chart.js
6. **JavaScript** (`assets/js/changes.js`) handle interaksi dan update chart dinamis

---

## 💻 Cara Menjalankan di Lokal

### Prerequisites
- PHP 7.4+ installed
- Node.js & npm (untuk dependencies frontend)
- MySQL/MariaDB (jika ingin setup backend lokal)

### Setup Frontend Lokal

1. **Clone repository:**
   ```bash
   git clone https://github.com/lakso-ycy/SI-CAPS.git
   cd SI-CAPS
   ```

2. **Install dependencies:**
   ```bash
   npm install
   ```

3. **Jalankan PHP built-in server:**
   ```bash
   php -S localhost:8000 -t .
   ```

4. **Buka di browser:**
   ```
   http://localhost:8000/?page=home
   ```

### Setup Backend Lokal (Opsional)

Jika ingin menjalankan backend API secara lokal:

1. **Setup database MySQL:**
   - Import database schema
   - Update konfigurasi koneksi di setiap file `api/*.php`

2. **Update endpoint API di frontend:**
   - Edit `views/carousel.php`, `views/average.php`, dll
   - Ganti URL dari:
     ```php
     http://diskominfopamekasan.my.id/api/get_data.php
     ```
     Menjadi:
     ```php
     http://localhost:8000/api/get_data.php
     ```

3. **Test endpoint:**
   ```bash
   curl http://localhost:8000/api/get_data.php?tanggal=2025-01-14
   ```

---

## 📁 Struktur Project

```
SI-CAPS/
├── api/                    # Backend API endpoints
│   ├── get_data.php
│   ├── get_average_data.php
│   └── ...
├── assets/                 # Frontend assets
│   ├── css/               # Stylesheets
│   ├── js/                # JavaScript files
│   ├── images/            # Image assets
│   └── fonts/             # Font files
├── views/                  # PHP view templates
│   ├── home.php           # Dashboard
│   ├── login.php          # Login page
│   ├── profile.php        # Profile page
│   └── carousel.php       # Price cards component
├── node_modules/           # NPM dependencies
├── index.php               # Main router
├── package.json            # NPM config
└── README.md              # This file
```

---

## 🧪 Testing

### Frontend Test
1. Buka dashboard: `http://localhost:8000/?page=home`
2. Cek apakah card komoditas muncul dengan chart
3. Test date picker untuk ubah tanggal
4. Navigasi ke Login & Profile page
5. Test tombol "Contact Us" scroll ke footer

### Backend API Test
```bash
# Test get data by date
curl "http://diskominfopamekasan.my.id/api/get_data.php?tanggal=2025-01-14"

# Test average data
curl "http://diskominfopamekasan.my.id/api/get_average_data.php"
```

---

## 🔧 Troubleshooting

### Frontend tidak load data
- Pastikan URL API di `views/carousel.php` benar
- Check network tab di browser DevTools
- Pastikan backend API running

### CORS Error
- Backend sudah setup CORS header
- Jika masih error, tambahkan di API:
  ```php
  header("Access-Control-Allow-Origin: *");
  ```

### Chart tidak muncul
- Pastikan Chart.js sudah loaded: `node_modules/chart.js/dist/chart.umd.js`
- Check console browser untuk error JavaScript
- Verify data JSON dari API valid

---

## 👥 Team & Contact

**Dinas Komunikasi dan Informatika Kabupaten Pamekasan**

- **Email:** diskominfo@pamekasankab.go.id
- **Address:** Jl. Jokotole Gg. IV No. 1, Kel. Barurambat Kota, Kec. Pamekasan, Kabupaten Pamekasan, Jawa Timur 69317

---

## 📝 License

© 2025 Dinas Komunikasi dan Informatika Kabupaten Pamekasan
