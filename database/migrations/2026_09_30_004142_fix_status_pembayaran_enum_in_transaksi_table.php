<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("ALTER TABLE transaksi MODIFY status_pembayaran ENUM('belum_lunas','lunas') NOT NULL DEFAULT 'belum_lunas'");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE transaksi MODIFY status_pembayaran ENUM('belum_lunas') NOT NULL DEFAULT 'belum_lunas'");
    }
};