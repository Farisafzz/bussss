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
    Schema::create('buses', function (Blueprint $table) {
        $table->id();
        $table->string('nama_bus');
        $table->string('plat');
        $table->string('asal');
        $table->string('tujuan');
        $table->integer('harga');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buses');
    }
};
