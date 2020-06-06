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
            'id' => 3,
            'owner_id' => 1,
            'title' => 'WizzAir Marathon',
            'description' => 'run Forest run Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'starts_at'=> now(),
            'ends_at'=> now(),
            'reward' => 'food,water, etc.',
            'address' => 'On the street',
            'city' => 'Cluj Napoca',
            'region' => 'CJ',
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);
        DB::table('events')->insert([
            'id' => 7,
            'owner_id' => 2,
            'title' => 'Yuppi Camp 2019',
            'description' => 'Yuppi este prima tabără din România care utilizează metoda revoluţionară numită terapie prin experienţă, recunoscută și aplicată în întreaga lume.',
            'starts_at'=> now(),
            'ends_at'=> now(),
            'reward' => 'food,water, etc.',
            'address' => 'Tabara Saulia Str. Ses, Nr. 58 A, Saulia',
            'city' => 'Targu Mures',
            'region' => 'MS',
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);
        DB::table('events')->insert([
            'id' => 12,
            'owner_id' => 1,
            'title' => 'EVENT 3',
            'description' => 'Yuppi este prima tabără din România care utilizează metoda revoluţionară numită terapie prin experienţă, recunoscută și aplicată în întreaga lume.',
            'starts_at'=> now(),
            'ends_at'=> now(),
            'reward' => 'food,water, etc.',
            'address' => 'Tabara Saulia Str. Ses, Nr. 58 A, Saulia',
            'city' => 'Targu Mures',
            'region' => 'MS',
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);
        DB::table('events')->insert([
            'id' => 13,
            'owner_id' => 1,
            'title' => 'EVENT 4',
            'description' => 'Yuppi este prima tabără din România care utilizează metoda revoluţionară numită terapie prin experienţă, recunoscută și aplicată în întreaga lume.',
            'starts_at'=> now(),
            'ends_at'=> now(),
            'reward' => 'food,water, etc.',
            'address' => 'Tabara Saulia Str. Ses, Nr. 58 A, Saulia',
            'city' => 'Targu Mures',
            'region' => 'MS',
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);
        DB::table('events')->insert([
            'id' => 18,
            'owner_id' => 1,
            'title' => 'EVENT 5',
            'description' => 'Yuppi este prima tabără din România care utilizează metoda revoluţionară numită terapie prin experienţă, recunoscută și aplicată în întreaga lume.',
            'starts_at'=> now(),
            'ends_at'=> now(),
            'reward' => 'food,water, etc.',
            'address' => 'Tabara Saulia Str. Ses, Nr. 58 A, Saulia',
            'city' => 'Targu Mures',
            'region' => 'MS',
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);

        DB::table('events')->insert([
            'id' => 29,
            'owner_id' => 1,
            'title' => 'EVENT 6',
            'description' => 'Yuppi este prima tabără din România care utilizează metoda revoluţionară numită terapie prin experienţă, recunoscută și aplicată în întreaga lume.',
            'starts_at'=> now(),
            'ends_at'=> now(),
            'reward' => 'food,water, etc.',
            'address' => 'Tabara Saulia Str. Ses, Nr. 58 A, Saulia',
            'city' => 'Targu Mures',
            'region' => 'MS',
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);
    }
}
