<?php

use Illuminate\Database\Seeder;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master')->insert([
            'user_id' => '1',
            'level_id' => '1',
            'location_id' => '1',
            'task_id' => '1',
            // 'activity_id' => '1',
        ]);
        DB::table('master')->insert([
            'user_id' => '1',
            'level_id' => '1',
            'location_id' => '1',
            'task_id' => '1',
            // 'activity_id' => '2',
        ]);
        DB::table('master')->insert([
            'user_id' => '1',
            'level_id' => '1',
            'location_id' => '1',
            'task_id' => '3',
            // 'activity_id' => '1',
        ]);
        DB::table('master')->insert([
            'user_id' => '1',
            'level_id' => '1',
            'location_id' => '1',
            'task_id' => '3',
            // 'activity_id' => '4',
        ]);
        DB::table('master')->insert([
            'user_id' => '1',
            'level_id' => '1',
            'location_id' => '2',
            'task_id' => '2',
            // 'activity_id' => '1',
        ]);
        DB::table('master')->insert([
            'user_id' => '1',
            'level_id' => '1',
            'location_id' => '2',
            'task_id' => '3',
            // 'activity_id' => '1',
        ]);
        DB::table('master')->insert([
            'user_id' => '2',
            'level_id' => '2',
            'location_id' => '1',
            'task_id' => '1',
            // 'activity_id' => '2',
        ]);
        DB::table('master')->insert([
            'user_id' => '2',
            'level_id' => '2',
            'location_id' => '2',
            'task_id' => '3',
            // 'activity_id' => '1',
        ]);
        DB::table('master')->insert([
            'user_id' => '4',
            'level_id' => '1',
            'location_id' => '1',
            'task_id' => '1',
            // 'activity_id' => '1',
        ]);
        DB::table('master')->insert([
            'user_id' => '5',
            'level_id' => '1',
            'location_id' => '1',
            'task_id' => '1',
            // 'activity_id' => '1',
        ]);
    }
}
