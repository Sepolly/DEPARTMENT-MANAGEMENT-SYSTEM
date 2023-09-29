<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $fillable = ['module_code','module_name','lecturer_id','level'];

    //customizing primary key
    protected $primaryKey = 'module_code';
    protected $keyType = 'string';
    public $incrementing = false;

    public function lecturer(){
        return $this->belongsTo(Lecturer::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function testgrade(){
        return $this->hasMany(TestGrade::class,'module_code');
    }

    public function assignments(){
        return $this->hasMany(Assignment::class,'module_code');
    }
    public function notes(){
        return $this->hasMany(Note::class,'module_code');
    }
    
}
