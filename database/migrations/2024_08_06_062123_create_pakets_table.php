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
        Schema::create('pakets', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket');
            $table->string('gambar')->nullable();
            $table->string('kuota')->default('Unlimited');
            $table->string('kecepatan');
            $table->decimal('harga', 10, 2);
            $table->text('fitur');
            $table->enum('status', ['Aktif', 'Tidak Aktif', 'Draft'])->default('Draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pakets');
    }
};
