# 🌸 Aplikasi Sederhana Laravel dengan daisyUI 🌸

Aplikasi ini dibuat menggunakan **Laravel** dan **daisyUI** sebagai framework CSS. Ikuti langkah-langkah berikut untuk menjalankan aplikasi ini.

---

## 🚀 Prasyarat

- PHP 8.1.10
- Composer
- Node.js v20.5.0 &amp; npm 9.8.0
- MySQL

---

## 🛠️ Langkah Instalasi

1. **Clone repositori**
    ```bash
    git clone https://github.com/RadityaHafizh/App-Klinik-Sederhana.git
    cd App-Klinik-Sederhana
    ```

2. **Install dependensi**
    ```bash
    composer update
    npm install
    ```

3. **Salin file environment**
    ```bash
    cp .env.example .env
    ```

4. **Konfigurasi database**

    Edit file `.env` dan sesuaikan bagian berikut:
    ```
    DB_DATABASE=nama_database_anda
    DB_USERNAME=username_mysql
    DB_PASSWORD=password_mysql
    ```

5. **Pastikan database sudah dibuat di MySQL**

    Masuk ke MySQL dan buat database:
    ```sql
    CREATE DATABASE nama_database_anda;
    ```

6. **Generate application key**
    ```bash
    php artisan key:generate
    ```

7. **Migrasi dan seed database**
   Jika database belum ada:
   ```bash
   php artisan migrate --seed
   ```
   Jika database sudah ada:
   ```bash
   php artisan migrate:fresh --seed
   ```

8. **Build assets frontend**
    ```bash
    npm run build
    ```

9. **Jalankan aplikasi**
    ```bash
    php artisan serve
    ```

10.  **Login Akun Default:**  
> - Akun **pendaftaran**: `pendaftaran@klinik.test`  
> - Akun **dokter**: `dokter@klinik.test`  
> - Akun **perawat**: `perawat@klinik.test`  
> - Akun **apoteker**: `apoteker@klinik.test`  
> - **Password untuk semua akun:** `password`

---

## 💡 Catatan

- Pastikan database sudah dibuat sebelum menjalankan migrasi.
- Pastikan perintah migrasi dan seeder (`php artisan migrate --seed`) berjalan tanpa error agar aplikasi dapat berjalan dengan sempurna.
- daisyUI sudah terintegrasi melalui Tailwind CSS.

---

🎉 **Selamat mencoba!** 🎉