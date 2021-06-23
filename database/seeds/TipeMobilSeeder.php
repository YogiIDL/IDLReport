<?php

use Illuminate\Database\Seeder;

class TipeMobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipe_mobil')->insert([
            'tipe_mobil' => 'BV',
        ]);
        DB::table('tipe_mobil')->insert([
            'tipe_mobil' => 'CDD',
        ]);
        DB::table('tipe_mobil')->insert([
            'tipe_mobil' => 'CDE',
        ]);
    }
}
