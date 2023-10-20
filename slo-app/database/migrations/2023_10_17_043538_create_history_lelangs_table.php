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
        Schema::create('history_lelangs', function (Blueprint $table) {
            $table->unsignedBigInteger('id_history')->autoIncrement();
            $table->unsignedBigInteger('id_barang')->nullable();
            $table->unsignedBigInteger('id_masyarakat')->nullable();
            $table->unsignedBigInteger('id_lelang')->nullable();
            $table->integer('penawaran_harga');

            $table->foreign('id_barang')->references('id_barang')->on('barangs');
            $table->foreign('id_masyarakat')->references('id')->on('users');
            $table->foreign('id_lelang')->references('id_lelang')->on('lelangs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_lelangs');
    }
};
