<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $fillable = [
        'test_id',
        'test_title',
        'test_description',
        'test_image',
        'test_file',
        'test_status',
        'course_id',
        'module_code'
    ];

}
