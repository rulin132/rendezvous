<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use Uuids;

    public $incrementing = false;

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
