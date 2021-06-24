<?php

use Illuminate\Database\Seeder;

class AwbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('awb')->insert([
            'task_id' => 'TI001',
            'no_awb' => 'AWB001',
            'berat_awb' => '5',
        ]);
        DB::table('awb')->insert([
            'task_id' => 'TI001',
            'no_awb' => 'AWB002',
            'berat_awb' => '6',
        ]);
        DB::table('awb')->insert([
            'task_id' => 'TI001',
            'no_awb' => 'AWB003',
            'berat_awb' => '7',
        ]);
        DB::table('awb')->insert([
            'task_id' => 'TI002',
            'no_awb' => 'AWB004',
            'berat_awb' => '10',
        ]);
        DB::table('awb')->insert([
            'task_id' => 'TI002',
            'no_awb' => 'AWB005',
            'berat_awb' => '11',
        ]);
    }
}
