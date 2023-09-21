<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterResult extends Model
{
    use HasFactory;

    protected $fillable = [
      'student_id',
      'semester_id',
        'exam_id',
      'result',
      'course_id',
      'level',
      'published'
    ];
}