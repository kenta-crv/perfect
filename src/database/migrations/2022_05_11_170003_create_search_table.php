<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('search', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('account_id')->nullable();
            $table->string('railway_name')->nullable();
            $table->string('station')->nullable();
            $table->string('city')->nullable();
            $table->string('town')->nullable();
            $table->string('name')->nullable();
            $table->float('fee_min')->nullable();
            $table->float('fee_max')->nullable();
            $table->bigInteger('plan_of_rent_fee_id')->nullable();
            $table->bigInteger('plan_of_house')->nullable();
            $table->float('area_min')->nullable();
            $table->float('area_max')->nullable();
            $table->bigInteger('building_structure')->nullable();
            $table->smallInteger('step_min')->nullable();
            $table->smallInteger('step_max')->nullable();
            $table->smallInteger('step_flag')->nullable();
            $table->string('keyword')->nullable();
            $table->date('publishing_date')->nullable();
            $table->bigInteger('trade_style_id')->nullable();
            $table->boolean('image_flag')->nullable();
            $table->boolean('drawing_flag')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('search');
    }
}
