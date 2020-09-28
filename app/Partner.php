<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    public $timestamps = false;
    protected $table = 'partnera';
    protected $fillable = [
      'name','descrption','image' , 'url' ,'status'
    ];
}
