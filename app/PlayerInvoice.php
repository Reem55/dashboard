<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlayerInvoice extends Model
{
    use SoftDeletes;

    public $table = 'player_invoices';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'invoice_date',
    ];

    const INVOICE_TYPE_SELECT = [
        'subscription' => 'اشتراك',
        'clothes'      => 'طقم اللعب',
        'other'        => 'اخري',
    ];

    protected $fillable = [
        'notes',
        'amount',
        'palyer_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'invoice_type',
        'invoice_date',
        'invoice_number',
        'remaining_amount',
    ];

    public function palyer()
    {
        return $this->belongsTo(Player::class, 'palyer_id');
    }

    public function getInvoiceDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setInvoiceDateAttribute($value)
    {
        $this->attributes['invoice_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
