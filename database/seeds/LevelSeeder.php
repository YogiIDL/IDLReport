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
            'level_name' => 'Admin',
        ]);
        DB::table('level')->insert([
            'level_name' => 'Asmenup',
        ]);
        DB::table('level')->insert([
            'level_name' => 'Supervisor',
        ]);
        DB::table('level')->insert([
            'level_name' => 'Staff',
        ]);
    }
}
