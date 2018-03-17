<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  protected $fillable = [
      'course_name', 'price', 'image', 'description'
  ];

    public function students()
    {
        return $this->belongsToMany('App\Student');
    }
}
