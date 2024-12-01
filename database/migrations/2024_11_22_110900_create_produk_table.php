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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('kategori');
            $table->foreignId('pengarang_id')->constrained('pengarang');
            $table->foreignId('penerbit_id')->constrained('penerbit');
            $table->foreignId('stok_id')->constrained('stok');
            $table->string('nama_produk');
            $table->float('berat_produk');
            $table->string('ukuran_produk');
            $table->string('bahasa');
            $table->string('isbn');
            $table->string('jenis_cover');
            $table->string('halaman_produk');
            $table->string('keterangan')->nullable();
            $table->boolean('status')->default(true);
            $table->text('catatan')->nullable();
            $table->text('jenis_isi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
