<?php

Route::get('/validators/email', 'API\Validators\ValidateEmail')->name('api.validators.email');
Route::get('/validators/username', 'API\Validators\ValidateUsername')->name('api.validators.username');
