<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->string('slug')->unique();
            $table->double('jumlah_barang');
            $table->string('kondisi_awal');
            $table->foreignId('kondisi_id')->constrained()->onDelete('cascade');
            $table->foreignId('ruangan_id')->constrained()->onDelete('cascade');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stok_barangs');
    }
};
