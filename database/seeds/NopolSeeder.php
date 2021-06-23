<?php

use Illuminate\Database\Seeder;

class NopolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nopol')->insert([
            'nopol' => 'B 9501 SCH',
            'tipe_mobil_id' => '1',
        ]);
        DB::table('nopol')->insert([
            'nopol' => 'B 9547 SCH',
            'tipe_mobil_id' => '1',
        ]);
        DB::table('nopol')->insert([
            'nopol' => 'B 9501 SCH',
            'tipe_mobil_id' => '1',
        ]);
        DB::table('nopol')->insert([
            'nopol' => 'B 9374 FCE',
            'tipe_mobil_id' => '1',
        ]);
        DB::table('nopol')->insert([
            'nopol' => 'B 9520 FCF',
            'tipe_mobil_id' => '3',
        ]);
        DB::table('nopol')->insert([
            'nopol' => 'B 9659 FCG',
            'tipe_mobil_id' => '2',
        ]);
    }
}
