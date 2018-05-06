<?php

use Illuminate\Database\Seeder;

class DefaultParaValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = factory(\App\Models\DefaultParaValue::class, 10)->make();
        dd($values->toArray());
    }
}
