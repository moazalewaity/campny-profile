<?php 
  Route::group(['prefix' => 'category'], function () {
    
    Route::get('/add','CategoryController@add')->middleware('user:category.add');
    Route::get('/edit/{id}','CategoryController@edit')->middleware('user:category.add');
    Route::post('/create/{id?}','CategoryController@create')->name('addcat')->middleware('user:category.add');
    Route::get('/delete/{id}','CategoryController@delete')->middleware('user:category.delete');
    
    Route::get('/submenu/{id}','CategoryController@get_submenu');
    Route::post('/resort_table','CategoryController@resort_table');
    
    Route::get('/maincat','CategoryController@maincat');
    Route::get('/delmenu/{id}','CategoryController@delmenu');
    Route::get('/upmenu/{id}/{name}/{parent}','CategoryController@upmenu');
  });
?>