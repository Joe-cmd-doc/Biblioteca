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
        Schema::create('prestecs', function (Blueprint $table) {
            $table->id();
            $table->date('data_inci');
            $table->date('data_final');
            $table->foreignId('id_usuari')->constrained('users') ->onDelete('cascade');
            $table->foreignId('id_llibre')->constrained('llibres')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestecs');
    }
};
