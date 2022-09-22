<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_information', function (Blueprint $table) {
            $table->id();
            $table->string('img_url')->nullable();
            $table->string('room_rate')->nullable();
            $table->string('room_name')->nullable();
            $table->float('fee')->nullable();
            $table->float('management_fee')->nullable();
            $table->float('deposit')->nullable();
            $table->float('key_money')->nullable();
            $table->string('address')->nullable();
            $table->string('station1')->nullable();
            $table->string('station2')->nullable();
            $table->smallInteger('type')->nullable();
            $table->float('plan_of_house')->nullable();
            $table->float('step')->nullable();
            $table->float('step_amount')->nullable();
            $table->date('year_build')->nullable();
            $table->smallInteger('area')->nullable();
            $table->dateTime('updated_information_date')->nullable();
            $table->string('listed_site')->nullable();
            $table->float('reward')->nullable();
            $table->string('registered_company')->nullable();
            $table->float('advertisements')->nullable();
            $table->smallInteger('trade_style')->nullable();
            $table->string('tel')->nullable();
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
        Schema::dropIfExists('property_information');
    }
}
