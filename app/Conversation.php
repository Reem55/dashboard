<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ConversationMessage;


class Conversation extends Model
{

    public $table = 'conversations';

    public static $searchable = [
        'title'
        ];

    protected $dates = [
        'updated_at',
        'created_at',
    ];

    protected $fillable = [
        'title',
        'user_id',
        'created_at',
        'updated_at',
    ];

    public function messages()
    {
        return $this->hasMany('App\ConversationMessage','conversation_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

}
