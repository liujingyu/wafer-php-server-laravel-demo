<?php


Route::any('login', 'WechatController@login');
Route::any('user', 'WechatController@user');
Route::any('tunnel', 'WechatController@tunnel');
Route::post('scan', 'WechatController@scan');
