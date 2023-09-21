<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'submission_id',
        'test_id',
        'student_id',
        'answers'
    ];
}
