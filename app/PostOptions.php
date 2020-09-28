<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostOptions extends Model
{
      public $timestamps = false;
      protected $table = 'post_options';
      protected $fillable = [
        'postid','optnid','optnval' 
      ];

   }
