<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('transaksi', 'dikembalikan')) {
            Schema::table('transaksi', function (Blueprint $table) {
                $table->renameColumn('dikembalikan', 'kembalian');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('transaksi', 'kembalian')) {
            Schema::table('transaksi', function (Blueprint $table) {
                $table->renameColumn('kembalian', 'dikembalikan');
            });
        }
    }
};
