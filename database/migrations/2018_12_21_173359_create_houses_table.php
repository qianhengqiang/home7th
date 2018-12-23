<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('building_id')->comment('关联的楼宇');
            $table->integer('floor_id')->comment('关联的楼层');
            $table->string('name')->comment('房号');
            $table->tinyInteger('business_status')->comment('招商状态,0:不招商，1：招商中')->default(0);
            $table->tinyInteger('lease_status')->comment('租赁情况，0：未出租，1：已出租')->default(0);

            $table->integer('space_count')->comment('面积/工位')->default(0);
            $table->string('decoration')->comment('装修风格')->nullable()->default('不限');
            $table->integer('decoration_id')->comment('装修风格id')->default(0);
            $table->integer('fee')->comment('欲租单价')->default(0);
            $table->tinyInteger('price_unit')->comment('基础单价单位,1:元/space·天,2:元/space·月,3:元/天,4:元/月')->default(0);

            $table->tinyInteger('has_lease_count')->comment('已出租空间数')->default(0);
            $table->tinyInteger('contract_all')->comment('该房间一共签订的合同数量（历史+现在）')->default(0);
            $table->tinyInteger('contract_past')->comment('该房间已作废的的所有合同数量')->default(0);
            $table->tinyInteger('contract_now')->comment('该房间目前有的合同数量')->default(0);

            $table->string('house_label')->comment('房源标签')->nullable();
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
        Schema::dropIfExists('houses');
    }
}
