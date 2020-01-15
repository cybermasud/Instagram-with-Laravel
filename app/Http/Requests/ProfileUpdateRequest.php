<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => ['required', 'alpha', 'min:3', 'max:45'],
            'username' => ['required', 'alpha_dash', 'min:3', 'max:45', Rule::unique('users')->ignore(Auth::id())],
            'bio' => ['nullable', 'string', 'max:1000'],
            'img' => ['nullable', 'file', 'mimes:jpeg,png,jpg', 'max:2048'],
//            'g-recaptcha-response' => 'required|captcha'
        ];
    }
}
