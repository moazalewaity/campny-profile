<?php 
  Route::group(['prefix' => 'works'], function () {

    Route::get('/','WorkController@view')->middleware('user:works.list');
    Route::get('/create','WorkController@add')->middleware('user:works.add');
    Route::get('/edit/{id}','WorkController@edit')->name('editworks')->middleware('user:works.list');
    Route::post('/create/{id?}','WorkController@create')->name('addworks')->middleware('user:works.list');
    Route::get('/delete/{id}','WorkController@delete')->name('delworks')->middleware('user:works.list');
    
    Route::get('/changestatus/{id}/{state}','WorkController@changestatus')->middleware('user:works.status');


    
    Route::get('/getdata', 'WorkController@datapost')->name('post/getdata')->middleware('user:works.list');
    Route::get('/updategllarey', 'WorkController@updategllarey')->middleware('user:works.list');
    Route::get('/updatedepartment', 'WorkController@updatedepartment')->middleware('user:works.list');

  });
?>