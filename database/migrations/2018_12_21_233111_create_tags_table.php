<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateTagsTable.
 */
class CreateTagsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tags', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('当parent_id=0时，为分类名称;当parent_id不为0时，标签名称');
            $table->string('alias')->comment('当parent_id=0时，为分类名称别名（用英文）;当parent_id不为0时，为空')->nullable();
            $table->tinyInteger('parent_id')->comment('0:分类，不为0：所属标签的id')->default(0);
            $table->tinyInteger('user_id')->default(0)
                ->comment('parent_id=0,user_id无意义;
                                    当parent_id不为0时,user_id=0的 属于系统自带，不能删除，
                                    user_id不为0 的,为用户自定义添加的标签所属二级用户的id，预留，暂不用');
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
		Schema::drop('tags');
	}
}
