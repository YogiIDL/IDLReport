<?php

use Illuminate\Database\Seeder;

class UserLevelAccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_level_access')->insert([
            'user_id' => '1',
            'level_access_id' => '1',
        ]);
        DB::table('user_level_access')->insert([
            'user_id' => '1',
            'level_access_id' => '2',
        ]);
        DB::table('user_level_access')->insert([
            'user_id' => '2',
            'level_access_id' => '1',
        ]);
        DB::table('user_level_access')->insert([
            'user_id' => '2',
            'level_access_id' => '4',
        ]);
    }
}
