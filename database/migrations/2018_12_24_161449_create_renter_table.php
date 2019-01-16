<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRenterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renters', function (Blueprint $table) {
            $table->increments('id');
//            $table->string('companyName')->comment('租客名称');
//            $table->string('contact_name')->comment('租客名称');
//            $table->string('replyname')->comment('租客名称');
            $table->string('company')->comment('租客名称');
            $table->string('contact')->comment('联系人名称');
            $table->string('identification_card')->comment('证件号码');
            $table->string('industry_category')->comment('行业分类')->nullable();
            $table->string('mobile')->comment('联系电话')->nullable();
            $table->string('email')->comment('邮箱')->nullable();
            $table->integer('user_id')->nullable();



//            https://api.yonyoucloud.com/apilink/tempServicePages/30765a27-64d0-4c89-b269-321f4695da37_true.html
//            {
//                "result": "success",  #返回结果：success成功，fail失败
//    "state": "200",     #状态码：200成功，404找不到，500内部错误
//    "total": 1,          #返回数量
//    "detail": {
//                "corpname": "用友网络科技股份有限公司",   #公司名称
//        "website": "www.yonyou.com",   #公司官网
//        "address": "北京市海淀区北清路68号",  #地址
//        "creditcode": "91110000600001760P",  #统一社会信用代码
//        "gongsh": "110000005119254",   #工商注册号

//        "orgcode": "60000176-0",   #组织机构代码
//        "state": "存续",               #经营状态
//        "type": "其他股份有限公司(上市)",   #公司类型
//        "regtime": "1995-01-18",   #注册时间
//        "proxyer": "王文京",    #法人

//        "money": "146429.3443万元人民币",  #注册资本
//        "onlinetime": "1999-12-06 至 无固定期限",   #营业期限
//        "regpart": "北京市工商行政管理局",  #注册机关
//        "fieldrange": "零售图书；第一类增值电信业务中的因特网数据中心业务；第二类增值电信业务中的呼叫中心业务、因特网接入服务业务、信息服务业务（不含固定网电话信息服务和互联网信息服务）（增值电信业务经营许可证有效期至2020年07月07日）；互联网信息服务（不含新闻、出版、教育、医疗保健、药品和医疗器械，含电子公告服务）（电信与...",   #经营范围
//        "industry": "信息传输、软件和信息技术服务业",  #行业

//        "email": "ypj@yonyou.com",   #邮箱
//        "phone": "62436688",   #联系电话
//        "taxNumber": "91110000600001760P(110108600001760)",  #纳税人识别号
//        "hasUnify": "yes",   #是否三证合一：yes是，no否
//        "shortcut":"暂无",  #公司简介
//        "persons":[{  #人员
//                    "name":"",  //姓名
//		"position"   //职务
//	}],
//	"holders":[{  #股东
//                    name: "王文京", //股东
//		rate: "-",   //持股比例
//		fund: "-",    //认缴出资额（万元）
//		funddate: "-",  //出资日期
//		type: "自然人股东"   //认缴出资额（万元）
//	}]
//    }
//}
//            "regNumber":"440106000528204",  /*注册号*/
//            "socialCreditCode":"91440106585680928E",  /*统一社会信用代码*/
//            "orgCode":"",  /*组织机构代码*/
//            "historyName":"",  /*公司曾用名*/
//            "companyType":"股份有限公司",  /*公司类型*/

//            "industry":"",  /*公司所属行业*/
//            "province":"",  /*公司所在省份*/
//            "legalPersonName":"彭捷",  /*公司法人*/
//            "regCapital":"795.50万",  /*注册资本*/
//            "regDate":"2011-11-18",  /*注册时间*/

//            "regAddress":"广州市天河区林和西路161号2801-B单元（仅限办公用途）",  /*注册地址*/
//            "operatingPeriod":"2011-11-18 - \n \n \n \n 2099-01-01",  /*营业期限*/
//            "businessScope":"数字动漫制作;商品批发贸易（许可审批类商品除外）;科技信息咨询服务;软件开发;数据处理和存储服务;广告业;
//                              网络技术的研究、开发;计算机技术开发、技术服务;信息电子技术服务;
//                              信息系统集成服务;互联网商品销售（许可审批类商品除外）;房地产中介服务;
//                              房地产咨询服务; (依法须经批准的项目，经相关部门批准后方可开展经营活动)〓",  /*经营范围*/
//            "regOrgans":"广州市工商行政管理局",  /*登记机关*/
//            "approvedDate":"",  /*核准日期*/

//            "regStatus":"存续"  /*登记状态*/


//            $table->string('regNumber')->comment('注册号')->nullable();
//            $table->string('socialCreditCode')->comment('统一社会信用代码')->nullable();
//            $table->string('orgCode')->comment('组织机构代码')->nullable();
//            $table->string('historyName')->comment('公司曾用名')->nullable();
//            $table->string('companyType')->comment('公司类型')->nullable();
//
//            $table->string('industry')->comment('所属行业')->nullable();
//            $table->string('province')->comment('省份')->nullable();
//            $table->string('legalPersonName')->comment('法定代表人')->nullable();
//            $table->string('regCapital')->comment('注册资本')->nullable();
//            $table->string('regDate')->comment('注册时间')->nullable();
//
//
//            $table->string('regAddress')->comment('注册地址')->nullable();
//            $table->string('operatingPeriod')->comment('营业期限')->nullable();
//            $table->string('businessScope')->comment('经营范围')->nullable();
//            $table->string('regOrgans')->comment('登记状态')->nullable();
//            $table->string('approvedDate')->comment('核准日期')->nullable();
//
//            $table->string('regStatus')->comment('登记状态')->nullable();

//            $table->string('nation')->comment('国籍')->nullable();
//            $table->string('registered_capital')->comment('经营状态')->nullable();
//            $table->timestamp('found_date')->comment('成立日期')->nullable();
//            $table->string('staff_size')->comment('人员规模')->nullable();
//            $table->timestamp('business_limit_time')->comment('营业期限')->nullable();
//            $table->string('register_authority')->comment('登记机关')->nullable();
//            $table->string('issue_date')->comment('核准日期')->nullable();
//            $table->string('register_location')->comment('注册地址')->nullable();
//            $table->string('business_scope')->comment('经营范围')->nullable();

            $table->string('tags')->comment('客户标签')->nullable();
            $table->timestamps();
        });

        Schema::create('renter_company_kaipiao',function(Blueprint $table){
            $table->increments('id');
            $table->string('bank_name')->comment('开户银行')->nullable();
            $table->string('bank_account')->comment('开户银行账号')->nullable();
            $table->string('mobile')->comment('电话')->nullable();
            $table->string('billing_address')->comment('开票地址')->nullable();
            $table->integer('renter_id');
        });
        Schema::create('renter_company_info',function(Blueprint $table){
            $table->increments('id');

            $table->string('corpname')->comment('公司名称')->nullable();
            $table->string('website')->comment('公司官网')->nullable();
            $table->string('address')->comment('地址')->nullable();
            $table->string('creditcode')->comment('统一社会信用代码')->nullable();
            $table->string('gongsh')->comment('工商注册号')->nullable();


            $table->string('orgcode')->comment('组织机构代码')->nullable();
            $table->string('state')->comment('经营状态')->nullable();
            $table->string('type')->comment('公司类型')->nullable();
            $table->timestamp('regtime')->comment('注册时间')->nullable();
            $table->string('proxyer')->comment('法人')->nullable();

            $table->string('money')->comment('注册资本')->nullable();
            $table->string('onlinetime')->comment('营业期限')->nullable();
            $table->string('regpart')->comment('注册机关')->nullable();
            $table->string('fieldrange')->comment('经营范围')->nullable();
            $table->string('industry')->comment('行业')->nullable();

            $table->string('email')->comment('邮箱')->nullable();
            $table->string('phone')->comment('联系电话')->nullable();
            $table->string('taxNumber')->comment('纳税人识别号')->nullable();
            $table->string('hasUnify')->comment('是否三证合一')->nullable();
            $table->string('shortcut')->comment('公司简介')->nullable();

            $table->integer('renter_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('renters');
        Schema::dropIfExists('renter_company_kaipiao');
        Schema::dropIfExists('renter_company_info');
    }
}
