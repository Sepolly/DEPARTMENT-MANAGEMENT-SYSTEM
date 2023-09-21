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
        $this->belongsTo(Lecturer::class);
    }
}
