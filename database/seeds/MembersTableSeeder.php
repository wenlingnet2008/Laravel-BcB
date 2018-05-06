<?php

use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Member::class)->times(10)->create()->each(function($member){
            $member->company()->save(factory(\App\Models\Company::class)->make());
        });

    }
}
