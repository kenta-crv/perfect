<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanOfHouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_of_house', function (Blueprint $table) {
            $table->id();
            $table->boolean('one_room');
            $table->boolean('1k');
            $table->boolean('2k');
            $table->boolean('3k');
            $table->boolean('4k');
            $table->boolean('1dk');
            $table->boolean('2dk');
            $table->boolean('3dk');
            $table->boolean('4dk');
            $table->boolean('1ldk');
            $table->boolean('2ldk');
            $table->boolean('3ldk');
            $table->boolean('4ldk');
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
        Schema::dropIfExists('plan_of_house');
    }
}
