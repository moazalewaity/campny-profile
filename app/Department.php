<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
      public $timestamps = false;
      protected $table = 'department';
      protected $fillable = [
        'shortname','parentid','icon' ,'image','banner','sortable','main_option','classicon','color'
      ];

      public function works()
      {
          return $this->hasMany('App\Work');
      }

   }
