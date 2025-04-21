<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable(); // Untuk menyimpan nama file gambar
            $table->string('room_type'); // Tipe kamar (Superior, Deluxe, dll)
            $table->text('description')->nullable(); // Deskripsi kamar
            $table->integer('capacity'); // Kapasitas orang
            $table->decimal('price', 10, 2); // Harga per malam
            $table->integer('quantity'); // Jumlah kamar tersedia
            $table->text('room_facilities')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
