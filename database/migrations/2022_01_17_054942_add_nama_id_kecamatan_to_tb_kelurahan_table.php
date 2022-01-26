<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNamaIdKecamatanToTbKelurahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_kelurahan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_kecamatan');
            $table->string('nama');
            $table->foreign('id_kecamatan')->references('id')->on('tb_kecamatan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_kelurahan', function (Blueprint $table) {
            //
        });
    }
}
