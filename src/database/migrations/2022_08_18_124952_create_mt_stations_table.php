<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_stations', function (Blueprint $table) {
            $table->id();
            $table->string('station_cd')->nullable();
            $table->string('station_g_cd')->nullable();
            $table->string('station_name')->nullable();
            $table->string('station_name_k')->nullable();
            $table->string('line_cd')->nullable();
            $table->string('pref_cd')->nullable();
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
        Schema::dropIfExists('mt_stations');
    }
}
