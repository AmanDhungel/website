<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {

            return [
                'identity' => 'required|min:3|string',
                'password' => 'required|min:3|string',
            ];
    }

    public function messages()
    {
        return [
            'identity.required' => trans('auth.login.identity_required'),
            'password.min' => trans('auth.login.password_min'),
            'password.required' => trans('auth.login.password_required'),
        ];
    }
}
