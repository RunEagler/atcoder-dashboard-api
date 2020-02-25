<?php

use Illuminate\Database\Seeder;

class ProblemTagSeeder extends Seeder
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
                'problem_id' => 1,
                'tag_id' => 1,
            ],
            [
                'problem_id' => 1,
                'tag_id' => 2,
            ],
            [
                'problem_id' => 1,
                'tag_id' => 3,
            ],
            [
                'problem_id' => 2,
                'tag_id' => 2,
            ],
            [
                'problem_id' => 3,
                'tag_id' => 4,
            ],
            [
                'problem_id' => 3,
                'tag_id' => 3,
            ],
        ];
        DB::table('problem_tags')->insert($param);
    }
}
