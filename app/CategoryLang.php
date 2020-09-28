<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryLang extends Model
{
      public $timestamps = false;
      protected $table = 'category_lang';
      protected $fillable = [
        'catid','langid','title','slug'
      ];

   }
