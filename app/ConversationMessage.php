<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Conversation;


class ConversationMessage extends Model
{

    public $table = 'conversation_messages';


    protected $dates = [
        'updated_at',
        'created_at',
    ];

    protected $fillable = [
        'conversation_id',
        'user_id',
        'message',
        'created_at',
        'updated_at',
    ];

    public function conversation()
    {
        return $this->belongsTo('App\Conversation','conversation_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

}
