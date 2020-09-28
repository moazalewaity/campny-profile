<?php 
Route::group(['prefix' => 'courses'], function () {

    //=========================================================================
    Route::get('/','Courses\CoursesController@index')->middleware('user:courses.list');
	Route::get('/data', 'Courses\CoursesController@index_data')->middleware('user:courses.list');	
	Route::get('/{id}','Courses\CoursesController@view')->middleware('user:courses.list');
	        
	Route::post('/','Courses\CoursesController@insert')->middleware('user:courses.insert');	
    Route::put('/','Courses\CoursesController@update')->middleware('user:courses.update');
    Route::delete('/{id}','Courses\CoursesController@delete')->middleware('user:courses.delete');
	
	Route::get('/{year}/{month}/{file}', 'Courses\CoursesController@download_image')->middleware('user:courses.list');
    //=============================================
 
});
?>