<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefaultParasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('default_paras', function (Blueprint $table) {
            $table->increments('dpid');
            $table->string('name', 50)->comment('默认参数名称');
            $table->integer('catid')->unsigned();
            $table->string('units', 255)->nullable();
            $table->string('rules', 255)->nullable();
            $table->smallInteger('list_order')->default(0)->comment('排序');

            $table->unique(['catid', 'name']);
            $table->foreign('catid')->references('catid')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('default_paras');
    }
}
