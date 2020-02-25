<?php

use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
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
                'level' => 'A',
            ],
            [
                'level' => 'B'
            ],
            [
                'level' => 'C'
            ],
            [
                'level' => 'D'
            ],
            [
                'level' => 'E'
            ],
            [
                'level' => 'F'
            ]
        ];
        DB::table('levels')->insert($param);
    }
}
