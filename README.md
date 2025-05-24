# 🌸 Aplikasi Sederhana Laravel dengan daisyUI 🌸

Aplikasi ini dibuat menggunakan **Laravel** dan **daisyUI** sebagai framework CSS. Ikuti langkah-langkah berikut untuk menjalankan aplikasi ini.

---

## 🚀 Prasyarat

- PHP &gt;= 8.1
- Composer
- Node.js &amp; npm
- MySQL

---

## 🛠️ Langkah Instalasi

1. **Clone repositori**
    ```bash
    git clone <url-repo-anda>
    cd app-sederhana
    ```

2. **Install dependensi**
    ```bash
    composer install
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
    ```bash
    php artisan migrate --seed
    ```

8. **Build assets frontend**
    ```bash
    npm run build
    ```

9. **Jalankan aplikasi**
    ```bash
    php artisan serve
    ```

---

## 💡 Catatan

- Pastikan database sudah dibuat sebelum menjalankan migrasi.
- Pastikan perintah migrasi dan seeder (`php artisan migrate --seed`) berjalan tanpa error agar aplikasi dapat berjalan dengan sempurna.
- daisyUI sudah terintegrasi melalui Tailwind CSS.

---

🎉 **Selamat mencoba!** 🎉