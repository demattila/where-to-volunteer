<?php

use Illuminate\Database\Seeder;

class OrganizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organizations')->insert([
            'id' => 1,
            'name' => 'Wizz Air',
            'email' => 'wizz@air.ro',
            'password' => bcrypt('1234asdf'),

        ]);

    }
}
