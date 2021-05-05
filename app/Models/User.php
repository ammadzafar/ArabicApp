<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


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
    public function isAdmin()
    {
        if ($this->role_id == 1){
            return true;
        }

        return false;
    }

    public function isRater()
    {
        if ($this->role_id == 2){
            return true;
        }

        return false;
    }

    public function isStudent()
    {
        if ($this->role_id == 3){
            return true;
        }

        return false;
    }

    public function role(){
        return $this->belongsTo(Role::class,'role_id','id' );
    }

    public function masterVoice()
    {
        return $this->hasMany(MasterEnrollment::class,'master_id','id');
    }

    public function studentVoice()
    {
        return $this->hasMany(StudentEnrollment::class,'student_id','id');
    }

    public function masterResponses()
    {
        return $this->hasMany(StudentEnrollment::class,'master_id','id');
    }
    public function RaterRatings()
    {
        return $this->hasMany(StudentEnrollment::class,'rated_by','id');
    }

    public function masterChapter()
    {
        return $this->hasMany(MasterChapter::class,'master_id','id');
    }
}
