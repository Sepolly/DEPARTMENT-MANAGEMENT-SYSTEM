<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'course_name'
    ];

   protected $primaryKey = 'course_id';
   public $keyType = 'string';
   public $incrementing = false;
}
