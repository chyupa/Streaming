<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudioMetadata extends Model
{
    //
    protected $table = "studios_metadata";

    protected $primaryKey = "_id";

    protected $fillable = ["_user_id", "name", "slug", "address", "phone", "contact_email"];

    public function user()
    {
        return $this->belongsTo("App\User", "_user_id");
    }

}
