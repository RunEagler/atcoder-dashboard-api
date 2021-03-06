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
        // $this->call(UsersTableSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(ContestSeeder::class);
        $this->call(ProgrammingLanguageSeeder::class);
//        $this->call(TagSeeder::class);
//        $this->call(ProblemSeeder::class);
//        $this->call(ProblemTagSeeder::class);

    }
}
