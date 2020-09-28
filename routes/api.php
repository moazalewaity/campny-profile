<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('topSlider' , 'Api\HomeController@top_Slider');
Route::get('topServices' , 'Api\HomeController@top_services');


Route::get('slideOne' , 'Api\HomeController@slideOne');

Route::get('clients' , 'Api\HomeController@clients');


Route::get('works' , 'Api\HomeController@works');
Route::get('work/{id}' , 'Api\HomeController@work');

Route::get('category' , 'Api\HomeController@catgory');

Route::get('page/{id}' , 'Api\HomeController@page');


Route::get('posts' , 'Api\HomeController@posts');
Route::get('postsLimt' , 'Api\HomeController@postsLimt');

Route::get('post/{id}' , 'Api\HomeController@post');


Route::post('concat' , 'Api\HomeController@concat');

Route::get('teams' , 'Api\HomeController@team');
Route::get('setting' , 'Api\HomeController@setting');



Route::get('getLang' , function(){
    $lang = App::getLocale() ; 
    $lang_a = $lang == 'ar' ? 1 : 2 ;
    return response()->json($lang_a , 200);
});

