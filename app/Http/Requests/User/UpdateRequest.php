<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
        /** @var \App\Models\User $user */
        $user = $this->route('user');

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
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'password' => [
                'sometimes',
                'nullable',
                'string',
                'confirmed',
                'min:6'
            ],
            'role' => [
                'required',
                Rule::in(User::$roles)
            ],
            'client_id' => [
                'sometimes',
                'nullable',
                'exists:clients,id'
            ],
        ];
    }
}
