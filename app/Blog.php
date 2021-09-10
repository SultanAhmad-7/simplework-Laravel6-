<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title','excerpt','body'];

    public function path()
    {
        return route('blog.show',$this);
    }

    public function author()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function tag(){
        return $this->belongsToMany(Tag::class);
    }
}
