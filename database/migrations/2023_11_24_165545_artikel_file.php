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
        Schema::create('artikel_file', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_artikel');
            $table->string('nama_file');
            $table->string('jenis_file');
            $table->timestamps();

            $table->foreign('id_artikel')
                ->references('id')
                ->on('artikel')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('artikel_file');
    }
};
