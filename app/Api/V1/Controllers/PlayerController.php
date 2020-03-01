<?php


namespace App\Api\V1\Controllers;


use App\Http\Controllers\Controller;
use App\Player;
use SplFileObject;

class PlayerController extends Controller
{

    function entry()
    {

        $path = app_path() . "/Api/V1/CSV/players.csv";
        $f = fopen($path, "r");
        while ($line = fgetcsv($f)) {
            $name = $line[1];

            $player = new Player();
            $player->name = $name;
            $player->rank = 'B';
            $player->save();
        }
    }
}
