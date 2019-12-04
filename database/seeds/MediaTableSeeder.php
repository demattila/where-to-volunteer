<?php

use Illuminate\Database\Seeder;

class MediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('media')->insert([
            'id' => 1,
            'model_type' => 'App/Volunteer',
            'model_id' => 1,
            'collection_name' => 'volunteer_default',
            'name' => 'default',
            'file_name' => 'default.png',
            'mime_type' => 'image/png',
            'disk' => 'public',
            'custom_properties' =>'{"generated_conversions":{"avatar":true}}'
        ]);
    }
}
