<?php 
  Route::group(['prefix' => 'teams'], function () {

    Route::get('/','TeamController@view')->middleware('user:teams.list');
    Route::get('/create','TeamController@add')->middleware('user:teams.add');
    Route::get('/edit/{id}','TeamController@edit')->name('editteams')->middleware('user:teams.list');
    Route::post('/create/{id?}','TeamController@create')->name('addteams')->middleware('user:teams.list');
    Route::get('/delete/{id}','TeamController@delete')->name('delteams')->middleware('user:teams.list');
    
    Route::get('/changestatus/{id}/{state}','TeamController@changestatus')->middleware('user:teams.status');


    
    Route::get('/getdata', 'TeamController@datapost')->name('post/getdata')->middleware('user:teams.list');
    Route::get('/updategllarey', 'TeamController@updategllarey')->middleware('user:teams.list');
    Route::get('/updatedepartment', 'TeamController@updatedepartment')->middleware('user:teams.list');

  });
?>