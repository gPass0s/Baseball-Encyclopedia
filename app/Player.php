<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Player extends Model
{
    
     protected $fillable = [
        'name', 'position','birthday','birthday_place','img_URL'
    ];
    //

}