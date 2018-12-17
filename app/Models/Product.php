<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder ;
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
 *
 * @method static \Illuminate\Database\Eloquent\Builder  enabled()
 */
class Product extends BaseModel
{
    use Sortable;

    const STATUS_DISABLE = 0;
    const STATUS_ENABLED = 1;

    static $statuses = [
        self::STATUS_DISABLE => 'Disable',
        self::STATUS_ENABLED => 'Enable',
    ];

    protected $attributes = [
        'status' => self::STATUS_ENABLED,
    ];

    protected $fillable = [
        'name',
        'price',
        'description',
        'status',
    ];

    protected $casts = [
        'price' => 'int'
    ];

    public $sortable = [
        'id',
        'name',
        'price',
    ];

    public function scopeEnabled(Builder $builder)
    {
        return $builder->where('status', self::STATUS_ENABLED);
    }
}
