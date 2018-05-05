<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('catid');
            $table->string('name',50)->unique()->comment('分类名称');
            $table->char('letter', 1)->index();
            $table->integer('parentid')->index()->default(0)->comment('父类id');
            $table->string('arrparentid')->default('')->comment('所有父类id，有序排列');
            $table->boolean("child")->default(0)->comment('是否有子类');
            $table->text('arrchildid')->comment('所有子类id');
            $table->string('linkurl')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
