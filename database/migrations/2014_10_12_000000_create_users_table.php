<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama pengguna
            $table->string('email')->unique(); // Email (harus unik)
            $table->string('password'); // Password
            $table->enum('role', ['tamu']);
            $table->rememberToken();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('users');
    }
};
