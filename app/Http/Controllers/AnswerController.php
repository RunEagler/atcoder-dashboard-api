<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnswerController extends Controller
{
    //
    public function answers($problem_id,$programming_language_id){
        $answers = Answers::where('problem_id',$problem_id)->where('programming_language_id',$programming_language_id);

        return $answers;
    }

}
