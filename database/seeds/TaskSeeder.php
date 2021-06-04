<?php

use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task')->insert([
            'task_name' => 'Dispatch',
        ]);
        DB::table('task')->insert([
            'task_name' => 'Traffic',
        ]);
        DB::table('task')->insert([
            'task_name' => 'Ground Handling',
        ]);
    }
}
