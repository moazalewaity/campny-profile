<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionsLang extends Model
{
      public $timestamps = false;
      protected $table = 'options_lang';
      protected $fillable = [
        'optnid','langid',
        'title',
      ];

   }
