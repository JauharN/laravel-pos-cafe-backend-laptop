<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // nama
            $table->string('name');
            // description
            $table->text('description')->nullable();
            // harga
            $table->integer('price')->default(0);
            // stok
            $table->integer('stock')->default(0);
            // kategori
            $table->enum('category', ['food', 'drink', 'snack']);
            // gambar
            $table->string('image')->nullable();
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
