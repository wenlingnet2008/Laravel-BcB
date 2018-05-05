<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefaultParaValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('default_para_values', function (Blueprint $table) {
            $table->increments('dvid');
            $table->unsignedInteger('dpid');
            $table->string('value', 100)->comment('默认参数值');
            $table->string('unit', 30)->default('')->comment('单位');
            $table->string('norm_unit', 30)->default('')->comment('标准单位');
            $table->bigInteger('change_value')->defalut(0)->comment('转化成标准单位后的值 基数 10000');
            $table->unique(['dpid', 'value']);
            $table->foreign('dpid')->references('dpid')->on('default_paras');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('default_para_values');
    }
}
