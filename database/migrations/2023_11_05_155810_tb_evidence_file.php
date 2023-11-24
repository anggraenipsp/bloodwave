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
        Schema::create('tb_evidence_file', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_riwayat_donor_darah');
            $table->string('nama_file');
            $table->string('jenis_file');
            $table->timestamps();

            $table->foreign('id_riwayat_donor_darah')
                ->references('id')
                ->on('tb_riwayat_donor_darah')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_evidence_file');
    }
};
