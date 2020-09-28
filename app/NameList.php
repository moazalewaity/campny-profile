<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NameList extends Model
{
      public $timestamps = false;
      protected $table = 'name_list';
      protected $fillable = [
        'name','type','doc_id' ,'mobile','date_finish'
      ];

   }
