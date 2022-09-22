<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_informations', function (Blueprint $table) {
            $table->id();
            $table->string('license')->nullable();
            $table->string('company_name')->nullable();
            $table->string('tel')->nullable();
            $table->smallInteger('prefecture')->nullable();
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('email')->nullable();
            $table->text('body')->nullable();
            $table->boolean('status1')->nullable();
            $table->boolean('status2')->nullable();
            $table->boolean('status3')->nullable();
            $table->boolean('status4')->nullable();
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
        Schema::dropIfExists('request_informations');
    }
}
