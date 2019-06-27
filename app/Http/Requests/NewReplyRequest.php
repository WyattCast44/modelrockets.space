<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewReplyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (auth()->check()) ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'body' => 'required|string|min:3',
            'parent_id' => 'nullable|exists:replies,id',
            'attachments.*' => 'nullable|mimes:jpg,jpeg,png,bmp|max:20000'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'attachments.*.mimes' => 'Only jpg, jpeg, png and bmp images are allowed.',
            'attachments.*.max' => 'Sorry! Maximum allowed size for an image is 20MB',
        ];
    }
}
