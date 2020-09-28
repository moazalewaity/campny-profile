<?php 
  Route::group(['prefix' => 'pages'], function () {

    Route::get('/','Post\PagesController@view')->middleware('user:pages.list');
    Route::get('/create','Post\PagesController@add')->middleware('user:pages.add');
    Route::get('/edit/{id}','Post\PagesController@edit')->name('editpage')->middleware('user:pages.edit');
    Route::post('/create/{id?}','Post\PagesController@create')->name('addpage')->middleware('user:pages.add');
    Route::post('/imageupload/{id?}','Post\PagesController@upladimage')->name('imageuploadpage')->middleware('user:pages.add');
    Route::get('/delete/{id}','Post\PagesController@delete')->name('delpage')->middleware('user:pages.delete');
    Route::get('/deleteimage/{id}','Post\PagesController@deletePostImage')->middleware('user:pages.delete');
    
    Route::get('/changestatus/{id}/{state}','Post\PagesController@changestatus')->middleware('user:pages.status');
    Route::get('/submenu/{id}','Post\PagesController@get_submenu');
    Route::post('/resort','Post\PagesController@resort');
    Route::post('/resort_table','Post\PagesController@resort_table');

    Route::get('/getdata', 'Post\PagesController@datapost')->name('pages/getdata')->middleware('user:pages.list');
    Route::get('/updategllarey', 'Post\PagesController@updategllarey')->middleware('user:pages.list');
    Route::get('/updatedepartment', 'Post\PagesController@updatedepartment')->middleware('user:pages.list');

  });
?>