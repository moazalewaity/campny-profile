<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostLinks extends Model
{
      public $timestamps = false;
      protected $table = 'post_links';
      protected $fillable = [
        'postid','title','url' ,
        'status','views','reviews'
      ];

   }
