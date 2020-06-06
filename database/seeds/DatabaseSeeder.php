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
//        $this->call(VolunteersTableSeeder::class);
//        $this->call(TypesTableSeeder::class);
//        $this->call(OrganizationsTableSeeder::class);
//        $this->call(CategoriesTableSeeder::class);
//        $this->call(EventsTableSeeder::class);
//        $this->call(AppliesTableSeeder::class);
//        $this->call(EventCategoriesTableSeeder::class);
//        $this->call(RegionsTableSeeder::class);
//        $this->call(BadWordsTableSeeder::class);
//        $this->call(StoriesTableSeeder::class);
//        $this->call(TermsTableSeeder::class);
//        $this->call(MediaTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
    }
}
