<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionsType extends Model
{
      public $timestamps = false;
      protected $table = 'options_type';
      protected $fillable = [
        'name','prop'
      ];

   }
