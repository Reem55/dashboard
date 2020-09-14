<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Product;

class ProductConsumption extends Model
{
    use SoftDeletes;

    public $table = 'product_consumptions';

    public static $searchable = [
        'code',
        'receiver_name',
        'reason',
        ];

    protected $dates = [
        'date',
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    protected $fillable = [
        'product_id',
        'code',
        'receiver_name',
        'reason',
        'date',
        'quantity',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
