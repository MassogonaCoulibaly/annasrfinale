<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id', 'course_id', 'level_id', 'start_date', 'start_time', 'exercise_id'];
    protected $dates = ['start_time'];


    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function exercises()
{
    return $this->hasMany(Exercise::class);
}


    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}

