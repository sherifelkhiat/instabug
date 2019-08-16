<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    //
    protected $fillable = ['name', 'application_id', 'messages_count', 'chat_number'];

    public function application()
    {
        $this->belongsTo('App\Application');
    }
}
