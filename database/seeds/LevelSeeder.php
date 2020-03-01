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
                'level' => 'a',
            ],
            [
                'level' => 'b'
            ],
            [
                'level' => 'c'
            ],
            [
                'level' => 'd'
            ],
            [
                'level' => 'e'
            ],
            [
                'level' => 'f'
            ]
        ];
        DB::table('levels')->insert($param);
    }
}
