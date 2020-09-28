<?php 
Route::group(['prefix' => 'specializations'], function () {
    //=========================================================================
    Route::get('/','Specializations\SpecializationsController@index')->middleware('user:specializations.list');
	Route::get('/data', 'Specializations\SpecializationsController@index_data')->middleware('user:specializations.list');	
	Route::get('/{id}','Specializations\SpecializationsController@view')->middleware('user:specializations.list');
	        
	Route::post('/','Specializations\SpecializationsController@insert')->middleware('user:specializations.insert');	
    Route::put('/','Specializations\SpecializationsController@update')->middleware('user:specializations.update');
    Route::delete('/{id}','Specializations\SpecializationsController@delete')->middleware('user:specializations.delete');
    //=============================================
 
});
?>