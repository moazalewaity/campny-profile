<?php 
  Route::group(['prefix' => 'option'], function () {

    Route::get('/','OptionsController@add')->middleware('user:option.add');
    Route::get('/getdata', 'OptionsController@datapost')->name('option/getdata')->middleware('user:option.add');
    Route::get('/{id}','OptionsController@edit')->name('addoption')->middleware('user:option.add');
    Route::post('/','OptionsController@create')->name('createoptions')->middleware('user:option.add');
    Route::put('/{id?}','OptionsController@create')->name('createoption')->middleware('user:option.add');
    Route::get('/delete/{id}','OptionsController@delete')->name('deloption')->middleware('user:option.add');

    // Route::post('/imageupload/{id?}','OptionsController@upladimage')->name('imageupload');
    // Route::get('/deleteimage/{id}','OptionsController@deleteimage');
    
    // Route::get('/submenu/{id}','OptionsController@get_submenu');
    // Route::post('/resort','OptionsController@resort');
    // Route::post('/resort_table','OptionsController@resort_table');

    // Route::get('/getdata', 'OptionsController@datapost')->name('post/getdata');

  });
?>