<?php

use Illuminate\Database\Seeder;

class DefaultParasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\DefaultPara::class)->times(10)->create()->each(function($para){
            $para->values()->save(factory(\App\Models\DefaultParaValue::class)->make());
        });
    }
}
