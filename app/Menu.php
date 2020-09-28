<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sentinel;

class Menu extends Model
{
    
    	//return $this->hasMany('\App\Submenu');
        //if(Sentinel::check()) {
      //  $id=Sentinel::getUser()->id;

     protected $fillable = [
        'slug','title','url' ,'icon','visible','p_id','functions','sub_permission','tracking','typeoflink','ignore_permission','color'];

        

       public function submenus (){
        return $this->hasMany('\App\Menu','p_id')->where('visible','=',1)->orderby('new_order');


       } 


       public function user_permissions (){
        return $this->hasMany('\App\Menu','p_id');


       } 


       public function menu (){

        

     return  $this->belongsTo('\App\Menu','p_id')->where('p_id','=',0);

       }



   }
