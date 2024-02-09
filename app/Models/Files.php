<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;

    protected $fillable = ['file', 'course_id', 'exercise_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }
    public function files()
{
    return $this->hasMany(Files::class);
}

    
}
