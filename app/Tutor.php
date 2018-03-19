<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Tutor extends Model implements AuthenticatableContract, AuthorizableContract
{
    protected $table = 'Tutors';

    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'birth_date', 'address', 'price_rate', 'ipk', 'course_id', 'api_token', 'remember_token'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'api_token', 
    ];

    public function course(){

        return $this->belongsTo('App\Course');

    }

    public function times(){

        return $this->hasMany('App\Time');

    }
}
