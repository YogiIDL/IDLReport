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
            'password' => Hash::make('12341234'),
        ]);
        DB::table('users')->insert([
            'name' => 'Adianta',
            'email' => 'adianta@mail.com',
            'password' => Hash::make('12341234'),
        ]);
        DB::table('users')->insert([
            'name' => 'Tarigan',
            'email' => 'tarigan@mail.com',
            'password' => Hash::make('12341234'),
        ]);
        DB::table('users')->insert([
            'name' => 'Henry',
            'email' => 'henry@mail.com',
            'password' => Hash::make('12341234'),
        ]);
        DB::table('users')->insert([
            'name' => 'Gilang',
            'email' => 'gilang@mail.com',
            'password' => Hash::make('12341234'),
        ]);
    }
}
