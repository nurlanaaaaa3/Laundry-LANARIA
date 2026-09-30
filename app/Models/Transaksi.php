<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    public $timestamps = false;

    protected $fillable = [
        'id_pelanggan',
        'id_user',
        'tanggal_masuk',
        'tanggal_selesai',
        'total',
        'dibayar', 
        'kembalian',
        'status_pembayaran',
        'status_laundry',
        'catatan',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_masuk' => 'datetime',
            'tanggal_selesai' => 'datetime',
        ];
    }

    // transaksi dimiliki oleh 1 pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }

    // transaksi dibuat oleh 1 user (kasir/admin), boleh kosong untuk booking dari website
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    // 1 transaksi punya banyak detail
    public function DetailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_transaksi', 'id_transaksi');
    }
}
