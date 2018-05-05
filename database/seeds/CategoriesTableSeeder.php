<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //测试一级分类
        factory(Category::class)->times(10)->states('one')->make()->each(function($category){
            $category->saveCategory();
        });

        //二级分类
        factory(Category::class)->times(10)->states('two')->make()->each(function($category){
            $category->saveCategory();
        });

        //三级分类
        factory(Category::class)->times(10)->states('three')->make()->each(function($category){
            $category->saveCategory();
        });
    }
}
