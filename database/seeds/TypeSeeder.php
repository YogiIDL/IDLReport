<?php

use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('type')->insert([
            'type_name' => 'Hub',
        ]);
        DB::table('type')->insert([
            'type_name' => 'Branch',
        ]);
        DB::table('type')->insert([
            'type_name' => 'Agent',
        ]);
    }
}
