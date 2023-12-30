<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_guru', function (Blueprint $table) {
            $table->id();
            $table->string('nama_guru');
            $table->enum('gender', ['Laki-laki', 'Perempuan']);  
            $table->string('nipa');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir'); 
            $table->string('nuptk');
            $table->string('nrg');
            $table->string('jns_guru');
            $table->string('tugas');
            $table->string('tambahan');
            $table->string('ijazah');
            $table->year('tahun_lulus');
            $table->string('pt');
            $table->string('fakultas');
            $table->string('jurusan');
            $table->string('prodi');
            $table->string('akta_mengajar');
            $table->string('jalan');
            $table->string('rt');
            $table->string('rw');
            $table->string('dusun');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('kodepos');
            $table->string('nohp');
            $table->string('nohp2');
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
        Schema::dropIfExists('mst_guru');
    }
}
