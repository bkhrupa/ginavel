<?php

namespace App\Http\Filters;

use Kyslik\LaravelFilterable\Generic\Filter;

class OrderFilter extends Filter
{
    /**
     * Defines columns that end-user may filter by.
     *
     * @var array
     */
    protected $filterables = ['status'];


    /**
     * Define allowed generics, and for which fields.
     * Read more in the documentation https://github.com/Kyslik/laravel-filterable#additional-configuration
     *
     * @return void
     */
    protected function settings()
    {
        $this->only(['=', 'i=']);
	}
}
