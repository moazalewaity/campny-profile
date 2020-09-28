<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostGallery extends Model
{
      public $timestamps = false;
      protected $table = 'post_gallery';
      protected $fillable = [
        'file','postid','name' ,
        'size','type',
        'status','ext',
        'sortable','token','path',
        'folderid','insertdate',
        'oldfolderid'
      ];

   }
