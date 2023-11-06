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
        Schema::create('tb_lokasi_donor', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lokasi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_lokasi_donor');
    }
};