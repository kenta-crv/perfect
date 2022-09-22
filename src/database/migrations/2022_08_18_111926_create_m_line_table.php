<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMLineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_line', function (Blueprint $table) {
            $table->id();
            $table->string('line_cd')->nullable();
            $table->string('company_cd')->nullable();
            $table->string('line_name')->nullable();
            $table->string('line_name_k')->nullable();
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
        Schema::dropIfExists('m_line');
    }
}
