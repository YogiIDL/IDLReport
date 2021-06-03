<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Yogi',
            'email' => 'yogi@mail.com',
            'level' => 'admin',
            'location' => 'all',
            'level_access' => 'idl_all',
            'password' => Hash::make('12341234'),
        ]);
        DB::table('users')->insert([
            'name' => 'Adianta',
            'email' => 'adianta@mail.com',
            'level' => 'asmenup',
            'location' => 'teluk naga',
            'level_access' => 'idl_1',
            'password' => Hash::make('12341234'),
        ]);
        DB::table('users')->insert([
            'name' => 'Tarigan',
            'email' => 'tarigan@mail.com',
            'level' => 'staf',
            'location' => 'sunter',
            'level_access' => 'idl_2',
            'password' => Hash::make('12341234'),
        ]);
    }
}
