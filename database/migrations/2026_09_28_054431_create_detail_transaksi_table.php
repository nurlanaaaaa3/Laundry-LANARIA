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
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->increments('id_detail');

            $table->unsignedInteger('id_transaksi');
            $table->unsignedInteger('id_layanan');

            $table->decimal('jumlah', 10, 2);
            $table->integer('harga');
            $table->integer('subtotal');

            $table->foreign('id_transaksi')
                  ->references('id_transaksi')->on('transaksi');
            $table->foreign('id_layanan')
                  ->references('id_layanan')->on('layanan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi');
    }
};
