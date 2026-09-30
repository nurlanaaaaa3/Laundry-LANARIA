<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("ALTER TABLE transaksi MODIFY status_pembayaran ENUM('belum_lunas','lunas') NOT NULL DEFAULT 'belum_lunas'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE transaksi MODIFY status_pembayaran ENUM('belum_lunas') NOT NULL DEFAULT 'belum_lunas'");
    }
};
