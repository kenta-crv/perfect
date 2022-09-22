<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('users_id')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('line_id')->nullable();
            $table->string('fax_no')->nullable();
            $table->string('license_no')->nullable();
            $table->string('hb_license_no')->nullable();
            $table->integer('no_listed_properties')->nullable();
            $table->string('registered_members')->nullable();
            $table->string('comment_pr')->nullable();
            $table->string('convey_message')->nullable();
            $table->string('photo_path')->nullable();
            $table->string('photo_file')->nullable();
            $table->float('price')->nullable();
            $table->integer('capacity')->nullable();
            $table->boolean('is_home_page')->nullable();
            $table->string('home_page_url')->nullable();
            $table->boolean('is_send_alert')->nullable();
            $table->string('items_printed')->nullable();
            $table->string('google_location')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('location')->nullable();
            $table->string('address')->nullable();
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
        Schema::dropIfExists('properties');
    }
}
