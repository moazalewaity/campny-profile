<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostLang extends Model
{
      public $timestamps = false;
      protected $table = 'post_lang';
      protected $fillable = [
        'postid','langid','title','slug' ,
        'summary','description','keywords',

        'summary_en','description_en', 'title_en'
      ];

   }
