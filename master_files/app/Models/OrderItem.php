<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class OrderItem extends Model
{
    use SoftDeletes;
    public $table = 'order_items';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'order_id',
        'items_id',
        'quantity',
		'amount',
        'created_by',
    ];
}
