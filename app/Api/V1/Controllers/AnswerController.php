<?php


namespace App\Api\V1\Controllers;


use App\Answer;
use App\Contest;
use App\Http\Controllers\Controller;
use App\Level;
use App\Player;
use App\Problem;
use App\ProgrammingLanguage;

class AnswerController extends Controller
{
    function entry(){

        //6359,cojna,agc,c,026,3014,length,1925,1250,89468,https://atcoder.jp/contests/agc026/submissions/2855043
        $programming_languages = ProgrammingLanguage::All();
        $problems = Problem::All();
        $players = Player::All();

        $problem_map = array();
        $programming_language_map = array();
        $player_map = array();

        foreach ($problems as $problem) {
            $problem_map[$problem->original_code] = $problem->id;
        }
        foreach ($programming_languages as $programming_language) {
            $programming_language_map[$programming_language->original_code] = $programming_language->id;
        }
        foreach ($players as $player){
            $player_map[$player->name] = $player->id;
        }

        $path = app_path() . "/Api/V1/CSV/answers.csv";
        $f = fopen($path, "r");
        while ($line = fgetcsv($f)) {
            $answer = new Answer();
            $player_name = $line[1];
            $problem_code = $line[4];
            $language_code = $line[5];

            $answer->player_id = $player_map[$player_name];
            $answer->programming_language_id = $programming_language_map[$language_code];
            $answer->problem_id = $problem_map[$problem_code];
            $answer->code_length = $line[7];
            $answer->execution_time = $line[8];
            $answer->memory = $line[9];
            $answer->answer_url = $line[10];
            $answer->code = '';
            $answer->save();
        }
    }

    function import_code(){
        $path = '/Users/yamamotoshouhei/PycharmProjects/AtCoder/cloring/data/code/abc';
        $dirs = glob($path.'/*');

        $pathes = [];
        foreach ($dirs as $dir){

            $path_name = substr($dir,strrpos($dir,'/')+1);
            list($problem_code,$level,$language_code,$_) = explode('_',$dir);

            array_push($pathes,$level);

        }


        return $pathes;
    }

}
