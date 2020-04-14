<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use Uuids;

    public $incrementing = false;
    //

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
