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
        Schema::table('promos', function (Blueprint $table) {
            $table->unsignedBigInteger('perusahaan_id')->default(1)->after('id');
            $table->foreign('perusahaan_id')->references('id')->on('perusahaans')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('promos', function (Blueprint $table) {
            $table->dropForeign(['perusahaan_id']);
            $table->dropColumn('perusahaan_id');
        });
    }
};
