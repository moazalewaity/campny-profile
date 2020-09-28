<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index(Request $request)
    {   if($request->lang){
        App::setLocale($request->lang);
        
        // dd(App::getLocale());
        }
        return view('welcome');
    }
}
