<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pelajaran', 100);
            $table->string('NIS', 100);
            $table->string('nilai', 200);
            $table->timestamps();

            $table->foreign('kode_pelajaran')->references('kode_pelajaran')->on('pelajaran')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('NIS')->references('NIS')->on('siswa')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai');
    }
}
