<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Group extends Model implements AuthenticatableContract, AuthorizableContract
{
    protected $table = 'Groups';
    
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'desc', 'course_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    // Create a Many-To-Many Relationship
    // with 'Users' Table
    public function users(){

        return $this->belongsToMany('App\User');

    }

    // Create a One-To-Many Relationship
    // with 'Courses' Table
    public function courses(){

        return $this->belongsTo('App\Course');

    }
}
