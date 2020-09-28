<?php 
  Route::group(['prefix' => 'post'], function () {

    Route::get('/','Post\PostController@view')->middleware('user:post.list');
    Route::get('/create','Post\PostController@add')->middleware('user:post.add');
    Route::get('/edit/{id}','Post\PostController@edit')->name('editpost')->middleware('user:post.edit');
    Route::post('/create/{id?}','Post\PostController@create')->name('addpost')->middleware('user:post.add');
    Route::post('/imageupload/{id?}','Post\PostController@upladimage')->name('imageupload')->middleware('user:post.add');
    Route::get('/delete/{id}','Post\PostController@delete')->name('delpost')->middleware('user:post.delete');
    Route::get('/deleteimage/{id}','Post\PostController@deletePostImage')->middleware('user:post.delete');
    
    Route::get('/changestatus/{id}/{state}','Post\PostController@changestatus')->middleware('user:post.status');
    Route::get('/submenu/{id}','Post\PostController@get_submenu');
    Route::post('/resort','Post\PostController@resort');
    Route::post('/resort_table','Post\PostController@resort_table');

    Route::get('/getdata', 'Post\PostController@datapost')->name('post/getdata')->middleware('user:post.list');
    Route::get('/updategllarey', 'Post\PostController@updategllarey')->middleware('user:post.list');
    Route::get('/updatedepartment', 'Post\PostController@updatedepartment')->middleware('user:post.list');

  });
?>