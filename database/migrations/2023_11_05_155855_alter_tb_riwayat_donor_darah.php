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
        Schema::table('tb_riwayat_donor_darah', function (Blueprint $table) {
            // Tambahkan kolom id_lokasi
            $table->unsignedBigInteger('id_lokasi')->after('lokasi_donor');

            // Definisikan kunci asing untuk id_lokasi
            $table->foreign('id_lokasi')->references('id')->on('tb_lokasi_donor');
            $table->dropColumn('lokasi_donor');
        });
    }

    public function down()
    {
        Schema::table('tb_riwayat_donor_darah', function (Blueprint $table) {
            // Hapus kolom id_lokasi
            $table->dropForeign(['id_lokasi']);
            $table->dropColumn('id_lokasi');
        });
    }
};
