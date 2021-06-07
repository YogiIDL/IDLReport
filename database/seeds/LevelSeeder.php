<?php

use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('level')->insert([
            'level_name' => 'admin',
        ]);
        DB::table('level')->insert([
            'level_name' => 'asmenup',
        ]);
        DB::table('level')->insert([
            'level_name' => 'supervisor',
        ]);
        DB::table('level')->insert([
            'level_name' => 'staff',
        ]);
    }
}
