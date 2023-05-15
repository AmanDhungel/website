<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'full_name'=>'required',
            'designation_id'=>'required',
            'contact_number'=>'required',
           // 'contact_email'=>'required|unique:users,email,'.Auth::user()->id,
           'contact_email'=>'required|unique:users,email',
            'order'=>'required',
            'image'=>'nullable|mimes:jpeg,jpg,png|max:1048',
        ];
    }
}
