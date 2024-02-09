<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['firstname', 'lastname', 'phone', 'group_id','level_id', 'user_id'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function level()
{
    return $this->belongsTo(Level::class);
}


}
