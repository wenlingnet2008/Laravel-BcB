<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('brandid');
            $table->string('name', 50)->unique()->comment('品牌名称');
            $table->char('letter', 1)->index()->comment('首字母');
            $table->text('thumb')->comment('品牌图片 Json数据，例如{"thumb1":"url", "thumb2":"url2"}');
            $table->text('content')->nullable();
            $table->string('linkurl', 50)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
}
