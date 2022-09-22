<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('account_id')->nullable();
            $table->string('name')->nullable();
            $table->string('target_site')->nullable();
            $table->string('img_url')->nullable();
            $table->string('room_name')->nullable();
            $table->smallInteger('fee')->nullable();
            $table->smallInteger('management_fee')->nullable();
            $table->smallInteger('deposit')->nullable();
            $table->smallInteger('key_money')->nullable();
            $table->string('address')->nullable();
            $table->string('station1')->nullable();
            $table->string('station2')->nullable();
            $table->smallInteger('type')->nullable();
            $table->smallInteger('plan_of_house')->nullable();
            $table->smallInteger('step')->nullable();
            $table->smallInteger('step_amount')->nullable();
            $table->date('year_build')->nullable();
            $table->smallInteger('area')->nullable();
            $table->datetime('update_information_date')->nullable();
            $table->string('listed_site')->nullable();
            $table->smallInteger('reward')->nullable();
            $table->string('registered_company')->nullable();
            $table->smallInteger('advertisements')->nullable();
            $table->smallInteger('trade_style')->nullable();
            $table->string('tel')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorites');
    }
}
