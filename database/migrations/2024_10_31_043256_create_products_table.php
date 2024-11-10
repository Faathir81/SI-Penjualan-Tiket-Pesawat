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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('airline');
            $table->enum('category', ['class A', 'class B', 'class C']);
            $table->string('departure_location');
            $table->string('arrival_location');
            $table->datetime('departure_time');
            $table->datetime('arrival_time');
            $table->integer('price');
            $table->foreignId('id_user')->constrained('users');
            $table->integer('quota_tiket')->default(25);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
