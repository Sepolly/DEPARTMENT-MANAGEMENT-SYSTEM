<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Student as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'regno',
        'first_name',
        'last_name',
        'other_name',
        'usertype',
        'level',
        'status',
        'is_repeating',
        'address',
        'phone',
        'date_of_birth',
        'email',
        'password',
        'image',
    ];

    //customizing primary key
    protected $primaryKey = 'regno';
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function testsubmission(){
        return $this->hasMany(TestSubmission::class,'student_id');
    }

    public function testgrade(){
        return $this->hasMany(TestGrade::class,'student_id');
    }

    public function attendances(){
        return $this->belongsToMany(Attendance::class,'student_id');
    }
}
