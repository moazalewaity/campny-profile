<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostComments extends Model
{
      public $timestamps = false;
      protected $table = 'post_comments';
      protected $fillable = [
        'postid','title','name' ,
        'email','country',
        'website','comment',
        'ipaddress','recorddate',
        'status','userid'
      ];

   }
