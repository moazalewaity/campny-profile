<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostGalleryFolder extends Model
{
      public $timestamps = false;
      protected $table = 'post_gallery_folder';
      protected $fillable = [
        'name','pid','oldpid' ,
        'createdate','status'
      ];

   }
