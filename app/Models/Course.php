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

   public function modules(){
    return $this->hasMany(Module::class);
   }

   public function timetable(){
    return $this->hasOne(Timetable::class,'course_id');
   }
}
