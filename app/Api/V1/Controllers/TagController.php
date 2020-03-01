<?php

namespace App\Api\V1\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class TagController extends Controller
{
    //
    public function list(){
        $tags = Tag::all();
        return $tags;
    }

    public function create(Request $request){

        if($request->has('word')){
            $word =$request->input('word');
            $tag_entity = new Tag();
            $tag_entity->word = $word;
            $tag_entity->save();
        }
        return response('',Response::HTTP_CREATED);
    }
}
