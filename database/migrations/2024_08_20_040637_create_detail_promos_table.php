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
        Schema::create('detail_promos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('promo_id')->constrained('promos')->onDelete('cascade');
            $table->foreignId('paket_promo_id')->constrained('paket_promos')->onDelete('cascade');
            $table->decimal('harga_khusus', 10, 2)->nullable();
            $table->string('kecepatan_khusus')->nullable();
            $table->decimal('diskon', 5, 2)->nullable();
            $table->enum('tipe_diskon', ['persentase', 'nominal'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_promos');
    }
};
