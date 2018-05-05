<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelsParaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('models_para', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('modelid')->unsigned()->index();
            $table->string('para', 50)->comment('参数名称');
            $table->string('value', 100)->comment('参数值');
            $table->integer('dpid')->unsigned()->default(0)->comment('参数名称对应的id');
            $table->integer('dvid')->unsigned()->default(0)->comment('参数值对应的id');
            $table->string('unit', 30)->comment('参数单位')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('models_para');
    }
}
