<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRangkingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rangkings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->double('nilai_preferensi');
            $table->uuid('kader_id')->unique();
            $table->foreign('kader_id')->references('id')->on('kaders')->onDelete('cascade');
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
        Schema::dropIfExists('rangkings');
    }
}
