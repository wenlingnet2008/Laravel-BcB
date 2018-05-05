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

            $series->saveCategory();
        });
    }
}
