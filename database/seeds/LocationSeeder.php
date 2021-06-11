<?php

use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('location')->insert([
            'location_name' => 'Sunter',
            'area_id' => '1',
        ]);
        DB::table('location')->insert([
            'location_name' => 'Teluk Naga',
            'area_id' => '1',
        ]);
        DB::table('location')->insert([
            'location_name' => 'Dago',
            'area_id' => '2',
        ]);
        DB::table('location')->insert([
            'location_name' => 'Sukagalih',
            'area_id' => '2',
        ]);
        DB::table('location')->insert([
            'location_name' => 'Malioboro',
            'area_id' => '3',
        ]);
        DB::table('location')->insert([
            'location_name' => 'Amplas',
            'area_id' => '3',
        ]);
    }
}
