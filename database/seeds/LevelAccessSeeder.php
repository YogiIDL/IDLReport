<?php

use Illuminate\Database\Seeder;

class LevelAccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('level_access')->insert([
            'level_access_name' => 'Create/Read',
        ]);
        DB::table('level_access')->insert([
            'level_access_name' => 'Update',
        ]);
        DB::table('level_access')->insert([
            'level_access_name' => 'Delete',
        ]);
        DB::table('level_access')->insert([
            'level_access_name' => 'Download',
        ]);
    }
}
