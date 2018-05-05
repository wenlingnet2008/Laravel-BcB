<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->increments('serid');
            $table->integer('brandid')->unsigned();
            $table->string('name', 50);
            $table->integer('parentid')->index()->default(0);
            $table->string('arrparentid')->default('');
            $table->boolean("child")->default(0);
            $table->text('arrchildid');
            $table->text('content')->nullable();
            $table->string('linkurl')->default('');
            $table->char('letter', 1);

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
        Schema::dropIfExists('series');
    }
}
