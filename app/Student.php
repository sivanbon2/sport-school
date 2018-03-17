<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'image'
    ];

    public function courses()
    {
        return $this->belongsToMany('App\Course');
    }
}
