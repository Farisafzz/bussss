<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('schedules', function (Blueprint $table) {
        $table->id();
        $table->foreignId('bus_id')->constrained()->onDelete('cascade');
        $table->date('tanggal');
        $table->time('jam_berangkat');
        $table->time('jam_tiba')->nullable();
        $table->integer('total_kursi');
        $table->integer('kursi_tersedia');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
