<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'year_level',
        'semester',
        'performance',
        'gpa',
        'has_requested',
    ];


    protected $casts = [
        'has_requested' => 'boolean',
    ];
}
