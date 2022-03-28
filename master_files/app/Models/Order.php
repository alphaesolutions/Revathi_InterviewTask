<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Order extends Model
{
    use SoftDeletes;
    public $table = 'orders';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'order_code',
        'order_date',
        'order_time',
		'delivery_date',
        'delivery_time',
        'customer_id',
        'customer_address_id',
        'billing_address_id',
        'order_status_id',
        'total_item',
        'total_amount',
        'is_active',
    ];
    public function orderitem()
    {
        return $this->hasmany(OrderItem::class, 'order_id', 'id');
    }
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id')->select('id');
    }
    public function orderstatus()
    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id', 'id')->select('id','name');
    }
	public function billing_address()
    {
        return $this->belongsTo(BillingAddress::class, 'billing_address_id', 'id')->select('id','phone_no','name','address');
    }
	public function delivery_address()
    {
        return $this->belongsTo(CustomerAddress::class, 'customer_address_id', 'id')->select('id','address_type_id','complete_address','landmark');
    }
}
