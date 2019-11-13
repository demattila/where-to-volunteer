<?php

use Illuminate\Database\Seeder;

class VolunteersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('volunteers')->insert([
            'id' => 1,
            'name' => 'Demeter Attila',
            'email' => 'hello@laravel.com',
            'password' => bcrypt('1234asdf'),
        ]);
    }
}
