<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'id' => 1,
            'owner_id' => 1,
            'title' => 'WizzAir Marathon',
            'description' => 'run Forest run Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'starts_at'=> now(),
            'ends_at'=> now(),
            'reward' => 'food,water, etc.',
            'image' => 'wizz.png',
            'address' => 'On the street',
            'city' => 'Cluj Napoca',
            'region' => 'CJ',
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);
        DB::table('events')->insert([
            'id' => 2,
            'owner_id' => 2,
            'title' => 'Yuppi Camp 2019',
            'description' => 'Yuppi este prima tabără din România care utilizează metoda revoluţionară numită terapie prin experienţă, recunoscută și aplicată în întreaga lume.',
            'starts_at'=> now(),
            'ends_at'=> now(),
            'reward' => 'food,water, etc.',
            'image' => 'yuppi.jpg',
            'address' => 'Tabara Saulia Str. Ses, Nr. 58 A, Saulia',
            'city' => 'Targu Mures',
            'region' => 'MS',
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);
    }
}
