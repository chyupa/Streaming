<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const USER_ROLE = "user";
    const STUDIO_ROLE = "studio";
    const ADMIN_ROLE = "admin";


    protected $table = "roles";

    protected $fillable = ["name"];

    protected $primaryKey = "_id";

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo("App\User", "_id");
    }
}
