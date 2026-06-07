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
       Schema::create('data_Mahasiswas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('nik')->unique();
        $table->text('alamat');
        $table->enum('jenis_kelamin', ['L', 'P']);
        $table->string('agama');
        $table->string('tempat_lahir');
        $table->date('tanggal_lahir'); 
        $table->string('no_hp');
        $table->year('lulusan_tahun');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_mahasiswas');
    }
};
