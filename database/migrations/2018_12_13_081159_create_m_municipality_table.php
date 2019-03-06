<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMMunicipalityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_municipality', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('municipality_name',100);
            $table->integer('muni_district_id')->unsigned();
            $table->foreign('muni_district_id')->references('id')->on('m_district');
            $table->string('municipality_status',1);
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
        Schema::dropIfExists('m_municipality');
    }
}
