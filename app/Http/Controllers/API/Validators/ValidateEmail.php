<?php

namespace App\Http\Controllers\API\Validators;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ValidateEmail extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
    }
}
