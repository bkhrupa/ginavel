<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;

/**
 * Class Client
 * @package App\Models
 *
 * @property int id
 * @property string name
 */
class Client extends BaseModel
{
    use Sortable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'note',
    ];

    public $sortable = [
        'id',
        'name',
    ];
}
