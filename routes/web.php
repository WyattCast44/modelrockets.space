<?php

Route::get('/', 'DashboardController');

Auth::routes();

Route::get('/home', 'DashboardController')->name('home');
