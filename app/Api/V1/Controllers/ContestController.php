<?php

namespace App\Api\V1\Controllers;

use App\Contest;
use App\Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContestController extends Controller
{
    public function list()
    {
        $contests = Contest::all();
        return $contests;
    }
}
