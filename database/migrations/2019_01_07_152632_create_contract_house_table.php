<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractHouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_house', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('house_id')->comment('房源id');
            $table->integer('contract_id')->comment('合同id');
            $table->integer('building_id')->comment('楼宇id');
            $table->integer('space')->comment('空间数，如果是按工位的，就是工位个数,如果是按面积算的就是㎡');
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
        Schema::dropIfExists('contract_house');
    }
}
