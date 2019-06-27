<?php

namespace App\Http\Requests;

use App\User;
use App\Rules\AllowedUsername;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(User $user)
    {
        return [
            'tagline' => 'nullable|string',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore(auth()->id())
            ],
            'username' => [
                'required',
                'string',
                'max:255',
                'alpha_num',
                new AllowedUsername,
                Rule::unique('users', 'username')->ignore(auth()->id()),
            ],
            'signature' => 'nullable|string|max:512'
        ];
    }
}
