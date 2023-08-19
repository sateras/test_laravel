<?php

namespace App\Http\Requests\Auth;

use App\Rules\Phone;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required'],
            'name' => ['required'],
        ];
    }
}
