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
        Schema::create('karirs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('requirements');
            $table->string('location');
            $table->string('salary')->nullable();
            $table->date('posted_date');
            $table->date('closing_date');
            $table->enum('work_location', ['WFH', 'WFO'])->default('WFO');
            $table->enum('work_type', ['Part-time', 'Full-time'])->default('Full-time');
            $table->integer('candidate_needed')->default(1);
            $table->foreignId('perusahaan_id')->constrained()->onDelete('cascade');
            $table->foreignId('kategori_id')->constrained('kategori_karirs')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karirs');
    }
};
