<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanOfRentFeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_of_rent_fee_', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('management_fee')->nullable();
            $table->boolean('key_money')->nullable();
            $table->boolean('deposit')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_of_rent_fee_');
    }
}
