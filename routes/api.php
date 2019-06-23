<?php
use Illuminate\Http\Request;

Route::get('/validators/email', 'API\Validators\ValidateEmail');
Route::get('/validators/username', 'API\Validators\ValidateUsername');
