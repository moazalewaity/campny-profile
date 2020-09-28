<?php 
Route::group(['prefix' => 'countries'], function () {
    //=========================================================================
    Route::get('/','Countries\CountriesController@index')->middleware('user:countries.list');
	Route::get('/data', 'Countries\CountriesController@index_data')->middleware('user:countries.list');	
	Route::get('/{id}','Countries\CountriesController@view')->middleware('user:countries.list');
	        
	Route::post('/','Countries\CountriesController@insert')->middleware('user:countries.insert');	
    Route::put('/','Countries\CountriesController@update')->middleware('user:countries.update');
    Route::delete('/{id}','Countries\CountriesController@delete')->middleware('user:countries.delete');
    //=============================================
 
});
?>