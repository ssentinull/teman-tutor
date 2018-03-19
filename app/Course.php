<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Course extends Model implements AuthenticatableContract, AuthorizableContract
{
    protected $table = 'Courses';
    
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'desc',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    // Create a One-To-Many Relationship
    // with 'Groups' Table
    public function groups(){

        return $this->hasMany('App\Group');
    
    }

    // Create a One-To-Many Relationship
    // with 'Groups' Table
    public function tutors(){

        return $this->hasMany('App\Tutor');
    
    }
}
