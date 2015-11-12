<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'password', 'activation_token', 'role_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    protected $primaryKey = "_id";

    public function role()
    {
        return $this->hasOne("App\Role", "_id", 'role_id');
    }

    public function userMetadata()
    {
        return $this->hasOne("App\UserMetadata", "_id");
    }

    public function studioMetadata()
    {
        return $this->hasOne("App\StudioMetadata", "_user_id");
    }

    public function is( $roleName )
    {
        return $this->role->name === $roleName ? true : false;
    }

    public function studioVideos()
    {
        return $this->hasMany("App\StudioVideo", "_user_id", "_id");
    }

}
