<?php

use Illuminate\Database\Seeder;
use App\Models\Series;

class SeriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(Series::class)->times(10)->make()->each(function ($series){
            $category = \App\Models\Category::all()->random();
            $brand = \App\Models\Brand::find($series->brandid);
            $series->saveCategory();
            $series->categories()->save($category);
            $brand->categories()->save($category);
        });
    }
}
