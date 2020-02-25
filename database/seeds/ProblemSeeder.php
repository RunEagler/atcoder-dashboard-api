<?php

use Illuminate\Database\Seeder;

class ProblemSeeder extends Seeder
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
                'level_id' => 1,
                'contest_id'=>1,
                'original_code'=>'001',
                'title'=>'積雪深差',
                'score'=>100,
            ],
            [
                'level_id' => 2,
                'contest_id'=>1,
                'original_code'=>'001',
                'title'=>'視程の通報',
                'score'=>200,
            ],
            [
                'level_id' => 3,
                'contest_id'=>1,
                'original_code'=>'001',
                'title'=>'風力観察',
                'score'=>300,
            ],
            [
                'level_id' => 4,
                'contest_id'=>1,
                'original_code'=>'001',
                'title'=>'感雨時刻の整理',
                'score'=>400,
            ],
            [
                'level_id' => 1,
                'contest_id'=>1,
                'original_code'=>'002',
                'title'=>'正直者',
                'score'=>100,
            ],
            [
                'level_id' => 2,
                'contest_id'=>1,
                'original_code'=>'002',
                'title'=>'罠',
                'score'=>200,
            ],
            [
                'level_id' => 3,
                'contest_id'=>1,
                'original_code'=>'002',
                'title'=>'直訴',
                'score'=>300,
            ],
            [
                'level_id' => 4,
                'contest_id'=>1,
                'original_code'=>'002',
                'title'=>'派閥',
                'score'=>400,
            ],
            [
                'level_id' => 1,
                'contest_id'=>2,
                'original_code'=>'001',
                'title'=>'センター採点',
                'score'=>100,
            ],
            [
                'level_id' => 2,
                'contest_id'=>2,
                'original_code'=>'001',
                'title'=>'リモコン',
                'score'=>100,
            ],
            [
                'level_id' => 3,
                'contest_id'=>2,
                'original_code'=>'001',
                'title'=>'パズルのお手伝い',
                'score'=>100,
            ],
            [
                'level_id' => 4,
                'contest_id'=>2,
                'original_code'=>'001',
                'title'=>'レースゲーム',
                'score'=>100,
            ],
            [
                'level_id' => 1,
                'contest_id'=>3,
                'original_code'=>'001',
                'title'=>'BBQ Easy',
                'score'=>200,
            ],
            [
                'level_id' => 2,
                'contest_id'=>3,
                'original_code'=>'001',
                'title'=>'Mysterious Light',
                'score'=>500,
            ],
            [
                'level_id' => 3,
                'contest_id'=>3,
                'original_code'=>'001',
                'title'=>'Shorten Diameter',
                'score'=>600,
            ],
            [
                'level_id' => 4,
                'contest_id'=>3,
                'original_code'=>'001',
                'title'=>'Arrays and Palindrome',
                'score'=>1000,
            ],
            [
                'level_id' => 5,
                'contest_id'=>3,
                'original_code'=>'001',
                'title'=>'BBQ Hard',
                'score'=>1400,
            ],
            [
                'level_id' => 6,
                'contest_id'=>3,
                'original_code'=>'001',
                'title'=>'Wide Swap',
                'score'=>2000,
            ],

        ];
        DB::table('problems')->insert($param);
    }
}
