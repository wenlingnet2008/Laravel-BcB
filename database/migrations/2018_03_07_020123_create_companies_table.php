<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->unsignedInteger('userid')->primary();
            $table->string('name', 150)->unique()->comment('公司名称');
            $table->string('mode', 100)->default('')->comment('经营类型');
            $table->float('capital')->nullable()->comment('注册资金');
            $table->string('regunit', 15)->nullable();
            $table->string('regyear', 4)->nullable()->comment('注册年份');
            $table->string('business', 255)->nullable()->comment('经营范围');
            $table->string('telephone', 50)->nullable();
            $table->string('fax', 50)->nullable();
            $table->string('mail', 50)->nullable();
            $table->string('address', 255)->default('')->comment('地址');
            $table->string('homepage', 255)->nullable();
            $table->text('content')->nullable()->comment('公司介绍');
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
        Schema::dropIfExists('companies');
    }
}
