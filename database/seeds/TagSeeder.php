<?php

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
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
                'word' => '1行解法',
            ],
            [
                'word' => '動的計画法'
            ],
            [
                'word' => '簡単'
            ],
            [
                'word' => '難しい'
            ],
        ];
        DB::table('tags')->insert($param);
    }
}
