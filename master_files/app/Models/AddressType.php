<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class AddressType extends Model
{
    use SoftDeletes;
    public $table = 'address_type';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'order_id',
        'name',
        'quantity',
		'amount',
        'created_by',
    ];
}
