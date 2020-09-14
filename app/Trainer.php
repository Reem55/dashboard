<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trainer extends Model
{
    use SoftDeletes;

    public $table = 'trainers';

    public static $searchable = [
        'name',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_SELECT = [
        'active'   => 'نشط',
        'disabled' => 'غير نشط',
    ];

    protected $fillable = [
        'name',
        'phone',
        'notes',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function trainerInvoices()
    {
        return $this->hasMany(TrainerInvoice::class, 'trainer_id', 'id');
    }
}
