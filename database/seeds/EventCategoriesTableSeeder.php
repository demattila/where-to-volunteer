<?php

use Illuminate\Database\Seeder;

class EventCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_categories')->insert([
            'event_id' => 1,
            'category_id' => 7,
        ]);
        DB::table('event_categories')->insert([
            'event_id' => 2,
            'category_id' => 7,
        ]);
        DB::table('event_categories')->insert([
            'event_id' => 3,
            'category_id' => 7,
        ]);
        DB::table('event_categories')->insert([
            'event_id' => 4,
            'category_id' => 12,
        ]);
        DB::table('event_categories')->insert([
            'event_id' => 5,
            'category_id' => 12,
        ]);

        DB::table('event_categories')->insert([
            'event_id' => 5,
            'category_id' => 1,
        ]);
        DB::table('event_categories')->insert([
            'event_id' => 6,
            'category_id' => 12,
        ]);

        DB::table('event_categories')->insert([
            'event_id' => 6,
            'category_id' => 1,
        ]);
    }
}
