<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'firstname',
        'lastname',
        'usertype',
        'phone',
        'address',
        'title',
        'email',
        'password'
    ];

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    public function modules(){
        return $this->hasMany(Module::class,'lecturer_id');
    }
}
