<?php

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Brand::class)->times(10)->make()->each(function($brand){
            $brand->saveBrand();
        });

    }
}
