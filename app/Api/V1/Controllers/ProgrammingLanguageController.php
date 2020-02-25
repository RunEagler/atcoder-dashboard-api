<?php

namespace App\Api\V1\Controllers;

use App\ProgrammingLanguage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProgrammingLanguageController extends Controller
{
    //
    public function list(){
        $programming_languages = ProgrammingLanguage::all();
        return $programming_languages;
    }
}
