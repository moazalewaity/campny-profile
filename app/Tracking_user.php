<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracking_user extends Model
{
    //

     protected $table ="tracking_users";
     protected $fillable = ['request_data','ip','browser','user_id','date','request_url','permission'];
}
