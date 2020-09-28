<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentOptions extends Model
{
      public $timestamps = false;
      protected $table = 'department_options';
      protected $fillable = [
        'deptid','optnid','main','sortable','searchable'
      ];

   }
