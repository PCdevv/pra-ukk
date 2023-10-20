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
        Schema::create('barangs', function (Blueprint $table) {
            $table->unsignedBigInteger('id_barang')->autoIncrement();
            $table->string('nama_barang');
            $table->integer('harga_awal');
            $table->string('foto_barang');
            $table->text('deskripsi_barang');
            $table->timestamp('tgl')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
