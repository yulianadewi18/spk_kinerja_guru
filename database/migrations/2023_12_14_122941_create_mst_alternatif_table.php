<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstAlternatifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_alternatif', function (Blueprint $table) {
                $table->id();
                $table->string('kode_alternatif');
                $table->unsignedBigInteger('id_guru');
                $table->foreign('id_guru')->references('id')->on('mst_guru')->onDelete('restrict')->onUpdate('cascade');
                
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
        Schema::dropIfExists('mst_alternatif');
    }
}
