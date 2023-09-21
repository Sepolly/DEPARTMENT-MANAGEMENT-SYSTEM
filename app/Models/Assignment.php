<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    protected $fillable = [
        'assignment_id',
        'assignment_title',
        'assignment_description',
        'assignment_due_date',
        'assignment_content',
        'assignment_file',
        'course_id',
        'module_code',
        'signed_by'
        
    ];
}
