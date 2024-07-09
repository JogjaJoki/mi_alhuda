<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuruPelajaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru_pelajaran', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pelajaran', 100);
            $table->string('NIP', 100);
            $table->timestamps();

            $table->foreign('kode_pelajaran')->references('kode_pelajaran')->on('pelajaran')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('NIP')->references('NIP')->on('guru')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guru_pelajaran');
    }
}
