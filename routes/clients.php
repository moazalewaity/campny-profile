<?php 
  Route::group(['prefix' => 'clients'], function () {

    Route::get('/','ClientController@view')->middleware('user:clients.list');
    Route::get('/create','ClientController@add')->middleware('user:clients.add');
    Route::get('/edit/{id}','ClientController@edit')->name('editclients')->middleware('user:clients.list');
    Route::post('/create/{id?}','ClientController@create')->name('addclients')->middleware('user:clients.list');
    Route::get('/delete/{id}','ClientController@delete')->name('delclients')->middleware('user:clients.list');
    
    Route::get('/changestatus/{id}/{state}','ClientController@changestatus')->middleware('user:clients.status');


    
    Route::get('/getdata', 'ClientController@datapost')->name('post/getdata')->middleware('user:clients.list');
    Route::get('/updategllarey', 'ClientController@updategllarey')->middleware('user:clients.list');
    Route::get('/updatedepartment', 'ClientController@updatedepartment')->middleware('user:clients.list');

  });
?>