<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

/**
 * Class Product
 * @package App\Models
 *
 * @property int id
 * @property string name
 * @property int price
 * @property string description
 * @property \Carbon\Carbon deleted_at
 * @property \Carbon\Carbon created_at
 * @property \Carbon\Carbon updated_at
 */
class Product extends BaseModel
{
    use SoftDeletes, Sortable;

    protected $fillable = [
        'name',
        'price',
        'description',
    ];

    protected $casts = [
        'price' => 'int'
    ];

    public $sortable = [
        'id',
        'name',
        'price',
    ];
}
