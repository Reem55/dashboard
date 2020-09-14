<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use SoftDeletes;

    public $table = 'players';

    public static $searchable = [
        'name',
        'phone',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'start',
        'end',
    ];

    protected $fillable = [
        'name',
        'phone',
        'notes',
        'dob',
        // 'rating',
        'start',
        'end',
        'created_at',
        'updated_at',
        'deleted_at',
        'stadia_id',
    ];

    public function playerInvoices()
    {
        return $this->hasMany(PlayerInvoice::class, 'palyer_id', 'id');
    }

    public function player_subscriptions()
    {
        return $this->hasMany(player_subscriptions::class);
    }

    public function stadia()
    {
        return $this->belongsTo(Stadium::class,'stadia_id');
    }
}
