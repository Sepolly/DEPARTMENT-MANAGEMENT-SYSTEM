<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'attendance_id',
        'course_id',
        'present',
        'attendance_note',
        'signed_by',
        'student_id',
        'level'
    ];
}
