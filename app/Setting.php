<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $timestamps = false;
    protected $table = 'settings';
    protected $fillable = [
      'title','logo' ,'descrption','address' , 'phone' , 'email' , 'facebook' , 'twitter' , 'instgram' ,'status'
    ];

   
}
