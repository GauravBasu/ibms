<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMBlockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_block', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('block_name',100);
            $table->integer('district_id')->unsigned();
            $table->foreign('district_id')->references('id')->on('m_district');
            $table->string('block_status',1);
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('m_block');
    }
}
