<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMBeneficiaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_banificiary', function (Blueprint $table) {
            $table->increments('id', true);
            $table->integer('ben_code')->unique();
            $table->string('ben_name',500)->nullable(false);
            $table->integer('mobile_no')->nullable(false);
            $table->integer('aadher_no');
            $table->integer('bank_ac_number');
            $table->string('ifsc_code');
            $table->string('ac_type');
            $table->string('pan_number');
            $table->string('address')->nullable(false);
            $table->string('add_block')->nullable(false);
            $table->string('add_district')->nullable(false);
            $table->string('profile_image');        
            $table->string('beneficiary_status',1);
            $table->string('status_remark',500);
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
        Schema::dropIfExists('m_banificiary');
    }
}
