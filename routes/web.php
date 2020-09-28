<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//$exitCode = Artisan::call('cache:clear');
//$exitCode1 = Artisan::call('view:clear');



Route::get('/cache', function() {
   Artisan::call('cache:clear');
   Artisan::call('view:clear');
   Artisan::call('config:clear');
      Artisan::call('key:generate');

   return "Cache is cleared";
});



Route::get('/' , 'HomeController@index');

Route::get('/page/{id?}' , 'HomeController@index');
Route::get('/services' , 'HomeController@index');

Route::get('/contact2/{id?}' , 'HomeController@index');
Route::get('/works' , 'HomeController@index');
Route::get('/contact' , 'HomeController@index');
Route::get('/blog' , 'HomeController@index');
// Route::get('/{any1?}/' , 'HomeController@index');
Route::get('/campny/{any1?}/{any2?}', function(){
	return redirect(url('/'));
});




Route::get('/login', function(){
	return redirect(url('/adminpanel/login'));
});

Route::get('/home/{any?}/{any1?}/{any2?}', 'HomeController@index');
Route::get('/adminpanel/pdf_viewer', function () {

	 return view('admin.pdf_viewer');

});
Route::group(['prefix' => '/adminpanel'], function () {
	Route::get('/','Controller@index_main')->middleware('user:index');
	Route::get('/submenu/{type}/{id}','Controller@submenu')->middleware('user:index');
	include ('user.php');
	include ('menu.php');
	include ('role.php');
	include ('notification.php');      
	include ('arrowchat.php');     
	include("alerts.php");	
	//======================
	include ('post.php');
	include ('pages.php');
	include ('faqs.php');
	include ('setting.php');
	//======================
	include ('department.php');
	include ('category.php');
	include ('option.php');	
	include ('comments.php');
	//=======================
	include ('countries.php');
	include ('universities.php');
	include ('colleges.php');
	include ('specializations.php');
	include ('application.php');

	include ('services.php');
	include ('clients.php');
	
	include ('sliders.php');
	include ('works.php');
	include ('settings.php');
	include ('partners.php');

	include ('teams.php');

	include ('concats.php');
	
	
	
	
});
//front
//include ('front.php');
