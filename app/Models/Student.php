<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sex',
        'phone',
        'department',
        'degree',
        'course',
        'major',
        'address',
        'user_id',
    ];

    public function performance()
    {
        return $this->hasOne(Performance::class, 'student_id', 'id');
    }
}
