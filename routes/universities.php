<?php 
Route::group(['prefix' => 'universities'], function () {
    //=========================================================================
    Route::get('/','Universities\UniversitiesController@index')->middleware('user:universities.list');
	Route::get('/data', 'Universities\UniversitiesController@index_data')->middleware('user:universities.list');	
	Route::get('/{id}','Universities\UniversitiesController@view')->middleware('user:universities.list');
	        
	Route::post('/','Universities\UniversitiesController@insert')->middleware('user:universities.insert');	
    Route::put('/','Universities\UniversitiesController@update')->middleware('user:universities.update');
    Route::delete('/{id}','Universities\UniversitiesController@delete')->middleware('user:universities.delete');
    //=============================================
 
});
?>