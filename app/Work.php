<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    public $timestamps = false;
    protected $table = 'works';
    protected $fillable = [
      'title','descrption','date' , 'client' , 'category_id' , 'image' , 'url' ,'status' ,  'title_en','descrption_en'
    ];


    public function category()
    {
        return $this->belongsTo('App\Department');
    }

    
   
}
