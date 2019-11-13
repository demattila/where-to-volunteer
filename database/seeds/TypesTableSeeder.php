<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'id' => 1,
            'name' => 'Federation'
        ]);
        DB::table('types')->insert([
            'id' => 2,
            'name' => 'Foundation'
        ]);
        DB::table('types')->insert([
            'id' => 3,
            'name' => 'Institution'
        ]);
        DB::table('types')->insert([
            'id' => 4,
            'name' => 'Trade'
        ]);
        DB::table('types')->insert([
            'id' => 5,
            'name' => 'Union'
        ]);
        DB::table('types')->insert([
            'id' => 6,
            'name' => 'Association'
        ]);
        DB::table('types')->insert([
            'id' => 7,
            'name' => 'Other'
        ]);
    }
}
