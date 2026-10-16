# LAUNDRIA - Sistem Laundry 

Aplikasi web untuk mengelola layanan laundry: pelanggan dapat melihat tentang kami, layanan dan estimasi , harga, cara kerja dan kontak lalu memesan secara online, sedangkan admin mengelola pelanggan, layanan, transaksi, laporan. Dibangun dengan Laravel, MySQL, dan Bootstrap 5 .

## Fitur

### Admin
- Login & logout dengan proteksi session ('/admin/login')
- Dashboard: jumlah pelanggan, jumlah transaksi, total pendapatan, transaksi menunggu, transaksi diproses, dan transaksi selesai
- Kelola data pelanggan (tambah, edit, hapus) + pencarian & pagination
- Kelola layanan dan harga (tambah, edit, hapus, aktif/nonaktif) + pencarian & pagination
- Input transaksi dengan banyak layanan: subtotal, total, dan kembalian dihitung otomatis
- Nomor pesanan otomatis (contoh 'LDR-001') di daftar transaksi, halaman kelola, dan laporan
- Kelola status laundry (Menunggu, Diproses, Selesai, Diambil) dan status pembayaran, dengan validasi "Lunas" tidak boleh jika pembayaran kurang
- Filter transaksi berdasarkan status, cari berdasarkan nama pelanggan atau nomor pesanan
- Laporan per rentang tanggal: ringkasan pendapatan, export **Excel** dan **PDF**
- Profil admin (ubah nama, username, password)

### Pelanggan
- Register & login akun pelangan 
- Landing page: tentang kami, layanan, harga, estimasi, cara kerja, dan kontak (data layanan dari database)
- Pesan Sekarang: pilih lebih dari satu layanan, subtotal dan estimasi total dihitung otomatis, 
- Setelah memesan, pelanggan menerima **nomer pesanan** pada pesan sukses, untuk dibawa saat mengantar atau mengambil cucian
- Dashboard riwayat pesanan beserta nomor pesanan, status bayar, dan status laundry
- Edit profil dan ganti password

### Tampilan
- Desain putih dan biru, responsif untuk HP (sidebar berubah menjadi menu ☰)
- Landing page menampilkan status "Buka/Tutup sekarang" otomatis berdasarkan jam operasional 
