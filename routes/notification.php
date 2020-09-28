<?php
Route::get('/notifications/{id}','NotificationController@mark_as_read');
Route::get('/counter_seen','NotificationController@counter_seen');


Route::get('/notification/create', 'Notification_info_Controller@create')
       ->middleware('user:notification.n_control');

Route::post('/notification', 'Notification_info_Controller@store')
       ->middleware('user:notification.n_control');

Route::get('/notification','Notification_info_Controller@index')->middleware('user:notification.n_control');
Route::get('/notification_list','Notification_info_Controller@notification_list')->middleware('user:notification.n_control');    

Route::get('/notify_counters','Notification_info_Controller@notify_counters')->middleware('user:index');  

Route::get('/notification/{id}','Notification_info_Controller@show')->middleware('user:notification.n_control');
Route::put('/notification/{id}','Notification_info_Controller@update')->middleware('user:notification.n_control');
Route::get('/unread_notification','Notification_info_Controller@nuread_notification')->middleware('user:index');  
Route::get('/display_nuread','Notification_info_Controller@unread_notification_display')->middleware('user:index');?>