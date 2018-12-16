<?php

namespace App\Http\Requests\Order;

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
            'due_date' => [
                'required',
                'date_format:Y-m-d',
            ],
            'client_id' => [
                'required',
                'exists:clients,id'
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
                'client_id.required' => 'The client field is required.'
            ],
            parent::messages()
        );
    }
}
