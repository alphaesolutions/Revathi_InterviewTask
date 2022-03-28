<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class CustomerAddress extends Model
{
    use SoftDeletes;
    public $table = 'customer_address';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'address_type_id',
        'customer_id',
        'complete_address',
		'latitude',
        'longitude',
        'landmark',
        'is_active',
    ];
}
