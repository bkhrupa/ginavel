<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;

class Order extends BaseModel
{
    use Sortable;

    const STATUS_NEW = 0;
    const STATUS_IN_PROGRESS = 1;
    const STATUS_DELIVERED = 2;
    const STATUS_WAIT_PAYMENT = 3;
    const STATUS_DONE = 4;

    public static $statuses = [
        self::STATUS_NEW => 'New',
        self::STATUS_IN_PROGRESS => 'In Progress',
        self::STATUS_DELIVERED => 'Delivered',
        self::STATUS_WAIT_PAYMENT => 'Wait Payment',
        self::STATUS_DONE => 'Done',
    ];

    protected $fillable = [
        'created_by',
        'client_id',
        'due_date',
        'status',
    ];

    protected $casts = [
        'due_date' => 'date',
    ];

    public $sortable = [
        'due_date',
        'id',
        'client.name',
        'status',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function getStatusNameAttribute($status)
    {
        return array_get(self::$statuses, $this->status, 'N/A');
    }
}
