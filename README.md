# Sistem Informasi Poliklinik

Sistem Informasi Poliklinik adalah aplikasi berbasis web yang dirancang untuk memudahkan pengelolaan layanan poliklinik, termasuk manajemen pasien, dokter, jadwal pemeriksaan, serta data obat. Aplikasi ini mendukung autentikasi terpisah untuk pasien dan dokter.

## Fitur Utama

- **Autentikasi Pengguna**
  - Login & registrasi untuk pasien
  - Login untuk dokter
- **Manajemen Jadwal Periksa**
  - Pasien dapat membuat janji periksa
  - Dokter dapat melihat dan mencatat hasil pemeriksaan pasien
- **Manajemen Obat**
  - CRUD (Create, Read, Update, Delete) data obat
- **Dashboard terpisah**
  - Dashboard khusus untuk pasien
  - Dashboard khusus untuk dokter

## Teknologi yang Digunakan

- **Backend**: Laravel 12
- **Database**: MySQL
- **Frontend**: Blade Template + AdminLTE
- **Version Control**: GitHub

## Struktur Database (ERD)

1. **Users**
   - id
   - nama
   - alamat
   - no_hp
   - email
   - role (dokter/pasien)
   - password

2. **Periksa**
   - id
   - id_pasien
   - id_dokter
   - tgl_periksa
   - catatan
   - biaya_periksa

3. **Detail Periksa**
   - id
   - id_periksa
   - id_obat

4. **Obat**
   - id
   - nama_obat
   - kemasan
   - harga

## Cara Menjalankan Proyek

1. Clone repositori ini:
   ```bash
   git clone <URL-repo>
