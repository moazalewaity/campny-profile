<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public $timestamps = false;
    protected $table = 'sliders';
    protected $fillable = [
      'title','subtitle','image' ,'status' , 'in_slider' , 'title_en','subtitle_en'
    ];
}
