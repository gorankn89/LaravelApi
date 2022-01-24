<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content', 'gradebook_id', 'user_id',
    ];

    public function gradebook()
    {
        return $this->belongsTo(Gradebook::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
