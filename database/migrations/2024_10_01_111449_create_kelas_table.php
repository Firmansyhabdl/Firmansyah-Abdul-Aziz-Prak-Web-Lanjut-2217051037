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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelas');
            $table->timestamps();
        });

        Schema::create('user', function(Blueprint $table){
            $table->id();
            $table->string('nama');
            $table->string('npm');
            $table->foreignId('kelas_id')->constrained();
            $table->timestamps();
            
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('kelas');
        Schema::dropIfExists('user');

    }

    
};
