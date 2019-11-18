<?php

use Illuminate\Database\Seeder;

class AppliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('applies')->insert([
            'volunteer_id' => 1,
            'event_id' => 1,
            'id' => 1,
            'status' => 0,
            'created_at' =>now(),
            'updated_at' =>now()
        ]);
        DB::table('applies')->insert([
            'volunteer_id' => 1,
            'event_id' => 2,
            'id' => 2,
            'status' => 0,
            'created_at' =>now(),
            'updated_at' =>now()
        ]);
        DB::table('applies')->insert([
            'volunteer_id' => 2,
            'event_id' => 1,
            'id' => 3,
            'status' => 1,
            'created_at' =>now(),
            'updated_at' =>now()
        ]);
        DB::table('applies')->insert([
            'volunteer_id' => 2,
            'event_id' => 2,
            'id' => 4,
            'status' => 1,
            'created_at' =>now(),
            'updated_at' =>now()
        ]);
    }
}
