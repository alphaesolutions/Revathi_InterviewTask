<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class OrderStatus extends Model
{
    use SoftDeletes;
    public $table = 'order_status';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'is_active',
    ];
}
