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
        $tag_entity = new Tag();

        if($request->has('word')){
            $word =$request->input('word');
            if(Tag::query()->where('word',$word)->exists()){
                return response('',Response::HTTP_CREATED);
            }
            $tag_entity->word = $word;
            $tag_entity->save();
        }else{
            return \response('',Response::HTTP_BAD_REQUEST);
        }
        return response($tag_entity->getAttributes(),Response::HTTP_CREATED);
    }
}
