<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'image_url', 'gradebook_id',
    ];

    public function gradebookOfStudent()
    {
        return $this->belongsTo(Gradebook::class);
    }
}
