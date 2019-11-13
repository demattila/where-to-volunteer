<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => 1,
            'name' => 'PR and Fundraising'
        ]);
        DB::table('categories')->insert([
            'id' => 2,
            'name' => 'Optimizing the activities of non-governmental organizations'
        ]);
        DB::table('categories')->insert([
            'id' => 3,
            'name' => 'Personal Development'
        ]);
        DB::table('categories')->insert([
            'id' => 4,
            'name' => 'Education and research'
        ]);
        DB::table('categories')->insert([
            'id' => 5,
            'name' => 'Ecology and Environment protection'
        ]);
        DB::table('categories')->insert([
            'id' => 6,
            'name' => 'Events'
        ]);
        DB::table('categories')->insert([
            'id' => 7,
            'name' => 'Sports and recreation'
        ]);
        DB::table('categories')->insert([
            'id' => 8,
            'name' => 'Emergency and protection situations'
        ]);
        DB::table('categories')->insert([
            'id' => 9,
            'name' => 'Human rights'
        ]);
        DB::table('categories')->insert([
            'id' => 10,
            'name' => 'Health'
        ]);
        DB::table('categories')->insert([
            'id' => 11,
            'name' => 'Social services and social assistance'
        ]);
        DB::table('categories')->insert([
            'id' => 12,
            'name' => 'Social'
        ]);
        DB::table('categories')->insert([
            'id' => 13,
            'name' => 'Youth'
        ]);
        DB::table('categories')->insert([
            'id' => 14,
            'name' => 'Religion'
        ]);
        DB::table('categories')->insert([
            'id' => 15,
            'name' => 'Civic Involvement and Public Policies'
        ]);
        DB::table('categories')->insert([
            'id' => 16,
            'name' => 'Science'
        ]);

    }
}
