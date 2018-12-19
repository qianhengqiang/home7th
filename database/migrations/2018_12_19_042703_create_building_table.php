<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->tinyInteger('type')->comment('1:写字楼,2:联合办公,3:公寓')->default(1);
            $table->string('province')->comment('省份')->nullable();
            $table->string('city')->comment('城市')->nullable();
            $table->string('area')->comment('区域')->nullable();
            $table->string('name')->comment('楼宇名称');
            $table->string('location')->comment('具体位置')->nullable();
            $table->string('bussiness_mobile')->comment('招商电话')->nullable();
            $table->string('use_for')->comment('用途')->nullable();
            $table->integer('jianzhu_area')->comment('建筑面积')->nullable()->default(0);
            $table->integer('zhandi_area')->comment('占地面积')->nullable()->default(0);
            $table->integer('manager_area')->comment('管理面积')->nullable()->default(0);
            $table->timestamp('build_time')->nullable();
            $table->integer('order_in_advance_day')->comment('账单提醒天数')->nullable()->default(0);
            $table->integer('image')->nullable()->default(0)->comment('图片id');
            $table->string('pre_contract_num')->comment('合同编号前缀')->nullable();
            $table->tinyInteger('contract_midlle_type')->comment('合同编号中间生成方式，1:年份,2:年月')->default(1);
            $table->timestamps();
        });

        Schema::create('building_floors',function (Blueprint $table){
            $table->increments('id');
            $table->integer('building_id');
            $table->string('name')->comment('楼层名称');
            $table->integer('space_count')->comment('面积总数或者工位总数')->default(0);
            $table->integer('hourse_count')->comment('房源总数')->default(0);
//            $table->timestamps();

        });

        Schema::create('building_contract_setting',function (Blueprint $table){
            $table->increments('id');
            $table->integer('building_id');
            $table->tinyInteger('deposit_unit')->comment('默认押金单位,1:元,2:月')->default(1);
            $table->tinyInteger('space_unit')->comment('空间租赁单位,1:面积,2:工位')->default(1);
            $table->tinyInteger('price_unit')->comment('基础单价单位,1:元/space·天,2:元/space·月,3:元/天,4:元/月')->default(1);
            $table->tinyInteger('calculate_precision')->comment('默认计算精度,1:精确计算结果保留两位小数,2:每步计算保留两位小数')->default(1);
            $table->tinyInteger('interval_month')->comment('默认支付类型(几月一付)')->default(1);
            $table->tinyInteger('calculate_type')->comment('默认计费类型,1:按实际天数计费,2:按月计费
                                                                备注:
                                                                1、天单价=实际输入天单价 或者 月单价*12/年天数
                                                                2、月单价=实际输入月单价 或者 天单价*年天数/12
                                                                3、总价=（月单价*月数*面积）+（天单价*实际天数*面积）
                                                                4、以天记租时没有月数，即套用公式3计算，其中月数为0计算
                                                                5、以月记租时，整月按公式3第一项计算，余下的天数按照公式3的第二项计算
                                                        ')->default(1);
            $table->integer('pay_in_advance_day')->comment('默认提前付款时间')->default(0);
            $table->tinyInteger('pay_in_advance_type')->comment('默认提前付款时间类型：1:自然日，2：工作日，3：指定日期')->default(1);

            $table->integer('day_number_per_year')->comment('默认一年多少天')->default(365);
            $table->tinyInteger('unit_price_precision')->comment('单价保留小数点')->default(2);
            $table->tinyInteger('lease_divide_type')->comment(
                                                            '租期划分方式:   
                                                                                1.按起始日划分
                                                                                2.次月按自然月划分(仅一月一付有效)
                                                                                3.按自然月划分(首月非整自然月划入第一期)
                                                                                4.按自然月划分(首月非整自然月算一个月)'
                                                                    )->default(1);
            $table->tinyInteger('month_price_convert_type')->comment('天单价换算规则,1:按年换算，2:按月换算')->default(1);
//            $table->timestamps();


        });

        Schema::create('building_property_setting',function (Blueprint $table){
            $table->increments('id');
            $table->integer('building_id');
            $table->tinyInteger('property_type')->comment('物业类型，1:写字楼，2:住宅，3:商用')->default(1);
            $table->tinyInteger('interval_month')->comment('默认支付类型(几月一付)')->default(1);
            $table->double('fee',8,2)->comment('默认物业费')->default(0);
            $table->integer('price_unit')->comment('基础单价单位,1:元/m²·天,2:元/m²·月')->default(1);
            $table->integer('pay_in_advance_day')->comment('默认提前付款时间')->default(0);
            $table->tinyInteger('pay_in_advance_type')->comment('默认提前付款时间类型：1:自然日，2：工作日，3：指定日期')->default(1);
            $table->tinyInteger('deposit_unit')->comment('默认押金单位,1:元,2:月')->default(1);
            $table->tinyInteger('calculate_precision')->comment('默认计算精度,1:精确计算结果保留两位小数,2:每步计算保留两位小数')->default(1);
            $table->tinyInteger('calculate_type')->comment('默认计费类型,1:按实际天数计费,2:按月计费
                                                                备注:
                                                                1、天单价=实际输入天单价 或者 月单价*12/年天数
                                                                2、月单价=实际输入月单价 或者 天单价*年天数/12
                                                                3、总价=（月单价*月数*面积）+（天单价*实际天数*面积）
                                                                4、以天记租时没有月数，即套用公式3计算，其中月数为0计算
                                                                5、以月记租时，整月按公式3第一项计算，余下的天数按照公式3的第二项计算
                                                        ')->default(1);

            $table->integer('day_number_per_year')->comment('默认一年多少天')->default(365);

            $table->tinyInteger('lease_divide_type')->comment(
                                                            '租期划分方式:   
                                                                                1.按起始日划分
                                                                                2.次月按自然月划分(仅一月一付有效)
                                                                                3.按自然月划分(首月非整自然月划入第一期)
                                                                                4.按自然月划分(首月非整自然月算一个月)'
            )->default(1);
            $table->tinyInteger('month_price_convert_type')->comment('天单价换算规则,1:按年换算，2:按月换算')->default(1);
//            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buildings');
        Schema::dropIfExists('building_floors');
        Schema::dropIfExists('building_contract_setting');
        Schema::dropIfExists('building_property_setting');
    }
}
