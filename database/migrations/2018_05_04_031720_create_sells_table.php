<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sells', function (Blueprint $table) {
            $table->bigIncrements('itemid');
            $table->integer('catid')->unsigned();
            $table->integer('brandid')->unsigned();
            $table->integer('modelid')->unsigned();
            $table->integer('areaid')->unsigned();
            $table->string('title', 255)->comment('产品标题');
            $table->string('subtitle', 100)->default('')->comment('产品副标题');
            $table->string('introduce', 255)->default('')->comment('产品摘要');
            $table->string('model', 100)->default('')->comment('产品型号');
            $table->string('brand', 100)->default('')->comment('产品品牌');
            $table->string('unit', 30)->default('')->comment('产品单位');
            $table->bigInteger('minprice')->default(0)->unsigned()->comment('产品最低价格 基数是1000');
            $table->bigInteger('maxprice')->default(0)->unsigned()->comment('产品最高价格');
            $table->string('currency', 15)->default('USD')->comment('货币单位');
            $table->float('minamount')->default(0.0)->comment('最小起订量');
            $table->float('amount')->default(0.0)->comment('库存量');
            $table->smallInteger('days')->default(7)->comment('发货时间');
            $table->integer('hits')->unsigned()->default(0)->comment('访问次数');
            $table->text('thumb')->nullable()->comment('产品图片,Json数据保存');
            $table->integer('userid')->unsigned();
            $table->string('company', 150)->default('')->comment('公司名称');
            $table->string('true_name', 50)->default('')->comment('联系人');
            $table->bigInteger('currency_price')->defalut(0)->comment('统一单位转换后的价格 基数 1000');
            $table->string('linkurl', 255);
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
        Schema::dropIfExists('sells');
    }
}
