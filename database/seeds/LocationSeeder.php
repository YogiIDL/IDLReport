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
            'area_id' => '1',
            'location_name' => 'Sunter',
        ]);
        DB::table('location')->insert([
            'area_id' => '1',
            'location_name' => 'Teluk Naga',
        ]);
        DB::table('location')->insert([
            'area_id' => '2',
            'location_name' => 'Dago',
        ]);
        DB::table('location')->insert([
            'area_id' => '2',
            'location_name' => 'Sukagalih',
        ]);
        DB::table('location')->insert([
            'area_id' => '3',
            'location_name' => 'Malioboro',
        ]);
        DB::table('location')->insert([
            'area_id' => '3',
            'location_name' => 'Amplas',
        ]);
    }
}
