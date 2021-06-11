<?php

use Illuminate\Database\Seeder;

class LocationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('location_type')->insert([
            'location_id' => '1',
            'type_id' => '1',
        ]);
        DB::table('location_type')->insert([
            'location_id' => '1',
            'type_id' => '2',
        ]);
        DB::table('location_type')->insert([
            'location_id' => '2',
            'type_id' => '1',
        ]);
        DB::table('location_type')->insert([
            'location_id' => '3',
            'type_id' => '3',
        ]);
        DB::table('location_type')->insert([
            'location_id' => '4',
            'type_id' => '2',
        ]);
        DB::table('location_type')->insert([
            'location_id' => '5',
            'type_id' => '1',
        ]);
        DB::table('location_type')->insert([
            'location_id' => '6',
            'type_id' => '2',
        ]);
    }
}
