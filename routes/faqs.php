<?php 
  Route::group(['prefix' => 'faqs'], function () {

    Route::get('/','Post\FaqsController@view')->middleware('user:faqs.list');
    Route::get('/create','Post\FaqsController@add')->middleware('user:faqs.add');
    Route::get('/edit/{id}','Post\FaqsController@edit')->name('editpage')->middleware('user:faqs.edit');
    Route::post('/create/{id?}','Post\FaqsController@create')->name('addpage')->middleware('user:faqs.add');
    Route::post('/imageupload/{id?}','Post\FaqsController@upladimage')->name('imageuploadpage')->middleware('user:faqs.add');
    Route::get('/delete/{id}','Post\FaqsController@delete')->name('delpage')->middleware('user:faqs.delete');
    Route::get('/deleteimage/{id}','Post\FaqsController@deletePostImage')->middleware('user:faqs.delete');
    
    Route::get('/changestatus/{id}/{state}','Post\FaqsController@changestatus')->middleware('user:faqs.status');
    Route::get('/submenu/{id}','Post\FaqsController@get_submenu');
    Route::post('/resort','Post\FaqsController@resort');
    Route::post('/resort_table','Post\FaqsController@resort_table');

    Route::get('/getdata', 'Post\FaqsController@datapost')->name('pages/getdata')->middleware('user:faqs.list');
    Route::get('/updategllarey', 'Post\FaqsController@updategllarey')->middleware('user:faqs.list');
    Route::get('/updatedepartment', 'Post\FaqsController@updatedepartment')->middleware('user:faqs.list');

  });
?>