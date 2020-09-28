<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concat extends Model
{
    public $timestamps = false;
    protected $table = 'concats';
    protected $fillable = [
      'name','email','phone' , 'subject' , 'textarea' 
    ];


    public function category()
    {
        return $this->belongsTo('App\Department');
    }
   
}
