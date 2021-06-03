<?php

use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('area')->insert([
            'area_name' => 'Jakarta',
        ]);
        DB::table('area')->insert([
            'area_name' => 'Bandung',
        ]);
        DB::table('area')->insert([
            'area_name' => 'Jogja',
        ]);
    }
}
