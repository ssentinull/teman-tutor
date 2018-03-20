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

    // Create a One-To-Many Relationship
    // with 'Courses' Table
    public function course(){

        return $this->belongsTo('App\Course');

    }

    // Create a One-To-Many Relationship
    // with 'Times' Table
    public function times(){

        return $this->hasMany('App\Time');

    }

    // Create a Many-To-Many Relationship
    // with 'Groups' Table
    public function groups(){

        return $this->belongsToMany('App\Group');

    }
}
