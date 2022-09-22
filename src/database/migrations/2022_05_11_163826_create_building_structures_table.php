<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_structures', function (Blueprint $table) {
            $table->id();
            $table->boolean('wooden')->nullable();
            $table->boolean('block')->nullable();
            $table->boolean('steel')->nullable();
            $table->boolean('rc')->nullable();
            $table->boolean('src')->nullable();
            $table->boolean('pc')->nullable();
            $table->boolean('hpc')->nullable();
            $table->boolean('lightweight_steel')->nullable();
            $table->boolean('alc')->nullable();
            $table->boolean('others')->nullable();
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
        Schema::dropIfExists('building_structures');
    }
}
