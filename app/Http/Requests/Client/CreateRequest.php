<?php

namespace App\Http\Requests\Client;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use LVR\Phone\E164;

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
                'max:191',
                Rule::unique('clients', 'name'),
            ],
            'phone' => [
                'sometimes',
                'nullable',
                'phone_e164',
                'size:13'
            ],
            'email' => [
                'sometimes',
                'nullable',
                'email'
            ],
            'note' => [
                'max:2048'
            ],
        ];
    }

    public function messages()
    {
        return array_merge(
            [
                'phone.E164' => 'The client field is required.'
            ],
            parent::messages()
        );
    }
}
