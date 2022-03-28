<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class BillingAddress extends Model
{
    use SoftDeletes;
    public $table = 'billing_address';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'customer_id',
        'order_id',
        'phone_no',
		'name',
        'address',
        'is_active',
    ];
}
