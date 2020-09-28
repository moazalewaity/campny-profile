<?php
//Route::get('/arrowchatmsg/counter_seen','ArrowchatController@counter_seen');
Route::get('/arrowchatmsg/unread_messages','ArrowchatController@unread_messages')->middleware('user:index');  
Route::get('/arrowchatmsg/display_nuread','ArrowchatController@unread_messages_display')->middleware('user:index');

Route::post('/arrowchatmsg/file_upload','ArrowchatController@file_upload')->middleware('user:index');
Route::get('/arrowchatmsg/file_download/{year}/{month}/{file}','ArrowchatController@file_download')->middleware('user:index'); 
Route::get('/arrowchatmsg/file_thumb/{year}/{month}/{file}','ArrowchatController@file_thumb')->middleware('user:index'); 