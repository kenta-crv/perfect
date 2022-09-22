<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('group_id')->nullable();
            $table->bigInteger('store_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('license')->nullable();
            $table->string('company_name')->nullable();
            $table->string('address')->nullable();
            $table->string('tel')->nullable();
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->smallInteger('plans')->nullable();
            $table->smallInteger('payment_method')->nullable();
            $table->smallInteger('status')->nullable();
            $table->dateTime('last_access_datetime')->nullable();
            $table->string('contract_number')->nullable();
            $table->string('contract_id')->nullable();
            $table->string('contract_card_id')->nullable();
            $table->boolean('headquarter_flag')->default(0)->nullable();
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
        Schema::dropIfExists('accounts');
    }
}
