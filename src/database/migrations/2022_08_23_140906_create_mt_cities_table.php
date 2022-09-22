<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_cities', function (Blueprint $table) {
            $table->id();
            $table->string('address_code')->nullable();
            $table->string('prefecture_code')->nullable();
            $table->string('area_code')->nullable();
            $table->string('cities_code')->nullable();
            $table->string('cities_name')->nullable();
            $table->string('cities_name_k')->nullable();
            $table->string('area_name')->nullable();
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
        Schema::dropIfExists('mt_cities');
    }
}
