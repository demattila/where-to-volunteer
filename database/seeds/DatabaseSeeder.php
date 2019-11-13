<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(VolunteersTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(OrganizationsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
    }
}
