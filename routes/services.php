<?php 
  Route::group(['prefix' => 'services'], function () {

    Route::get('/','ServiceController@view')->middleware('user:services.list');
    Route::get('/create','ServiceController@add')->middleware('user:services.add');
    Route::get('/edit/{id}','ServiceController@edit')->name('editservices')->middleware('user:services.list');
    Route::post('/create/{id?}','ServiceController@create')->name('addservices')->middleware('user:services.list');
    Route::get('/delete/{id}','ServiceController@delete')->name('delservices')->middleware('user:services.list');
    
    Route::get('/changestatus/{id}/{state}','ServiceController@changestatus')->middleware('user:services.status');


    
    Route::get('/getdata', 'ServiceController@datapost')->name('post/getdata')->middleware('user:services.list');
    Route::get('/updategllarey', 'ServiceController@updategllarey')->middleware('user:services.list');
    Route::get('/updatedepartment', 'ServiceController@updatedepartment')->middleware('user:services.list');

  });
?>