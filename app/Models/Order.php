<?php

namespace App\Models;

use App\Filters\SomeFilter;
use App\Models\Observers\OrderObserver;
use Illuminate\Database\Eloquent\Builder;
use Kyslik\ColumnSortable\Sortable;
use Kyslik\LaravelFilterable\Filterable;

/**
 * Class Order
 * @package App\Models
 *
 * @property int $id
 * @property int $created_by
 * @property int $client_id
 * @property \Carbon\Carbon $due_date
 * @property int $status
 * @property string $note
 * @property \App\Models\Client $client
 * @property \App\Models\User $creator
 * @property \Illuminate\Support\Collection|\App\Models\OrderProduct[] $orderProducts
 * @property-read string $statusName
 */
class Order extends BaseModel
{
    use Sortable, Filterable;

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
        'note',
    ];

    protected $casts = [
        'due_date' => 'date',
    ];

    public $sortable = [
        'due_date',
        'client.name',
        'status',
    ];

    public static function boot()
    {
        parent::boot();

        self::observe(OrderObserver::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
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
