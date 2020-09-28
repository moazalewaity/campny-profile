<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NplaPlasug extends Model
{
      public $timestamps = false;
      protected $table = 'npla_plasug';
      protected $fillable = [
        'fullname','idnum','city',
        'department','tel','mobile',
        'email','details','adddate',
        'processdate','readdate','ipaddress',
        'status','isread','apptype',
        'attached',
      ];

   }
