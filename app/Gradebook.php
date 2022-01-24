<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gradebook extends Model
{
    protected $fillable = [
        'name', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearchByName($query, $name = "")
    {
        if (!$name) {
            return $query;
        }

        return $query->where('name', 'like', "%{$name}%");
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function commentsOfGradebook()
    {
        return $this->hasMany(Comment::class);
    }
}
