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
            'type_id' => '1',
            'area_id' => '1',
        ]);
        DB::table('location')->insert([
            'location_name' => 'Teluk Naga',
            'type_id' => '2',
            'area_id' => '1',
        ]);
        DB::table('location')->insert([
            'location_name' => 'Dago',
            'type_id' => '1',
            'area_id' => '2',
        ]);
        DB::table('location')->insert([
            'location_name' => 'Sukagalih',
            'type_id' => '2',
            'area_id' => '2',
        ]);
        DB::table('location')->insert([
            'location_name' => 'Malioboro',
            'type_id' => '2',
            'area_id' => '3',
        ]);
        DB::table('location')->insert([
            'location_name' => 'Amplas',
            'type_id' => '3',
            'area_id' => '3',
        ]);
    }
}
