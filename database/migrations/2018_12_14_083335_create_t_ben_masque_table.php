<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTBenMasqueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_ban_mosque', function (Blueprint $table) {
            $table->increments('id', true);
            $table->integer('ben_id')->unsigned();
            $table->foreign('ben_id')->references('id')->on('m_banificiary');
            $table->integer('t_ben_code')->unsigned();
            $table->foreign('t_ben_code')->references('ben_code')->on('m_banificiary');
            $table->integer('masque_id')->unsigned();
            $table->foreign('masque_id')->references('id')->on('m_masque');
            $table->integer('t_ban_masque_status')->unsigned();
            $table->string('t_ban_status_change_remark',500);
            $table->string('varified_by',100);
            $table->string('varified_comment',100);
            $table->dateTime('varified_date',100);
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
        Schema::dropIfExists('t_ban_mosque');
    }
}
