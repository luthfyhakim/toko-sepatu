# UrbanKicks

UrbanKicks adalah website toko sepatu yang menyediakan berbagai macam sepatu trendy dan stylish. Website ini dibangun dengan menggunakan teknologi web modern dan dirancang untuk memberikan pengalaman belanja yang nyaman bagi pengguna.

## Instalasi
- Pertama arahkan ke direktori `admin` :
  ```sh
  cd admin
  ```

- Instal dependensi :
  ```sh
  npm install
  ```
  > pastikan mempunyai nodejs terlebih dahulu

- Lalu export file sql `toko_sepatu.sql`

- Buka browser kemudian dari localhost arahkan ke :
  > untuk halaman user
  ```
  /toko-sepatu/src/index.php
  ```

  > untuk halaman admin
  ```
  /toko-sepatu/admin/index.php
  ```
  **username:** `admin`
  
  **password:** `admin`

## Fitur

- Tampilan responsif yang memastikan website dapat diakses dengan baik di berbagai perangkat.
- Pencarian sepatu berdasarkan kategori, merek, dan harga.
- Halaman produk yang menampilkan informasi detail tentang setiap sepatu.
- Halaman profil pengguna untuk melihat dan mengubah informasi pribadi.

## Kriteria Project

Terdiri dari halaman user dan halaman admin
- [x] Halaman Admin
    - [x] Terdapat login
    - [x] (optional) Multi level user
    - [x] Terdapat menu data master (1 table database) dan menu transaksi (table relasi min dengan relasi 1-n)
    - [x] Menerapkan CRUD, Pencarian dan Paginasi
- [x] Halaman User
    - [x] Minimal 3 menu / halaman (data diambil dari database)

## Kriteria Database

- [x] Minimal 3 table, lebih tidak apa-apa (terdapat relasi)
- [x] Terdapat table master dan table transaksi
- [x] Antara table master dan table transaksi terdapat relasi

## Kriteria Operasi Program Terkait Database

- [x] Terdapat join (minimal 1-n)
- [x] (optional) Terdapat minimal satu jenis aggregate function
- [x] Terdapat fungsi create, read, update, delete (CRUD), dan search

## Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).
