# LAUNDRIA - Sistem Laundry 

Aplikasi web untuk mengelola layanan laundry: pelanggan dapat melihat tentang kami, layanan dan estimasi , harga, cara kerja dan kontak lalu memesan secara online, sedangkan admin mengelola pelanggan, layanan, transaksi, laporan. Dibangun dengan Laravel, MySQL, dan Bootstrap 5 .

## Fitur

### Admin
- Login & logout dengan proteksi session ('/admin/login')
- Dashboard: jumlah pelanggan, jumlah transaksi, total pendapatan, transaksi menunggu, transaksi diproses, dan transaksi selesai
- Kelola data pelanggan (tambah, edit, hapus) + pencarian & pagination
- Kelola layanan dan harga (tambah, edit, hapus, aktif/nonaktif) + pencarian & pagination
- Input transaksi dengan banyak layanan: subtotal, total, dan kembalian dihitung otomatis
- Kelola status laundry (Menunggu, Diproses, Selesai, Diambil) dan status pembayaran, dengan validasi "Lunas" tidak boleh jika pembayaran kurang
- Filter transaksi berdasarkan status dan cari berdasarkan nama pelanggan
- Laporan per rentang tanggal: ringkasan pendapatan, export **Excel** dan **PDF**
- Profil admin (ubah nama, username, password)

### Pelanggan
