<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:191',

            ],
            'email' => [
                'required',
                'string',
                'email',
                'unique:users,email'
            ],
            'password' => [
                'required',
                'string',
                'confirmed',
                'min:6'
            ],
            'role' => [
                'required',
                Rule::in(User::$roles)
            ],
        ];
    }
}
