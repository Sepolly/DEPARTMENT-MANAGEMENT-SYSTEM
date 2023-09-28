<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lecturer extends Model  implements Authenticatable 
{
    use HasFactory;
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'usertype',
        'is_admin',
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

    public function attendances(){
        return $this->hasMany(Attendance::class,'signed_by');
    }

    public function getAuthIdentifierName()
    {
        return 'id'; // Change this to the appropriate identifier field in your database
    }

    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }
    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
