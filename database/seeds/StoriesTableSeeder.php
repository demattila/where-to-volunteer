<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stories')->insert([
            'title' => "Story 1",
            'text_short' => "Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.",
            'quote' => "Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.",
            'text' => "MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.",
            'owner_id' => 1,
            'owner_type' => "App\Volunteer",
            'created_at' =>now(),
            'updated_at' =>now()
        ]);

        DB::table('stories')->insert([
            'title' => "Story 2",
            'text_short' => "Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.",
            'quote' => "Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.",
            'text' => "MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.",
            'owner_id' => 1,
            'owner_type' => "App\Volunteer",
            'created_at' =>now(),
            'updated_at' =>now()
        ]);
        DB::table('stories')->insert([
            'title' => "Story 3",
            'text_short' => "Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.",
            'quote' => "Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.",
            'text' => "MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.",
            'owner_id' => 2,
            'owner_type' => "App\Volunteer",
            'created_at' =>now(),
            'updated_at' =>now()
        ]);
        DB::table('stories')->insert([
            'title' => "Story Org",
            'text_short' => "Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.",
            'quote' => "Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.",
            'text' => "MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.",
            'owner_id' => 1,
            'owner_type' => "App\Organization",
            'created_at' =>now(),
            'updated_at' =>now()
        ]);
    }
}
