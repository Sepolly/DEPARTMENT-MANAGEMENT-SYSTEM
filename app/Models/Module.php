<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $fillable = ['modulecode','modulename','lecturer_id','level'];

    //customizing primary key
    protected $primaryKey = 'modulecode';
    protected $keyType = 'string';
    public $incrementing = false;

    public function lecturer(){
        $this->belongsTo(Lecturer::class);
    }
}