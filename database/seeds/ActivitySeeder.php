<?php

use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activity')->insert([
            'activity_name' => 'Create/Read',
        ]);
        DB::table('activity')->insert([
            'activity_name' => 'Update',
        ]);
        DB::table('activity')->insert([
            'activity_name' => 'Delete',
        ]);
        DB::table('activity')->insert([
            'activity_name' => 'Download',
        ]);
    }
}
