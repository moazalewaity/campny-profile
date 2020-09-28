<?php 
  Route::group(['prefix' => 'sliders'], function () {

    Route::get('/','SliderController@view')->middleware('user:sliders.list');
    Route::get('/create','SliderController@add')->middleware('user:sliders.add');
    Route::get('/edit/{id}','SliderController@edit')->name('editsliders')->middleware('user:sliders.list');
    Route::post('/create/{id?}','SliderController@create')->name('addsliders')->middleware('user:sliders.list');
    Route::get('/delete/{id}','SliderController@delete')->name('delsliders')->middleware('user:sliders.list');
    
    Route::get('/changestatus/{id}/{state}','SliderController@changestatus')->middleware('user:sliders.status');


    
    Route::get('/getdata', 'SliderController@datapost')->name('post/getdata')->middleware('user:sliders.list');
    Route::get('/updategllarey', 'SliderController@updategllarey')->middleware('user:sliders.list');
    Route::get('/updatedepartment', 'SliderController@updatedepartment')->middleware('user:sliders.list');

  });
?>