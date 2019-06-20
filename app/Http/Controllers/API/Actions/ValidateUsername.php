<?php

namespace App\Http\Controllers\API\Actions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rules\AllowedUsername;

class ValidateUsername extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'username' => ['required', 'string', 'max:255', 'unique:users,username', 'alpha_num', new AllowedUsername],
        ]);
    }
}
