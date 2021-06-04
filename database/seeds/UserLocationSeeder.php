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
            'user_id' => '1',
            'location_id' => '1',
        ]);
        DB::table('user_location')->insert([
            'user_id' => '2',
            'location_id' => '1',
        ]);
        DB::table('user_location')->insert([
            'user_id' => '3',
            'location_id' => '2',
        ]);
    }
}
