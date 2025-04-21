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
            $table->string('image')->nullable(); 
            $table->string('room_type');
            $table->text('description')->nullable();
            $table->integer('capacity');
            $table->decimal('price', 10, 2);
            $table->integer('quantity');
            $table->text('room_facilities')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
