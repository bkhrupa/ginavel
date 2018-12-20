<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ProductsQuantityAtLeastOneRequired implements Rule
{

    /**
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $result = false;

        foreach ($value as $arrayElement) {
            if (!empty($arrayElement['quantity'])) {
                $result = true;
            }
        }

        return $result;
    }

    /**
     * @return string
     */
    public function message()
    {
        return 'Select at least one product';
    }
}
