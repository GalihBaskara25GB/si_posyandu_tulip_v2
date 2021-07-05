<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePairwisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pairwises', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->float('bobot');
            $table->uuid('from_kriteria');
            $table->foreign('from_kriteria')->references('id')->on('objek_kriterias')->onDelete('cascade');
            $table->uuid('to_kriteria');
            $table->foreign('to_kriteria')->references('id')->on('objek_kriterias')->onDelete('cascade');
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
        Schema::dropIfExists('pairwises');
    }
}
