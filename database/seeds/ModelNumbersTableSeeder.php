<?php

use Illuminate\Database\Seeder;

class ModelNumbersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\ModelNumber::class)->times(10)->create()->each(function ($model){
            $model->content()->save(factory(\App\Models\ModelData::class)->make());
            $model->paras()->save(factory(\App\Models\ModelPara::class)->make());

            $series = factory(\App\Models\Series::class)->make();
            $series->saveCategory();
            $model->series()->save($series);
        });
    }
}
