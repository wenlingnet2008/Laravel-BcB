<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('models', function (Blueprint $table) {
            $table->increments('modelid');
            $table->integer('brandid')->unsigned();
            $table->string('name', 50)->comment('型号名称');
            $table->integer('sellnum')->default(0)->index()->comment('产品数量');
            $table->char('letter', 1)->index();
            $table->bigInteger('price')->default(0)->comment('型号价格 基数 1000');
            $table->text('thumb')->nullable()->comment('型号图片');
            $table->string('linkurl', 50);

            $table->timestamps();
            $table->unique(['brandid', 'name']);
            $table->foreign('brandid')->references('brandid')->on('brands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('models');
    }
}
