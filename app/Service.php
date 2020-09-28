<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public $timestamps = false;
    protected $table = 'services';
    protected $fillable = [
      'title','descrption','icon' ,'status' ,  'title_en','descrption_en'
    ];

  //   protected $casts = [
  //     'descrption' => 'array',
  // ];
}
