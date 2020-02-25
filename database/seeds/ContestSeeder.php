<?php

use Illuminate\Database\Seeder;

class ContestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            [
                'original_code' => 'abc',
                'name' => 'Beginner Contest',
            ],
            [
                'original_code' => 'arc',
                'name' => 'Regular Contest',
            ],
            [
                'original_code' => 'agc',
                'name' => 'Grand Contest',
            ],
        ];
        DB::table('contests')->insert($param);
    }
}
