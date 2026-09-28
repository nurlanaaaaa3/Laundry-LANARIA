<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'layanan';
    protected $primaryKey = 'id_layanan';
    public $timestamps = false;

    protected $fillable = [
        'nama_layanan', 
        'harga',
        'satuan', 
        'estimasi',
        'status',
    ];

    // 1 layanan muncul di banyak detail transaksi 
    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_layanan', 'id_layanan');
    }
}
