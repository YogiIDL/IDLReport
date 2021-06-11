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
            // LevelAccessSeeder::class,
            // UserLocationSeeder::class,
            // UserLevelAccessSeeder::class,
            TaskSeeder::class,
            // UserTaskSeeder::class,
            TypeSeeder::class,
            LocationTypeSeeder::class,
            LevelSeeder::class,
            ActivitySeeder::class,
            MasterSeeder::class,
    ]);
    }
}
