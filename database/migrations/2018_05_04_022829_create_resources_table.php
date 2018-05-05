<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->increments('resid');
            $table->string('res_type', 30)->default('')->comment('资源类型(手册, 尺寸图, 数据表等等)');
            $table->string('res_name', 150)->default('')->comment('资源名称');
            $table->string('res_docid', 100)->default('')->comment('资源标准文档名');
            $table->string('res_content', 255)->default('')->comment('资源介绍');
            $table->string('res_use', 255)->default('')->comment('资源应用');
            $table->string('resource', 255)->comment('资源地址');
            $table->string('thumb', 255)->comment('PDF文件生成的首页预览图片地址');
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
        Schema::dropIfExists('resources');
    }
}
