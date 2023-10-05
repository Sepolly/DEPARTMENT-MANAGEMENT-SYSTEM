<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentSubmission extends Model
{
    use HasFactory;
    protected $fillable = [
        'submission_id',
        'assignment_id',
        'student_id',
        'answers'
    ];

    public function assignmentGrade(){
        return $this->hasOne(AssignmentGrade::class);
    }
}
