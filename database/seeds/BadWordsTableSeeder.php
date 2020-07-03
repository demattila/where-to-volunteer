<?php

use Illuminate\Database\Seeder;

class BadWordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bad_words')->insert([
            'id' => 1,
            'word' => "fuck",
            'replacement' => "....",
            'created_at' =>now(),
            'updated_at' =>now()
        ]);
        DB::table('bad_words')->insert([
            'id' => 2,
            'word' => "shit",
            'replacement' => "....",
            'created_at' =>now(),
            'updated_at' =>now()
        ]);
    }
}
