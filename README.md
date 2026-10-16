# LAUNDRIA - Sistem Laundry 

Aplikasi web untuk mengelola layanan laundry: pelanggan dapat melihat tentang kami, layanan dan estimasi , harga, cara kerja dan kontak lalu memesan secara online, sedangkan admin mengelola pelanggan, layanan, transaksi, laporan. Dibangun dengan Laravel, MySQL, dan Bootstrap 5 .

## Fitur

### Admin
- Login & logout dengan proteksi session ('/admin/login')
- Dashboard: jumlah pelanggan, jumlah transaksi, total pendapatan, transaksi menunggu, transaksi diproses, dan transaksi selesai
- Kelola data pelanggan (tambah, edit, hapus) + pencarian & pagination
- Kelola layanan dan harga (tambah, edit, hapus, aktif/nonaktif) + pencarian & pagination
- Input transaksi dengan banyak layanan: subtotal, total, dan kembalian dihitung otomatis
- Kode pesanan otomatis dan berurutan (contoh 'LDR-001, LDR-002, LDR-003,...') pada setiap transaksi, halaman kelola, dan laporan
- Kelola status laundry (Menunggu, Diproses, Selesai, Diambil) dan status pembayaran, dengan validasi "Lunas" tidak boleh jika pembayaran kurang
- Filter transaksi berdasarkan status, cari berdasarkan kode pesanan atau nama pelanggan 
- Laporan per rentang tanggal: ringkasan pendapatan, export **Excel** dan **PDF**
- Profil admin (ubah nama, username, password)

### Pelanggan
- Register & login akun pelangan 
- Landing page: tentang kami, layanan, harga, estimasi, cara kerja, dan kontak (data layanan dari database)
- Pesan Sekarang: pilih lebih dari satu layanan, subtotal dan estimasi total dihitung otomatis, 
- Setelah memesan, pelanggan menerima kode pesanan pada pesan sukses (contoh: 'LDR-001'), untuk disebutkan saat mengantar atau mengambil cucian
- Dashboard riwayat pesanan beserta nomor pesanan, status bayar, dan status laundry
- Edit profil dan ganti password

### Tampilan
- Desain putih dan biru, responsif untuk HP (sidebar berubah menjadi menu ☰)
- Landing page terdiri dari hero (tombol pesan sekarang dan lihat layanan), tentang kami, layanan, daftar harga (dikelompokkan per satuan kilogram dan item, lengkap dengan estimasi), cara kerja, kontak (WhatsApp), serta footer
- Landing page menampilkan status "Buka/Tutup sekarang" otomatis berdasarkan jam operasional
- Halaman login admin, login pelanggan, dan daftar memakao tampilan dua kolom dengan tombol lihat/sembunyikan password

## Hak Akses

| Halaman | Pengunjung | Pelanggan | Admin |
|---|---|---|---|
| Landing page | ✅ | ✅ | ✅ |
| Register / login pelanggan | ✅ | — | — |
| Pesan Sekarang, riwayat, profil pelanggan | ❌ | ✅ | ❌ |
|Dasboard, CRUD, laporan, profil admin | ❌ | ❌ | ✅ |

Admin dan pelanggan memakai guard login yang terpisah, sehingga sesi keduanya tidak saling tertukar.

## Nomor Pesanan

Format: 'LDR-NNN'
| Bagian | Arti | Contoh |
|---|---|---|
| `LDR` | Awalan LAUNDRIA | `LDR` |
| `NNN` | ID transaksi, 3 digit | `007` |

Contoh: LDR-007
