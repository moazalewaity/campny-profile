<?php 
  Route::group(['prefix' => 'concats'], function () {

    Route::get('/','ConcatController@view')->middleware('user:concats.list');
    Route::get('/create','ConcatController@add')->middleware('user:concats.add');
    Route::get('/edit/{id}','ConcatController@edit')->name('editconcats')->middleware('user:concats.list');
    Route::post('/create/{id?}','ConcatController@create')->name('addconcats')->middleware('user:concats.list');
    Route::get('/delete/{id}','ConcatController@delete')->name('delconcats')->middleware('user:concats.list');
    
    Route::get('/changestatus/{id}/{state}','ConcatController@changestatus')->middleware('user:concats.status');


    
    Route::get('/getdata', 'ConcatController@datapost')->name('post/getdata')->middleware('user:concats.list');
    Route::get('/updategllarey', 'ConcatController@updategllarey')->middleware('user:concats.list');
    Route::get('/updatedepartment', 'ConcatController@updatedepartment')->middleware('user:concats.list');

  });
?>