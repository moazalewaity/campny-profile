<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostInCart extends Model
{
      public $timestamps = false;
      protected $table = 'post_in_cart';
      protected $fillable = [
        'postid','userid','quantity' ,
        'price','ipaddress','adddate'
      ];

   }
