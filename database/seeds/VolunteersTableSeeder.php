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
            'posy' => '“No one has ever become poor by giving.”',
            'password' => bcrypt('1234asdf'),
            'mobile' =>'0751-461399',
            'city' =>'Székelyudvarhely',
            'region' =>'Hargita',
            'sex' => 'M',
            'driving_licence' => true,
            'birth' => '1997-05-16',
            'works_at' =>'Sapientia EMTE',
            'image' => 'v1.jpg',
        ]);
        DB::table('volunteers')->insert([
            'id' => 2,
            'name' => 'Peter Levente',
            'email' => 'new@new.com',
            'posy' => '“Fancy quote here.”',
            'password' => bcrypt('1234asdf'),
            'mobile' =>'0751-561399',
            'city' =>'Székelyudvarhely',
            'region' =>'Hargita',
            'sex' => 'M',
            'driving_licence' => true,
            'birth' => '1996-03-26',
            'works_at' =>'Leading Soft',
            'image' => 'v2.jpg',
            ]);
    }
}
