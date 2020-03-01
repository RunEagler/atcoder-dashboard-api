<?php

use Illuminate\Database\Seeder;

class ProgrammingLanguageSeeder extends Seeder
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
                'original_code'=>'3014',
                'name'=>'Haskell',
                'version'=>'GHC 7.10.3',
            ],
            [
                'original_code'=>'3013',
                'name'=>'Go',
                'version'=>'1.6',
            ],
            [
                'original_code'=>'3023',
                'name'=>'Python3',
                'version'=>'3.4.3',
            ],
            [
                'original_code'=>'3014',
                'name'=>'Haskell',
                'version'=>'GHC 7.10.3',
            ],
            [
                'original_code'=>'3524',
                'name'=>'PHP',
                'version'=>'7.0.15',
            ],
            [
                'original_code'=>'3504',
                'name'=>'Rust',
                'version'=>'1.15.1',
            ],
            [
                'original_code'=>'3025',
                'name'=>'Scala',
                'version'=>'2.11.7',
            ],
        ];
        DB::table('programming_languages')->insert($param);
    }
}
