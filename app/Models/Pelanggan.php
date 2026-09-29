<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Pelanggan extends Authenticatable
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
    public $timestamps = false;
    protected $guard = 'pelanggan';

    protected $fillable = [
        'nama_pelanggan',
        'username',
        'password',
        'no_hp',
        'alamat',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return[
            'password' => 'hashed',
        ];
    }

    // 1 pelanggan punya banyak transaksi
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_pelanggan', 'id_pelanggan');
    }
}