<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contract_number')->comment('合同编号');
            $table->tinyInteger('status')->comment('合同状态，1：审批中，2：审批失败');
            $table->timestamp('start_time')->comment('合同开始时间');
            $table->timestamp('end_time')->comment('合同结束时间');
            $table->timestamp('sign_time')->comment('签订时间');
//            $table->tinyInteger('unit_price_precision')->comment('单价保留小数点')->default(2);

            $table->tinyInteger('renter_id')->comment('租客id');
            $table->string('renter_name')->comment('租客名称');
            $table->string('industry_category')->comment('行业分类')->nullable();
            $table->string('proxyer')->comment('法人')->nullable();
            $table->string('sign_people')->comment('签订人')->nullable();
            $table->string('contact_people')->comment('租客联系人')->nullable();

            $table->string('other_info')->comment('其他关键信息,json')->nullable();

            $table->integer('gongwei')->comment('工位管理')->default(0)->nullable();
            $table->integer('area')->comment('面积管理')->default(0)->nullable();
//            $table->double('area_price')->comment('面积单价')->default(0)->nullable();
//            $table->double('gongwei_price')->comment('工位单价')->default(0)->nullable();

            $table->double('contract_price')->comment('合同单价')->default(0);

            $table->tinyInteger('price_unit')->comment('基础单价单位,1:元/space·天,2:元/space·月,3:元/天,4:元/月')->default(1);

            $table->tinyInteger('deposit_unit')->comment('默认押金单位,1:元,2:月')->default(1);

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



//            $table->string('late_fee_rait')->comment('滞纳金比例')->nullable();


//            $table->tinyInteger('')->comment('房间号');
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
        Schema::dropIfExists('contract');
    }
}
