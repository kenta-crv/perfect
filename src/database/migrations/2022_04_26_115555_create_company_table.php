<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->id();
            $table->string('license_no')->nullable();
            $table->string('company_name')->nullable();
            $table->string('prefecture')->nullable();
            $table->string('telephone_no')->nullable();
            $table->longText('person_in_charge')->nullable();
            $table->string('email')->unique()->nullable();
            $table->longText('considerations')->nullable();
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
        Schema::dropIfExists('company');
    }
}
