<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            'id' => 1,
            'owner_id' => 1,
            'event_id' => 11,
            'description' => 'This is a message from organization to applied volunteers. 1',
            'created_at' =>now(),
            'updated_at' =>now()
        ]);

        DB::table('messages')->insert([
            'id' => 2,
            'owner_id' => 1,
            'event_id' => 11,
            'description' => 'This is a message from organization to applied volunteers. 2',
            'created_at' =>now(),
            'updated_at' =>now()
        ]);
        DB::table('messages')->insert([
            'id' => 3,
            'owner_id' => 2,
            'event_id' => 3,
            'description' => 'This is a message from organization to applied volunteers.',
            'created_at' =>now(),
            'updated_at' =>now()
        ]);

    }
}
