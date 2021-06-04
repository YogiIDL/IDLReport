<?php

use Illuminate\Database\Seeder;

class UserLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_location')->insert([
            'location_id' => '1',
            'user_id' => '1',
        ]);
        DB::table('user_location')->insert([
            'location_id' => '1',
            'user_id' => '2',
        ]);
        DB::table('user_location')->insert([
            'location_id' => '2',
            'user_id' => '3',
        ]);
    }
}
