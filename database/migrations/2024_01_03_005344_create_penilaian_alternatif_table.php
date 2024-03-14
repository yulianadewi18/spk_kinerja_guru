<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianAlternatifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian_alternatif', function (Blueprint $table) {
            $table->id();
            $table->string('periode');
            $table->unsignedBigInteger('id_alternatif');
            $table->foreign('id_alternatif')->references('id')->on('mst_alternatif')->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedBigInteger('id_kriteria');
            $table->foreign('id_kriteria')->references('id')->on('mst_kriteria')->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedBigInteger('id_sub');
            $table->foreign('id_sub')->references('id')->on('mst_sub_kriteria')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('id_admin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penilaian_alternatif');
    }
}
