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
            'level' => '1',
            'location' => 'all',
            'level_access' => 'idl_all',
            'password' => Hash::make('12341234'),
        ]);
        DB::table('users')->insert([
            'name' => 'Adianta',
            'email' => 'adianta@mail.com',
            'level' => '2',
            'location' => 'teluk naga',
            'level_access' => 'idl_1',
            'password' => Hash::make('12341234'),
        ]);
        DB::table('users')->insert([
            'name' => 'Tarigan',
            'email' => 'tarigan@mail.com',
            'level' => '4',
            'location' => 'sunter',
            'level_access' => 'idl_2',
            'password' => Hash::make('12341234'),
        ]);
        DB::table('users')->insert([
            'name' => 'Henry',
            'email' => 'henry@mail.com',
            'level' => '1',
            'location' => 'all',
            'level_access' => 'idl_all',
            'password' => Hash::make('12341234'),
        ]);
        DB::table('users')->insert([
            'name' => 'Gilang',
            'email' => 'gilang@mail.com',
            'level' => '1',
            'location' => 'all',
            'level_access' => 'idl_all',
            'password' => Hash::make('12341234'),
        ]);
    }
}
