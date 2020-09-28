<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentLang extends Model
{
      public $timestamps = false;
      protected $table = 'department_lang';
      protected $fillable = [
        'depid','langid','title' ,'summary','description','keywords','slug'
      ];

   }
