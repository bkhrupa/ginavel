<?php

namespace App\Http\Requests\Client;

use App\Models\Product;
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
                'max:191',
                'unique:clients,name'
            ],
            // TODO phone validation
            'phone' => [

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
}