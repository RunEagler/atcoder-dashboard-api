<?php

namespace App\Api\V1\Controllers;

use App\Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LevelController extends Controller
{
    public function list()
    {
        $levels = Level::all();
        return $levels;
    }
}
