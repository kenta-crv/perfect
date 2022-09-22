<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_state', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('account_id')->nullable();
            $table->smallInteger('state');
            $table->date('dormant_date')->nullable();
            $table->date('restart_date')->nullable();
            $table->date('cancel_date')->nullable();
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
        Schema::dropIfExists('account_state');
    }
}
