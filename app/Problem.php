<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $table = 'problems';
    public function contest(){
        return $this->belongsTo('App\Contest');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');;
    }

}
