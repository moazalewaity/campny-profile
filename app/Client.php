<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $timestamps = false;
    protected $table = 'clients';
    protected $fillable = [
      'name','descrption' , 'addres', 'iamge' , 'status' , 'name_en','descrption_en'
    ];

  //   protected $casts = [
  //     'descrption' => 'array',
  // ];
}
