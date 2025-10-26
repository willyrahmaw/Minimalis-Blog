# Blog Application dengan CRUD Postingan

Aplikasi blog sederhana dengan fitur CRUD (Create, Read, Update, Delete) untuk postingan blog dengan admin dashboard yang menarik.

## Fitur

- âœ… **Blog Frontend**: Tampilan sederhana dan modern untuk membaca postingan
- âœ… **Admin Dashboard**: Dashboard admin yang menarik dengan statistik
- âœ… **CRUD Postingan**: Lengkap dengan create, read, update, dan delete
- âœ… **Status Publishing**: Fitur untuk menyimpan postingan sebagai draft atau publish
- âœ… **Slug URL**: URL yang SEO-friendly menggunakan slug
- âœ… **Responsive Design**: Desain responsive untuk desktop dan mobile

## Cara Menggunakan

1. **Akses Blog:**
   - Buka browser dan akses: http://localhost:8000
   - Halaman ini menampilkan semua postingan yang sudah dipublish

2. **Admin Dashboard:**
   - Klik menu "Admin" di navbar
   - Atau akses langsung: http://localhost:8000/admin/dashboard

3. **Membuat Postingan Baru:**
   - Di admin dashboard, klik tombol "Create New Post"
   - Isi judul dan konten postingan
   - Pilih "Publish immediately" jika ingin langsung publish
   - Klik "Create Post"

4. **Edit Postingan:**
   - Di dashboard, klik tombol edit (ikon pensil) pada postingan yang ingin diedit
   - Lakukan perubahan
   - Klik "Update Post"

5. **Hapus Postingan:**
   - Di dashboard, klik tombol hapus (ikon trash)
   - Konfirmasi penghapusan

6. **Preview Postingan:**
   - Klik tombol "View Blog" di sidebar admin
   - Atau klik ikon mata pada tabel dashboard untuk preview postingan

## Struktur Folder

`
app/
  â”œâ”€â”€ Models/
  â”‚   â””â”€â”€ Post.php              # Model untuk postingan
  â””â”€â”€ Http/Controllers/
      â””â”€â”€ PostController.php    # Controller untuk CRUD postingan

resources/views/
  â”œâ”€â”€ blog/
  â”‚   â”œâ”€â”€ index.blade.php       # Halaman daftar postingan
  â”‚   â””â”€â”€ show.blade.php        # Halaman detail postingan
  â””â”€â”€ admin/
      â”œâ”€â”€ dashboard.blade.php   # Dashboard admin
      â””â”€â”€ posts/
          â”œâ”€â”€ create.blade.php  # Form create postingan
          â””â”€â”€ edit.blade.php    # Form edit postingan

routes/
  â””â”€â”€ web.php                   # Route aplikasi
`

## Teknologi yang Digunakan

- **Framework**: Laravel 12
- **Frontend**: Bootstrap 5, Font Awesome
- **Database**: MySQL
- **Language**: PHP 8.2+

## Catatan

- Pastikan database MySQL sudah di-setup dengan benar di file .env
- Jalankan php artisan migrate jika belum dijalankan
- Untuk menjalankan server: php artisan serve

## Selamat Mencoba! ðŸŽ‰

