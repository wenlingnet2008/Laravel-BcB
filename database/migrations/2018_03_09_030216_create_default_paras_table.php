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
            $table->string('para', 50)->comment('默认参数名称');
            $table->string('units', 255)->nullable();
            $table->string('rules', 255)->nullable();

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
