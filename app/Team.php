<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public $timestamps = false;
    protected $table = 'teams';
    protected $fillable = [
      'name','descrption' , 'phone' ,  'jobTitlt' , 'email' , 'in_url' , 't_url' ,  'fb_url', 'image' , 'status' , 'name_en', 'jobTitlt_en'
    ];
}
