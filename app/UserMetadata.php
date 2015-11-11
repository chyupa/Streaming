<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMetadata extends Model
{
    //
    protected $table = "users_metadata";

    protected $fillable = ["_user_id", "name", "slug"];



    protected $primaryKey = "_id";

    public function user()
    {
        return $this->belongsTo("App\User", "_user_id");
    }
}
