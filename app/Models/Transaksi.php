<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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

    protected static function booted(): void
    {
        static::creating(function ($transaksi) {
            if (empty($transaksi->kode_transaksi)) {
                $transaksi->kode_transaksi = static::buatKode($transaksi->tanggal_masuk);
            }
        });
    }

    public static function buatKode(): string
    {
        $terakhir = (int) static::query()
            ->selectRaw('MAX(CAST(SUBSTRING(kode_transaksi, 5) AS UNSIGNED)) as maks')
            ->value('maks');

        return 'LDR-' . str_pad($terakhir + 1, 3, '0', STR_PAD_LEFT);
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
