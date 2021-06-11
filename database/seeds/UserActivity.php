<?php

use Illuminate\Database\Seeder;

class UserActivity extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('user_activity')->insert([
            'user_id' => '1',
            'activity_id' => '1',
        ]);
        DB::table('user_activity')->insert([
            'user_id' => '1',
            'activity_id' => '2',
        ]);
        DB::table('user_activity')->insert([
            'user_id' => '2',
            'activity_id' => '1',
        ]);
        DB::table('user_activity')->insert([
            'user_id' => '3',
            'activity_id' => '3',
        ]);

    }
}
