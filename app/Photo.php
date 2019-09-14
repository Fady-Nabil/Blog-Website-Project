<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $fillable = ['file'];

    protected $uploads = '../images/';

    /*accessor we use it to give us the uploads folder inside writing full path*/
    public function getFileAttribute($photo){
        return $this->uploads . $photo;
    }

}
