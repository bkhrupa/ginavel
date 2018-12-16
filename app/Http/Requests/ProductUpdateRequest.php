<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductUpdateRequest extends FormRequest
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
        /** @var \App\Models\Product $product */
        $product = $this->route('product');

        return [
            'name' => [
                'required',
                'max:191',
                Rule::unique('products')->ignore($product->id),
            ],
            'price' => [
                'required',
                'integer'
            ],
            'description' => [
                'max:2048'
            ],
            'status' => [
                'required',
                Rule::in([Product::STATUS_DISABLE, Product::STATUS_ENABLED]),
            ],
        ];
    }
}
