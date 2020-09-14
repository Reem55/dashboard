<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainerInvoice extends Model
{
    use SoftDeletes;

    public $table = 'trainer_invoices';

    public static $searchable = [
        'invoice_number',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'invoice_date',
    ];

    protected $fillable = [
        'notes',
        'amount',
        'trainer_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'invoice_date',
        'invoice_number',
    ];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class, 'trainer_id');
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
