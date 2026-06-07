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
        Schema::create('pembayarans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');   
        $table->foreignId('program_studi_id')->constrained('data_program_studis')->onDelete('cascade');
        $table->foreignId('fakultas_id')->constrained('data_fakultas')->onDelete('cascade');   
        $table->integer('harga_bayar');
        $table->enum('status_pembayaran', ['sudahdibyr', 'blmdbyr'])->default('blmdbyr');
        $table->string('bukti_transfer')->nullable();   
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
