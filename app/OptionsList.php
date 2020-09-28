<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionsList extends Model
{
      public $timestamps = false;
      protected $table = 'options_list';
      protected $fillable = [
        'name','type',
        'catid','searchable',
        'template','poptnid',
        'coptnid',
      ];

   }
