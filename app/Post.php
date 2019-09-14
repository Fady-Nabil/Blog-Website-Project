<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    //mass assignment
    protected $fillable = [
        'category_id',
        'photo_id',
        'title',
        'body'
    ];
    /*
    this function use to make a relation between user and his posts
    mean that posts belongs to one user (one to many relation)
    */
    public function user(){
        return $this->belongsTo('App\User');
    }
    /*
    this function use to make a relation between post and his photo
    mean that posts belongs to one photo (one to one relation)
    */
    public function photo(){
        return $this->belongsTo('App\Photo');
    }
    /*
    this function use to make a relation between post and his category
    mean that posts belongs to one category  (one to one relation)
    */
    public function category(){
        return $this->belongsTo('App\Category');
    }
    /*
    this function use to make a relation between post and it's comments
    mean that post has a lot of comments  (one to many relation)
    */
    public function comments(){
        return $this->hasMany('App\Comment');
    }

}
