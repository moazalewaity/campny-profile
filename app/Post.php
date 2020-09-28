<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
      public $timestamps = false;
      protected $table = 'post';
      protected $fillable = [
        'name','depid','image' ,'status','insertdate','userid','ipaddress','sortable','token','rating','sum_rating','num_rating','readmore','embed','contype','likes','views','main'
      ];

   }
