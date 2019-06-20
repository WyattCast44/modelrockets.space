<?php

namespace App\Http\Controllers\API\Actions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckUniqueUsername extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|alpha_num|unique:users,username'
        ]);
    }
}
