<?php

namespace App\Api\V1\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    //
    public function list(){
        $tags = Tag::all();
        return $tags;
    }
}
