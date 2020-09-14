<?php

namespace App;

use Carbon\Carbon;
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
        'date'
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

      public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
