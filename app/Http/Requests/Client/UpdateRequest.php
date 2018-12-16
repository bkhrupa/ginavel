<?php

namespace App\Http\Requests\Client;

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
        /** @var \App\Models\Client $client */
        $client = $this->route('client');

        return [
            'name' => [
                'required',
                'max:191',
                Rule::unique('clients', 'name')->ignore($client->id),
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
