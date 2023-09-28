<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentGrade extends Model
{
    use HasFactory;
    protected $fillable = [
        'grade_id',
        'submission_id',
        'grade',
        'comment',
        
    ];
}
