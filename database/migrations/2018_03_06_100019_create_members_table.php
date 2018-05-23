<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('userid');
            $table->string('name', 30)->unique()->comment('用户名');
            //$table->string('company', 150)->comment('公司名称');
            $table->string('password', 255);
            $table->string('email', 50)->unique();
            $table->string('gender', 10)->default('Female');
            $table->string('true_name', 50)->default('')->comment('联系人');
            $table->string('mobile', 30)->nullable();
            $table->string('department', 30)->nullable()->comment('部门');
            $table->string('career', 100)->nullable()->comment('职位');
            $table->string('regip', 30)->default('');
            $table->string('auth', 255)->default('');
            $table->boolean('is_admin')->default(0);
            $table->timestamp('auth_expired_time')->nullable();
            $table->boolean('vmail')->default(0)->comment('邮箱是否验证');
            $table->boolean('vcompany')->default(0)->comment('公司是否验证');
            $table->rememberToken();
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
        Schema::dropIfExists('members');
    }
}
