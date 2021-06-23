<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call([
            UserSeeder::class,
            AreaSeeder::class,
            LocationSeeder::class,
            TaskSeeder::class,
            // LevelAccessSeeder::class,
            // UserLocationSeeder::class,
            // UserLevelAccessSeeder::class,
            // UserTaskSeeder::class,
            TypeSeeder::class,
            LocationTypeSeeder::class,
            LevelSeeder::class,
            ActivitySeeder::class,
            UserActivitySeeder::class,
            MasterSeeder::class,
            DispatchSeeder::class,
            TipeMobilSeeder::class,
            NopolSeeder::class,
    ]);
    }
}
