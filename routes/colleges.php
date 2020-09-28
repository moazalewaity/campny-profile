<?php 
Route::group(['prefix' => 'colleges'], function () {
    //=========================================================================
    Route::get('/','Colleges\CollegesController@index')->middleware('user:colleges.list');
	Route::get('/data', 'Colleges\CollegesController@index_data')->middleware('user:colleges.list');	
	Route::get('/{id}','Colleges\CollegesController@view')->middleware('user:colleges.list');
	        
	Route::post('/','Colleges\CollegesController@insert')->middleware('user:colleges.insert');	
    Route::put('/','Colleges\CollegesController@update')->middleware('user:colleges.update');
    Route::delete('/{id}','Colleges\CollegesController@delete')->middleware('user:colleges.delete');
    //=============================================
 
});
?>